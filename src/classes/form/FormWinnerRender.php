<?php

namespace ProcessWire;

class FormWinnerRender extends WesanoxLottery
{
    /**
     * @param $prize
     *
     * @return void
     */
    public function handle($prize): void
    {
        $this->forms->addHookBefore('FormBuilderProcessor::renderReady', function(HookEvent $e) use ($prize) {
            /** @var FormBuilderProcessor $pro */
            $pro = $e->object;

            if(!in_array($pro->formName, [
                'lottery-winning',
            ])) return;

            $form = $e->arguments(0);

            $info = $form->getByName('info');

            if ($prize->prize_info_needed) {
                $info->required = $prize->prize_info_required ?? false;

                $required_text = ($info->required) ? '*' : '';

                $info->label = $prize->prize_info_label . $required_text ?? "Zusatzinformationen" . $required_text;
            } else {
                $info->addClass('d-none', 'wrapClass');
            }

            $winning_fields = ['firstname', 'lastname', 'mail'];

            foreach ($winning_fields as $name) {
                $winning_field = $form->getByName($name);

                if ($winning_field) {
                    $winning_field->attr('disabled', 'disabled');
                }
            }
        });
    }
}