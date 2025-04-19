<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\CustomerModel;


class CustomerController extends BaseController
{
    // Pages Open
    public function index()
    {
        $model = new CustomerModel();
        $data['customers'] = $model->findAll();
        return view('customers/index', $data);
    }
    public function createindex()
    {
        return view('customers/create');
    }
    public function editindex($id)
    {
        $model = new CustomerModel();
        $data['customer'] = $model->find($id);
        return view('customers/edit', $data);
    }

    // Create, Edit, Delete

    public function create()
    {

        $model = new CustomerModel();
        $data = [
            'name'    => $this->request->getPost('name'),
            'email'   => $this->request->getPost('email'),
            'phone'   => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address')
        ];

        if (!$model->validateCustomer($data)) {
            return view('customers/create', [
                'validation' => $model->errors()
            ]);
        }
        $model->save($data);
        return redirect()->to('/customersList');
    }
    public function edit($id)
    {
        $model = new CustomerModel();
        $data = [
            'name'    => $this->request->getPost('name'),
            'email'   => $this->request->getPost('email'),
            'phone'   => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address')
        ];
        if (!$model->validateupdateCustomer($id, $data)) {
            return view('customers/edit', [
                'validation' => $model->errors(),
                'customer' => $data,
            ]);
        }
        return redirect()->to('/customersList')->with('message', 'Customer updated successfully!');
    }

    public function delete($id)
    {
        $model = new CustomerModel();
        $model->delete($id);
        return redirect()->to('/customersList');
    }
}
