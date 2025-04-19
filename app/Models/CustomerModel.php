<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table            = 'customers';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = ['name', 'email', 'phone', 'address'];


    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules = [
        'name'    => 'required|min_length[3]|max_length[100]',
        'email'   => 'required|valid_email|max_length[100]',
        'phone'   => 'required|regex_match[/^[0-9]{10,15}$/]',
        'address' => 'required|max_length[255]',
    ];

    protected $validationMessages = [
        'name' => [
            'required'    => 'Name is required.',
            'min_length'  => 'Name must be at least 3 characters.',
            'max_length'  => 'Name must not exceed 100 characters.',
        ],
        'email' => [
            'required'    => 'Email is required.',
            'valid_email' => 'Enter a valid email address.',
        ],
        'phone' => [
            'required'     => 'Phone number is required.',
            'regex_match'  => 'Phone number must be 10–15 digits.',
        ],
        'address' => [
            'required'   => 'Address is required.',
            'max_length' => 'Address cannot exceed 255 characters.',
        ],
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
    public function validateCustomer($data)
    {
        if ($this->validate($this->validationRules)) {
            return true;
        }

        return $this->errors();
    }
    public function validateupdateCustomer($id, $data)
    {

        if ($this->validateCustomer($data)) {
            $this->update($id, $data);
            return true;
        }
        return false;
    }
}
