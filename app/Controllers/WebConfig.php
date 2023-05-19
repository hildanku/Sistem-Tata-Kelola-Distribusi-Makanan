<?php

namespace App\Controllers;
use App\Models\WebConfigModel;  

class WebConfig extends BaseController
{
    public function index()
    {
        $model = new WebConfigModel();
        $getConfig = $model->findAll();
        return view('Admin/WebConfig/index', ['getConfig' => $getConfig]);
      // return view('users/index');
    }
    public function edit()
    {
      return view('Admin/WebConfig/add');
    }
}
