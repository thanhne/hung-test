<?php $this->extend('homepage') ?>
<?php $this->section('content') ?>
<h2>Add Customer</h2>

<?php if (session()->has('errors')): ?>
    <ul style="color: red;">
        <?php foreach (session('errors') as $error): ?>
            <li><?= esc($error) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="post" action="<?= base_url('customer/add') ?>">
    <?= csrf_field() ?>
    <div class="form-group">
        <input class="form-control" type="text" name="name" placeholder="Name" value="<?= old('name') ?>" required><br>
    </div>
    <div class="form-group">
        <input class="form-control" type="email" name="email" placeholder="Email" value="<?= old('email') ?>" required><br>
    </div>
    <div class="form-group">
        <input class="form-control" type="text" name="phone" placeholder="Phone" value="<?= old('phone') ?>" required><br>
    </div>
    <div class="form-group">
        <input class="form-control" type="text" name="address" placeholder="Address" value="<?= old('address') ?>"><br>
    </div>
    <button type="submit" class="btn btn-success">Save</button>
</form>
<?php $this->endSection() ?>