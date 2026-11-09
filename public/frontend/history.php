<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pesanan Tiket - DAMRI UNSRI</title>
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
    <!-- JsBarcode Library untuk Barcode E-Tiket -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jsbarcode/3.11.6/JsBarcode.all.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :focus-visible { outline: 2px solid #F59E0B; outline-offset: 2px; }
        @media print {
            body * { visibility: hidden; }
            #ticketDetailModal, #ticketDetailModal * { visibility: visible; }
            #ticketDetailModal { position: absolute; inset: 0; background: #fff; }
            .no-print { display: none !important; }
        }
    </style>
</head>
<body class="bg-[#F0F4F8] min-h-screen font-sans text-slate-700 antialiased flex flex-col">
 
    <!-- Header Lebar & Proporsional -->
    <header class="bg-navy w-full">
        <div class="mx-auto max-w-5xl px-6 pt-8 pb-16 flex flex-col">
            <a href="cariTiket.php" class="inline-flex items-center gap-2 text-sm text-blue-200 hover:text-white self-start transition-colors">
                <i class="fa-solid fa-arrow-left text-xs"></i> Kembali cari tiket
            </a>
            <h1 class="mt-4 text-3xl font-bold text-white tracking-tight">Riwayat Tiket Saya</h1>
            <p class="mt-1 text-sm text-blue-200">Daftar e-tiket bus DAMRI Unsri yang telah kamu pesan.</p>
        </div>
    </header>
 
    <!-- Main Content (Flexbox Container melebar) -->
    <main class="relative mx-auto max-w-5xl w-full px-6 -mt-8 pb-20 flex flex-col gap-6">
        <!-- Wadah Daftar Riwayat Tiket -->
        <div id="historyContainer" class="flex flex-col gap-4 w-full">
            <!-- Data akan dimuat otomatis oleh JavaScript -->
        </div>
    </main>
 
    <!-- MODAL E-TIKET -->
    <div id="ticketDetailModal" class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/60 p-4 backdrop-blur-sm" style="display: none;" role="dialog">
        <div class="w-full max-w-md flex flex-col overflow-y-auto rounded-xl bg-white shadow-2xl">
            <div class="flex items-start justify-between bg-navy px-6 py-5 text-white">
                <div class="flex flex-col">
                    <p class="text-xs font-semibold text-emerald-300 uppercase tracking-wider"><i class="fa-solid fa-circle-check"></i> E-Tiket Aktif</p>
                    <h3 class="mt-1 text-xl font-bold">DAMRI Unsri</h3>
                </div>
                <button type="button" id="closeTicketModalBtn" class="no-print h-8 w-8 rounded-lg text-blue-200 hover:bg-white/10 hover:text-white flex items-center justify-center transition-colors"><i class="fa-solid fa-xmark text-lg"></i></button>
            </div>
            <div class="p-6 flex flex-col gap-5">
                <!-- Barcode Dinamis -->
                <div class="rounded-xl border border-slate-200 bg-slate-50 p-4 flex flex-col items-center justify-center text-center">
                    <svg id="barcodeElement"></svg>
                    <p id="modalTicketCode" class="mt-2 font-mono text-base font-bold tracking-widest text-navy">DMR-000000</p>
                </div>
                <div class="flex justify-between items-center text-sm w-full bg-blue-50/40 p-4 rounded-xl border border-blue-100">
                    <div class="flex flex-col"><p class="text-xs text-slate-500 uppercase font-semibold">Halte Asal</p><p id="modalTicketAsal" class="font-bold text-slate-900 mt-0.5"></p></div>
                    <div class="text-right flex flex-col"><p class="text-xs text-slate-500 uppercase font-semibold">Halte Tujuan</p><p id="modalTicketTujuan" class="font-bold text-slate-900 mt-0.5"></p></div>
                </div>
                <div class="flex flex-col gap-3 pt-1 text-sm w-full">
                    <div class="flex justify-between w-full border-b border-slate-100 pb-3">
                        <div class="flex flex-col"><span class="text-xs text-slate-500">Jam Berangkat</span><span id="modalTicketJam" class="font-bold text-slate-800"></span></div>
                        <div class="flex flex-col text-right"><span class="text-xs text-slate-500">Metode Pembayaran</span><span id="modalTicketMetode" class="font-bold text-navy"></span></div>
                    </div>
                </div>
            </div>
            <div class="no-print flex gap-3 border-t border-slate-200 p-6 bg-slate-50">
                <button type="button" onclick="window.print()" class="h-12 flex-1 rounded-xl border border-slate-300 text-sm font-semibold text-slate-700 hover:bg-slate-100 transition-colors">Cetak Tiket</button>
                <button type="button" id="finishTicketBtn" class="h-12 flex-1 rounded-xl bg-navy text-sm font-bold text-white hover:bg-navy-dark transition-colors shadow-sm">Tutup</button>
            </div>
        </div>
    </div>

   <script src = "js/history.js"></script>
  
</body>
</html>