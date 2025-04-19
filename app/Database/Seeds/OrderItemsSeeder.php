<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class OrderItemsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'order_id'   => 1,
                'product_id' => 1,
                'quantity'   => 1,
                'price'      => 699.99,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'order_id'   => 1,
                'product_id' => 2,
                'quantity'   => 2,
                'price'      => 19.99,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'order_id'   => 2,
                'product_id' => 3,
                'quantity'   => 3,
                'price'      => 29.99,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'order_id'   => 3,
                'product_id' => 4,
                'quantity'   => 1,
                'price'      => 1499.99,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'order_id'   => 3,
                'product_id' => 5,
                'quantity'   => 1,
                'price'      => 49.99,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('order_items')->insertBatch($data);
    }
}
