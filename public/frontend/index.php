<!DOCTYPE html>
<html lang="id">
<head>
   <?php include 'head.php';?>
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
                            navy: '#1E3A8A',      
                            blue: '#024CAA',      
                            amber: '#F59E0B',     
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
   <?php include 'navbar.php';?>
    <main id="beranda" class="flex-grow">
        <section class="relative bg-white pt-6 pb-20 overflow-hidden min-h-[480px] lg:min-h-[520px] flex items-center">
            <div class="absolute inset-0 z-0 flex justify-end pointer-events-none">
                <div class="relative w-full lg:w-3/4 h-full">
                  
                    <img src="../images/lnding-page.jpeg" 
                         alt="Bus DAMRI Universitas Sriwijaya" 
                         class="w-full h-full object-cover object-right"
                         />
              
                    <div class="absolute inset-0 bg-gradient-to-r from-white via-white/95 via-40% to-transparent"></div>
                    
                  
                    <div class="absolute inset-x-0 bottom-0 h-32 bg-gradient-to-t from-white to-transparent"></div>
                </div>
            </div>

       
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


        <section id="pesan" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-10 relative z-20">
            <div class="bg-white rounded-3xl shadow-xl border border-slate-100 p-6 sm:p-7">
                <h3 class="text-lg font-bold text-damri-navy mb-5">Pesan Tiket Bus</h3>

                <form id="ticketSearchForm" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-9 gap-4 items-end">
                    
                   
                    <div class="lg:col-span-2 space-y-1.5">
                        <label class="text-xs font-semibold text-slate-500">Dari</label>
                        <div class="relative">
                            <i class="fa-solid fa-location-dot absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                            <select id="originInput" class="w-full pl-10 pr-8 py-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-medium text-slate-700 focus:outline-none focus:ring-2 focus:ring-amber-500 appearance-none cursor-pointer">
                                <option value="Kampus Indralaya">Pilih lokasi asal</option>
                                <option value="Kampus Indralaya">Kampus Indralaya</option>
                                <option value="Kampus Bukit">Kampus Bukit</option>
                            </select>
                            <i class="fa-solid fa-chevron-down absolute right-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-[10px] pointer-events-none"></i>
                        </div>
                    </div>

           
                    <div class="lg:col-span-2 space-y-1.5">
                        <label class="text-xs font-semibold text-slate-500">Tujuan</label>
                        <div class="relative">
                            <i class="fa-solid fa-location-dot absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                            <select id="destinationInput" class="w-full pl-10 pr-8 py-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-medium text-slate-700 focus:outline-none focus:ring-2 focus:ring-amber-500 appearance-none cursor-pointer">
                                <option value="Kampus Bukit">Pilih tujuan</option>
                                <option value="Kampus Bukit">Kampus Bukit</option>
                                <option value="Kampus Indralaya">Kampus Indralaya</option>
                            </select>
                            <i class="fa-solid fa-chevron-down absolute right-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-[10px] pointer-events-none"></i>
                        </div>
                    </div>

                 
                    <div class="lg:col-span-2 space-y-1.5">
                        <label class="text-xs font-semibold text-slate-500">Jam Pemberangkat</label>
                        <div class="relative">
                            <i class="fa-solid fa-calendar-days absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                            <input type="hour" id="dateInput" value="2026-10-25" class="w-full pl-10 pr-3 py-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-medium text-slate-700 focus:outline-none focus:ring-2 focus:ring-amber-500 cursor-pointer">
                        </div>
                    </div>

           
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

           
                    <div class="lg:col-span-1">
                        <button type="submit" class="w-full py-3 bg-amber-500 hover:bg-amber-600 text-white text-xs font-bold rounded-xl shadow transition-colors flex items-center justify-center gap-1.5">
                            <span>Cari Tiket</span>
                        </button>
                    </div>

                </form>
            </div>
        </section>

        <!-- DIPERBAIKI: Padding atas-bawah diperluas (py-20) dan gap antar kartu ditingkatkan (gap-6) agar tidak mepet -->
        <section id="informasi" class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    
                    <div class="p-6 rounded-2xl bg-slate-50/70 border border-slate-100 flex items-start gap-4 shadow-sm">
                        <div class="w-12 h-12 rounded-xl bg-damri-navy/10 text-damri-navy flex items-center justify-center shrink-0 text-lg">
                            <i class="fa-solid fa-ticket"></i>
                        </div>
                        <div class="space-y-1">
                            <h4 class="font-bold text-sm text-slate-800">Pemesanan Online</h4>
                            <p class="text-xs text-slate-500 leading-relaxed">Pesan tiket kapan saja dan di mana saja.</p>
                        </div>
                    </div>

                    <div class="p-6 rounded-2xl bg-slate-50/70 border border-slate-100 flex items-start gap-4 shadow-sm">
                        <div class="w-12 h-12 rounded-xl bg-damri-navy/10 text-damri-navy flex items-center justify-center shrink-0 text-lg">
                            <i class="fa-solid fa-clock"></i>
                        </div>
                        <div class="space-y-1">
                            <h4 class="font-bold text-sm text-slate-800">Jadwal Terpercaya</h4>
                            <p class="text-xs text-slate-500 leading-relaxed">Jadwal keberangkatan tepat waktu.</p>
                        </div>
                    </div>

                    <div class="p-6 rounded-2xl bg-slate-50/70 border border-slate-100 flex items-start gap-4 shadow-sm">
                        <div class="w-12 h-12 rounded-xl bg-damri-navy/10 text-damri-navy flex items-center justify-center shrink-0 text-lg">
                            <i class="fa-solid fa-wallet"></i>
                        </div>
                        <div class="space-y-1">
                            <h4 class="font-bold text-sm text-slate-800">Pembayaran Aman</h4>
                            <p class="text-xs text-slate-500 leading-relaxed">Transaksi aman dengan berbagai metode pembayaran.</p>
                        </div>
                    </div>

                    <div class="p-6 rounded-2xl bg-slate-50/70 border border-slate-100 flex items-start gap-4 shadow-sm">
                        <div class="w-12 h-12 rounded-xl bg-damri-navy/10 text-damri-navy flex items-center justify-center shrink-0 text-lg">
                            <i class="fa-solid fa-headset"></i>
                        </div>
                        <div class="space-y-1">
                            <h4 class="font-bold text-sm text-slate-800">Bantuan 24/7</h4>
                            <p class="text-xs text-slate-500 leading-relaxed">Layanan pelanggan siap membantu Anda.</p>
                        </div>
                    </div>

                </div>

            </div>
        </section>

    </main>

    <section id="rute" class="py-16 bg-slate-50/70 border-y border-slate-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row md:items-center justify-center mb-8 gap-4">
                    <div class = "flex flex-col justify-center items-center">
                        <h2 class="text-2xl font-bold text-damri-navy">Rute Damri Unsri</h2>
                        <p class="text-xs text-slate-500 mt-1">Menghubungkan antara Kampus Bukit dan Kampus Indralaya</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              
                    <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm flex flex-col justify-between space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="px-3 py-1 bg-blue-50 text-damri-navy font-bold text-[11px] rounded-full">Rute tol Palindra</span>
                            <span class="text-amber-500 font-extrabold text-sm">Rp 10.000</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div>
                                <h4 class="font-bold text-sm text-slate-800">Kampus Bukit Palembang</h4>
                                <p class="text-xs text-slate-400">Penjemputan Kumpul Halte Bukit</p>
                            </div>
                            <div class="flex-grow flex items-center justify-center px-2">
                                <div class="h-0.5 bg-slate-200 w-full relative">
                                    <i class="fa-solid fa-bus text-damri-navy text-xs absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 bg-white px-1"></i>
                                </div>
                            </div>
                            <div class="text-right">
                                <h4 class="font-bold text-sm text-slate-800">Kampus Indralaya</h4>
                                <p class="text-xs text-slate-400">Terminal Bus UNSRI</p>
                            </div>
                        </div>
                        <div class="pt-3 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                            <a href="#pesan" class="font-bold text-damri-navy relative hover:underline">Pesan <i class="fa-solid fa-chevron-right text-[10px]"></i></a>
                        </div>
                    </div>

              
                    <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm flex flex-col justify-between space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="px-3 py-1 bg-amber-50 text-amber-600 font-bold text-[11px] rounded-full">Rute tol Palindra</span>
                            <span class="text-amber-500 font-extrabold text-sm">Rp 10.000</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div>
                                <h4 class="font-bold text-sm text-slate-800">Kampus Indralaya</h4>
                                <p class="text-xs text-slate-400">Terminal Bus UNSRI</p>
                            </div>
                            <div class="flex-grow flex items-center justify-center px-2">
                                <div class="h-0.5 bg-slate-200 w-full relative">
                                    <i class="fa-solid fa-bus text-amber-500 text-xs absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 bg-white px-1"></i>
                                </div>
                            </div>
                            <div class="text-right">
                                <h4 class="font-bold text-sm text-slate-800">Kampus Bukit Palembang</h4>
                                <p class="text-xs text-slate-400">Halte Bukit</p>
                            </div>
                        </div>
                        <div class="pt-3 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                            <a href="#pesan" class="font-bold text-damri-navy hover:underline">Pesan <i class="fa-solid fa-chevron-right text-[10px]"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="interior" class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-2xl mx-auto mb-12 space-y-2">
                    <span class="px-3 py-1 bg-amber-100 text-amber-700 font-bold text-xs rounded-full inline-block">Fasilitas Bus</span>
                    <h2 class="text-2xl sm:text-3xl font-bold text-damri-navy">Kenyamanan Interior Bus DAMRI</h2>
                    <p class="text-xs text-slate-500">Rasakan pengalaman perjalanan kampus yang bersih, aman, dan nyaman dengan berbagai fasilitas penunjang.</p>
                </div>

            
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    
                    
                    <div class="group relative bg-slate-50 rounded-2xl overflow-hidden border border-slate-100 shadow-sm hover:shadow-md transition-all">
                        <div class="h-52 overflow-hidden relative">
                            <img src="../images/interior_damri.jpg" alt="Kursi & Suasana Cabin DAMRI" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300 cursor-pointer"/>
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-4">
                                <span class="text-xs text-white font-medium flex items-center gap-1.5"><i class="fa-solid fa-expand"></i> Perbesar Gambar</span>
                            </div>
                        </div>
                        <div class="p-5 space-y-1">
                            <h4 class="font-bold text-xs text-slate-800 flex items-center gap-2">
                                <i class="fa-solid fa-chair text-amber-500"></i> Kursi Ergonomis & AC SEJUK
                            </h4>
                            <p class="text-[11px] text-slate-500 leading-relaxed">
                                Tempat duduk empuk dengan leg-room luas untuk istirahat nyaman selama perjalanan.
                            </p>
                        </div>
                    </div>

                  
                    <div class="group relative bg-slate-50 rounded-2xl overflow-hidden border border-slate-100 shadow-sm hover:shadow-md transition-all">
                        <div class="h-52 overflow-hidden relative">
                           
                            <img src="../images/interior2.jpg" 
                                 alt="Kapasitas & Kebersihan Bus" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300 cursor-pointer">
                                 
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-4">
                                <span class="text-xs text-white font-medium flex items-center gap-1.5"><i class="fa-solid fa-expand"></i> Perbesar Gambar</span>
                            </div>
                        </div>
                        <div class="p-5 space-y-1">
                            <h4 class="font-bold text-xs text-slate-800 flex items-center gap-2">
                                <i class="fa-solid fa-broom text-amber-500"></i> Kabin Bersih & Steril
                            </h4>
                            <p class="text-[11px] text-slate-500 leading-relaxed">
                                Armada rutin dibersihkan sebelum jadwal keberangkatan demi kesehatan civitas akademika.
                            </p>
                        </div>
                    </div>

                
                    <div class="group relative bg-slate-50 rounded-2xl overflow-hidden border border-slate-100 shadow-sm hover:shadow-md transition-all sm:col-span-2 lg:col-span-1">
                        <div class="h-52 overflow-hidden relative">
                       
                            <img src="../images/interior3.jpg" 
                                 alt="Fasilitas Keselamatan Interior Bus" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300 cursor-pointer">
                                 
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-4">
                                <span class="text-xs text-white font-medium flex items-center gap-1.5"><i class="fa-solid fa-expand"></i> Perbesar Gambar</span>
                            </div>
                        </div>
                        <div class="p-5 space-y-1">
                            <h4 class="font-bold text-xs text-slate-800 flex items-center gap-2">
                                <i class="fa-solid fa-shield-cat text-amber-500"></i> Standar Keamanan Tinggi
                            </h4>
                            <p class="text-[11px] text-slate-500 leading-relaxed">
                                Dilengkapi palu pemecah kaca darurat, APAR, dan sabuk pengaman di setiap kursi.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- Section Tentang Layanan -->
        <section id="tentang" class="py-20 bg-slate-50/60 border-t border-slate-100 overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
                    
                    
                    <div class="lg:col-span-6">
                        <div class="relative max-w-lg mx-auto lg:max-w-none">
                            <div class="absolute -inset-2 bg-gradient-to-r from-damri-navy to-amber-500 rounded-3xl opacity-20 blur-xl"></div>
                            <img src="../images/damri.jpg" 
                                 alt="Armada Bus DAMRI Universitas Sriwijaya" 
                            />
                        </div>
                    </div>

            
                    <div class="lg:col-span-6 space-y-4">
                        <span class="px-3 py-1 bg-amber-100 text-amber-700 font-bold text-xs rounded-full inline-block">Tentang Layanan</span>
                        <h2 class="text-2xl sm:text-3xl font-bold text-damri-navy leading-tight">
                            Solusi Transportasi Resmi & Terintegrasi Mahasiswa UNSRI
                        </h2>
                        
                        <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                            DAMRI UNSRI merupakan angkutan transportasi umum utama yang menghubungkan Kampus Palembang dan Kampus Indralaya secara terintergrasi. Layanan ini memfasilitasi mahasiswa, dosen, dan staf universitas agar dapat beraktivitas dengan aman, hemat, dan tepat waktu.
                        </p>

                        <div class="pt-3 space-y-3">
                            <div class="flex items-start gap-3">
                                <div class="w-6 h-6 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center shrink-0 text-xs font-bold mt-0.5">✓</div>
                                <p class="text-xs text-slate-700 font-medium">Armada bus ber-AC dan terawat secara berkala untuk kenyamanan selama perjalanan.</p>
                            </div>
                            <div class="flex items-start gap-3">
                                <div class="w-6 h-6 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center shrink-0 text-xs font-bold mt-0.5">✓</div>
                                <p class="text-xs text-slate-700 font-medium">Pilihan titik pemberhentian strategis di lingkungan internal maupun luar kampus.</p>
                            </div>
                            <div class="flex items-start gap-3">
                                <div class="w-6 h-6 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center shrink-0 text-xs font-bold mt-0.5">✓</div>
                                <p class="text-xs text-slate-700 font-medium">Tarif subsidi khusus mahasiswa Universitas Sriwijaya.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>


    <footer id="kontak" class="bg-damri-navy pt-12 pb-6 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-8 pb-10 border-b border-slate-700/50">
                
                <div class="lg:col-span-5 space-y-3">
                    <div class="flex items-center gap-2">
                        <img src = "../images/logo_damri.png" class="w-[130px] h-[45px] object-contain shrink-0" />
                        <span class="text-3xl font-black tracking-tight font-[700] text-amber-500">UNSRI</span>     
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
                <p>&copy; 2026 DAMRI UNSRI. Kelompok 6 L3 2026.</p>
            </div>

        </div>
    </footer>

    <div id="toast" class="fixed bottom-5 right-5 z-50 bg-slate-900 text-white px-4 py-2.5 rounded-xl shadow-xl flex items-center gap-2.5 transform translate-y-16 opacity-0 transition-all duration-300 pointer-events-none text-xs">
        <i class="fa-solid fa-circle-check text-emerald-400"></i>
        <span id="toastMsg">Notifikasi</span>
    </div>
</body>
</html>