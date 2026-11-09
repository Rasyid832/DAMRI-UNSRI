        const BKT = 'Halte Unsri Bukit';
        const IDL = 'Terminal Unsri Indralaya';
        const singkatan = { 'Halte Unsri Bukit': 'Bukit', 'Terminal Unsri Indralaya': 'Indralaya' };

        const defaultBuses = [
            { id: 1, asal: BKT, tujuan: IDL, jam: '06:00', tiba: '06:45', sisa: 0,  durasi: 45, via: 'Via Tol Palindra', harga: 'Rp 15.000', status: 'Dalam perjalanan', color: 'bg-emerald-500' },
            { id: 2, asal: BKT, tujuan: IDL, jam: '07:00', tiba: '07:45', sisa: 8,  durasi: 45, via: 'Via Tol Palindra', harga: 'Rp 15.000', status: 'Dalam perjalanan', color: 'bg-emerald-500' },
            { id: 3, asal: BKT, tujuan: IDL, jam: '08:00', tiba: '08:45', sisa: 15, durasi: 45, via: 'Via Tol Palindra', harga: 'Rp 15.000', status: 'Menunggu keberangkatan', color: 'bg-slate-400' },
            { id: 4, asal: BKT, tujuan: IDL, jam: '10:00', tiba: '10:45', sisa: 40, durasi: 45, via: 'Via Tol Palindra', harga: 'Rp 15.000', status: 'Menunggu keberangkatan', color: 'bg-slate-400' },
            { id: 5, asal: IDL, tujuan: BKT, jam: '06:30', tiba: '07:15', sisa: 0,  durasi: 45, via: 'Via Tol Palindra', harga: 'Rp 15.000', status: 'Dalam perjalanan', color: 'bg-emerald-500' },
            { id: 6, asal: IDL, tujuan: BKT, jam: '07:30', tiba: '08:15', sisa: 12, durasi: 45, via: 'Via Tol Palindra', harga: 'Rp 15.000', status: 'Menunggu keberangkatan', color: 'bg-slate-400' },
            { id: 7, asal: IDL, tujuan: BKT, jam: '13:30', tiba: '14:15', sisa: 33, durasi: 45, via: 'Via Tol Palindra', harga: 'Rp 15.000', status: 'Menunggu keberangkatan', color: 'bg-slate-400' }
        ];

        let selectedBus = null;

        if (!sessionStorage.getItem('damri_buses_temp')) {
            sessionStorage.setItem('damri_buses_temp', JSON.stringify(defaultBuses));
        }

        function getBusesData() {
            let storedBuses = sessionStorage.getItem('damri_buses_temp');
            return storedBuses ? JSON.parse(storedBuses) : defaultBuses;
        }

        // Fungsi Utama Menampilkan Bus (Menggunakan Flexbox Penuh, Tanpa Grid)
        function renderBuses() {
            let asal = $('#asalSelect').val();
            let tujuan = $('#tujuanSelect').val();
            let jam = $('#jamInput').val();

            let buses = getBusesData();

            let filtered = buses.filter(b => {
                return b.asal === asal && b.tujuan === tujuan && (!jam || b.jam.startsWith(jam));
            });

            $('#resultSubtitle').text(`Menampilkan ${filtered.length} jadwal bus`);
            
            if (filtered.length === 0) {
                $('#busListContainer').html('<p class="p-6 text-center text-sm text-slate-500 font-medium">Tidak ada jadwal yang sesuai.</p>');
                return;
            }

            $('#busListContainer').html(filtered.map(b => {
                let isFull = b.sisa === 0;
                return `
                <article class="bus-card p-4 sm:p-6 hover:bg-slate-50 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    
                    <!-- Kiri: Jam & Rute -->
                    <div class="flex items-center gap-4 flex-1">
                        <div class="flex flex-col">
                            <p class="text-xl font-bold text-slate-900">${b.jam}</p>
                            <p class="text-xs font-semibold text-slate-500">${singkatan[b.asal]}</p>
                        </div>
                        <div class="flex-1 flex flex-col items-center px-2">
                            <p class="text-xs font-bold text-amber-700">${b.durasi} menit</p>
                            <div class="my-1.5 h-px bg-slate-300 w-full relative"></div>
                            <p class="text-xs text-slate-400">${b.via}</p>
                        </div>
                        <div class="flex flex-col text-right lg:text-left">
                            <p class="text-xl font-bold text-slate-900">${b.tiba}</p>
                            <p class="text-xs font-semibold text-slate-500">${singkatan[b.tujuan]}</p>
                        </div>
                    </div>

                    <!-- Tengah 1: Status Bus -->
                    <div class="flex flex-col min-w-[160px]">
                        <p class="font-bold text-slate-800">DAMRI Executive</p>
                        <p class="text-sm text-slate-500 font-medium flex items-center gap-1.5 mt-0.5">
                            <span class="h-1.5 w-1.5 rounded-full ${b.color}"></span>${b.status}
                        </p>
                    </div>

                    <!-- Tengah 2: Kursi -->
                    <div class="flex flex-col min-w-[140px]">
                        <p class="text-sm font-bold ${isFull ? 'text-red-700' : 'text-emerald-700'}">${isFull ? 'Penuh' : 'Sisa ' + b.sisa + ' kursi'}</p>
                        <div class="mt-1.5 h-1.5 w-full bg-slate-100 rounded-full overflow-hidden">
                            <div class="h-full ${isFull ? 'bg-red-500' : 'bg-emerald-500'}" style="width: ${(b.sisa/40)*100}%"></div>
                        </div>
                    </div>

                    <!-- Kanan: Harga & Tombol -->
                    <div class="flex flex-row lg:flex-col justify-between items-center lg:items-end border-t lg:border-t-0 pt-3 lg:pt-0 border-slate-100 gap-2">
                        <p class="text-lg font-bold text-amber-700">${b.harga}</p>
                        <div class="flex items-center gap-2">
                            <a href="detailTiket.php?asal=${encodeURIComponent(b.asal)}&tujuan=${encodeURIComponent(b.tujuan)}&jam=${b.jam}" 
                                class="h-10 px-3 rounded-md text-sm font-semibold border border-slate-300 text-slate-700 hover:bg-slate-100 flex items-center justify-center gap-1.5 transition-colors">
                                <i class="fa-solid fa-map-location-dot text-blue-600 text-xs"></i> Detail
                            </a>
                            <button type="button" ${isFull ? 'disabled' : ''} 
                                data-bus-id='${b.id}'
                                class="pesan-btn h-10 w-[140px] px-4 rounded-md text-sm font-bold shadow-sm transition-all ${isFull ? 'bg-slate-100 text-slate-400 cursor-not-allowed' : 'bg-damri-navyLight text-white hover:bg-damri-navy'}">
                                ${isFull ? 'Penuh' : 'Pesan tiket'}
                            </button>
                        </div>
                    </div>

                </article>`;
            }).join(''));
        }

        // Event Listeners
        $('#asalSelect, #tujuanSelect, #jamInput').on('change', renderBuses);

        $('#swapRouteBtn').on('click', function() {
            let a = $('#asalSelect').val();
            $('#asalSelect').val($('#tujuanSelect').val());
            $('#tujuanSelect').val(a);
            renderBuses();
        });

        // Pesan Tiket
        $(document).on('click', '.pesan-btn', function() {
            let busId = $(this).data('bus-id');
            let buses = getBusesData();
            selectedBus = buses.find(b => b.id == busId);

            if(selectedBus) {
                $('#paymentPrice').text(selectedBus.harga);
                $('#paymentModal').css('display', 'flex');
            }
        });

        // Konfirmasi Pembayaran
        $('#confirmPaymentBtn').on('click', function() {
            let selectedMethod = $('input[name="metode"]:checked').val();
            $('#paymentModal').hide();

            let buses = getBusesData();
            let targetBus = buses.find(b => b.id == selectedBus.id);
            if(targetBus && targetBus.sisa > 0) {
                targetBus.sisa -= 1;
                sessionStorage.setItem('damri_buses_temp', JSON.stringify(buses));
            }

            let kodeTiket = 'DMR-' + Math.floor(100000 + Math.random() * 900000);

            let tiketBaru = {
                kode: kodeTiket,
                asal: selectedBus.asal,
                tujuan: selectedBus.tujuan,
                jam: selectedBus.jam,
                harga: selectedBus.harga,
                metode: selectedMethod,
                tanggal: new Date().toLocaleDateString('id-ID', { day: '2-digit', month: 'short', year: 'numeric' })
            };

            let historyList = JSON.parse(localStorage.getItem('damri_history')) || [];
            historyList.unshift(tiketBaru);
            localStorage.setItem('damri_history', JSON.stringify(historyList));

            $('#ticketCodeText').text(kodeTiket);
            $('#ticketAsal').text(singkatan[selectedBus.asal]);
            $('#ticketTujuan').text(singkatan[selectedBus.tujuan]);
            $('#ticketJam').text(selectedBus.jam);
            $('#ticketMetode').text(selectedMethod);
            
            JsBarcode("#barcodeElement", kodeTiket, {
                format: "CODE128",
                lineColor: "black",
                width: 2,
                height: 50,
                displayValue: false
            });

            $('#ticketDetailModal').css('display', 'flex');
            renderBuses();
        });

        $('#closePaymentModalBtn').on('click', () => $('#paymentModal').hide());
        $('#closeTicketModalBtn, #finishTicketBtn').on('click', () => {
            $('#ticketDetailModal').hide();
        });

        // Jalankan saat pertama buka
        renderBuses();