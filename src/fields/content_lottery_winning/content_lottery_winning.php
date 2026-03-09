<?php
namespace ProcessWire;

$lottery_module = wire()->modules->get('WesanoxLottery');

if (wire()->input->get->winner != '') {
    $hash = wire()->sanitizer->string(wire()->input->get->winner);

    $response = $lottery_module->lotteryRequests()->verifyWinning($page->dynamic_api, $hash);

    $lottery_module->formWinnerRender()->handle($response->data->prize, $hash);

    $customer_id = $response->data->lottery_customer->customer_id;

    $customer = $lottery_module->lotteryRequests()->getWinner($page->dynamic_api, $customer_id);
} else {
    session()->redirect('/');
}

$lottery_module->formLinksRender()->handle($page->link_lottery_privacy->url, $page->link_lottery_terms->url);
$lottery_module->formWinnerUpdate()->handle($page->dynamic_api);
?>
<div>
    <?php
    echo wire()->forms->render('lottery-winning', [
            'firstname' => $customer->data->customer_firstname,
            'lastname' => $customer->data->customer_lastname,
            'mail' => $customer->data->customer_mail,
            'address' => $customer->data->customer_street ?? '',
            'zip' => $customer->data->customer_zip ?? '',
            'city' => $customer->data->customer_city ?? '',
            'phone' => $customer->data->customer_phone ?? '',
            'mobile' => $customer->data->customer_mobile ?? '',
            'birthday' => $customer->data->customer_birthday ?? '',
            'winner_id' => $customer->data->id,
            'notice' => $page->text_lottery_form
    ]);
    ?>
</div>