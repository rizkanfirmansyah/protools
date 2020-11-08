<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Access extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    show_404();
  }

  public function user_position()
  {
    if ($_POST['username'] == null) {
      echo json_encode(['']);
    } else {
      $data = $this->db->get_where('user', ['username' => $_POST['username']])->row();
      if ($data->role_id == 4) {
        echo json_encode(['participant']);
      } else {
        echo json_encode(['pic', 'participant']);
      }
    }
  }

  public function user_project()
  {
    if ($this->input->post('project_id') == null) {
      echo json_encode(0);
    } else {
      $data = $this->db->select('*')->from('access_project')->join('user', 'username=user_id')->where('project_id', $this->input->post('project_id'))->get()->result();
      echo json_encode($data);
    }
  }
}


/* End of file Access.php */
/* Location: ./application/controllers/Access.php */