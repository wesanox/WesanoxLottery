<?php

namespace ProcessWire;

class FormCustomerCreate extends WesanoxLottery
{
    /**
     * @param int $api_id
     *
     * @return void
     *
     * @throws WirePermissionException
     */
    public function handle(int $api_id): void
    {
        $this->forms->addHookAfter('FormBuilderProcessor::processInputDone', function(HookEvent $e) use ($api_id) {
            /** @var FormBuilderProcessor $pro */
            $pro = $e->object;

            if(!in_array($pro->formName, [
                'lottery-code',
                'lottery-normal',
                'lottery-upload'
            ])) return;

            $form = $e->arguments(0);

            $lottery_key    = (string) $form->getChildByName('lottery_key')?->value;
            $code           = (string) $form->getChildByName('code')?->value;
            $email          = (string) $form->getChildByName('e_mail')?->value;
            $privacy        = (boolean) $form->getChildByName('checkbox_privacy')?->value;

            $fileField = $form->getChildByName('file');
            $file      = $fileField?->value;

            $isValid = false;

            switch ($pro->formName) {
                case 'lottery-code':
                    $isValid = $privacy && !empty($code);
                    break;

                case 'lottery-upload':
                    $isValid = $privacy && !empty($file);
                    break;

                case 'lottery-normal':
                    $isValid = $privacy;
                    break;
            }

            if ($isValid) {
                $data = [
                    "lottery_key"        => $lottery_key,
                    "code"               => $code,
                    "customer_firstname" => $form->getChildByName('firstname')?->value,
                    "customer_lastname"  => $form->getChildByName('lastname')?->value,
                    "customer_mail"      => $email,
                ];

                $response = json_decode(
                    $this->modules->get('WesanoxApi')->requestByApiId((int) $api_id, 'lottery/customer/create', [], 'POST', $data)
                );

                if($response->ok) {
                    $form->message($response->message);
                } else {
                    $form->error($response->message);
                }
            } else {
                if(!$privacy) {
                    $form->error('Bitte akzeptiere die Datenschutzerklärung.');
                } elseif($pro->formName === 'lottery-code' && empty($code)) {
                    $form->error('Bitte gib einen Code ein.');
                } elseif($pro->formName === 'lottery-upload' && empty($file)) {
                    $form->error('Bitte lade eine Datei hoch.');
                }
            }

            $this->forms->addHookAfter('FormBuilderProcessor::renderSuccessMessage', function(HookEvent $e) {
                $pro = $e->object;

                if(!in_array($pro->formName, [
                    'lottery-code',
                    'lottery-normal',
                    'lottery-upload'
                ])) return;

                $out = $e->return;
                $out .= '<p><a class="btn btn-primary" href="' . $this->page->url . '">Weiteren Code eingeben</a></p>';
                $e->return = $out;
            });
        });
    }
}