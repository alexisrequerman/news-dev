<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    date_default_timezone_set('Asia/Manila');
    $this->load->model('Reports_Model');
    $this->load->model('Content_Model');
    $this->load->model('Users_Model');
  }

  function index()
  {
    // User session
    $includes['user_session'] = $this->session->userdata('username');
    if (!$includes['user_session']) {
      redirect('login');
    }
    $user = $this->Users_Model->user_session();
    foreach ($user->result_array() as $row) {
      $includes['ueid']           = $row['user_id'];
      $includes['uname']          = $row['user_name'];
      $includes['ufname']         = $row['user_fullname'];
      $includes['ustat']          = $row['user_status'];
      $includes['urole']          = $row['user_role'];
    }

    // system role permission of the user
    // note: support code is needed, please see views/ams/includes/sidebar.php
    if ($row['user_role'] == 'administrator')
    {
      // display for DataTable
      $includes['hide_sidebar'] = "";
    }
    elseif ($row['user_role'] == 'user')
    {
      // redirect if the user encodes users/settings on address bar
      //redirect(site_url('dashboard'));
      // display for DataTable
      $includes['hide_sidebar'] = " hidden";
    }
    else
    {
      // redirect if the user encodes users/settings on address bar
      redirect(site_url('dashboard'));
    }

    // Sidebar active class
    $includes['side_dashboard']   = "";
    $includes['side_news']        = "";
    $includes['side_categories']  = "";
    $includes['side_programs']    = "";
    $includes['side_visits']      = "active";
    $includes['side_users']       = "";

    $includes['my_ip'] = $this->input->ip_address();

    $count_visits = $this->Reports_Model->get_visitors_all_count();
    $includes['count_visit'] = $count_visits->num_rows();

    $this->load->view('dashboard/view_visitors',$includes);
  }

  function read_visitors()
  {
    $data = $this->Reports_Model->get_visitors();
    echo json_encode($data);
  }

}
