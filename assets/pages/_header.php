<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="./assets/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/select2.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="./assets/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="./assets/css/AdminLTE.min.css">
</head>
<body class="fixed hold-transition skin-green">
<div class="wrapper">

<header class="main-header">

<!-- Logo -->
  <a href="?page=dashboard" class="logo">
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
      </ul>
    </div>

  </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar" style="height: auto;">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="./assets/images/user.svg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p style="font-size: 12px;"><?=$_SESSION['name'];?></p>
        <p><i class="fa fa-circle text-success"></i> Online</p>
      </div>
    </div>
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" placeholder="Search...." class="form-control">
        <span class="input-group-btn">
          <button type="submit" class="btn btn-flat"><i class="fa fa-search"></i></button>
        </span>
      </div>
    </form>
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
        <li class="<?=$_GET['page'] == 'dashboard' ? "active" : null ?>">
          <a href="?page=dashboard">
            <i class="fa fa-dashboard"></i><span> Dashboard</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        <?php 
        if ($_SESSION['level'] == 'administrator' || $_SESSION['level'] == 'member') {
        ?>
        <li class="treeview <?=$_GET['page'] == 'master' ? "active menu-open" : null ?>">
          <a href="#">
            <i class="fa fa-database"></i>
            <span> Data Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php 
            if ($_SESSION['level'] == 'administrator') { ?>
            <li class="<?=$_GET['data'] == 'members' ? "active" : null ?>"><a href="?page=master&data=members"><i class="fa fa-circle-o"></i> Master Anggota</a></li class="">
            <?php
            }
            ?>
            <li class="<?=$_GET['data'] == 'type' ? "active" : null ?>"><a href="?page=master&data=type"><i class="fa fa-circle-o"></i> Master Jenis</a></li class="">
            <li class="<?=$_GET['data'] == 'trash' ? "active" : null ?>"><a href="?page=master&data=trash"><i class="fa fa-circle-o"></i> Master Sampah</a></li>
          </ul>
        </li>
        <?php } ?>
        <li class="<?=$_GET['page'] == 'settings' ? "active" : null ?>">
          <a href="?page=settings">
            <i class="fa fa-cogs"></i><span> Setting</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        <li>
          <a href="?page=auth&to=logout" onclick="return confirm('Apakah ingin Keluar?')">
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
