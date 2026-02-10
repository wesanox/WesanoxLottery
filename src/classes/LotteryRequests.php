<?php

namespace Processwire;

class LotteryRequests extends WireData
{
    public function getLottery($api_id, $lottery_id, $lottery_key)
    {
        $api = $this->pages->get($api_id);

        $headers = [
            'wesanoxKey'    => $api->api_key,
            'wesanoxSecret' => $api->api_secret,
            'wesanoxLotteryId'  => $lottery_id,
            'wesanoxLotteryKey'  => $lottery_key
        ];

        $lottery_response = json_decode($this->modules->get('WesanoxApi')->connection($api->api_url, 'lottery', $headers));

        ;
    }
}