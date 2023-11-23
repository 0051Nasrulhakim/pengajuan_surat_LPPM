<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'Home::index');
$routes->get('/admin', 'Admin::index',['filter' => 'cek_login']);
$routes->get('/admin/studiPendahuluan', 'Admin::studiPendahuluan',['filter' => 'cek_login']);
$routes->get('/admin/studiPendahuluan/', 'Admin::studiPendahuluan/',['filter' => 'cek_login']);
$routes->get('/admin/pengajuanPenelitian', 'Admin::pengajuanPenelitian',['filter' => 'cek_login']);
$routes->get('/admin/ujiValiditas', 'Admin::ujiValiditas',['filter' => 'cek_login']);
$routes->get('/admin/determinasi_tanaman', 'Admin::determinasi_tanaman',['filter' => 'cek_login']);

$routes->get('/admin/suratTugasHKI', 'Admin::suratTugasHKI',['filter' => 'cek_login']);
$routes->get('/admin/suratPublikasi', 'Admin::suratPublikasi',['filter' => 'cek_login']);
$routes->get('/admin/oral_presentasi', 'Admin::oral_presentasi',['filter' => 'cek_login']);
$routes->get('/admin/ethical', 'Admin::ethical',['filter' => 'cek_login']);
$routes->get('/admin/izin_penelitian', 'Admin::izin_penelitian',['filter' => 'cek_login']);
$routes->get('/admin/izin_pengabdianMasyarakat', 'Admin::izin_pengabdianMasyarakat',['filter' => 'cek_login']);
$routes->get('/admin/tugas_pengabdian', 'Admin::tugas_pengabdian',['filter' => 'cek_login']);
$routes->get('/admin/tugas_penelitian', 'Admin::tugas_penelitian',['filter' => 'cek_login']);

$routes->get('/admin/penyesuaian_nomor', 'Admin::penyesuaian_nomor',['filter' => 'cek_login']);
$routes->get('/admin/export_laporan', 'Admin::export_laporan',['filter' => 'cek_login']);



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
