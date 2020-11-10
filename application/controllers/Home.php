<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Home extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Project_model', 'project');
  }

  public function index()
  {
    $this->load->view('template/layout');
  }

  public function detail()
  {
    $title = $_GET['title'];
    $idp = $_GET['idp'];
    if (!empty($idp)) {
      $data = [
        'project' => $this->project->getDetail($idp),
        'key' => $this->project->getKey($idp),
        'rules' => $this->project->getRules($idp),
      ];
      if ($data['project'] == null) {
        redirect('id/project');
      } else {
        $this->load->view('template/layout', $data);
      }
    } else {
      redirect('id/project');
    }
  }
}


/* End of file Home.php */
/* Location: ./application/controllers/Home.php */