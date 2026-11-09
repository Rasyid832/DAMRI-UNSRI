<!DOCTYPE html>
<html lang="id">
<head>
    <?php include 'head.php';?>
    <!-- Leaflet CSS & JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <!-- Leaflet Routing Machine CSS & JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

</head>
<body class="bg-[#F0F4F8] min-h-screen flex flex-col font-sans text-slate-700">

    
    <header class="bg-damri-navy text-white px-4 py-4 shadow-md flex items-center justify-between z-10">
        <div class="flex items-center gap-3">
            <a href="cariTiket.php" class="text-damri-navy hover:text-white"><i class="fa-solid fa-arrow-left text-lg"></i></a>
            <div>
                <h1 id="headerTitle" class="font-semibold text-sm sm:text-base">Detail Perjalanan Bus</h1>
                <p id="routeSub" class="text-xs text-blue-200">Memuat rute perjalanan...</p>
            </div>
        </div>
        <span id="busStatusBadge" class="bg-slate-400 text-white text-xs px-3 py-1 rounded-full font-medium shadow-sm">Menghubungkan GPS...</span>
    </header>

    <div id="map" class="flex-1 w-full h-[85vh] relative z-0"></div>

   
    <script>
        $(document).ready(function() {
            // 1. Ambil Parameter dari URL (yang dikirim dari halaman cari tiket)
            const urlParams = new URLSearchParams(window.location.search);
            const asal = urlParams.get('asal') || 'Halte Unsri Bukit';
            const tujuan = urlParams.get('tujuan') || 'Terminal Unsri Indralaya';
            const jam = urlParams.get('jam') || '08:00';

            // Tampilkan info rute di header
            $('#headerTitle').text(`${asal} → ${tujuan}`);
            $('#routeSub').text(`Jadwal Berangkat: ${jam} WIB | Rute Aktif`);

            // 2. Tentukan koordinat titik awal & tujuan untuk membuat garis rute (Routing Machine)
            // Koordinat Dummy Kampus Bukit (Palembang) & Indralaya
            const koordinatBukit = L.latLng(-2.9761, 104.7455); 
            const koordinatIndralaya = L.latLng(-3.2185, 104.6502);

            let titikAsal = asal.includes('Bukit') ? koordinatBukit : koordinatIndralaya;
            let titikTujuan = tujuan.includes('Bukit') ? koordinatBukit : koordinatIndralaya;

            // 3. Inisialisasi Peta Leaflet
            const map = L.map('map').setView([-3.0973, 104.6978], 13);

            L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
                maxZoom: 19,
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            // Tambahkan Garis Rute Perjalanan (Routing Machine)
            L.Routing.control({
                waypoints: [titikAsal, titikTujuan],
                routeWhileDragging: false,
                addWaypoints: false,
                draggableWaypoints: false,
                fitSelectedRoutes: true,
                show: false // Menyembunyikan kotak petunjuk teks rute di pojok peta agar bersih
            }).addTo(map);

            let busMarker;
            let accuracyCircle;
            let firstReload = true;

            // 4. Endpoint Firebase RTDB milikmu
            const firebaseURL = "https://bis-tracking-default-rtdb.asia-southeast1.firebasedatabase.app/lokasi.json";

            // 5. Fungsi Ambil Lokasi Real-Time Bus dari Firebase
            async function ambilLokasiBus() {
                try {
                    let data = await $.ajax({
                        url: firebaseURL,
                        type: "GET",
                        dataType: "json"
                    });
                    
                    if(data && data.latitude && data.longitude){
                        const currentLatLng = [data.latitude, data.longitude];

                        // Buat atau Update Marker Posisi Bus
                        if(busMarker){
                            busMarker.setLatLng(currentLatLng);   
                        } else {
                            busMarker = L.marker(currentLatLng).addTo(map)
                                .bindPopup("<b>Bus DAMRI Unsri</b><br>Status: Dalam Perjalanan").openPopup();
                        }

                        // Buat atau Update Lingkaran Akurasi Sinyal GPS
                        if(accuracyCircle){
                            accuracyCircle.setLatLng(currentLatLng);
                            accuracyCircle.setRadius(data.akurasi || 20);
                        } else {
                            accuracyCircle = L.circle(currentLatLng, {
                                radius: data.akurasi || 20,
                                color: '#1E3A8A',
                                fillColor: '#3B82F6',
                                fillOpacity: 0.2
                            }).addTo(map);
                        }

                        // Fokus otomatis ke posisi bus saat pertama kali data masuk
                        if(firstReload === true){
                            map.setView(currentLatLng, 15);
                            firstReload = false;
                        }

                        $('#busStatusBadge').text('Bus Aktif (Live GPS)').removeClass('bg-slate-400 bg-red-500').addClass('bg-emerald-500');
                    }
                } catch (error) {
                    $('#busStatusBadge').text('Gagal Terhubung GPS').removeClass('bg-emerald-500 bg-slate-400').addClass('bg-red-500');
                    console.error("Gagal terhubung ke Firebase:", error);
                }
            }

            // Polling posisi bus setiap 3 detik
            setInterval(ambilLokasiBus, 3000);
            ambilLokasiBus(); // Panggil sekali di awal
        });
    </script>
</body>
</html>