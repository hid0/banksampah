<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/AdminLTE.min.css">
    <link rel="stylesheet" href="./assets/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="./assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="./assets/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/select2.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="fixed hold-transition skin-purple">
<div class="wrapper">

<header class="main-header">

<!-- Logo -->
  <a href="?page=dashaboard" class="logo">
    <span class="logo-mini"><b>B</b>SAM</span>
    <span class="logo-lg"><b>Bank</b> Sampah</span>
  </a>

  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="dropdown messages-menu">
        <li class="dropdown user user-menu">
          <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <img src="" class="user-image" alt="User Image">
          <span class="hidden-xs"><b>Account</b></span>
          </a> -->
          <ul class="dropdown-menu">
          <!-- User image -->
            <li class="user-header">
              <img src="" class="img-circle" alt="User Image">
              <p>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="?a=setting" class="btn btn-default btn-flat">Setting</a>
              </div>
              <div class="pull-right">
                <a href="?a=logout" onclick="return confirm('Apakah ingin Keluar?')" class="btn btn-default btn-flat">Logout</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>

  </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <!-- <div class="user-panel">
      <div class="pull-left image">
      <img src="" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
      <p style="font-size: 12px;"></p>
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div> -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="?page=dashboard">
            <i class="fa fa-dashboard"></i><span> Dashboard</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-database"></i>
            <span> Data Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?page=master&data=members"><i class="fa fa-circle-o"></i> Master Anggota</a></li>
            <li><a href="?page=master&data=type"><i class="fa fa-circle-o"></i> Master Jenis</a></li>
            <li><a href="?page=master&data=trash"><i class="fa fa-circle-o"></i> Master Sampah</a></li>
            <li><a href="?page=master&data=balance"><i class="fa fa-circle-o"></i> Tabungan</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dollar"></i>
            <span>Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?page=transaction&data=sell"><i class="fa fa-circle-o"></i> Master Jual</a></li>
            <li><a href="?page=transaction&data=buy"><i class="fa fa-circle-o"></i> Master Beli</a></li>
          </ul>
        </li>
        <li>
          <a href="?page=settings">
            <i class="fa fa-cogs"></i><span> Setting</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        <li>
          <a href="?page=auth&to=logout">
            <i class="fa fa-sign-out"></i><span> Logout</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
      </ul>
  </section>
  <!-- /.sidebar -->
</aside>
<div class="content-wrapper">
  <section class="content-header">
