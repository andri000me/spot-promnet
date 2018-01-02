<?php $this->load->view('header_admin'); ?>

<div class="container" id="container">
  <div class="header clearfix">
    <nav>
      <ul class="nav nav-pills float-right mt-3">
        <li class="nav-item">
          <a class='nav-link' href='<?php echo base_url(); ?>index.php/Index'>BERANDA</a>
        </li>
        <li class="nav-item">
          <a class='nav-link active' href='<?php echo base_url(); ?>index.php/Guru/halamanMateri'>MATERI</a>
        </li>
        <li class="nav-item">
          <a class='nav-link' href='<?php echo base_url(); ?>index.php/Guru/halamanNilai'>NILAI</a>
        </li>
        <li class="nav-item logout">
          <a class="nav-link btn btn-danger" href="<?php echo base_url(); ?>index.php/Login/prosesLogout">LOGOUT</a>
        </li>
      </ul>
    </nav>
    <div class="logo">
      <!-- <img src="<?php echo base_url(); ?>assets/img/logo-diskes.png"> -->
      <h1>SPOT</h1>
    </div>
  </div>
<div class="container">
  <div class="row">
    <div class="col-12 pb-2">
      <h4>Tambah Materi </h4>
    </div>
      <div class="col-6 pt-4">
      <?php echo form_open_multipart('Guru/prosesTambahMateri'); ?>
      <input type="hidden" name="id" value="<?php echo $username; ?>">
        <div class="form-group row">
          <label for="materi" class="col-sm-3 col-form-label">Materi</label>
          <div class="col-sm-9">
            <?php echo form_upload('userfile'); ?>
          </div>
        </div>
        <div class="form-group row">
          <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
          <div class="col-sm-9">
            <textarea name="deskripsi" class="form-control"rows="3"></textarea>
          </div>
        </div>
      </div>
      <div class="col-7 text-right">
        <?php echo form_submit('submit','Tambah','name="tambah" class="btn btn-success"'); ?>
        <a href="<?php echo base_url(); ?>index.php/Admin/halamanGuru" class="btn btn-secondary">Kembali</a>
      </div>
    <?php echo form_close(); ?>
  </div>
</div>

<?php $this->load->view('footer'); ?>
