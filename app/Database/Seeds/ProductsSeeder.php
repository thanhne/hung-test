<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'category_id' => 1,
                'name'       => 'Smartphone',
                'description' => 'Latest model smartphone with high-resolution display',
                'price'      => 699.99,
                'image'      => 'smartphone.jpg',
                'stock'      => 50,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'category_id' => 2,
                'name'       => 'Novel Book',
                'description' => 'A popular fiction novel',
                'price'      => 19.99,
                'image'      => 'book.jpg',
                'stock'      => 200,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'category_id' => 3,
                'name'       => 'T-Shirt',
                'description' => '100% cotton T-Shirt',
                'price'      => 29.99,
                'image'      => 'tshirt.jpg',
                'stock'      => 150,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'category_id' => 1,
                'name'       => 'Laptop',
                'description' => 'Powerful gaming laptop',
                'price'      => 1499.99,
                'image'      => 'laptop.jpg',
                'stock'      => 20,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'category_id' => 3,
                'name'       => 'Jeans',
                'description' => 'Denim jeans for everyday wear',
                'price'      => 49.99,
                'image'      => 'jeans.jpg',
                'stock'      => 100,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('products')->insertBatch($data);
    }
}
