<?php $this->extend('homepage') ?>
<?php $this->section('content') ?>
<h2>Edit Customer</h2>

<?php if (session()->has('errors')): ?>
    <ul style="color: red;">
        <?php foreach (session('errors') as $error): ?>
            <li><?= esc($error) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="post" action="<?= base_url('customer/edit/' . $customer['id']) ?>">
    <div class="form-group">
        <input class="form-control" type="text" name="name" placeholder="Name" value="<?= esc($customer['name']) ?>"><br>
    </div>
    <div class="form-group">
        <input class="form-control" type="email" name="email" placeholder="Email" value="<?= esc($customer['email']) ?>"><br>
    </div>
    <div class="form-group">
        <input class="form-control" type="text" name="phone" placeholder="Phone" value="<?= esc($customer['phone']) ?>"><br>
    </div>
    <div class="form-group">
        <input class="form-control" type="text" name="address" placeholder="Address" value="<?= esc($customer['address']) ?>"><br>
    </div>
    <button type="submit" class="btn btn-success">Save</button>
</form>
<?php $this->endSection() ?>