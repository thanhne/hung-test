<?php

namespace App\Controllers\API;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ProductModel;

class ProductAPIController extends BaseController
{
    public function getAllProducts()
    {
        $model = new ProductModel();
        $products = $model->findAll();

        return $this->response->setJSON($products);
    }
    public function getProductById($id)
    {
        $model = new ProductModel();
        $product = $model->find($id);

        if ($product) {
            return $this->response->setJSON($product);
        } else {
            return $this->response->setStatusCode(ResponseInterface::HTTP_NOT_FOUND, 'Product not found');
        }
    }
    public function createProduct()
    {
        $model = new ProductModel();

        $data = [
            'name'    => $this->request->getPost('name'),
            'email'   => $this->request->getPost('email'),
            'phone'   => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address'),
        ];

        $model->insert($data);

        return $this->response->setJSON(['status' => 'success', 'message' => 'Product created successfully']);
    }
    public function updateProduct($id)
    {
        $model = new ProductModel();

        $data = [
            'name'    => $this->request->getPost('name'),
            'email'   => $this->request->getPost('email'),
            'phone'   => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address'),
        ];

        $model->update($id, $data);

        return $this->response->setJSON(['status' => 'success', 'message' => 'Product updated successfully']);
    }
    public function deleteProduct($id)
    {
        $model = new ProductModel();
        $model->delete($id);

        return $this->response->setJSON(['status' => 'success', 'message' => 'Product deleted successfully']);
    }
}
