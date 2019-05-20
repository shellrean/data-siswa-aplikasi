<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Backup extends CI_Controller
{

  public function index() {
    $this->load->dbutil();

    $prefs = array(     
        'format'      => 'zip',             
        'filename'    => 'dinasti_db_backup.sql'
        );
    
    
    $backup =& $this->dbutil->backup($prefs); 
    
    $db_name = 'backup-on-'. date("Y-m-d-H-i-s") .'.zip';
    $save = 'data/'.$db_name;
    
    $this->load->helper('file');
    write_file($save, $backup); 
    
    
    $this->load->helper('download');
    force_download($db_name, $backup);
  }
  
}