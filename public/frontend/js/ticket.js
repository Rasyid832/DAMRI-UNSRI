const kontainer = $(".mainKontainer");
let kode_pemberangkatan = "";

// Fungsi Render Barcode
function renderBarcode(targetSelector, value) {
    JsBarcode(targetSelector, value, {
        format: "CODE128",
        lineColor: "#0f172a",
        width: 1.8,
        height: 45,
        displayValue: false,
        fontSize: 11,
        margin: 0
    });
}


$(".klikIndralya").on("click", () => {
    const r = Math.floor(100000000 + Math.random() * 900000000).toString();
    kode_pemberangkatan = r;
    const card = `
    <div class="relative w-full max-w-4xl bg-white rounded-2xl shadow-2xl overflow-hidden flex flex-col md:flex-row border border-slate-200">
        
        <!-- MAIN TICKET (Bagian Kiri) -->
        <div class="flex-1 p-6 flex flex-col justify-between border-b md:border-b-0 md:border-r border-dashed border-slate-300 relative">
            
            <!-- Top Header -->
            <div class="flex justify-between items-center mb-4">
                <div class="flex items-center h-[30px] gap-[10px]">
                    <img src="../images/logo_damri.png" alt="Logo DAMRI UNSRI" class="h-[310px] w-[90px] object-contain">
                    <div class="h-6 w-[2px] bg-slate-300"></div>
                    <span class="text-blue-900 font-extrabold text-xl tracking-wider">UNSRI</span>
                </div>
                <div class="text-right">
                    <h2 class="text-yellow-600 font-extrabold text-sm md:text-base tracking-wider uppercase">Tiket Perjalanan</h2>
                </div>
            </div>

            <!-- Route Info -->
            <div class="flex items-center justify-between my-3 bg-slate-50 p-4 rounded-xl border border-slate-100">
                <div>
                    <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">Origin</p>
                    <p class="text-lg md:text-xl font-extrabold text-slate-800">Unsri Indralya</p>
                </div>
                <div class="flex flex-col items-center px-4">
                    <i class="fa-solid fa-bus text-blue-800 text-xl"></i>
                    <i class="fa-solid fa-arrow-right text-slate-400 text-xs mt-1"></i>
                </div>
                <div class="text-right">
                    <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">Destination</p>
                    <p class="text-lg md:text-xl font-extrabold text-slate-800">Unsri Bukit</p>
                </div>
            </div>

            <!-- Trip Info -->
            <div class="grid grid-cols-3 gap-2 text-xs my-2">
                <div>
                    <p class="text-slate-400 font-medium">DATE</p>
                    <p class="font-bold text-slate-800 text-sm">25 OCT 2026</p>
                </div>
                <div>
                    <p class="text-slate-400 font-medium">TIME</p>
                    <p class="font-bold text-slate-800 text-sm">08:30 AM</p>
                </div>
                <div>
                    <p class="text-slate-400 font-medium">PASSENGER</p>
                    <p class="font-bold text-slate-800 text-sm truncate">JOKOWI</p>
                </div>
            </div>

            
            <div class="flex flex-col md:flex-row justify-between items-center mt-4 pt-3 border-t border-slate-100 gap-4">
                <div class="flex gap-2 text-center md:text-left w-full md:w-auto">
                    <div class="bg-slate-100 px-3 py-1.5 rounded-lg border border-slate-200">
                        <p class="text-[9px] text-slate-400 font-semibold">LOKASI PENJEMPUTAN</p>
                        <p class="font-mono font-bold text-slate-800 text-xs">TERMINAL UNSRI INDRALAYA</p>
                    </div>
                    <div class="bg-slate-100 px-3 py-1.5 rounded-lg border border-slate-200">
                        <p class="text-[9px] text-slate-400 font-semibold">TICKET NO</p>
                        <p id="kodeTiket" class="font-mono font-bold text-blue-900 text-xs">${kode_pemberangkatan}</p>
                    </div>
                </div>

                
                <div class="flex flex-col items-center">
                    <svg id="barcode" class="max-h-12 max-w-[180px]"></svg>
                    <span class="text-[9px] text-slate-400 mt-1">Scan Barcode saat keberangkatan</span>
                </div>
            </div>

            <!-- Footer Bar Kiri -->
            <div class="mt-4 pt-2 border-t border-slate-100 text-[10px] text-slate-400 flex justify-between">
                <span>DAMRI UNSRI</span>
                <span>www.damri.co.id</span>
                <span>+62 21 123 4567</span>
            </div>
        </div>

        <!-- STUB / BOARDING PASS (Bagian Kanan) -->
        <div class="w-full md:w-72 bg-slate-50 p-6 flex flex-col justify-between relative">
            <div class="hidden md:block absolute -left-3 -top-3 w-6 h-6 bg-slate-900 rounded-full"></div>
            <div class="hidden md:block absolute -left-3 -bottom-3 w-6 h-6 bg-slate-900 rounded-full"></div>

            <div>
                <div class="mb-3">
                    <p class="text-[10px] text-slate-400 font-bold uppercase">ORIGIN</p>
                    <p class="font-bold text-slate-800 text-sm">Unsri Indralaya</p>
                </div>
                
                <div class="mb-4">
                    <p class="text-[10px] text-slate-400 font-bold uppercase">DESTINATION</p>
                    <p class="font-bold text-slate-800 text-sm">Unsri Bukit</p>
                </div>

                <div class="grid grid-cols-2 gap-2 bg-white p-3 rounded-lg border border-slate-200 mb-4">
                    <div>
                        <p class="text-[10px] text-slate-400 font-bold">SEAT</p>
                        <p class="text-xl font-extrabold text-yellow-600">24</p>
                    </div>
                    <div>
                        <p class="text-[10px] text-slate-400 font-bold">PLAT NO BUS</p>
                        <p class="text-sm font-extrabold text-slate-800">BG 1234 KL</p>
                    </div>
                </div>

                <div class="mb-4">
                    <p class="text-[10px] text-slate-400 font-bold uppercase">PASSENGER</p>
                    <p class="font-bold text-slate-800 text-xs">JOKOWI</p>
                </div>
            </div>

            <div>
                <p class="text-[9px] text-slate-400 font-semibold text-center mb-2">UNIVERSITAS SRIWIJAYA</p>
                <div class="flex justify-center space-x-4 text-slate-500 text-xs py-2 border-t border-slate-200">
                    <i class="fa-solid fa-wifi" title="Free Wi-Fi"></i>
                    <i class="fa-solid fa-snowflake" title="AC Bus"></i>
                    <i class="fa-solid fa-chair" title="Reclining Seat"></i>
                </div>
            </div>
        </div>
    </div>`;

    // 1. Inject HTML ke DOM terlebih dahulu
    kontainer.html(card);

    // 2. Render Barcode setelah elemen #barcode sudah ada di DOM
    renderBarcode("#barcode", r);
});


