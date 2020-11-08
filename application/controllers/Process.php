<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Process extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Process_model', 'process');
  }

  public function index()
  {
    show_404();
  }

  public function join_project()
  {
    $data = [
      'project_id' => htmlspecialchars($this->input->post('id')),
      'position' => htmlspecialchars($this->input->post('post')),
      'user_id' => htmlspecialchars('rizkan'),
    ];

    $this->db->insert('access_project', $data);
    echo json_encode('SUKSES');
  }

  public function insert_project()
  {
    $res = $this->process->insert_project();

    echo json_encode($res);
  }

  public function insert_participant()
  {
    $this->db->insert('access_project', $_POST);
  }

  public function insert_rule()
  {
    $this->db->insert('rules', $_POST);
  }

  public function table_dump($table)
  {
    $this->db->empty_table($table);
    redirect('id/project');
  }
}


/* End of file Process.php */
/* Location: ./application/controllers/Process.php */