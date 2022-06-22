<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function create(ContactRequest $request)
    {
        $contact = ["data" => array($request->validated())];
        $token = "1000.2713d5ab4d46872fc89ebabcf878f38d.5d277073c21b7784a8842d27a36602ea";
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://www.zohoapis.eu/crm/v2/Contacts",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($contact),
            CURLOPT_HTTPHEADER => array(
                "accept: */*",
                "content-type: application/json",
                "authorization: Zoho-oauthtoken ". $token
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
