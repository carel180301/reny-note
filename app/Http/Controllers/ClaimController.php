<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Claim;

class ClaimController extends Controller
{
    public function index(){
        $claims = Claim::orderBy('created_at', 'desc')->get();

        return view('claims.index', ['claims' => $claims]);
    }

    public function create(){
        return view('claims.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'nomor_rekening' => 'required'
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

        Claim::create($data);

        return redirect(route('dashboard'))->with('success', 'Klaim baru berhasil ditambahkan!');
    }

    public function edit(Claim $claim){
        return view('claims.edit', ['claim' => $claim]);
    }

    public function update(Claim $claim, Request $request){
        $data = $request->validate([
            'nomor_rekening' => 'required'
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

        $claim->update($data);

        return back()->with('success', 'Klaim berhasil di-update!');
    }

    public function destroy(Claim $claim){
        $claim->delete();
        return redirect(route('dashboard'))->with('success', 'Klaim berhasil dihapus!');
    }

    public function search(Request $request)
    {
        $keyword = $request->query('q', '');

        $data = Claim::where('nomor_rekening', 'like', "%$keyword%")
            // ->orWhere('broker', 'like', "%$keyword%")
            // ->orWhere('nama_tertanggung', 'like', "%$keyword%")
            // ->orWhere('currency', 'like', "%$keyword%")
            // ->orWhere('outstanding', 'like', "%$keyword%")
            // ->orWhere('email', 'like', "%$keyword%")
            // ->orWhere('cob', 'like', "%$keyword%")
            // ->orderBy('created_at', 'desc')
            ->get();

        return view('components.claim-table', [
            'claims' => $data
        ]);
    }
}
