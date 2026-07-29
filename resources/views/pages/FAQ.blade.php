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
                        primary: '#114D2A',
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

        .chevron-icon {
            transition: transform 0.3s ease;
        }

        .chevron-icon.open {
            transform: rotate(180deg);
        }

        .active-category-desktop {
            background-color: #EAF3EB;
            border-left: 4px solid #114D2A;
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

    <x-navbar></x-navbar>

    <main class="container mx-auto px-4 py-12 md:py-16">

        <!-- Header & Search Bar -->
        <div class="text-left md:text-center mt-12 mb-8 md:my-12">
            <div
                class="inline-flex items-center px-4 py-1 bg-green-50 border border-green-200 text-green-700 text-xs font-bold tracking-wide rounded-full mb-4 uppercase">
                Website Desa Resapombo
            </div>
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Tanya Jawab (FAQ)</h1>
            <p class="text-base text-gray-500 max-w-2xl mx-0 md:mx-auto leading-relaxed">
                Temukan jawaban dari berbagai pertanyaan umum mengenai administrasi, layanan desa, dan informasi
                kependudukan di Desa Resapombo.
            </p>
        </div>

        <div class="relative max-w-3xl mx-auto mb-16">
            <!-- Search Input Wrapper (Diubah menjadi form) -->
            <form action="{{ url()->current() }}" method="GET"
                class="flex items-center bg-white border border-gray-300 rounded-full p-1.5 shadow-sm focus-within:ring-2 focus-within:ring-primary focus-within:border-primary transition-all">
                <div class="pl-4 pr-2 text-gray-400">
                    <i class="fas fa-search"></i>
                </div>
                <!-- Menambahkan name="search" dan value agar teks tidak hilang saat disubmit -->
                <input type="text" name="search" value="{{ $search }}" placeholder="Ketik pertanyaan Anda di sini..."
                    class="w-full px-2 py-3 bg-transparent outline-none text-gray-700 placeholder-gray-400">
                <button type="submit"
                    class="bg-primary text-white font-medium px-8 py-3 rounded-full hover:bg-primaryHover transition-colors flex-shrink-0">
                    Cari
                </button>
            </form>
        </div>

        <!-- Area Konten Utama -->
        <div class="grid grid-cols-1 md:grid-cols-12 gap-x-10 gap-y-10">

            @php
                // Menghitung total seluruh layanan yang sesuai dengan pencarian
                $totalLayanan = $kategori->sum(function ($kat) {
                    return $kat->layanan->count();
                });
            @endphp

            <!-- Sidebar Kategori -->
            <aside
                class="md:col-span-3 flex flex-wrap justify-start gap-2 md:block md:space-y-2 text-center md:text-left">
                <h2 class="md:hidden text-lg font-bold mb-2 w-full text-left">Kategori Topik</h2>
                <h2 class="hidden md:block text-xl font-bold mb-6 text-gray-900">Kategori Topik</h2>

                <!-- Tampilkan Sidebar hanya jika ada layanan yang ditemukan -->
                @if($totalLayanan > 0)
                    <!-- Kategori Default (Semua) -->
                    <a href="#" data-category="all"
                        class="category-link active inline-flex items-center pl-5 pr-4 py-2.5 rounded-lg overflow-hidden whitespace-nowrap transition-all duration-300 md:flex md:pl-6 md:py-3.5 md:gap-3 bg-[#EAF3EB] text-[#114D2A] font-bold shadow-[inset_4px_0_0_0_#114D2A]">
                        <i class="fas fa-th-large mr-2 md:mr-0"></i> <span>Semua</span>
                    </a>

                    <!-- Looping Kategori dari Database -->
                    @foreach($kategori as $item)
                        <!-- Hanya tampilkan kategori di sidebar jika kategori tersebut memiliki layanan hasil filter -->
                        @if($item->layanan->count() > 0)
                            <a href="#" data-category="{{ Str::slug($item->nama) }}"
                                class="category-link inline-flex items-center pl-5 pr-4 py-2.5 rounded-lg overflow-hidden whitespace-nowrap transition-all duration-300 md:flex md:pl-6 md:py-3.5 md:gap-3 bg-gray-50 text-gray-600 hover:bg-gray-200 hover:text-gray-900">
                                <i class="fas fa-file mr-2 md:mr-0"></i> <span>{{ $item->nama }}</span>
                            </a>
                        @endif
                    @endforeach
                @endif
            </aside>

            <!-- Bagian Tengah: FAQ Cards -->
            <section class="md:col-span-6 md:h-[calc(100vh-200px)] md:overflow-y-auto pr-2 space-y-8 custom-scrollbar">

                <!-- Alert Hasil Pencarian -->
                @if($search)
                    <div
                        class="p-4 bg-lightGreenBg rounded-xl border border-primary/20 flex justify-between items-center mb-2">
                        <p class="text-gray-800 font-medium">
                            Menampilkan hasil pencarian untuk: <span class="font-bold text-primary">"{{ $search }}"</span>
                        </p>
                        <a href="{{ url()->current() }}"
                            class="text-sm font-semibold text-red-600 hover:text-red-700 underline shrink-0 ml-4">
                            Batalkan
                        </a>
                    </div>
                @endif

                <!-- Pengecekan Empty State -->
                @if($totalLayanan == 0)
                    <div class="text-center py-16 bg-gray-50 border border-gray-200 rounded-2xl">
                        <div class="text-gray-400 mb-3"><i class="fas fa-search-minus text-4xl"></i></div>
                        <h3 class="text-lg font-semibold text-gray-700">Pertanyaan tidak ditemukan</h3>
                        <p class="text-gray-500 mt-1">Kami tidak menemukan FAQ yang cocok dengan kata kunci "{{ $search }}".
                        </p>
                    </div>
                @else
                    <!-- Looping Section Kategori -->
                    @foreach($kategori as $item)
                        <!-- Hanya tampilkan section kategori jika ada datanya -->
                        @if($item->layanan->count() > 0)
                            <div id="section-{{ Str::slug($item->nama) }}" class="faq-category-section block space-y-4">
                                <h2 class="text-xl font-bold mb-4 text-gray-900 mt-8 md:mt-0">{{ $item->nama }}</h2>

                                @foreach($item->layanan as $layananItem)
                                    <div
                                        class="bg-gray-50/50 border border-gray-200 rounded-xl overflow-hidden transition-colors duration-300">
                                        <button
                                            class="faq-btn flex items-center justify-between w-full p-5 text-left focus:outline-none bg-gray-50 hover:bg-gray-100 transition-colors">
                                            <span class="font-medium text-gray-800 text-sm md:text-base">{{ $layananItem->nama }}</span>
                                            <i class="fas fa-chevron-down text-gray-400 chevron-icon text-sm ml-4"></i>
                                        </button>
                                        <div class="faq-content-wrapper">
                                            <div class="faq-content-inner">
                                                <!-- Langkah-langkah -->
                                                <p
                                                    class="p-5 pt-2 text-gray-600 text-sm leading-relaxed border-t border-gray-200/50 mt-1">
                                                    {!! nl2br(e($layananItem->langkah)) !!}
                                                </p>
                                                
                                                <!-- MODIFIKASI: Card Tautan File Dokumen -->
                                                @if($layananItem->file_pdf)
                                                <div class="px-5 pb-5">
                                                    <a href="{{ asset($layananItem->file_pdf) }}" target="_blank" 
                                                       class="flex items-center gap-4 p-3 bg-white border border-gray-200 rounded-lg shadow-sm hover:border-primary hover:shadow-md transition-all group">
                                                        <div class="w-10 h-10 flex-shrink-0 flex items-center justify-center rounded-lg bg-green-50 text-primary group-hover:bg-primary group-hover:text-white transition-colors">
                                                            <i class="fas fa-file-download text-lg"></i>
                                                        </div>
                                                        <div class="flex-grow">
                                                            <h4 class="text-sm font-semibold text-gray-800 group-hover:text-primary transition-colors">Dokumen Persyaratan</h4>
                                                            <p class="text-xs text-gray-500 mt-0.5">Klik untuk melihat atau mengunduh file</p>
                                                        </div>
                                                        <div class="text-gray-400 group-hover:text-primary transition-colors">
                                                            <i class="fas fa-external-link-alt text-sm"></i>
                                                        </div>
                                                    </a>
                                                </div>
                                                @endif
                                                <!-- END MODIFIKASI -->

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    @endforeach
                @endif

            </section>

            <!-- Sidebar Kanan: Bantuan & Jam Operasional -->
            <aside class="md:col-span-3 space-y-6">
                <!-- Kontak Bantuan (Contoh memanggil variabel $kontak jika ada) -->
                <div class="bg-gray-50 p-6 border border-gray-200 rounded-2xl text-center">
                    <h3 class="text-lg font-bold mb-2 text-gray-900">Masih memiliki pertanyaan?</h3>
                    <p class="text-gray-500 mb-6 text-sm">Jika Anda tidak menemukan jawaban yang dicari, tim pelayanan
                        desa kami siap membantu Anda.</p>
                    <div class="space-y-3">
                        <a href="{{ $kontak ? 'https://wa.me/' . $kontak->no_wa : '#' }}" target="_blank"
                            class="flex items-center justify-center gap-2 bg-primary text-white font-medium w-full py-3 rounded-full hover:bg-primaryHover transition-colors text-sm">
                            <i class="fab fa-whatsapp text-lg"></i> Hubungi via WhatsApp
                        </a>
                        <a href="{{ $kontak ? 'mailto:' . $kontak->email : '#' }}"
                            class="flex items-center justify-center gap-2 bg-white border border-gray-300 text-gray-700 font-medium w-full py-3 rounded-full hover:bg-gray-50 transition-colors text-sm">
                            <i class="far fa-envelope text-lg"></i> Kirim Email
                        </a>
                    </div>
                </div>

                <!-- Jam Operasional -->
                <div class="bg-gray-50 p-6 border border-gray-200 rounded-2xl">
                    <h4 class="font-bold text-sm uppercase tracking-wider mb-5 text-gray-900">JAM OPERASIONAL</h4>
                    <div class="space-y-3 text-sm">

                        <!-- Looping data Jam Operasional -->
                        @forelse($jamOperasional as $ops)
                            <!-- $loop->last memastikan item paling bawah tidak memiliki border garis -->
                            <div
                                class="flex justify-between items-center {{ !$loop->last ? 'pb-2 border-b border-gray-200/60' : '' }}">

                                <!-- Class capitalize digunakan agar "senin - kamis" otomatis menjadi "Senin - Kamis" -->
                                <span class="text-gray-600 capitalize">{{ $ops->hari }}</span>

                                <!-- Logika: Jika isi kolom jam adalah 'libur' atau 'tutup', tampilkan badge merah -->
                                @if(strtolower(trim($ops->jam)) === 'libur' || strtolower(trim($ops->jam)) === 'tutup')
                                    <span class="font-semibold text-red-600 text-xs bg-red-100 px-3 py-1 rounded-full">
                                        {{ ucfirst($ops->jam) }}
                                    </span>
                                @else
                                    <span class="font-medium text-gray-900">{{ $ops->jam }}</span>
                                @endif

                            </div>
                        @empty
                            <div class="text-gray-500 italic text-center py-2">
                                Data jam operasional belum diatur.
                            </div>
                        @endforelse

                    </div>
                </div>
            </aside>

        </div>
    </main>

    <x-footer></x-footer>

    <script>
        const categoryLinks = document.querySelectorAll('.category-link');
        const faqSections = document.querySelectorAll('.faq-category-section');

        // Daftar class Tailwind untuk status Aktif dan Tidak Aktif
        const activeClasses = ['bg-[#EAF3EB]', 'text-[#114D2A]', 'font-bold', 'shadow-[inset_4px_0_0_0_#114D2A]', 'active'];
        const inactiveClasses = ['bg-gray-50', 'text-gray-600', 'hover:bg-gray-200', 'hover:text-gray-900'];

        categoryLinks.forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                const selectedCategory = this.dataset.category;

                // 1. Reset tampilan semua tombol kategori
                categoryLinks.forEach(l => {
                    l.classList.remove(...activeClasses);
                    l.classList.add(...inactiveClasses);
                });

                // 2. Berikan tampilan aktif pada tombol yang sedang diklik
                this.classList.remove(...inactiveClasses);
                this.classList.add(...activeClasses);

                // 3. Logika memunculkan FAQ (Tetap seperti semula)
                faqSections.forEach(section => {
                    if (selectedCategory === 'all') {
                        section.style.display = 'block';
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

        const faqButtons = document.querySelectorAll('.faq-btn');
        faqButtons.forEach(button => {
            button.addEventListener('click', function () {
                const wrapper = this.nextElementSibling;
                const icon = this.querySelector('.chevron-icon');
                wrapper.classList.toggle('open');
                icon.classList.toggle('open');
            });
        });
    </script>
</body>

</html>