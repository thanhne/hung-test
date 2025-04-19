<?php $this->extend('homepage') ?>
<?php $this->section('content') ?>
<h2>Add Product</h2>

<?php if (session()->has('errors')): ?>
    <ul style="color: red;">
        <?php foreach (session('errors') as $error): ?>
            <li><?= esc($error) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="post" action="<?= base_url('product/edit/' . $product['id']) ?>">
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
        <input class="form-control" type="number" step="0.01" name="price" placeholder="price" value="<?= esc($product['price']) ?>"><br>
    </div>
    <div class="form-group">
        <input class="form-control" type="number" name="stock" placeholder="stock" value="<?= esc($product['stock']) ?>" required><br>
    </div>
    <div class="form-group">
        <input class="form-control" type="arena" name="description" placeholder="description" value="<?= esc($product['description']) ?>" required><br>
    </div>
    <div class="form-group">
        <input class="form-control" type="file" name="image" id="imageInput" value="<?= esc($product['image']) ?>"><br>
    </div>
    <div class="mb-3">
        <img id="preview" class="img-fluid rounded border d-none" alt="Ảnh xem trước">
    </div>
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