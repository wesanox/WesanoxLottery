<?php
namespace ProcessWire;

$lottery_module = wire()->modules->get('WesanoxLottery');

$lottery = $lottery_module->lotteryRequests()->getLottery($page->dynamic_api, $page->text_lottery_id);

$form_string = match ($lottery->data->lottery_category) {
    '1' => 'lottery-code',
    '2' => 'lottery-normal',
    '3' => 'lottery-upload',
    default => '',
};

$lottery_module->formCustomerCreate()->handle($page->dynamic_api);
$lottery_module->formLinksRender()->handle($page->link_lottery_privacy->url, $page->link_lottery_terms->url);

if($lottery->ok) :
    ?>
    <div>
        <?php if ($lottery->data->lottery_start > date('Y-m-d', time())) : ?>
            Das Gewinnspiel ist noch nicht gestartet!
        <?php elseif ($lottery->data->lottery_end < date('Y-m-d', time())) : ?>
            Das Gewinnspiel ist beendet!
        <?php elseif ($form_string != '') : ?>
            <?php
            echo wire()->forms->render($form_string, [
                    'event_id' => $page->text_lottery_id,
                    'lottery_key' => $page->text_lottery_key,
                    'notice' => $page->text_lottery_form
            ]);
            ?>
        <?php endif; ?>
    </div>
<?php else: ?>
    <div class="alert alert-danger">
        Es gibt ein Problem mit dem Gewinnspiel - wir arbeiten an einer Lösung!
    </div>
<?php endif;