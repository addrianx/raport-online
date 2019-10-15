<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


// Routing daftar guru
$route['admin/daftar-guru'] = 'admin/daftar_guru';
$route['admin/daftar-guru/(:num)'] = 'admin/edit_guru/$1';
$route['admin/daftar-guru/tambah-guru'] = 'admin/tambah_guru';
$route['admin/daftar-guru/edit-guru/(:any)'] = 'admin/edit_guru/$1';

// Routing daftar siswa
$route['admin/daftar-siswa'] = 'admin/daftar_siswa';
$route['admin/daftar-siswa/tambah-siswa'] = 'admin/tambah_siswa';
$route['admin/daftar-siswa/(:num)'] = 'admin/daftar_siswa/$1';
$route['admin/daftar-siswa/edit-siswa/(:num)'] = 'admin/edit_siswa/$1';
$route['admin/daftar-siswa/detail-siswa/(:num)'] = 'admin/detail_siswa/$1';


// Routing daftar kelas siswa
$route['admin/daftar-kelas'] = 'admin/daftar_kelas';

// Routing daftar nilai siswa
$route['admin/daftar-nilai'] = 'admin/daftar_nilai';
$route['admin/daftar-nilai/(:any)'] = 'admin/daftar_nilai/$1';

// Routing setting
$route['admin/setting'] = 'admin/setting';
$route['admin/setting/setting-sidebar'] = 'admin/setting_sidebar';

$route['admin/setting/ubah-password'] = 'admin/ganti_password';





//Routing Siswa
// 

// Routing daftar nilai siswa
$route['siswa/daftar-nilai'] = 'siswa/daftar_nilai';
$route['siswa/tugas-siswa'] = 'siswa/tugas_siswa';