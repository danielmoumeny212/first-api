<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['role','fullname', 'email', 'password',];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'role'      => 'required',
        'fullname'  => 'required|min_length[3]|max_length[255]',
        'email'     => 'required|valid_email|is_unique[users.email]',
        'password'  => 'required|min_length[6]',
    ];
    protected $validationMessages   = [
        'role' => [
            'required' => 'Vous devez donnez un role à l\'utilisateur',
            // 'in_list'  => 'Le champ {field} doit être l\'un des rôles suivants : admin, moderator, user.'
        ],
        'fullname' => [
            'required' => 'Vous devez entrer le nom de l\'utilisateur.',
            'valid_email' => 'Vous devez entrer un email valide.',
            'is_unique' => 'L\'adresse e-mail fournie est déjà utilisée.'
        ],
        'email' => [
            'required' => 'Vous devez entrer un email valide.',
            'min_length' => 'Le nom doit avoir minimum 3 caractères.',
            'max_length' => 'Le nom ne doit pas dépasser 255 caractères.'
        ],
        'password' => [
            'required' => 'Le mot de passe est obligatoire.',
            'min_length' => 'Le mot de passe doit avoir minimum 6 caractères.',
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
}
