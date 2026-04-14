<?php

namespace ProcessWire;

class FormLinksRender extends WesanoxLottery
{
    /**
     * @param string $link_privacy
     * @param string $link_terms
     *
     * @return void
     */
    public function handle(string $link_privacy = '', string $link_terms = ''): void
    {
        if ( $link_privacy != '' ) $this->formLinksPrivacy($link_privacy);
        if ( $link_terms != '' ) $this->formLinksTerms($link_terms);
    }

    /**
     * @return void
     */
    private function formLinksPrivacy($link_privacy): void
    {
        $this->forms->addHookAfter('FormBuilderProcessor::wrapOutput', function(HookEvent $e) use ($link_privacy) {
            $privacy_text = $e->return;

            $privacy_text = str_replace(
                ['Datenschutzhinweise', 'Bestätigen'],
                ['<a href="' . $link_privacy . '" title=Datenschutzhinweise" aria-label="Datenschutzhinweise" target="_blank">Datenschutzhinweise</a>','E-Mail-Adresse bestätigen'],
                $privacy_text
            );

            $e->return = $privacy_text;
        });
    }

    /**
     * @return void
     */
    private function formLinksTerms($link_terms): void
    {
        $this->forms->addHookAfter('FormBuilderProcessor::wrapOutput', function($e) use ($link_terms) {
            $terms_text = $e->return;

            $terms_text = str_replace(
                'Teilnahmebedingungen',
                '<a href="' . $link_terms . '" title=Teilnahmebedingungen" aria-label="Teilnahmebedingungen" target="_blank">Teilnahmebedingungen</a>',
                $terms_text
            );

            $e->return = $terms_text;
        });
    }
}