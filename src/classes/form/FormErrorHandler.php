<?php

namespace ProcessWire;

class FormErrorHandler extends WesanoxLottery
{
    public function handle(): void
    {
        $this->formErrorHandling();
    }

    private function formErrorHandling(): void
    {
        $this->addHookAfter('FormBuilderProcessor::wrapOutput', function ($event) {

            $html = $event->return;

            if (!$html) {
                return;
            }

            libxml_use_internal_errors(true);

            $dom = new \DOMDocument('1.0', 'UTF-8');
            $dom->loadHTML(
                '<?xml encoding="utf-8" ?>' . $html,
                LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD
            );

            $xpath = new \DOMXPath($dom);

            $errorBlocks = $xpath->query(
                "//*[contains(concat(' ', normalize-space(@class), ' '), ' FormBuilderErrors ')]"
            );

            foreach ($errorBlocks as $node) {
                $node->parentNode?->removeChild($node);
            }

            $errors = $xpath->query(
                "//*[contains(concat(' ', normalize-space(@class), ' '), ' input-error ')]"
            );

            foreach ($errors as $error) {
                $text = trim($error->textContent);

                if (stripos($text, 'Fehlender erforderlicher Wert') === false && stripos($text, 'Erforderlicher Wert fehlt') === false) {
                    continue;
                }

                $wrapper = $xpath->query(
                    "ancestor::*[contains(concat(' ', normalize-space(@class), ' '), ' Inputfield ')][1]",
                    $error
                )->item(0);

                if (!$wrapper) {
                    continue;
                }

                $labelNode = $xpath->query(
                    ".//label[contains(concat(' ', normalize-space(@class), ' '), ' InputfieldHeader ')]",
                    $wrapper
                )->item(0);

                if (!$labelNode) {
                    continue;
                }

                $label = trim(preg_replace('/\s+/', ' ', $labelNode->textContent));
                $message = "Bitte fülle {$label} ein";

                while ($error->firstChild) {
                    $error->removeChild($error->firstChild);
                }

                $error->appendChild($dom->createTextNode($message));
            }

            $event->return = $dom->saveHTML();
        });
    }
}