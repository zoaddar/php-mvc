<?php

class DB {
	private static $connect = null;

	function __construct() {
	}

	public static function prefix() {
		return getenv('DB_PREFIX');
	}
	public static function suffix() {
		return getenv('DB_SUFFIX');
	}

	public static function connect() {
		if(is_null(self::$connect)) {
			$host = getenv('DB_HOST');
			$name = getenv('DB_NAME');
			$user = getenv('DB_USER');
			$pass = getenv('DB_PASS');

			try {
				$conn = new PDO("mysql:host={$host};dbname={$name}", $user, $pass);
			} catch(PDOException $e) {
				error($e->getMessage(), 'sql');
			}
			self::$connect = $conn;
		}
		return self::$connect;
	}

	public static function query($sql) {
		try {
			$req = self::connect()->prepare($sql);
		} catch(PDOException $e) {
			error($e->getMessage(), 'sql');
		}
		return $req;
	}

	public static function select($sql) {
		try {
			$req = self::query($sql);
			$req->execute();
			if($req->errorInfo()[0] != 00000) {
				throw new PDOException("#". $req->errorInfo()[1] ." - ". $req->errorInfo()[2]);
			}
			$res = $req->fetchAll();
		} catch(PDOException $e) {
			error("<b>SQL query:</b> {$sql}<br><br>". $e->getMessage(), 'sql');
		}
		return $res;
	}
}