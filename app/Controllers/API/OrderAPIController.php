<?php

namespace App\Controllers\API;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\OrderModel;
use App\Models\OrderItemModel;

class OrderAPIController extends BaseController
{
    public function getAllOrders()
    {
        $orderModel = new OrderModel();
        $orders = $orderModel->findAll();

        return $this->response->setJSON([
            'status' => 'success',
            'data' => $orders
        ]);
    }

    public function getOrderById($id)
    {
        $orderModel = new OrderModel();
        $orderItemModel = new OrderItemModel();

        $order = $orderModel->find($id);
        if (!$order) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Order not found'
            ], 404);
        }

        $orderItems = $orderItemModel->where('order_id', $id)->findAll();

        return $this->response->setJSON([
            'status' => 'success',
            'data' => [
                'order' => $order,
                'order_items' => $orderItems
            ]
        ]);
    }

    public function createOrder()
    {
        $validation =  \Config\Services::validation();

        // Validate data
        if (!$this->validate([
            'customer_id' => 'required|integer',
            'status' => 'required|string',
            'products' => 'required|array'
        ])) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => $validation->getErrors()
            ], 400);
        }

        $orderModel = new \App\Models\OrderModel();
        $orderItemModel = new \App\Models\OrderItemModel();

        // Create new order
        $orderData = [
            'customer_id' => $this->request->getVar('customer_id'),
            'status' => $this->request->getVar('status'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        // Insert order
        $orderId = $orderModel->insert($orderData);

        // Insert order items
        $products = $this->request->getVar('products');
        foreach ($products as $product) {
            $orderItemModel->insert([
                'order_id' => $orderId,
                'product_id' => $product['product_id'],
                'quantity' => $product['quantity'],
                'price' => $product['price']
            ]);
        }

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Order created successfully',
            'order_id' => $orderId
        ]);
    }

    public function updateOrder($id)
    {
        $validation = \Config\Services::validation();

        // Validate data
        if (!$this->validate([
            'customer_id' => 'required|integer',
            'status' => 'required|string',
            'products' => 'required|array'
        ])) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => $validation->getErrors()
            ], 400);
        }

        $orderModel = new \App\Models\OrderModel();
        $orderItemModel = new \App\Models\OrderItemModel();

        $orderData = [
            'customer_id' => $this->request->getVar('customer_id'),
            'status' => $this->request->getVar('status'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $order = $orderModel->find($id);
        if (!$order) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Order not found'
            ], 404);
        }

        $orderModel->update($id, $orderData);

        $orderItemModel->where('order_id', $id)->delete();

        $products = $this->request->getVar('products');
        foreach ($products as $product) {
            $orderItemModel->insert([
                'order_id' => $id,
                'product_id' => $product['product_id'],
                'quantity' => $product['quantity'],
                'price' => $product['price']
            ]);
        }

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Order updated successfully'
        ]);
    }

    public function deleteOrder($id)
    {
        $orderModel = new OrderModel();
        $orderItemModel = new OrderItemModel();

        $order = $orderModel->find($id);
        if (!$order) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Order not found'
            ], 404);
        }

        $orderItemModel->where('order_id', $id)->delete();
        $orderModel->delete($id);

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Order deleted successfully'
        ]);
    }
}
