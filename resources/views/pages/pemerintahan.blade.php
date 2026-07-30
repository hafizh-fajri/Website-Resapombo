<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemerintahan - Desa Resapombo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'brand-green': '#166534', /* Hijau gelap standar */
                        'brand-green-light': '#22c55e',
                        desa: {
                            light: '#e8f5e9',
                            DEFAULT: '#1b5e20', // Hijau tua tema
                            dark: '#0d3311',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        /* Smooth scrolling dan transisi modal */
        html { scroll-behavior: smooth; }
        .modal-enter { opacity: 0; transform: scale(0.95); }
        .modal-enter-active { opacity: 1; transform: scale(1); transition: all 0.3s ease-out; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased font-sans">

    <x-navbar />

    <header class="pt-16">
    <!-- Menambahkan linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)) di depan url(...) untuk menggelapkan gambar -->
    <div class="relative bg-cover bg-center h-80 lg:h-96 flex items-center justify-center"
        style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('{{ asset('images/landing/kantor-hero.webp') }}');">
        
        <div class="relative z-10 text-center px-4">
            <span
                class="px-4 py-1 rounded-full bg-white/20 text-white text-xs font-semibold tracking-wider uppercase backdrop-blur-sm">Pemerintah
                Desa Resapombo</span>
            <h1 class="mt-4 text-4xl font-extrabold text-white tracking-tight sm:text-5xl">Pemerintahan Desa</h1>
            <p class="mt-3 max-w-2xl mx-auto text-lg text-gray-200">Transparansi, integritas, dan dedikasi dalam
                melayani masyarakat Desa Resapombo.</p>
        </div>
    </div>
