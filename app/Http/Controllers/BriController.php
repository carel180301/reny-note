<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bri;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\BrisImport;

class BriController extends Controller
{
    public function index(){
        $bris = Bri::orderBy('created_at', 'asc')->get();

        return view('bris.index', ['bris' => $bris]);
    }

    public function create(){
        return view('bris.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'unit' => 'nullable|required_without_all:cabang_bank,unit',
            'cabang_bank' => 'nullable|required_without_all:unit,nama_debitur',
            'nama_debitur' => 'nullable|required_without_all:unit,cabang_bank',
            'nomor_rekening' => 'nullable|required_without_all:unit,nomor_rekening',
            'nilai_tuntutan_klaim' => 'nullable|required_without_all:unit,nomor_rekening',
            'tanggal_klaim_diterima' => 'nullable|required_without_all:unit,nomor_rekening',
            'tanggal_klaim_masuk_portal' => 'nullable|required_without_all:unit,nomor_rekening',
            'status' => 'nullable|required_without_all:unit,nomor_rekening',
            'tambahan_data' => 'nullable|required_without_all:unit,nomor_rekening',
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

        Bri::create($data);

        // return redirect(route('dashboard'))->with('success', 'Klaim baru berhasil ditambahkan!');
        return redirect()->route('dashboard', ['table' => 'bri'])->with('success', 'Klaim baru berhasil ditambahkan!');
    }

    public function edit(Bri $bris){
        return view('bris.edit', ['bris' => $bris]);
    }

    public function update(Bri $bris, Request $request){
        $data = $request->validate([
            'unit' => 'nullable|required_without_all:cabang_bank,nama_debitur',
            'cabang_bank' => 'nullable|required_without_all:unit,nama_debitur',
            'nama_debitur' => 'nullable|required_without_all:unit,cabang_bank',
            'nomor_rekening' => 'nullable|required_without_all:unit,cabang_bank',
            'nilai_tuntutan_klaim' => 'nullable|required_without_all:unit,cabang_bank',
            'tanggal_klaim_diterima'=> 'nullable|required_without_all:unit,nomor_rekening',
            'tanggal_klaim_masuk_portal'=> 'nullable|required_without_all:unit,nomor_rekening',
            'status'=> 'nullable|required_without_all:unit,nomor_rekening',
            'tambahan_data'=> 'nullable|required_without_all:unit,nomor_rekening'
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

        $bris->update($data);

        return back()->with('success', 'Klaim berhasil di-update!');
    }

    public function destroy(Bri $bris){
        $bris->delete();
        return redirect(route('dashboard'))->with('success', 'Klaim berhasil dihapus!');
    }

    public function search(Request $request){
        $keyword = $request->query('q', '');

        $data = Bri::where('unit', 'like', "%$keyword%")
        ->orWhere('cabang_bank', 'like', "%$keyword%")
        ->orWhere('nama_debitur', 'like', "%$keyword%")
        ->orWhere('nomor_rekening', 'like', "%$keyword%")
        ->orWhere('nilai_tuntutan_klaim', 'like', "%$keyword%")
        ->orWhere('tanggal_klaim_diterima', 'like', "%$keyword%")
        ->orWhere('tanggal_klaim_masuk_portal', 'like', "%$keyword%")
        ->orWhere('status', 'like', "%$keyword%")
        ->orWhere('tambahan_data', 'like', "%$keyword%")
        ->get();

        return view('components.bri-table', [
            'bris' => $data
        ]);
    }

    public function upload(Request $request){
        $request->validate([
            'file' => 'required|file|mimes:xls,xlsx'
        ]);

        Excel::import(new BrisImport, $request->file('file'));
        
        return redirect()->route('dashboard')->with('success', 'Excel berhasil di-import!');
    }
}
