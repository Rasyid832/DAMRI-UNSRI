// 1. Logika Update Badge Jam Otomatis
function updateStatusJadwal() {
    const sekarang = new Date();
    const menitSekarang = (sekarang.getHours() * 60) + sekarang.getMinutes();

    let busBerikutnyaFound = false;

    // Ambil elemen jadwal yang sedang terlihat saja
    document.querySelectorAll('.jadwal-item').forEach(item => {
        const jamStr = item.getAttribute('data-time'); 
        const [jam, menit] = jamStr.split(':').map(Number);
        const menitJadwal = (jam * 60) + menit;

        const selisih = menitJadwal - menitSekarang;
        const badge = item.querySelector('.status-badge');
        const dot = item.querySelector('.dot');

        badge.classList.remove('hidden', 'bg-amber-500', 'text-white', 'animate-pulse', 'bg-blue-100', 'text-damri-navy', 'bg-slate-100', 'text-slate-400');
        dot.className = 'dot absolute -left-[9px] top-4 w-4 h-4 rounded-full border-2 border-white transition-all';

        if (selisih > 0 && selisih <= 30) {
            badge.textContent = 'SEGERA BERANGKAT';
            badge.classList.add('inline-block', 'bg-amber-500', 'text-white', 'animate-pulse');
            dot.classList.add('bg-amber-500', 'ring-4', 'ring-amber-100');
            busBerikutnyaFound = true;
        } 
        else if (selisih > 30 && !busBerikutnyaFound) {
            badge.textContent = 'Bus Berikutnya';
            badge.classList.add('inline-block', 'bg-blue-100', 'text-damri-navy');
            dot.classList.add('bg-damri-navy');
            busBerikutnyaFound = true;
        } 
        else if (selisih <= 0) {
            badge.textContent = 'Berangkat';
            badge.classList.add('inline-block', 'bg-slate-100', 'text-slate-400');
            dot.classList.add('bg-slate-300');
        } 
        else {
            badge.classList.add('hidden');
            dot.classList.add('bg-slate-300');
        }
    });
}

// 2. Logika Pergeseran Slider Tab Rute & Switch Content
document.addEventListener('DOMContentLoaded', () => {
    const tabBukit = document.getElementById('tabBukit');
    const tabIndralaya = document.getElementById('tabIndralaya');
    const tabIndicator = document.getElementById('tabIndicator');
    const timelineBukit = document.getElementById('timelineBukit');
    const timelineIndralaya = document.getElementById('timelineIndralaya');

    if (tabBukit && tabIndralaya) {
        // Klik Rute Bukit -> Indralaya
        tabBukit.addEventListener('click', () => {
            // Geser background biru ke kiri
            tabIndicator.style.transform = 'translateX(0%)';
            
            // Ubah warna teks tombol
            tabBukit.classList.remove('text-slate-500', 'hover:text-slate-700');
            tabBukit.classList.add('text-white');

            tabIndralaya.classList.remove('text-white');
            tabIndralaya.classList.add('text-slate-500', 'hover:text-slate-700');

            // Tampilkan timeline Bukit & sembunyikan Indralaya
            timelineBukit.classList.remove('hidden');
            timelineIndralaya.classList.add('hidden');

            // Hitung ulang status jam
            updateStatusJadwal();
        });

        // Klik Rute Indralaya -> Bukit
        tabIndralaya.addEventListener('click', () => {
            // Geser background biru ke kanan
            tabIndicator.style.transform = 'translateX(calc(100% + 0.375rem))';

            // Ubah warna teks tombol
            tabIndralaya.classList.remove('text-slate-500', 'hover:text-slate-700');
            tabIndralaya.classList.add('text-white');

            tabBukit.classList.remove('text-white');
            tabBukit.classList.add('text-slate-500', 'hover:text-slate-700');

            // Tampilkan timeline Indralaya & sembunyikan Bukit
            timelineIndralaya.classList.remove('hidden');
            timelineBukit.classList.add('hidden');

            // Hitung ulang status jam
            updateStatusJadwal();
        });
    }

    // Jalankan awal & perbarui setiap 1 menit
    updateStatusJadwal();
    setInterval(updateStatusJadwal, 60000);
});