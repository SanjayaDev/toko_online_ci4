<?php

namespace App\Entities;

use CodeIgniter\Entity;

class Users extends Entity
{
	protected $datamap = [];
	protected $dates   = [
		'created_date',
		'updated_date',
	];
	protected $casts   = [];

	public function setPassword(string $password)
	{
		$salt = \uniqid("", TRUE);
		$this->attributes["salt"] = $salt;
		$this->attributes["password"] = \md5($salt.$password);

		return $this;
	}
}
