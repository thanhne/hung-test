<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CustomersSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name'       => 'Alice Smith',
                'email'      => 'alice.smith@example.com',
                'phone'      => '0123456789',
                'address'    => '123 Main St, Cityville',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name'       => 'Bob Johnson',
                'email'      => 'bob.johnson@example.com',
                'phone'      => '0987654321',
                'address'    => '456 Elm St, Townsville',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name'       => 'Carol Williams',
                'email'      => 'carol.williams@example.com',
                'phone'      => '0911223344',
                'address'    => '789 Oak St, Villageburg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('customers')->insertBatch($data);
    }
}
