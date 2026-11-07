<?php
session_start();
require_once __DIR__ . '/route.php';   
$haltePendek = $haltes;
$halteList   = array_keys($haltes);

// Tangkap parameter GET dari index.php
$getAsal   = $_GET['asal'] ?? '';
$getTujuan = $_GET['tujuan'] ?? '';
$getJam    = $_GET['jam'] ?? '';

// Ambil format 2 digit jam (misal "07")
$selectedHour = '';
if (!empty($getJam) && $getJam !== 'semua') {
    $parts = explode(':', $getJam);
    $selectedHour = str_pad($parts[0], 2, '0', STR_PAD_LEFT);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Tiket - DAMRI UNSRI</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['"IBM Plex Sans"', 'system-ui', 'sans-serif'] },
                    colors: { navy: { DEFAULT: '#1E3A8A', dark: '#172554' } }
                }
            }
        };
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :focus-visible { outline: 2px solid #F59E0B; outline-offset: 2px; }
        .bus-card { border-bottom: 1px solid #e2e8f0; }
        .bus-card.is-last { border-bottom-color: transparent; }
        @media (prefers-reduced-motion: reduce) { * { transition: none !important; animation: none !important; } }
        @media print {
            body * { visibility: hidden; }
            #ticketDetailModal, #ticketDetailModal * { visibility: visible; }
            #ticketDetailModal { position: absolute; inset: 0; background: #fff; align-items: flex-start; }
            .no-print { display: none !important; }
        }
    </style>
</head>
<body class="bg-[#F0F4F8] min-h-screen font-sans text-slate-700 antialiased">
 
    <!-- Header -->
    <header class="bg-navy">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 pt-5 pb-16 sm:pb-20">
            <a href="index.php" class="inline-flex items-center gap-2 text-sm text-blue-100 hover:text-white">
                <i class="fa-solid fa-arrow-left text-xs"></i> Kembali ke beranda
            </a>
            <h1 class="mt-5 text-2xl sm:text-3xl font-semibold text-white">Cari tiket bus kampus</h1>
            <p class="mt-1 text-sm sm:text-base text-blue-100">DAMRI Unsri antara Bukit dan Indralaya.</p>
        </div>
    </header>
 
    <main class="relative mx-auto max-w-6xl px-4 sm:px-6 lg:px-8 -mt-10 sm:-mt-12 pb-16">
 
        <!-- Panel pencarian -->
        <section aria-label="Filter jadwal" class="bg-white rounded-lg border border-slate-200 shadow-sm p-4 sm:p-5">
            <form id="searchForm" class="grid gap-3 md:grid-cols-[1fr_auto_1fr_minmax(0,0.85fr)] md:items-end">
 
                <div>
                    <label for="asalSelect" class="block text-sm font-medium text-slate-700 mb-1.5">Dari</label>
                    <div class="relative">
                        <i class="fa-solid fa-location-dot absolute left-3 top-1/2 -translate-y-1/2 text-amber-500 text-sm pointer-events-none"></i>
                        <select id="asalSelect" name="asal" class="h-11 w-full appearance-none rounded-md border border-slate-300 bg-white pl-9 pr-9 text-sm text-slate-900 hover:border-slate-400 cursor-pointer">
                            <?php foreach ($halteList as $i => $h): 
                                $isSelAsal = false;
                                if (!empty($getAsal)) {
                                    if ($h === $getAsal || stripos($h, $getAsal) !== false || stripos($getAsal, $h) !== false) {
                                        $isSelAsal = true;
                                    }
                                } else {
                                    if ($i === 0) $isSelAsal = true;
                                }
                            ?>
                                <option value="<?= e($h) ?>" data-short="<?= e($haltes[$h]) ?>" <?= $isSelAsal ? 'selected' : '' ?>><?= e($h) ?></option>
                            <?php endforeach; ?>
                        </select>
                        <i class="fa-solid fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-xs text-slate-400 pointer-events-none"></i>
                    </div>
                </div>
 
                <button type="button" id="swapRouteBtn" aria-label="Tukar asal dan tujuan"
                        class="h-11 w-11 justify-self-center rounded-md border border-slate-300 bg-white text-navy hover:bg-slate-50 flex items-center justify-center">
                    <i class="fa-solid fa-arrow-right-arrow-left text-sm rotate-90 md:rotate-0"></i>
                </button>
 
                <div>
                    <label for="tujuanSelect" class="block text-sm font-medium text-slate-700 mb-1.5">Ke</label>
                    <div class="relative">
                        <i class="fa-solid fa-flag-checkered absolute left-3 top-1/2 -translate-y-1/2 text-navy text-sm pointer-events-none"></i>
                        <select id="tujuanSelect" name="tujuan" class="h-11 w-full appearance-none rounded-md border border-slate-300 bg-white pl-9 pr-9 text-sm text-slate-900 hover:border-slate-400 cursor-pointer">
                            <?php foreach ($halteList as $i => $h): 
                                $isSelTujuan = false;
                                if (!empty($getTujuan)) {
                                    if ($h === $getTujuan || stripos($h, $getTujuan) !== false || stripos($getTujuan, $h) !== false) {
                                        $isSelTujuan = true;
                                    }
                                } else {
                                    if ($i === 1) $isSelTujuan = true;
                                }
                            ?>
                                <option value="<?= e($h) ?>" <?= $isSelTujuan ? 'selected' : '' ?>><?= e($h) ?></option>
                            <?php endforeach; ?>
                        </select>
                        <i class="fa-solid fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-xs text-slate-400 pointer-events-none"></i>
                    </div>
                </div>
 
                <div>
                    <label for="jamInput" class="block text-sm font-medium text-slate-700 mb-1.5">Jam berangkat</label>
                    <div class="relative">
                        <i class="fa-regular fa-clock absolute left-3 top-1/2 -translate-y-1/2 text-emerald-600 text-sm pointer-events-none"></i>
                        <select id="jamInput" name="jam" class="h-11 w-full appearance-none rounded-md border border-slate-300 bg-white pl-9 pr-9 text-sm text-slate-900 hover:border-slate-400 cursor-pointer tabular-nums">
                            <option value="">Semua jam</option>
                            <?php for ($h = $jamMulai; $h <= $jamSelesai; $h++): 
                                $hh = str_pad($h, 2, '0', STR_PAD_LEFT); 
                                $isSelJam = ($selectedHour === $hh);
                            ?>
                                <option value="<?= $hh ?>" <?= $isSelJam ? 'selected' : '' ?>><?= $hh ?>:00 - <?= $hh ?>:59</option>
                            <?php endfor; ?>
                        </select>
                        <i class="fa-solid fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-xs text-slate-400 pointer-events-none"></i>
                    </div>
                </div>
 
            </form>
        </section>
 
        <!-- Judul hasil + tab status -->
        <div class="mt-6 flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
            <div class="min-w-0">
                <h2 id="resultTitle" class="text-lg font-semibold text-slate-900">Jadwal bus</h2>
                <p id="resultSubtitle" class="text-sm text-slate-500">&nbsp;</p>
            </div>
 
            <div role="tablist" aria-label="Filter status kursi" class="inline-flex self-start sm:self-auto rounded-md border border-slate-200 bg-white p-0.5 text-sm font-medium">
                <button type="button" role="tab" class="filter-tab rounded px-3 py-1.5" data-filter="all">Semua</button>
                <button type="button" role="tab" class="filter-tab rounded px-3 py-1.5" data-filter="tersedia">Tersedia</button>
                <button type="button" role="tab" class="filter-tab rounded px-3 py-1.5" data-filter="penuh">Penuh</button>
            </div>
        </div>
 
        <!-- Daftar jadwal -->
        <div id="busListContainer" class="mt-3 overflow-hidden rounded-lg border border-slate-200 bg-white">
            <?php foreach ($buses as $bus):
                $isFull      = $bus['sisa'] == 0;
                $asalShort   = $haltePendek[$bus['asal']]   ?? $bus['asal'];
                $tujuanShort = $haltePendek[$bus['tujuan']] ?? $bus['tujuan'];
                $hargaTeks   = rupiah($bus['harga']);
                $dotClass    = str_replace('text-', 'bg-', $bus['icon_color']);
                
                $pct = ($kapasitas > 0) ? min(100, (int)round(($bus['sisa'] / $kapasitas) * 100)) : 0;
 
                if ($isFull)                { $seatText = 'text-red-700';     $barClass = 'bg-red-500';     $seatLabel = 'Penuh'; }
                elseif ($bus['sisa'] > 15)  { $seatText = 'text-emerald-700'; $barClass = 'bg-emerald-500'; $seatLabel = 'Sisa ' . $bus['sisa'] . ' kursi'; }
                else                        { $seatText = 'text-amber-700';   $barClass = 'bg-amber-500';   $seatLabel = 'Sisa ' . $bus['sisa'] . ' kursi'; }
            ?>
            <article class="bus-card grid gap-4 px-4 py-4 sm:px-6 hover:bg-slate-50 lg:grid-cols-[minmax(0,1.5fr)_minmax(0,1fr)_minmax(0,1fr)_auto] lg:items-center lg:gap-6"
                     data-asal="<?= e($bus['asal']) ?>"
                     data-tujuan="<?= e($bus['tujuan']) ?>"
                     data-jam="<?= e($bus['jam']) ?>"
                     data-status="<?= $isFull ? 'penuh' : 'tersedia' ?>">
 
                <!-- Jam & rute -->
                <div class="flex items-center gap-3 sm:gap-4">
                    <div>
                        <p class="text-xl font-semibold text-slate-900 tabular-nums leading-tight"><?= e($bus['jam']) ?></p>
                        <p class="text-xs text-slate-500"><?= e($asalShort) ?></p>
                    </div>
                    <div class="min-w-[64px] max-w-[140px] flex-1 text-center">
                        <p class="text-xs font-medium text-amber-700"><?= (int)$bus['durasi'] ?> menit</p>
                        <div class="relative my-1.5 h-px bg-slate-300">
                            <span class="absolute -left-0.5 -top-[3px] h-[7px] w-[7px] rounded-full bg-slate-400"></span>
                            <span class="absolute -right-0.5 -top-[3px] h-[7px] w-[7px] rounded-full bg-navy"></span>
                        </div>
                        <p class="truncate text-xs text-slate-400"><?= e($bus['via']) ?></p>
                    </div>
                    <div>
                        <p class="text-xl font-semibold text-slate-900 tabular-nums leading-tight"><?= e($bus['tiba']) ?></p>
                        <p class="text-xs text-slate-500"><?= e($tujuanShort) ?></p>
                    </div>
                </div>
 
                <!-- Info bus + kursi -->
                <div class="flex items-start justify-between gap-4 lg:contents">
                    <div class="min-w-0">
                        <p class="font-semibold text-slate-900">DAMRI Executive</p>
                        <p class="mt-0.5 flex items-center gap-1.5 text-sm text-slate-500">
                            <span class="h-1.5 w-1.5 shrink-0 rounded-full <?= e($dotClass) ?>"></span>
                            <?= e($bus['status']) ?>
                        </p>
                    </div>
                    <div class="w-32 shrink-0 lg:w-full lg:max-w-[160px]">
                        <p class="text-sm font-medium <?= $seatText ?> lg:text-left text-right"><?= e($seatLabel) ?></p>
                        <div class="mt-1.5 h-1.5 w-full overflow-hidden rounded-full bg-slate-100" role="img" aria-label="<?= e($seatLabel) ?> dari <?= (int)$kapasitas ?>">
                            <div class="h-full rounded-full <?= $barClass ?>" style="width: <?= $pct ?>%"></div>
                        </div>
                    </div>
                </div>
 
                <!-- Harga & aksi -->
                <div class="flex items-center justify-between gap-4 lg:min-w-[140px] lg:flex-col lg:items-end lg:gap-2">
                    <div class="lg:text-right">
                        <p class="text-lg font-semibold text-amber-700 tabular-nums leading-tight"><?= $hargaTeks ?></p>
                        <p class="text-xs text-slate-500">Tarif mahasiswa</p>
                    </div>
                    <button type="button"
                            data-bus="DAMRI Executive"
                            data-asal="<?= e($bus['asal']) ?>"
                            data-tujuan="<?= e($bus['tujuan']) ?>"
                            data-jam="<?= e($bus['jam']) ?>"
                            data-harga="<?= e($hargaTeks) ?>"
                            <?= $isFull ? 'disabled' : '' ?>
                            class="btn-pilih-kursi h-10 shrink-0 rounded-md px-4 text-sm font-medium <?= $isFull ? 'bg-slate-100 text-slate-400 cursor-not-allowed' : 'bg-navy text-white hover:bg-navy-dark' ?>">
                        <?= $isFull ? 'Penuh' : 'Pilih kursi' ?>
                    </button>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    </main>
 
    <!-- MODAL PILIH KURSI -->
    <div id="seatModal" class="fixed inset-0 z-50 items-end justify-center bg-slate-900/60 sm:items-center sm:p-4" style="display: none;" role="dialog" aria-modal="true" aria-labelledby="modalBusName">
        <div class="flex max-h-[92vh] w-full flex-col rounded-t-xl bg-white sm:max-w-md sm:rounded-lg">
            <div class="flex items-start justify-between gap-4 border-b border-slate-200 px-5 py-4">
                <div class="min-w-0">
                    <h3 id="modalBusName" class="font-semibold text-slate-900">Pilih kursi</h3>
                    <p id="modalBusDetail" class="text-sm text-slate-500 tabular-nums"></p>
                </div>
                <button type="button" id="closeSeatModalBtn" aria-label="Tutup" class="h-8 w-8 shrink-0 rounded-md text-slate-500 hover:bg-slate-100 flex items-center justify-center">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
 
            <div class="flex flex-wrap items-center gap-x-5 gap-y-1 px-5 pt-4 text-sm text-slate-600">
                <span class="flex items-center gap-2"><span class="h-4 w-4 rounded border border-emerald-300 bg-emerald-50"></span>Tersedia</span>
                <span class="flex items-center gap-2"><span class="h-4 w-4 rounded border border-amber-600 bg-amber-500"></span>Dipilih</span>
                <span class="flex items-center gap-2"><span class="h-4 w-4 rounded bg-slate-200"></span>Terisi</span>
            </div>
 
            <div class="flex-1 overflow-y-auto px-5 py-4">
                <div class="rounded-lg border border-slate-200 bg-slate-50 p-4">
                    <p class="mb-3 flex items-center gap-2 text-sm text-slate-500"><i class="fa-solid fa-user text-xs"></i> Supir</p>
                    <div class="grid grid-cols-5 gap-2 text-center text-sm font-medium" id="seatGrid">
                        <?php foreach ($seatRows as $row): foreach ($row as $cell): ?>
                            <?php if ($cell === null): ?>
                                <div></div>
                            <?php elseif ($cell[0] === '#'): $label = substr($cell, 1); ?>
                                <div class="flex h-10 items-center justify-center rounded-md bg-slate-200 text-slate-400 cursor-not-allowed <?= $label === 'Pintu' ? 'text-xs' : '' ?>"><?= e($label) ?></div>
                            <?php else: ?>
                                <button type="button" data-seat="<?= e($cell) ?>" class="seat-btn h-10 rounded-md border border-emerald-300 bg-emerald-50 text-emerald-800 hover:bg-emerald-100"><?= e($cell) ?></button>
                            <?php endif; ?>
                        <?php endforeach; endforeach; ?>
                    </div>
                </div>
            </div>
 
            <div class="flex items-center gap-4 border-t border-slate-200 px-5 py-4">
                <div class="min-w-0">
                    <p class="text-xs text-slate-500">Kursi dipilih</p>
                    <p id="selectedSeatLabel" class="font-semibold text-slate-900">Belum dipilih</p>
                </div>
                <button type="button" id="processPaymentBtn" class="ml-auto h-11 shrink-0 rounded-md bg-amber-500 px-5 text-sm font-semibold text-slate-900 hover:bg-amber-400">
                    Lanjutkan pembayaran
                </button>
            </div>
        </div>
    </div>
 
    <!-- MODAL E-TIKET -->
    <div id="ticketDetailModal" class="fixed inset-0 z-50 items-center justify-center bg-slate-900/60 p-4" style="display: none;" role="dialog" aria-modal="true" aria-labelledby="ticketTitle">
        <div class="max-h-[92vh] w-full max-w-sm overflow-y-auto rounded-lg bg-white">
            <div class="flex items-start justify-between gap-4 bg-navy px-5 py-4 text-white">
                <div>
                    <p class="flex items-center gap-2 text-sm font-medium text-emerald-300"><i class="fa-solid fa-circle-check"></i> Pembayaran berhasil</p>
                    <h3 id="ticketTitle" class="mt-1 text-lg font-semibold">E-tiket DAMRI Unsri</h3>
                    <p class="text-sm text-blue-100">Tunjukkan e-tiket ini ke petugas bus.</p>
                </div>
                <button type="button" id="closeTicketModalBtn" aria-label="Tutup" class="no-print h-8 w-8 shrink-0 rounded-md text-blue-100 hover:bg-white/10 flex items-center justify-center">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
 
            <div class="space-y-4 p-5">
                <div class="rounded-md border border-slate-200 bg-slate-50 py-3 text-center">
                    <i class="fa-solid fa-barcode text-5xl text-slate-800"></i>
                    <p id="ticketCodeText" class="mt-1 font-semibold tracking-widest text-slate-600 tabular-nums">DMR-000000</p>
                </div>
 
                <div class="flex items-center justify-between gap-3">
                    <div class="min-w-0">
                        <p class="text-xs text-slate-500">Dari</p>
                        <p id="ticketAsal" class="font-semibold text-slate-900"></p>
                    </div>
                    <i class="fa-solid fa-arrow-right shrink-0 text-slate-300"></i>
                    <div class="min-w-0 text-right">
                        <p class="text-xs text-slate-500">Tujuan</p>
                        <p id="ticketTujuan" class="font-semibold text-slate-900"></p>
                    </div>
                </div>
 
                <dl class="grid grid-cols-2 gap-x-4 gap-y-3 border-t border-dashed border-slate-300 pt-4 text-sm">
                    <div><dt class="text-xs text-slate-500">Layanan</dt><dd id="ticketBus" class="font-semibold text-navy">DAMRI Executive</dd></div>
                    <div><dt class="text-xs text-slate-500">Jam berangkat</dt><dd id="ticketJam" class="font-semibold text-slate-900 tabular-nums"></dd></div>
                    <div><dt class="text-xs text-slate-500">Nomor kursi</dt><dd id="ticketKursi" class="text-lg font-semibold text-amber-700"></dd></div>
                    <div><dt class="text-xs text-slate-500">Tarif</dt><dd id="ticketHarga" class="font-semibold text-slate-900 tabular-nums"></dd></div>
                    <div><dt class="text-xs text-slate-500">Status</dt><dd class="font-semibold text-emerald-700">Lunas</dd></div>
                </dl>
            </div>
 
            <div class="no-print flex gap-2 border-t border-slate-200 p-4">
                <button type="button" onclick="window.print()" class="flex h-11 flex-1 items-center justify-center gap-2 rounded-md border border-slate-300 text-sm font-medium text-slate-700 hover:bg-slate-50">
                    <i class="fa-solid fa-print text-xs"></i> Cetak tiket
                </button>
                <button type="button" id="finishTicketBtn" class="h-11 flex-1 rounded-md bg-navy text-sm font-medium text-white hover:bg-navy-dark">
                    Selesai
                </button>
            </div>
        </div>
    </div>
    <script src="js/cariTiket.js"></script>
</body>
</html>