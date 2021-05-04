<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
	protected $table                = 'users';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $returnType           = 'App\Entities\Users';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = ["username", "avatar", "password", "salt", "created_by", "updated_by"];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_date';
	protected $updatedField         = 'updated_date';
}
