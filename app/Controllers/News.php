<?php

namespace App\Controllers;

use App\Models\NewsModel; 
use App\Models\WebConfigModel;  

class News extends BaseController
{
    public function index()
    {
        $model = new WebConfigModel();
        $config = $model->getConfig();

        $model = new NewsModel();
        $getNews = $model->findAll();
        return view('Admin/News/index', [
            'getNews' => $getNews,
            'appTitle' => $config['app_title'],
            'appName' => $config['app_name']
            ]);

    }
    public function add()
    {
        $model = new WebConfigModel();
        $config = $model->getConfig();  
        return view('Admin/News/add', [
            'appTitle' => $config['app_title'],
            'appName' => $config['app_name']
        ]);
    }
    public function store()
    {
        $model = new NewsModel();
        $data = [
            'status' => $this->request->getPost('status'),
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
        ];
        session()->setFlashdata('success', 'Data berhasil ditambahkan.');
        $model->save($data);
        return redirect()->to('/admin/news');
    }
    public function edit($id)
    {
        helper('form');
        $model = new WebConfigModel();
        $config = $model->getConfig();  

        $model = new NewsModel();
        $data = $model->where('id', $id)->first();
        return view('Admin/News/edit', [
            'data' => $data,
            'appTitle' => $config['app_title'],
            'appName' => $config['app_name']
        ]);
    }
    public function update($id)
    {
        $model = new NewsModel();
        $data = [
            'status' => $this->request->getPost('status'),
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
        ];
        session()->setFlashdata('success', 'Data berhasil diupdate.');
        $model->where('id', $id)->set($data)->update();
        return redirect()->to('/admin/news');
    }
    public function delete($id)
    {
        $model = new NewsModel();
        $data = $model->where('id', $id)->first();
        if (!$data) {
            return $this->response->setJSON(['success' => false]);
        }
        $model->where('id', $id)->delete();
        return $this->response->setJSON(['success' => true]);
    }
}