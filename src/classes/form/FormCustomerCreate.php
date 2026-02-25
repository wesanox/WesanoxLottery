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

            if ($privacy) {
                $data = [
                    "lottery_key" => $lottery_key,
                    "code" => $code,
                    "customer_firstname" => $form->getChildByName('firstname')?->value,
                    "customer_lastname" => $form->getChildByName('lastname')?->value,
                    "customer_mail" => $email,
                ];

                $response = json_decode($this->modules->get('WesanoxApi')->requestByApiId((int)$api_id, 'lottery/customer/create', [], 'POST', $data));

                if($response->ok) {
                    $form->message($response->message);
                } else {
                    $form->error($response->message);
                }
            }
        });
    }
}