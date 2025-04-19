<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class OrdersSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'customer_id'  => 1,
                'total_amount' => 739.97,
                'status'       => 'pending',
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'customer_id'  => 2,
                'total_amount' => 89.97,
                'status'       => 'completed',
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'customer_id'  => 3,
                'total_amount' => 1549.98,
                'status'       => 'shipped',
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('orders')->insertBatch($data);
    }
}
