<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bukopin;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\BukopinsImport;

class BukopinController extends Controller
{
    public function index(){
        $bukopins = Bukopin::orderBy('created_at', 'asc')->get();

        return view('bukopins.index', ['bukopins' => $bukopins]);
    }

    public function create(){
        return view('bukopins.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'nama_debitur' => 'nullable|string|max:255',
            'nomor_rekening' => 'nullable|string|max:255',
            'cabang_bank' => 'nullable|string|max:255',
            'nilai_tuntutan' => 'nullable|string|max:255',
            'nilai_net_klaim' => 'nullable|string|max:255',
            'jw_awal' => 'nullable|date',
            'jw_akhir' => 'nullable|date'

            // 'status' => 'nullable|string|max:255'
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

        Bukopin::create($data);

        return redirect()->route('dashboard', ['table' => 'bukopin'])->with('success', 'Klaim baru berhasil ditambahkan!');
    }

    public function edit(Bukopin $bukopins){
        return view('bukopins.edit', ['bukopins' => $bukopins]);
    }

    public function update(Bukopin $bukopins, Request $request){
        $data = $request->validate([
            'nama_debitur' => 'nullable|string|max:255',
            'nomor_rekening' => 'nullable|string|max:255',
            'cabang_bank' => 'nullable|string|max:255',
            'nilai_tuntutan' => 'nullable|string|max:255',
            'nilai_net_klaim' => 'nullable|string|max:255',
            'jw_awal' => 'nullable|string|max:255',
            'jw_akhir' => 'nullable|string|max:255'

            // 'status' => 'nullable|string|max:255'
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

        $bukopins->update($data);

        return back()->with('success', 'Klaim berhasil di-update!');
    }

    public function destroy(Bukopin $bukopins){
        $bukopins->delete();
        return redirect(route('dashboard'))->with('success', 'Klaim berhasil dihapus!');
    }

    public function search(Request $request){
        $keyword = $request->query('q', '');

        $data = Bukopin::where('nama_debitur', 'like', "%$keyword%")
        ->orWhere('nomor_rekening', 'like', "%$keyword%")
        ->orWhere('cabang_bank', 'like', "%$keyword%")
        ->orWhere('nilai_tuntutan', 'like', "%$keyword%")
        ->orWhere('nilai_net_klaim', 'like', "%$keyword%")
        ->orWhere('jw_awal', 'like', "%$keyword%")
        ->orWhere('jw_akhir', 'like', "%$keyword%")

        // ->orWhere('status', 'like', "%$keyword%")

        ->get();

        return view('components.bukopin-table', [
            'bukopins' => $data
        ]);
    }

    public function upload(Request $request){
        $request->validate([
            'file' => 'required|file|mimes:xls,xlsx'
        ]);

        Excel::import(new BukopinsImport, $request->file('file'));
        
        return redirect()->route('dashboard')->with('success', 'Excel berhasil di-import!');
    }
}
