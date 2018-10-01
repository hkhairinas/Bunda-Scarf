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
       <a class="navbar-brand" href="<?php echo site_url('penjualan/index')?>"><span>Bunda</span> Scarf</a>

    </div>


 <!-- Collect the nav links, forms, and other content for toggling -->
<div id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-top-links navbar-right">
      <!-- <li><p class="navbar-text"> Hai, <?php echo ucfirst($this->session->userdata('username')); ?></p></li> -->
        <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
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
                    <!-- /.dropdown-user -->
                </li>
      </ul>


 <!-- Sidebar -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-brand">
                    <a href="<?php echo site_url('penjualan')?>"> <i class="fa fa-dashboard fa-fw"></i> Dashboard Kasir </a>
                </li>
                <li class="sidebar-brand">
                    <a href="<?php echo site_url('transaksi')?>"> <i class="fa fa-shopping-cart fa-fw"></i> Transaksi </a>
                </li>
                <li class="sidebar-brand">
                    <a href="<?php echo site_url('transaksi/datapenjualan')?>"> <i class="fa fa-table fa-fw"></i> Data Transaksi </a>
                </li>
                <li class="dropdown-toggle">
                <a href="#"> <i class="fa fa-database fa-fw"></i> Manage Pelanggan <span class="fa arrow"></span></a>
                  <ul class="nav nav-second-level">
                    <li><a href="<?php echo site_url('customer')?>"><i class="fa fa-table fa-fw"></i> Daftar Pelanggan </a></li>
                    <li><a href="<?php echo site_url('customer/tbh_plgn')?>"><i class="fa fa-plus fa-fw"></i> Tambah Pelanggan </a></li>
                  </ul>
                </li>

                <li class="sidebar-brand">
                    <a href="<?php echo site_url('penjualan/produk')?>"> <i class="fa fa-table fa-fw"></i> Daftar Produk </a>
                </li>

                <li class="sidebar-brand">
                <a href="<?php echo site_url('laporan/Penjualan')?>"><i class="fa fa-file-pdf-o fa-fw"></i> Laporan Transaksi </a></li>
                
            </ul>
            </div>
        </div>
 <!-- /#sidebar-wrapper -->

</nav>
</div>
</div>