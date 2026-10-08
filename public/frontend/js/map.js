
const slider = $(".wrapperSlider");
const cardRoute = $(".card");
const koordinat = $(".Koordinat");
const btn = $(".back_to_location");

const map = L.map($(".map")[0]).setView([0,0],5);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png',{
    maxZoom : 19,
    attribution : '© OpenStreetMap' 
}).addTo(map);

let route = null;
let marker , circle; 
let latitude = null;
let longitude = null;
let latKampusLayo = -3.2185;
let lngKampusLayo = 104.6492;
let latKampusBukit = -2.9852; 
let lngKampusBukit = 104.7321;
let isFirstLoad = true;



if(navigator.geolocation){
    navigator.geolocation.getCurrentPosition(
        (Position)=>{
             latitude = Position.coords.latitude;
             longitude = Position.coords.longitude;
             const akurasi = Position.coords.accuracy;

            if(marker) map.removeLayer(marker);
            if(circle) map.removeLayer(circle);

           marker = L.marker([latitude,longitude]).addTo(map).bindPopup("Your Location");
           circle = L.circle([latitude,longitude],{radius : akurasi}).addTo(map);

           if(isFirstLoad){
               map.flyTo([latitude,longitude],18,{duration : 1.5});
               isFirstLoad = false;
           }
            
              $(".Koordinat").html(`
                <p class = "text-black">Latitude = ${latitude}</p>
                <p class= "text-black">Longitude = ${longitude}</p>
                `);
 

        } ,(eror)=>{
            console.log(eror);
        },{
            enableHighAccuracy : true
        }
    )
}



$(".back_to_location").on("click",()=>{
    if(latitude != null && longitude != null){
        map.flyTo([latitude,longitude],19,{duration : 1.5});
    }else{
        alert("gps tidak di temukan");
    }
});

const btnIndralaya = cardRoute[0];
const btnBukit = cardRoute[1];


function routes(latTujuan,lngTujuan, warna){
    if(latitude!= null && longitude != null){
        if(route) map.removeControl(route);

        route = L.Routing.control({
            waypoints : [
                L.latLng(latitude,longitude),
                L.latLng(latTujuan,lngTujuan)
            ],
            addWaypoints:false,
            show : false,
            routeWhileDragging : true,
            lineOptions : {
              styles :  [
                    {color : warna,weight : 6}
                ]
            }
        }).addTo(map);
    }
}

$(cardRoute[0]).on("click",()=>{
    slider.removeClass("translate-x-full");
    slider.addClass("translate-x-0");
    routes(latKampusLayo,lngKampusLayo,"blue");
})

$(cardRoute[1]).on("click",()=>{
    slider.removeClass("translate-x-0")
    slider.addClass("translate-x-full");
    routes(latKampusBukit,lngKampusBukit,"blue");
})

