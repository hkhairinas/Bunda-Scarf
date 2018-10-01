<div id="wrapper">
<nav class="navbar navbar-inverse navbar-static-top " role="navigation" style="margin-bottom: 0">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>     
       <a class="navbar-brand" href="<?php echo site_url('gudang/index')?>"><span>Bunda</span> Scarf</a>

    </div>


 <!-- Collect the nav links, forms, and other content for toggling -->
<div id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-top-links navbar-right">
      <!-- <li><p class="navbar-text"> Hai, <?php echo ucfirst($this->session->userdata('username')); ?></p></li> -->
        <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" >
                        <i class="fa fa-user fa-fw"></i> 
                        <?php echo ucfirst($this->session->userdata('nama_user')) ?>
                        <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('login/logout')?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
      </ul>


 <!-- Sidebar -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-brand">
                    <a href="<?php echo site_url('gudang/index')?>"> <i class="fa fa-dashboard fa-fw"></i> Dashboard Gudang </a>
                </li>

                <li class="dropdown-toggle">
                <a href="#"> <i class="fa fa-database fa-fw"></i> Manage Kategori <span class="fa arrow"></span></a>
                  <ul class="nav nav-second-level">
                    <li><a href="<?php echo site_url('kategori')?>"><i class="fa fa-table fa-fw"></i> Daftar Kategori </a></li>
                    <li><a href="<?php echo site_url('kategori/tampil_sKat')?>"><i class="fa fa-table fa-fw"></i> Daftar Jenis Produk </a></li>
                    <!-- 
                    <li><a href="<?php echo site_url('kategori/tambah')?>"><i class="fa fa-plus fa-fw"></i> Tambah Kategori </a></li>
                    <li><a href="<?php echo site_url('kategori/tambah_sKat')?>"><i class="fa fa-plus fa-fw"></i> Tambah Jenis Produk </a></li> -->
                  </ul>
                </li>

                <li class="dropdown-toggle">
                <a href="#"> <i class="fa fa-database fa-fw"></i> Manage Produk <span class="fa arrow"></span></a>
                  <ul class="nav nav-second-level">
                    <li><a href="<?php echo site_url('gudang/produk')?>"><i class="fa fa-table fa-fw"></i> Daftar Produk </a></li>
                    <li><a href="<?php echo site_url('gudang/tambah_produk')?>"><i class="fa fa-plus fa-fw"></i> Tambah Produk </a></li>
                  </ul>
                </li>
                <li class="sidebar-brand">
                <a href="<?php echo site_url('gudang/pesan_produk')?>">
                <i class="fa fa-envelope-o fa-fw"></i> Pemesanan Produk </a>
                </li>

                <li class="sidebar-brand">
                <a href="<?php echo site_url('laporan/cetakProduk')?>">
                <i class="fa fa-file-pdf-o fa-fw"></i> Laporan Produk </a>
                </li>
            </ul>
            </div>
        </div>
 <!-- /#sidebar-wrapper -->

</nav>
</div>
</div>