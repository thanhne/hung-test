<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ProductModel;
use App\Models\CategoryModel;

class ProductController extends BaseController
{
    public function index()
    {
        $model = new ProductModel();
        $data['products'] = $model->findAll();
        return view('products/index', $data);
    }
    public function createindex()
    {
        $categoryModel = new CategoryModel();
        $data['categories'] = $categoryModel->findAll();
        return view('products/create', $data);
    }
    public function editindex($id)
    {
        $model = new ProductModel();
        $categoryModel = new CategoryModel();
        $data['product'] = $model->find($id);
        $data['categories'] = $categoryModel->findAll();
        return view('products/edit', $data);
    }

    // Create, Edit, Delete
    private function handleImageUpload($inputName = 'image')
    {
        $image = $this->request->getFile($inputName);

        if ($image && $image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move(ROOTPATH . 'public/uploads', $newName);
            return $newName;
        }

        return null;
    }
    public function create()
    {
        $model = new ProductModel();
        $imageName = $this->handleImageUpload();
        $data = [
            'name' => $this->request->getPost('name'),
            'category_id' => $this->request->getPost('category_id'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
            'stock' => $this->request->getPost('stock'),
        ];
        if ($imageName) {
            $data['image'] = $imageName;
        }


        $model->insert($data);
        return redirect()->to('/productsList');
    }
    public function edit($id)
    {
        $model = new ProductModel();
        $imageName = $this->handleImageUpload();
        $data = [
            'name' => $this->request->getPost('name'),
            'category_id' => $this->request->getPost('category_id'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
            'stock' => $this->request->getPost('stock'),
        ];
        if ($imageName) {
            $data['image'] = $imageName;
        }


        $model->update($id, $data);
        return redirect()->to('/productsList');
    }

    public function delete($id)
    {
        $model = new ProductModel();
        $model->delete($id);
        return redirect()->to('/productsList');
    }
}
