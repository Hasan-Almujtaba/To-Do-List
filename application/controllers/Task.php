<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller {
	public function __construct() {
		parent::__construct();

		$this->load->model('Task_model', 'task');
	}

	public function index() {
		$data['title'] = 'To Do List';
		$data['uncompleted'] = $this->task->unCompletedTask(); // Show uncompleted task
		$data['completed'] = $this->task->completedTask(); // Show completed task

		$this->form_validation->set_rules('task', 'New Task', 'trim|required');
		$this->form_validation->set_rules('time', 'Select Time', 'trim|required');

		if( $this->form_validation->run() == false ) {
			$this->load->view('templates/header', $data);
			$this->load->view('task/index', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$this->task->addNewTask();

			$this->session->set_flashdata('success', 'New task added');
			redirect('task');
		}
	}

	public function completed($id) {
		$this->task->complete($id);

		$this->session->set_flashdata('success', 'Task successfully completed');
		redirect('task');	
	}

	public function delete($id) {
		$this->task->delete($id);

		$this->session->set_flashdata('success', 'Task successfully deleted');
		redirect('task');
	}
}