<?php

namespace App\Controllers;
use App\Models\WebConfigModel; 
use App\Models\DriverModel;

class Driver extends BaseController
{
    public function index()
    {

        $model = new WebConfigModel();
        $config = $model->first();

        $model = new DriverModel();
        $getData = $model->findAll();
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

        $model = new WebConfigModel();
        $config = $model->first();
        return view('Admin/Drivers/add', [
          'appTitle' => $config['app_title'],
          'appName' => $config['app_name']
        ]);
      // return view('users/index');
    }
    public function store()
    {
        $model = new NewsModel();
        $data = [
            'driver_name' => $this->request->getPost('driver_name'),
            'driver_phone' => $this->request->getPost('driver_phone'),
            'driver_email' => $this->request->getPost('driver_email'),
            'driver_status' => $this->request->getPost('driver_status'),
        ];
        session()->setFlashdata('success', 'Data berhasil ditambahkan.');
        $model->save($data);
        return redirect()->to('/admin/drivers');
    }
    public function edit($driver_id)
    {
        helper('form');
        $model = new WebConfigModel();
        $config = $model->getConfig();  

        $model = new DriverModel();
        $data = $model->where('driver_id', $driver_id)->first();
        return view('Admin/Drivers/edit', [
            'data' => $data,
            'appTitle' => $config['app_title'],
            'appName' => $config['app_name']
        ]);
    }
    public function update($driver_id)
    {
        $model = new DriverModel();
        $data = [
          'driver_name' => $this->request->getPost('driver_name'),
          'driver_phone' => $this->request->getPost('driver_phone'),
          'driver_email' => $this->request->getPost('driver_email'),
          'driver_status' => $this->request->getPost('driver_status'),
        ];
        session()->setFlashdata('success', 'Data berhasil diupdate.');
        $model->where('driver_id', $driver_id)->set($data)->update();
        return redirect()->to('/admin/drivers');
    }
    public function delete($driver_id)
    {
        $model = new DriverModel();
        $data = $model->where('driver_id', $driver_id)->first();
        if (!$data) {
            return $this->response->setJSON(['success' => false]);
        }
        $model->where('driver_id', $driver_id)->delete();
        return $this->response->setJSON(['success' => true]);
    }
}
