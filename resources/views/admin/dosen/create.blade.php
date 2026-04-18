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
    </style>
</head>

<body class="bg-slate-50">
    @include('sidebar')

    <main id="mainContent" class="lg:ml-72 min-h-screen transition-all duration-300">
        <!-- Header Page -->
        <div class="bg-white border-b border-slate-200">
            <div class="max-w-4xl mx-auto px-6 py-8">
                <div class="flex items-center gap-4 mb-2">
                    <a href="{{ route('dosen.index') }}"
                        class="p-2 hover:bg-slate-100 rounded-xl text-slate-500 transition-colors">
                        <i data-lucide="arrow-left" class="w-5 h-5"></i>
                    </a>
                    <div>
                        <h2 class="text-2xl font-bold text-slate-800">Tambah Data Dosen</h2>
                        <p class="text-sm text-slate-500">Input data dosen pembimbing beserta keahlian dan kuota
                            bimbingan.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Section -->
        <div class="max-w-4xl mx-auto px-6 py-8">
            <div class="bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden">
                <div class="p-8">
                    <form method="POST" action="{{ route('dosen.store') }}" class="space-y-6">
                        @csrf

                        <!-- Nama Dosen -->
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-slate-700 ml-1">Nama Lengkap & Gelar</label>
                            <div class="relative group">
                                <div
                                    class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-blue-600 transition-colors">
                                    <i data-lucide="user-check" class="w-5 h-5"></i>
                                </div>
                                <input type="text" name="nama" placeholder="Contoh: Dr. Ir. Budi Santoso, M.T."
                                    class="w-full pl-12 pr-4 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:ring-4 focus:ring-blue-500/10 focus:border-blue-600 transition-all text-slate-700 font-medium"
                                    required>
                            </div>
                        </div>

                        <!-- Bidang Keahlian -->
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-slate-700 ml-1">Bidang Keahlian</label>
                            <div class="relative group">
                                <div
                                    class="absolute top-4 left-0 pl-4 flex items-start pointer-events-none text-slate-400 group-focus-within:text-blue-600 transition-colors">
                                    <i data-lucide="award" class="w-5 h-5"></i>
                                </div>
                                <textarea name="bidang_keahlian" rows="4"
                                    placeholder="Jelaskan spesialisasi dosen (contoh: Artificial Intelligence, Data Science, Web Security...)"
                                    class="w-full pl-12 pr-4 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:ring-4 focus:ring-blue-500/10 focus:border-blue-600 transition-all text-slate-700 font-medium resize-none"></textarea>
                            </div>
                        </div>

                        <!-- Kuota -->
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-slate-700 ml-1">Kuota Bimbingan</label>
                            <div class="relative group w-full md:w-1/3">
                                <div
                                    class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-blue-600 transition-colors">
                                    <i data-lucide="users" class="w-5 h-5"></i>
                                </div>
                                <input type="number" name="kuota" placeholder="0" min="1"
                                    class="w-full pl-12 pr-4 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:ring-4 focus:ring-blue-500/10 focus:border-blue-600 transition-all text-slate-700 font-medium"
                                    required>
                            </div>
                            <p class="text-[11px] text-slate-400 ml-1 italic">*Jumlah maksimal mahasiswa yang dapat
                                dibimbing.</p>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row items-center gap-3 pt-6 border-t border-slate-100">
                            <button type="submit"
                                class="w-full sm:flex-1 flex items-center justify-center gap-2 px-6 py-4 bg-blue-600 text-white rounded-2xl font-bold hover:bg-blue-700 active:scale-95 transition-all shadow-lg shadow-blue-200">
                                <i data-lucide="save" class="w-5 h-5"></i>
                                Simpan Data Dosen
                            </button>
                            <a href="{{ route('dosen.index') }}"
                                class="w-full sm:w-auto px-8 py-4 bg-slate-100 text-slate-600 rounded-2xl font-bold hover:bg-slate-200 transition-all text-center">
                                Kembali
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
