<?php $pageTitle = 'Real-Time Map - DAMRI UNSRI'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <?php include 'head.php'; ?>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
    <!-- FontAwesome untuk ikon interaktif -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-100 min-h-screen flex flex-col justify-between text-slate-800">

    <!-- Navbar Minimalis / Header Section -->
    <header class="w-full bg-white border-b border-slate-200 shadow-sm py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <img src="../images/logo_damri.png" class="w-[110px] h-[38px] object-contain" alt="Logo DAMRI" onerror="this.onerror=null; this.src='https://via.placeholder.com/110x38?text=DAMRI';">
                <div class="h-6 w-[1px] bg-slate-300"></div>
                <span class="text-2xl font-black text-amber-500 tracking-tight">UNSRI</span>
            </div>
            <a href="index.php" class="text-xs font-bold text-slate-600 hover:text-damri-navy transition-colors flex items-center gap-1.5">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Beranda
            </a>
        </div>
    </header>

    <!-- Main Content Section -->
    <main class="flex-grow max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-6">
        
        <!-- Header Judul -->
        <div class="text-center space-y-1">
            <span class="px-3 py-1 bg-amber-500/10 text-amber-600 text-xs font-bold rounded-full">Tracking Live GPS</span>
            <h1 class="text-2xl sm:text-3xl font-black text-[#1E3A8A]">Peta Real-Time Perjalanan Bus</h1>
            <p class="text-xs sm:text-sm text-slate-500">Pantau posisi Anda dan pilih rute perjalanan bus DAMRI Universitas Sriwijaya.</p>
        </div>

        <!-- Card Container Utama Peta -->
        <div class="bg-white rounded-3xl shadow-xl border border-slate-200 p-4 sm:p-6 space-y-4">
            
            <!-- Box Peta -->
            <div class="map w-full h-[450px] sm:h-[500px] rounded-2xl overflow-hidden relative border border-slate-200 shadow-inner z-0">
                <!-- Tombol Kembali ke Lokasi Saya -->
                <button class="back_to_location absolute z-[1000] bg-white/90 backdrop-blur-md border border-slate-300 text-slate-700 font-bold text-xs rounded-xl shadow-lg px-4 py-2.5 right-4 top-4 transition-all duration-300 hover:bg-[#1E3A8A] hover:text-white hover:scale-105 flex items-center gap-2">
                    <i class="fa-solid fa-location-crosshairs text-amber-500"></i> Lokasi Saya
                </button>
            </div>

            <!-- Box Koordinat GPS -->
            <div class="Koordinat w-full bg-slate-50 border border-slate-200 rounded-xl py-3 px-4 text-center">
                <p class="text-xs text-slate-400 font-medium">Mendeteksi koordinat GPS perangkat Anda...</p>
            </div>

            <!-- Kotak Pilih Rute Interaktif -->
            <div class="max-w-xl mx-auto pt-2 space-y-3">
                <h2 class="text-xs font-bold text-center text-slate-500 uppercase tracking-wider">Pilih Rute Tujuan Anda</h2>
                
                <div class="Perjalanan flex justify-center items-center relative border border-slate-200 bg-slate-100 rounded-2xl p-1.5 w-full shadow-inner">
                    <!-- Slider Latar Belakang Animasi -->
                    <div class="wrapperSlider w-1/2 bg-[#1E3A8A] h-[calc(100%-12px)] absolute rounded-xl left-1.5 transition-all duration-300 shadow-md"></div>
                    
                    <!-- Pilihan 1 -->
                    <div class="card w-1/2 text-xs z-100 font-bold text-center py-3 relative cursor-pointer z-10 text-slate-700 hover:text-[#1E3A8A] transition-colors select-none">
                        Indralaya → Bukit
                    </div>
                    
                    <!-- Pilihan 2 -->
                    <div class="card w-1/2 text-xs z-100 font-bold text-center py-3 relative cursor-pointer z-10 text-slate-700 hover:text-[#1E3A8A] transition-colors select-none">
                        Bukit → Indralaya
                    </div>
                </div>
            </div>

        </div>

    </main>

    <!-- Footer -->
    <footer class="bg-[#1D2A44] text-slate-300 pt-8 pb-6 border-t border-slate-800 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-2">
            <p class="text-xs text-slate-400">&copy; 2026 DAMRI UNSRI. Sistem Navigasi Real-Time.</p>
        </div>
    </footer>

    <!-- Leaflet & Routing JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
    <script src="js/map.js"></script>
</body>
</html>