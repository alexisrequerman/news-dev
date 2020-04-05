<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
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
      $includes['upass']          = $row['user_password'];
      $includes['upassdec']       = $row['user_pw_dec'];
      $includes['urole']          = $row['user_role'];
      $includes['ustat']          = $row['user_status'];

      // system role permission of the user
      // note: support code is needed, please see views/ams/includes/sidebar.php
      if ($row['user_role'] == 'administrator')
      {
        //$includes['msg_welcome']  = "Welcome Administrator!";
        // display for DataTable
        $includes['score'] = 'read_scoresheet';
        $includes['no_admin'] = "disabled";
        $includes['hide_sidebar'] = "";
      }
      elseif ($row['user_role'] == 'judge')
      {
        // redirect if the user encodes users/settings on address bar
        //redirect(site_url('dashboard'));
        // display for DataTable
        $includes['score'] = 'read_scoresheet_judge';
        $includes['no_admin'] = "";
        $includes['hide_sidebar'] = " hidden";
      }
      else
      {
        // redirect if the user encodes users/settings on address bar
        redirect(site_url('dashboard'));
      }
    }

    // Sidebar active class
    $includes['side_dashboard']   = "";
    $includes['side_news']        = "";
    $includes['side_categories']  = "";
    $includes['side_programs']    = "";
    $includes['side_visits']      = "";
    $includes['side_users']       = "active";

    $this->load->view('dashboard/view_users',$includes);
  }

  function read_users()
  {
    $data = $this->Users_Model->get_users();
    echo json_encode($data);
  }

  function edit_user()
  {
    $id = $this->input->post('txt_user_id_e');
    $udata = array(
      'user_name'         => $this->input->post('txt_user_user_e'),
      'user_fullname'     => $this->input->post('txt_user_fname_e'),
      'user_status'       => $this->input->post('txt_user_status_e')
    );

    $data = $this->Users_Model->update_user($id, $udata);
    echo json_encode($data);
  }

  function edit_user_password()
  {
    $id = $this->input->post('data_id');
    $udata = array(
      'user_name'         => $this->input->post('data_name'),
      'user_password'     => md5($this->input->post('data_password')),
      'user_pw_dec'       => $this->input->post('data_password2')
    );

    $data = $this->Users_Model->update_user($id, $udata);
    echo json_encode($data);
  }

  function add_user()
  {
    $udata = array(
      'user_name'         => $this->input->post('txt_user_user'),
      'user_password'     => md5($this->input->post('txt_user_password')),
      'user_fullname'     => $this->input->post('txt_user_fname'),
      'user_role'         => $this->input->post('txt_user_role'),
      'user_status'       => $this->input->post('txt_user_status'),
      'user_pw_dec'       => $this->input->post('txt_user_password')
    );
    $data = $this->Users_Model->insert_user($udata);
    echo json_encode($data);
  }


}
