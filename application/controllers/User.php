<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
  private $filename = 'user_import';
  
  /**
   * Make Construct method for load parent 
   * and call library can will use
   * 
   * @return view
   */
  public function __construct()
  {
    parent::__construct();

    $this->_cekLogin();

    $this->load->library('form_validation');
    $this->load->model('M_user');
  }

  /**
   * Show our dashboard 
   * 
   * @return view
   */
  public function index()
  {
    $user = session_id();
    // $namaUser = $this->session->userdata('username');
    // var_dump(session_save_path());
    // var_dump($user);
    if(file_exists(session_save_path()."/ci_session".$user) && session_id() != $user)
    {
    echo "user ".$user." sudah login, hayo loe mau nge hack ya?....";
    //lakukan sesuatu kepada tersangka kita ini,.....
    }
    // $this->_isadmin();
    // $data['users'] = $this->db->get('user')->result();
    // $this->template->load('template', 'user/index', $data);
  }
  
  /**
   * Show Activity user
   */
  public function activity($slug)
  {
    if($slug != $this->session->userdata('slug')) {
      redirect('errors/denied');
    }
    $query = $this->db->order_by('time', 'DESC');
    $query->where('user',$this->session->userdata('username'));
    $query->limit(50);
    $data['activity'] = $this->db->get('log')->result();
    $this->template->load('template','user/activity',$data);
  }
  /**
   * Get data from url and destroy some data
   * 
   * @return boolean
   */
  public function delete($id)
  {
    $user = $this->db->get_where('user',['id' => $id])->row();

    if($user->username == $this->session->userdata('username')) {
      alerterror('message','Tidak bisa menghapus diri sendiri');
      redirect('user');
    }
    $this->_isadmin();
    $this->db->delete('user', ['id' => $id]);
    helper_log("delete", "Menghapus data user");
    alertsuccess('message','Data berhasil dihapus');
    redirect('user');
  }

  /**
   * Create and strore some data to database
   * 
   * @return view database
   */
  public function create()
  {
    $this->_isadmin();
    $this->form_validation->set_rules('username','Username','trim|required|is_unique[user.username]');
    $this->form_validation->set_rules('name','Name','required');
    $this->form_validation->set_rules('password1','Password','trim|required|matches[password2]|min_length[3]');
    $this->form_validation->set_rules('password2','Password confirm','trim|required|matches[password1]');
    $this->form_validation->set_rules('nip','Nip','required|trim');

    if($this->form_validation->run() == false) {
      $this->template->load('template','user/create');
    } else {
      $data = [
        'username'  => $this->input->post('username'),
        'name'      => $this->input->post('name'),
        'nip'       => $this->input->post('nip'),
        'password'  => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
        'role_id'   => 2,
        'is_active' => 1,
        'slug'      => uniqid().generateRandomString(20),
      ];
      $this->db->insert('user',$data);
      helper_log("add", "Menambahkan data user");
      alertsuccess('message','Data berhasil ditambahkan');
      redirect('user');
    }
  }

  /**
   * Change data in database with newes updated 
   * get id from url 
   * 
   * @return boolean
   */
  public function edit($id)
  {
    $this->_isadmin();
    $this->form_validation->set_rules('username','Username','trim|required');
    $this->form_validation->set_rules('name','Name','required');
    $this->form_validation->set_rules('nip','Nip','required|trim');
    
    if($this->form_validation->run() == false){
      $data['users'] = $this->db->get_where('user',['id'=>$id])->row();
      $this->template->load('template','user/edit',$data);
    } else {
      $data = [
        'username'  => $this->input->post('username'),
        'name'      => $this->input->post('name'),
        'nip'       => $this->input->post('nip'),
        'is_active' => $this->input->post('is_active'),
      ];
      $this->db->where('id',$id);
      $this->db->update('user',$data);
      helper_log("edit", "Mengubah data user");
      alertsuccess('message','Data berhasil diubah');
      redirect('user');
    }
  }

  /**
   * Handle a request from user upload
   * 
   * @return view
   */
  public function upload()
  {
    $this->_isadmin();
    $this->template->load('template','user/upload');
  }

  /**
   * Get file from excel
   */
  public function form(){
		$data = array(); 
              
		$upload = $this->M_user->upload_file($this->filename);
			
			if($upload['result'] == "success"){
				
				include APPPATH.'third_party/PHPExcel.php';

				$excelreader = new PHPExcel_Reader_Excel2007();

				$loadexcel = $excelreader->load('uploads/'.$this->filename.'.xlsx'); 
        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
        
        $data['sheet'] = $sheet; 
			}else{ 
				$data['upload_error'] = $upload['error']; 
			}
		
    $this->template->load('template', 'user/preview', $data);
  }

  /**
   * Import from excel execute
   * 
   * 
   * @return boolean
   */
  public function import()
  {
    $this->_isadmin();
    /* Load plugin PHPExcel */
    include APPPATH.'third_party/PHPExcel.php';
    
    $excelreader = new PHPExcel_Reader_Excel2007();
    $loadexcel = $excelreader->load('uploads/'.$this->filename.'.xlsx'); 
    $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
     
    $data = array();
    
    $numrow = 1;
    foreach($sheet as $row){

    /* ----------------------------------------------
     * Cek $numrow apakah lebih dari 1
     * Artinya karena baris pertama adalah nama-nama kolom
     * Jadi dilewat saja, tidak usah diimport
     * ----------------------------------------------
     */

    if($numrow > 1){

        array_push($data, array(
        'username'            =>$row['A'],
        'name'                =>$row['B'],
        'nip'                 =>$row['C'],
        'password'            =>password_hash($row['D'],PASSWORD_DEFAULT),
        'role_id'             =>2,
        'is_active'           =>1
        ));
    }
    
    $numrow++;
    }

    $this->db->insert_batch('user', $data);
    helper_log("upload", "Mengupload data user");
    alertsuccess('message','Data berhasil diimport');
     
  }
  /**
   * Show profile page
   * 
   * 
   */
  public function profile()
  {
    if(! empty($_FILES['image']['name'])) {
      $this->_uploadImage();
      redirect('user/profile');
    } else {
      $data['user'] = $this->db->get_where('user',['username' => $this->session->userdata('username')])->row();
      $this->template->load('template','user/profile',$data);
    }
  }
  /**
   * Change password
   * 
   * 
   */
  public function ubahpass()
  {
    $this->form_validation->set_rules('password1','Password','required|trim|matches[password2]|min_length[6]');
    $this->form_validation->set_rules('password2','Password confirm','required|trim|matches[password1]');
    
    if($this->form_validation->run() == false) {
      $data['user'] = $this->db->get_where('user',['username' => $this->session->userdata('username')])->row();
      $this->template->load('template','user/profile',$data);

    } else {
      $data = [
        'password' => password_hash($this->input->post('password1',true),PASSWORD_DEFAULT)
      ];
      $this->db->where('username',$this->session->userdata('username'));
      $this->db->update('user',$data);
      helper_log("edit", "Anda mengubah password anda");
      alertsuccess('message','Password berhasil diubah');
      redirect('user/profile');
    }
  }
  /**
   * Upload file image
   */
  private function _uploadImage()
  {
    $config['upload_path']          = './assets/img/profile/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['file_name']            = time().uniqid();
    $config['overwrite']			      = true;
    $config['max_size']             = 1024; // 1MB

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('image')) {
      $filename =  $this->upload->data("file_name");
    } else {
      $filename = 'default.png';
    }
    $data = [
      'image' => $filename,
    ];

    $this->db->where('username', $this->session->userdata('username'));
    $this->db->update('user', $data);
  }
  /**
   * Check what its user have a session's name username
   * 
   * @return redirect
   */
  private function _cekLogin()
  {
    if (!$this->session->has_userdata('username')) {
      redirect('auth');
    }
  }

  /**
   * Only Admin access this page
   */
  private function _isadmin()
  {
    if( $this->session->userdata('role_id') != 1) {
      redirect('errors/denied');
    }
  }
}
