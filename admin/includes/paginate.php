<?php

class Paginate {


	public $current_page;
	public $items_per_page;
	public $items_total_count;

	public function __construct($page=1, $items_per_page=4, $items_total_count=0) {

		$this->current_page = (int)$page; // (int) makes sure it is an integer
		$this->items_per_page = (int)$items_per_page;
		$this->items_total_count = (int)$items_total_count;

	}

	public function next() {

		return $this->current_page + 1; // go up to next page

	}

	public function previous() {

		return $this->current_page - 1;

	}

	// how many pages we need
	public function page_total() {

		// divide
		// ceil rounds everything up (+1 page)
		return ceil($this->items_total_count/$this->items_per_page); // how many pages we need

	}

	public function has_previous() {

		return $this->previous() >= 1 ? true : false;

	}

	public function has_next() {

		return $this->next() <= $this->page_total() ? true : false;

	}

	public function offset() {

		return ($this->current_page - 1) * $this->items_per_page;

	}

}

?>