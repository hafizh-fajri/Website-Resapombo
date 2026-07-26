<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - Desa Resapombo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#114D2A', /* Disesuaikan dengan hijau gelap di gambar */
                        primaryHover: '#0E3F22',
                        lightGreenBg: '#EAF3EB',
                        textMuted: '#6B7280',
                    },
                    fontFamily: {
                        sans: ['Inter', 'ui-sans-serif', 'system-ui', '-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'Roboto', 'Helvetica Neue', 'Arial', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        /* Mekanisme Accordion Mulus menggunakan CSS Grid */
        .faq-content-wrapper {
            display: grid;
            grid-template-rows: 0fr;
            transition: grid-template-rows 0.3s ease-out;
        }
        .faq-content-wrapper.open {
            grid-template-rows: 1fr;
        }
        .faq-content-inner {
            overflow: hidden;
        }
        
        /* Animasi Ikon Panah */
        .chevron-icon {
            transition: transform 0.3s ease;
        }
        .chevron-icon.open {
            transform: rotate(180deg);
        }

        /* Styling Kategori Aktif */
        .active-category-desktop {
            background-color: #EAF3EB; /* lightGreenBg */
            border-left: 4px solid #114D2A; /* primary */
            font-weight: 600;
        }
        .active-category-mobile {
            background-color: #EAF3EB;
            border-color: #114D2A;
            font-weight: 600;
        }
    </style>
</head>
<body class="bg-white text-gray-900 font-sans">

    <!-- Komponen Navbar Laravel -->
    <x-navbar></x-navbar>

    <main class="container mx-auto px-4 py-12 md:py-16">
        
        <!-- Header & Search Bar (Diperbarui agar sesuai dengan gambar) -->
        <div class="text-center mb-12">
            <div class="inline-flex items-center px-4 py-1 bg-green-50 border border-green-200 text-green-700 text-xs font-bold tracking-wide rounded-full mb-4 uppercase">
                Website Desa Resapombo
            </div>
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Tanya Jawab (FAQ)</h1>
            <p class="text-base text-gray-500 max-w-2xl mx-auto leading-relaxed">
                Temukan jawaban dari berbagai pertanyaan umum mengenai administrasi, layanan desa, dan informasi kependudukan di Desa Resapombo.
            </p>
        </div>

        <div class="relative max-w-3xl mx-auto mb-16">
            <!-- Search Input Wrapper -->
            <div class="flex items-center bg-white border border-gray-300 rounded-full p-1.5 shadow-sm focus-within:ring-2 focus-within:ring-primary focus-within:border-primary transition-all">
                <div class="pl-4 pr-2 text-gray-400">
                    <i class="fas fa-search"></i>
                </div>
                <input type="text" placeholder="Ketik pertanyaan Anda di sini..." class="w-full px-2 py-3 bg-transparent outline-none text-gray-700 placeholder-gray-400">
                <button class="bg-primary text-white font-medium px-8 py-3 rounded-full hover:bg-primaryHover transition-colors flex-shrink-0">
                    Cari
                </button>
            </div>
            
            <!-- Pencarian Populer -->
            <div class="flex items-center justify-center flex-wrap gap-2 mt-5 text-sm">
                <span class="text-gray-500 mr-2">Pencarian Populer :</span>
                <span class="bg-gray-100 text-gray-700 px-4 py-1.5 rounded-full hover:bg-gray-200 cursor-pointer transition-colors">Pembuatan KTP</span>
                <span class="bg-gray-100 text-gray-700 px-4 py-1.5 rounded-full hover:bg-gray-200 cursor-pointer transition-colors">Surat Pindah</span>
                <span class="bg-gray-100 text-gray-700 px-4 py-1.5 rounded-full hover:bg-gray-200 cursor-pointer transition-colors">Bantuan Sosial</span>
            </div>
        </div>

        <!-- Area Konten Utama -->
        <div class="grid grid-cols-1 md:grid-cols-12 gap-x-10 gap-y-10">
            
            <!-- Sidebar Kategori -->
            <aside class="md:col-span-3 flex flex-wrap justify-center gap-2 md:block md:space-y-2 text-center md:text-left">
                <h2 class="md:hidden text-lg font-bold mb-2 w-full">Kategori Topik</h2>
                <h2 class="hidden md:block text-xl font-bold mb-6 text-gray-900">Kategori Topik</h2>
                
                <a href="#" data-category="all" class="category-link px-4 py-2.5 border border-gray-200 rounded-lg whitespace-nowrap md:border-l-4 md:border-transparent md:pl-6 md:py-3.5 md:flex md:items-center md:gap-3 hover:bg-gray-50 transition-colors active-category-mobile md:active-category-desktop">
                    <i class="fas fa-list hidden md:inline text-green-700"></i> <span class="md:hidden">Semua</span> Semua Kategori
                </a>
                <a href="#" data-category="administrasi" class="category-link px-4 py-2.5 border border-gray-200 rounded-lg whitespace-nowrap md:border-l-4 md:border-transparent md:pl-6 md:py-3.5 md:flex md:items-center md:gap-3 hover:bg-gray-50 transition-colors">
                    <i class="fas fa-file-alt hidden md:inline text-green-700"></i> Administrasi
                </a>
                <a href="#" data-category="kependudukan" class="category-link px-4 py-2.5 border border-gray-200 rounded-lg whitespace-nowrap md:border-l-4 md:border-transparent md:pl-6 md:py-3.5 md:flex md:items-center md:gap-3 hover:bg-gray-50 transition-colors">
                    <i class="fas fa-users hidden md:inline text-green-700"></i> Kependudukan
                </a>
                <a href="#" data-category="layananpublik" class="category-link px-4 py-2.5 border border-gray-200 rounded-lg whitespace-nowrap md:border-l-4 md:border-transparent md:pl-6 md:py-3.5 md:flex md:items-center md:gap-3 hover:bg-gray-50 transition-colors">
                    <i class="fas fa-concierge-bell hidden md:inline text-green-700"></i> Layanan Publik
                </a>
                <a href="#" data-category="infrastruktur" class="category-link px-4 py-2.5 border border-gray-200 rounded-lg whitespace-nowrap md:border-l-4 md:border-transparent md:pl-6 md:py-3.5 md:flex md:items-center md:gap-3 hover:bg-gray-50 transition-colors">
                    <i class="fas fa-road hidden md:inline text-green-700"></i> Infrastruktur
                </a>
                <a href="#" data-category="bumdes" class="category-link px-4 py-2.5 border border-gray-200 rounded-lg whitespace-nowrap md:border-l-4 md:border-transparent md:pl-6 md:py-3.5 md:flex md:items-center md:gap-3 hover:bg-gray-50 transition-colors">
                    <i class="fas fa-building hidden md:inline text-green-700"></i> BUMDes
                </a>
            </aside>

            <!-- Bagian Tengah: FAQ Cards (Scrollable terpisah dari sidebar) -->
            <section class="md:col-span-6 md:h-[calc(100vh-200px)] md:overflow-y-auto pr-2 space-y-10 custom-scrollbar">
                
                <!-- Kategori: Administrasi -->
                <div id="section-administrasi" class="faq-category-section block space-y-4">
                    <h2 class="text-xl font-bold mb-4 text-gray-900">Administrasi</h2>
                    
                    <!-- Card Accordion 1 -->
                    <div class="bg-gray-50/50 border border-gray-200 rounded-xl overflow-hidden transition-colors duration-300">
                        <button class="faq-btn flex items-center justify-between w-full p-5 text-left focus:outline-none bg-gray-50 hover:bg-gray-100 transition-colors">
                            <span class="font-medium text-gray-800 text-sm md:text-base">Apa saja persyaratan untuk membuat Surat Keterangan Usaha (SKU)?</span>
                            <i class="fas fa-chevron-down text-gray-400 chevron-icon text-sm ml-4"></i>
                        </button>
                        <!-- Wrapper untuk animasi CSS Grid mulus -->
                        <div class="faq-content-wrapper">
                            <div class="faq-content-inner">
                                <p class="p-5 pt-2 text-gray-600 text-sm leading-relaxed border-t border-gray-200/50 mt-1">
                                    Persyaratan SKU meliputi: Fotokopi KTP, Fotokopi Kartu Keluarga (KK), pengantar dari RT/RW, dan foto tempat usaha. Dokumen dibawa langsung ke kantor pelayanan desa pada jam operasional.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Card Accordion 2 -->
                    <div class="bg-gray-50/50 border border-gray-200 rounded-xl overflow-hidden transition-colors duration-300">
                        <button class="faq-btn flex items-center justify-between w-full p-5 text-left focus:outline-none bg-gray-50 hover:bg-gray-100 transition-colors">
                            <span class="font-medium text-gray-800 text-sm md:text-base">Bagaimana prosedur pembaruan data Kartu Keluarga (KK)?</span>
                            <i class="fas fa-chevron-down text-gray-400 chevron-icon text-sm ml-4"></i>
                        </button>
                        <div class="faq-content-wrapper">
                            <div class="faq-content-inner">
                                <p class="p-5 pt-2 text-gray-600 text-sm leading-relaxed border-t border-gray-200/50 mt-1">
                                    Membawa KK asli lama, fotokopi KTP anggota keluarga yang mengalami perubahan data, serta dokumen pendukung (buku nikah, akta kelahiran, atau ijazah).
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kategori: Kependudukan -->
                <div id="section-kependudukan" class="faq-category-section block space-y-4">
                    <h2 class="text-xl font-bold mb-4 text-gray-900 mt-8 md:mt-0">Kependudukan</h2>
                    
                    <div class="bg-gray-50/50 border border-gray-200 rounded-xl overflow-hidden transition-colors duration-300">
                        <button class="faq-btn flex items-center justify-between w-full p-5 text-left focus:outline-none bg-gray-50 hover:bg-gray-100 transition-colors">
                            <span class="font-medium text-gray-800 text-sm md:text-base">Apa syarat pindah domisili keluar desa?</span>
                            <i class="fas fa-chevron-down text-gray-400 chevron-icon text-sm ml-4"></i>
                        </button>
                        <div class="faq-content-wrapper">
                            <div class="faq-content-inner">
                                <p class="p-5 pt-2 text-gray-600 text-sm leading-relaxed border-t border-gray-200/50 mt-1">
                                    Membawa KTP dan KK asli beserta fotokopinya. Mengisi formulir pindah datang (F-1.03) yang disediakan di kantor desa, dengan menyertakan alamat tujuan pindah secara lengkap.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </section>

            <!-- Sidebar Kanan: Bantuan & Jam Operasional -->
            <aside class="md:col-span-3 space-y-6">
                <!-- Kontak Bantuan -->
                <div class="bg-gray-50 p-6 border border-gray-200 rounded-2xl text-center">
                    <h3 class="text-lg font-bold mb-2 text-gray-900">Masih memiliki pertanyaan?</h3>
                    <p class="text-gray-500 mb-6 text-sm">Jika Anda tidak menemukan jawaban yang dicari, tim pelayanan desa kami siap membantu Anda.</p>
                    
                    <div class="space-y-3">
                        <a href="#" class="flex items-center justify-center gap-2 bg-primary text-white font-medium w-full py-3 rounded-full hover:bg-primaryHover transition-colors text-sm">
                            <i class="fab fa-whatsapp text-lg"></i> Hubungi via WhatsApp
                        </a>
                        <a href="#" class="flex items-center justify-center gap-2 bg-white border border-gray-300 text-gray-700 font-medium w-full py-3 rounded-full hover:bg-gray-50 transition-colors text-sm">
                            <i class="far fa-envelope text-lg"></i> Kirim Email
                        </a>
                    </div>
                </div>

                <!-- Jam Operasional -->
                <div class="bg-gray-50 p-6 border border-gray-200 rounded-2xl">
                    <h4 class="font-bold text-sm uppercase tracking-wider mb-5 text-gray-900">JAM OPERASIONAL</h4>
                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between items-center pb-2 border-b border-gray-200/60">
                            <span class="text-gray-600">Senin - Kamis</span>
                            <span class="font-medium text-gray-900">08:00 - 15:00</span>
                        </div>
                        <div class="flex justify-between items-center pb-2 border-b border-gray-200/60">
                            <span class="text-gray-600">Jumat</span>
                            <span class="font-medium text-gray-900">08:00 - 11:30</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Sabtu - Minggu</span>
                            <span class="font-semibold text-red-600 text-xs bg-red-100 px-3 py-1 rounded-full">Tutup</span>
                        </div>
                    </div>
                </div>
            </aside>

        </div>
    </main>

    <!-- Komponen Footer Laravel -->
    <x-footer></x-footer>

    <script>
        // --- 1. Logika Kategori (Menampilkan berdasarkan pilihan) ---
        const categoryLinks = document.querySelectorAll('.category-link');
        const faqSections = document.querySelectorAll('.faq-category-section');

        categoryLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const selectedCategory = this.dataset.category;

                // Reset kelas aktif pada semua tombol kategori
                categoryLinks.forEach(l => {
                    l.classList.remove('active-category-mobile', 'active-category-desktop');
                });
                
                // Set kelas aktif berdasarkan ukuran layar
                if (window.innerWidth < 768) {
                    this.classList.add('active-category-mobile');
                } else {
                    this.classList.add('active-category-desktop');
                }

                // Sembunyikan atau tampilkan seksi FAQ
                faqSections.forEach(section => {
                    if (selectedCategory === 'all') {
                        section.style.display = 'block'; // Tampilkan semua
                    } else {
                        if (section.id === `section-${selectedCategory}`) {
                            section.style.display = 'block';
                        } else {
                            section.style.display = 'none';
                        }
                    }
                });
            });
        });

        // --- 2. Logika Accordion (Membuka dan Menutup Kartu FAQ) ---
        const faqButtons = document.querySelectorAll('.faq-btn');

        faqButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Temukan wrapper dan ikon di dalam card yang di-klik
                const wrapper = this.nextElementSibling;
                const icon = this.querySelector('.chevron-icon');
                
                // Opsi: Jika ingin hanya 1 FAQ yang terbuka dalam satu waktu (Accordion sesungguhnya)
                // Hapus komentar pada blok di bawah ini
                /*
                const allWrappers = document.querySelectorAll('.faq-content-wrapper');
                const allIcons = document.querySelectorAll('.chevron-icon');
                allWrappers.forEach(w => {
                    if (w !== wrapper && w.classList.contains('open')) {
                        w.classList.remove('open');
                    }
                });
                allIcons.forEach(i => {
                    if (i !== icon && i.classList.contains('open')) {
                        i.classList.remove('open');
                    }
                });
                */

                // Toggle kelas 'open' untuk CSS Grid transition dan rotasi ikon
                wrapper.classList.toggle('open');
                icon.classList.toggle('open');
            });
        });
    </script>
</body>
</html>