<?php

//öröklés a Db_object Class-tól
class User extends Db_object {

	protected static $db_table = "users";

	// CRUD-hoz ezek kellenek (db fields)
	protected static $db_table_fields = array('username', 'password', 'first_name', 'last_name', 'user_image');

	// property names must match db column names
	public $id;
	public $username;
	public $password;
	public $first_name;
	public $last_name;
	public $user_image;
	
	public $upload_directory = "images";
	public $image_placeholder = "http://placehold.it/400x400&text=image";

	// file upload only, no create / save
	public function upload_photo() {

		if(!empty($this->errors)) {

			// ha volt valami hiba
			return false;

		}

		if(empty($this->user_image) || empty($this->tmp_path)) {
			$this->errors[] = "the file was not available";
			return false;
		}

		// pl. Cars.jpeg
		$target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->user_image;

		// ha a feltöltendő file már létezik a szerveren
		if(file_exists($target_path)) {
			$this->errors[] = "The file {$this->user_image} already exists";
			return false;
		}

		// this fn returns true or false
		if(move_uploaded_file($this->tmp_path, $target_path)) {

			// if($this->create()) {
				unset($this->tmp_path);
				return true;
			// }

		} else {
			$this->errors[] = "the file directory probably does not have permission";
			return false;
		}

	}

	public function image_path_and_placeholder() {

		// ha ures akkor placeholder, ha nem, akkor az eredeti kep
		return empty($this->user_image) ? $this->image_placeholder : $this->upload_directory.DS.$this->user_image;
	}

	public static function verify_user($username, $password){
		global $database;

		$username = $database->escape_string($username);
		$password = $database->escape_string($password);

		$sql = "SELECT * FROM  " . self::$db_table . " WHERE ";
		$sql .= "username = '{$username}' ";
		$sql .= "AND password = '{$password}' ";
		$sql .= "LIMIT 1";

		$the_result_array = self::find_by_query($sql);

		// returns the logged in user as an object, or false...
		return !empty($the_result_array) ? array_shift($the_result_array) : false;

	}

	public function ajax_save_user_image($user_image, $user_id) {

		global $database;

		$user_image = $database->escape_string($user_image);
		$user_id = $database->escape_string($user_id);

		$this->user_image = $user_image;
		$this->id = $user_id;

		// updating only user image column so the rest of user data wont get lost
		$sql = "UPDATE " . self::$db_table . " SET user_image = '{$this->user_image}' ";
		$sql .= " WHERE id = {$this->id}";
		$update_image = $database->query($sql);

		echo $this->image_path_and_placeholder(); // echo user image path

	}

	public function delete_photo() {

		if($this->delete()) { // delete from db

			$target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->user_image; // admin/images/filename

			return unlink($target_path) ? true : false; // delete file

		} else {

			return false;

		}

	}

	// find photos related to specific user
	public function photos() {

		return Photo::find_by_query("SELECT * FROM photos WHERE user_id = " . $this->id);
		
	}

} // End of Class User


?>