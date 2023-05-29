<?php

namespace App\Controllers;
use App\Models\WebConfigModel;  
use App\Models\NewsModel;  
class Dashboard extends BaseController
{
  protected $webconfigM;
  protected $newsM;
    public function __construct()
    {
      $this->webconfigM = new WebConfigModel();
      $this->newsM = new NewsModel();
    }
    public function index()
    {
        $config = $this->webconfigM->first();
        $getNews = $this->newsM->findAll();
        return view('Dashboard', [
          'getNews' => $getNews,
          'appTitle' => $config['app_title'],
          'appName' => $config['app_name']
        ]);
      // return view('users/index');
    }
}
