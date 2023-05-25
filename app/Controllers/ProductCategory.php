<?php

namespace App\Controllers;

use App\Models\WebConfigModel; 
use App\Models\ProductCategoryModel;

class ProductCategory extends BaseController
{
    public function index()
    {
   //     $model = new ProductCategoryModel();
   //     $getCategory = $model->findAll();

        $model = new WebConfigModel();
        $config = $model->getConfig();

        $model = new ProductCategoryModel();
        $data = $model->findAll();
        return view('Admin/Products/Category/index', [
            'getData' => $data,
      //      'getCategory' => $getCategory,
            'appTitle' => $config['app_title'],
            'appName' => $config['app_name']
            ]);

    }
    public function add()
    {
        $model = new WebConfigModel();
        $config = $model->getConfig();  
        return view('Admin/Products/Category/add', [
            'appTitle' => $config['app_title'],
            'appName' => $config['app_name']
        ]);
    }
    public function store()
    {
        $model = new ProductCategoryModel();
        $data = [
            'category_name' => $this->request->getPost('category_name')
        ];
        session()->setFlashdata('success', 'Data berhasil ditambahkan.');
        $model->save($data);
        return redirect()->to('/admin/product/category');
    }
    public function edit($category_id)
    {
        helper('form');
        $model = new WebConfigModel();
        $config = $model->getConfig();  

        $model = new ProductCategoryModel();
        $getData = $model->where('category_id', $category_id)->first();

        return view('Admin/Products/Category/edit', [
            'data' => $getData,
            'appTitle' => $config['app_title'],
            'appName' => $config['app_name']
        ]);
    }
    public function update($category_id)
    {
        $model = new ProductCategoryModel();
        $data = [
            'category_name' => $this->request->getPost('category_name'),
        ];
        session()->setFlashdata('success', 'Data berhasil diupdate.');
        $model->where('category_id', $category_id)->set($data)->update();
        return redirect()->to('/admin/product/category');
    }
    public function delete($category_id)
    {
        $model = new ProductCategoryModel();
        $data = $model->where('category_id', $category_id)->first();
        if (!$data) {
            return $this->response->setJSON(['success' => false]);
        }
        $model->where('category_id', $category_id)->delete();
        return $this->response->setJSON(['success' => true]);
    }
}