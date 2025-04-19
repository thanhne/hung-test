<?php $this->extend('homepage') ?>
<?php $this->section('content') ?>
<h2>order List</h2>
<a class="btn btn-success" role="button" href="<?= base_url('/addorder') ?>">Add New Order</a>
<table class="table" border="1">
    <tr>
        <th>Order id</th>
        <th>Customer id</th>
        <th>Total amount</th>
        <th>status</th>
        <th>Action</th>
    </tr>
    <?php foreach ($orders as $order): ?>
        <tr>
            <td><?= $order['id'] ?></td>
            <td><?= $order['customer_id'] ?></td>
            <td><?= $order['total_amount'] ?></td>
            <td><?= $order['status'] ?></td>
            <td>
                <a href="<?= base_url('editorder/' . $order['id']) ?>">Edit</a>
                |
                <a href="<?= base_url('order/delete/' . $order['id']) ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?php $this->endSection() ?>