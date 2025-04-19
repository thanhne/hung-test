<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\CategoryModel;

class CategoryController extends BaseController
{
    public function index()
    {
        $model = new CategoryModel();
        $data['categories'] = $model->findAll();
        return view('categories/index', $data);
    }

    public function createindex()
    {
        return view('categories/create');
    }

    public function create()
    {
        $model = new CategoryModel();
        $model->insert($this->request->getPost());
        return redirect()->to('/categoriesList');
    }

    public function editindex($id)
    {
        $model = new CategoryModel();
        $data['category'] = $model->find($id);
        return view('categories/edit', $data);
    }

    public function edit($id)
    {
        $model = new CategoryModel();
        $data = ['name' => $this->request->getPost('name')];
        $model->update($id, $data);
        return redirect()->to('/categoriesList');
    }

    public function delete($id)
    {
        $model = new CategoryModel();
        $model->delete($id);
        return redirect()->to('/categoriesList');
    }
}
