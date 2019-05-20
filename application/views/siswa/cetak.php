<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?= $siswa->nama_siswa ?></title>

  <link rel="shortcut icon" href="<?= base_url('assets/img/logo43.png') ?>" type="image/x-icon">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets') ?>/css/print.css" rel="stylesheet">
</head>
<body>
  
  <div class="text-center">
    <h3>BIODATA SISWA</h3>
    <img src="<?= base_url('uploads/photo_siswa/'.$siswa->foto1) ?>" alt="" width="100px">
  </div>

  <div class="content mt-2">
  <table width="100%" id="alamat" class="table-padd-1"> 
    <tr>
        <td style="width: 5%;">1.</td>
        <td style="width: 28%;">Nama Siswa (Lengkap)</td>
        <td style="width: 2%;">:</td>
        <td style="width: 65%"><span class="uper"><?= $siswa->nama_siswa ?></span></td>
    </tr>
    <tr>
        <td style="width: 5%;">2.</td>
        <td style="width: 28%;">Nomor Induk/NISN</td>
        <td style="width: 2%;">:</td>
        <td style="width: 65%"><?= $siswa->nis.' / '.$siswa->nisn ?></td>
    </tr>
    <tr>
        <td style="width: 5%;">3.</td>
        <td style="width: 28%;">Tempat, Tanggal Lahir</td>
        <td style="width: 2%">:</td>
        <td style="width: 65%"><?= $siswa->temp_lahir.' , '.$siswa->tgl_lahir ?></td>
    </tr>
    <tr>
        <td style="width: 5%;">4.</td>
        <td style="width: 28%;">Jenis Kelamin</td>
        <td style="width: 2%">:</td>
        <td style="width: 65%"><?= $siswa->jk ?></td>
    </tr>
    <tr>
        <td style="width: 5%;">5.</td>
        <td style="width: 28%;">Agama</td>
        <td style="width: 2%">:</td>
        <td style="width: 65%"><?= $siswa->agama ?></td>
    </tr>
    <tr>
        <td style="width: 5%;">6.</td>
        <td style="width: 28%;">Status dalam Keluarga</td>
        <td style="width: 2%">:</td>
        <td style="width: 65%"><?= $siswa->status_keluarga ?></td>
    </tr>
    <tr>
        <td style="width: 5%;">7.</td>
        <td style="width: 28%;">Anak Ke</td>
        <td style="width: 2%">:</td>
        <td style="width: 65%"><?= $siswa->anak_ke ?></td>
    </tr>
    <tr>
        <td style="width: 5%;">8.</td>
        <td style="width: 28%;">Alamat Siswa</td>
        <td style="width: 2%">:</td>
        <td style="width: 65%"><?= $siswa->alamat ?></td>
    </tr>
    <tr>
        <td style="width: 5%;">9.</td>
        <td style="width: 28%;">Nomor Telepon Rumah</td>
        <td style="width: 2%">:</td>
        <td style="width: 65%"><?= $siswa->telp ?></td>
    </tr>
    <tr>
        <td style="width: 5%;">10.</td>
        <td style="width: 28%;">Sekolah Asal</td>
        <td style="width: 2%">:</td>
        <td style="width: 65%"><?= $siswa->asal_sekolah ?></td>
    </tr>
    <tr>
        <td style="width: 5%;">11.</td>
        <td style="width: 28%;">Diterima di sekolah ini</td>
        <td style="width: 2%"></td>
        <td style="width: 65%"></td>
    </tr>
    <tr>
        <td style="width: 5%;">&nbsp;</td>
        <td style="width: 28%;">Di kelas</td>
        <td style="width: 2%">:</td>
        <td style="width: 65%"><?= $siswa->kelas_diterima ?></td>
    </tr>
    <tr>
        <td style="width: 5%;">&nbsp;</td>
        <td style="width: 28%;">Pada tanggal</td>
        <td style="width: 2%">:</td>
        <td style="width: 65%"><?= $siswa->tgl_diterima ?></td>
    </tr>
    <tr>
        <td style="width: 5%;">&nbsp;</td>
        <td style="width: 28%;">Nama Orang Tua</td>
        <td style="width: 2%">&nbsp;</td>
        <td style="width: 65%">&nbsp;</td>
    </tr>
    <tr>
        <td style="width: 5%;">&nbsp;</td>
        <td style="width: 28%;">a. Ayah</td>
        <td style="width: 2%">:</td>
        <td style="width: 65%"><?= $siswa->nama_ayah ?></td>
    </tr>
    <tr>
        <td style="width: 5%;">&nbsp;</td>
        <td style="width: 28%;">b. Ibu</td>
        <td style="width: 2%">:</td>
        <td style="width: 65%"><?= $siswa->nama_ibu ?></td>
    </tr>
    <tr>
        <td style="width: 5%;">12.</td>
        <td style="width: 28%;">Alamat Orang Tua</td>
        <td style="width: 2%">:</td>
        <td style="width: 65%"><?= $siswa->alamat_orangtua ?></td>
    </tr>
    <tr>
        <td style="width: 5%;">&nbsp;</td>
        <td style="width: 28%;">Nomor Telepon Rumah</td>
        <td style="width: 2%">:</td>
        <td style="width: 65%"><?= $siswa->tlp_ortu ?></td>
    </tr>
    <tr>
        <td style="width: 5%;">13.</td>
        <td style="width: 28%;">Pekerjaan Orang Tua</td>
        <td style="width: 2%">&nbsp;</td>
        <td style="width: 65%">&nbsp;</td>
    </tr>
    <tr>
        <td style="width: 5%;">&nbsp;</td>
        <td style="width: 28%;">a. Ayah</td>
        <td style="width: 2%">:</td>
        <td style="width: 65%"><?= $siswa->pekerjaan_ayah ?></td>
    </tr>
    <tr>
        <td style="width: 5%;">&nbsp;</td>
        <td style="width: 28%;">b. Ibu</td>
        <td style="width: 2%">:</td>
        <td style="width: 65%"><?= $siswa->pekerjaan_ibu ?></td>
    </tr>
    <tr>
        <td style="width: 5%;">14.</td>
        <td style="width: 28%;">Nama Wali Siswa</td>
        <td style="width: 2%">:</td>
        <td style="width: 65%"><?= $siswa->nama_wali ?></td>
    </tr>
    <tr>
        <td style="width: 5%;">15.</td>
        <td style="width: 28%;">Alamat Wali Siswa</td>
        <td style="width: 2%">:</td>
        <td style="width: 65%"><?= $siswa->alamat_wali ?></td>
    </tr>
    <tr>
        <td style="width: 5%;">&nbsp;</td>
        <td style="width: 28%;">Nomor Telepon Rumah</td>
        <td style="width: 2%">:</td>
        <td style="width: 65%"><?= $siswa->telp_wali ?></td>
    </tr>
    <tr>
        <td style="width: 5%;">16.</td>
        <td style="width: 28%;">Pekerjaan Wali Siswa</td>
        <td style="width: 2%">:</td>
        <td style="width: 65%"><?= $siswa->pekerjaan_wali ?></td>
    </tr>
    </table>
  </div>
</body>
</html>