$(".klikPlg").on("click",()=>{
    const r = Math.floor(100000000 + Math.random() * 900000000).toString();
    kode_pemberangkatan = r;
    const card = `
    <div class="relative w-full max-w-4xl bg-white rounded-2xl shadow-2xl overflow-hidden flex flex-col md:flex-row border border-slate-200">
        
        <!-- MAIN TICKET (Bagian Kiri) -->
        <div class="flex-1 p-6 flex flex-col justify-between border-b md:border-b-0 md:border-r border-dashed border-slate-300 relative">
            
            <!-- Top Header -->
            <div class="flex justify-between items-center mb-4">
                <div class="flex items-center h-[30px] gap-[10px]">
                    <img src="../images/logo_damri.png" alt="Logo DAMRI UNSRI" class="h-[310px] w-[90px] object-contain">
                    <div class="h-6 w-[2px] bg-slate-300"></div>
                    <span class="text-blue-900 font-extrabold text-xl tracking-wider">UNSRI</span>
                </div>
                <div class="text-right">
                    <h2 class="text-yellow-600 font-extrabold text-sm md:text-base tracking-wider uppercase">Tiket Perjalanan</h2>
                </div>
            </div>

            <!-- Route Info -->
            <div class="flex items-center justify-between my-3 bg-slate-50 p-4 rounded-xl border border-slate-100">
                <div>
                    <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">Origin</p>
                    <p class="text-lg md:text-xl font-extrabold text-slate-800">Unsri Bukit</p>
                </div>
                <div class="flex flex-col items-center px-4">
                    <i class="fa-solid fa-bus text-blue-800 text-xl"></i>
                    <i class="fa-solid fa-arrow-right text-slate-400 text-xs mt-1"></i>
                </div>
                <div class="text-right">
                    <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">Destination</p>
                    <p class="text-lg md:text-xl font-extrabold text-slate-800">Unsri Indralaya</p>
                </div>
            </div>

            <!-- Trip Info -->
            <div class="grid grid-cols-3 gap-2 text-xs my-2">
                <div>
                    <p class="text-slate-400 font-medium">DATE</p>
                    <p class="font-bold text-slate-800 text-sm">25 OCT 2026</p>
                </div>
                <div>
                    <p class="text-slate-400 font-medium">TIME</p>
                    <p class="font-bold text-slate-800 text-sm">08:30 AM</p>
                </div>
                <div>
                    <p class="text-slate-400 font-medium">PASSENGER</p>
                    <p class="font-bold text-slate-800 text-sm truncate">JOKOWI</p>
                </div>
            </div>

            
            <div class="flex flex-col md:flex-row justify-between items-center mt-4 pt-3 border-t border-slate-100 gap-4">
                <div class="flex gap-2 text-center md:text-left w-full md:w-auto">
                    <div class="bg-slate-100 px-3 py-1.5 rounded-lg border border-slate-200">
                        <p class="text-[9px] text-slate-400 font-semibold">LOKASI PENJEMPUTAN</p>
                        <p class="font-mono font-bold text-slate-800 text-xs">TERMINAL UNSRI BUKIT</p>
                    </div>
                    <div class="bg-slate-100 px-3 py-1.5 rounded-lg border border-slate-200">
                        <p class="text-[9px] text-slate-400 font-semibold">TICKET NO</p>
                        <p id="kodeTiket" class="font-mono font-bold text-blue-900 text-xs">${kode_pemberangkatan}</p>
                    </div>
                </div>

                
                <div class="flex flex-col items-center">
                    <svg id="barcode" class="max-h-12 max-w-[180px]"></svg>
                    <span class="text-[9px] text-slate-400 mt-1">Scan Barcode saat keberangkatan</span>
                </div>
            </div>

            <!-- Footer Bar Kiri -->
            <div class="mt-4 pt-2 border-t border-slate-100 text-[10px] text-slate-400 flex justify-between">
                <span>DAMRI UNSRI</span>
                <span>www.damri.co.id</span>
                <span>+62 21 123 4567</span>
            </div>
        </div>

        <!-- STUB / BOARDING PASS (Bagian Kanan) -->
        <div class="w-full md:w-72 bg-slate-50 p-6 flex flex-col justify-between relative">
            <div class="hidden md:block absolute -left-3 -top-3 w-6 h-6 bg-slate-900 rounded-full"></div>
            <div class="hidden md:block absolute -left-3 -bottom-3 w-6 h-6 bg-slate-900 rounded-full"></div>

            <div>
                <div class="mb-3">
                    <p class="text-[10px] text-slate-400 font-bold uppercase">ORIGIN</p>
                    <p class="font-bold text-slate-800 text-sm">Unsri Bukit</p>
                </div>
                
                <div class="mb-4">
                    <p class="text-[10px] text-slate-400 font-bold uppercase">DESTINATION</p>
                    <p class="font-bold text-slate-800 text-sm">Unsri Indralaya</p>
                </div>

                <div class="grid grid-cols-2 gap-2 bg-white p-3 rounded-lg border border-slate-200 mb-4">
                    <div>
                        <p class="text-[10px] text-slate-400 font-bold">SEAT</p>
                        <p class="text-xl font-extrabold text-yellow-600">24</p>
                    </div>
                    <div>
                        <p class="text-[10px] text-slate-400 font-bold">PLAT NO BUS</p>
                        <p class="text-sm font-extrabold text-slate-800">BG 1234 KL</p>
                    </div>
                </div>

                <div class="mb-4">
                    <p class="text-[10px] text-slate-400 font-bold uppercase">PASSENGER</p>
                    <p class="font-bold text-slate-800 text-xs">JOKOWI</p>
                </div>
            </div>

            <div>
                <p class="text-[9px] text-slate-400 font-semibold text-center mb-2">UNIVERSITAS SRIWIJAYA</p>
                <div class="flex justify-center space-x-4 text-slate-500 text-xs py-2 border-t border-slate-200">
                    <i class="fa-solid fa-wifi" title="Free Wi-Fi"></i>
                    <i class="fa-solid fa-snowflake" title="AC Bus"></i>
                    <i class="fa-solid fa-chair" title="Reclining Seat"></i>
                </div>
            </div>
        </div>
    </div>`;

    // 1. Inject HTML ke DOM terlebih dahulu
    kontainer.html(card);

    // 2. Render Barcode setelah elemen #barcode sudah ada di DOM
    renderBarcode("#barcode", r);
});
