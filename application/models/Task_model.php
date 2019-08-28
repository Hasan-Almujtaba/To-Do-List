<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task_model extends CI_Model {
	public function showAllTask() {
		return $this->db->get('task')->result_array();
	}

	public function unCompletedTask() {
		$this->db->order_by('time', 'ASC');
		return $this->db->get_where('task', ['is_completed' => 0 ])->result_array();
	}

	public function completedTask() {
		return $this->db->get_where('task', ['is_completed' => 1 ])->result_array();
	}

	public function addNewTask() {
		$task = htmlspecialchars($this->input->post('task'));
		$time = htmlspecialchars($this->input->post('time'));

		$data = [
			'task' => $task,
			'time' => $time,
			'is_completed' => 0
		];

		$this->db->insert('task', $data);

	}

	public function complete($id) {
		$this->db->set(['is_completed' => 1 ]);
		$this->db->where('id', $id);
		$this->db->update('task');
	}

	public function delete($id) {
		$this->db->delete('task', ['id' => $id ]);
	}
}