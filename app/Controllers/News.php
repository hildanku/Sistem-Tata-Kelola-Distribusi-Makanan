<?php

namespace App\Controllers;

use App\Models\UserModel; 

class News extends BaseController
{
    public function forDashboard()
    {
      $model = new NewsModel();
        $getAllData = $model->findAll();
        return view('Dashboard', ['getAllData' => $getAllData]);
      // return view('users/index');
    }
}