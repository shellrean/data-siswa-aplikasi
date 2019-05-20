<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
  }

  public function index() 
  {
    $this->_cekLogin();

    $this->form_validation->set_rules('username', 'Username', 'required|trim');
    $this->form_validation->set_rules('password', 'Password', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('auth/index');
    } else {
      $this->_login();
    }
  }

  private function _login()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $user = $this->db->get_where('user', ['username' => $username])->row();

    if ($user) {
      if ($user->is_active == 1) {
        if (password_verify($password, $user->password)) {
          $data = [
            'username' => $user->username,
            'role_id'  => $user->role_id,
            'slug'     => $user->slug,
            'session_dinasti_verified_login' => uniqid(),
          ];
          $this->session->set_userdata($data);
          if ($user->role_id == 1) {
            $ip = get_client_ip_env();
            $device = $this->agent->platform();
            $agent = agent();
            helper_log("login", "Login | ".$ip." | ".$device." | ".$agent);
            redirect('panel');
          } else {
            redirect('dashboard');
          }
        } else {
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Wrong password!</div>');
          redirect('auth');
        }
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
      This username has not been activated!</div>');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
      Username is not registered!</div>');
      redirect('auth');
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('username');
    $this->session->unset_userdata('role_id');
    $this->session->unset_userdata('slug');
    $this->session->unset_userdata('session_dinasti_verified_login');

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been log out!</div>');
    redirect('auth');
  }

  private function _cekLogin()
  {
    if ($this->session->has_userdata('session_dinasti_verified_login')) {
      if ($this->session->userdata('role_id') == 1) {
        redirect('panel');
      } else {
        redirect('dashboard');
      }
    }
  }
}
