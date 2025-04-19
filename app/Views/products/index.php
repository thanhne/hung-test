<?php $this->extend('homepage') ?>
<?php $this->section('content') ?>
<h2>Product List</h2>
<a class="btn btn-success" role="button" href="<?= base_url('/addproduct') ?>">Add New Customer</a>
<table class="table" border="1">
    <tr>
        <th>ID</th>
        <th>IMG</th>
        <th>Name</th>
        <th>description</th>
        <th>price</th>
        <th>stock</th>
        <th>Action</th>
    </tr>
    <?php foreach ($products as $product): ?>
        <tr>
            <td><?= $product['id'] ?></td>
            <td><?= $product['image'] ?></td>
            <td><?= $product['name'] ?></td>
            <td><?= $product['description'] ?></td>
            <td><?= $product['price'] ?></td>
            <td><?= $product['stock'] ?></td>
            <td>
                <a href="<?= base_url('editproduct/' . $product['id']) ?>">Edit</a>
                |
                <a href="<?= base_url('product/delete/' . $product['id']) ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?php $this->endSection() ?>