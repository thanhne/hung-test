<form method="POST" action="<?= base_url('order/add') ?>">
    <!-- Select customer -->
    <label>Chọn khách hàng:</label>
    <select name="customer_id" required>
        <option value="">-- Chọn khách hàng --</option>
        <?php foreach ($customers as $customer): ?>
            <option value="<?= $customer['id'] ?>">
                <?= esc($customer['name']) ?>
            </option>
        <?php endforeach ?>
    </select>

    <hr>
    <button type="button" onclick="addProduct()">+ Thêm sản phẩm</button>

    <!-- Chọn sản phẩm -->
    <div id="product-list">
        <div class="product-item">
            <label>Mã hàng:</label>
            <select name="products[0][product_id]" onchange="onProductChange(this)" required>
                <option value="">-- Chọn mã hàng --</option>
                <?php foreach ($products as $product): ?>
                    <option value="<?= $product['id'] ?>" data-name="<?= $product['name'] ?>" data-price="<?= $product['price'] ?>">
                        <?= $product['id'] ?>
                    </option>
                <?php endforeach ?>
            </select>

            <label>Tên hàng:</label>
            <input type="text" name="products[0][name]" readonly>

            <label>Số lượng:</label>
            <input type="number" name="products[0][qty]" value="1" min="1" oninput="recalculateRow(this)">

            <label>Đơn giá:</label>
            <input type="number" name="products[0][price]" oninput="recalculateRow(this)">

            <label>Thành tiền:</label>
            <input type="number" name="products[0][subtotal]" oninput="reverseCalculate(this)">


            <button type="button" onclick="removeProduct(this)">❌</button>

        </div>
    </div>
    <p><strong>Tổng cộng:</strong> <span id="totalAmount">0</span> đ</p>
    <input type="hidden" name="total_amount" id="totalAmountField">
    <button type="submit">Đặt hàng</button>
</form>

<script>
    let productIndex = 0;
    const products = <?= json_encode($products) ?>;

    function addProduct() {
        const container = document.getElementById('product-list');
        const row = document.createElement('div');
        row.classList.add('product-item');
        row.innerHTML = `
        <hr>
        <label>Mã hàng:</label>
        <select name="products[${productIndex}][product_id]" onchange="onProductChange(this)" required>
            <option value="">-- Chọn mã --</option>
            ${products.map(p =>
                `<option value="${p.id}" data-name="${p.name}" data-price="${p.price}">${p.id}</option>`
            ).join('')}
        </select>

        <label>Tên hàng:</label>
        <input type="text" name="products[${productIndex}][name]" readonly>

        <label>Số lượng:</label>
        <input type="number" name="products[${productIndex}][qty]" min="1" value="1" oninput="recalculateRow(this)">

        <label>Đơn giá:</label>
        <input type="number" name="products[${productIndex}][price]" oninput="recalculateRow(this)">

        <label>Thành tiền:</label>
        <input type="number" name="products[${productIndex}][subtotal]" oninput="reverseCalculate(this)">

        <button type="button" onclick="removeProduct(this)">❌ Xóa</button>
    `;
        container.appendChild(row);
        productIndex++;
    }

    function onProductChange(selectEl) {
        const option = selectEl.options[selectEl.selectedIndex];
        const row = selectEl.closest('.product-item');
        row.querySelector('input[name*="[name]"]').value = option.dataset.name || '';
        row.querySelector('input[name*="[price]"]').value = option.dataset.price || '';
        recalculateRow(row.querySelector('input[name*="[price]"]'));
        updateTotal();

    }

    function recalculateRow(inputEl) {
        const row = inputEl.closest('.product-item');
        const qty = parseFloat(row.querySelector('input[name*="[qty]"]').value) || 0;
        const price = parseFloat(row.querySelector('input[name*="[price]"]').value) || 0;
        const subtotal = row.querySelector('input[name*="[subtotal]"]');
        subtotal.value = (qty * price).toFixed(0);
        updateTotal();
    }

    function reverseCalculate(inputEl) {
        const row = inputEl.closest('.product-item');
        const qty = parseFloat(row.querySelector('input[name*="[qty]"]').value) || 0;
        const subtotal = parseFloat(inputEl.value) || 0;
        const priceInput = row.querySelector('input[name*="[price]"]');
        if (qty > 0) priceInput.value = (subtotal / qty).toFixed(0);
        updateTotal();
    }


    function removeProduct(btn) {
        const row = btn.closest('.product-item');
        row.remove();
        updateTotal();
    }

    function updateTotal() {
        let total = 0;
        document.querySelectorAll('input[name*="[subtotal]"]').forEach(input => {
            total += parseFloat(input.value) || 0;
        });
        document.getElementById('totalAmount').textContent = total.toLocaleString();
        document.querySelector('input[name="total_amount"]').value = total;
    }
</script>