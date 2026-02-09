<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bjb;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\BjbsImport;

class BjbController extends Controller
{
    public function index(){
        $bjbs = Bjb::orderBy('created_at', 'asc')->get();

        return view('bjbs.index', ['bjbs' => $bjbs]);
    }

    public function create(){
        return view('bjbs.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'cabang_bank' => 'nullable|string|max:255',
            'nama_debitur' => 'nullable|string|max:255',
            'nomor_rekening' => 'nullable|string|max:255',
            'tuntutan' => 'nullable|string|max:255',
            'net_klaim' => 'nullable|string|max:255',
            'tanggal_dokumen_diterima' => 'nullable|date',
            'status' => 'nullable|string|max:255',
            'keterangan' => 'nullable|string|max:255',
            'nomor_cl' => 'nullable|string|max:255'

            // 'nomor_dokumen_diterima' => 'nullable|string|max:255',
            
            // 'jw_awal' => 'nullable|date',
            // 'jw_akhir' => 'nullable|date',
            // 'tanggal_cl' => 'nullable|date',
            // 'nomor_cl' => 'nullable|string|max:255',
            // 'nomor_memo_permohonan_pembayaran_klaim' => 'nullable|string|max:255',
            // 'tanggal_pembayaran_klaim' => 'nullable|date',
            // 'tanggal_pelunasan_di_bagian_keuangan' => 'nullable|date'
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

        Bjb::create($data);

        return redirect()->route('dashboard', ['table' => 'bjb'])->with('success', 'Klaim baru berhasil ditambahkan!');
    }

    public function edit(Bjb $bjbs){
        return view('bjbs.edit', ['bjbs' => $bjbs]);
    }

    public function update(Bjb $bjbs, Request $request){
        $data = $request->validate([
            'cabang_bank' => 'nullable|string|max:255',
            'nama_debitur' => 'nullable|string|max:255',
            'nomor_rekening' => 'nullable|string|max:255',
            'tuntutan' => 'nullable|string|max:255',
            'net_klaim' => 'nullable|string|max:255',
            'tanggal_dokumen_diterima' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:255',
            'Keterangan' => 'nullable|string|max:255',
            'nomor_cl' => 'nullable|string|max:255'

            // 'cabang_bank' => 'nullable|string|max:255',
            // 'jw_awal' => 'nullable|string|max:255',
            // 'jw_akhir' => 'nullable|string|max:255',
            // 'tanggal_cl' => 'nullable|string|max:255',
            // 'nomor_memo_permohonan_pembayaran_klaim' => 'nullable|string|max:255',
            // 'tanggal_memo_permohonan_pembayaran_klaim' => 'nullable|string|max:255',
            // 'tanggal_pembayaran_klaim' => 'nullable|string|max:255',
            // 'tanggal_pelunasan_di_bagian_keuangan' => 'nullable|string|max:255'
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

        $bjbs->update($data);

        return back()->with('success', 'Klaim berhasil di-update!');
    }

    public function destroy(Bjb $bjbs){
        $bjbs->delete();
        return redirect(route('dashboard'))->with('success', 'Klaim berhasil dihapus!');
    }

    public function search(Request $request){
        $keyword = $request->query('q', '');

        $data = Bjb::where('cabang_bank', 'like', "%$keyword%")
        ->orWhere('nama_debitur', 'like', "%$keyword%")
        ->orWhere('nomor_rekening', 'like', "%$keyword%")
        ->orWhere('tuntutan', 'like', "%$keyword%")
        ->orWhere('net_klaim', 'like', "%$keyword%")
        ->orWhere('tanggal_dokumen_diterima', 'like', "%$keyword%")
        ->orWhere('status', 'like', "%$keyword%")
        ->orWhere('keterangan', 'like', "%$keyword%")
        ->orWhere('nomor_Cl', 'like', "%$keyword%")

        // ->orWhere('jw_awal', 'like', "%$keyword%")
        // ->orWhere('jw_akhir', 'like', "%$keyword%")
        // ->orWhere('tanggal_cl', 'like', "%$keyword%")
        // ->orWhere('nomor_memo_permohonan_pembayaran_klaim', 'like', "%$keyword%")
        // ->orWhere('tanggal_memo_permohonan_pembayaran_klaim', 'like', "%$keyword%")
        // ->orWhere('tanggal_pembayaran_klaim', 'like', "%$keyword%")
        // ->orWhere('tanggal_pelunasan_di_bagian_keuangan', 'like', "%$keyword%")
        ->get();

        return view('components.bjb-table', [
            'bjbs' => $data
        ]);
    }

    public function upload(Request $request){
        $request->validate([
            'file' => 'required|file|mimes:xls,xlsx'
        ]);

        Excel::import(new BjbsImport, $request->file('file'));
        
        return redirect()->route('dashboard')->with('success', 'Excel berhasil di-import!');
    }
}
