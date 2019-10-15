<div class="wrapper ">

  <div class="sidebar" data-color="<?=$this->navcolor['color_nav'];?>" data-background-color="<?=$this->bgcolor['bg_color'];?>" data-image="<?=base_url('public/img/sidebar-1.jpg');?>">
    <!--

    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

    Tip 2: you can also add an image using data-image tag

    -->
    <div class="logo">
      <a href="http://www.nilaiku.com" class="simple-text logo-normal">
        Web-Nilai
      </a>
    </div>

    <div class="sidebar-wrapper">
      <ul class="nav">
      

        <li class="nav-item <?php if($this->uri->segment(1)=="admin"&&$this->uri->segment(2)==""){echo 'active';}?>">
          <a class="nav-link" href="<?=base_url('admin');?>">
            <i class="fa fa-tachometer"></i>
            <p>Dashboard</p>
          </a>
        </li>


        <!-- Jika Admin -->
        <li class="nav-item <?php if($this->uri->segment(2)=="daftar_guru"||$this->uri->segment(2)=="daftar-guru"){echo 'active';}?>">
          <a class="nav-link" href="<?=base_url('admin/daftar-guru')?>">
              <i class="fa fa-user"></i>
              <p>Daftar Guru</p>
          </a>
        </li>



        <li class="nav-item <?php if($this->uri->segment(2)=="daftar_siswa"||$this->uri->segment(2)=="daftar-siswa"){echo 'active';}?>">
          <a class="nav-link" href="<?=base_url('admin/daftar-siswa');?>">
              <i class="fa fa-graduation-cap"></i>
              <p>Daftar Siswa</p>
          </a>
        </li>



        <li class="nav-item <?php if($this->uri->segment(2)=="daftar_kelas"||$this->uri->segment(2)=="daftar-kelas"){echo 'active';}?>">
          <a class="nav-link" href="<?=base_url();?>admin/daftar-kelas">
              <i class="fa fa-building"></i>
              <p>Daftar Kelas</p>
          </a>
        </li>



        <li class="nav-item <?php if($this->uri->segment(2)=="daftar_nilai"||$this->uri->segment(2)=="daftar-nilai"){echo 'active';}?>">
          <a class="nav-link" href="<?=base_url();?>admin/daftar-nilai">
              <i class="fa fa-book"></i>
              <p>Daftar Nilai</p>
          </a>
        </li>



        <li class="nav-item <?php if($this->uri->segment(2)=="mata_pelajaran"||$this->uri->segment(2)=="mata-pelajaran"){echo 'active';}?>">
          <a class="nav-link" href="<?=base_url();?>admin/mata_pelajaran">
              <i class="fa fa-book"></i>
              <p>Mata Pelajaran</p>
          </a>
        </li>



        <li class="nav-item <?php if($this->uri->segment(2)=="setting"){echo 'active';}?>">
          <a class="nav-link" href="<?=base_url();?>admin/setting">
            <i class="fa fa-gear"></i>
            <p>Settings</p>
          </a>
        </li>



        <li class="nav-item ">
          <a class="nav-link" onclick="return confirm('Anda Yakin Ingin Akhiri Sesi')" href="<?=base_url('admin/logout');?>">
            <i class="fa fa-lock"></i>
            <p>Logout</p>
          </a>
        </li>



      </ul>
    </div>
  </div>



 <div class="main-panel">
   <!-- Navbar -->

       <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top">
         <div class="container-fluid">
           <div class="navbar-wrapper">
             <a class="navbar-brand" href="#pablo"><?=$Judul;?></a>


           </div>
           <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
           <span class="sr-only">Toggle navigation</span>
           <span class="navbar-toggler-icon icon-bar"></span>
           <span class="navbar-toggler-icon icon-bar"></span>
           <span class="navbar-toggler-icon icon-bar"></span>
           </button>

           <div class="collapse navbar-collapse justify-content-end">

           <?php if($this->uri->segment(1)=="admin"&&$this->uri->segment(2)==TRUE) :?>

             

           <?php endif;?>
             <ul class="navbar-nav">
               <li class="nav-item">
                 <a class="nav-link" href="#pablo">
                   <i class="fa fa-tachometer"></i>
                   <p class="d-lg-none d-md-block">
                     Stats
                   </p>
                 </a>
               </li>

               <li class="nav-item dropdown">
                 <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   <i class="material-icons">Pemberitahuan</i>
                   <span class="notification">5</span>
                   <p class="d-lg-none d-md-block">
                     Opsi
                   </p>
                 </a>

                 <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                   <a class="dropdown-item" href="#">Inbox</a>
                   <a class="dropdown-item" href="#">Tugas</a>
                 </div>

               </li>
             </ul>
           </div>
         </div>

       </nav>

