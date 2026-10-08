<?php $pageTitle = 'DAMRI UNSRI'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <?php include 'head.php'; ?>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
</head>

    
<body class= "bg-black">
    <navbar class="nav w-[100%] h-[100px] flex justify-center items-center  mt-[20px]">
        <div class="wrapper w-[90%] h-[100%] bg-blue-900 flex justify-center items-center">
            <h1 class="judul text-[grey] [text-shadow:2px_5px_5px_black] font-[700] text-[31px]">Real Time Map</h1>
        </div>
    </navbar>
    <section class ="section flex flex-col justify-center items-center w-[100%] h-[650px] 
    bg-blue-800 mt-[40px] gap-[10px]">
        <div class="map w-[40%] h-[56%] relative">
            <button class="back_to_location absolute z-[1000] bg-[transparent] border-[1px] border-[black] text-[black] rounded-xl shadow-md 
            shadow-[black] p-[7px]  right-4 top-5 transition duration-300 transform hover:bg-black hover:text-[white] hover:scale-110 hover:shadow-xl hover:shadow-[black] hover:border-white">Back</button>
        </div>
        <div class="Koordinat h-[7%] w-[40%] bg-white"></div>
        <div class="Route flex flex-col justify-center  items-center w-[480px] h-[15%] text-[15px] gap-[8px]">
            <h1 class="txt-route text-white">ROUTE PERJALANAN DAMRI UNSRI</h1>
            <div class="Perjalanan flex justify-center items-center relative border-[1px] border-white bg-blue-900 w-[100%]">
                <div class="wrapperSlider w-[50%] bg-[orange]  h-[99%] absolute flex left-0 justify-center items-center  gap-[20px] transition-all duration-400 "></div>
                    <div class="card w-1/2 text-[12px] border-[1px] relative border-black p-[5px] z-10 text-white ">UNSRI INDRALAYA TO UNSRI BUKIT</div>
                    <div class="card w-1/2 text-[12px] border-[1px] relative border-black p-[5px] z-10 text-white ">UNSRI BUKIT TO UNSRI INDRALAYA</div>
            </div>
        </div>
    </section>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
    <script src = "js/map.js"></script>
</body>
</html> 