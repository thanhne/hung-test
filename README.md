## 🎯 Yêu cầu bài tập:
Xây dựng một hệ thống quản lý bán hàng với các chức năng:

Quản lý sản phẩm (CRUD)

Quản lý danh mục sản phẩm

Quản lý đơn hàng

Quản lý khách hàng

Hiển thị danh sách sản phẩm cho khách xem

## Gợi ý
#### 1. Controllers:
ProductController (Danh sách, thêm/sửa/xóa sản phẩm)

CategoryController (Quản lý danh mục)

OrderController (Danh sách đơn hàng, chi tiết đơn hàng)

CustomerController (Quản lý khách hàng)
#### 2.1. DB:
-- Bảng danh mục sản phẩm
categories (
    id,
    name,
    created_at,
    updated_at)

-- Bảng sản phẩm
products (
    id,
    category_id,
    name,
    description,
    price,
    image,
    stock,
    created_at,
    updated_at)

-- Bảng khách hàng
customers (
    id,
    name,
    email,
    phone,
    address,
    created_at,
    updated_at)

-- Bảng đơn hàng
orders (
    id,
    customer_id,
    total_amount,
    status,
    created_at,
    updated_at)

-- Bảng chi tiết đơn hàng
order_items (
    id,
    order_id,
    product_id,
    quantity,
    price)



#### 2.2. Models:
ProductModel

CategoryModel

OrderModel

OrderItemModel

CustomerModel

#### 3. Views:
Sử dụng View để hiển thị danh sách sản phẩm, thêm sửa form, đơn hàng, v.v…


## Yêu Cầu:

Sử dụng CI4, tạo migration. tạo db seeder cho các bảng, Phân tích và chọn foriegn key primary key.

Tạo restAPI. Tạo controller với các chức năng cơ bản CRUD

Tạo các View giao diện đơn giản (có thể dùng Bootstrap)

Tạo trang chủ hiển thị danh sách sản phẩm cho khách

Tạo chức năng đặt hàng đơn giản (chọn sản phẩm, nhập thông tin khách hàng)
