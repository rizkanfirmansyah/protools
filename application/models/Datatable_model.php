<?php


class Datatable_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function allDataCount($table, $join)
  {
    if ($join != null) {
      foreach ($join as $tbjoin => $param) {
        $query = $this->db->join($tbjoin, $param, 'left');
      }
      $query = $this->db->get($table);
    } else {
      $query = $this->db->get($table);
    }
    return $query->num_rows();
  }

  public function allData($table, $join, $limit, $start, $col, $dir)
  {
    if ($join != null) {
      foreach ($join as $tbjoin => $param) {
        $query = $this->db->join($tbjoin, $param, 'left');
      }
      $query = $this->db->limit($limit, $start)
        ->order_by($col, $dir)
        ->get($table);
    } else {
      $query = $this->db->limit($limit, $start)
        ->order_by($col, $dir)
        ->get($table);
    }

    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return null;
    }
  }

  public function dataSearch($table, $join, $scol, $limit, $start, $search, $col, $dir)
  {
    if (is_array($scol)) {
      foreach ($scol as $s) {
        $query = $this->db->or_like($s, $search);
      }
      if ($join != null) {
        foreach ($join as $tbjoin => $param) {
          $query = $this->db->join($tbjoin, $param, 'left');
        }
      }
      $query = $this->db
        ->limit($limit, $start)
        ->order_by($col, $dir)
        ->get($table);
    } else {
      $query = $this->db
        ->like($scol, $search)
        ->limit($limit, $start)
        ->order_by($col, $dir)
        ->get($table);
    }


    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return null;
    }
  }

  public function SearchCount($table, $join, $scol, $search)
  {
    if (is_array($scol)) {
      foreach ($scol as $s) {
        $query = $this->db->or_like($s, $search);
      }
      if ($join != null) {
        foreach ($join as $tbjoin => $param) {
          $query = $this->db->join($tbjoin, $param, 'left');
        }
      }
      $query = $this->db->get($table);
    } else {
      $query =
        $this->db->like($scol, $search)
        ->get($table);
    }
    return $query->num_rows();
  }
}

/* End of file Datatable_model.php */
/* Location: ./application/models/Datatable_model.php */