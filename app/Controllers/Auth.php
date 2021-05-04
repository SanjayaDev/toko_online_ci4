<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Entities\Users;

class Auth extends BaseController
{
	public function register()
	{
		if ($this->request->getPost()) {
			$input = $this->request->getPost();
			$this->validation->run($input, "register");
			$errors = $this->validation->getErrors();

			if (!$errors) {
				$user_model = new UserModel();
				$user = new Users();
				$user->username = $input["username"];
				$user->password = $input["password"];

				$user->created_by = 0;
				$user_model->save($user);

				return view("login");
			}

			$this->session->setFlashdata("errors", $errors);			
		}
		return view("register");
	}

	public function login()
	{
		if ($this->request->getPost()) {
			$input = $this->request->getPost();
			$this->validation->run($input, "login");
			$errors = $this->validation->getErrors();

			if (!$errors) {
				$user_model = new UserModel();
				$username = $input["username"];
				$password = $input["password"];

				$user = $user_model->where("username", $username)->first();
				if ($user) {
					$salt = $user->salt;
					if ($user->password !== md5($salt . $password)) {
						$this->session->setFlashdata("errors", ["Password salah!"]);
					} else {
						$session_data = [
							"username" => $user->username,
							"id" => $user->id,
							"is_login" => TRUE
						];

						$this->session->set($session_data);

						return \redirect()->to(\site_url("home/index"));
					}
				} else {
					$this->session->setFlashdata("errors", ["User tidak ditemukan!"]);
				}
			} else {
				$this->session->setFlashdata("errors", $errors);
			}
		}
		return \view("login");
	}

	public function logout() 
	{
		$this->session->destroy();
		return \redirect()->to("login");
	}
}
