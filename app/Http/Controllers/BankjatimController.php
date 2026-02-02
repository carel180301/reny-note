<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bankjatim;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\BankjatimsImport;

class BankjatimController extends Controller
{
    public function index(){
        $bankjatims = Bankjatim::orderBy('created_at', 'asc')->get();

        return view('bankjatims.index', ['bankjatims' => $bankjatims]);
    }

    public function create(){
        return view('bankjatims.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'cabang_bank' => 'nullable|string|max:255',
            'nama' => 'nullable|string|max:255',
            'nomor_rekening' => 'nullable|string|max:255',
            'nilai_tuntutan' => 'nullable|string|max:255',
            'net_klaim' => 'nullable|string|max:255',
            'tanggal_dokumen_diterima' => 'nullable|date',
            'tanggal_disetujui' => 'nullable|date',
            'status' => 'nullable|string|max:50',
            'tambahan_data' => 'nullable|string|max:255'

            // 'nama_debitur' => 'nullable|string|max:255',
            // 'tuntutan' => 'nullable|string|max:255',
            // 'net_klaim' => 'nullable|string|max:255',
            // 'tanggal_klaim_diajukan' => 'nullable|date',
            // 'keterangan' => 'nullable|string|max:50',
            // 'kekurangan_data' => 'nullable|string|max:50',
            // 'tanggal_update' => 'nullable|date',
            // 'nomor_box' => 'nullable|string|max:50'

            // 'cabang_bank' => 'nullable|string|max:255',

  
            // 'tanggal_klaim_masuk_portal' => 'nullable|date',
            // 'date_update' => 'nullable|date',

            // 'tambahan_data' => 'nullable|string|max:255',
            // 'nomor_box' => 'nullable|string|max:255',
        ]);

        // $data['outstanding'] = str_replace('.', '', $data['outstanding']);
        // $data['outstanding'] = str_replace(',', '.', $data['outstanding']);
        // $data['outstanding'] = (float)$data['outstanding'];

        // if (strpos($data['tanggal_polis'], '/') !== false) {
        //     $data['tanggal_polis'] = \Carbon\Carbon::createFromFormat('d/m/Y', $data['tanggal_polis'])->format('Y-m-d');
        // }
        // if (strpos($data['wpc'], '/') !== false) {
        //     $data['wpc'] = \Carbon\Carbon::createFromFormat('d/m/Y', $data['wpc'])->format('Y-m-d');
        // }

        Bankjatim::create($data);

        // return redirect(route('dashboard'))->with('success', 'Klaim baru berhasil ditambahkan!');
        return redirect()->route('dashboard', ['table' => 'bankjatim'])->with('success', 'Klaim baru berhasil ditambahkan!');
    }

    public function edit(BankJatim $bankjatims){
        return view('bankjatims.edit', ['bankjatims' => $bankjatims]);
    }

    public function update(BankJatim $bankjatims, Request $request){
        $data = $request->validate([
            'cabang_bank' => 'nullable|string|max:255',
            'nama' => 'nullable|string|max:255',
            'nomor_rekening' => 'nullable|string|max:255',
            'nilai_tuntutan' => 'nullable|string|max:255',
            'net_klaim' => 'nullable|string|max:255',
            'tanggal_dokumen_diterima' => 'nullable|string|max:255',
            'tanggal_disetujui' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:50',
            'tambahan_data' => 'nullable|string|max:255'


            // 'nama_debitur' => 'nullable|string|max:255',
            // 'tuntutan' => 'nullable|string|max:255',
            // 'net_klaim' => 'nullable|string|max:255',
            // 'tanggal_klaim_diajukan' => 'nullable|date',
            // 'keterangan' => 'nullable|string|max:50',
            // 'kekurangan_data' => 'nullable|string|max:50',
            // 'tanggal_update' => 'nullable|date',
            // 'nomor_box' => 'nullable|string|max:255',

            // 'cabang_bank' => 'nullable|string|max:255',
            // 'nilai_tuntutan_klaim' => 'nullable|string|max:255',

            // 'tanggal_klaim_diterima' => 'nullable|date',
            // 'tanggal_klaim_masuk_portal' => 'nullable|date',
            // 'date_update' => 'nullable|date',

            // 'tambahan_data' => 'nullable|string|max:255',
            // 'nomor_box' => 'nullable|string|max:255',
        ]);

        // $data['outstanding'] = str_replace('.', '', $data['outstanding']);
        // $data['outstanding'] = str_replace(',', '.', $data['outstanding']);
        // $data['outstanding'] = (float)$data['outstanding'];

        // if (strpos($data['tanggal_polis'], '/') !== false) {
        //     $data['tanggal_polis'] = \Carbon\Carbon::createFromFormat('d/m/Y', $data['tanggal_polis'])->format('Y-m-d');
        // }
        // if (strpos($data['wpc'], '/') !== false) {
        //     $data['wpc'] = \Carbon\Carbon::createFromFormat('d/m/Y', $data['wpc'])->format('Y-m-d');
        // }

        $bankjatims->update($data);

        return back()->with('success', 'Klaim berhasil di-update!');
    }

    public function destroy(BankJatim $bankjatims){
        $bankjatims->delete();
        return redirect(route('dashboard'))->with('success', 'Klaim berhasil dihapus!');
    }

    public function search(Request $request){
        $keyword = $request->query('q', '');

        $data = BankJatim::where('cabang_bank', 'like', "%$keyword%")
        ->orWhere('nama', 'like', "%$keyword%")
        ->orWhere('nomor_rekening', 'like', "%$keyword%")
        ->orWhere('nilai_tuntutan', 'like', "%$keyword%")
        ->orWhere('net_klaim', 'like', "%$keyword%")
        ->orWhere('tanggal_dokumen_diterima', 'like', "%$keyword%")
        ->orWhere('tanggal_disetujui', 'like', "%$keyword%")
        ->orWhere('status', 'like', "%$keyword%")
        ->orWhere('tambahan_data', 'like', "%$keyword%")

        // ->orWhere('net_klaim', 'like', "%$keyword%")
        // ->orWhere('keterangan', 'like', "%$keyword%")
        // ->orWhere('kekurangan_data', 'like', "%$keyword%")
        // ->orWhere('tanggal_update', 'like', "%$keyword%")
        // ->orWhere('nomor_box', 'like', "%$keyword%")

        // ->orWhere('cabang_bank', 'like', "%$keyword%")
        // ->orWhere('nilai_tuntutan_klaim', 'like', "%$keyword%")
        // ->orWhere('tanggal_klaim_diterima', 'like', "%$keyword%")
        // ->orWhere('tanggal_klaim_masuk_portal', 'like', "%$keyword%")
        // ->orWhere('tambahan_data', 'like', "%$keyword%")
        // ->orWhere('date_update', 'like', "%$keyword%")
        // ->orWhere('nomor_box', 'like', "%$keyword%")
        ->get();

        return view('components.bankjatim-table', [
            'bankjatims' => $data
        ]);
    }

    public function upload(Request $request){
        $request->validate([
            'file' => 'required|file|mimes:xls,xlsx'
        ]);

        Excel::import(new BankJatimsImport, $request->file('file'));
        
        return redirect()->route('dashboard')->with('success', 'Excel berhasil di-import!');
    }
}
