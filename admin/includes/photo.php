<?php

class Photo extends Db_object {

	protected static $db_table = "photos";

	// CRUD-hoz ezek kellenek (db fields)
	protected static $db_table_fields = array('id', 'title', 'caption', 'description', 'filename', 'alternate_text', 'type', 'size', 'user_id');

	// property names must match db column names
	public $id;
	public $title;
	public $caption;
	public $description;
	public $filename;
	public $alternate_text;
	public $type;
	public $size; // in bytes

	public $tmp_path; // temporary place for images
	public $upload_directory = "images";
	public $errors = array(); // for storing custom error messages
	public $upload_errors_array = array(

	// key => value
	UPLOAD_ERR_OK 			=> "There is no error",
	UPLOAD_ERR_INI_SIZE 	=> "The uploaded file exceeds the upload_max_filesize directive in php.ini",
	UPLOAD_ERR_FORM_SIZE 	=> "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML",
	UPLOAD_ERR_PARTIAL 		=> "The uploaded file was only partially uploaded.",
	UPLOAD_ERR_NO_FILE 		=> "No file was uploaded.",
	UPLOAD_ERR_NO_TMP_DIR 	=> "Missing a temporary folder.",
	UPLOAD_ERR_CANT_WRITE 	=> "Failed to write to disk.",
	UPLOAD_ERR_EXTENSION 	=> "A PHP extension stopped the file upload."

	);

	// This is passing $_FILES['uploaded_file'] as an argument
	public function set_file($file) {

		if(empty($file) || !$file || !is_array($file)) {

			$this->errors[] = "There was no file upload here";
			return false;

		} elseif ($file['error'] != 0) {

			$this->errors[] = $this->upload_errors_array[$file['error']];
			return false;

		} else {

			// ha nem volt semmi hiba, akkor set values

			// with basename we are getting ONLY THE NAME of the file, not the whole location
			$this->filename = basename($file['name']);
			$this->tmp_path = $file['tmp_name'];
			$this->type = $file['type'];
			$this->size = $file['size']; // in bytes

		}

	}

	public function picture_path() {
		return $this->upload_directory.DS.$this->filename;
	}

	public function save() {

		// if id is present, then we do update
		if($this->id) {

			$this->update();

		} else {

			if(!empty($this->errors)) {

				// ha volt valami hiba
				return false;

			}

			if(empty($this->filename) || empty($this->tmp_path)) {
				$this->errors[] = "the file was not available";
				return false;
			}

			// pl. Cars.jpeg
			$target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->filename;

			// ha a feltöltendő file már létezik a szerveren
			if(file_exists($target_path)) {
				$this->errors[] = "The file {$this->filename} already exists";
				return false;
			}

			// this fn returns true or false
			if(move_uploaded_file($this->tmp_path, $target_path)) {

				if($this->create()) {
					unset($this->tmp_path);
					return true;
				}

			} else {
				$this->errors[] = "the file directory probably does not have permission";
				return false;
			}

		}

	}

	public function delete_photo() {

		if($this->delete()) { // delete from db

			$target_path = SITE_ROOT . DS . 'admin' . DS . $this->picture_path(); // admin/images/filename

			return unlink($target_path) ? true : false; // delete file

		} else {

			return false;

		}

	}

	public static function display_sidebar_data($photo_id) {

		$photo = Photo::find_by_id($photo_id);

		$output = "<a class='thumbnail' href='#'><img width='100' src='{$photo->picture_path()}' ></a> ";
		$output .= "<p>{$photo->filename}</p>";
		$output .= "<p>{$photo->type}</p>";
		$output .= "<p>{$photo->size}</p>";

		echo $output;

	}

} // End of Class

?>