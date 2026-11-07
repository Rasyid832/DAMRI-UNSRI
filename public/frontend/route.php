<?php
$haltes = [
    'Halte Unsri Bukit'        => 'Bukit',
    'Terminal Unsri Indralaya' => 'Indralaya',
];

$jamMulai   = 6;
$jamSelesai = 17;

$kapasitas = 40;

$BKT  = 'Halte Unsri Bukit';
$IDL  = 'Terminal Unsri Indralaya';
$RUN  = ['status' => 'Dalam perjalanan',       'icon_color' => 'text-emerald-500'];
$WAIT = ['status' => 'Menunggu keberangkatan', 'icon_color' => 'text-slate-400'];

$buses = [
    // ---- Bukit -> Indralaya ----
    ['asal' => $BKT, 'tujuan' => $IDL, 'jam' => '06:00', 'tiba' => '06:45', 'sisa' => 0,  'durasi' => 45, 'via' => 'Via Tol Palindra', 'harga' => 15000] + $RUN,
    ['asal' => $BKT, 'tujuan' => $IDL, 'jam' => '06:10', 'tiba' => '06:55', 'sisa' => 11, 'durasi' => 45, 'via' => 'Via Tol Palindra', 'harga' => 15000] + $RUN,
    ['asal' => $BKT, 'tujuan' => $IDL, 'jam' => '07:00', 'tiba' => '07:45', 'sisa' => 8,  'durasi' => 45, 'via' => 'Via Tol Palindra', 'harga' => 15000] + $RUN,
    ['asal' => $BKT, 'tujuan' => $IDL, 'jam' => '08:00', 'tiba' => '08:45', 'sisa' => 15, 'durasi' => 45, 'via' => 'Via Tol Palindra', 'harga' => 15000] + $WAIT,
    ['asal' => $BKT, 'tujuan' => $IDL, 'jam' => '09:00', 'tiba' => '09:45', 'sisa' => 28, 'durasi' => 45, 'via' => 'Via Tol Palindra', 'harga' => 15000] + $WAIT,
    ['asal' => $BKT, 'tujuan' => $IDL, 'jam' => '10:00', 'tiba' => '10:45', 'sisa' => 40, 'durasi' => 45, 'via' => 'Via Tol Palindra', 'harga' => 15000] + $WAIT,
    ['asal' => $BKT, 'tujuan' => $IDL, 'jam' => '11:00', 'tiba' => '11:45', 'sisa' => 40, 'durasi' => 45, 'via' => 'Via Tol Palindra', 'harga' => 15000] + $WAIT,
    ['asal' => $BKT, 'tujuan' => $IDL, 'jam' => '13:00', 'tiba' => '13:45', 'sisa' => 32, 'durasi' => 45, 'via' => 'Via Tol Palindra', 'harga' => 15000] + $WAIT,
    ['asal' => $BKT, 'tujuan' => $IDL, 'jam' => '14:00', 'tiba' => '14:45', 'sisa' => 10, 'durasi' => 45, 'via' => 'Via Tol Palindra', 'harga' => 15000] + $WAIT,
    ['asal' => $BKT, 'tujuan' => $IDL, 'jam' => '15:00', 'tiba' => '15:45', 'sisa' => 40, 'durasi' => 45, 'via' => 'Via Tol Palindra', 'harga' => 15000] + $WAIT,
    ['asal' => $BKT, 'tujuan' => $IDL, 'jam' => '16:30', 'tiba' => '17:15', 'sisa' => 40, 'durasi' => 45, 'via' => 'Via Tol Palindra', 'harga' => 15000] + $WAIT,

    // ---- Indralaya -> Bukit ----
    ['asal' => $IDL, 'tujuan' => $BKT, 'jam' => '06:30', 'tiba' => '07:15', 'sisa' => 0,  'durasi' => 45, 'via' => 'Via Tol Palindra', 'harga' => 15000] + $RUN,
    ['asal' => $IDL, 'tujuan' => $BKT, 'jam' => '07:30', 'tiba' => '08:15', 'sisa' => 12, 'durasi' => 45, 'via' => 'Via Tol Palindra', 'harga' => 15000] + $WAIT,
    ['asal' => $IDL, 'tujuan' => $BKT, 'jam' => '08:30', 'tiba' => '09:15', 'sisa' => 25, 'durasi' => 45, 'via' => 'Via Tol Palindra', 'harga' => 15000] + $WAIT,
    ['asal' => $IDL, 'tujuan' => $BKT, 'jam' => '12:00', 'tiba' => '12:45', 'sisa' => 0,  'durasi' => 45, 'via' => 'Via Tol Palindra', 'harga' => 15000] + $WAIT,
    ['asal' => $IDL, 'tujuan' => $BKT, 'jam' => '13:30', 'tiba' => '14:15', 'sisa' => 33, 'durasi' => 45, 'via' => 'Via Tol Palindra', 'harga' => 15000] + $WAIT,
    ['asal' => $IDL, 'tujuan' => $BKT, 'jam' => '15:30', 'tiba' => '16:15', 'sisa' => 9,  'durasi' => 45, 'via' => 'Via Tol Palindra', 'harga' => 15000] + $WAIT,
    ['asal' => $IDL, 'tujuan' => $BKT, 'jam' => '17:00', 'tiba' => '17:45', 'sisa' => 40, 'durasi' => 45, 'via' => 'Via Tol Palindra', 'harga' => 15000] + $WAIT,
];

usort($buses, fn($a, $b) => strcmp($a['jam'], $b['jam']));


$seatRows = [
    ['1A', '1B', null, '1C', '#Pintu'],
    ['2A', '2B', null, '#2C', '2D'],
    ['3A', '3B', null, '3C', '3D'],
    ['4A', '#4B', null, '4C', '4D'],
    ['5A', '5B', null, '5C', '5D'],
    ['6A', '6B', null, '6C', '#6D'],
    ['7A', '7B', null, '7C', '7D'],
    ['8A', '8B', null, '8C', '8D'],
    ['9A', '9B', null, '9C', '9D'],
    ['10A', '10B', '10C', '10D', '10E'],
];

function e($s) { return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }
function rupiah($n) { return 'Rp ' . number_format($n, 0, ',', '.'); }

$haltePendek = $haltes;
$halteList   = array_keys($haltes);
?>