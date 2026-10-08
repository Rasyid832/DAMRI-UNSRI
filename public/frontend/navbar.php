<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php';?>
    <style>
        .menu{
            cursor : pointer;
        }
    </style>
</head>
<body>
    <nav class="navbar h-[80px] flex justify-between items-center bg-blue-900">
            <div class="logoKontainer flex justify-center items-center gap-[10px] ml-[40px]">
                <img src = "../images/logo_damri.png" class="h-[20px]">
                <div class="h-[30px] w-[2px] bg-[white]"></div>
                <h1 class="txtLogo text-[25px] font-[700] text-white">DAMRI<span class="text-yellow-500 ml-[10px]">UNSRI</span></h1>
            </div>
            <div class="menuLogin flex gap-[40px] mr-[40px] justify-center items-center">
                <div class="menuKontainer">
                     <ul class="ul flex justify-center items-center gap-[35px]">
                        <li class="menu text-[18px] text-white font-[500] transition-all duration-300 
                        hover:text-yellow-500 rounded-[3px] focus:text-yellow-500 border-b-[0px] border-[transparent] focus:border-b-[2px] focus:border-b-yellow-500" tabindex="0">Beranda</li>
                        <li class="menu text-[18px] text-white font-[500] transition-all duration-300 
                        hover:text-yellow-500 rounded-[3px] focus:text-yellow-500 border-b-[0px] border-[transparent] focus:border-b-[2px] focus:border-b-yellow-500" tabindex="0">Live lokasi</li>
                        <li class="menu text-[18px] text-white font-[500] transition-all duration-300 
                        hover:text-yellow-500 rounded-[3px] text-white focus:text-yellow-500 border-b-[0px] border-[transparent] focus:border-b-[2px] focus:border-b-yellow-500" tabindex="0">Pesan Tiket</li>
                        <li class="menu text-[18px] text-white font-[500] transition-all duration-300 
                        hover:text-yellow-500 rounded-[3px] focus:text-yellow-500 border-b-[0px] border-[transparent] focus:border-b-[2px] focus:border-b-yellow-500" tabindex="0">Jadwal</li>
                     </ul>
                </div>
                <div class="login flex justify-center items-center mr-[20px]">
                 <button class="btnLogin px-5 h-[38px] text-white text-[18px] rounded-xl flex items-center justify-center gap-2 transition-all duration-300 hover:bg-yellow-500 hover:text-white" tabindex="0">
                <i class="fa-solid fa-circle-user text-[25px] text-white"></i>
                <span>Login</span>
                </button>
                </div> 
            </div>
    </nav>

    
</body>
</html>