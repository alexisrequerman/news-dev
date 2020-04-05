<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_Model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function get_users()
  {
    $data = $this->db->get('cms_users');
    return $data->result();
  }

  function user_session()
  {
    $user = $this->session->userdata('username');
    return $this->db->get_where('cms_users',array('user_name'=>$user));
  }

  function insert_user($udata)
  {
    $result = $this->db->insert('cms_users', $udata);
    return $result;
  }

  function update_user($id, $udata)
  {
    $this->db->where('user_id', $id);
    $this->db->update('cms_users', $udata);
  }

}
