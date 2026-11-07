<?php
// public/frontend/cariTiket.php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencarian Tiket - DAMRI UNSRI</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-[#F0F4F8] min-h-screen text-slate-700 pb-12">

    <!-- BAGIAN ATAS: Header Biru -->
    <div class="bg-[#1E3A8A] text-white pt-8 pb-16 px-4">
        <div class="max-w-5xl mx-auto flex flex-col gap-4">
            <a href="index.php" class="flex items-center gap-2 text-sm text-blue-200 hover:text-white transition-colors w-max">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke beranda
            </a>
            
            <!-- Flex Container untuk Judul (Kiri) dan Logo (Kanan) -->
            <div class="flex justify-between items-center gap-4">
                <!-- Kiri: Judul -->
                <div>
                    <h1 class="text-3xl font-bold mb-1">Cari tiket bus kampus</h1>
                    <p class="text-sm text-blue-200">DAMRI Unsri antara Bukit dan Indralaya.</p>
                </div>
                
                <!-- Kanan: Logo DAMRI UNSRI (Selalu Muncul) -->
                <div class="bg-white px-3 py-2 rounded-xl shadow-sm shrink-0">
                    <img src=""../images/logo_damri.png" alt="Logo DAMRI UNSRI" class="h-8 object-contain">
                </div>
            </div>
            
        </div>
    </div>

    <!-- BAGIAN TENGAH: Form Pencarian & List Tiket -->
    <div class="max-w-5xl mx-auto px-4 -mt-8">
        
        <!-- 1. Form Pencarian Horizontal -->
        <div class="bg-white rounded-2xl shadow-md p-4 mb-6">
            <form id="searchForm" action="cariTiket.php" method="GET" class="flex flex-col md:flex-row items-center gap-4">
                <div class="flex-1 flex flex-col w-full">
                    <label class="text-[10px] font-bold text-slate-400 uppercase mb-1 ml-1">Dari</label>
                    <div class="flex items-center gap-2 bg-slate-50 border border-slate-200 rounded-xl px-4 py-3">
                        <i class="fa-solid fa-location-dot text-amber-500"></i>
                        <select name="asal" class="bg-transparent w-full text-sm font-semibold text-slate-700 outline-none cursor-pointer">
                            <option value="Bukit">Halte Unsri Bukit</option>
                            <option value="Indralaya">Terminal Unsri Indralaya</option>
                        </select>
                    </div>
                </div>

                <div class="mt-4 md:mt-0 flex items-center justify-center w-10 h-10 rounded-full bg-slate-100 hover:bg-slate-200 cursor-pointer text-slate-500 transition-colors">
                    <i class="fa-solid fa-right-left md:rotate-0 rotate-90"></i>
                </div>

                <div class="flex-1 flex flex-col w-full">
                    <label class="text-[10px] font-bold text-slate-400 uppercase mb-1 ml-1">Ke</label>
                    <div class="flex items-center gap-2 bg-slate-50 border border-slate-200 rounded-xl px-4 py-3">
                        <i class="fa-solid fa-flag text-blue-500"></i>
                        <select name="tujuan" class="bg-transparent w-full text-sm font-semibold text-slate-700 outline-none cursor-pointer">
                            <option value="Indralaya">Terminal Unsri Indralaya</option>
                            <option value="Bukit">Halte Unsri Bukit</option>
                        </select>
                    </div>
                </div>

                <div class="flex-1 flex flex-col w-full">
                    <label class="text-[10px] font-bold text-slate-400 uppercase mb-1 ml-1">Jam Berangkat</label>
                    <div class="flex items-center gap-2 bg-slate-50 border border-slate-200 rounded-xl px-4 py-3">
                        <i class="fa-regular fa-clock text-emerald-500"></i>
                        <input type="time" name="jam" value="07:00" class="bg-transparent w-full text-sm font-semibold text-slate-700 outline-none cursor-pointer">
                    </div>
                </div>

                <div class="flex flex-col w-full md:w-auto mt-4 md:mt-0 self-end">
                    <button type="submit" class="bg-amber-500 hover:bg-amber-600 text-white font-bold px-8 py-3.5 rounded-xl transition-colors shadow-sm w-full">
                        Cari
                    </button>
                </div>
            </form>
        </div>

        <!-- 2. Header Hasil Pencarian & FILTER -->
        <div class="flex items-center justify-between mb-4 px-2">
            <div>
                <h2 class="text-lg font-bold text-slate-800">10 jadwal bus</h2>
                <p class="text-xs text-slate-400">Halte Unsri Bukit ke Terminal Unsri Indralaya</p>
            </div>
            
            <div class="flex bg-slate-200 rounded-lg p-1 text-xs font-semibold gap-1">
                <button onclick="filterBus('semua', this)" class="filter-btn bg-[#1E3A8A] text-white px-4 py-1.5 rounded-md shadow transition-all">Semua (10)</button>
                <button onclick="filterBus('tersedia', this)" class="filter-btn text-slate-500 hover:text-slate-700 px-4 py-1.5 rounded-md transition-all">Tersedia (9)</button>
                <button onclick="filterBus('penuh', this)" class="filter-btn text-slate-500 hover:text-slate-700 px-4 py-1.5 rounded-md transition-all">Penuh (1)</button>
            </div>
        </div>

        <!-- 3. List Kartu Bus -->
        <div class="flex flex-col gap-4" id="busList">

            <?php
            // Dummy Data 10 Bus
            $buses = [
                ["jam" => "06:00", "tiba" => "06:45", "sisa" => 0, "status" => "Dalam perjalanan"],
                ["jam" => "07:00", "tiba" => "07:45", "sisa" => 8, "status" => "Menunggu"],
                ["jam" => "08:00", "tiba" => "08:45", "sisa" => 15, "status" => "Menunggu"],
                ["jam" => "09:00", "tiba" => "09:45", "sisa" => 28, "status" => "Menunggu"],
                ["jam" => "10:00", "tiba" => "10:45", "sisa" => 40, "status" => "Menunggu"],
                ["jam" => "11:00", "tiba" => "11:45", "sisa" => 40, "status" => "Menunggu"],
                ["jam" => "13:00", "tiba" => "13:45", "sisa" => 32, "status" => "Menunggu"],
                ["jam" => "14:00", "tiba" => "14:45", "sisa" => 10, "status" => "Menunggu"],
                ["jam" => "15:00", "tiba" => "15:45", "sisa" => 40, "status" => "Menunggu"],
                ["jam" => "16:30", "tiba" => "17:15", "sisa" => 40, "status" => "Menunggu"],
            ];

            foreach ($buses as $bus) {
                $isPenuh = ($bus['sisa'] == 0);
                $statusFilter = $isPenuh ? "penuh" : "tersedia";
                $kursiTeks = $isPenuh ? "Penuh" : "Sisa " . $bus['sisa'] . " kursi";
                $kursiWarna = $isPenuh ? "text-red-500" : "text-amber-500";
            ?>
            
            <div class="bus-card flex flex-col md:flex-row justify-between items-center bg-white p-5 rounded-2xl shadow-sm border border-slate-100 hover:shadow-md transition-all gap-4" data-status="<?= $statusFilter ?>">
                
                <div class="flex items-center gap-6 w-full md:w-auto">
                    <div class="text-center">
                        <span class="block text-xl font-bold text-slate-800"><?= $bus['jam'] ?></span>
                        <span class="text-[10px] font-medium text-slate-400 uppercase">Bukit</span>
                    </div>
                    
                    <div class="flex flex-col items-center flex-1 md:w-32">
                        <span class="text-[10px] text-slate-400 mb-1">45 menit</span>
                        <div class="flex items-center w-full gap-1 text-slate-300">
                            <i class="fa-solid fa-circle text-[8px]"></i>
                            <div class="h-px bg-slate-300 flex-1 border-dashed border-t border-slate-300"></div>
                            <i class="fa-solid fa-circle text-[8px]"></i>
                        </div>
                        <span class="text-[10px] text-slate-400 mt-1">Via Tol Palindra</span>
                    </div>
                    
                    <div class="text-center">
                        <span class="block text-xl font-bold text-slate-800"><?= $bus['tiba'] ?></span>
                        <span class="text-[10px] font-medium text-slate-400 uppercase">Indralaya</span>
                    </div>
                </div>

                <div class="flex flex-row md:flex-col justify-between items-center md:items-start w-full md:w-1/4 border-t md:border-t-0 border-slate-100 pt-3 md:pt-0">
                    <div>
                        <h4 class="font-bold text-slate-800 text-sm">DAMRI Executive</h4>
                        <p class="text-xs text-emerald-500 font-medium"><i class="fa-solid fa-circle text-[8px] mr-1"></i> <?= $bus['status'] ?></p>
                    </div>
                    <span class="text-xs font-bold <?= $kursiWarna ?>"><?= $kursiTeks ?></span>
                </div>

                <div class="flex flex-row md:flex-col justify-between md:justify-center items-center md:items-end w-full md:w-auto">
                    <div class="text-left md:text-right mb-0 md:mb-2">
                        <span class="block text-[10px] text-slate-400">Tarif mahasiswa</span>
                        <span class="text-lg font-bold text-slate-800">Rp 15.000</span>
                    </div>
                    
                    <?php if($isPenuh): ?>
                        <button disabled class="bg-slate-100 text-slate-400 font-semibold px-6 py-2 rounded-xl text-sm cursor-not-allowed">Habis</button>
                    <?php else: ?>
                        <button onclick="openSeatModal('<?= $bus['jam'] ?>')" class="bg-[#1E3A8A] hover:bg-blue-900 text-white font-semibold px-6 py-2 rounded-xl text-sm transition-colors shadow">Pilih Kursi</button>
                    <?php endif; ?>
                </div>

            </div>
            <?php } ?>

        </div>
    </div>

    <!-- MODAL PILIH KURSI -->
    <div id="seatModal" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-3xl max-w-sm w-full p-6 shadow-2xl flex flex-col">
            <div class="flex justify-between items-center mb-4">
                <h3 class="font-bold text-lg text-slate-800">Pilih Kursi <span id="modalJamTeks" class="text-sm text-amber-500"></span></h3>
                <button onclick="closeSeatModal()" class="text-slate-400 hover:text-red-500"><i class="fa-solid fa-xmark text-xl"></i></button>
            </div>

            <div class="flex justify-center gap-4 text-xs font-medium text-slate-500 mb-4">
                <div class="flex items-center gap-1"><div class="w-3 h-3 bg-emerald-100 rounded"></div> Tersedia</div>
                <div class="flex items-center gap-1"><div class="w-3 h-3 bg-amber-500 rounded"></div> Dipilih</div>
                <div class="flex items-center gap-1"><div class="w-3 h-3 bg-slate-200 rounded"></div> Terisi</div>
            </div>

            <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100 flex flex-col gap-2 max-h-[50vh] overflow-y-auto">
                <div class="flex justify-between text-[10px] font-bold text-slate-400 uppercase mb-2 px-2">
                    <span>Supir</span>
                    <span>Pintu Depan</span>
                </div>

                <div class="flex justify-between items-center w-full">
                    <div class="flex gap-2 w-1/2 justify-start">
                        <button onclick="pilih(this)" class="seat-btn w-10 h-10 rounded-lg bg-emerald-100 text-emerald-700 font-bold text-xs hover:bg-emerald-200">1A</button>
                        <button onclick="pilih(this)" class="seat-btn w-10 h-10 rounded-lg bg-emerald-100 text-emerald-700 font-bold text-xs hover:bg-emerald-200">1B</button>
                    </div>
                    <div class="w-4"></div>
                    <div class="flex gap-2 w-1/2 justify-end">
                        <button onclick="pilih(this)" class="seat-btn w-10 h-10 rounded-lg bg-emerald-100 text-emerald-700 font-bold text-xs hover:bg-emerald-200">1C</button>
                        <div class="w-10 h-10 flex items-center justify-center bg-slate-200 text-slate-400 rounded-lg text-[8px] uppercase">Pintu</div>
                    </div>
                </div>

                <?php for($i=2; $i<=9; $i++): ?>
                <div class="flex justify-between items-center w-full">
                    <div class="flex gap-2 w-1/2 justify-start">
                        <button onclick="pilih(this)" class="seat-btn w-10 h-10 rounded-lg bg-emerald-100 text-emerald-700 font-bold text-xs hover:bg-emerald-200"><?=$i?>A</button>
                        <button onclick="pilih(this)" class="seat-btn w-10 h-10 rounded-lg bg-emerald-100 text-emerald-700 font-bold text-xs hover:bg-emerald-200"><?=$i?>B</button>
                    </div>
                    <div class="w-4"></div>
                    <div class="flex gap-2 w-1/2 justify-end">
                        <button onclick="pilih(this)" class="seat-btn w-10 h-10 rounded-lg bg-emerald-100 text-emerald-700 font-bold text-xs hover:bg-emerald-200"><?=$i?>C</button>
                        <button onclick="pilih(this)" class="seat-btn w-10 h-10 rounded-lg <?= ($i%3==0) ? 'bg-slate-200 text-slate-400 cursor-not-allowed' : 'bg-emerald-100 text-emerald-700 hover:bg-emerald-200' ?> font-bold text-xs" <?= ($i%3==0) ? 'disabled' : '' ?> ><?=$i?>D</button>
                    </div>
                </div>
                <?php endfor; ?>

                <div class="flex justify-between items-center w-full gap-1 mt-2">
                    <button onclick="pilih(this)" class="seat-btn flex-1 h-10 rounded-lg bg-emerald-100 text-emerald-700 font-bold text-xs hover:bg-emerald-200">10A</button>
                    <button onclick="pilih(this)" class="seat-btn flex-1 h-10 rounded-lg bg-emerald-100 text-emerald-700 font-bold text-xs hover:bg-emerald-200">10B</button>
                    <button onclick="pilih(this)" class="seat-btn flex-1 h-10 rounded-lg bg-emerald-100 text-emerald-700 font-bold text-xs hover:bg-emerald-200">10C</button>
                    <button onclick="pilih(this)" class="seat-btn flex-1 h-10 rounded-lg bg-emerald-100 text-emerald-700 font-bold text-xs hover:bg-emerald-200">10D</button>
                    <button onclick="pilih(this)" class="seat-btn flex-1 h-10 rounded-lg bg-emerald-100 text-emerald-700 font-bold text-xs hover:bg-emerald-200">10E</button>
                </div>
            </div>

            <button onclick="alert('Lanjut bayar ya!')" class="mt-4 w-full bg-amber-500 hover:bg-amber-600 text-white font-bold py-3 rounded-xl transition-colors">
                Konfirmasi Kursi
            </button>
        </div>
    </div>

    <script>
        function filterBus(status, btn) {
            const buttons = document.querySelectorAll('.filter-btn');
            buttons.forEach(b => {
                b.className = 'filter-btn text-slate-500 hover:text-slate-700 px-4 py-1.5 rounded-md transition-all';
            });
            btn.className = 'filter-btn bg-[#1E3A8A] text-white px-4 py-1.5 rounded-md shadow transition-all';

            const cards = document.querySelectorAll('.bus-card');
            cards.forEach(card => {
                if (status === 'semua') {
                    card.style.display = 'flex';
                } else if (card.getAttribute('data-status') === status) {
                    card.style.display = 'flex';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        function openSeatModal(jam) {
            document.getElementById('modalJamTeks').innerText = '(' + jam + ' WIB)';
            document.getElementById('seatModal').classList.remove('hidden');
            
            document.querySelectorAll('.seat-btn:not([disabled])').forEach(btn => {
                btn.className = 'seat-btn w-10 h-10 rounded-lg bg-emerald-100 text-emerald-700 font-bold text-xs hover:bg-emerald-200';
                if(btn.innerText.startsWith('10')) btn.classList.replace('w-10', 'flex-1');
            });
        }

        function closeSeatModal() {
            document.getElementById('seatModal').classList.add('hidden');
        }

        function pilih(elemen) {
            document.querySelectorAll('.seat-btn:not([disabled])').forEach(btn => {
                btn.classList.remove('bg-amber-500', 'text-white');
                btn.classList.add('bg-emerald-100', 'text-emerald-700');
            });
            elemen.classList.remove('bg-emerald-100', 'text-emerald-700');
            elemen.classList.add('bg-amber-500', 'text-white');
        }
    </script>
</body>
</html>