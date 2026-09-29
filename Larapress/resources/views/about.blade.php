<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Ulang Tahun Ucok! 🎈✨</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&family=Outfit:wght@400;600;800;900&display=swap" rel="stylesheet">
    <!-- FontAwesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Canvas Confetti Library -->
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
    
    <style>
        /* Midnight Gold Exclusive Palette */
        :root {
            --bg-main: #0B0E14;      /* Deep Charcoal Blue */
            --bg-card: #151921;      /* Elevated Dark Surface */
            --gold-primary: #E5C07B; /* Muted Gold */
            --gold-light: #F3D38C;   /* Bright Gold */
            --cyan-accent: #56B6C2;  /* Cyan Accent */
            --sage-green: #98C379;   /* Soft Sage Green */
            --text-silver: #ABB2BF;  /* Soft Silver */
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            overflow-x: hidden;
            background-color: var(--bg-main);
            color: var(--text-silver);
        }

        .font-outfit {
            font-family: 'Outfit', sans-serif;
        }

        /* Animated Midnight Gold Background */
        .aurora-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: -1;
            background: radial-gradient(circle at 20% 20%, rgba(229, 192, 123, 0.15) 0%, transparent 45%),
                        radial-gradient(circle at 80% 80%, rgba(86, 182, 194, 0.12) 0%, transparent 45%),
                        radial-gradient(circle at 50% 50%, rgba(15, 20, 28, 0.8) 0%, transparent 100%);
            filter: blur(50px);
            animation: ambientMove 14s ease-in-out infinite alternate;
        }

        @keyframes ambientMove {
            0% { transform: scale(1) rotate(0deg); }
            100% { transform: scale(1.15) rotate(6deg); }
        }

        /* Candle Flame Flicker */
        .flame {
            animation: flicker 0.6s infinite alternate ease-in-out;
            transform-origin: center bottom;
        }

        @keyframes flicker {
            0% { transform: scale(1) rotate(-3deg); filter: drop-shadow(0 0 10px #E5C07B) drop-shadow(0 0 20px #D19A66); }
            100% { transform: scale(1.15) rotate(3deg); filter: drop-shadow(0 0 15px #F3D38C) drop-shadow(0 0 25px #E5C07B); }
        }

        /* Smoke effect when candle extinguished */
        .smoke {
            animation: rise 1.5s forwards ease-out;
        }
        @keyframes rise {
            0% { opacity: 0.8; transform: translateY(0) scale(0.5); }
            100% { opacity: 0; transform: translateY(-40px) scale(2); }
        }

        /* Glassmorphism Card Style (Midnight Gold Theme) */
        .glass-card {
            background: rgba(21, 25, 33, 0.75);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(229, 192, 123, 0.18);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.6);
        }

        .glass-button {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(229, 192, 123, 0.25);
        }

        .glass-button:hover {
            background: rgba(229, 192, 123, 0.15);
            border-color: rgba(229, 192, 123, 0.5);
        }

        /* Gold Gradient Text & Glow */
        .text-gold-gradient {
            background: linear-gradient(135deg, #FFF0C7 0%, #E5C07B 50%, #B88E3E 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .gold-glow {
            box-shadow: 0 0 25px rgba(229, 192, 123, 0.25);
        }
    </style>
</head>
<body class="min-h-screen flex flex-col justify-between relative selection:bg-[#E5C07B] selection:text-black">

    <div class="aurora-bg"></div>

    <!-- Header Navigation -->
    <header class="w-full py-5 px-6 md:px-12 flex justify-between items-center z-20 flex-wrap gap-4">
        <div class="flex items-center space-x-3 group cursor-pointer" onclick="editName()">
            <div class="w-10 h-10 rounded-2xl bg-gradient-to-tr from-[#E5C07B] to-[#56B6C2] flex items-center justify-center shadow-lg shadow-[#E5C07B]/20 group-hover:scale-110 transition duration-300">
                <i class="fa-solid fa-crown text-black text-lg"></i>
            </div>
            <div>
                <span class="font-outfit font-extrabold text-lg md:text-xl tracking-wider text-gold-gradient">
                    <span id="nav-name">Ucok</span>'s Day
                </span>
                <p class="text-[10px] text-slate-400 -mt-1 flex items-center gap-1">
                    <span>Ubah Nama</span> <i class="fa-solid fa-pen text-[8px]"></i>
                </p>
            </div>
        </div>

        <div class="flex items-center gap-2 sm:gap-3">
            <!-- Kontak Ucok Button -->
            <button onclick="openContactModal()" class="glass-button text-[#E5C07B] font-semibold px-4 py-2.5 rounded-2xl backdrop-blur-md transform hover:scale-105 active:scale-95 transition duration-200 text-sm flex items-center space-x-2">
                <i class="fa-solid fa-phone text-[#56B6C2] animate-pulse"></i>
                <span>Kontak <span id="btn-contact-name">Ucok</span></span>
            </button>

            <!-- Music Toggle Button -->
            <button id="music-btn" onclick="toggleMusic()" class="glass-button p-3 rounded-2xl text-slate-300 hover:text-white transition duration-300 relative group" title="Putar Musik">
                <i class="fa-solid fa-music text-lg" id="music-icon"></i>
            </button>
            
            <!-- Confetti Party Button -->
            <button onclick="triggerConfetti()" class="bg-gradient-to-r from-[#E5C07B] via-[#D19A66] to-[#56B6C2] hover:opacity-95 text-black font-extrabold px-4 md:px-5 py-2.5 rounded-2xl shadow-xl shadow-[#E5C07B]/20 transform hover:scale-105 active:scale-95 transition duration-200 text-sm md:text-base flex items-center space-x-2">
                <i class="fa-solid fa-wand-magic-sparkles animate-spin" style="animation-duration: 3s;"></i>
                <span class="hidden sm:inline">Ledakan Pesta!</span>
            </button>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="container mx-auto px-4 py-6 flex-grow flex flex-col items-center justify-center text-center z-10 max-w-6xl">
        
        <!-- Hero Section -->
        <div class="mb-8 space-y-4">
            <div class="inline-flex items-center gap-2 bg-[#151921] border border-[#E5C07B]/30 px-4 py-1.5 rounded-full text-[#E5C07B] font-semibold text-xs md:text-sm tracking-widest uppercase shadow-inner">
                <span class="w-2 h-2 rounded-full bg-[#E5C07B] animate-ping"></span>
                ✨ Special Birthday Celebration ✨
            </div>
            
            <h1 class="text-4xl sm:text-6xl lg:text-7xl font-outfit font-black tracking-tight drop-shadow-2xl leading-none">
                Selamat Ulang Tahun,<br>
                <span class="text-gold-gradient" id="hero-name">
                    Ucok! 🥳
                </span>
            </h1>
            
            <p class="text-base md:text-xl text-slate-400 max-w-2xl mx-auto font-normal leading-relaxed">
                Semoga panjang umur, sehat selalu, makin sukses, impiannya tercapai semua, dan setiap harinya dipenuhi kebahagiaan! 🚀
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 w-full items-stretch my-4">
            
            <!-- Left Side: Foto Ucok Memegang Kue (5 Cols) -->
            <div class="lg:col-span-5 glass-card p-6 rounded-3xl flex flex-col items-center justify-center relative overflow-hidden gold-glow">
                <div class="absolute -right-12 -top-12 w-32 h-32 bg-[#E5C07B]/10 rounded-full blur-2xl pointer-events-none"></div>
                
                <div class="relative w-full aspect-[3/4] max-h-[380px] rounded-2xl overflow-hidden border-2 border-[#E5C07B]/40 shadow-2xl group">
                    <!-- Foto Ucok dari file yang diupload -->
                    <img src={{ asset('images/ucok.jpeg') }} alt="Ucok Birthday" class="w-full h-full object-cover object-center group-hover:scale-105 transition duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-80"></div>
                    <div class="absolute bottom-4 left-4 right-4 text-left">
                        <span class="bg-[#E5C07B] text-black text-[10px] font-bold px-2.5 py-1 rounded-full uppercase tracking-wider">Birthday Boy 🎉</span>
                        <h3 class="text-white font-outfit font-bold text-xl mt-1">Ucok (32rd Birthday)</h3>
                    </div>
                </div>
            </div>

            <!-- Right Side: Tiup Lilin & Interaktif (7 Cols) -->
            <div class="lg:col-span-7 flex flex-col gap-6">
                
                <!-- Interactive Cake Section -->
                <div class="glass-card p-6 md:p-8 rounded-3xl flex flex-col justify-between items-center relative overflow-hidden">
                    <div class="w-full flex justify-between items-center mb-4">
                        <h2 class="text-xl font-bold text-[#E5C07B] font-outfit flex items-center gap-2">
                            <i class="fa-solid fa-cake-candles"></i> Tiup Lilin Digital
                        </h2>
                        <span id="candle-badge" class="text-xs font-semibold px-3 py-1 rounded-full bg-[#E5C07B]/10 text-[#E5C07B] border border-[#E5C07B]/30">
                            3/3 Menyala
                        </span>
                    </div>

                    <!-- Candle Container -->
                    <div class="relative my-6 flex flex-col items-center justify-center w-full">
                        <div class="flex justify-center items-end space-x-6 z-20 -mb-2">
                            <!-- Candle 1 -->
                            <div class="relative cursor-pointer group flex flex-col items-center" onclick="extinguishCandle(1)">
                                <div id="flame-1" class="flame w-5 h-8 bg-gradient-to-t from-[#D19A66] via-[#E5C07B] to-[#FFF0C7] rounded-full absolute -top-9"></div>
                                <div id="smoke-1" class="hidden absolute -top-10 text-slate-400"><i class="fa-solid fa-cloud text-xs smoke"></i></div>
                                <div class="w-3.5 h-12 bg-gradient-to-b from-[#E5C07B] to-[#B88E3E] rounded-t-md shadow-md"></div>
                            </div>
                            <!-- Candle 2 -->
                            <div class="relative cursor-pointer group flex flex-col items-center" onclick="extinguishCandle(2)">
                                <div id="flame-2" class="flame w-5 h-8 bg-gradient-to-t from-[#D19A66] via-[#E5C07B] to-[#FFF0C7] rounded-full absolute -top-9"></div>
                                <div id="smoke-2" class="hidden absolute -top-10 text-slate-400"><i class="fa-solid fa-cloud text-xs smoke"></i></div>
                                <div class="w-3.5 h-14 bg-gradient-to-b from-[#56B6C2] to-[#3B82F6] rounded-t-md shadow-md"></div>
                            </div>
                            <!-- Candle 3 -->
                            <div class="relative cursor-pointer group flex flex-col items-center" onclick="extinguishCandle(3)">
                                <div id="flame-3" class="flame w-5 h-8 bg-gradient-to-t from-[#D19A66] via-[#E5C07B] to-[#FFF0C7] rounded-full absolute -top-9"></div>
                                <div id="smoke-3" class="hidden absolute -top-10 text-slate-400"><i class="fa-solid fa-cloud text-xs smoke"></i></div>
                                <div class="w-3.5 h-12 bg-gradient-to-b from-[#98C379] to-[#10B981] rounded-t-md shadow-md"></div>
                            </div>
                        </div>

                        <!-- Vector Cake -->
                        <div class="z-10">
                            <svg class="w-56 md:w-64 h-auto drop-shadow-[0_15px_20px_rgba(0,0,0,0.8)]" viewBox="0 0 240 140" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <ellipse cx="120" cy="125" rx="110" ry="12" fill="#0B0E14" opacity="0.9"/>
                                <ellipse cx="120" cy="122" rx="100" ry="10" fill="#212631"/>
                                <path d="M30 85 C30 85 30 115 120 115 C210 115 210 85 210 85 L210 65 C210 65 210 95 120 95 C30 95 30 65 30 65 Z" fill="#3E2723"/>
                                <path d="M30 65 C30 65 30 95 120 95 C210 95 210 65 210 65 L210 60 C210 60 210 90 120 90 C30 90 30 60 30 60 Z" fill="#4E342E"/>
                                <path d="M30 60 C35 68 50 68 55 60 C60 68 75 68 80 60 C85 68 100 68 105 60 C110 68 125 68 130 60 C135 68 150 68 155 60 C160 68 175 68 180 60 C185 68 200 68 205 60 L210 60 C210 60 210 75 120 75 C30 75 30 60 30 60 Z" fill="#E5C07B" opacity="0.6"/>
                                <path d="M45 45 C45 45 45 70 120 70 C195 70 195 45 195 45 L195 35 C195 35 195 60 120 60 C45 60 45 35 45 35 Z" fill="#3E2723"/>
                                <ellipse cx="120" cy="35" rx="75" ry="12" fill="#5D4037"/>
                                <path d="M45 35 C50 42 60 42 65 35 C70 45 80 45 85 35 C90 42 100 42 105 35 C110 45 120 45 125 35 C130 42 140 42 145 35 C150 45 160 45 165 35 C170 42 180 42 185 35 C190 40 195 38 195 35 C195 23 161 15 120 15 C79 15 45 23 45 35 Z" fill="#E5C07B"/>
                            </svg>
                        </div>
                    </div>

                    <p id="candle-status" class="text-xs text-slate-300 font-medium mb-3 bg-black/40 py-2 px-4 rounded-xl border border-white/5 w-full flex items-center justify-center gap-2">
                        <i class="fa-solid fa-circle-info text-[#E5C07B]"></i> Klik api lilin untuk meniupnya!
                    </p>

                    <button onclick="resetCandles()" class="w-full glass-button text-slate-300 font-semibold py-2.5 rounded-xl transition text-xs flex items-center justify-center space-x-2">
                        <i class="fa-solid fa-rotate-right"></i>
                        <span>Nyalakan Ulang Lilin</span>
                    </button>
                </div>

                <!-- Random Wishes Box -->
                <div class="glass-card p-6 rounded-3xl flex flex-col justify-between">
                    <div>
                        <h3 class="text-lg font-bold mb-2 text-[#E5C07B] font-outfit text-left flex items-center gap-2">
                            <i class="fa-solid fa-envelope-open-text"></i> Doa & Harapan
                        </h3>
                        <div id="wish-box" class="bg-black/50 border border-[#E5C07B]/20 p-4 rounded-2xl text-slate-200 italic text-sm min-h-[90px] flex items-center justify-center my-2 transition-all duration-300">
                            "Semoga tahun ini membawa kebahagiaan luar biasa, rezeki yang berlimpah, dan tercapai segala impian terbesarmu! 🚀"
                        </div>
                    </div>

                    <button onclick="generateNewWish()" class="mt-3 w-full bg-[#E5C07B] hover:bg-[#F3D38C] text-black font-bold py-2.5 rounded-xl transition text-xs flex items-center justify-center gap-2">
                        <i class="fa-solid fa-shuffle"></i> Acak Ucapan Lain
                    </button>
                </div>

            </div>
        </div>

    </main>

    <!-- Modal Pop-up Kontak Ucok -->
    <div id="contact-modal" class="fixed inset-0 bg-black/80 backdrop-blur-md z-50 flex items-center justify-center p-4 hidden transition-all duration-300">
        <div class="glass-card p-6 md:p-8 rounded-3xl w-full max-w-sm text-center relative border border-[#E5C07B]/40 shadow-2xl">
            <button onclick="closeContactModal()" class="absolute top-4 right-4 text-slate-400 hover:text-white transition">
                <i class="fa-solid fa-xmark text-xl"></i>
            </button>

            <div class="w-16 h-16 bg-[#E5C07B]/20 rounded-full flex items-center justify-center mx-auto mb-4 border border-[#E5C07B]/40">
                <i class="fa-solid fa-id-card text-[#E5C07B] text-2xl"></i>
            </div>

            <h3 class="text-xl font-bold font-outfit text-white mb-1">Nomor Kontak <span id="modal-name">Ucok</span></h3>
            <p class="text-xs text-slate-400 mb-6">Hubungi untuk mengucapkan selamat ulang tahun secara langsung!</p>

            <div class="bg-black/60 border border-white/10 p-4 rounded-2xl flex items-center justify-between mb-6">
                <span id="phone-number" class="font-mono text-lg text-[#E5C07B] font-bold tracking-wide">+62 812-3456-7890</span>
                <button onclick="copyPhoneNumber()" class="glass-button p-2.5 rounded-xl text-slate-300 hover:text-white transition" title="Salin Nomor">
                    <i id="copy-icon" class="fa-solid fa-copy"></i>
                </button>
            </div>

            <div class="grid grid-cols-2 gap-3">
                <a id="wa-link" href="https://wa.me/6281234567890?text=Selamat%20Ulang%20Tahun!" target="_blank" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 rounded-2xl transition text-xs flex items-center justify-center gap-2">
                    <i class="fa-brands fa-whatsapp text-lg"></i> WhatsApp
                </a>
                <a id="call-link" href="tel:+6281234567890" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-2xl transition text-xs flex items-center justify-center gap-2">
                    <i class="fa-solid fa-phone text-sm"></i> Telepon
                </a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="w-full py-5 text-center text-slate-500 text-xs z-10 border-t border-white/5 bg-black/60 backdrop-blur-md">
        <p>Dibuat khusus untuk merayakan hari ulang tahun <span class="text-[#E5C07B] font-bold" id="footer-name">Ucok</span>.</p>
    </footer>

    <!-- Audio Effects -->
    <audio id="bg-music" loop src="https://cdn.pixabay.com/download/audio/2022/03/15/audio_c8c8a7305d.mp3?filename=happy-birthday-15285.mp3"></audio>

    <script>
        let currentName = "Ucok";
        let rawPhoneNumber = "6281234567890";
        let displayPhoneNumber = "+62 812-3456-7890";

        function editName() {
            const newName = prompt("Masukkan nama yang berulang tahun:", currentName);
            if (newName && newName.trim() !== "") {
                currentName = newName.trim();
                document.getElementById('hero-name').innerText = currentName + "! 🥳";
                document.getElementById('nav-name').innerText = currentName;
                document.getElementById('btn-contact-name').innerText = currentName;
                document.getElementById('modal-name').innerText = currentName;
                document.getElementById('footer-name').innerText = currentName;
                document.title = `Selamat Ulang Tahun ${currentName}! 🎉`;
            }
        }

        function openContactModal() {
            document.getElementById('phone-number').innerText = displayPhoneNumber;
            document.getElementById('wa-link').href = `https://wa.me/${rawPhoneNumber}?text=Selamat%20Ulang%20Tahun%20${encodeURIComponent(currentName)}!%20🎉`;
            document.getElementById('call-link').href = `tel:+${rawPhoneNumber}`;
            document.getElementById('contact-modal').classList.remove('hidden');
        }

        function closeContactModal() {
            document.getElementById('contact-modal').classList.add('hidden');
        }

        function copyPhoneNumber() {
            navigator.clipboard.writeText(displayPhoneNumber);
            const copyIcon = document.getElementById('copy-icon');
            copyIcon.className = "fa-solid fa-check text-emerald-400";
            setTimeout(() => { copyIcon.className = "fa-solid fa-copy"; }, 2000);
        }

        let wishes = [
            `"${currentName}, semoga tahun ini membawa kebahagiaan luar biasa, rezeki yang berlimpah, dan tercapai segala impian terbesarmu! 🚀"`,
            `"Selamat ulang tahun ${currentName}! Tetap jadi pribadi yang keren, inspiratif, dan selalu dikelilingi orang-orang baik. 🎉"`,
            `"Semoga umur yang bertambah ini membawa berkah, kesehatan prima, dan makin lancar dalam segala urusan! 🎂"`,
            `"Happy Birthday ${currentName}! Jangan lupa traktirannya ya, semoga rezekinya makin ngalir deras! 💸✨"`
        ];

        function generateNewWish() {
            const randomIndex = Math.floor(Math.random() * wishes.length);
            const wishBox = document.getElementById('wish-box');
            wishBox.style.opacity = 0;
            setTimeout(() => {
                wishBox.innerText = wishes[randomIndex];
                wishBox.style.opacity = 1;
            }, 200);
        }

        let extinguishedCount = 0;
        function extinguishCandle(candleNum) {
            const flame = document.getElementById(`flame-${candleNum}`);
            const smoke = document.getElementById(`smoke-${candleNum}`);
            if (flame && !flame.classList.contains('hidden')) {
                flame.classList.add('hidden');
                smoke.classList.remove('hidden');
                setTimeout(() => smoke.classList.add('hidden'), 1500);
                extinguishedCount++;
                updateCandleBadge();
                if (extinguishedCount === 3) {
                    document.getElementById('candle-status').innerHTML = `<span class="text-[#E5C07B] font-bold">🎉 Hore! Semua lilin ditiup! Selamat Ulang Tahun ${currentName}!</span>`;
                    triggerConfetti();
                }
            }
        }

        function updateCandleBadge() {
            const remaining = 3 - extinguishedCount;
            document.getElementById('candle-badge').innerText = `${remaining}/3 Menyala`;
        }

        function resetCandles() {
            for (let i = 1; i <= 3; i++) {
                document.getElementById(`flame-${i}`).classList.remove('hidden');
            }
            extinguishedCount = 0;
            updateCandleBadge();
            document.getElementById('candle-status').innerHTML = `<i class="fa-solid fa-circle-info text-[#E5C07B]"></i> Klik api lilin untuk meniupnya!`;
        }

        const music = document.getElementById('bg-music');
        const musicBtn = document.getElementById('music-btn');
        const musicIcon = document.getElementById('music-icon');
        let isPlaying = false;

        function toggleMusic() {
            if (isPlaying) {
                music.pause();
                musicIcon.className = "fa-solid fa-music text-lg";
            } else {
                music.play().catch(e => console.log("Audio play blocked"));
                musicIcon.className = "fa-solid fa-compact-disc text-lg animate-spin";
            }
            isPlaying = !isPlaying;
        }

        function triggerConfetti() {
            confetti({ particleCount: 100, spread: 70, origin: { y: 0.6 } });
        }

        window.addEventListener('load', () => {
            setTimeout(triggerConfetti, 500);
        });
    </script>
</body>
</html>