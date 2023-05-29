<?php

namespace App\Controllers;

use App\Models\WebConfigModel; 
use App\Models\CustomerModel;  

class Customer extends BaseController
{
  protected $webconfigM;
  public function __construct()
  {
    $this->webconfigM = new WebConfigModel();
    $this->customerM = new CustomerModel();
  }
    public function index()
    {
        $config = $this->webconfigM->first();
        $getData = $this->customerM->findAll();
        return view('Admin/Customers/index', [
          'config' => $config,
          'getData' => $getData,
          'appTitle' => $config['app_title'],
          'appName' => $config['app_name']
        ]);
      // return view('users/index');
    }

    public function add()
    {
      $config = $this->webconfigM->first();
      return view('Admin/Customers/add', [
        'appTitle' => $config['app_title'],
        'appName' => $config['app_name']
      ]);
    }

    public function store()
    {
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
      $this->customerM->save($data);
      return redirect()->to('/admin/customers');
    }

    public function edit($uuid)
    {
      helper('form');

      $config = $this->webconfigM->first();
      $data = $this->customerM->where('uuid', $uuid)->first();
      
      return view('Admin/Customers/edit', [
        'data' => $data,
        'appTitle' => $config['app_title'],
        'appName' => $config['app_name']
      ]);
    }

    public function update($uuid)
    {
        $data = [
          'shop_name' => $this->request->getPost('shop_name'),
          'shop_owner' => $this->request->getPost('shop_owner'),
          'shop_address' => $this->request->getPost('shop_address'),
          'phone_number' => $this->request->getPost('phone_number'),
          'email' => $this->request->getPost('email'),
          'status' => $this->request->getPost('status'),
        ];
        session()->setFlashdata('success', 'Data berhasil diupdate.');
        $this->customerM->where('uuid', $uuid)->set($data)->update();
        return redirect()->to('/admin/customers');
    }
    public function delete($uuid)
    {
      $data = $this->customerM->where('uuid', $uuid)->first();
        if (!$data) {
            return $this->response->setJSON(['success' => false]);
        }
        $this->customerM->where('uuid', $uuid)->delete();
        return $this->response->setJSON(['success' => true]);
    }

}
