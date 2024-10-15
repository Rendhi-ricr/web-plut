<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Auth
$routes->group('', ['filter' => 'guest'], function ($routes) {
    $routes->get('login', 'Auth\Auth::login_view');
    $routes->get('register', 'Auth\Auth::register_view');
    $routes->get('register-umkm', 'Auth\Auth::register_umkm_view');
    $routes->post('login', 'Auth\Auth::login');
    $routes->post('register', 'Auth\Auth::register');
    $routes->post('register-umkm', 'Auth\Auth::register_umkm');
    $routes->get('skip', 'Auth\Auth::skip');
    // $routes->get('forgot-password', 'Auth\Auth::forgot_password');
    // $routes->post('reset-password', 'Auth\Auth::reset_password');
});

$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('logout', 'Auth\Auth::logout');
    // $routes->post('change-password', 'Auth\Auth::change_password');

    // UMKM
    $routes->group('umkm', ['filter' => ['auth', 'role:umkm,developer']], function ($routes) {
        $routes->get('', 'Umkm\Home::index');
        $routes->get('profil-umkm', 'Umkm\ProfilUmkm::index');
        $routes->post('profil-umkm/update', 'Umkm\ProfilUmkm::update');
        $routes->post('profil-umkm/uploadFile', 'Umkm\ProfilUmkm::uploadFile');
        $routes->get('profil-umkm/hapusFile/(:any)', 'Umkm\ProfilUmkm::hapusFile/$1');

        $routes->get('perkembangan', 'Umkm\Perkembangan::index');
        $routes->get('perkembangan/tambah', 'Umkm\Perkembangan::tambah');
        $routes->post('perkembangan/simpan', 'Umkm\Perkembangan::simpan');
        $routes->get('perkembangan/edit/(:num)', 'Umkm\Perkembangan::edit/$1');
        $routes->post('perkembangan/update/(:num)', 'Umkm\Perkembangan::update/$1');
        $routes->get('perkembangan/hapus/(:num)', 'Umkm\Perkembangan::hapus/$1');
    });

    // Admin
    $routes->group('admin', ['filter' => ['auth', 'role:admin,developer']], function ($routes) {
        $routes->get('', 'Admin\Home::index');
        $routes->get('umkm', 'Admin\DataUmkm::index');
        $routes->get('umkm/hapus/(:num)', 'Admin\DataUmkm::hapus/$1');
        $routes->get('perkembangan', 'Admin\Perkembangan::index');

        $routes->get('user', 'Admin\User::index');
        $routes->get('user/tambah', 'Admin\User::tambah');
        $routes->post('user/simpan', 'Admin\User::simpan');
        $routes->get('user/edit/(:num)', 'Admin\User::edit/$1');
        $routes->post('user/update/(:num)', 'Admin\User::update/$1');
        $routes->get('user/hapus/(:num)', 'Admin\User::hapus/$1');

        $routes->get('tamu', 'Admin\Tamu::index');

        $routes->get('kegiatan', 'Admin\Kegiatan::index');
        $routes->get('kegiatan/tambah', 'Admin\Kegiatan::tambah');
        $routes->post('kegiatan/simpan', 'Admin\Kegiatan::simpan');
        $routes->get('kegiatan/edit/(:num)', 'Admin\Kegiatan::edit/$1');
        $routes->post('kegiatan/update/(:num)', 'Admin\Kegiatan::update/$1');
        $routes->get('kegiatan/hapus/(:num)', 'Admin\Kegiatan::hapus/$1');
    });

    // Operator
    $routes->group('operator', ['filter' => ['auth', 'role:operator,developer']], function ($routes) {
        $routes->get('', 'Operator\Home::index');
        $routes->get('buku-tamu', 'Operator\Tamu::index');
        $routes->get('buku-tamu/tambah', 'Operator\Tamu::tambah');
        $routes->post('buku-tamu/simpan', 'Operator\Tamu::simpan');
        $routes->get('buku-tamu/edit/(:num)', 'Operator\Tamu::edit/$1');
        $routes->post('buku-tamu/update/(:num)', 'Operator\Tamu::update/$1');
        $routes->post('buku-tamu/selesai/', 'Operator\Tamu::selesai');
        $routes->get('buku-tamu/hapus/(:num)', 'Operator\Tamu::hapus/$1');
    });

    // Developer
    $routes->group('developer', ['filter' => ['auth', 'role:developer']], function ($routes) {
        $routes->get('', 'Developer\Home::index');
    });
});