</header>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            
        @php
            // 1. Mencari data Kepala Desa dari koleksi $perangkat
            $kepalaDesa = $perangkat->first(function($p) {
                return stripos($p->jabatan->nama ?? $p->jabatan->nama_jabatan, 'kepala desa') !== false;
            });
        @endphp

        {{-- Tampilkan Card Khusus Kepala Desa Jika Datanya Ada --}}
        @if($kepalaDesa)
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-10 mb-16 flex flex-col md:flex-row items-center gap-8">
            @if($kepalaDesa->foto)
                <img src="{{ asset($kepalaDesa->foto) }}" alt="Kepala Desa" class="w-40 h-40 rounded-full object-cover border-4 border-desa-light shadow-md">
            @else
                <div class="w-40 h-40 rounded-full border-4 border-desa-light shadow-md flex items-center justify-center bg-brand-green text-white text-4xl font-bold">
                    {{ substr($kepalaDesa->nama, 0, 1) }}
                </div>
            @endif
            
            <div>
                <div class="flex items-center gap-3 mb-2">
                    <div class="rounded w-6 h-1 bg-brand-green"></div>
                    <h3 class="text-md font-bold text-desa tracking-widest uppercase mb-1">
                        {{ $kepalaDesa->jabatan->nama ?? $kepalaDesa->jabatan->nama_jabatan }}
                    </h3>
                </div>
                
                <h2 class="text-3xl font-bold text-gray-900">{{ $kepalaDesa->nama }}</h2>
                
                <blockquote class=" mt-4 mb-2 border-l-4 border-brand-green pl-4 italic text-gray-600 bg-gray-50 py-2 rounded-r-lg">
                    "{{ $kepalaDesa->kata_sambutan ?? 'Komitmen kami adalah mewujudkan Desa Resapombo yang mandiri, sejahtera, dan berbudaya melalui tata kelola pemerintahan yang bersih dan inovatif.' }}"
                </blockquote>
                <div class="flex items-center gap-2 mt-4 text-gray-500">
                    <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/>
                    </svg>
                    <p class="text-gray-500 text-sm ">
                        {{ $kepalaDesa->no_wa ?? '-' }}
                    </p>
                </div>
                
            </div>
        </div>
        @endif

        {{-- 2. Looping Jabatan Lainnya (Kategori Perangkat) --}}
        @foreach($jabatan as $j)
            @php
                // Lewati jika jabatan ini adalah Kepala Desa
                $namaJabatan = $j->nama ?? $j->nama_jabatan;
                if(stripos($namaJabatan, 'kepala desa') !== false) {
                    continue;
                }

                // Ambil perangkat yang memiliki jabatan_id sama dengan ID jabatan saat ini
                $anggota = $perangkat->where('jabatan_id', $j->id);
            @endphp

            {{-- Hanya tampilkan kategori jika ada perangkat yang menjabat --}}
            @if($anggota->count() > 0)
            <div class="mb-12">
                <h2 class="text-2xl font-bold text-gray-900 mb-6 border-b pb-2">{{ $namaJabatan }}</h2>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($anggota as $p)
                    <div onclick="openModal(this)" 
                        data-nama="{{ $p->nama }}"
                        data-jabatan="{{ $namaJabatan }}"
                        data-kontak="{{ $p->no_wa ?? '-' }}"
                        data-foto="{{ $p->foto ? asset($p->foto) : '' }}"
                        class="bg-white rounded-xl overflow-hidden shadow-sm border border-gray-100 transition-all duration-300 hover:scale-105 hover:shadow-lg hover:ring-2 hover:ring-desa-light cursor-pointer group flex flex-col h-full"> 
                        
                        <div class="h-64 p-4 overflow-hidden relative flex items-center justify-center shrink-0">
                            @if($p->foto)
                                <img src="{{ asset($p->foto) }}" alt="{{ $p->nama }}" class="w-full h-full object-cover rounded-xl shadow-sm transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-4xl font-bold text-white bg-desa rounded-xl shadow-sm">
                                    No Photo
                                </div>
                            @endif
                        </div>
                        
                        <div class="p-6 flex flex-col flex-grow"> 
                            <h3 class="text-xl font-bold text-gray-900 group-hover:text-desa transition-colors">{{ $p->nama }}</h3>
                            <p class="text-sm font-medium text-desa mb-6">{{ $p->kata_sambutan }}</p> 
                            
                            <a href="{{ url("wa.me/" . $p->no_wa) }}" class="mt-auto flex items-center justify-between text-gray-600 text-sm border-t pt-4">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/>
                                    </svg>
                                    <span>{{ $p->no_wa ?? '-' }}</span>
                                </div>
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-desa transform group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        @endforeach

    </main>

    <x-footer />

    <div id="detailModal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity backdrop-blur-sm" onclick="closeModal()"></div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div id="modalPanel" class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-lg opacity-0 scale-95 duration-300">
                    
                    <button onclick="closeModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 z-10 bg-white rounded-full p-1 shadow-sm">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>

                    <div class="bg-white">
                        <div id="modalImageContainer" class="h-64 w-full relative bg-gray-100 flex items-center justify-center overflow-hidden">
                            <img id="modalImg" src="" alt="Foto" class="w-full h-full object-cover hidden">
                            <div id="modalInitials" class="hidden w-full h-full flex items-center justify-center text-6xl font-extrabold text-white"></div>
                        </div>
                        
                        <div class="px-6 py-8">
                            <div class="text-center sm:text-left">
                                <h3 id="modalName" class="text-2xl font-bold leading-6 text-gray-900 mb-1">Nama Perangkat</h3>
                                <p id="modalPosition" class="text-sm font-semibold text-desa uppercase tracking-wide mb-6">Jabatan</p>
                                
                                <div class="mt-4 space-y-4">
                                    <div class="flex items-start gap-3">
                                        <svg class="w-5 h-5 text-gray-400 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                        <div>
                                            <p class="text-xs text-gray-500 mb-0.5">Kontak WhatsApp</p>
                                            <p id="modalContact" class="text-sm font-medium text-gray-900"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const modal = document.getElementById('detailModal');
        const modalPanel = document.getElementById('modalPanel');
        
        // Palette warna untuk inisial agar sesuai dengan tema Desa
        const themeColors = [
            'bg-[#1b5e20]', // Hijau tua
            'bg-[#2e7d32]', 
            'bg-[#388e3c]', 
            'bg-[#0d3311]'
        ];

        // Fungsi mengekstrak 2 huruf inisial dari nama
        function getInitials(name) {
            let cleanName = name.split(',')[0].trim(); 
            cleanName = cleanName.replace(/^(Bapak|Ibu)\s+/i, '');
            
            let parts = cleanName.split(' ');
            let initials = '';
            if (parts.length >= 2) {
                initials = parts[0][0] + parts[1][0];
            } else if (parts.length === 1) {
                initials = parts[0][0];
            }
            return initials.toUpperCase();
        }

        // Fungsi memunculkan modal
        function openModal(element) {
            // Ambil data dari dataset HTML
            const ds = element.dataset;
            
            // Set teks di dalam modal
            document.getElementById('modalName').innerText = ds.nama;
            document.getElementById('modalPosition').innerText = ds.jabatan;
            document.getElementById('modalContact').innerText = ds.kontak;

            const imgEl = document.getElementById('modalImg');
            const initialsEl = document.getElementById('modalInitials');

            // Reset class untuk inisial (hapus warna sebelumnya)
            initialsEl.className = 'hidden w-full h-full flex items-center justify-center text-6xl font-extrabold text-white';

            // Logika pengecekan Foto
            if (ds.foto && ds.foto.trim() !== '') {
                imgEl.src = ds.foto;
                imgEl.classList.remove('hidden');
                initialsEl.classList.add('hidden');
            } else {
                imgEl.classList.add('hidden');
                initialsEl.innerText = getInitials(ds.nama);
                
                // Pilih warna random dari array themeColors
                const randomColor = themeColors[Math.floor(Math.random() * themeColors.length)];
                initialsEl.classList.add(randomColor);
                initialsEl.classList.remove('hidden');
            }

            // Tampilkan modal dengan transisi
            modal.classList.remove('hidden');
            // Timeout kecil agar transisi CSS berjalan
            setTimeout(() => {
                modalPanel.classList.remove('opacity-0', 'scale-95');
                modalPanel.classList.add('opacity-100', 'scale-100');
            }, 10);
        }

        // Fungsi menutup modal
        function closeModal() {
            modalPanel.classList.remove('opacity-100', 'scale-100');
            modalPanel.classList.add('opacity-0', 'scale-95');
            
            // Sembunyikan elemen setelah transisi selesai
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300); // Sesuai dengan durasi transition (300ms)
        }
    </script>
</body>
</html>