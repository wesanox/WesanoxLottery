<?php

namespace ProcessWire;

class FormWinnerUpdate extends WesanoxLottery
{
    /**
     * @param int $api_id
     *
     * @return void
     *
     * @throws WirePermissionException
     */
    public function handle($prize, int $api_id): void
    {
        $this->forms->addHookAfter('FormBuilderProcessor::processInputDone', function(HookEvent $e) use ($prize, $api_id) {
            /** @var FormBuilderProcessor $pro */
            $pro = $e->object;

            if(!in_array($pro->formName, [
                'lottery-winning',
            ])) return;

            $form = $e->arguments(0);

            $privacy = (boolean) $form->getChildByName('checkbox_privacy')?->value;

            $info = trim((string) $form->getChildByName('info')?->value);

            if ($prize->prize_info_needed && $prize->prize_info_required && $info === '') {
                $form->getChildByName('info')?->error('Bitte fülle dieses Feld "' . $prize->prize_info_label . '" aus.');
                return;
            }

            if ($privacy) {
                $address    = (string) $form->getChildByName('address')?->value;
                $zip        = (string) $form->getChildByName('zip')?->value;
                $city       = (string) $form->getChildByName('city')?->value;
                $phone      = (string) $form->getChildByName('phone')?->value;
                $mobile     = (string) $form->getChildByName('mobile')?->value;
                $birthday   = (string) $form->getChildByName('birthday')?->value ? date('d.m.Y', $form->getChildByName('birthday')?->value) : '';
                $info       = (string) $form->getChildByName('info')?->value;
                $winner_id  = (string) $form->getChildByName('winner_id')?->value;


                $data = [
                    "customer_street" => $address,
                    "customer_zip" => $zip,
                    "customer_city" => $city,
                    "customer_phone" => $phone,
                    "customer_mobile" => $mobile,
                    "customer_birthday" => $birthday,
                    'customer_special' => $info
                ];

                $response = json_decode($this->modules->get('WesanoxApi')->requestByApiId($api_id, 'lottery/customer/' . (int) $winner_id, [], 'PUT', $data));

                if($response->ok) {
                    $form->message($response->message);
                } else {
                    $form->error($response->message);
                }
            }
        });
    }
}