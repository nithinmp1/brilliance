<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Response
{

    public $response;

    function create(array $array) {
        if($array['status']){
            $res = '<div class="alert bg-white alert-success" role="alert">
                <div class="iq-alert-text">'.$array['message'].' <b>success</b> check it out!</div>
            </div>';
        }else{
            $res = '<div class="alert bg-white alert-danger" role="alert">
            <div class="iq-alert-text">'.$array['message'].' <b>danger</b> please check it out!</div>
         </div>';
        }

        echo json_encode(['status' => $array['status'], 'message' => $res ]);die;

    }

    function apiResponse(array $array) {
        echo json_encode(['status' => $array['status'], 'message' => $array['message'], 'data' => $array['data'] ]);die;
    }
}