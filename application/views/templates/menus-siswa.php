<div class="wrapper ">
  <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"
    Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo">
      <a href="http://www.nilaiku.com" class="simple-text logo-normal">
        Raport-Online
      </a>
    </div>
    <div class="sidebar-wrapper">
      <ul class="nav">

        <li class="nav-item <?php if($this->uri->segment(1)=="siswa"&&$this->uri->segment(2)==""){echo 'active';}?>">
          <a class="nav-link" href="<?=base_url('siswa');?>">
            <i class="fa fa-tachometer"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <!-- Menu Siswa -->
         <li class="nav-item <?php if($this->uri->segment(1)=="siswa"&&$this->uri->segment(2)=="absensi"){echo 'active';}?>">
           <a class="nav-link" href="<?=base_url('siswa/absensi');?>">
             <i class="fa fa-group"></i>
             <p>Daftar Absensi Kelas</p>
           </a>
         </li>
         <li class="nav-item <?php if($this->uri->segment(2)=="daftar_nilai"||$this->uri->segment(2)=="daftar-nilai"){echo 'active';}?>">
           <a class="nav-link " href="<?=base_url('siswa/daftar-nilai');?>">
             <i class="fa fa-line-chart"></i>
             <p>Daftar Nilai</p>
           </a>
         </li>
         <li class="nav-item <?php if($this->uri->segment(2)=="tugas_siswa"OR$this->uri->segment(2)=="tugas-siswa"){echo 'active';}?>">
           <a class="nav-link" href="<?=base_url('siswa/tugas-siswa');?>">
             <i class="fa fa-line-chart"></i>
             <p>Tugas Siswa</p>
           </a>
         </li>

        <li class="nav-item ">
          <a class="nav-link" href="<?=base_url();?>siswa/setting">
            <i class="fa fa-gear"></i>
            <p>Settings</p>
          </a>
        </li>

      </ul>
    </div>
  </div>

 <div class="main-panel">
   <!-- Navbar -->
       <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
         <div class="container-fluid">
           <div class="navbar-wrapper">
             <a class="navbar-brand" href="#pablo">Dashboard</a>

           </div>
           <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
           <span class="sr-only">Toggle navigation</span>
           <span class="navbar-toggler-icon icon-bar"></span>
           <span class="navbar-toggler-icon icon-bar"></span>
           <span class="navbar-toggler-icon icon-bar"></span>
           </button>
           <div class="collapse navbar-collapse justify-content-end">
             
             <ul class="navbar-nav">
               <li class="nav-item dropdown">
                 <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   <i class="material-icons">Pemberitahuan</i>
                   <span class="notification">5</span>
                   <p class="d-lg-none d-md-block">
                     Some Actions
                   </p>
                 </a>
                 <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                   <a class="dropdown-item" href="#">Mike John responded to your email</a>
                   <a class="dropdown-item" href="#">You have 5 new tasks</a>
                   <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                   <a class="dropdown-item" href="#">Another Notification</a>
                   <a class="dropdown-item" href="<?= base_url('siswa/logout');?>">Logout</a>
                 </div>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="#pablo">
                   <i class="material-icons">person</i>
                   <p class="d-lg-none d-md-block">
                     Account
                   </p>
                 </a>
               </li>
             </ul>
           </div>
         </div>
       </nav>
