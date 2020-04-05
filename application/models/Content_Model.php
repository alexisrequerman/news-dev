<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content_Model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  /*
   *
   *
   * ARTICLES
   *
   *
  */

  function get_articles()
  {
    $data = $this->db->get('cms_articles');
    return $data->result();
  }

  function get_articles_result()
  {
    return $this->db->get('cms_articles');
  }

  function get_article_by_id($post_id)
  {
    return $this->db->get_where('cms_articles', array('article_id' => $post_id));
  }

  function get_article_limit_recent()
  {
    return $this->db->order_by('article_timestamp', 'DESC')->get_where('cms_articles', array('article_status' => 'published'), 4);
  }

  function get_article_limit_recent_two()
  {
    return $this->db->order_by('article_timestamp', 'DESC')->get_where('cms_articles', array('article_status' => 'published'), 2);
  }

  function get_article_limit_recent_six()
  {
    return $this->db->order_by('article_timestamp', 'DESC')->get_where('cms_articles', array('article_status' => 'published'), 6);
  }

  function get_article_limit_recent_twelve()
  {
    return $this->db->order_by('article_timestamp', 'DESC')->get_where('cms_articles', array('article_status' => 'published'), 12);
  }

  function get_article_by_category($get_category)
  {
    return $this->db->get_where('cms_articles', array('article_category' => $get_category));
  }

  function get_article_by_status()
  {
    return $this->db->order_by('article_timestamp', 'DESC')->get_where('cms_articles', array('article_status' => 'published'));
  }

  function insert_article($data)
  {
    $query = $this->db->insert('cms_articles', $data);
  }

  function update_article($id, $data)
  {
    $this->db->where('article_id', $id);
    $this->db->update('cms_articles', $data);
  }

  /*
   *
   *
   * CATEGORIES
   *
   *
  */

  function get_categories()
  {
    $data = $this->db->get('cms_categories');
    return $data->result();
  }

  function get_categories_result()
  {
    return $this->db->get('cms_categories');
  }

  function get_category_status()
  {
    return $this->db->order_by('category_title', 'ASC')->get_where('cms_categories', array('category_status' => 'active'));
  }

  function get_category_by_category($get_category)
  {
    return $this->db->get_where('cms_categories', array('category_title' => $get_category));
  }

  function insert_category($cdata)
  {
    $result = $this->db->insert('cms_categories', $cdata);
    return $result;
  }

  function update_category($id, $cdata)
  {
    $this->db->where('category_id', $id);
    $this->db->update('cms_categories', $cdata);
  }

  /*
   *
   *
   * PROGRAMS
   *
   *
  */

  function get_programs()
  {
    $data = $this->db->get('cms_programs');
    return $data->result();
  }

  function insert_program($data)
  {
    $query = $this->db->insert('cms_programs', $data);
  }

  function get_program_by_id($program_id)
  {
    return $this->db->get_where('cms_programs', array('program_id' => $program_id));
  }

  function get_programs_recent()
  {
    return $this->db->order_by('program_title', 'ASC')->get('cms_programs');
  }

  function get_programs_limit_recent()
  {
    return $this->db->order_by('program_id', 'DESC')->get('cms_programs', 4);
  }

  function update_program($id, $data)
  {
    $this->db->where('program_id', $id);
    $this->db->update('cms_programs', $data);
  }

}
