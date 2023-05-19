<?php

namespace App\Controllers;

use App\Models\NewsModel; 

class News extends BaseController
{
    public function index()
    {
        $model = new NewsModel();
        $getNews = $model->findAll();
        return view('Admin/News/index', ['getNews' => $getNews]);

    }
    public function add()
    {
        return view('Admin/News/add');
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
        return redirect()->to('/news');
    }
    public function edit($id)
    {
        helper('form');
        $model = new NewsModel();
        $data = $model->where('id', $id)->first();
        return view('Admin/News/edit', ['data' => $data]);
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
        return redirect()->to('/news');
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