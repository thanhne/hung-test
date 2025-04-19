<form method="post" action="<?= base_url('order/edit/' . $order['id']) ?>">
    <label>Khách hàng:</label>
    <select name="customer_id">
        <?php foreach ($customers as $c): ?>
            <option value="<?= $c['id'] ?>" <?= $c['id'] == $order['customer_id'] ? 'selected' : '' ?>>
                <?= $c['name'] ?>
            </option>
        <?php endforeach ?>
    </select>

    <label>Trạng thái:</label>
    <select name="status">
        <option value="pending" <?= $order['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
        <option value="completed" <?= $order['status'] == 'completed' ? 'selected' : '' ?>>Compelte</option>
        <option value="canceled" <?= $order['status'] == 'canceled' ? 'selected' : '' ?>>Cancel</option>
    </select>

    <hr>

    <table id="order-items">
        <thead>
            <tr>
                <th>Sản phẩm</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Thành tiền</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($order_items as $index => $item): ?>
                <tr>
                    <td>
                        <select name="products[<?= $index ?>][product_id]" class="product-select">
                            <?php foreach ($products as $p): ?>
                                <option value="<?= $p['id'] ?>" <?= $p['id'] == $item['product_id'] ? 'selected' : '' ?>>
                                    <?= $p['name'] ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </td>
                    <td><input type="number" name="products[<?= $index ?>][qty]" value="<?= $item['quantity'] ?>" class="qty-input" /></td>
                    <td><input type="number" name="products[<?= $index ?>][price]" value="<?= $item['price'] ?>" class="price-input" /></td>
                    <td><input type="number" class="subtotal" readonly /></td>
                    <td><button type="button" class="remove-row">X</button></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <button type="button" id="add-row">+ Thêm dòng</button>

    <hr>
    <strong>Tổng cộng: </strong><span id="total-amount">0</span> đ

    <br><br>
    <button type="submit">Cập nhật đơn hàng</button>
</form>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        function updateSubtotal(row) {
            const qty = parseFloat(row.querySelector('.qty-input').value) || 0;
            const price = parseFloat(row.querySelector('.price-input').value) || 0;
            row.querySelector('.subtotal').value = qty * price;
            updateTotal();
        }

        function updateTotal() {
            let total = 0;
            document.querySelectorAll('.subtotal').forEach(input => {
                total += parseFloat(input.value) || 0;
            });
            document.getElementById('total-amount').innerText = total.toLocaleString();
        }

        // Auto-calculate when quantity or price changes
        document.querySelectorAll('.qty-input, .price-input').forEach(input => {
            input.addEventListener('input', function() {
                updateSubtotal(this.closest('tr'));
            });
        });

        // Recalculate on load
        document.querySelectorAll('tbody tr').forEach(row => updateSubtotal(row));

        // Remove row
        document.querySelectorAll('.remove-row').forEach(btn => {
            btn.addEventListener('click', function() {
                this.closest('tr').remove();
                updateTotal();
            });
        });

        // Add new row
        document.getElementById('add-row').addEventListener('click', function() {
            const index = document.querySelectorAll('#order-items tbody tr').length;
            const row = document.createElement('tr');
            row.innerHTML = `
            <td>
                <select name="products[${index}][product_id]" class="product-select">
                    <?php foreach ($products as $p): ?>
                        <option value="<?= $p['id'] ?>"><?= $p['name'] ?></option>
                    <?php endforeach ?>
                </select>
            </td>
            <td><input type="number" name="products[${index}][qty]" value="1" class="qty-input" /></td>
            <td><input type="number" name="products[${index}][price]" value="0" class="price-input" /></td>
            <td><input type="number" class="subtotal" readonly /></td>
            <td><button type="button" class="remove-row">X</button></td>
        `;
            document.querySelector('#order-items tbody').appendChild(row);

            row.querySelectorAll('.qty-input, .price-input').forEach(input => {
                input.addEventListener('input', () => updateSubtotal(row));
            });

            row.querySelector('.remove-row').addEventListener('click', () => {
                row.remove();
                updateTotal();
            });

            updateSubtotal(row);
        });
    });
</script>