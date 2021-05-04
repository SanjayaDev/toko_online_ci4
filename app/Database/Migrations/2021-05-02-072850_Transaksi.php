<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transaksi extends Migration
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
			"id_barang" => [
				"type" => "INT",
				"constraint" => 11,
				"unsigned" => TRUE
			],
			"id_pembeli" => [
				"type" => "INT",
				"constraint" => 11,
				"unsigned" => TRUE
			],
			"jumlah" => [
				"type" => "INT",
				"constraint" => 11
			],
			"total_harga" => [
				"type" => "INT",
				"constraint" => 11
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
		$this->forge->addForeignKey("id_pembeli", "users", "id", "cascade", "restrict");
		$this->forge->addForeignKey("id_barang", "barang", "id", "cascade", "restrict");
		$this->forge->createTable("transaksi");
	}

	public function down()
	{
		$this->forge->dropTable("transaksi");
	}
}
