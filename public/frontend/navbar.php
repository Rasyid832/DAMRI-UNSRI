<?php 
// navbar.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$menu = [
    'Beranda'     => '#beranda',
    'Pesan Tiket' => '#pesan',
    'Jadwal'      => '#jadwal',
    'Rute'        => '#rute',
    'Informasi'   => '#informasi',
    'Kontak'      => '#kontak',
];

$linkClass = 'nav-link relative text-slate-600 hover:text-amber-500 transition-colors duration-300
              after:absolute after:left-0 after:-bottom-1 after:h-0.5 after:w-0
              after:bg-amber-500 after:transition-all after:duration-300
              hover:after:w-full focus:text-amber-500 focus:after:w-full';
?>

<header class="sticky top-0 z-50 bg-white shadow-sm border-b border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            
        <a href="index.php" class="flex items-center gap-2">
            <img src="../images/logo_damri.png" class="w-[130px] h-[45px] object-contain shrink-0" alt="Logo DAMRI">
            <span class="text-3xl font-black tracking-tight text-amber-500">UNSRI</span>
        </a>

        <nav class="hidden md:flex items-center space-x-8 text-sm font-semibold">
            <?php foreach ($menu as $label => $href): ?>
                <a href="<?= $href ?>" class="<?= $linkClass ?>"><?= $label ?></a>
            <?php endforeach; ?>
        </nav>

        <!-- Bagian User / Auth Section -->
        <div class="hidden md:flex items-center">
            <?php if (isset($_SESSION['user_id'])): ?>
                <!-- JIKA SUDAH LOGIN -->
                <div class="relative group inline-block">
                    <div class="cursor-pointer flex items-center gap-2.5 py-2 text-slate-700 hover:text-amber-500 transition-colors">
                        <i class="fa-solid fa-circle-user text-2xl text-slate-500 group-hover:text-amber-500"></i>
                        <span class="text-sm font-semibold"><?= htmlspecialchars($_SESSION['nama']) ?></span>
                        <i class="fa-solid fa-chevron-down text-xs transition-transform duration-300 group-hover:rotate-180"></i>
                    </div>
                    
                    <div class="absolute right-0 top-full pt-2 w-48 hidden group-hover:block z-50">
                        <div class="bg-white shadow-lg border border-slate-100 rounded-xl p-2 space-y-1">
                            <a href="dashboard.php" class="block px-4 py-2 text-sm text-slate-600 hover:bg-slate-50 hover:text-amber-500 rounded-lg transition-colors">Dashboard</a>
                            <a href="../backend/auth/logout.php" class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50 rounded-lg transition-colors">Logout</a>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <!-- JIKA BELUM LOGIN -->
                <div class="flex items-center gap-3">
                    <a href="loginPage.php" class="px-4 py-2 text-sm font-semibold text-white rounded-xl bg-damri-navyLight hover:bg-damri-navy transition-colors">Sign In</a>
                    <a href="loginPage.php#register" class="px-4 py-2 text-sm font-semibold bg-amber-500 hover:bg-amber-600 text-white rounded-xl shadow transition-colors">Sign Up</a>
                </div>
            <?php endif; ?>
        </div>

        <button id="humberger" class="md:hidden p-2 text-slate-600 hover:bg-slate-100 rounded-lg">
            <i class="fa-solid fa-bars text-xl"></i>
        </button>
    </div>

    <div id="mobileMenu" class="hidden md:hidden bg-white border-b border-slate-100 px-4 pt-2 pb-5 space-y-3 transition-all duration-300">
        <?php foreach ($menu as $label => $href): ?>
            <a href="<?= $href ?>" class="mobile-nav-link block py-1.5 text-slate-600 font-medium hover:text-amber-500 transition-colors duration-300">
                <?= $label ?>
            </a>
        <?php endforeach; ?>
        
        <div class="pt-3 border-t border-slate-100 flex flex-col gap-2">
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="dashboard.php" class="block py-1.5 text-slate-600 font-medium">Dashboard (<?= htmlspecialchars($_SESSION['nama']) ?>)</a>
                <a href="../backend/auth/logout.php" class="block py-1.5 text-red-600 font-medium">Logout</a>
            <?php else: ?>
                <a href="loginPage.php" class="block py-1.5 text-amber-500 font-bold">Sign In / Sign Up</a>
            <?php endif; ?>
        </div>
    </div>
</header>
<script src="js/index.js"></script>