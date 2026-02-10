<?php
namespace ProcessWire;

$lottery = wire()->modules->get('WesanoxLottery')->getLottery($page->dynamic_api, $page->text_lottery_id);

bd($lottery);

switch ($lottery->lottery_category) {
    case '1':
        $form_string = 'lottery-code';
        break;
    case'2':
        $form_string = 'lottery-normal';
        break;
    case '3':
        $form_string = 'lottery-upload';
        break;
    default:
        $form_string = '';
}

?>
<div>
    <?php if ($form_string != '') : ?>
        <?php echo wire()->forms->render($form_string); ?>
    <?php endif; ?>
</div>