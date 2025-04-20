<?php $this->extend('homepage') ?>
<?php $this->section('content') ?>
<h2>Edit Product</h2>

<?php if (session()->has('errors')): ?>
    <ul style="color: red;">
        <?php foreach (session('errors') as $error): ?>
            <li><?= esc($error) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="post" action="<?= base_url('product/edit/' . $product['id']) ?>" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <div class="form-group">
        <input class="form-control" type="text" name="name" placeholder="name" value="<?= esc($product['name']) ?>" required></p>
    </div>
    <div class="form-group col-md-6">
        <select name="category_id" class="form-control" required>
            <option value="">-- Chọn danh mục --</option>
            <?php foreach ($categories as $cat): ?>
                <option value="<?= $cat['id'] ?>"
                    <?= ($cat['id'] == $product['category_id']) ? 'selected' : '' ?>>
                    <?= esc($cat['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <input class="form-control" type="number" step="0.01" name="price" placeholder="price" value="<?= esc($product['price']) ?>" required><br>
    </div>
    <div class="form-group">
        <input class="form-control" type="number" name="stock" placeholder="stock" value="<?= esc($product['stock']) ?>" required><br>
    </div>
    <div class="form-group">
        <input class="form-control" type="arena" name="description" placeholder="description" value="<?= esc($product['description']) ?>" required><br>
    </div>

    <div class="form-group">
        <label for="image">Choose</label>
        <input type="file" name="image" class="form-control">
    </div>

    <?php if (!empty($product['image'])): ?>
        <div class="form-group">
            <label>Hình hiện tại:</label><br>
            <img id="preview" src="<?= base_url('public/Assets/' . $product['image']) ?>" alt="Ảnh" width="100">
        </div>
    <?php endif; ?>
    <button type="submit" class="btn btn-success">Save</button>
</form>

<script>
    const imageInput = document.getElementById('imageInput');
    const preview = document.getElementById('preview');

    imageInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('d-none');
            }
            reader.readAsDataURL(file);
        } else {
            preview.src = '';
            preview.classList.add('d-none');
        }
    });
</script>

<?php $this->endSection() ?>