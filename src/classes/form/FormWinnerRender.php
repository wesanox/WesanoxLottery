<?php

namespace ProcessWire;

class FormWinnerRender extends WesanoxLottery
{
    /**
     * @param $prize
     *
     * @return void
     */
    public function handle($prize, $hash): void
    {
        $this->forms->addHookBefore('FormBuilderProcessor::renderReady', function(HookEvent $e) use ($prize, $hash) {
            /** @var FormBuilderProcessor $pro */
            $pro = $e->object;

            if(!in_array($pro->formName, [
                'lottery-winning',
            ])) return;

            $form = $e->arguments(0);

            $form->attr('action', './?winner=' . $hash);

            $info = $form->getByName('info');
            $birthday = $form->getByName('birthday');

            $info_needed = (bool)($prize->prize_info_needed ?? false);
            $info_required = (bool)($prize->prize_info_required ?? false);
            $birthday_needed = (bool)($prize->prize_birthday_needed ?? false);

            if ($info) {
                if ($info_needed) {
                    $info->required = $info_required;

                    $required_text = ($info->required) ? '*' : '';
                    $info_label = trim((string)($prize->prize_info_label ?? ''));
                    $info->label = (($info_label !== '') ? $info_label : 'Zusatzinformationen') . $required_text;
                } else {
                    // Hidden fields must never keep required validation.
                    $info->required = false;
                    $info->attr('required', null);
                    $info->addClass('d-none', 'wrapClass');
                }
            }

            if ($birthday) {
                if ($birthday_needed) {
                    $birthday->required = true;

                    if ($info_needed && $info) $info->addClass('ps-lg-2', 'wrapClass');
                } else {
                    // Hidden fields must never keep required validation.
                    $birthday->required = false;
                    $birthday->attr('required', null);
                    $birthday->addClass('d-none', 'wrapClass');
                }
            }

            $winning_fields = ['firstname', 'lastname', 'mail'];

            foreach ($winning_fields as $name) {
                $winning_field = $form->getByName($name);

                if ($winning_field) {
                    $winning_field->attr('readonly', 'readonly');
                }
            }
        });
    }
}
