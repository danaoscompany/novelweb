<?php

class User extends CI_Controller {

	private function get_novel_by_id($id) {
		$novels = $this->db->get_where('novels', array(
			'id' => $id
		))->result_array();
		if (sizeof($novels) > 0) {
			return $novels[0];
		} else {
			return NULL;
		}
	}

	private function get_user_by_id($id) {
		$users = $this->db->get_where('users', array(
			'id' => $id
		))->result_array();
		if (sizeof($users) > 0) {
			return $users[0];
		} else {
			return NULL;
		}
	}

	public function get_random_novels() {
		$novels = $this->db->query("SELECT * FROM `novel_viewers_count` ORDER BY RAND() DESC LIMIT 3")->result_array();
		for ($i=0; $i<sizeof($novels); $i++) {
			$novel = $novels[$i];
			$novels[$i] = $this->get_novel_by_id(intval($novel['id']));
			$novels[$i]['writer'] = $this->get_user_by_id(intval($novels[$i]['user_id']))['name'];
		}
		header("Content-Type: application/json");
		echo json_encode($novels);
	}

	public function get_popular_novels() {
		$novels = $this->db->query("SELECT * FROM `novel_viewers_count` ORDER BY `count` DESC LIMIT 10")->result_array();
		for ($i=0; $i<sizeof($novels); $i++) {
			$novel = $novels[$i];
			$novels[$i] = $this->get_novel_by_id(intval($novel['id']));
			$novels[$i]['writer'] = $this->get_user_by_id(intval($novels[$i]['user_id']))['name'];
		}
		header("Content-Type: application/json");
		echo json_encode($novels);
	}

	public function get_recommended_novels() {
		$novels = $this->db->query("SELECT * FROM `novel_viewers_count` ORDER BY RAND() DESC LIMIT 10")->result_array();
		for ($i=0; $i<sizeof($novels); $i++) {
			$novel = $novels[$i];
			$novels[$i] = $this->get_novel_by_id(intval($novel['id']));
			$novels[$i]['writer'] = $this->get_user_by_id(intval($novels[$i]['user_id']))['name'];
		}
		header("Content-Type: application/json");
		echo json_encode($novels);
	}
}
