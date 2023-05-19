<?php

namespace App\Controllers;
use App\Models\NewsModel;  
use App\Models\WebConfigModel;  
class Dashboard extends BaseController
{
    public function index()
    {
      
        $model = new NewsModel();
        $getNews = $model->findAll();
        
        $model = new WebConfigModel();
        $config = $model->getConfig();
        return view('Dashboard', [
          'getNews' => $getNews,
          'appTitle' => $config['app_title'],
          'appName' => $config['app_name']
        ]);
      // return view('users/index');
    }
}
