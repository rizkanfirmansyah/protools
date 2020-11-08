<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Project_model extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function index()
  {
    return 0;
  }

  public function getDetail($title = null, $idp = null)
  {
    if ($title != null && $idp != null) {
      $result = $this->db->get_where('project', ['id' => $idp])->row();
      if ($result->title == $title) {
        return $result;
      } else {
        return 0;
      }
    } else {
      return 0;
    }
  }

  public function getKey($idp = null)
  {
    return $this->db->select('*, point_project.id as idp')
      ->from('point_project')
      ->join('detail_project', 'detail_project.id=project_detail_id', 'left')
      ->where('project_id', $idp)
      ->get()->result();
  }

  public function getRules($id = null)
  {
    return $this->db->get_where('rules', ['project_id' => $id])->result();
  }

  // ------------------------------------------------------------------------

}

/* End of file Project_model.php */
/* Location: ./application/models/Project_model.php */