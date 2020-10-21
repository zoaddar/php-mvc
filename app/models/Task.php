<?php
class Task extends Model {

	public function showAllTasks() {
		$sql = "SELECT * FROM ".DB::prefix()."expense";
		return DB::select($sql);
	}

	public function create($title, $description) {
		$sql = "INSERT INTO ".DB::prefix()."expense (invoice, name, description, created_at, updated_at) VALUES (:invoice, :name, :description, :created_at, :updated_at)";
		$req = DB::query($sql);

		return $req->execute([
			'invoice' => rand(),
			'name' => $title,
			'description' => $description,
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		]);
	}

	public function showTask($id) {
		$sql = "SELECT * FROM ".DB::prefix()."expense WHERE id =" . $id;
		return DB::select($sql);
	}

	public function edit($id, $title, $description) {
		$sql = "UPDATE ".DB::prefix()."expense SET name = :name, description = :description , updated_at = :updated_at WHERE id = :id";
		$req = DB::query($sql)->execute([
			'id' => $id,
			'name' => $title,
			'description' => $description,
			'updated_at' => date('Y-m-d H:i:s')
		]);
		return $req;
	}

	public function delete($id) {
		$sql = "DELETE FROM ".DB::prefix()."expense WHERE id = ?";
		$req = DB::query($sql);
		return $req->execute([$id]);
	}
}
?>