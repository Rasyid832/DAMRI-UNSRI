<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php';?>
</head>
<body>
    
    <div class="max-w-[1600px] mx-auto min-h-[92vh] flex flex-col lg:flex-row gap-5 rounded-[2.5rem] overflow-hidden">
    
            <aside class="app-sidebar w-full lg:w-72 p-6 flex flex-col justify-between shrink-0 rounded-[2rem]">
                <div>
                    
                    <div class="flex flex-col items-center text-center mb-8 pb-6 border-b border-white/10 pt-2">
    
                        <div class="relative mb-3">
                         
                            <div class="absolute -inset-1.5 bg-gradient-to-tr from-amber-400/50 to-blue-400/50 rounded-full blur-sm opacity-70"></div>
                            
                           
                            <div class="relative w-20 h-20 rounded-full bg-gradient-to-tr from-amber-400 via-amber-500 to-blue-500 p-1 shadow-xl flex items-center justify-center">
                                <div class="w-full h-full bg-damri-navy rounded-full flex items-center justify-center font-black text-amber-400 text-xl tracking-wider shadow-inner">
                                    MR
                                </div>
                            </div>
    
                           
                            <span class="absolute bottom-1 right-1 w-4 h-4 bg-emerald-500 border-2 border-damri-navy rounded-full shadow-md"></span>
                        </div>
    
                   
                        <div>
                            <h3 class="font-black text-base tracking-tight text-white leading-snug">Hi, Rasyid! 👋</h3>
                            <span class="inline-block mt-1 px-3 py-0.5 bg-amber-500/20 text-amber-300 font-bold text-[10px] rounded-full border border-amber-400/30 shadow-sm">
                                Mahasiswa UNSRI
                            </span>
                        </div>
                    </div>
    
                    <nav class="space-y-2">
                        <a href="#dashboard" class="nav-item nav-item-active flex items-center gap-3.5 px-4 py-3 rounded-2xl text-xs font-medium transition-all">
                            <i class="fa-solid fa-house text-base w-5 text-center"></i>
                            <span>Dashboard</span>
                        </a>
                        <a href="#tiket" class="nav-item flex items-center gap-3.5 px-4 py-3 rounded-2xl text-xs font-medium text-slate-200 hover:bg-white/10 transition-all">
                            <i class="fa-solid fa-ticket text-base w-5 text-center"></i>
                            <span>Tiket Saya</span>
                        </a>
                        <a href="#jadwal" class="nav-item flex items-center gap-3.5 px-4 py-3 rounded-2xl text-xs font-medium text-slate-200 hover:bg-white/10 transition-all">
                            <i class="fa-solid fa-bus text-base w-5 text-center"></i>
                            <span>Jadwal Bus</span>
                        </a>
                       
                        <a href="#riwayat" class="nav-item flex items-center gap-3.5 px-4 py-3 rounded-2xl text-xs font-medium text-slate-200 hover:bg-white/10 transition-all">
                            <i class="fa-solid fa-clock-rotate-left text-base w-5 text-center"></i>
                            <span>Riwayat Tiket</span>
                        </a>
                        <a href="#pengaturan" class="nav-item flex items-center gap-3.5 px-4 py-3 rounded-2xl text-xs font-medium text-slate-200 hover:bg-white/10 transition-all">
                            <i class="fa-solid fa-gear text-base w-5 text-center"></i>
                            <span>Pengaturan</span>
                        </a>
                    </nav>
                </div>
    
                <div class="mt-8 pt-6 border-t border-white/10">
                    <div class="p-3.5 rounded-2xl bg-black/20 border border-white/10 flex items-center justify-between">
                        <div class="flex items-center gap-2.5">
                            <i id="theme-icon" class="fa-solid fa-palette text-amber-400 text-sm"></i>
                            <span id="theme-label" class="text-xs font-bold text-white">Normal mode</span>
                        </div>
                       
                        <button id="mode-toggle-btn" class="w-12 h-6 bg-slate-700 rounded-full p-0.5 transition-colors relative focus:outline-none cursor-pointer">
                            <div id="toggle-circle" class="w-5 h-5 bg-amber-400 rounded-full transition-transform transform translate-x-0 shadow-md"></div>
                        </button>
                    </div>
                </div>
            </aside>
</body>
</html>
