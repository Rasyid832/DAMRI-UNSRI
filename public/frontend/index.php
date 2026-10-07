<?php $pageTitle = 'DAMRI UNSRI'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <?php include 'head.php'; ?>
</head>
<body class="bg-slate-900 text-white">
    <?php include 'navbar.php'; ?>

    <main class="max-w-4xl mx-auto text-center py-24 px-4">
        <h1 class="text-4xl font-extrabold mb-4">DAMRI <span class="text-yellow-500">UNSRI</span></h1>
        <p class="mb-8 text-slate-300">Pantau bus dan pesan tiket menuju kampus Unsri.</p>
        <div class="flex justify-center gap-4">
            <a href="map.php" class="bg-yellow-500 text-slate-900 font-bold py-3 px-8 rounded-full">Lihat Peta</a>
            <a href="ticket.php" class="bg-white text-slate-900 font-bold py-3 px-8 rounded-full">Beli Tiket</a>
        </div>
    </main>
</body>
</html>