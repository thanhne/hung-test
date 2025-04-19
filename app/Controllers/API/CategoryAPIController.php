<?php

namespace App\Controllers\API;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\CategoryModel;

class CategoryAPIController extends BaseController
{
    public function getAllCategories()
    {
        $model = new CategoryModel();
        $categories = $model->findAll();

        return $this->response->setJSON($categories);
    }
    public function getCategoryById($id)
    {
        $model = new CategoryModel();
        $category = $model->find($id);

        if ($category) {
            return $this->response->setJSON($category);
        } else {
            return $this->response->setStatusCode(ResponseInterface::HTTP_NOT_FOUND, 'Category not found');
        }
    }
    public function createCategory()
    {
        $model = new CategoryModel();

        $data = [
            'name'    => $this->request->getPost('name'),

        ];

        $model->insert($data);

        return $this->response->setJSON(['status' => 'success', 'message' => 'Category created successfully']);
    }
    public function updateCategory($id)
    {
        $model = new CategoryModel();

        $data = [
            'name'    => $this->request->getPost('name'),
        ];

        $model->update($id, $data);

        return $this->response->setJSON(['status' => 'success', 'message' => 'Category updated successfully']);
    }
    public function deleteCategory($id)
    {
        $model = new CategoryModel();
        $model->delete($id);

        return $this->response->setJSON(['status' => 'success', 'message' => 'Category deleted successfully']);
    }
}
