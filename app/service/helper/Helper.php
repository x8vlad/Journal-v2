<?php

namespace app\service\helper;

use core\Controller;

class Helper extends Controller
{
    public function renderAlert($type, $message){
        echo $this->load->view("additional/alert", ["type" => $type, "message" => $message]);
    }
}