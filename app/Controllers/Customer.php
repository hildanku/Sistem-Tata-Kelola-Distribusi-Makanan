<?php

namespace App\Controllers;

use App\Models\CustomerModel;  
use App\Models\WebConfigModel; 

class Customer extends BaseController
{
    public function index()
    {

        $model = new WebConfigModel();
        $config = $model->first();

        $model = new CustomerModel();
        $getData = $model->findAll();
        return view('Admin/Customers/index', [
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
      return view('Admin/Customers/add', [
        'appTitle' => $config['app_title'],
        'appName' => $config['app_name']
      ]);
    }

    public function store()
    {
      $model = new CustomerModel();
      $data = [
          'uuid' => uniqid(),
          'shop_name' => $this->request->getPost('shop_name'),
          'shop_owner' => $this->request->getPost('shop_owner'),
          'shop_address' => $this->request->getPost('shop_address'),
          'phone_number' => $this->request->getPost('phone_number'),
          'email' => $this->request->getPost('email'),
          'status' => $this->request->getPost('status'),
      ];
      session()->setFlashdata('success', 'Data berhasil ditambahkan.');
      $model->save($data);
      return redirect()->to('/admin/customers');
    }

    public function edit($uuid)
    {
      helper('form');
      $model = new WebConfigModel();
      $config = $model->first();
      
      $model = new CustomerModel();
      $data = $model->where('uuid', $uuid)->first();
      return view('Admin/Customers/edit', [
        'data' => $data,
        'appTitle' => $config['app_title'],
        'appName' => $config['app_name']
      ]);
    }

    public function update($uuid)
    {
        $model = new CustomerModel();
        $data = [
          'shop_name' => $this->request->getPost('shop_name'),
          'shop_owner' => $this->request->getPost('shop_owner'),
          'shop_address' => $this->request->getPost('shop_address'),
          'phone_number' => $this->request->getPost('phone_number'),
          'email' => $this->request->getPost('email'),
          'status' => $this->request->getPost('status'),
        ];
        session()->setFlashdata('success', 'Data berhasil diupdate.');
        $model->where('uuid', $uuid)->set($data)->update();
        return redirect()->to('/admin/customers');
    }
    public function delete($uuid)
    {
        $model = new CustomerModel();
        $data = $model->where('uuid', $uuid)->first();
        if (!$data) {
            return $this->response->setJSON(['success' => false]);
        }
        $model->where('uuid', $uuid)->delete();
        return $this->response->setJSON(['success' => true]);
    }

}
