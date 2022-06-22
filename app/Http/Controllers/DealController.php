<?php

namespace App\Http\Controllers;

use App\Http\Requests\DealRequest;

class DealController extends Controller
{
    public function create(DealRequest $request)
    {
        $deal = ["data" => array($request->validated())];
        $id = array("id" => $deal['data'][0]['Contact_id']);
        unset($deal['data'][0]['Contact_id']);
        $deal['data'][0]['Contact_Name'] = $id;

        $token = "1000.568f3a588faff70992e8ce40435e9d7b.b1ff2efe160264dff03dd72e72d5b006";
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://www.zohoapis.eu/crm/v2/Deals",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($deal),
            CURLOPT_HTTPHEADER => array(
                "accept: */*",
                "content-type: application/json",
                "authorization: Zoho-oauthtoken " . $token
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            $return = "cURL Error #:" . $err;
        } else {
            $return = json_decode($response);
        }

        return $return;
    }
}
