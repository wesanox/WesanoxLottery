<?php
namespace ProcessWire;

if (wire()->input->get->confirm != '') {
    $lottery_module = wire()->modules->get('WesanoxLottery');

    $hash = wire()->sanitizer->string($this->input->get->confirm);

    $response = $lottery_module->lotteryRequests()->verifyCustomer($page->dynamic_api, $hash);

    $message = match ($response->message) {
        'confirmed'         => 'Vielen Dank für die Teilnahme an unserem Gewinnspiel!',
        'already confirmed' => 'Deine Teilnahme wurde bereits bestätigt.',
        default             => 'Deine Teilnahme konnte nicht bestätigt werden.',
    };
} else {
    $message = 'Keine Registierung möglich!';
}
?>
<div class="box-shadow py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 register-container">
                <div class="p-lg-4 text-center">
                    <div class="h2 small fonts text-red">
                        <strong>
                            Teilnahmebestätigung
                        </strong>
                    </div>
                    <div class="h3 fonts mt-2 mb-4">
                        <strong>
                            <?php echo $message ?>
                        </strong>
                    </div>
                    <a href="/" class="btn btn-primary mt-3">Zur Startseite wechseln</a>
                </div>
            </div>
        </div>
    </div>
</div>