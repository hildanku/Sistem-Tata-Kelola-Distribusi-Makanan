<?php

namespace App\Controllers;
use App\Models\WebConfigModel;  
use App\Models\NewsModel;  
use App\Models\CustomerModel;  
use App\Models\ProductModel;  
use App\Models\DriverModel;  
use App\Models\DistributionModel;  

class Dashboard extends BaseController
{
  protected $webconfigM;
  protected $newsM;
    public function __construct()
    {
      $this->webconfigM = new WebConfigModel();
      $this->newsM = new NewsModel();
      $this->customerM = new CustomerModel();
      $this->productM = new ProductModel();
      $this->driverM = new DriverModel();
      $this->distributionM = new DistributionModel();
    }
    public function index()
    {
        $config = $this->webconfigM->first();
        $getNews = $this->newsM->findAll();
        $totalCustomer = $this->customerM->countAll();
        $totalProduct = $this->productM->countAll();
        $totalDriver = $this->driverM->countAll();
        $totalDistribution = $this->distributionM->countAll();


        return view('Dashboard', [
          'getNews' => $getNews,
          'appTitle' => $config['app_title'],
          'appName' => $config['app_name'],
          'totalCustomer' => $totalCustomer,
          'totalProduct' => $totalProduct,
          'totalDriver' => $totalDriver,
          'totalDistribution' => $totalDistribution,
        ]);
      // return view('users/index');
    }
}
