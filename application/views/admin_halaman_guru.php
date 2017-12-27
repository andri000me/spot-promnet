<?php $this->load->view('header_admin'); ?>


<div class="container" id="container">
  <div class="header clearfix">
    <nav>
      <ul class="nav nav-pills float-right mt-3">
        <li class="nav-item">
          <a class='nav-link' href='<?php echo base_url(); ?>index.php/Index'>BERANDA</a>
        </li>
        <li class="nav-item">
          <a class='nav-link active' href='<?php echo base_url(); ?>index.php/Admin/halamanGuru'>GURU</a>
        </li>
        <li class="nav-item">
          <a class='nav-link' href='<?php echo base_url(); ?>index.php/Admin/halamanSiswa'>SISWA</a>
        </li>
        <li class="nav-item">
          <a class='nav-link' href='<?php echo base_url(); ?>index.php/Admin/halamanAkun'>AKUN</a>
        </li>
        <li class="nav-item logout">
          <a class="nav-link btn btn-danger" href="<?php echo base_url(); ?>index.php/Login/prosesLogout">LOGOUT</a>
        </li>
      </ul>
    </nav>
    <div class="logo">
      <img src="<?php echo base_url(); ?>assets/img/logo-diskes.png" alt="Kemenkes Logo">
    </div>
  </div>
<div class="container" id="menu-top">
  <div class="row">
    <div class="col-md-6">
      <h4>Data Guru</h4>
    </div>
    <div class="col-md-6">
      <form action="index.php" method="get" class="form-inline">
        <input type="hidden" name="menu" value="puskesmas">
        &nbsp;<a href="<?php echo base_url(); ?>index.php/Admin/tambahGuru" class="btn btn-success">Tambah</a>
        &nbsp;<a href="#" id="cetak" class="btn btn-info mr-auto">Cetak</a>&nbsp;
        <div class="input-group">
          <?php
            if(isset($_GET['search'])){
              echo "<input type='text' name='search' class='form-control' value='$id'>";
            }else {
              echo "<input type='text' name='search' class='form-control'>";
            }
          ?>
          <span class="input-group-btn">
            <button class="btn btn-success" type="submit">Cari</button>
          </span>
        </div>
        &nbsp;<a href="<?php echo base_url(); ?>index.php/Admin/halamanGuru" class="btn btn-secondary">Batal</a>
      </form>
    </div>
  </div>
</div>

<div class="table-responsive pt-3">
  <table id="table" class="table table-striped">
    <thead>
      <tr>
        <th width="10px">No</th>
        <th width="150px">Pelajaran</th>
        <th width="100px">NIP</th>
        <th width="200px">Nama</th>
        <th width="100px">No HP</th>
        <th width="180px" id="head-table">Alamat</th>
        <th width="140px" id="head-table">Kelola</th>
      </tr>
    </thead>
    <tbody>
      <?php

        if(isset($_GET['search'])){
          if($arg){
            $i = 1;
            foreach ($arg as $data) {
            ?>
            <tr>
              <td><?php echo $i++ ?></td>
              <td><?php echo $data['namaPuskesmas'] ?></td>
              <td><?php echo $data['alamatPuskesmas'].", ".$data['namaDesa'].", ".$data['namaKecamatan'].", ".$data['namaKota'].", ".$data['namaProvinsi'] ?></td>
              <td><?php echo $data['kodePos'] ?></td>
              <td><?php echo $data['kuota'] ?></td>
              <td id="body-table"><a class="btn btn-success btn-sm" href="<?php echo base_url(); ?>index.php/Admin/halamanAkun/<?php echo $data['idPuskesmas'] ?>">Ubah</a>
                  <a class="btn btn-danger btn-sm" href="index.php?menu=delete&id=<?php echo $data['idPuskesmas'] ?>">Hapus</a></td>
            </tr>
            <?php
            }
          }else{
            ?>
            <tr>
              <td colspan="10"><center>Hasil pencarian tidak ditemukan.</center></td>
            </tr>
            <?php
          }
        }else{
          if($data_guru){
            $i = 1;
            foreach ($data_guru as $data) {
              extract($data);
          ?>
          <tr>
            <td><?php echo $i++ ?></td>
            <td><?php echo $namaMapel ?></td>
            <td><?php echo $NIP ?></td>
            <td><?php echo $namaGuru ?></td>
            <td><?php echo $noHP ?></td>
            <td><?php echo $alamat; ?></td>
            <td id="body-table"><a class="btn btn-success btn-sm" href="<?php echo base_url(); ?>index.php/Admin/ubahGuru/<?php echo $idGuru ?>">Ubah</a>
                <a class="btn btn-danger btn-sm" href="<?php echo base_url(); ?>index.php/Admin/hapusGuru/<?php echo $idGuru ?>">Hapus</a></td>
          </tr>
          <?php
            }
          }else{
            ?>
            <tr>
              <td colspan="10"><center>Data tidak ada.</center></td>
            </tr>
            <?php
          }

        }
      ?>
    </tbody>
  </table>
  <nav aria-label="...">
    <ul class="pagination">
      <li class="page-item disabled">
        <a class="page-link" href="#" tabindex="-1">Previous</a>
      </li>
      <li class="page-item active">
        <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
      </li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item">
        <a class="page-link" href="#">Next</a>
      </li>
    </ul>
  </nav>
  <div class="ttd text-right mt-5">
    <p class="font-weight-normal mr-3">Bandung, <?php echo date("d-m-Y"); ?></p>

    <p class="font-weight-bold mt-5 pt-1 mr-4"><u><?php echo $_SESSION['nama']; ?></u></p>
  </div>
</div>


<?php $this->load->view('footer'); ?>
