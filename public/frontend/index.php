<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DAMRI UNSRI - Pemesanan Tiket Bus Mahasiswa Universitas Sriwijaya</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Font: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        damri: {
                            navy: '#1E3A8A',      /* Dark navy blue for text & footer */
                            blue: '#024CAA',      /* Primary brand blue */
                            amber: '#F59E0B',     /* Yellow / Orange brand color */
                            yellowHover: '#D97706',
                            cardBg: '#F8FAFC',
                            footerBg: '#1D2A44'
                        }
                    }
                }
            }
        }
    </script>
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body class="bg-slate-50 font-sans text-slate-800 antialiased min-h-screen flex flex-col justify-between">

    <!-- Header / Navbar -->
    <?php include 'navbar.php'; ?>

    <!-- Main Content -->
    <main id="beranda" class="flex-grow">
        
        <!-- HERO SECTION DENGAN EFEK GRADASI BLUR/FADE PADA FOTO -->
        <section class="relative bg-white pt-6 pb-20 overflow-hidden min-h-[480px] lg:min-h-[520px] flex items-center">
            
            <!-- Foto Full Background di Sebelah Kanan dengan Overlay Gradasi Putih -->
            <div class="absolute inset-0 z-0 flex justify-end pointer-events-none">
                <div class="relative w-full lg:w-3/4 h-full">
                    <!-- Foto Utama Bus & Rektorat UNSRI -->
                    <img src="../images/lnding-page.jpeg" 
                         alt="Bus DAMRI Universitas Sriwijaya" 
                         class="w-full h-full object-cover object-right"
                         />
                    <!-- Overlay Gradasi Halus: Putih di Kiri menyatu ke Transparan di Kanan -->
                    <div class="absolute inset-0 bg-gradient-to-r from-white via-white/95 via-40% to-transparent"></div>
                    
                    <!-- Overlay Tambahan Kecerahan Putih dari Bawah untuk Transisi Form Tiket -->
                    <div class="absolute inset-x-0 bottom-0 h-32 bg-gradient-to-t from-white to-transparent"></div>
                </div>
            </div>

            <!-- Konten Teks Hero di Atas Layer Foto -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                    
                    <div class="lg:col-span-6 space-y-5">
                        <div class="space-y-1">
                            <h1 class="text-4xl sm:text-5xl lg:text-5xl font-black tracking-tight leading-[1.15] text-damri-navy">
                                Perjalanan Nyaman,
                            </h1>
                            <h1 class="text-4xl sm:text-5xl lg:text-5xl font-black tracking-tight leading-[1.15] text-amber-500">
                                Untuk Mahasiswa Unsri
                            </h1>
                        </div>

                        <p class="text-slate-600 text-sm sm:text-base leading-relaxed max-w-lg">
                            Layanan pemesanan tiket bus DAMRI khusus untuk mahasiswa Universitas Sriwijaya. Pesan tiket mudah, cepat, dan aman.
                        </p>

                        <!-- Feature Badges -->
                        <div class="pt-2 grid grid-cols-1 sm:grid-cols-2 gap-3 max-w-lg">
                            <div class="flex items-center gap-3 p-3 rounded-2xl bg-white/90 backdrop-blur-sm border border-slate-100 shadow-sm">
                                <div class="w-9 h-9 rounded-full bg-damri-navy/10 text-damri-navy flex items-center justify-center shrink-0">
                                    <i class="fa-solid fa-shield-halved text-base"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-xs text-slate-800">Aman & Terpercaya</h4>
                                    <p class="text-[11px] text-slate-500">Layanan resmi DAMRI</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-3 p-3 rounded-2xl bg-white/90 backdrop-blur-sm border border-slate-100 shadow-sm">
                                <div class="w-9 h-9 rounded-full bg-damri-navy/10 text-damri-navy flex items-center justify-center shrink-0">
                                    <i class="fa-solid fa-bolt text-base"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-xs text-slate-800">Mudah & Cepat</h4>
                                    <p class="text-[11px] text-slate-500">Pemesanan tiket online kapan saja</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- FORMULIR PESAN TIKET BUS -->
        <section id="pesan" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-10 relative z-20">
            <div class="bg-white rounded-3xl shadow-xl border border-slate-100 p-6 sm:p-7">
                <h3 class="text-lg font-bold text-damri-navy mb-5">Pesan Tiket Bus</h3>

                <form id="ticketSearchForm" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-9 gap-4 items-end">
                    
                    <!-- Dari (Origin) -->
                    <div class="lg:col-span-2 space-y-1.5">
                        <label class="text-xs font-semibold text-slate-500">Dari</label>
                        <div class="relative">
                            <i class="fa-solid fa-location-dot absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                            <select id="originInput" class="w-full pl-10 pr-8 py-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-medium text-slate-700 focus:outline-none focus:ring-2 focus:ring-amber-500 appearance-none cursor-pointer">
                                <option value="Kampus Indralaya">Pilih lokasi asal</option>
                                <option value="Kampus Indralaya">Kampus Indralaya (Ogan Ilir)</option>
                                <option value="Kampus Bukit">Kampus Bukit Jimbaran (Palembang)</option>
                            </select>
                            <i class="fa-solid fa-chevron-down absolute right-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-[10px] pointer-events-none"></i>
                        </div>
                    </div>

                    <!-- Tujuan (Destination) -->
                    <div class="lg:col-span-2 space-y-1.5">
                        <label class="text-xs font-semibold text-slate-500">Tujuan</label>
                        <div class="relative">
                            <i class="fa-solid fa-location-dot absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                            <select id="destinationInput" class="w-full pl-10 pr-8 py-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-medium text-slate-700 focus:outline-none focus:ring-2 focus:ring-amber-500 appearance-none cursor-pointer">
                                <option value="Kampus Bukit">Pilih tujuan</option>
                                <option value="Kampus Bukit">Kampus Bukit Jimbaran (Palembang)</option>
                                <option value="Kampus Indralaya">Kampus Indralaya (Ogan Ilir)</option>
                            </select>
                            <i class="fa-solid fa-chevron-down absolute right-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-[10px] pointer-events-none"></i>
                        </div>
                    </div>

                    <!-- Tanggal Berangkat -->
                    <div class="lg:col-span-2 space-y-1.5">
                        <label class="text-xs font-semibold text-slate-500">Jam Pemberangkat</label>
                        <div class="relative">
                            <i class="fa-solid fa-calendar-days absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                            <input type="hour" id="dateInput" value="2026-10-25" class="w-full pl-10 pr-3 py-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-medium text-slate-700 focus:outline-none focus:ring-2 focus:ring-amber-500 cursor-pointer">
                        </div>
                    </div>

                    <!-- Jumlah Penumpang -->
                    <div class="lg:col-span-2 space-y-1.5">
                        <label class="text-xs font-semibold text-slate-500">Jumlah Penumpang</label>
                        <div class="relative">
                            <i class="fa-solid fa-user absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                            <select id="passengerInput" class="w-full pl-10 pr-8 py-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-medium text-slate-700 focus:outline-none focus:ring-2 focus:ring-amber-500 appearance-none cursor-pointer">
                                <option value="1">1 Penumpang</option>
                                <option value="2">2 Penumpang</option>
                                <option value="3">3 Penumpang</option>
                            </select>
                            <i class="fa-solid fa-chevron-down absolute right-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-[10px] pointer-events-none"></i>
                        </div>
                    </div>

                    <!-- Cari Tiket Button -->
                    <div class="lg:col-span-1">
                        <button type="submit" class="w-full py-3 bg-amber-500 hover:bg-amber-600 text-white text-xs font-bold rounded-xl shadow transition-colors flex items-center justify-center gap-1.5">
                            <span>Cari Tiket</span>
                        </button>
                    </div>

                </form>
            </div>
        </section>

        <!-- Search Results Section -->
        <section id="resultsSection" class="hidden max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="bg-white rounded-3xl p-6 border border-slate-200 shadow-sm">
                <div class="flex justify-between items-center mb-4">
                    <h4 class="text-base font-bold text-damri-navy" id="searchResultTitle">Jadwal Bus Tersedia</h4>
                    <span class="text-xs text-slate-500">2 Perjalanan Ditemukan</span>
                </div>
                
                <div class="space-y-3">
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 flex flex-col sm:flex-row items-center justify-between gap-4">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-xl bg-damri-navy text-white flex items-center justify-center font-bold">
                                <i class="fa-solid fa-bus"></i>
                            </div>
                            <div>
                                <h5 class="text-sm font-bold text-slate-800">07:00 WIB &rarr; 08:15 WIB</h5>
                                <p class="text-xs text-slate-500">DAMRI Executive • Rebo - Jum'at</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 w-full sm:w-auto justify-between sm:justify-end">
                            <span class="text-amber-600 font-extrabold text-base">Rp 10.000</span>
                            <button class="selectTicketBtn px-4 py-2 bg-damri-navy text-white text-xs font-bold rounded-xl hover:bg-blue-900 transition-colors">
                                Pilih
                            </button>
                        </div>
                    </div>

                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 flex flex-col sm:flex-row items-center justify-between gap-4">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-xl bg-damri-navy text-white flex items-center justify-center font-bold">
                                <i class="fa-solid fa-bus"></i>
                            </div>
                            <div>
                                <h5 class="text-sm font-bold text-slate-800">11:30 WIB &rarr; 12:45 WIB</h5>
                                <p class="text-xs text-slate-500">DAMRI Reguler AC</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 w-full sm:w-auto justify-between sm:justify-end">
                            <span class="text-amber-600 font-extrabold text-base">Rp 10.000</span>
                            <button class="selectTicketBtn px-4 py-2 bg-damri-navy text-white text-xs font-bold rounded-xl hover:bg-blue-900 transition-colors">
                                Pilih
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Grid (4 Columns) -->
        <section id="informasi" class="py-12 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                    
                    <div class="p-5 rounded-2xl bg-slate-50/70 border border-slate-100 flex items-start gap-4">
                        <div class="w-11 h-11 rounded-xl bg-damri-navy/10 text-damri-navy flex items-center justify-center shrink-0 text-lg">
                            <i class="fa-solid fa-ticket"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-sm text-slate-800 mb-1">Pemesanan Online</h4>
                            <p class="text-xs text-slate-500 leading-relaxed">Pesan tiket kapan saja dan di mana saja.</p>
                        </div>
                    </div>

                    <div class="p-5 rounded-2xl bg-slate-50/70 border border-slate-100 flex items-start gap-4">
                        <div class="w-11 h-11 rounded-xl bg-damri-navy/10 text-damri-navy flex items-center justify-center shrink-0 text-lg">
                            <i class="fa-solid fa-clock"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-sm text-slate-800 mb-1">Jadwal Terpercaya</h4>
                            <p class="text-xs text-slate-500 leading-relaxed">Jadwal keberangkatan tepat waktu.</p>
                        </div>
                    </div>

                    <div class="p-5 rounded-2xl bg-slate-50/70 border border-slate-100 flex items-start gap-4">
                        <div class="w-11 h-11 rounded-xl bg-damri-navy/10 text-damri-navy flex items-center justify-center shrink-0 text-lg">
                            <i class="fa-solid fa-wallet"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-sm text-slate-800 mb-1">Pembayaran Aman</h4>
                            <p class="text-xs text-slate-500 leading-relaxed">Transaksi aman dengan berbagai metode pembayaran.</p>
                        </div>
                    </div>

                    <div class="p-5 rounded-2xl bg-slate-50/70 border border-slate-100 flex items-start gap-4">
                        <div class="w-11 h-11 rounded-xl bg-damri-navy/10 text-damri-navy flex items-center justify-center shrink-0 text-lg">
                            <i class="fa-solid fa-headset"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-sm text-slate-800 mb-1">Bantuan 24/7</h4>
                            <p class="text-xs text-slate-500 leading-relaxed">Layanan pelanggan siap membantu Anda.</p>
                        </div>
                    </div>

                </div>

            </div>
        </section>

    </main>

    <!-- Footer -->
    <footer id="kontak" class="bg-damri-footerBg text-slate-300 pt-12 pb-6 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-8 pb-10 border-b border-slate-700/50">
                
                <div class="lg:col-span-5 space-y-3">
                    <div class="flex items-center gap-2">
                        <div class="w-7 h-7 rounded-lg bg-amber-500 flex items-center justify-center text-white text-xs">
                            <i class="fa-solid fa-bus"></i>
                        </div>
                        <span class="text-xl font-black text-white">DAMRI<span class="text-amber-500">UNSRI</span></span>
                    </div>
                    <p class="text-xs text-slate-400 max-w-sm leading-relaxed">
                        Layanan resmi DAMRI untuk mahasiswa Universitas Sriwijaya. Nikmati perjalanan nyaman dengan harga terjangkau.
                    </p>
                </div>

                <div class="lg:col-span-2 space-y-2">
                    <h5 class="text-white font-bold text-xs tracking-wider uppercase">Tautan Cepat</h5>
                    <ul class="space-y-1.5 text-xs text-slate-400">
                        <li><a href="#beranda" class="hover:text-amber-400 transition-colors">Beranda</a></li>
                        <li><a href="#pesan" class="hover:text-amber-400 transition-colors">Pesan Tiket</a></li>
                        <li><a href="#jadwal" class="hover:text-amber-400 transition-colors">Jadwal</a></li>
                        <li><a href="#rute" class="hover:text-amber-400 transition-colors">Rute</a></li>
                    </ul>
                </div>

                <div class="lg:col-span-2 space-y-2">
                    <h5 class="text-white font-bold text-xs tracking-wider uppercase">Informasi</h5>
                    <ul class="space-y-1.5 text-xs text-slate-400">
                        <li><a href="#" class="hover:text-amber-400 transition-colors">Cara Pesan</a></li>
                        <li><a href="#" class="hover:text-amber-400 transition-colors">Syarat & Ketentuan</a></li>
                        <li><a href="#" class="hover:text-amber-400 transition-colors">Kebijakan Privasi</a></li>
                        <li><a href="#" class="hover:text-amber-400 transition-colors">FAQ</a></li>
                    </ul>
                </div>

                <div class="lg:col-span-3 space-y-2">
                    <h5 class="text-white font-bold text-xs tracking-wider uppercase">Kontak Kami</h5>
                    <ul class="space-y-2 text-xs text-slate-400">
                        <li class="flex items-center gap-2.5">
                            <i class="fa-solid fa-phone text-amber-500 text-xs"></i>
                            <span>0711-1234567</span>
                        </li>
                        <li class="flex items-center gap-2.5">
                            <i class="fa-solid fa-envelope text-amber-500 text-xs"></i>
                            <span>info@damriunsri.ac.id</span>
                        </li>
                        <li class="flex items-center gap-2.5">
                            <i class="fa-solid fa-location-dot text-amber-500 text-xs"></i>
                            <span>Palembang, Sumatera Selatan</span>
                        </li>
                    </ul>
                </div>

            </div>

            <div class="pt-6 text-center text-[11px] text-slate-400">
                <p>&copy; 2026 DAMRI UNSRI. Semua Hak Dilindungi.</p>
            </div>

        </div>
    </footer>

    <!-- Modals & Toasts -->
    <div id="loginModal" class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-sm hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl p-6 max-w-sm w-full shadow-2xl relative">
            <button id="closeLoginBtn" class="absolute top-4 right-4 text-slate-400 hover:text-slate-600">
                <i class="fa-solid fa-xmark text-lg"></i>
            </button>
            <h3 class="text-lg font-bold text-slate-800 text-center mb-4">Masuk ke Akun</h3>
            <form id="loginForm" class="space-y-3 text-xs">
                <div>
                    <label class="font-semibold text-slate-600 block mb-1">Email / NIM</label>
                    <input type="text" required placeholder="NIM@student.unsri.ac.id" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500">
                </div>
                <div>
                    <label class="font-semibold text-slate-600 block mb-1">Kata Sandi</label>
                    <input type="password" required placeholder="••••••••" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500">
                </div>
                <button type="submit" class="w-full py-2.5 bg-amber-500 hover:bg-amber-600 text-white font-bold rounded-xl shadow mt-2">Masuk</button>
            </form>
        </div>
    </div>

    <div id="registerModal" class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-sm hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl p-6 max-w-sm w-full shadow-2xl relative">
            <button id="closeRegisterBtn" class="absolute top-4 right-4 text-slate-400 hover:text-slate-600">
                <i class="fa-solid fa-xmark text-lg"></i>
            </button>
            <h3 class="text-lg font-bold text-slate-800 text-center mb-4">Daftar Akun Baru</h3>
            <form id="registerForm" class="space-y-3 text-xs">
                <div>
                    <label class="font-semibold text-slate-600 block mb-1">Nama Lengkap</label>
                    <input type="text" required placeholder="Nama Mahasiswa" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500">
                </div>
                <div>
                    <label class="font-semibold text-slate-600 block mb-1">NIM Mahasiswa</label>
                    <input type="text" required placeholder="09021282..." class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500">
                </div>
                <div>
                    <label class="font-semibold text-slate-600 block mb-1">Kata Sandi</label>
                    <input type="password" required placeholder="••••••••" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500">
                </div>
                <button type="submit" class="w-full py-2.5 bg-amber-500 hover:bg-amber-600 text-white font-bold rounded-xl shadow mt-2">Daftar</button>
            </form>
        </div>
    </div>

    <div id="toast" class="fixed bottom-5 right-5 z-50 bg-slate-900 text-white px-4 py-2.5 rounded-xl shadow-xl flex items-center gap-2.5 transform translate-y-16 opacity-0 transition-all duration-300 pointer-events-none text-xs">
        <i class="fa-solid fa-circle-check text-emerald-400"></i>
        <span id="toastMsg">Notifikasi</span>
    </div>

    <!-- Scripts dengan Event Listener -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            function toggleModal(modalId) {
                const modal = document.getElementById(modalId);
                if (modal) modal.classList.toggle('hidden');
            }

            function showToast(msg) {
                const toast = document.getElementById('toast');
                const toastMsg = document.getElementById('toastMsg');
                if (toast && toastMsg) {
                    toastMsg.innerText = msg;
                    toast.classList.remove('translate-y-16', 'opacity-0');
                    setTimeout(() => {
                        toast.classList.add('translate-y-16', 'opacity-0');
                    }, 3000);
                }
            }

            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            const mobileMenu = document.getElementById('mobileMenu');
            if (mobileMenuBtn && mobileMenu) {
                mobileMenuBtn.addEventListener('click', () => mobileMenu.classList.toggle('hidden'));
            }

            const openLoginBtn = document.getElementById('openLoginBtn');
            const openLoginMobileBtn = document.getElementById('openLoginMobileBtn');
            const closeLoginBtn = document.getElementById('closeLoginBtn');
            const loginForm = document.getElementById('loginForm');

            if (openLoginBtn) openLoginBtn.addEventListener('click', () => toggleModal('loginModal'));
            if (openLoginMobileBtn) openLoginMobileBtn.addEventListener('click', () => toggleModal('loginModal'));
            if (closeLoginBtn) closeLoginBtn.addEventListener('click', () => toggleModal('loginModal'));
            if (loginForm) {
                loginForm.addEventListener('submit', (e) => {
                    e.preventDefault();
                    toggleModal('loginModal');
                    showToast('Masuk Berhasil!');
                });
            }

            const openRegisterBtn = document.getElementById('openRegisterBtn');
            const openRegisterMobileBtn = document.getElementById('openRegisterMobileBtn');
            const closeRegisterBtn = document.getElementById('closeRegisterBtn');
            const registerForm = document.getElementById('registerForm');

            if (openRegisterBtn) openRegisterBtn.addEventListener('click', () => toggleModal('registerModal'));
            if (openRegisterMobileBtn) openRegisterMobileBtn.addEventListener('click', () => toggleModal('registerModal'));
            if (closeRegisterBtn) closeRegisterBtn.addEventListener('click', () => toggleModal('registerModal'));
            if (registerForm) {
                registerForm.addEventListener('submit', (e) => {
                    e.preventDefault();
                    toggleModal('registerModal');
                    showToast('Pendaftaran Berhasil!');
                });
            }

            const ticketSearchForm = document.getElementById('ticketSearchForm');
            if (ticketSearchForm) {
                ticketSearchForm.addEventListener('submit', (e) => {
                    e.preventDefault();
                    const origin = document.getElementById('originInput').value;
                    const dest = document.getElementById('destinationInput').value;
                    const resultsSection = document.getElementById('resultsSection');
                    const searchResultTitle = document.getElementById('searchResultTitle');
                    
                    if (searchResultTitle) {
                        searchResultTitle.innerText = `Jadwal Bus: ${origin} → ${dest}`;
                    }
                    if (resultsSection) {
                        resultsSection.classList.remove('hidden');
                        resultsSection.scrollIntoView({ behavior: 'smooth' });
                    }
                    showToast('Menampilkan tiket tersedia');
                });
            }

            const selectTicketBtns = document.querySelectorAll('.selectTicketBtn');
            selectTicketBtns.forEach((btn) => {
                btn.addEventListener('click', () => {
                    showToast('Tiket dipilih! Silakan selesaikan pembayaran.');
                });
            });
        });
    </script>
</body>
</html>