<?php

namespace App\Controllers;

use App\Models\WebConfigModel; 
use App\Models\ProductModel;  
use App\Models\ProductCategoryModel;

class Product extends BaseController
{
    public function index()
    {
   //     $model = new ProductCategoryModel();
   //     $getCategory = $model->findAll();

        $model = new WebConfigModel();
        $config = $model->getConfig();

        $model = new ProductModel();
        $getData = $model->findAll();
        return view('Admin/Products/index', [
            'getData' => $getData,
      //      'getCategory' => $getCategory,
            'appTitle' => $config['app_title'],
            'appName' => $config['app_name']
            ]);

    }
    public function add()
    {
        $model = new ProductCategoryModel();
        $getCategory = $model->findAll();

        $model = new WebConfigModel();
        $config = $model->getConfig();  
        return view('Admin/Products/add', [
            'getCategory' => $getCategory,
            'appTitle' => $config['app_title'],
            'appName' => $config['app_name']
        ]);
    }
    public function store()
    {
        $model = new ProductModel();
        $data = [
            'product_name' => $this->request->getPost('product_name'),
            'product_description' => $this->request->getPost('product_description'),
            'product_price' => $this->request->getPost('product_price'),
            'product_quantity' => $this->request->getPost('product_quantity'),
            'category_id' => $this->request->getPost('category_id'),
            'product_made' => $this->request->getPost('product_made'),
            'product_expired' => $this->request->getPost('product_expired'),
        ];
        session()->setFlashdata('success', 'Data berhasil ditambahkan.');
        $model->save($data);
        return redirect()->to('/admin/products');
    }
    public function edit($product_id)
    {
        helper('form');
        $model = new WebConfigModel();
        $config = $model->getConfig();  
        $model = new ProductCategoryModel();
        $getCategory = $model->findAll();

        $model = new ProductModel();
        $data = $model->where('product_id', $product_id)->first();

        return view('Admin/Products/edit', [
            'getCategory' => $getCategory,
            'data' => $data,
            'appTitle' => $config['app_title'],
            'appName' => $config['app_name']
        ]);
    }
    public function update($product_id)
    {
        $model = new ProductModel();
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
        $model->where('product_id', $product_id)->set($data)->update();
        return redirect()->to('/admin/products');
    }
    public function delete($product_id)
    {
        $model = new ProductModel();
        $data = $model->where('product_id', $product_id)->first();
        if (!$data) {
            return $this->response->setJSON(['success' => false]);
        }
        $model->where('product_id', $product_id)->delete();
        return $this->response->setJSON(['success' => true]);
    }
}