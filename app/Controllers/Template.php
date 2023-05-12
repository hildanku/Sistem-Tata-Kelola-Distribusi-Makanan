<?php

namespace App\Controllers;
use App\Models\WebConfigModel;  

class WebConfig extends BaseController
{
    public function index()
    {
        $model = new WebConfigModel();
        $getConfig = $model->findAll();
        return view('_partial/header', ['getConfig' => $getConfig]);
      // return view('users/index');
    }
}
