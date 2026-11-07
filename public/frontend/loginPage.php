<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php';?>
    <style>
       
        .overlay-container {
            transition: transform 0.6s ease-in-out;
            transform: translateX(0);
        }
        .overlay {
            transition: transform 0.6s ease-in-out;
            transform: translateX(0);
        }
        .container-box.right-panel-active .overlay-container {
            transform: translateX(-100%);
        }
        .container-box.right-panel-active .overlay {
            transform: translateX(50%);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center bg-[#8C6D73] p-4 sm:p-8">


  <div id="containerBox" class="container-box relative w-full max-w-[1000px] min-h-[600px] bg-[#F3F5F9] rounded-[32px] shadow-2xl overflow-hidden my-auto">
    
  
    <div class="absolute top-0 right-0 w-full md:w-1/2 h-full flex flex-col justify-center px-6 sm:px-12 py-6 z-1">
      <div class="text-center md:text-left mb-[50px] flex flex-col justify-center items-center gap-1.5">
        <h1 class="text-3xl sm:text-[38px] font-bold text-yellow-600 mb-1">SIGN UP</h1>
        <img src="../images/logo_damri.png" class="w-[80px] h-[15px] mr-[5px]">
      </div>

      

      <form action="../backend/auth/register.php" method="POST" class="flex flex-col gap-3">
        <input type="hidden" name="role" value ="mahasiswa" class="roleInput">
        <div class="role relative bg-white flex justify-between items-center p-2 w-[250px] left-[70px] rounded-4xl shadow-xl ">
          <div class="slider absolute bg-yellow-500 w-[50%] h-[100%] left-[0px] rounded-4xl transition-all duration-400 ease-in-out"></div>
          <button type = "button" class="mahasiswa text-[16px] text-black font-[700] left-[10px] relative " name = "Mahasiswa">Mahasiswa</button>
          <button type = "button" class="driver relative right-[30px] text-black font-[700] text-[16px]" name = "Driver">Driver</button>
        </div>

          <div>
            <input type="text" name="username" placeholder="Nama Lengkap" required class="w-full px-5 py-3 rounded-2xl bg-white border border-transparent focus:border-gray-300 text-gray-700 placeholder-gray-400 text-sm outline-none shadow-sm transition">
          </div>
          <div>
            <input type="email" name="email" placeholder="Email" required class="w-full px-5 py-3 rounded-2xl bg-white border border-transparent focus:border-gray-300 text-gray-700 placeholder-gray-400 text-sm outline-none shadow-sm transition">
          </div>
          <div>
            <input type="password" name="password" placeholder="Password" required class="w-full px-5 py-3 rounded-2xl bg-white border border-transparent focus:border-gray-300 text-gray-700 placeholder-gray-400 text-sm outline-none shadow-sm transition">
          </div>

          <button type="submit" name = "submit" class="w-full py-3.5 bg-yellow-600 hover:bg-yellow-700 text-white font-medium rounded-2xl shadow-lg transition duration-200 mt-2">
            Sign Up
          </button>
      </form>

      <div class="relative my-4 flex items-center justify-center">
        <div class="border-t border-gray-300 w-full"></div>
        <span class="bg-[#F3F5F9] px-4 text-xs text-gray-400 absolute">Or register with</span>
      </div>

      <div class="flex justify-center items-center gap-4">
        <button class="w-14 h-10 bg-white rounded-2xl flex items-center justify-center shadow-sm border border-gray-100 hover:shadow-xl transition">
          <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google" class="w-5 h-5">
        </button>
        <button class="w-14 h-10 bg-white rounded-2xl flex items-center justify-center shadow-sm border border-gray-100 hover:shadow-xl transition">
          <i class="fa-brands fa-apple text-xl text-black"></i>
        </button>
        <button class="w-14 h-10 bg-white rounded-2xl flex items-center justify-center shadow-sm border border-gray-100 hover:shadow-xl transition">
          <i class="fa-brands fa-facebook text-xl text-[#1877F2]"></i>
        </button>
      </div>
    </div>


    <div class="absolute top-0 left-0 w-full md:w-1/2 h-full flex flex-col justify-center px-6 sm:px-12 py-6 z-2">
      <div class="text-center md:text-left mb-6 flex flex-col mb-[70px] justify-center items-center gap-1.5">
        <h1 class="text-3xl sm:text-[38px] font-bold text-yellow-600 mb-1">SIGN IN</h1>
        <img src="../images/logo_damri.png" class="w-[80px] h-[15px]">
      </div>

      <form action="../backend/auth/login.php" method="POST" class="flex flex-col gap-3">
        <div>
          <input type="email" name="email" placeholder="Email" required class="w-full px-5 py-3 rounded-2xl bg-white border border-transparent focus:border-gray-300 text-gray-700 placeholder-gray-400 text-sm outline-none shadow-sm transition">
        </div>
        <div class="relative">
          <input type="password" name="password" placeholder="Password" required class="w-full px-5 py-3 rounded-2xl bg-white border border-transparent focus:border-gray-300 text-gray-700 placeholder-gray-400 text-sm outline-none shadow-sm transition pr-12">
          <button type="button" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
            <i class="fa-regular fa-eye-slash"></i>
          </button>
        </div>

        <div class="text-right">
          <a href="#" class="text-xs text-gray-400 hover:text-gray-600 transition font-medium">Recovery Password</a>
        </div>

        <button type="submit" class="w-full py-3.5 bg-blue-700 hover:bg-blue-800 text-white font-medium rounded-2xl shadow-lg shadow-[#8C6D73]/30 transition duration-200 mt-2">
          Sign In
        </button>
      </form>

      <div class="relative my-4 flex items-center justify-center">
        <div class="border-t border-gray-300 w-full"></div>
        <span class="bg-[#F3F5F9] px-4 text-xs text-gray-400 absolute">Or continue with</span>
      </div>

      <div class="flex justify-center items-center gap-4">
        <button class="w-14 h-10 bg-white rounded-2xl flex items-center justify-center shadow-sm border border-gray-100 hover:shadow-xl transition">
          <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google" class="w-5 h-5">
        </button>
        <button class="w-14 h-10 bg-white rounded-2xl flex items-center justify-center shadow-sm border border-gray-100 hover:shadow-xl transition">
          <i class="fa-brands fa-apple text-xl text-black"></i>
        </button>
        <button class="w-14 h-10 bg-white rounded-2xl flex items-center justify-center shadow-sm border border-gray-100 hover:shadow-xl transition">
          <i class="fa-brands fa-facebook text-xl text-[#1877F2]"></i>
        </button>
      </div>
    </div>


    <div class="overlay-container absolute top-0 left-1/2 w-1/2 h-full overflow-hidden z-10 hidden md:block">
      

      <div class="overlay relative -left-full h-full w-[200%] bg-cover bg-center text-white" style="background-image: url('../images/damribus.jpg');">
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-black/30"></div>

     
        <div class="overlay-panel overlay-right absolute right-0 top-0 w-1/2 h-full flex flex-col justify-center items-center p-8 text-center">
          <h2 class="text-3xl font-bold mb-4">Belum Punya Akun?</h2>
          <p class="text-sm text-gray-200 mb-8 max-w-xs">Silahkan daftar kan akun mu terlebih dahulu.</p>
          <button id="signUpBtn" class="px-8 py-3 border-2 border-white text-white font-semibold rounded-2xl hover:bg-white hover:text-black transition duration-300">
            Sign Up
          </button>
        </div>

      
        <div class="overlay-panel overlay-left absolute left-0 top-0 w-1/2 h-full flex flex-col justify-center items-center p-8 text-center">
          <h2 class="text-3xl font-bold mb-4">Sudah Punya Akun?</h2>
          <p class="text-sm text-gray-200 mb-8 max-w-xs">Silakan login dan nikmati perjalanan anda bersama DAMRI.</p>
          <button id="signInBtn" class="px-8 py-3 border-2 border-white text-white font-semibold rounded-2xl hover:bg-white hover:text-black transition duration-300">
            Sign In
          </button>
        </div>

      </div>

    </div>

  </div>
  <script src = "js/login.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <?php if (!empty($error)): ?>
  <script>
    Swal.fire({
      icon: 'error',
      title: 'Login Gagal',
      text: <?= json_encode($error) ?>,
      confirmButtonText: 'OK'
    });
  </script>
  <?php endif; ?>

</body>
</html>