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
                        <a class="dropdown-item" href="<?= base_url('/productsList'); ?>">product List</a>
                        <a class="dropdown-item" href="<?= base_url('/addproduct'); ?>">Add product</a>
                    </div>
                </li>

                <!-- Category -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Category
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="servicesDropdown">
                        <a class="dropdown-item" href="<?= base_url('/categoriesList'); ?>">category List</a>
                        <a class="dropdown-item" href="<?= base_url('/addcategory'); ?>">Add category</a>
                    </div>
                </li>


                <!-- Customer -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="/customers" id="servicesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Customer
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="servicesDropdown">
                        <a class="dropdown-item" href="<?= base_url('/customersList'); ?>">Customer List</a>
                        <a class="dropdown-item" href="<?= base_url('/addcustomer'); ?>">Add Customer</a>
                    </div>
                </li>

                <!-- Order -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Order</a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="servicesDropdown">
                        <a class="dropdown-item" href="<?= base_url('/ordersList'); ?>">order List</a>
                        <a class="dropdown-item" href="<?= base_url('/addorder'); ?>">Add order</a>
                    </div>
                </li>

            </ul>
        </div>
    </nav>

    <div class="container d-flex flex-column gap-3">
        <?= $this->renderSection('content'); ?>
    </div>
</body>

</html>