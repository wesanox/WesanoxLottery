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

            if ($prize->prize_info_needed) {
                $info->required = (bool)$prize->prize_info_required;

                $required_text = ($info->required) ? '*' : '';

                $info->label = $prize->prize_info_label . $required_text ?? "Zusatzinformationen" . $required_text;
            } else {
                $info->addClass('d-none', 'wrapClass');
            }

            if($prize->prize_birthday_needed) {
                $birthday->required = true;

                if ($prize->prize_info_needed) $info->addClass('ps-lg-2', 'wrapClass');
            } else {
                $birthday->addClass('d-none', 'wrapClass');
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