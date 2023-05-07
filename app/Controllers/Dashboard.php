<?php

namespace App\Controllers;
use App\Models\NewsModel;  

class Dashboard extends BaseController
{
    public function index()
    {
        $model = new NewsModel();
        $getNews = $model->findAll();
        return view('Dashboard', ['getNews' => $getNews]);
      // return view('users/index');
    }
}
