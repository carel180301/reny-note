<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pantry;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PantrysImport;

class PantryController extends Controller
{
    public function index(){
        $pantrys = Pantry::orderBy('created_at', 'asc')->get();

        return view('pantrys.index', ['pantrys' => $pantrys]);
    }

    public function create(){
        return view('pantrys.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'produk' => 'nullable|string|max:255',
            // 'tanggal_dokumen_diterima' => 'nullable|date',
            // 'status' => 'nullable|string|max:255',
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

        Pantry::create($data);

        return redirect()->route('dashboard', ['table' => 'pantry'])->with('success', 'Klaim baru berhasil ditambahkan!');
    }

    public function edit(Pantry $pantry){
        return view('pantrys.edit', ['pantrys'=>$pantry]);
    }

    public function update(Pantry $pantry, Request $request){
        $data = $request->validate([
            'cabang_bank'=>'nullable|string|max:255',
            // 'tanggal_dokumen_diterima'=>'nullable|date',
            // 'status'=>'nullable|string|max:50',
        ]);

        $pantry->update($data);
        return back()->with('success','Klaim berhasil di-update!');
    }

    public function destroy(Pantry $pantry){
        $pantry->delete();
        return redirect(route('dashboard'))->with('success','Klaim berhasil dihapus!');
    }

    public function search(Request $request){
        $keyword = $request->query('q', '');

        $data = Pantry::where('produk', 'like', "%$keyword%")
        // ->orWhere('jw_akhir', 'like', "%$keyword%")
        ->get();

        return view('components.pantry-table', [
            'pantrys' => $data
        ]);
    }

    public function upload(Request $request){
        $request->validate([
            'file' => 'required|file|mimes:xls,xlsx'
        ]);

        Excel::import(new PantrysImport, $request->file('file'));
        
        return redirect()->route('dashboard')->with('success', 'Excel berhasil di-import!');
    }
}
