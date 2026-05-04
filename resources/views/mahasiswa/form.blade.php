<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pemilihan Dospem - LPKIA</title>
    @vite('resources/js/app.js')
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #f8fafc;
            min-height: 100vh;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.5);
        }

        .hero-pattern {
            background-color: #0f172a;
            background-image: radial-gradient(#1e293b 1px, transparent 1px);
            background-size: 20px 20px;
        }

        .step-number {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 28px;
            height: 28px;
            background: #3b82f6;
            color: white;
            border-radius: 8px;
            font-size: 12px;
            font-weight: bold;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-slide-up {
            animation: slideUp 0.6s ease-out forwards;
        }
    </style>
</head>

<body class="text-slate-800 antialiased">

    <!-- Hero Welcome Section -->
    <header class="hero-pattern text-white pt-16 pb-32 px-6">
        <div class="max-w-5xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-12">
                <div class="flex items-center gap-4">
                    <div class="bg-white p-2 rounded-2xl">
                        <img src="{{ asset('logo-lpkia.png') }}" alt="Logo" class="h-12 w-auto">
                    </div>
                    <div>
                        <h1 class="text-xl font-bold leading-tight">Student Portal</h1>
                        <p class="text-blue-400 text-xs font-bold tracking-widest uppercase">Institut Digital Ekonomi
                            LPKIA</p>
                    </div>
                </div>
                <div class="px-4 py-2 bg-white/10 rounded-full border border-white/10 text-xs backdrop-blur-md">
                    <span class="text-blue-300">Tahun Akademik:</span> {{ date('Y') }}/{{ date('Y') + 1 }}
                </div>
            </div>

            <div class="max-w-3xl animate-slide-up">
                <h2 class="text-4xl md:text-5xl font-extrabold mb-6 leading-tight">
                    Selamat Datang, <span class="text-blue-400">Mahasiswa Kreatif!</span>
                </h2>
                <p class="text-slate-400 text-lg mb-8 leading-relaxed">
                    Siap melangkah ke tahap akhir? Mulailah perjalanan Tugas Akhir/Skripsi Anda dengan memilih Dosen
                    Pembimbing yang sesuai dengan minat penelitian Anda.
                </p>

                <!-- Quick Steps -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="flex items-center gap-3 bg-white/5 p-4 rounded-2xl border border-white/5">
                        <div class="step-number">1</div>
                        <span class="text-sm font-medium text-slate-300">Lengkapi Data Diri</span>
                    </div>
                    <div class="flex items-center gap-3 bg-white/5 p-4 rounded-2xl border border-white/5">
                        <div class="step-number">2</div>
                        <span class="text-sm font-medium text-slate-300">Pilih Topik & Dosen</span>
                    </div>
                    <div class="flex items-center gap-3 bg-white/5 p-4 rounded-2xl border border-white/5">
                        <div class="step-number">3</div>
                        <span class="text-sm font-medium text-slate-300">Kirim Pengajuan</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content Area (Form) -->
    <main class="max-w-5xl mx-auto px-6 -mt-20 pb-20">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- Form Section -->
            <div class="lg:col-span-2 space-y-6 animate-slide-up" style="animation-delay: 0.2s">
                <div
                    class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden">
                    <div class="p-8 md:p-10">
                        <div class="flex items-center gap-3 mb-8">
                            <div class="w-10 h-10 bg-blue-50 rounded-xl flex items-center justify-center text-blue-600">
                                <i data-lucide="form-input" class="w-5 h-5"></i>
                            </div>
                            <h3 class="text-xl font-bold text-slate-800">Formulir Pendaftaran</h3>
                        </div>

                        @if (session('error'))
                            <div class="mb-6 bg-rose-50 border border-rose-200 text-rose-600 p-4 rounded-2xl">
                                <strong>Gagal:</strong> {{ session('error') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="mb-6 bg-rose-50 border border-rose-200 text-rose-600 p-4 rounded-2xl">
                                <ul class="text-sm space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li>• {{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form id="formPendaftaran" method="POST" action="{{ route('mahasiswa.store') }}"
                            class="space-y-6">
                            @csrf

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Nama -->
                                <div class="space-y-2">
                                    <label class="text-xs font-bold text-slate-500 uppercase tracking-wider ml-1">Nama
                                        Mahasiswa</label>
                                    <div class="relative group">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-blue-500 transition-colors">
                                            <i data-lucide="user" class="w-5 h-5"></i>
                                        </div>
                                        <input type="text" name="nama_mahasiswa" required
                                            placeholder="Nama sesuai KTM"
                                            class="w-full pl-12 pr-4 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition-all font-medium">
                                    </div>
                                </div>

                                <!-- NIM -->
                                <div class="space-y-2">
                                    <label
                                        class="text-xs font-bold text-slate-500 uppercase tracking-wider ml-1">NIM</label>
                                    <div class="relative group">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-blue-500 transition-colors">
                                            <i data-lucide="credit-card" class="w-5 h-5"></i>
                                        </div>
                                        <input type="text" name="nim" required placeholder="0401xxxx"
                                            class="w-full pl-12 pr-4 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition-all font-medium">
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- WhatsApp -->
                                <div class="space-y-2">
                                    <label
                                        class="text-xs font-bold text-slate-500 uppercase tracking-wider ml-1">WhatsApp
                                        / No HP</label>
                                    <div class="relative group">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-blue-500 transition-colors">
                                            <i data-lucide="phone" class="w-5 h-5"></i>
                                        </div>
                                        <input type="text" name="no_hp" required placeholder="08xxxxxxxx"
                                            class="w-full pl-12 pr-4 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition-all font-medium">
                                    </div>
                                </div>

                                <!-- Prodi -->
                                <div class="space-y-2">
                                    <label
                                        class="text-xs font-bold text-slate-500 uppercase tracking-wider ml-1">Program
                                        Studi</label>
                                    <div class="relative group">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-blue-500 transition-colors">
                                            <i data-lucide="graduation-cap" class="w-5 h-5"></i>
                                        </div>
                                        <select name="prodi_id" id="prodi" required
                                            class="appearance-none w-full pl-12 pr-10 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition-all font-medium cursor-pointer">
                                            <option value="" disabled selected>Pilih Program Studi</option>
                                            @foreach ($prodis as $prodi)
                                                <option value="{{ $prodi->id }}">{{ $prodi->nama_prodi }}</option>
                                            @endforeach
                                        </select>
                                        <div
                                            class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-slate-400">
                                            <i data-lucide="chevron-down" class="w-5 h-5"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Dosen Pembimbing -->
                            <div class="space-y-2">
                                <label class="text-xs font-bold text-slate-500 uppercase tracking-wider ml-1">Pilih
                                    Dosen Pembimbing</label>
                                <div class="relative group">
                                    <div
                                        class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-blue-500 transition-colors">
                                        <i data-lucide="users" class="w-5 h-5"></i>
                                    </div>
                                    <select name="dosen_id" id="dosen" required
                                        class="appearance-none w-full pl-12 pr-10 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition-all font-medium cursor-pointer disabled:bg-slate-100 disabled:text-slate-400">
                                        <option value="" disabled selected>-- Pilih prodi terlebih dahulu --
                                        </option>
                                    </select>
                                    <div
                                        class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-slate-400">
                                        <i data-lucide="chevron-down" class="w-5 h-5"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Judul -->
                            <div class="space-y-2">
                                <label class="text-xs font-bold text-slate-500 uppercase tracking-wider ml-1">Rencana
                                    Judul / Topik</label>
                                <textarea name="tema_ta" rows="4" required placeholder="Gambarkan secara singkat apa yang akan Anda teliti..."
                                    class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition-all font-medium resize-none"></textarea>
                            </div>

                            <button type="submit" id="btnSubmit"
                                class="w-full bg-blue-600 text-white py-5 rounded-2xl font-bold text-lg hover:bg-blue-700 hover:shadow-xl hover:shadow-blue-200 active:scale-95 transition-all flex items-center justify-center gap-3">
                                <span>Kirim Pengajuan Sekarang</span>
                                <i data-lucide="send" class="w-5 h-5"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Sidebar Info Section -->
            <div class="lg:col-span-1 space-y-6 animate-slide-up" style="animation-delay: 0.4s">
                <!-- Info Box 1 -->
                <div class="bg-blue-600 rounded-[2rem] p-8 text-white shadow-xl shadow-blue-200">
                    <div class="w-12 h-12 bg-white/20 rounded-2xl flex items-center justify-center mb-6">
                        <i data-lucide="help-circle" class="w-6 h-6"></i>
                    </div>
                    <h4 class="text-lg font-bold mb-3">Butuh Bantuan?</h4>
                    <p class="text-blue-100 text-sm leading-relaxed mb-6">
                        Jika Anda mengalami kendala saat memilih dosen atau data prodi tidak muncul, silakan hubungi
                        bagian Admin Prodi masing-masing.
                    </p>
                    {{-- <a href="#"
                        class="block w-full py-3 bg-white text-blue-600 rounded-xl font-bold text-center text-sm hover:bg-blue-50 transition-colors">
                        Panduan Sistem
                    </a> --}}
                </div>

                <!-- Info Box 2 -->
                <div class="bg-white rounded-[2rem] p-8 border border-slate-200">
                    <h4 class="text-slate-800 font-bold mb-4 flex items-center gap-2">
                        <i data-lucide="info" class="w-5 h-5 text-blue-500"></i>
                        Penting
                    </h4>
                    <ul class="space-y-4">
                        <li class="flex gap-3 text-sm text-slate-500">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-green-500 shrink-0"></i>
                            Satu akun hanya diperbolehkan mendaftar satu kali.
                        </li>
                        <li class="flex gap-3 text-sm text-slate-500">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-green-500 shrink-0"></i>
                            Pemilihan dosen bersifat "First Come First Served".
                        </li>
                        <li class="flex gap-3 text-sm text-slate-500">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-green-500 shrink-0"></i>
                            Pastikan judul yang diajukan sudah dikonsultasikan sebelumnya.
                        </li>
                    </ul>
                </div>
            </div>

        </div>

        <footer class="mt-16 text-center text-slate-400 text-sm">
            <p>&copy; {{ date('Y') }} Institut Digital Ekonomi LPKIA Bandung. All rights reserved.</p>
        </footer>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Init Icons
            if (window.lucide) {
                window.lucide.createIcons();
            }

            // Toast Notifications (Simple custom version for demo)
            const showToast = (type, title, message) => {
                // You can keep your SweetAlert2 logic here as per your previous setup
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                });
            };

            @if (session('success'))
                showToast('success', 'Berhasil', '{{ session('success') }}');
            @endif

            // Dynamic Dropdown Dosen (Same logic, better UI)
            document.getElementById('prodi').addEventListener('change', function() {
                let prodiId = this.value;
                let dosenSelect = document.getElementById('dosen');

                dosenSelect.disabled = true;
                dosenSelect.innerHTML = '<option> Memuat daftar dosen...</option>';

                fetch('/get-dosen/' + prodiId)
                    .then(res => res.json())
                    .then(data => {
                        dosenSelect.disabled = false;
                        dosenSelect.innerHTML =
                            '<option value="" disabled selected>Pilih Dosen Pembimbing</option>';

                        data.forEach(d => {
                            let option = document.createElement('option');
                            if (d.full) {
                                option.text = ` ${d.nama} (Kuota Penuh)`;
                                option.disabled = true;
                            } else {
                                option.value = d.id;
                                option.text =
                                    ` ${d.nama} - ${d.jenjang} (Sisa: ${d.sisa})`;
                            }
                            dosenSelect.appendChild(option);
                        });
                    });
            });

            // Submit Loading
            document.getElementById('formPendaftaran').addEventListener('submit', function() {
                const btn = document.getElementById('btnSubmit');
                btn.innerHTML =
                    '<i data-lucide="loader-2" class="w-5 h-5 animate-spin"></i><span>Mengirim Data...</span>';
                btn.classList.add('opacity-80', 'pointer-events-none');
                window.lucide.createIcons();
            });
        });
    </script>
</body>

</html>
