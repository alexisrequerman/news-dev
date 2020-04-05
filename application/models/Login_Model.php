<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function get_user($usr,$pwd)
  {
    $log_sql    =   "SELECT * FROM `cms_users` WHERE `user_name` = '".$usr."' AND `user_password` = '".md5($pwd)."' AND `user_status` = 'active'";
    $log_query  =   $this->db->query($log_sql);
    return $log_query->num_rows();
  }

}
