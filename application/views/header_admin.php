<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.png">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/admin.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.slim.min.js"></script>
  </head>
  <body>

<div class="container" id="container">
    <div class="header clearfix">
      <nav>
        <ul class="nav nav-pills float-right mt-3">
          <li class="nav-item">
            <a class='nav-link active' href='index.php?menu=dashboard'>DASHBOARD</a>
          </li>
          <li class="nav-item">
            <a class='nav-link' href='index.php?menu=puskesmas'>PUSKESMAS</a>
          </li>
          <li class="nav-item">
            <a class='nav-link' href='index.php?menu=ptt'>PTT</a>
          </li>
          <li class="nav-item">
            <a class='nav-link' href='index.php?menu=distribusi'>DISTRIBUSI</a>
          </li>
          <li class="nav-item logout">
            <?php
                echo form_open('Login/prosesLogout');
              ?>
              <?php
                echo form_submit('submit','LOGOUT','class="nav-link btn btn-danger"');
                echo form_close();
              ?>

          </li>
        </ul>
      </nav>
      <div class="logo">
        <img src="<?php echo base_url(); ?>assets/img/logo-diskes.png" alt="Kemenkes Logo">
      </div>
    </div>
  </div>
