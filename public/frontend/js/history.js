
        const singkatan = { 'Halte Unsri Bukit': 'Bukit Palembang', 'Terminal Unsri Indralaya': 'Terminal Indralaya' };

        // Fungsi Memuat Riwayat dari localStorage
        function loadHistory() {
            let historyList = JSON.parse(localStorage.getItem('damri_history')) || [];
            
            if (historyList.length === 0) {
                $('#historyContainer').html(`
                    <div class="bg-white rounded-xl border border-slate-200 p-12 text-center flex flex-col items-center shadow-md">
                        <i class="fa-solid fa-ticket text-5xl text-slate-300 mb-3"></i>
                        <p class="text-slate-600 font-bold text-base">Belum ada riwayat pemesanan tiket.</p>
                        <p class="text-slate-400 text-sm mt-1">Silakan lakukan pemesanan bus melalui halaman cari tiket.</p>
                        <a href="cari-tiket.html" class="mt-6 inline-flex items-center justify-center px-6 py-3 bg-navy text-white text-sm rounded-xl font-bold hover:bg-navy-dark transition-all shadow-sm">Cari & Pesan Tiket Sekarang</a>
                    </div>
                `);
                return;
            }

            $('#historyContainer').html(historyList.map((t, index) => `
                <div class="bg-white rounded-xl border border-slate-200 p-6 shadow-md flex flex-col md:flex-row justify-between gap-6 items-start md:items-center w-full transition-all hover:shadow-lg">
                    <div class="flex flex-col gap-2 flex-1">
                        <div class="flex items-center gap-3">
                            <span class="bg-blue-50 text-navy text-xs font-bold px-3 py-1 rounded-full border border-blue-100 font-mono tracking-wider">${t.kode}</span>
                            <span class="text-xs text-slate-400 font-medium"><i class="fa-regular fa-calendar mr-1"></i>${t.tanggal || 'Hari ini'}</span>
                        </div>
                        <h3 class="font-bold text-lg text-slate-900 flex items-center gap-2 mt-1">
                            <span>${singkatan[t.asal] || t.asal}</span>
                            <i class="fa-solid fa-arrow-right text-xs text-amber-500"></i>
                            <span>${singkatan[t.tujuan] || t.tujuan}</span>
                        </h3>
                        <div class="flex items-center gap-4 text-sm text-slate-500 mt-1">
                            <span><i class="fa-regular fa-clock mr-1 text-emerald-600"></i> Jam: <strong class="text-slate-700">${t.jam} WIB</strong></span>
                            <span>•</span>
                            <span>Bayar via: <strong class="text-navy">${t.metode}</strong></span>
                        </div>
                    </div>
                    <div class="flex flex-row md:flex-col justify-between items-center md:items-end w-full md:w-auto border-t md:border-t-0 pt-4 md:pt-0 border-slate-100 gap-3">
                        <div class="flex flex-col md:items-end">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-emerald-50 text-emerald-700 border border-emerald-200 mb-1">Tiket Aktif</span>
                            <span class="text-xs text-slate-400">Tarif Mahasiswa</span>
                            <p class="font-bold text-amber-700 text-xl">${t.harga}</p>
                        </div>
                        <button type="button" data-index="${index}" class="lihat-tiket-btn h-11 px-6 rounded-xl bg-navy text-white text-sm font-bold hover:bg-navy-dark transition-all shadow-sm flex items-center gap-2">
                            <i class="fa-solid fa-qrcode"></i> Lihat Tiket
                        </button>
                    </div>
                </div>
            `).join(''));
        }

        // Event Klik "Lihat Tiket"
        $(document).on('click', '.lihat-tiket-btn', function() {
            let index = $(this).data('index');
            let historyList = JSON.parse(localStorage.getItem('damri_history')) || [];
            let t = historyList[index];

            if(t) {
                $('#modalTicketCode').text(t.kode);
                $('#modalTicketAsal').text(singkatan[t.asal] || t.asal);
                $('#modalTicketTujuan').text(singkatan[t.tujuan] || t.tujuan);
                $('#modalTicketJam').text(t.jam + ' WIB');
                $('#modalTicketMetode').text(t.metode);

                // Generate Barcode Asli
                JsBarcode("#barcodeElement", t.kode, {
                    format: "CODE128",
                    lineColor: "#1E3A8A",
                    width: 2,
                    height: 50,
                    displayValue: false
                });

                $('#ticketDetailModal').css('display', 'flex');
            }
        });

        $('#closeTicketModalBtn, #finishTicketBtn').on('click', () => {
            $('#ticketDetailModal').hide();
        });

        // Jalankan saat halaman dimuat
        loadHistory();
