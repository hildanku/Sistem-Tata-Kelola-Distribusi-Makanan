<?php

namespace App\Controllers;

use App\Models\WebConfigModel; 
use App\Models\ProductCategoryModel;

class ProductCategory extends BaseController
{
    protected $webconfigM;
    protected $productcatM;
    public function __construct()
    {
        $this->webconfigM = new WebConfigModel();
        $this->productcatM = new ProductCategoryModel();
    }
    public function index()
    {
   //     $model = new ProductCategoryModel();
   //     $getCategory = $model->findAll();

        $config = $this->webconfigM->first();
        $getData = $this->productcatM->findAll();

        return view('Admin/Products/Category/index', [
            'getData' => $getData,
      //      'getCategory' => $getCategory,
            'appTitle' => $config['app_title'],
            'appName' => $config['app_name']
            ]);

    }
    public function add()
    {
        $config = $this->webconfigM->first();
        return view('Admin/Products/Category/add', [
            'appTitle' => $config['app_title'],
            'appName' => $config['app_name']
        ]);
    }
    public function store()
    {
        $data = [
            'category_name' => $this->request->getPost('category_name')
        ];
        session()->setFlashdata('success', 'Data berhasil ditambahkan.');
        $this->productcatM->save($data);
        return redirect()->to('/admin/product/category');
    }
    public function edit($category_id)
    {
        helper('form');

        $config = $this->webconfigM->first();
        $getData = $this->productcatM->where('category_id', $category_id)->first();
      
        return view('Admin/Products/Category/edit', [
            'getData' => $getData,
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