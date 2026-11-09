<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $pageTitle ?? 'DAMRI UNSRI' ?></title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script src = "https://cdn.tailwindcss.com"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<style>body { font-family: 'Inter', sans-serif; }</style>
<script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Montserrat', 'sans-serif'],
                    },
                    colors: {
                        damri: {
                            navy: '#1E3A8A',
                            navyLight: '#2563EB',
                            blue: '#024CAA',
                            amber: '#F59E0B',
                            amberHover: '#D97706',
                            cardBg: '#F8FAFC',
                            footerBg: '#1D2A44'
                        }
                    },
                    boxShadow: {
                        'soft-3d': '8px 8px 18px #d1d5db, -8px -8px 18px #ffffff',
                        'soft-3d-dark': '8px 8px 18px rgba(15, 23, 42, 0.4), -8px -8px 18px rgba(30, 41, 59, 0.2)',
                        'inset-soft': 'inset 3px 3px 6px rgba(0,0,0,0.06), inset -3px -3px 6px rgba(255,255,255,0.8)',
                        'glass': '0 8px 32px 0 rgba(31, 38, 135, 0.15)'
                    }
                }
            }
        }

    </script>