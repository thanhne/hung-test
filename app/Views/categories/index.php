<?php $this->extend('homepage') ?>
<?php $this->section('content') ?>
<h2>Category List</h2>
<a class="btn btn-success" role="button" href="<?= base_url('/addcategory') ?>">Add New Category</a>
<table class="table" border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Action</th>
    </tr>
    <?php foreach ($categories as $category): ?>
        <tr>
            <td><?= $category['id'] ?></td>
            <td><?= $category['name'] ?></td>
            <td>
                <a href="<?= base_url('editcategory/' . $category['id']) ?>">Edit</a>
                |
                <a href="<?= base_url('category/delete/' . $category['id']) ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?php $this->endSection() ?>