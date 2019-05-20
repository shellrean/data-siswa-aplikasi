<?php

class M_siswa extends CI_Model 
{
  public function upload_file(){
    /* Load librari upload */
    $this->load->library('upload'); 
		$nama_file = 'upload_data_siswa_'.uniqid().time();
		$config['upload_path'] = './uploads/file_uploaded';
		$config['allowed_types'] = 'xlsx';
		$config['max_size']	= '2048';
		$config['overwrite'] = true;
		$config['file_name'] = $nama_file;
    
    /* Load konfigurasi uploadnya */
    $this->upload->initialize($config);
    
    /* Lakukan upload dan Cek jika proses upload berhasil */
		if($this->upload->do_upload('file')){ 

		/* Jika berhasil */
		// $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
		return $nama_file;
		}else{

    // alert('Exstensi file tidak diperbolehkan');
    // echo "Extensi file tidak diperbolehkan";
    // die();
		/* Jika gagal */
		// $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
		// return $nama_file;
		}
  }
  public function upload_foto($name) {
    $this->load->library('upload');
		$config['upload_path'] = './uploads/photo_siswa';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size']	= '2048';
		$config['overwrite'] = true;
    $config['file_name'] = $name;

    /* Load konfigurasi uploadnya */
    $this->upload->initialize($config);
    if($this->upload->do_upload('file')) {
      
      $exp = explode('_',$name);
      $nis = $exp[0];
      $exp1 = explode('.',$exp[1]);
      $no_photo = $exp1[0];
      $data = [
        'foto'.$no_photo => $name
      ];
      $this->db->where('nis',$nis);
      $this->db->update('siswa',$data);
      if($this->db->get_where('siswa',['nis' => $nis])->row() != null) {
        return 'Foto '.$no_photo.' untuk nis '.$nis.' berhasil diupload';
      } else {
        header("HTTP/1.0 500 Internal Server Error");
      }
    } else {
      header("HTTP/1.0 500 Internal Server Error");
    }
  }
}