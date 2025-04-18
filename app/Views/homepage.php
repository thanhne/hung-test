<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to CodeIgniter 4!</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <!-- Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery và Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>  
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="<?= base_url(); ?>">MySite</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto">

            <!-- Trang chủ -->
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url(); ?>">Home</a>
            </li>

            <!-- Product -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Product</a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="servicesDropdown">
                    <a class="dropdown-item" href="<?= base_url('services/mobile'); ?>">Product List</a>
                    <a class="dropdown-item" href="<?= base_url('services/web'); ?>">Add Product</a>
                    <a class="dropdown-item" href="<?= base_url('services/mobile'); ?>">Edit Product</a>
                </div>
            </li>

            <!-- Category -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Category
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="servicesDropdown">
                    <a class="dropdown-item" href="<?= base_url('services/mobile'); ?>">Category List</a>
                    <a class="dropdown-item" href="<?= base_url('services/web'); ?>">Add Category</a>
                    <a class="dropdown-item" href="<?= base_url('services/mobile'); ?>">Edit Category</a>
                </div>
            </li>


            <!-- Customer -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Customer
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="servicesDropdown">
                    <a class="dropdown-item" href="<?= base_url('services/mobile'); ?>">Customer List</a>
                    <a class="dropdown-item" href="<?= base_url('services/web'); ?>">Add Customer</a>
                    <a class="dropdown-item" href="<?= base_url('services/mobile'); ?>">Edit Customer</a>
                </div>
            </li>

            <!-- Order -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Order</a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="servicesDropdown">
                    <a class="dropdown-item" href="<?= base_url('services/mobile'); ?>">Order List</a>
                    <a class="dropdown-item" href="<?= base_url('services/web'); ?>">Add Order</a>
                    <a class="dropdown-item" href="<?= base_url('services/mobile'); ?>">Edit Order</a>
                </div>
            </li>

        </ul>
    </div>
</nav>

<footer>
</footer>



</body>
</html>
