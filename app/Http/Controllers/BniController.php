<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bni;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\BnisImport;

class BniController extends Controller
{
    public function index(){
        $bnis = Bni::orderBy('created_at', 'asc')->get();

        return view('bnis.index', ['bnis' => $bnis]);
    }

    public function create(){
        return view('bnis.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'tahun' => 'nullable|string|max:255',
            'tanggal_dokumen_diterima' => 'nullable|date',
            'nomor_dokumen_diterima' => 'nullable|string|max:255',
            'cabang_bank' => 'nullable|string|max:255',
            'nama_debitur' => 'nullable|string|max:255',
            'nomor_rekening' => 'nullable|string|max:255',
            'nilai_tuntutan' => 'nullable|string|max:255',
            'nilai_net_klaim' => 'nullable|string|max:255',
            'jw_awal' => 'nullable|date',
            'jw_akhir' => 'nullable|date',
            'status' => 'nullable|string|max:255',
            'keterangan' => 'nullable|string|max:255',
            'tanggal_cl' => 'nullable|date',
            'nomor_cl' => 'nullable|string|max:255',
            'nomor_memo_permohonan_pembayaran_klaim' => 'nullable|string|max:255',
            'tanggal_memo_permohonan_pembayaran_klaim' => 'nullable|date',
            'tanggal_pembayaran_klaim' => 'nullable|date',
            'tanggal_pelunasan_di_bagian_keuangan' => 'nullable|date'
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

        Bni::create($data);

        return redirect()->route('dashboard', ['table' => 'bni'])->with('success', 'Klaim baru berhasil ditambahkan!');
    }

    public function edit(Bni $bni){
        return view('bnis.edit', ['bnis'=>$bni]);
    }

    public function update(Bni $bni, Request $request){
        $data = $request->validate([
            'tahun'=>'nullable|string|max:255',
            'tanggal_dokumen_diterima'=>'nullable|date',
            'nomor_dokumen_diterima'=>'nullable|string|max:255',
            'cabang_bank'=>'nullable|string|max:255',
            'nama_debitur'=>'nullable|string|max:255',
            'nomor_rekening'=>'nullable|string|max:255',
            'nilai_tuntutan'=>'nullable|string|max:255',
            'nilai_net_klaim'=>'nullable|string|max:255',
            'jw_awal'=>'nullable|date',
            'jw_akhir'=>'nullable|date',
            'status'=>'nullable|string|max:50',
            'keterangan'=>'nullable|string|max:255',
            'tanggal_cl'=>'nullable|date',
            'nomor_cl'=>'nullable|string|max:255',
            'nomor_memo_permohonan_pembayaran_klaim'=>'nullable|string|max:255',
            'tanggal_memo_permohonan_pembayaran_kaim'=>'nullable|date',
            'tanggal_pembayaran_kaim'=>'nullable|date',
            'tanggal_pelunasan_di_bagian_keuangan'=>'nullable|date',
        ]);

        $bni->update($data);
        return back()->with('success','Klaim berhasil di-update!');
    }

    public function destroy(Bni $bni){
        $bni->delete();
        return redirect(route('dashboard'))->with('success','Klaim berhasil dihapus!');
    }


    public function search(Request $request){
        $keyword = $request->query('q', '');

        $data = Bni::where('tahun', 'like', "%$keyword%")
        ->orWhere('tanggal_dokumen_diterima', 'like', "%$keyword%")
        ->orWhere('nomor_dokumen_diterima', 'like', "%$keyword%")
        ->orWhere('cabang_bank', 'like', "%$keyword%")
        ->orWhere('nama_debitur', 'like', "%$keyword%")
        ->orWhere('nomor_rekening', 'like', "%$keyword%")
        ->orWhere('nilai_tuntutan', 'like', "%$keyword%")
        ->orWhere('nilai_net_klaim', 'like', "%$keyword%")
        ->orWhere('jw_awal', 'like', "%$keyword%")
        ->orWhere('jw_akhir', 'like', "%$keyword%")
        ->orWhere('status', 'like', "%$keyword%")
        ->orWhere('keterangan', 'like', "%$keyword%")
        ->orWhere('tanggal_cl', 'like', "%$keyword%")
        ->orWhere('nomor_Cl', 'like', "%$keyword%")
        ->orWhere('nomor_memo_permohonan_pembayaran_klaim', 'like', "%$keyword%")
        ->orWhere('tanggal_memo_permohonan_pembayaran_klaim', 'like', "%$keyword%")
        ->orWhere('tanggal_pembayaran_klaim', 'like', "%$keyword%")
        ->orWhere('tanggal_pelunasan_di_bagian_keuangan', 'like', "%$keyword%")
        ->get();

        return view('components.bni-table', [
            'bnis' => $data
        ]);
    }

    public function upload(Request $request){
        $request->validate([
            'file' => 'required|file|mimes:xls,xlsx'
        ]);

        Excel::import(new BnisImport, $request->file('file'));
        
        return redirect()->route('dashboard')->with('success', 'Excel berhasil di-import!');
    }
}
