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
    @include('sidebar') <!-- Menggunakan layout utama yang ada Sidebar/Bottom Nav -->

    <main id="mainContent" class="lg:ml-72 min-h-screen transition-all duration-300">
        <!-- Header Page -->
        <div class="bg-white border-b border-slate-200">
            <div class="max-w-4xl mx-auto px-6 py-8">
                <div class="flex items-center gap-4 mb-2">
                    <a href="{{ route('prodi.index') }}"
                        class="p-2 hover:bg-slate-100 rounded-xl text-slate-500 transition-colors">
                        <i data-lucide="arrow-left" class="w-5 h-5"></i>
                    </a>
                    <div>
                        <h2 class="text-2xl font-bold text-slate-800">Edit Program Studi</h2>
                        <p class="text-sm text-slate-500">Perbarui informasi nama program studi dalam sistem.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Section -->
        <div class="max-w-4xl mx-auto px-6 py-8">
            <div class="bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden">
                <div class="p-8">
                    <form action="{{ route('prodi.update', $prodi->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Input Group -->
                        <div class="space-y-2">
                            <label for="nama_prodi" class="text-sm font-bold text-slate-700 ml-1">
                                Nama Program Studi
                            </label>
                            <div class="relative group">
                                <div
                                    class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-blue-500 transition-colors">
                                    <i data-lucide="graduation-cap" class="w-5 h-5"></i>
                                </div>
                                <input type="text" name="nama_prodi" id="nama_prodi"
                                    value="{{ old('nama_prodi', $prodi->nama_prodi) }}"
                                    placeholder="Contoh: Teknik Informatika"
                                    class="w-full pl-12 pr-4 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition-all text-slate-700 font-medium"
                                    required>
                            </div>

                            @error('nama_prodi')
                                <div
                                    class="flex items-center gap-2 mt-2 text-rose-600 text-xs font-bold bg-rose-50 p-3 rounded-xl border border-rose-100">
                                    <i data-lucide="alert-circle" class="w-4 h-4"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Info Card -->
                        <div class="bg-blue-50 rounded-2xl p-4 border border-blue-100 flex gap-4">
                            <div
                                class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center text-blue-600 shrink-0">
                                <i data-lucide="info" class="w-5 h-5"></i>
                            </div>
                            <div class="text-xs text-blue-700 leading-relaxed">
                                Pastikan penulisan nama Program Studi sudah benar sesuai dengan SK atau ketentuan kampus
                                yang berlaku untuk menghindari kesalahan data pada laporan.
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row items-center gap-3 pt-4">
                            <button type="submit"
                                class="w-full sm:flex-1 flex items-center justify-center gap-2 px-6 py-4 bg-blue-600 text-white rounded-2xl font-bold hover:bg-blue-700 active:scale-95 transition-all shadow-lg shadow-blue-200">
                                <i data-lucide="save" class="w-5 h-5"></i>
                                Simpan Perubahan
                            </button>
                            <a href="{{ route('prodi.index') }}"
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
        // Initialize Lucide Icons
        document.addEventListener('DOMContentLoaded', () => {
            if (window.lucide) {
                window.lucide.createIcons();
            }
        });
    </script>
</body>

</html>
