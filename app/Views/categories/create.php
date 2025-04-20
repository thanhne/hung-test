<?php $this->extend('homepage') ?>
<?php $this->section('content') ?>
<h2>Add Category</h2>

<?php if (session()->has('errors')): ?>
    <ul style="color: red;">
        <?php foreach (session('errors') as $error): ?>
            <li><?= esc($error) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="post" action="<?= base_url('category/add') ?>">
    <?= csrf_field() ?>
    <div class="form-group">
        <input class="form-control" type="text" name="name" placeholder="name" value="<?= old('name') ?>" required></p>
    </div>
    <button type="submit" class="btn btn-success">Save</button>
</form>

<?php $this->endSection() ?>