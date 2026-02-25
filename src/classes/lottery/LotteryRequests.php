<?php

namespace ProcessWire;

use stdClass;

class LotteryRequests extends WesanoxLottery
{
    /**
     * Gets the lottery data from the API.
     *
     * @param int $api_id
     * @param string $lottery_id
     *
     * @return false|mixed
     *
     * @throws WirePermissionException
     */
    public function getLottery(int $api_id, string $lottery_id)
    {
        if( ! $api_id || ! $lottery_id ) return false;

        $response = $this->modules->get('WesanoxApi')->requestByApiId($api_id, 'lottery/' . $lottery_id);

        return json_decode($response);
    }

    /**
     * Verifies customer data when the request is an AJAX request.
     *
     * @param int $api_id
     * @param string $hash
     *
     * @return stdClass
     *
     * @throws WirePermissionException
     */
    public function verifyCustomer(int $api_id, string $hash): stdClass
    {
        $response = $this->modules->get('WesanoxApi')->requestByApiId($api_id, 'lottery/customer/verify/' . $hash);

        return json_decode($response);
    }

    /**
     * Verifies winning data when the request is an AJAX request.
     *
     * @param int $api_id
     * @param string $hash
     *
     * @return mixed
     *
     * @throws WirePermissionException
     */
    public function verifyWinning(int $api_id, string $hash): mixed
    {
        $response = $this->modules->get('WesanoxApi')->requestByApiId($api_id, 'lottery/winning/hash/' . $hash);

        return json_decode($response);
    }

    /**
     * Gets the customer data from the API.
     *
     * @param int $api_id
     * @param $customer_id
     *
     * @return mixed
     *
     * @throws WirePermissionException
     */
    public function getWinner(int $api_id, $customer_id): mixed
    {
        $response = $this->modules->get('WesanoxApi')->requestByApiId($api_id, 'lottery/customer/' . $customer_id);

        return json_decode($response);
    }
}