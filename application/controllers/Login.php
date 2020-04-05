<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('Login_Model');
  }

  function index()
  {
    $includes['user_session'] = $this->session->userdata('username');

    if ($includes['user_session'])
    {
      redirect('dashboard');
    }

    $includes['flash_user'] = $this->session->flashdata('msg');
    $this->load->view('login',$includes);
  }

  function log_in()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');

    if ($this->form_validation->run() == FALSE)
    {
      // if validation fails
      $this->load->view('login');
    }
    else
    {
      if ($this->input->post('submit') == "Sign In")
      {
        // check if username and password are correct
        $user_result = $this->Login_Model->get_user($username, $password);
        if ($user_result > 0) // active user
        {
          // set session
          $session_log = array(
            'username' => $username,
            'loginuser' => TRUE
          );
          $this->session->set_userdata($session_log);
          redirect('dashboard');
        }
        else
        {
          $this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Invalid Username or Password</div>');
          redirect(base_url());
        }
      }
      else
      {
        redirect(base_url());
      }
    }
  }

  public function log_out()
  {
    $this->session->sess_destroy();
    redirect(base_url());
  }

}
