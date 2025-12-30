<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Akm;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AkmsImport;

class AkmController extends Controller
{
    public function index(){
        $akms = Akm::orderBy('created_at', 'asc')->get();

        return view('akms.index', ['akms' => $akms]);
    }

    public function create(){
        return view('akms.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'nama_debitur' => 'required',
            'cabang_bank' => 'required',
            'nomor_rekening' => 'required',
            'nomor_polis' => 'required',
            'tanggal_polis' => 'required'
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

        Akm::create($data);

        return redirect(route('dashboard'))->with('success', 'Klaim baru berhasil ditambahkan!');
    }

    public function edit(Akm $akm){
        return view('akms.edit', ['akm' => $akm]);
    }

    public function update(Akm $akm, Request $request){
        $data = $request->validate([
            'nama_debitur' => 'required',
            'cabang_bank' => 'required',
            'nomor_rekening' => 'required',
            'nomor_polis' => 'required',
            'tanggal_polis' => 'required'
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

        $akm->update($data);

        return back()->with('success', 'Klaim berhasil di-update!');
    }

    public function destroy(Akm $akm){
        $akm->delete();
        return redirect(route('dashboard'))->with('success', 'Klaim berhasil dihapus!');
    }

    public function search(Request $request)
    {
        $keyword = $request->query('q', '');

        $data = Akm::where('nama_debitur', 'like', "%$keyword%")
            ->orWhere('cabang_bank', 'like', "%$keyword%")
            ->orWhere('nomor_rekening', 'like', "%$keyword%")
            ->orWhere('nomor_polis', 'like', "%$keyword%")
            ->orWhere('tanggal_polis', 'like', "%$keyword%")
            // ->orWhere('broker', 'like', "%$keyword%")
            // ->orWhere('nama_tertanggung', 'like', "%$keyword%")
            // ->orWhere('currency', 'like', "%$keyword%")
            // ->orWhere('outstanding', 'like', "%$keyword%")
            // ->orWhere('email', 'like', "%$keyword%")
            // ->orWhere('cob', 'like', "%$keyword%")
            // ->orderBy('created_at', 'desc')
            ->get();

        return view('components.akm-table', [
            'akms' => $data
        ]);
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xls,xlsx'
        ]);

        Excel::import(new AkmsImport, $request->file('file'));


        return redirect()->route('dashboard')
            ->with('success', 'Excel berhasil di-import!');
    }
}
