<?php

?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url() ?>assets/img/admin_icon.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p> <?php echo $nama_admin;  ?> </p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>

      <li <?php if ("/sp_padi/admin" == $_SERVER['REQUEST_URI']) {
          ?> class="active" <?php } ?>>
        <a href="<?php echo base_url() ?>admin">
          <i class="fa fa-home"></i> <span>Dashboard</span>
        </a>
      </li>
      <li <?php if ("/sp_padi/admin/gejala" == $_SERVER['REQUEST_URI']) {
          ?> class="active" <?php } ?>>
        <a href="<?php echo base_url() ?>admin/gejala">
          <i class="fa fa-stethoscope"></i> <span>Gejala</span>
        </a>
      </li>
      <li <?php if ("/sp_padi/admin/penyakit" == $_SERVER['REQUEST_URI']) {
          ?> class="active" <?php } ?>>
        <a href="<?php echo base_url() ?>admin/penyakit">
          <i class="fa fa-medkit"></i> <span>Penyakit</span>
        </a>
      </li>
      <li <?php if ("/sp_padi/admin/basispengetahuan" == $_SERVER['REQUEST_URI']) {
          ?> class="active" <?php } ?>>
        <a href="<?php echo base_url() ?>admin/basispengetahuan">
          <i class="fa fa-database"></i> <span>Basis Pengetahuan</span>
        </a>
      </li>
      <li <?php if ("/sp_padi/admin/gejalacf" == $_SERVER['REQUEST_URI']) {
          ?> class="active" <?php } ?>>
        <a href="<?php echo base_url() ?>admin/gejalacf">
          <i class="fa fa-stethoscope"></i> <span>Gejala CF</span>
        </a>
      </li>
      <li <?php if ("/sp_padi/admin/penyakitcf" == $_SERVER['REQUEST_URI']) {
          ?> class="active" <?php } ?>>
        <a href="<?php echo base_url() ?>admin/penyakitcf">
          <i class="fa fa-medkit"></i> <span>Penyakit CF</span>
        </a>
      </li>
      <li <?php if ("/sp_padi/admin/aturan" == $_SERVER['REQUEST_URI']) {
          ?> class="active" <?php } ?>>
        <a href="<?php echo base_url() ?>admin/aturan">
          <i class="fa fa-database"></i> <span>Aturan CF</span>
        </a>
      </li>
      <li <?php if ("/sp_padi/admin/member" == $_SERVER['REQUEST_URI']) {
          ?> class="active" <?php } ?>>
        <a href="<?php echo base_url() ?>admin/member">
          <i class="fa fa-user"></i> <span>Member</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>