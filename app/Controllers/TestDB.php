<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Database;

class TestDB extends BaseController
{
    public function index()
    {
        $db = Database::connect();
        var_dump($db);
        
        if ($db->connID) {
            echo "Kết nối database thành công!";

        } else {
            echo "Kết nối thất bại!";
        }
        log_message('debug', 'Database Connection ID: ' . var_export($db->connID, true));
    }
}
