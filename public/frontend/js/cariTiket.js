$(document).ready(function () {
    // Bangun objek HALTE secara dinamis dari atribut data-short di dropdown #asalSelect
    const HALTE = {};
    $('#asalSelect option').each(function () {
        HALTE[this.value] = $(this).data('short');
    });
    const shortName = (v) => HALTE[v] || v;

    const TAB_ACTIVE   = ['bg-navy', 'text-white'];
    const TAB_IDLE     = ['text-slate-600', 'hover:bg-slate-100'];
    const SEAT_IDLE    = 'bg-emerald-50 text-emerald-800 border-emerald-300 hover:bg-emerald-100';
    const SEAT_ACTIVE  = 'bg-amber-500 text-slate-900 border-amber-600 hover:bg-amber-400';

    let selectedBus = null;
    let selectedSeatNum = '';
    let activeStatusFilter = 'all'; 

    function openModal(sel)  { $(sel).fadeIn(200).css('display', 'flex'); $('body').addClass('overflow-hidden'); }
    function closeModal(sel) { $(sel).fadeOut(150); $('body').removeClass('overflow-hidden'); }

    function syncRouteOptions(changed) {
        const $asal = $('#asalSelect');
        const $tujuan = $('#tujuanSelect');

        if ($asal.val() === $tujuan.val()) {
            const $other = changed === 'asal' ? $tujuan : $asal;
            const pivot = changed === 'asal' ? $asal.val() : $tujuan.val();
            const alt = $other.find('option').filter(function () { return this.value !== pivot; }).first().val();
            $other.val(alt);
        }

        $tujuan.find('option').prop('disabled', false).filter(function () { return this.value === $asal.val(); }).prop('disabled', true);
        $asal.find('option').prop('disabled', false).filter(function () { return this.value === $tujuan.val(); }).prop('disabled', true);
    }

    function applyAllFilters() {
        const asal = $('#asalSelect').val();
        const tujuan = $('#tujuanSelect').val();
        const jamDipilih = $('#jamInput').val(); 

        const count = { all: 0, tersedia: 0, penuh: 0 };
        let visible = 0;

        $('.bus-card').each(function () {
            const $card = $(this);
            const status = $card.attr('data-status');
            const jamBus = String($card.attr('data-jam')).slice(0, 2);

            const lolosRute = $card.attr('data-asal') === asal && $card.attr('data-tujuan') === tujuan;
            const lolosJam = !jamDipilih || jamBus === jamDipilih;
            const lolosStatus = activeStatusFilter === 'all' || status === activeStatusFilter;

            if (lolosRute && lolosJam) {
                count.all++;
                count[status]++;
            }

            const tampil = lolosRute && lolosJam && lolosStatus;
            $card.toggle(tampil);
            if (tampil) visible++;
        });

        $('.bus-card').removeClass('is-last');
        $('.bus-card:visible').last().addClass('is-last');

        $('.filter-tab').each(function () {
            const f = $(this).data('filter');
            const label = f === 'all' ? 'Semua' : f === 'tersedia' ? 'Tersedia' : 'Penuh';
            $(this).text(`${label} (${count[f]})`);
        });

        const labelStatus = activeStatusFilter === 'tersedia' ? ' tersedia'
                          : activeStatusFilter === 'penuh' ? ' penuh' : '';
        const rentang = jamDipilih ? `berangkat pukul ${jamDipilih}:00 - ${jamDipilih}:59 WIB` : 'semua jam keberangkatan';
        $('#resultTitle').text(`${visible} jadwal bus${labelStatus}`);
        $('#resultSubtitle').text(`${asal} ke ${tujuan}, ${rentang}`);

        $('#emptyStateNotice').remove();
        if (visible === 0) {
            const rute = `${shortName(asal)} ke ${shortName(tujuan)}`;
            const jamTeks = jamDipilih ? ` pada pukul ${jamDipilih}:00 - ${jamDipilih}:59 WIB` : '';
            let judul, pesan;

            if (count.all === 0) {
                judul = 'Tidak ada jadwal';
                pesan = `Belum ada bus ${rute}${jamTeks}. Coba pilih jam lain.`;
            } else if (activeStatusFilter === 'penuh') {
                judul = 'Tidak ada bus yang penuh';
                pesan = `Semua bus ${rute}${jamTeks} masih punya kursi kosong.`;
            } else {
                judul = 'Semua bus sudah penuh';
                pesan = `Tidak ada bus ${rute}${jamTeks} dengan kursi kosong. Coba pilih jam lain.`;
            }

            $('#busListContainer').append(`
                <div id="emptyStateNotice" class="px-6 py-12 text-center">
                    <i class="fa-regular fa-calendar-xmark mb-3 text-3xl text-slate-300"></i>
                    <h3 class="font-semibold text-slate-900">${judul}</h3>
                    <p class="mx-auto mt-1 max-w-sm text-sm text-slate-500">${pesan}</p>
                    <button type="button" id="resetFilterBtn" class="mt-4 h-10 rounded-md border border-slate-300 px-4 text-sm font-medium text-slate-700 hover:bg-slate-50">
                        Reset jam dan status
                    </button>
                </div>
            `);
        }
    }

    function setActiveTab(filter) {
        activeStatusFilter = filter;
        $('.filter-tab')
            .removeClass(TAB_ACTIVE.join(' ')).addClass(TAB_IDLE.join(' '))
            .attr('aria-selected', 'false');
        $(`.filter-tab[data-filter="${filter}"]`)
            .removeClass(TAB_IDLE.join(' ')).addClass(TAB_ACTIVE.join(' '))
            .attr('aria-selected', 'true');
    }

    $('#asalSelect').on('change', function () { syncRouteOptions('asal'); applyAllFilters(); });
    $('#tujuanSelect').on('change', function () { syncRouteOptions('tujuan'); applyAllFilters(); });

    $('#swapRouteBtn').on('click', function () {
        const a = $('#asalSelect').val();
        const t = $('#tujuanSelect').val();
        $('#asalSelect option, #tujuanSelect option').prop('disabled', false);
        $('#asalSelect').val(t);
        $('#tujuanSelect').val(a);
        syncRouteOptions('asal');
        applyAllFilters();
    });

    $('#jamInput').on('change', applyAllFilters);
    $('#searchForm').on('submit', function (e) { e.preventDefault(); applyAllFilters(); });

    $('.filter-tab').on('click', function () {
        setActiveTab($(this).data('filter'));
        applyAllFilters();
    });

    $(document).on('click', '#resetFilterBtn', function () {
        $('#jamInput').val('');
        setActiveTab('all');
        applyAllFilters();
    });

    function resetSeatSelection() {
        selectedSeatNum = '';
        $('.seat-btn').removeClass(SEAT_ACTIVE).addClass(SEAT_IDLE);
        $('#selectedSeatLabel').text('Belum dipilih').removeClass('text-red-600').addClass('text-slate-900');
    }

    $('.btn-pilih-kursi').on('click', function () {
        selectedBus = {
            nama:   $(this).data('bus'),
            asal:   $(this).data('asal'),
            tujuan: $(this).data('tujuan'),
            jam:    $(this).data('jam'),
            harga:  $(this).data('harga')
        };
        resetSeatSelection();

        $('#modalBusName').text(selectedBus.nama);
        $('#modalBusDetail').text(
            `${shortName(selectedBus.asal)} → ${shortName(selectedBus.tujuan)}, ${selectedBus.jam} WIB, ${selectedBus.harga}`
        );
        openModal('#seatModal');
    });

    $('#closeSeatModalBtn').on('click', function () { closeModal('#seatModal'); });

    $('.seat-btn').on('click', function () {
        $('.seat-btn').removeClass(SEAT_ACTIVE).addClass(SEAT_IDLE);
        $(this).removeClass(SEAT_IDLE).addClass(SEAT_ACTIVE);

        selectedSeatNum = $(this).data('seat');
        $('#selectedSeatLabel').text(`Kursi ${selectedSeatNum}`).removeClass('text-red-600').addClass('text-slate-900');
    });

    $('#processPaymentBtn').on('click', function () {
        if (!selectedSeatNum) {
            $('#selectedSeatLabel').text('Pilih kursi dulu').removeClass('text-slate-900').addClass('text-red-600');
            return;
        }

        closeModal('#seatModal');

        const randomCode = 'DMR-' + Math.floor(100000 + Math.random() * 900000);

        $('#ticketCodeText').text(randomCode);
        $('#ticketBus').text(selectedBus.nama);
        $('#ticketAsal').text(selectedBus.asal);
        $('#ticketTujuan').text(selectedBus.tujuan);
        $('#ticketJam').text(selectedBus.jam + ' WIB');
        $('#ticketKursi').text(selectedSeatNum);
        $('#ticketHarga').text(selectedBus.harga);

        openModal('#ticketDetailModal');
    });

    $('#closeTicketModalBtn, #finishTicketBtn').on('click', function () { closeModal('#ticketDetailModal'); });

    $('#seatModal, #ticketDetailModal').on('click', function (e) {
        if (e.target === this) closeModal('#' + this.id);
    });
    $(document).on('keydown', function (e) {
        if (e.key === 'Escape') { closeModal('#seatModal'); closeModal('#ticketDetailModal'); }
    });

    syncRouteOptions('asal');
    setActiveTab('all');
    applyAllFilters();
});