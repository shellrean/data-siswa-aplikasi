<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{

  /**
   * Construct class all loaded
   *
   *
   */
  public function __construct()
  {
    parent::__construct();

    $this->load->library('form_validation');
    $this->load->model('M_siswa');
  }
  /**
   * Show siswa dashboard
   *
   *
   * @return view
   */
  public function index()
  {
    is_admin();
    $data['siswas'] = $this->db->get('siswa')->result();
    $this->template->load('template','siswa/index',$data);
  }

  /**
   * Delete data siswa from with id_siswa
   *
   *
   * @return boolean
   */
  public function delete($id)
  {
    $this->db->delete('siswa',['id_siswa' => $id]);
    helper_log("hapus", "Menghapus data siswa");
    alertsuccess('message','Data berhasil dihapus');
    redirect('siswa/index');
  }

  /**
   * Show detail data siswa with id_siswa
   *
   *
   * @return view
   */
  public function detail($id)
  {
    $data['siswa'] = $this->db->get_where('siswa',['id_siswa' => $id])->row();
    $this->template->load('template','siswa/detail',$data);
  }
  /**
   * Edit data siswa with id_siswa
   *
   *
   * @return view
   */
  public function edit($id)
  {
    $this->form_validation->set_rules('nis','Nis','required|numeric');
    $this->form_validation->set_rules('nisn','Nisn','required|numeric');
    $this->form_validation->set_rules('nama','Nama','required');
    $this->form_validation->set_rules('jk','Jenis kelamin','required');
    $this->form_validation->set_rules('temp_lahir','Tempat lahir','required');
    $this->form_validation->set_rules('agama','Agama','required');
    $this->form_validation->set_rules('status_keluarga','Status dalam keluarga','required');
    $this->form_validation->set_rules('anak_ke','Anak ke','required|numeric');
    $this->form_validation->set_rules('alamat','Alamat','required|min_length[10]');
    $this->form_validation->set_rules('telp_rumah','Telp rumah','required');
    $this->form_validation->set_rules('asal_sekolah','Asal sekolah','required');
    $this->form_validation->set_rules('kelas_diterima','Diterima dikelas','required');
    $this->form_validation->set_rules('nama_ayah','Nama ayah','required');
    $this->form_validation->set_rules('nama_ibu','Nama ibu','required');
    $this->form_validation->set_rules('alamat_ortu','Alamat ortu','required');
    $this->form_validation->set_rules('telp_ortu','Telp ortu','required');

    if($this->form_validation->run() == false)
    {
      $data['siswa'] = $this->db->get_where('siswa', ['id_siswa' => $id])->row();
      $this->template->load('template','siswa/edit',$data);
    }
    else {
      $data = [
        'nis'               => $this->input->post('nis',true),
        'nisn'              => $this->input->post('nisn',true),
        'nama_siswa'        => $this->input->post('nama',true),
        'jk'                => $this->input->post('jk',true),
        'temp_lahir'        => $this->input->post('temp_lahir',true),
        'tgl_lahir'         => $this->input->post('tgl_lahir',true),
        'agama'             => $this->input->post('agama',true),
        'status_keluarga'   => $this->input->post('status_keluarga',true),
        'anak_ke'           => $this->input->post('anak_ke',true),
        'alamat'            => $this->input->post('alamat',true),
        'telp'              => $this->input->post('telp_rumah',true),
        'asal_sekolah'      => $this->input->post('asal_sekolah',true),
        'kelas_diterima'    => $this->input->post('kelas_diterima',true),
        'tgl_diterima'      => $this->input->post('tgl_diterima',true),
        'nama_ayah'         => $this->input->post('nama_ayah',true),
        'nama_ibu'          => $this->input->post('nama_ibu',true),
        'alamat_orangtua'   => $this->input->post('alamat_ortu',true),
        'tlp_ortu'          => $this->input->post('telp_ortu',true),
        'pekerjaan_ayah'    => $this->input->post('pekerjaan_ayah',true),
        'pekerjaan_ibu'     => $this->input->post('pekerjaan_ibu',true),
        'nama_wali'         => $this->input->post('nama_wali',true),
        'alamat_wali'       => $this->input->post('alamat_wali',true),
        'telp_wali'         => $this->input->post('telp_wali',true),
        'pekerjaan_wali'    => $this->input->post('pekerjaan_wali',true),

      ];
      $this->db->where('id_siswa',$id);
      $this->db->update('siswa',$data);
      helper_log("add", "Mengubah data siswa");
      alertsuccess('message','Data berhasil diubah');
      redirect('siswa/index');
    }
  }
  /**
   * Create data siswa
   *
   *
   * @return view
   */
  public function create()
  {
    $this->form_validation->set_rules('nis','Nis','required|numeric');
    $this->form_validation->set_rules('nisn','Nisn','required|numeric');
    $this->form_validation->set_rules('nama','Nama','required');
    $this->form_validation->set_rules('jk','Jenis kelamin','required');
    $this->form_validation->set_rules('temp_lahir','Tempat lahir','required');
    $this->form_validation->set_rules('agama','Agama','required');
    $this->form_validation->set_rules('status_keluarga','Status dalam keluarga','required');
    $this->form_validation->set_rules('anak_ke','Anak ke','required|numeric');
    $this->form_validation->set_rules('alamat','Alamat','required|min_length[10]');
    $this->form_validation->set_rules('telp_rumah','Telp rumah','required');
    $this->form_validation->set_rules('asal_sekolah','Asal sekolah','required');
    $this->form_validation->set_rules('kelas_diterima','Diterima dikelas','required');
    $this->form_validation->set_rules('nama_ayah','Nama ayah','required');
    $this->form_validation->set_rules('nama_ibu','Nama ibu','required');
    $this->form_validation->set_rules('alamat_ortu','Alamat ortu','required');
    $this->form_validation->set_rules('telp_ortu','Telp ortu','required');

    if($this->form_validation->run() == false){
      $this->template->load('template','siswa/create');
    }
    else {
      $data = [
        'nis'               => $this->input->post('nis',true),
        'nisn'              => $this->input->post('nisn',true),
        'nama_siswa'        => $this->input->post('nama',true),
        'jk'                => $this->input->post('jk',true),
        'temp_lahir'        => $this->input->post('temp_lahir',true),
        'tgl_lahir'         => $this->input->post('tgl_lahir',true),
        'agama'             => $this->input->post('agama',true),
        'status_keluarga'   => $this->input->post('status_keluarga',true),
        'anak_ke'           => $this->input->post('anak_ke',true),
        'alamat'            => $this->input->post('alamat',true),
        'telp'              => $this->input->post('telp_rumah',true),
        'asal_sekolah'      => $this->input->post('asal_sekolah',true),
        'kelas_diterima'    => $this->input->post('kelas_diterima',true),
        'tgl_diterima'      => $this->input->post('tgl_diterima',true),
        'nama_ayah'         => $this->input->post('nama_ayah',true),
        'nama_ibu'          => $this->input->post('nama_ibu',true),
        'alamat_orangtua'   => $this->input->post('alamat_ortu',true),
        'tlp_ortu'          => $this->input->post('telp_ortu',true),
        'pekerjaan_ayah'    => $this->input->post('pekerjaan_ayah',true),
        'pekerjaan_ibu'     => $this->input->post('pekerjaan_ibu',true),
        'nama_wali'         => $this->input->post('nama_wali',true),
        'alamat_wali'       => $this->input->post('alamat_wali',true),
        'telp_wali'         => $this->input->post('telp_wali',true),
        'pekerjaan_wali'    => $this->input->post('pekerjaan_wali',true),

      ];
      $this->db->insert('siswa',$data);
      helper_log("add", "Menambah data siswa");
      alertsuccess('message','Data berhasil ditambah');
      redirect('siswa/index');
    }
  }
  /**
   * Upload data siswa from xsls to database
   *
   *
   * @return bool
   */
  public function upload()
  {
    $this->template->load('template','siswa/upload');
  }
  /**
   * Upload foto siswa
   *
   *
   */
  public function upload_foto()
  {
    $this->template->load('template','siswa/upload_foto');
  }
  /**
   * Import foto siswa
   */
  public function import_foto()
  {
    is_admin();
    $name = $_FILES['file']['name'];
    $status = $this->M_siswa->upload_foto($name);
    echo json_encode([
      'status' => $status
    ]);
  }
    /**
   * Import from excel execute
   *
   *
   * @return boolean
   */
  public function import()
  {
    is_admin();

    $nama_file = $this->M_siswa->upload_file();
    /* Load plugin PHPExcel */
    include APPPATH.'third_party/PHPExcel.php';

    $excelreader = new PHPExcel_Reader_Excel2007();
    $loadexcel = $excelreader->load('uploads/file_uploaded/'.$nama_file.'.xlsx');
    $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

    $data = array();

    $numrow = 1;
    foreach($sheet as $row){

    if(empty($row['A']) && empty($row['B']) && empty($row['C']) &&empty($row['D']) && empty($row['E']))
    continue;
    /* ----------------------------------------------
     * Cek $numrow apakah lebih dari 1
     * Artinya karena baris pertama adalah nama-nama kolom
     * Jadi dilewat saja, tidak usah diimport
     * ----------------------------------------------
     */

    if($numrow > 1){

        array_push($data, array(
          'nis'               => $row['A'],
          'nisn'              => $row['B'],
          'nama_siswa'        => $row['C'],
          'jk'                => $row['D'],
          'temp_lahir'        => $row['E'],
          'tgl_lahir'         => $row['F'],
          'agama'             => $row['G'],
          'status_keluarga'   => $row['H'],
          'anak_ke'           => $row['I'],
          'alamat'            => $row['J'],
          'telp'              => $row['K'],
          'asal_sekolah'      => $row['L'],
          'kelas_diterima'    => $row['M'],
          'tgl_diterima'      => $row['N'],
          'nama_ayah'         => $row['O'],
          'nama_ibu'          => $row['P'],
          'alamat_orangtua'   => $row['Q'],
          'tlp_ortu'          => $row['R'],
          'pekerjaan_ayah'    => $row['S'],
          'pekerjaan_ibu'     => $row['T'],
          'nama_wali'         => $row['U'],
          'alamat_wali'       => $row['V'],
          'telp_wali'         => $row['W'],
          'pekerjaan_wali'    => $row['X'],
        ));
    }

    $numrow++;
    }

    $this->db->insert_batch('siswa', $data);
    helper_log("upload", "Mengupload data siswa");
    alertsuccess('message','Data berhasil diimport');
    echo json_encode([
      'row' => $numrow-2
    ]);
  }

  /**
   * Cetak data siswa generate by id_siswa
   *
   *
   * @return view
   */
  public function cetak($id_siswa)
  {
    $data['siswa'] = $this->db->get_where('siswa',['id_siswa' => $id_siswa])->row();

    $html = $this->load->view('siswa/cetak',$data,true);
    $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/tmp']);

    $mpdf->WriteHTML($html);
    $mpdf->SetCreator('Kuswandi');
    $mpdf->Output($data['kelas'] . $data['siswa']->nama_siswa.'.pdf','I');
  }

  /**
   * Download seluruh data siswa
   *
   *
   *
   * @return excels
   */
  public function excel()
  {
    $siswa = $this->db->get('siswa')->result();
    include APPPATH.'third_party/PHPExcel.php';

    // Panggil class PHPExcel nya
    $excel = new PHPExcel();
    // Settingan awal fil excel
    $excel->getProperties()->setCreator('My Notes Code')
                 ->setLastModifiedBy('My Notes Code')
                 ->setTitle("Data siswa")
                 ->setSubject("Data siswa")
                 ->setDescription("Seluruh data siswa")
                 ->setKeywords("Data siswa");

    $style_col = array(
      'font' => array('bold' => true), // Set font nya jadi bold
      'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );
    // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
    $style_row = array(
      'alignment' => array(
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );
    $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA SISWA SMKN 43 JAKARTA"); // Set kolom A1 dengan tulisan "DATA SISWA"
    $excel->getActiveSheet()->mergeCells('A1:D3'); // Set Merge Cell pada kolom A1 sampai E1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER); // Set text center untuk kolom A1


    // Buat header tabel nya pada baris ke 3
    $excel->setActiveSheetIndex(0)->setCellValue('A9', "NO");
    $excel->setActiveSheetIndex(0)->setCellValue('B9','NISN');
    $excel->setActiveSheetIndex(0)->setCellValue('C9', "NIS");
    $excel->setActiveSheetIndex(0)->setCellValue('D9', "Nama Siswa");
    $excel->setActiveSheetIndex(0)->setCellValue('E9','L/P');
    $excel->setActiveSheetIndex(0)->setCellValue('F9','Tempat lahir');
    $excel->setActiveSheetIndex(0)->setCellValue('G9','Tanggal lahir');
    $excel->setActiveSheetIndex(0)->setCellValue('H9','Agama');
    $excel->setActiveSheetIndex(0)->setCellValue('I9','Status dlm keluarga');
    $excel->setActiveSheetIndex(0)->setCellValue('J9','Anak ke');
    $excel->setActiveSheetIndex(0)->setCellValue('K9','Alamat');
    $excel->setActiveSheetIndex(0)->setCellValue('L9','Telp');
    $excel->setActiveSheetIndex(0)->setCellValue('M9','Asal sekolah');
    $excel->setActiveSheetIndex(0)->setCellValue('N9','Kelas diterima');
    $excel->setActiveSheetIndex(0)->setCellValue('O9','Tanggal diterima');
    $excel->setActiveSheetIndex(0)->setCellValue('P9','Nama ayah');
    $excel->setActiveSheetIndex(0)->setCellValue('Q9','Nama ibu');
    $excel->setActiveSheetIndex(0)->setCellValue('R9','Alamat orangtua');
    $excel->setActiveSheetIndex(0)->setCellValue('S9','Telp orangtua');
    $excel->setActiveSheetIndex(0)->setCellValue('T9','Pekerjaan ayah');
    $excel->setActiveSheetIndex(0)->setCellValue('U9','Pekerjaan ibu');
    $excel->setActiveSheetIndex(0)->setCellValue('V9','Nama wali');
    $excel->setActiveSheetIndex(0)->setCellValue('W9','Alamat wali');
    $excel->setActiveSheetIndex(0)->setCellValue('X9','Telp wali');
    $excel->setActiveSheetIndex(0)->setCellValue('Y9','Pekerjaan wali');

    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
    $excel->getActiveSheet()->getStyle('A9')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('B9')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('C9')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('D9')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('E9')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('F9')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('G9')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('H9')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('I9')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('J9')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('K9')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('L9')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('M9')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('N9')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('O9')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('P9')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('Q9')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('R9')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('S9')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('T9')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('U9')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('V9')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('W9')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('X9')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('Y9')->applyFromArray($style_col);
    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 10; // Set baris pertama untuk isi tabel adalah baris ke 4
    foreach($siswa as $data){ // Lakukan looping pada variabel siswa
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nisn);
      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nis);
      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->nama_siswa);
      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->jk);
      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->temp_lahir);
      $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->tgl_lahir);
      $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->agama);
      $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->status_keluarga);
      $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->anak_ke);
      $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->alamat);
      $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->telp);
      $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data->asal_sekolah);
      $excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $data->kelas_diterima);
      $excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $data->tgl_diterima);
      $excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $data->nama_ayah);
      $excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, $data->nama_ibu);
      $excel->setActiveSheetIndex(0)->setCellValue('R'.$numrow, $data->alamat_orangtua);
      $excel->setActiveSheetIndex(0)->setCellValue('S'.$numrow, $data->tlp_ortu);
      $excel->setActiveSheetIndex(0)->setCellValue('T'.$numrow, $data->pekerjaan_ayah);
      $excel->setActiveSheetIndex(0)->setCellValue('U'.$numrow, $data->pekerjaan_ibu);
      $excel->setActiveSheetIndex(0)->setCellValue('V'.$numrow, $data->nama_wali);
      $excel->setActiveSheetIndex(0)->setCellValue('W'.$numrow, $data->alamat_wali);
      $excel->setActiveSheetIndex(0)->setCellValue('X'.$numrow, $data->telp_wali);
      $excel->setActiveSheetIndex(0)->setCellValue('Y'.$numrow, $data->pekerjaan_wali);

      // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('Q'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('R'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('S'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('T'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('U'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('V'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('W'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('X'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('Y'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
      $excel->getActiveSheet()->getStyle('A'.$numrow)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
      $excel->getActiveSheet()->getStyle('C'.$numrow)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
      $excel->getActiveSheet()->getStyle('E'.$numrow)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
      $excel->getActiveSheet()->calculateColumnWidths();

      $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
    }
    // Set width kolom
    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(10); // Set width kolom C
    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(45); // Set width kolom C
    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(5); // Set width kolom C
    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(30); // Set width kolom C
    $excel->getActiveSheet()->getColumnDimension('G')->setWidth(30); // Set width kolom C
    $excel->getActiveSheet()->getColumnDimension('H')->setWidth(30); // Set width kolom C
    $excel->getActiveSheet()->getColumnDimension('I')->setWidth(30); // Set width kolom C
    $excel->getActiveSheet()->getColumnDimension('J')->setWidth(30); // Set width kolom C
    $excel->getActiveSheet()->getColumnDimension('K')->setWidth(30); // Set width kolom C
    $excel->getActiveSheet()->getColumnDimension('L')->setWidth(30); // Set width kolom C
    $excel->getActiveSheet()->getColumnDimension('M')->setWidth(30); // Set width kolom C
    $excel->getActiveSheet()->getColumnDimension('N')->setWidth(30); // Set width kolom C
    $excel->getActiveSheet()->getColumnDimension('O')->setWidth(30); // Set width kolom C
    $excel->getActiveSheet()->getColumnDimension('P')->setWidth(30); // Set width kolom C
    $excel->getActiveSheet()->getColumnDimension('Q')->setWidth(30); // Set width kolom C
    $excel->getActiveSheet()->getColumnDimension('R')->setWidth(30); // Set width kolom C
    $excel->getActiveSheet()->getColumnDimension('S')->setWidth(30); // Set width kolom C
    $excel->getActiveSheet()->getColumnDimension('T')->setWidth(30); // Set width kolom C
    $excel->getActiveSheet()->getColumnDimension('U')->setWidth(30); // Set width kolom C
    $excel->getActiveSheet()->getColumnDimension('V')->setWidth(30); // Set width kolom C
    $excel->getActiveSheet()->getColumnDimension('W')->setWidth(30); // Set width kolom C
    $excel->getActiveSheet()->getColumnDimension('X')->setWidth(30); // Set width kolom C
    $excel->getActiveSheet()->getColumnDimension('Y')->setWidth(30); // Set width kolom C

    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
    // Set orientasi kertas jadi LANDSCAPE
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

    // Set judul file excel nya
    $excel->getActiveSheet(0)->setTitle("Data siswa");
    $excel->setActiveSheetIndex(0);

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="Data siswa smkn 43 jakarta.xlsx"'); // Set nama file excel nya
    header('Cache-Control: max-age=0');
    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    $write->save('php://output');
  }
  /**
   * For sync dinasti siswa
   */
   public function siswa_sync($key)
   {
       $this->_check_key($key);
       $result = $this->db->get_where('siswa',[
           'is_active'          => 0
       ])->result();

       echo json_encode($result)
   }
   /**
    * For sync dinasti
    * @param object $ta
    * @param string $key
    */
    public function anggota_kelas_sync($key,$ta)
    {
        $this->_check_key($key);
        $result = $this->db->get_where('anggota_kelas',[
            'tahun_ajaran'      => $ta->tahun
        ])->result();

        echo json_encode($result);
    }

    private function _check_key($key)
    {

        $data = $this->db->get_where('api_key',[
            'key'       => $key
        ])->num_rows();

        if($data) {
            ec
        }

    }
}