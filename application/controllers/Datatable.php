<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datatable extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Datatable_model', 'datatable');
  }

  public function index()
  {
    // 
  }

  public function table($table)
  {
    $column = array(
      0 => 'username',
      1 => 'email ',
      2 => 'image',
      3 => 'role_id',
      4 => 'status',
      5 => 'create_at',
      6 => 'updated',
    );

    $limit  = $this->input->post('length');
    $start  = $this->input->post('start');
    $order  = $column[$this->input->post('order')[0]['column']];
    $dir    = $this->input->post('order')[0]['dir'];
    $scol = ['username', 'email', 'image', 'role_name'];
    $join = ['role' => 'role.id=role_id'];

    $totalData = $this->datatable->allDataCount($table, $join);

    $totalFiltered = $totalData;

    if (empty($this->input->post('search')['value'])) {
      $posts = $this->datatable->allData($table, $join, $limit, $start, $order, $dir);
    } else {
      $search = $this->input->post('search')['value'];

      $posts =  $this->datatable->DataSearch($table, $join, $scol, $limit, $start, $search, $order, $dir);

      $totalFiltered = $this->datatable->SearchCount($table, $join, $scol, $search);
    }

    $data = array();
    if (!empty($posts)) {
      foreach ($posts as $post) {

        $nestedData['username'] = $post->username;
        $nestedData['email'] = $post->email;
        $nestedData['image'] = $post->image;
        $nestedData['role_id'] = $post->role_name;
        $nestedData['status'] = $post->status;
        $nestedData['create_at'] = $post->create_at;
        $nestedData['updated'] = $post->updated;

        $data[] = $nestedData;
      }
    }

    $json_data = array(
      "draw"            => intval($this->input->post('draw')),
      "recordsTotal"    => intval($totalData),
      "recordsFiltered" => intval($totalFiltered),
      "data"            => $data
    );

    echo json_encode($json_data);
  }
}


/* End of file Datatable.php */
/* Location: ./application/controllers/Datatable.php */