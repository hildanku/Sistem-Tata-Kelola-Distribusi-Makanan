<?php

namespace App\Controllers;
use App\Models\WebConfigModel; 
use App\Models\DistributionModel;
use App\Models\ProductModel;
use App\Models\DriverModel;

class Distribution extends BaseController
{

  protected $webconfigM;
  protected $distributionM;
  protected $productM;
  protected $driverM;
  public function __construct()
  {
    $this->webconfigM = new WebConfigModel();
    $this->distributionM = new DistributionModel();
    $this->productM = new ProductModel();
    $this->driverM = new DriverModel();
  }

    public function index()
    {
        // $model = new WebConfigModel();
        // $config = $model->first();
        $config = $this->webconfigM->first();
        $getDrivers = $this->driverM->findAll();
        $getProducts = $this->productM->findAll();
        $getData = $this->distributionM->findAll();
      
        return view('Admin/Distributions/index', [
        'getDrivers' => $getDrivers,
        'getProducts' => $getProducts,
        'getData' => $getData,
          'config' => $config,
          'appTitle' => $config['app_title'],
          'appName' => $config['app_name']
        ]);
      // return view('users/index');
    }
    public function add()
    {
        $config = $this->webconfigM->first();
        $getDrivers = $this->driverM->findAll();
        $getProducts = $this->productM->findAll();
        return view('Admin/Distributions/add', [
          'getDrivers' => $getDrivers,
          'getProducts' => $getProducts,
          'appTitle' => $config['app_title'],
          'appName' => $config['app_name']
        ]);
      // return view('users/index');
    }
    public function store()
    {
        $data = [
            'driver_id' => $this->request->getPost('driver_id'),
            'product_id' => $this->request->getPost('product_id'),
            'distribution_destination' => $this->request->getPost('distribution_destination'),
            'distribution_datetime' => $this->request->getPost('distribution_datetime'),
            'distribution_description' => $this->request->getPost('distribution_description'),
            'distribution_progress' => $this->request->getPost('distribution_progress')
        ];
        session()->setFlashdata('success', 'Data berhasil ditambahkan.');
        $this->distributionM->save($data);
        return redirect()->to('/admin/distributions');
    }
    public function edit($distribution_id)
    {
        helper('form');
        $config = $this->webconfigM->first();
        $getDrivers = $this->driverM->findAll();
        $getProducts = $this->productM->findAll();

        $data = $this->distributionM->where('distribution_id', $distribution_id)->first();
        return view('Admin/Distributions/edit', [
            'getDrivers' => $getDrivers,
            'getProducts' => $getProducts,
            'data' => $data,
            'appTitle' => $config['app_title'],
            'appName' => $config['app_name']
        ]);
    }
    public function update($distribution_id)
    {
        $data = [
            'driver_id' => $this->request->getPost('driver_id'),
            'product_id' => $this->request->getPost('product_id'),
            'distribution_destination' => $this->request->getPost('distribution_destination'),
            'distribution_datetime' => $this->request->getPost('distribution_datetime'),
            'distribution_description' => $this->request->getPost('distribution_description'),
            'distribution_progress' => $this->request->getPost('distribution_progress')
        ];
        session()->setFlashdata('success', 'Data berhasil diupdate.');
        $this->distributionM->where('distribution_id', $distribution_id)->set($data)->update();
        return redirect()->to('/admin/distributions');
    }
    public function delete($distribution_id)
    {
        $data = $this->distributionM->where('distribution_id', $distribution_id)->first();
        if (!$data) {
            return $this->response->setJSON(['success' => false]);
        }
        $this->distributionM->where('distribution_id', $distribution_id)->delete();
        return $this->response->setJSON(['success' => true]);
    }
}
