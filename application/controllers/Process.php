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

    $res = $this->db->get_where('access_project', $data)->row();

    if ($res) {
      echo json_encode([
        'title' => 'Error',
        'subtitle' => 'User Has already in this Project',
        'expression' => 'warning',
        'id' => $data['project_id'],
      ]);
    } else {
      $this->db->insert('access_project', $data);
      echo json_encode([
        'title' => 'Success',
        'subtitle' => 'User Has been Join in this Project',
        'expression' => 'success',
        'id' => $data['project_id'],
      ]);
    }
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

  public function delete_project()
  {
    $id = $this->input->post('id');
    $table = [
      'project' => 'id',
      'access_project' => 'project_id',
      'rules' => 'project_id',
    ];
    foreach ($table as $tb => $value) {
      $this->db->delete($tb, [$value => $id]);
    }
  }
}


/* End of file Process.php */
/* Location: ./application/controllers/Process.php */