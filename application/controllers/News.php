<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    date_default_timezone_set('Asia/Manila');
    $this->load->model('Content_Model');
    $this->load->model('Reports_Model');
  }

  function index()
  {
    // get post by id
    $post_id                      = $this->input->get('post_id');
    $post                         = $this->Content_Model->get_article_by_id($post_id);

    foreach ($post->result_array() as $row) {
      $includes['_id']            =   $row['article_id'];
      $includes['_date']          =   $row['article_date'];
      $includes['_image']         =   $row['article_image'];
      $includes['_title']         =   $row['article_title'];
      $includes['_body']          =   $row['article_body'];
      $includes['_video']         =   $row['article_video'];
      $includes['_category']      =   $row['article_category'];
      $includes['_status']        =   $row['article_status'];
      $includes['_author']        =   $row['article_author'];
      $includes['_timestamp']     =   $row['article_timestamp'];
    }

    // select all post
    $select_post                  =   $this->Content_Model->get_article_by_status();
    $includes['set_post']         =   $select_post->result_array();

    // select recent post
    $select_recent                =   $this->Content_Model->get_article_limit_recent();
    $includes['set_recent']       =   $select_recent->result_array();

    // select recent three post
    $select_recent_two            =   $this->Content_Model->get_article_limit_recent_two();
    $includes['set_recent_2']     =   $select_recent_two->result_array();

    // select recent six post
    $select_recent_six            =   $this->Content_Model->get_article_limit_recent_six();
    $includes['set_recent_six']   =   $select_recent_six->result_array();

    // select recent twelve post
    $select_recent_twelve         =   $this->Content_Model->get_article_limit_recent_twelve();
    $includes['set_recent_12']    =   $select_recent_twelve->result_array();

    // select all category
    $select_category              =   $this->Content_Model->get_category_status();
    $includes['set_category']     =   $select_category->result_array();

    // select recent programs
    $select_programs              =   $this->Content_Model->get_programs_recent();
    $includes['set_program']      =   $select_programs->result_array();

    // log visitor
    $log_page                     =   'Home Page';
    $log_url                      =   base_url();
    $log_title                    =   'CLTV - Championing Local Pride';
    $log_id                       =   0;
    $this->add_visit_log($log_page, $log_url, $log_title, $log_id);

    $this->load->view('news/default', $includes);
  }

  function post()
  {
    // get post by id
    $post_id                    =   $this->input->get('post_id');
    $post                       =   $this->Content_Model->get_article_by_id($post_id);
    foreach ($post->result_array() as $row) {
      $includes['_id']          =   $row['article_id'];
      $includes['_date']        =   $row['article_date'];
      $includes['_image']       =   $row['article_image'];
      $includes['_title']       =   $row['article_title'];
      $includes['_body']        =   $row['article_body'];
      $includes['_video']       =   $row['article_video'];
      $includes['_category']    =   $row['article_category'];
      $includes['_status']      =   $row['article_status'];
      $includes['_author']      =   $row['article_author'];
      $includes['_timestamp']   =   $row['article_timestamp'];
    }

    // select all post
    $select_post                =   $this->Content_Model->get_article_by_status();
    $includes['set_post']       =   $select_post->result_array();

    // select recent post
    $select_recent              =   $this->Content_Model->get_article_limit_recent();
    $includes['set_recent']     =   $select_recent->result_array();

    // select recent three post
    $select_recent_two            =   $this->Content_Model->get_article_limit_recent_two();
    $includes['set_recent_2']     =   $select_recent_two->result_array();

    // select recent twelve post
    $select_recent_twelve         =   $this->Content_Model->get_article_limit_recent_twelve();
    $includes['set_recent_12']    =   $select_recent_twelve->result_array();

    // select all category
    $select_category            =   $this->Content_Model->get_category_status();
    $includes['set_category']   =   $select_category->result_array();

    // log visitor
    $log_page                   =   'Articles Page';
    $log_url                    =   site_url('news/post?post_id=') . $post_id;
    $log_title                  =   $includes['_title'];
    $log_id                     =   $post_id;
    $this->add_visit_log($log_page, $log_url, $log_title, $log_id);

    $this->load->view('news/post', $includes);
  }

  function pages()
  {
    // get category via url
    $get_category               =   $this->input->get('page');
    $category                   =   $this->Content_Model->get_category_by_category($get_category);
    foreach ($category->result_array() as $row) {
      $includes['_id']          =   $row['category_id'];
      $includes['_category']    =   $row['category_title'];
    }

    // select all post
    $select_post                =   $this->Content_Model->get_article_by_category($get_category);
    $includes['set_post']       =   $select_post->result_array();

    // select recent post
    $select_recent              =   $this->Content_Model->get_article_limit_recent();
    $includes['set_recent']     =   $select_recent->result_array();

    // select recent three post
    $select_recent_two            =   $this->Content_Model->get_article_limit_recent_two();
    $includes['set_recent_2']     =   $select_recent_two->result_array();

    // select recent twelve post
    $select_recent_twelve         =   $this->Content_Model->get_article_limit_recent_twelve();
    $includes['set_recent_12']    =   $select_recent_twelve->result_array();

    // select all category
    $select_category            =   $this->Content_Model->get_category_status();
    $includes['set_category']   =   $select_category->result_array();

    // log visitor
    $log_page                   =   'Pages Page';
    $log_url                    =   site_url('news/pages?page=') . $get_category;
    $log_title                  =   $includes['_category'];
    $log_id                     =   $includes['_id'];
    $this->add_visit_log($log_page, $log_url, $log_title, $log_id);

    $this->load->view('news/pages', $includes);
  }

  function tv_show()
  {
    // get post by id
    $show_id                        =   $this->input->get('show');
    $show                           =   $this->Content_Model->get_program_by_id($show_id);
    foreach ($show->result_array() as $row) {
      $includes['_id']              =   $row['program_id'];
      $includes['_image']           =   $row['program_image'];
      $includes['_title']           =   $row['program_title'];
      $includes['_body']            =   $row['program_body'];
      $includes['_category']        =   $row['program_category'];
      $includes['_status']          =   $row['program_status'];
      $includes['_author']          =   $row['program_author'];
      $includes['_timestamp']       =   $row['program_timestamp'];
    }

    // select all post
    $select_post                    =   $this->Content_Model->get_article_by_status();
    $includes['set_post']           =   $select_post->result_array();

    // select recent post
    $select_recent                  =   $this->Content_Model->get_article_limit_recent();
    $includes['set_recent']         =   $select_recent->result_array();

    // select recent three post
    $select_recent_two            =   $this->Content_Model->get_article_limit_recent_two();
    $includes['set_recent_2']     =   $select_recent_two->result_array();

    // select recent twelve post
    $select_recent_twelve         =   $this->Content_Model->get_article_limit_recent_twelve();
    $includes['set_recent_12']    =   $select_recent_twelve->result_array();

    // select all category
    $select_category                =   $this->Content_Model->get_category_status();
    $includes['set_category']       =   $select_category->result_array();

    // select recent programs
    $select_recent_programs         =   $this->Content_Model->get_programs_limit_recent();
    $includes['set_program_limit']  =   $select_recent_programs->result_array();

    // log visitor
    $log_page                       =   'TV Show Page';
    $log_url                        =   site_url('news/tv_show?show=') . $show_id;
    $log_title                      =   $includes['_title'];
    $log_id                         =   $includes['_id'];
    $this->add_visit_log($log_page, $log_url, $log_title, $log_id);

    $this->load->view('news/show', $includes);
  }

  /*
   *
   *
   * VISITOR's LOG
   *
   *
  */

  function add_visit_log($log_page, $log_url, $log_title, $log_id)
  {
    $data = array(
      'visit_date'        =>  date("m/d/Y"),
      'visit_time'        =>  date("h:i:s A"),
      'visit_page'        =>  $log_page,
      'visit_url'         =>  $log_url,
      'visit_page_title'  =>  $log_title,
      'visit_ip'          =>  $this->input->ip_address(),
      'visit_content_id'  =>  $log_id
    );
    $this->Reports_Model->insert_visitors($data);
  }

}
