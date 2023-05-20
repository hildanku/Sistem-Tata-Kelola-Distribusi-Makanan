<?php

namespace App\Controllers;
use App\Models\WebConfigModel;  

class Customer extends BaseController
{
    public function index()
    {
        $model = new WebConfigModel();
        $config = $model->first();
        return view('Admin/Customers/index', [
          'getConfig' => $getConfig,
          'appTitle' => $config['app_title'],
          'appName' => $config['app_name']
        ]);
      // return view('users/index');
    }
    public function edit()
    {

    }
}
