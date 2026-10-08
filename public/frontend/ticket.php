<?php $pageTitle = 'DAMRI UNSRI'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <?php include 'head.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jsbarcode/3.12.3/JsBarcode.all.min.js"></script>
</head>
<body class="bg-slate-900 min-h-screen flex flex-col justify-center items-center p-4">


    
    <div class=" mainKontainer relative w-full max-w-4xl bg-white rounded-2xl shadow-2xl overflow-hidden flex flex-col md:flex-row border border-slate-200"></div>
     <div class="btnKontainer flex gap-[20px]">
         <button class="klikIndralya relative z-100 mt-6 bg-yellow-500 hover:bg-yellow-400 text-slate-900 font-bold py-3 px-8 rounded-full shadow-lg transition-all transform hover:scale-105 active:scale-95 flex items-center space-x-2">
             <i class="fa-solid fa-print"></i>
             <span>Beli Tiket menuju Unsri Bukit</span>
         </button>
           <button class="klikPlg relative z-100 mt-6 bg-yellow-500 hover:bg-yellow-400 text-slate-900 font-bold py-3 px-8 rounded-full shadow-lg transition-all transform hover:scale-105 active:scale-95 flex items-center space-x-2">
             <i class="fa-solid fa-print"></i>
             <span>Beli Tiket meunuju Unsri Indralaya</span>
         </button>
     </div>

    <script src="js/ticket.js"></script>
</body>
</html>