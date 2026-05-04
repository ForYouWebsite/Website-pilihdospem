<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%2364748b' stroke-width='2'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 1.2em;
        }
    </style>
</head>

<body class="bg-slate-50">
    @include('sidebar')

    <main id="mainContent" class="lg:ml-72 min-h-screen transition-all duration-300">
        <!-- Header Page -->
        <div class="bg-white border-b border-slate-200">
            <div class="max-w-4xl mx-auto px-6 py-8">
                <div class="flex items-center gap-4 mb-2">
                    <a href="{{ route('admin-user.index') }}"
                        class="p-2 hover:bg-slate-100 rounded-xl text-slate-500 transition-colors">
                        <i data-lucide="arrow-left" class="w-5 h-5"></i>
                    </a>
                    <div>
                        <h2 class="text-2xl font-bold text-slate-800">Tambah Admin Prodi</h2>
                        <p class="text-sm text-slate-500">Daftarkan akun administrator baru untuk mengelola program
                            studi.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Section -->
        <div class="max-w-4xl mx-auto px-6 py-8">
            <div class="bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden">
                <div class="p-8">
                    @if ($errors->any())
                        <div class="mb-6 bg-red-50 border border-red-200 text-red-600 p-4 rounded-2xl">
                            <ul class="text-sm space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>• {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('admin-user.store') }}" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Nama -->
                            <div class="space-y-2">
                                <label class="text-sm font-bold text-slate-700 ml-1">Nama Lengkap</label>
                                <div class="relative group">
                                    <div
                                        class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-blue-600 transition-colors">
                                        <i data-lucide="user" class="w-5 h-5"></i>
                                    </div>
                                    <input type="text" name="name" placeholder="Masukkan nama lengkap"
                                        class="w-full pl-12 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:ring-4 focus:ring-blue-500/10 focus:border-blue-600 transition-all text-slate-700 font-medium"
                                        required>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="space-y-2">
                                <label class="text-sm font-bold text-slate-700 ml-1">Alamat Email</label>
                                <div class="relative group">
                                    <div
                                        class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-blue-600 transition-colors">
                                        <i data-lucide="mail" class="w-5 h-5"></i>
                                    </div>
                                    <input type="email" name="email" placeholder="nama@lpkia.ac.id"
                                        class="w-full pl-12 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:ring-4 focus:ring-blue-500/10 focus:border-blue-600 transition-all text-slate-700 font-medium"
                                        required>
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="space-y-2">
                                <label class="text-sm font-bold text-slate-700 ml-1">Password Akun</label>
                                <div class="relative group">
                                    <div
                                        class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-blue-600 transition-colors">
                                        <i data-lucide="lock" class="w-5 h-5"></i>
                                    </div>
                                    <input type="password" name="password" placeholder="••••••••"
                                        class="w-full pl-12 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:ring-4 focus:ring-blue-500/10 focus:border-blue-600 transition-all text-slate-700 font-medium"
                                        required>
                                </div>
                            </div>

                            <!-- Prodi Selection -->
                            <div class="space-y-2">
                                <label class="text-sm font-bold text-slate-700 ml-1">Program Studi</label>
                                <div class="relative group">
                                    <div
                                        class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-blue-600 transition-colors">
                                        <i data-lucide="building" class="w-5 h-5"></i>
                                    </div>
                                    <select name="prodi_id"
                                        class="w-full pl-12 pr-10 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:ring-4 focus:ring-blue-500/10 focus:border-blue-600 transition-all text-slate-700 font-medium cursor-pointer"
                                        required>
                                        <option value="" disabled selected>Pilih Program Studi</option>
                                        @foreach ($prodis as $prodi)
                                            <option value="{{ $prodi->id }}">{{ $prodi->nama_prodi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Footer Info -->
                        <div class="bg-blue-50 rounded-2xl p-4 border border-blue-100 flex gap-4">
                            <div
                                class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center text-blue-600 shrink-0">
                                <i data-lucide="shield-check" class="w-5 h-5"></i>
                            </div>
                            <div class="text-[11px] text-blue-700 leading-relaxed">
                                <strong>Pemberitahuan:</strong> Akun admin yang baru dibuat akan memiliki akses penuh
                                untuk mengelola data dosen dan pengajuan mahasiswa pada program studi yang dipilih.
                                Pastikan alamat email aktif.
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row items-center gap-3 pt-4">
                            <button type="submit"
                                class="w-full sm:flex-1 flex items-center justify-center gap-2 px-6 py-4 bg-blue-600 text-white rounded-2xl font-bold hover:bg-blue-700 active:scale-95 transition-all shadow-lg shadow-blue-200">
                                <i data-lucide="user-plus" class="w-5 h-5"></i>
                                Daftarkan Admin
                            </button>
                            <a href="{{ route('admin-user.index') }}"
                                class="w-full sm:w-auto px-8 py-4 bg-slate-100 text-slate-600 rounded-2xl font-bold hover:bg-slate-200 transition-all text-center">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (window.lucide) {
                window.lucide.createIcons();
            }
        });
    </script>
</body>

</html>
