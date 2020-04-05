<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    date_default_timezone_set('Asia/Manila');
    $this->load->model('Content_Model');
    $this->load->model('Users_Model');
  }

  /*
   *
   *
   * ARTICLES
   *
   *
  */

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
    $includes['side_news']        = "active";
    $includes['side_categories']  = "";
    $includes['side_programs']    = "";
    $includes['side_visits']      = "";
    $includes['side_users']       = "";

    // flashdata from set_flashdata
    $includes['app_msg'] = $this->session->flashdata('app_doc');

    $this->load->view('dashboard/view_article',$includes);
  }

  function read_articles()
  {
    $data = $this->Content_Model->get_articles();
    echo json_encode($data);
  }

  function new_article()
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
    $includes['side_news']        = "active";
    $includes['side_categories']  = "";
    $includes['side_programs']    = "";
    $includes['side_visits']      = "";
    $includes['side_users']       = "";

    // flashdata from set_flashdata
    $includes['app_msg'] = $this->session->flashdata('app_doc');

    // Setting data on a selectbox
    // Get data from model
    $sel_cat = $this->Content_Model->get_category_status();
    $includes['set_cat'] = $sel_cat->result_array();

    $this->load->view('dashboard/view_article_new', $includes);
  }

  function add_article()
  {
    $input_title      =   $this->input->post('txt_article_title');
    $input_body       =   $this->input->post('txt_article_body');
    $input_video      =   $this->input->post('txt_article_video');
    $input_category   =   $this->input->post('txt_article_category');
    $input_status     =   $this->input->post('txt_article_status');
    $input_author     =   $this->input->post('txt_article_author');

    if ($this->input->post('btn_article_save')) {
      // file uploads
      $config['upload_path']   = './assets/uploads/articles';
      $config['allowed_types'] = 'jpg|jpeg|png';
      $config['max_size']      = 0;
      $config['detect_mime']   = TRUE;

      $this->load->library('upload', $config);
      $this->upload->initialize($config);

      if (!$this->upload->do_upload('txt_article_image')) {
        $upload_error = $this->upload->display_errors();
        // set flashdata - app_doc
        $this->session->set_flashdata('app_doc','<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$upload_error.'</div>');
        redirect(site_url('content/new_article'));
      } else {
        $input_image = $this->upload->data('file_name');

        $data = array(
          'article_date'      =>    date("m/d/Y"),
          'article_image'     =>    $input_image,
          'article_title'     =>    $input_title,
          'article_body'      =>    $input_body,
          'article_video'     =>    $input_video,
          'article_category'  =>    $input_category,
          'article_status'    =>    $input_status,
          'article_author'    =>    $input_author
        );

        $this->Content_Model->insert_article($data);

        // set flashdata - app_doc
        $this->session->set_flashdata('app_doc','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-check"></i> A new article was successfully saved!</div>');
        // redirect to dashboard
        redirect(site_url('content'));
      }
    }
  }

  function edit_article()
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
    $includes['side_news']        = "active";
    $includes['side_categories']  = "";
    $includes['side_programs']    = "";
    $includes['side_visits']      = "";
    $includes['side_users']       = "";

    // get article by id
    $post_id = $this->input->get('article');
    $post = $this->Content_Model->get_article_by_id($post_id);
    foreach ($post->result_array() as $row) {
      $includes['_id']         =   $row['article_id'];
      $includes['_date']       =   $row['article_date'];
      $includes['_image']      =   $row['article_image'];
      $includes['_title']      =   $row['article_title'];
      $includes['_body']       =   $row['article_body'];
      $includes['_video']      =   $row['article_video'];
      $includes['_category']   =   $row['article_category'];
      $includes['_status']     =   $row['article_status'];
      $includes['_author']     =   $row['article_author'];
      $includes['_timestamp']  =   $row['article_timestamp'];
    }

    // Setting data on a selectbox
    // Get data from model
    $sel_cat = $this->Content_Model->get_category_status();
    $includes['set_cat'] = $sel_cat->result_array();

    // flashdata from set_flashdata
    $includes['app_msg'] = $this->session->flashdata('app_doc');

    $this->load->view('dashboard/view_article_edit', $includes);
  }

  function save_edited_article()
  {
    $id = $this->input->post('txt_article_id_edit');

    if ($this->input->post('btn_article_edit')) {
      $data = array(
        'article_date' => date("m/d/Y"),
        'article_title' => $this->input->post('txt_article_title_edit'),
        'article_body' => $this->input->post('txt_article_body_edit'),
        'article_video' => $this->input->post('txt_article_video_edit'),
        'article_category' => $this->input->post('txt_article_category_edit'),
        'article_status' => $this->input->post('txt_article_status_edit'),
        'article_author' => $this->input->post('txt_article_author_edit')
      );
      // update
      $this->Content_Model->update_article($id, $data);
      // set flashdata - app_doc
      $this->session->set_flashdata('app_doc','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-check"></i> An article was successfuly updated!</div>');
      // redirect to article page
      redirect(site_url('content'));
    }
  }

  function save_edited_article_image()
  {
    $id = $this->input->post('txt_article_id_edit_img');

    if ($this->input->post('btn_article_edit_image')) {
      // file uploads
      $config['upload_path']   = './assets/uploads/articles';
      $config['allowed_types'] = 'jpg|png';
      $config['max_size']      = 0;
      $config['detect_mime']   = TRUE;

      $this->load->library('upload', $config);
      $this->upload->initialize($config);

      if (!$this->upload->do_upload('txt_article_image_edit')) {
        $upload_error = array('error' => $this->upload->display_errors());
        // set flashdata - app_doc
        $this->session->set_flashdata('app_doc','<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-close"></i> '.$upload_error.'</div>');
        redirect(site_url('content/edit_article'));
      } else {
        $image_path_photo = $this->upload->data('file_name');

        $data = array(
          'article_image' => $image_path_photo
        );

        // update into content_model
        $this->Content_Model->update_article($id, $data);
        // set flashdata - app_doc
        $this->session->set_flashdata('app_doc','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-check"></i> A cover image was successfully updated!</div>');
        // redirect to dashboard
        redirect(site_url('content'));
      }
    }
  }

  /*
   *
   *
   * CATEGORIES
   *
   *
  */

  function categories()
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
    $includes['side_categories']  = "active";
    $includes['side_programs']    = "";
    $includes['side_visits']      = "";
    $includes['side_users']       = "";

    $this->load->view('dashboard/view_categories',$includes);
  }

  function read_categories()
  {
    $data = $this->Content_Model->get_categories();
    echo json_encode($data);
  }

  function add_category()
  {
    $cdata = array(
      'category_title'    =>  $this->input->post('txt_category'),
      'category_status'   =>  $this->input->post('txt_category_status')
    );
    $data = $this->Content_Model->insert_category($cdata);
    echo json_encode($data);
  }

  function edit_category()
  {
    $id = $this->input->post('txt_category_id_e');
    $cdata = array(
      'category_title'    =>  $this->input->post('txt_category_e'),
      'category_status'   =>  $this->input->post('txt_category_status_e')
    );

    $data = $this->Content_Model->update_category($id, $cdata);
    echo json_encode($data);
  }

  /*
   *
   *
   * PROGRAMS
   *
   *
  */

  function programs()
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
    $includes['side_programs']    = "active";
    $includes['side_visits']      = "";
    $includes['side_users']       = "";

    // flashdata from set_flashdata
    $includes['app_msg'] = $this->session->flashdata('app_doc');

    $this->load->view('dashboard/view_program',$includes);
  }

  function read_programs()
  {
    $data = $this->Content_Model->get_programs();
    echo json_encode($data);
  }

  function new_program()
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
    $includes['side_programs']    = "active";
    $includes['side_visits']      = "";
    $includes['side_users']       = "";

    // flashdata from set_flashdata
    $includes['app_msg'] = $this->session->flashdata('app_doc');

    // Setting data on a selectbox
    // Get data from model
    $sel_cat = $this->Content_Model->get_category_status();
    $includes['set_cat'] = $sel_cat->result_array();

    $this->load->view('dashboard/view_program_new', $includes);
  }

  function add_program()
  {
    $input_title      =   $this->input->post('txt_program_title');
    $input_body       =   $this->input->post('txt_program_body');
    $input_category   =   $this->input->post('txt_program_category');
    $input_status     =   $this->input->post('txt_program_status');
    $input_author     =   $this->input->post('txt_program_author');

    if ($this->input->post('btn_program_save')) {
      // file uploads
      $config['upload_path']   = './assets/uploads/programs';
      $config['allowed_types'] = 'jpg|jpeg|png';
      $config['max_size']      = 0;
      $config['detect_mime']   = TRUE;

      $this->load->library('upload', $config);
      $this->upload->initialize($config);

      if (!$this->upload->do_upload('txt_program_image')) {
        $upload_error = $this->upload->display_errors();
        // set flashdata - app_doc
        $this->session->set_flashdata('app_doc','<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$upload_error.'</div>');
        redirect(site_url('content/new_program'));
      } else {
        $input_image = $this->upload->data('file_name');

        $data = array(
          'program_image'     =>    $input_image,
          'program_title'     =>    $input_title,
          'program_body'      =>    $input_body,
          'program_category'  =>    $input_category,
          'program_author'    =>    $input_author,
          'program_status'    =>    $input_status
        );

        $this->Content_Model->insert_program($data);

        // set flashdata - app_doc
        $this->session->set_flashdata('app_doc','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-check"></i> A new program was successfully saved!</div>');
        // redirect to dashboard
        redirect(site_url('content/programs'));
      }
    }
  }

  function edit_program()
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
    $includes['side_programs']    = "active";
    $includes['side_visits']      = "";
    $includes['side_users']       = "";

    // get article by id
    $program_id = $this->input->get('program');
    $program = $this->Content_Model->get_program_by_id($program_id);
    foreach ($program->result_array() as $row) {
      $includes['_id']         =   $row['program_id'];
      $includes['_image']      =   $row['program_image'];
      $includes['_title']      =   $row['program_title'];
      $includes['_body']       =   $row['program_body'];
      $includes['_category']   =   $row['program_category'];
      $includes['_status']     =   $row['program_status'];
      $includes['_author']     =   $row['program_author'];
      $includes['_timestamp']  =   $row['program_timestamp'];
    }

    // Setting data on a selectbox
    // Get data from model
    $sel_cat = $this->Content_Model->get_category_status();
    $includes['set_cat'] = $sel_cat->result_array();

    // flashdata from set_flashdata
    $includes['app_msg'] = $this->session->flashdata('app_doc');

    $this->load->view('dashboard/view_program_edit', $includes);
  }

  function save_edited_program()
  {
    $id = $this->input->post('txt_program_id_edit');

    if ($this->input->post('btn_program_edit')) {
      $data = array(
        'program_title'     =>  $this->input->post('txt_program_title_edit'),
        'program_body'      =>  $this->input->post('txt_program_body_edit'),
        'program_category'  =>  $this->input->post('txt_program_category_edit'),
        'program_status'    =>  $this->input->post('txt_program_status_edit'),
        'program_author'    =>  $this->input->post('txt_program_author_edit')
      );
      // update
      $this->Content_Model->update_program($id, $data);
      // set flashdata - app_doc
      $this->session->set_flashdata('app_doc','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-check"></i> A program was successfuly updated!</div>');
      // redirect to article page
      redirect(site_url('content/programs'));
    }
  }

  function save_edited_program_image()
  {
    $id = $this->input->post('txt_program_id_edit_img');

    if ($this->input->post('btn_program_edit_image')) {
      // file uploads
      $config['upload_path']   = './assets/uploads/programs';
      $config['allowed_types'] = 'jpg|png';
      $config['max_size']      = 0;
      $config['detect_mime']   = TRUE;

      $this->load->library('upload', $config);
      $this->upload->initialize($config);

      if (!$this->upload->do_upload('txt_program_image_edit')) {
        $upload_error = array('error' => $this->upload->display_errors());
        // set flashdata - app_doc
        $this->session->set_flashdata('app_doc','<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-close"></i> '.$upload_error.'</div>');
        redirect(site_url('content/edit_program'));
      } else {
        $image_path_photo = $this->upload->data('file_name');

        $data = array(
          'program_image' => $image_path_photo
        );

        // update into content_model
        $this->Content_Model->update_program($id, $data);
        // set flashdata - app_doc
        $this->session->set_flashdata('app_doc','<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-check"></i> A cover image was successfully updated!</div>');
        // redirect to dashboard
        redirect(site_url('content/programs'));
      }
    }
  }

  

}
