<?php  ?>
<?php $this->load->view('header_admin'); ?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card text-center">
        <div class="card-header">
          &nbsp;
        </div>
        <div class="card-body">
          <h5 class="card-title">Selamat datang, <?php echo $username; ?></h5>
          <p class="card-text">Proses distribusi pekerja tidak tetap akan dilakukan secara otomatis.</p>
          <a href="index.php?menu=distribusi_process" class="btn btn-lg btn-success mt-4 mb-4">DISTRIBUSI</a>
        </div>
        <div class="card-footer text-muted">
          2017 &copy; Dinas Kesehatan. All rights reserved
        </div>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('footer'); ?>
