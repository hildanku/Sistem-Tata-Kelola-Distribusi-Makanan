<?php

namespace App\Controllers;
use App\Models\WebConfigModel; 
use App\Models\DriverModel;

class Driver extends BaseController
{
  protected $WebConfigM;
  protected $DriverM;
    public function __construct()
    {
      $this->webconfigM = new WebConfigModel();
      $this->driverM = new DriverModel();
    }
    public function index()
    {
        // $model = new WebConfigModel();
        // $config = $model->first();
        $config = $this->webconfigM->first();
        $getData = $this->driverM->findAll();
      
        return view('Admin/Drivers/index', [
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
        return view('Admin/Drivers/add', [
          'appTitle' => $config['app_title'],
          'appName' => $config['app_name']
        ]);
      // return view('users/index');
    }
    public function store()
    {
        $data = [
            'driver_name' => $this->request->getPost('driver_name'),
            'driver_phone' => $this->request->getPost('driver_phone'),
            'driver_email' => $this->request->getPost('driver_email'),
            'driver_status' => $this->request->getPost('driver_status'),
        ];
        if ($this->driverM->save($data)) {
          session()->setFlashdata('success', 'Data berhasil diperbarui!');
          return redirect()->to('/admin/drivers');
      } else {
          session()->setFlashdata('error', 'Data gagal diperbarui!');
          return redirect()->to('/admin/drivers');
      }
    }
    public function edit($driver_id)
    {
        helper('form');
        $config = $this->webconfigM->first();
        $data = $this->driverM->where('driver_id', $driver_id)->first();
        return view('Admin/Drivers/edit', [
            'data' => $data,
            'appTitle' => $config['app_title'],
            'appName' => $config['app_name']
        ]);
    }
    public function update($driver_id)
    {
        $data = [
          'driver_name' => $this->request->getPost('driver_name'),
          'driver_phone' => $this->request->getPost('driver_phone'),
          'driver_email' => $this->request->getPost('driver_email'),
          'driver_status' => $this->request->getPost('driver_status'),
        ];
        if ($this->driverM->where('driver_id', $driver_id)->set($data)->update()) {
          session()->setFlashdata('success', 'Data berhasil diperbarui!');
          return redirect()->to('/admin/drivers');
      } else {
          session()->setFlashdata('error', 'Data gagal diperbarui!');
          return redirect()->to('/admin/drivers');
      }
    }
    public function delete($driver_id)
    {
        $data = $this->driverM->where('driver_id', $driver_id)->first();
        if (!$data) {
            return $this->response->setJSON(['success' => false]);
        }
        $this->driverM->where('driver_id', $driver_id)->delete();
        return $this->response->setJSON(['success' => true]);
    }
}
