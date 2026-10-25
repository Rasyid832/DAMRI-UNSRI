<?php
$menu = [
    'Beranda'     => '#beranda',
    'Pesan Tiket' => '#pesan',
    'Jadwal'      => '#jadwal',
    'Rute'        => '#rute',
    'Informasi'   => '#informasi',
    'Kontak'      => '#kontak',
];

$linkClass = 'relative text-slate-600 hover:text-damri-navy transition-colors duration-300
              after:absolute after:left-0 after:-bottom-1 after:h-0.5 after:w-0
              after:bg-amber-500 after:transition-all after:duration-300
              hover:after:w-full';
?>

<header class="sticky top-0 z-50 bg-white shadow-sm border-b border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            
        <!-- Logo Top Left -->
        <a href="#" class="flex items-center gap-2.5">
            <div class="w-9 h-9 rounded-xl bg-amber-500 flex items-center justify-center text-white shadow-sm">
                <i class="fa-solid fa-bus text-lg"></i>
            </div>
            <div class="flex items-center">
                <span class="text-2xl font-black tracking-tight text-damri-navy">DAMRI</span>
                <span class="text-2xl font-black tracking-tight text-amber-500">UNSRI</span>
            </div>
        </a>

        <!-- Navigation Links Center -->
        <nav class="hidden md:flex items-center space-x-8 text-sm font-semibold">
            <?php foreach ($menu as $label => $href): ?>
                <a href="<?= $href ?>" class="<?= $linkClass ?>"><?= $label ?></a>
            <?php endforeach; ?>
        </nav>

        <!-- Top Right Action Buttons -->
        <div class="hidden md:flex items-center space-x-3">
            <button id="openLoginBtn" class="px-5 py-2 text-sm font-semibold text-damri-navy border border-slate-300 rounded-xl hover:bg-damri-navy hover:text-white transition-all duration-300">
                Masuk
            </button>
            <button id="openRegisterBtn" class="px-5 py-2 text-sm font-semibold text-white bg-amber-500 hover:bg-amber-600 rounded-xl shadow-sm transition-all">
                Daftar
            </button>
        </div>

        <!-- Mobile Menu Toggle -->
        <button id="mobileMenuBtn" class="md:hidden p-2 text-slate-600 hover:bg-slate-100 rounded-lg">
            <i class="fa-solid fa-bars text-xl"></i>
        </button>
    </div>

    <!-- Mobile Menu Drawer -->
    <div id="mobileMenu" class="hidden md:hidden bg-white border-b border-slate-100 px-4 pt-2 pb-5 space-y-3">
        <a href="#beranda" class="block py-1.5 text-slate-600 font-medium hover:text-damri-navy transition-colors duration-300">
            Beranda
        </a>
        <a href="#pesan" class="block py-1.5 text-slate-600 font-medium hover:text-damri-navy transition-colors duration-300">
            Pesan Tiket
        </a>
        <a href="#jadwal" class="block py-1.5 text-slate-600 font-medium hover:text-damri-navy transition-colors duration-300">
            Jadwal
        </a>
        <a href="#rute" class="block py-1.5 text-slate-600 font-medium hover:text-damri-navy transition-colors duration-300">
            Rute
        </a>
        <a href="#informasi" class="block py-1.5 text-slate-600 font-medium hover:text-damri-navy transition-colors duration-300">
            Informasi
        </a>
        <a href="#kontak" class="block py-1.5 text-slate-600 font-medium hover:text-damri-navy transition-colors duration-300">
            Kontak
        </a>
        <div class="pt-3 border-t border-slate-100 flex gap-3">
            <button id="openLoginMobileBtn" class="w-1/2 py-2 text-sm font-semibold text-damri-navy border border-slate-300 rounded-xl hover:bg-damri-navy hover:text-white transition-all duration-300">
                Masuk
            </button>
            <button id="openRegisterMobileBtn" class="w-1/2 py-2 text-sm font-semibold text-white bg-amber-500 rounded-xl hover:bg-amber-600 rounded-xl shadow-sm transition-all">
                Daftar
            </button>
        </div>
    </div>
</header>