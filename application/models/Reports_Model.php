<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports_Model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  /*
   *
   *
   * VISITORS
   *
   *
  */

  function get_visitors()
  {
    $data = $this->db->get('cms_visitors');
    return $data->result();
  }

  function get_visitors_all_count()
  {
    return $this->db->get('cms_visitors');
  }

  function insert_visitors($data)
  {
    $query = $this->db->insert('cms_visitors', $data);
  }

}
