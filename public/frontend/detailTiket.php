<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Tracking Perjalanan - DAMRI UNSRI</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Leaflet CSS & JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <!-- Leaflet Routing Machine CSS & JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: { navy: { DEFAULT: '#1E3A8A', dark: '#172554' } }
                }
            }
        };
    </script>
</head>
<body class="bg-[#F0F4F8] min-h-screen flex flex-col font-sans text-slate-700">

    <!-- Header Informasi Rute -->
    <header class="bg-navy text-white px-4 py-4 shadow-md flex items-center justify-between z-10">
        <div class="flex items-center gap-3">
            <a href="cari-tiket.html" class="text-blue-100 hover:text-white"><i class="fa-solid fa-arrow-left text-lg"></i></a>
            <div>
                <h1 id="headerTitle" class="font-semibold text-sm sm:text-base">Detail Perjalanan Bus</h1>
                <p id="routeSub" class="text-xs text-blue-200">Memuat rute perjalanan...</p>
            </div>
        </div>
        <span id="busStatusBadge" class="bg-slate-400 text-white text-xs px-3 py-1 rounded-full font-medium shadow-sm">Menghubungkan GPS...</span>
    </header>

    <div id="map" class="flex-1 w-full h-[85vh] relative z-0"></div>

    <!-- Script Utama Peta & Firebase -->
    <script src = "js/cariTiket.js">
       
    </script>
</body>
</html>