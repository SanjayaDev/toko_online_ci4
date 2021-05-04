<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
	public function up()
	{
		$this->forge->addField([
			"id" => [
				"type" => "INT",
				"constraint" => 11,
				"unsigned" => TRUE,
				"auto_increment" => TRUE
			],
			"username" => [
				"type" => "varchar",
				"constraint" => 100,
			],
			"password" => [
				"type" => "TEXT"
			],
			"salt" => [
				"type" => "TEXT"
			],
			"avatar" => [
				"type" => "TEXT",
				"null" => TRUE
			],
			"role" => [
				"type" => "INT",
				"constraint" => 1,
				"default" => 1,
			],
			"created_by" => [
				"type" => "INT",
				"constraint" => 11
			],
			"created_date" => [
				"type" => "datetime"
			],
			"updated_by" => [
				"type" => "INT",
				"constraint" => 11,
				"null" => TRUE
			],
			"updated_date" => [
				"type" => "datetime",
				"null" => TRUE
			]
		]);

		$this->forge->addKey("id", TRUE);
		$this->forge->createTable("users");
	}

	public function down()
	{
		$this->forge->dropTable("users");
	}
}
