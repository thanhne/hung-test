<?php $this->extend('homepage') ?>
<?php $this->section('content') ?>
<h2>Customer List</h2>
<a class="btn btn-success" role="button" href="/addcustomer">Add New Customer</a>
<table class="table" border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Action</th>
    </tr>
    <?php foreach ($customers as $customer): ?>
        <tr>
            <td><?= $customer['id'] ?></td>
            <td><?= $customer['name'] ?></td>
            <td><?= $customer['email'] ?></td>
            <td><?= $customer['phone'] ?></td>
            <td><?= $customer['address'] ?></td>
            <td>
                <a href="<?= base_url('editcustomer/' . $customer['id']) ?>">Edit</a>
                |
                <a href="<?= base_url('customer/delete/' . $customer['id']) ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?php $this->endSection() ?>