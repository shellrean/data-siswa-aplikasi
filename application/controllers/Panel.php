<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Panel extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    $this->load->library('form_validation');

    if (!$this->session->has_userdata('username') && $this->session->userdata('role_id') != 1) {
      redirect('auth');
    }
  }

  public function index()
  {
    $data['count_siswa'] = $this->db->where('active',1)->from("siswa")->count_all_results();
    $data['count_siswa_deactiv'] = $this->db->where('active',0)->from("siswa")->count_all_results();
    $this->template->load('template', 'admin/index',$data);
  }

}
