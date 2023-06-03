<?php

namespace App\Controllers;
use App\Models\WebConfigModel;  
use App\Models\UserModel;  

class User extends BaseController
{

    protected $webconfigM;
    protected $userM;

    public function __construct()
    {
        $this->webconfigM = new WebConfigModel;
        $this->userM = new UserModel;
    }
    public function index()
    {

        $config = $this->webconfigM->first();
        $getData = $this->userM->findAll();
        return view('Admin/Users/index', [
            'getData' => $getData,
            'appTitle' => $config['app_title'],
            'appName' => $config['app_name']
            ]);
    }
    public function add()
    {
        $config = $this->webconfigM->first();

        return view('Admin/Users/add', [
            'appTitle' => $config['app_title'],
            'appName' => $config['app_name']
        ]);
    }
    public function store()
    {
        $data = [
            'email' => $this->request->getPost('email'),
            'fullname' => $this->request->getPost('fullname'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
        ];
        session()->setFlashdata('success', 'Data berhasil ditambahkan.');
        $this->userM->save($data);
        return redirect()->to('/admin/users');
    }
    public function edit($id)
    {
        helper('form');
        $config = $this->webconfigM->first();
        $data = $this->userM->where('id', $id)->first();
      
        return view('Admin/Products/edit', [
            'data' => $data,
            'appTitle' => $config['app_title'],
            'appName' => $config['app_name']
        ]);
    }
    public function update($product_id)
    {

        $data = [
            'product_name' => $this->request->getPost('product_name'),
            'product_description' => $this->request->getPost('product_description'),
            'product_price' => $this->request->getPost('product_price'),
            'product_quantity' => $this->request->getPost('product_quantity'),
            'category_id' => $this->request->getPost('category_id'),
            'product_made' => $this->request->getPost('product_made'),
            'product_expired' => $this->request->getPost('product_expired'),
        ];
        session()->setFlashdata('success', 'Data berhasil diupdate.');
        $this->productM->where('product_id', $product_id)->set($data)->update();
        return redirect()->to('/admin/products');
    }
    public function delete($product_id)
    {
        $data = $this->productM->where('product_id', $product_id)->first();
        if (!$data) {
            return $this->response->setJSON(['success' => false]);
        }
        $this->productM->where('product_id', $product_id)->delete();
        return $this->response->setJSON(['success' => true]);
    }
}
