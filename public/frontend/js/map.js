const slider = $(".wrapperSlider");
const cardRoute = $(".card");
const koordinat = $(".Koordinat");
const btn = $(".back_to_location");
const tes = $(".tes");

const map = L.map($(".map")[0]).setView([0,0], 5);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '© OpenStreetMap' 
}).addTo(map);

let route = null;
let marker, circle; 
let latitude = null;
let longitude = null;
let latKampusLayo = -3.2185;
let lngKampusLayo = 104.6492;
let latKampusBukit = -2.9852; 
let lngKampusBukit = 104.7321;
let isFirstLoad = true;




// 2. Gunakan watchPosition untuk melacak GPS secara live dan efisien
if (navigator.geolocation) {
    navigator.geolocation.watchPosition(
        (Position) => {
            latitude = Position.coords.latitude;
            longitude = Position.coords.longitude;
            const akurasi = Position.coords.accuracy;

            // Update posisi marker jika sudah ada, atau buat baru jika belum
            if (marker) {
                marker.setLatLng([latitude, longitude]);
            } else {
                marker = L.marker([latitude, longitude]).addTo(map).bindPopup("Lokasi Anda Sekarang");
            }

            // Update posisi & radius circle jika sudah ada, atau buat baru jika belum
            if (circle) {
                circle.setLatLng([latitude, longitude]);
                circle.setRadius(akurasi);
            } else {
                circle = L.circle([latitude, longitude], { radius: akurasi }).addTo(map);
            }

            if (isFirstLoad) {
                map.flyTo([latitude, longitude], 17, { duration: 1.5 });
                isFirstLoad = false;
            }
            
            // Render ulang koordinat
            $(".Koordinat").html(`
                <div class="flex items-center justify-center gap-6 text-xs font-semibold text-slate-700">
                    <span><i class="fa-solid fa-location-crosshairs text-amber-500 mr-1.5"></i> Lat: <strong class="font-mono">${latitude.toFixed(5)}</strong></span>
                    <span><i class="fa-solid fa-location-crosshairs text-amber-500 mr-1.5"></i> Lng: <strong class="font-mono">${longitude.toFixed(5)}</strong></span>
                </div>
            `);
        }, 
        (eror) => {
            console.error(eror);
            $(".Koordinat").html(`<p class="text-xs text-rose-500 font-medium">Gagal mendeteksi lokasi GPS.</p>`);
        }, 
        {
            enableHighAccuracy: true,
            maximumAge: 1000, // Menggunakan cache data maksimal 1 detik
            timeout: 5000     // Batas waktu timeout perolehan sinyal
        }
    );
}

$(".back_to_location").on("click", () => {
    if (latitude != null && longitude != null) {
        map.flyTo([latitude, longitude], 17, { duration: 1.5 });
    } else {
        alert("GPS belum ditemukan atau izin lokasi ditolak.");
    }
});

function routes(latTujuan, lngTujuan, warna) {
    if (latitude != null && longitude != null) {
        if (route) map.removeControl(route);

        route = L.Routing.control({
            waypoints: [
                L.latLng(latitude, longitude),
                L.latLng(latTujuan, lngTujuan)
            ],
            addWaypoints: false,
            show: false,
            routeWhileDragging: true,
            lineOptions: {
                styles: [
                    { color: warna, weight: 6, opacity: 0.8 }
                ]
            }
        }).addTo(map);
    } else {
        alert("Menunggu posisi GPS Anda terkunci sebelum merencanakan rute.");
    }
}

$(cardRoute[0]).on("click", () => {
    slider.removeClass("translate-x-full").addClass("translate-x-0");
    routes(latKampusLayo, lngKampusLayo, "#1E3A8A");
});

$(cardRoute[1]).on("click", () => {
    slider.removeClass("translate-x-0").addClass("translate-x-full");
    routes(latKampusBukit, lngKampusBukit, "#1E3A8A");
});