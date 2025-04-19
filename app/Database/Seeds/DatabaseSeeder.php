<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call('App\Database\Seeds\CategoriesSeeder');
        $this->call('App\Database\Seeds\ProductsSeeder');
        $this->call('App\Database\Seeds\CustomersSeeder');
        $this->call('App\Database\Seeds\OrdersSeeder');
        $this->call('App\Database\Seeds\OrderItemsSeeder');
    }
}
