$(document).ready(function() {
    
            function showToast(message) {
                const $toast = $('#toast');
                $('#toastMsg').text(message);
                $toast.removeClass('translate-y-20 opacity-0 pointer-events-none');

                setTimeout(function() {
                    $toast.addClass('translate-y-20 opacity-0 pointer-events-none');
                }, 3000);
            }

            let isGlassMode = false;
            $(document).on('click', '#mode-toggle-btn', function() {
                isGlassMode = !isGlassMode;
                const $body = $('body');
                const $toggleCircle = $('#toggle-circle');
                const $themeLabel = $('#theme-label');

                if (isGlassMode) {
                    $body.removeClass('mode-solid').addClass('mode-glass');
                    $toggleCircle.css('transform', 'translateX(24px)');
                    $themeLabel.text('Transparan mode');
                    showToast('Mode Transparan (Glassmorphism) Diaktifkan ');
                } else {
                    $body.removeClass('mode-glass').addClass('mode-solid');
                    $toggleCircle.css('transform', 'translateX(0px)');
                    $themeLabel.text('Normal mode');
                    showToast('Mode Warna Solid Diaktifkan');
                }
            });

            $(document).on('click', '.nav-item', function(e) {
                e.preventDefault();
                $('.nav-item').removeClass('nav-item-active').addClass('text-slate-200');
                $(this).addClass('nav-item-active').removeClass('text-slate-200');
            });

            $(document).on('keyup', '#searchInput', function() {
                const query = $(this).val().toLowerCase();
                $('.ticket-item').each(function() {
                    const text = $(this).text().toLowerCase();
                    if (text.includes(query)) {
                        $(this).show().css('display', 'flex');
                    } else {
                        $(this).hide();
                    }
                });
            });

            $(document).on('click', '#notif-btn', function() {
                showToast('Anda memiliki 2 notifikasi baru!');
            });

            $(document).on('click', '#profile-btn', function() {
                showToast('Menu profil mahasiswa (Rasyid - 09021282530095)');
            });

            $(document).on('click', '#btn-pesan', function() {
                showToast('Membuka halaman pemesanan tiket bus baru...');
            });

            $(document).on('click', '#btn-jadwal', function() {
                showToast('Memuat jadwal bus real-time...');
            });

            $(document).on('click', '.btn-qr', function() {
                const ticketCode = $(this).closest('.ticket-item').data('code');
                showToast(`Menampilkan QR Code Tiket: ${ticketCode}`);
            });

            $(document).on('click', '.btn-route', function() {
                const routeName = $(this).data('route');
                showToast(`Rute ${routeName} dipilih`);
            });
        });