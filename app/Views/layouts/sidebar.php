<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand text-center fs-2" href="index.html">
            <span class="align-middle">SILADU</span>
        </a>
        <ul class="sidebar-nav">

            <li class="sidebar-header">
                Beranda
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="<?=base_url(session()->get('role'))?>">
                    <i class="align-middle" data-feather="home"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>
            <?php if (session()->get('role') == 'admin' || session()->get('role') == 'developer'): ?>
            <li class="sidebar-header">
                Master
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="<?=base_url('admin/user')?>">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Manajemen User
                        UMKM</span>
                </a>
            </li>
            <?php endif;?>
            <li class="sidebar-header">
                Data
            </li>
            <?php if (session()->get('role') == 'admin' || session()->get('role') == 'developer'): ?>
            <li class="sidebar-item">
                <a class="sidebar-link" href="<?=base_url('admin/umkm')?>">
                    <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">Data UMKM</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="<?=base_url('admin/perkembangan')?>">
                    <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Data Perkembangan
                        UMKM</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="<?=base_url('admin/tamu')?>">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">
                        Data Tamu</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="<?=base_url('admin/kegiatan')?>">
                    <i class="align-middle" data-feather="activity"></i> <span class="align-middle">
                        Data Kegiatan</span>
                </a>
            </li>
            <?php endif;?>
            <?php if (session()->get('role') == 'umkm' || session()->get('role') == 'developer'): ?>
            <li class="sidebar-item">
                <a class="sidebar-link" href="<?=base_url('umkm/profil-umkm')?>">
                    <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">Profil UMKM</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="<?=base_url('umkm/perkembangan')?>">
                    <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Perkembangan
                        UMKM</span>
                </a>
            </li>
            <?php endif;?>
            <?php if (session()->get('role') == 'operator' || session()->get('role') == 'developer'): ?>
            <li class="sidebar-item">
                <a class="sidebar-link" href="<?=base_url('operator/buku-tamu');?>">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Buku Tamu</span>
                </a>
            </li>
            <?php endif;?>
        </ul>
    </div>
</nav>