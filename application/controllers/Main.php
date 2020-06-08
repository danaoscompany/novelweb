<?php

class Main extends CI_Controller {

	public function execute() {
		$cmd = $this->input->post('cmd');
		header("Content-Type: application/json");
		$this->db->query($cmd);
	}

	public function insert() {
		$cmd = $this->input->post('cmd');
		$this->db->query($cmd);
		header("Content-Type: application/json");
		echo $this->db->insert_id();
	}

	public function query() {
		$cmd = $this->input->post('cmd');
		header("Content-Type: application/json");
		echo json_encode($this->db->query($cmd)->result_array());
	}
	
	public function get() {
		$name = $this->input->post('name');
		header("Content-Type: application/json");
		echo json_encode($this->db->query("SELECT * FROM " . $name)->result_array());
	}
	
	public function get_by_id() {
		$name = $this->input->post('name');
		$id = intval($this->input->post('id'));
		header("Content-Type: application/json");
		echo json_encode($this->db->query("SELECT * FROM " . $name . " WHERE `id`=" . $id)->result_array());
	}
	
	public function get_column_by_id() {
		$name = $this->input->post('name');
		$columnName = $this->input->post('column_name');
		$id = intval($this->input->post('id'));
		$user = $this->db->query("SELECT * FROM " . $name . " WHERE `id`=" . $id)->row_array();
		header("Content-Type: application/json");
		echo $user[$columnName];
	}
	
	public function get_by_id_string() {
		$name = $this->input->post('name');
		$id = $this->input->post('id');
		header("Content-Type: application/json");
		echo json_encode($this->db->query("SELECT * FROM " . $name . " WHERE `id`='" . $id . "'")->result_array());
	}
	
	public function get_by_id_name() {
		$name = $this->input->post('name');
		$idName = $this->input->post('id_name');
		$id = intval($this->input->post('id'));
		header("Content-Type: application/json");
		echo json_encode($this->db->query("SELECT * FROM " . $name . " WHERE `" . $idName . "`=" . $id)->result_array());
	}
	
	public function get_by_id_name_string() {
		$name = $this->input->post('name');
		$idName = $this->input->post('id_name');
		$id = $this->input->post('id');
		header("Content-Type: application/json");
		echo json_encode($this->db->query("SELECT * FROM " . $name . " WHERE `" . $idName . "`='" . $id . "'")->result_array());
	}
}
