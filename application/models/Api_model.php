<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Api_model extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------

  public function getData($table)
  {
    return $this->db->get($table)->result();
  }

  // ------------------------------------------------------------------------

  public function getProject($table, $type = null, $param = null)
  {
    return $this->db->select('*, project.id AS idp')
      ->from('project')
      ->where($param, $type)
      // ->where('create_by', 'rizkan')
      // ->or_where('user_id', 'rizkan')
      ->get()->result();
    // return $this->db->get_where($table, [$param => $type], ['create_by' => 'rizkan'])->result();
  }

  // ------------------------------------------------------------------------

}

/* End of file Api_model.php */
/* Location: ./application/models/Api_model.php */