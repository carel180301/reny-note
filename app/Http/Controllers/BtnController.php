<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Btn;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\BtnsImport;

class BtnController extends Controller
{
    public function index(){
        $btns = Btn::orderBy('created_at', 'asc')->get();

        return view('btns.index', ['btns' => $btns]);
    }

    public function create(){
        return view('btns.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'cabang_bank' => 'nullable|string|max:255'
            // 'nama' => 'nullable|string|max:255',
            // 'nomor_rekening' => 'nullable|string|max:255',
            // 'nilai_tuntutan' => 'nullable|string|max:255',
            // 'net_klaim' => 'nullable|string|max:255',
            // 'tanggal_dokumen_diterima' => 'nullable|date',
            // 'tanggal_disetujui' => 'nullable|date',
            // 'status' => 'nullable|string|max:50',
            // 'tambahan_data' => 'nullable|string|max:255'

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

        Btn::create($data);

        // return redirect(route('dashboard'))->with('success', 'Klaim baru berhasil ditambahkan!');
        return redirect()->route('dashboard', ['table' => 'btn'])->with('success', 'Klaim baru berhasil ditambahkan!');
    }

    public function edit(Btn $btns){
        return view('btns.edit', ['btns' => $btns]);
    }

    public function update(Btn $btns, Request $request){
        $data = $request->validate([
            'cabang_bank' => 'nullable|string|max:255'
            // 'nama' => 'nullable|string|max:255',
            // 'nomor_rekening' => 'nullable|string|max:255',
            // 'nilai_tuntutan' => 'nullable|string|max:255',
            // 'net_klaim' => 'nullable|string|max:255',
            // 'tanggal_dokumen_diterima' => 'nullable|string|max:255',
            // 'tanggal_disetujui' => 'nullable|string|max:255',
            // 'status' => 'nullable|string|max:50',
            // 'tambahan_data' => 'nullable|string|max:255'


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

        $btns->update($data);

        return back()->with('success', 'Klaim berhasil di-update!');
    }

    public function destroy(Btn $btns){
        $btns->delete();
        return redirect(route('dashboard'))->with('success', 'Klaim berhasil dihapus!');
    }

    public function search(Request $request){
        $keyword = $request->query('q', '');

        $data = Btn::where('cabang_bank', 'like', "%$keyword%")
        // ->orWhere('nama', 'like', "%$keyword%")
        // ->orWhere('nomor_rekening', 'like', "%$keyword%")
        // ->orWhere('nilai_tuntutan', 'like', "%$keyword%")
        // ->orWhere('net_klaim', 'like', "%$keyword%")
        // ->orWhere('tanggal_dokumen_diterima', 'like', "%$keyword%")
        // ->orWhere('tanggal_disetujui', 'like', "%$keyword%")
        // ->orWhere('status', 'like', "%$keyword%")
        // ->orWhere('tambahan_data', 'like', "%$keyword%")

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

        return view('components.btn-table', [
            'btns' => $data
        ]);
    }

    public function upload(Request $request){
        $request->validate([
            'file' => 'required|file|mimes:xls,xlsx'
        ]);

        Excel::import(new BtnsImport, $request->file('file'));
        
        return redirect()->route('dashboard')->with('success', 'Excel berhasil di-import!');
    }
}
