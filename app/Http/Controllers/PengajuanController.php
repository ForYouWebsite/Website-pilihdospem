<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PengajuanExport;


class PengajuanController extends Controller
{
    public function export($prodiId)
    {
        return Excel::download(new PengajuanExport($prodiId), 'data_pengajuan.xlsx');
    }
    public function store(Request $request)
    {
        $dosen = Dosen::find($request->dosen_id);

        // 🔥 CEK KUOTA
        if ($dosen->isFull()) {
            return back()->with('error', 'Kuota dosen sudah penuh!');
        }

        $existing = Pengajuan::where('nim', $request->nim)
            ->whereIn('status', ['pending', 'disetujui'])
            ->first();

        if ($existing) {
            return back()->with('error', 'NIM anda sudah mengajukan, silakan tunggu ACC / Tolak');
        }

        Pengajuan::create([
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'nim' => $request->nim,
            'no_hp' => $request->no_hp,
            'tema_ta' => $request->tema_ta,
            'dosen_id' => $request->dosen_id,
            'prodi_id' => $request->prodi_id,
            'status' => 'pending'
        ]);

        return back()->with('success', 'Pengajuan berhasil dikirim!');
    }
    public function index()
    {
        $pengajuans = Pengajuan::with('dosen')
            ->where('prodi_id', Auth::user()->prodi_id)
            ->get();

        return view('admin.pengajuan.index', compact('pengajuans'));
    }
    public function approve($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);

        if ($pengajuan->prodi_id != Auth::user()->prodi_id) {
            abort(403);
        }

        if ($pengajuan->status != 'pending') {
            return back()->with('error', 'Status sudah diproses!');
        }
        if ($pengajuan->dosen->isFull()) {
            return back()->with('error', 'Kuota dosen sudah penuh!');
        }

        $pengajuan->update([
            'status' => 'disetujui'
        ]);

        return back()->with('success', 'Pengajuan disetujui');
    }

    public function reject(Request $request, $id)
    {
        $pengajuan = Pengajuan::findOrFail($id);

        if ($pengajuan->prodi_id != Auth::user()->prodi_id) {
            abort(403);
        }

        if ($pengajuan->status != 'pending') {
            return back()->with('error', 'Status sudah diproses!');
        }

        $pengajuan->update([
            'status' => 'ditolak',
            'alasan' => $request->alasan
        ]);

        return back()->with('success', 'Pengajuan ditolak');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function show(Pengajuan $pengajuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengajuan $pengajuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengajuan $pengajuan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengajuan $pengajuan)
    {
        //
    }
}
