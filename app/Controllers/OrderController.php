<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ProductModel;
use App\Models\CustomerModel;
use App\Models\OrderModel;
use App\Models\OrderItemModel;

class OrderController extends BaseController
{
    public function index()
    {
        $model = new OrderModel();
        $data['orders'] = $model->findAll();
        return view('orders/index', $data);
    }
    public function createindex()
    {
        $productModel = new ProductModel();
        $customerModel = new CustomerModel();
        $data['products'] = $productModel->findAll();
        $data['customers'] = $customerModel->findAll();
        return view('orders/create', $data);
    }
    public function editindex($id)
    {
        $productModel = new ProductModel();
        $customerModel = new CustomerModel();
        $orderModel = new OrderModel();
        $orderItemModel = new OrderItemModel();
        $data['products'] = $productModel->findAll();
        $data['customers'] = $customerModel->findAll();
        $data['order'] = $orderModel->find($id);
        $data['order_items'] = $orderItemModel->where('order_id', $id)->findAll();
        return view('orders/edit', $data);
    }

    public function create()
    {
        $customerId = $this->request->getPost('customer_id');
        $products = $this->request->getPost('products');
        $totalAmount = $this->request->getPost('total_amount');

        $orderId = $this->createOrder($customerId, $totalAmount);

        $this->createOrderItems($orderId, $products);


        return redirect()->to('/ordersList')->with('message', 'Đơn hàng đã được tạo thành công!');
    }
    public function createOrder($customerId, $total_amount)
    {
        $orderModel = new OrderModel();

        return $orderModel->insert([
            'customer_id' => $customerId,
            'total_amount' => $total_amount,
            'status' => 'pending'
        ]);
    }
    public function createOrderItems($orderId, $items)
    {
        $orderItemModel = new OrderItemModel();
        $totalAmount = 0;

        foreach ($items as $item) {
            $price = floatval($item['price']);
            $qty = intval($item['qty']);
            $subtotal = $price * $qty;
            $totalAmount += $subtotal;

            $orderItemModel->insert([
                'order_id' => $orderId,
                'product_id' => $item['product_id'],
                'quantity' => $qty,
                'price' => $price,
            ]);
        }
    }
    public function edit($id)
    {
        $orderModel = new OrderModel();
        $orderItemModel = new OrderItemModel();

        $customerId = $this->request->getPost('customer_id');
        $products = $this->request->getPost('products');

        // 1. Cập nhật lại order chính
        $orderModel->update($id, [
            'customer_id' => $customerId,
            'status' => 'pending'
        ]);

        // 2. Xoá tất cả order_item cũ
        $orderItemModel->where('order_id', $id)->delete();

        $totalAmount = 0;
        foreach ($products as $item) {
            $price = floatval($item['price']);
            $qty = intval($item['qty']);
            $subtotal = $price * $qty;
            $totalAmount += $subtotal;

            $orderItemModel->insert([
                'order_id' => $id,
                'product_id' => $item['product_id'],
                'quantity' => $qty,
                'price' => $price,
            ]);
        }
        $orderModel->update($id, ['total_amount' => $totalAmount]);

        return redirect()->to('/ordersList')->with('message', 'Đơn hàng đã được cập nhật');
    }

    public function delete($id)
    {
        $orderModel = new OrderModel();
        $orderItemModel = new OrderItemModel();
        $orderItemModel->where('order_id', $id)->delete();
        $orderModel->delete($id);
        return redirect()->to('/ordersList')->with('message', 'Đã xóa đơn hàng thành công.');
    }
}
