<?php

namespace App\Controllers\API;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\CustomerModel;


class CustomerAPIController extends BaseController
{

    public function getAllCustomers()
    {
        $model = new CustomerModel();
        $customers = $model->findAll();

        return $this->response->setJSON($customers);
    }
    public function getCustomerById($id)
    {
        $model = new CustomerModel();
        $customer = $model->find($id);

        if ($customer) {
            return $this->response->setJSON($customer);
        } else {
            return $this->response->setStatusCode(ResponseInterface::HTTP_NOT_FOUND, 'Customer not found');
        }
    }
    public function createCustomer()
    {
        $model = new CustomerModel();

        $data = [
            'name'    => $this->request->getPost('name'),
            'email'   => $this->request->getPost('email'),
            'phone'   => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address'),
        ];

        $model->insert($data);

        return $this->response->setJSON(['status' => 'success', 'message' => 'Customer created successfully']);
    }
    public function updateCustomer($id)
    {
        $model = new CustomerModel();

        $data = [
            'name'    => $this->request->getPost('name'),
            'email'   => $this->request->getPost('email'),
            'phone'   => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address'),
        ];


        $model->update($id, $data);

        return $this->response->setJSON(['status' => 'success', 'message' => 'Customer updated successfully']);
    }
    public function deleteCustomer($id)
    {
        $model = new CustomerModel();
        $model->delete($id);

        return $this->response->setJSON(['status' => 'success', 'message' => 'Customer deleted successfully']);
    }
}
