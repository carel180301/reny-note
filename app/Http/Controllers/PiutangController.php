<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Piutang;

class PiutangController extends Controller
{
    public function index(){
        $piutangs = Piutang::orderBy('created_at', 'desc')->get();

        return view('piutangs.index', ['piutangs' => $piutangs]);
    }

    public function create(){
        return view('piutangs.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'cob' => 'required',
            'nomor_polis' => 'required',
            // 'nomor_jurnal' => 'required',
            'tanggal_polis' => 'required',
            'broker' => 'required',
            'nama_tertanggung' => 'required',
            'wpc' => 'required',
            'email' => 'required',
            'currency' => 'required',
            // 'tsi' => 'required'
            'outstanding' => 'required'
        ]);

        Piutang::create($data);

        return redirect(route('dashboard'))->with('success', 'Piutang Added Successfully');
    }

    
    public function edit(Piutang $piutang){
        return view('piutangs.edit', ['piutang' => $piutang]);
    }

    public function update(Piutang $piutang, Request $request){
          $data = $request->validate([
            'cob' => 'required',
            'nomor_polis' => 'required',
            // 'nomor_jurnal' => 'required',
            'tanggal_polis' => 'required',
            'broker' => 'required',
            'nama_tertanggung' => 'required',
            'wpc' => 'required',
            'email' => 'required',
            'currency' => 'required',
            // 'tsi' => 'required'
            'outstanding' => 'required'
        ]);

        $piutang->update($data);

        return back()->with('success', 'Piutang Updated Successfully');
    }
    
    public function destroy(Piutang $piutang){
        $piutang->delete();
        return redirect(route('dashboard'))->with('success', 'Piutang Deleted Successfully');
    }

    public function search(Request $request)
    {
        $keyword = $request->query('q', '');

        $data = Piutang::where('nomor_polis', 'like', "%$keyword%")
            ->orWhere('broker', 'like', "%$keyword%")
            ->orWhere('nama_tertanggung', 'like', "%$keyword%")
            ->orWhere('currency', 'like', "%$keyword%")
            ->orWhere('outstanding', 'like', "%$keyword%")
            ->orWhere('email', 'like', "%$keyword%")
            ->orWhere('cob', 'like', "%$keyword%")
            ->orderBy('created_at', 'desc')
            ->get();

        return view('components.piutang-table', [
            'piutangs' => $data
        ])->render();
    }

}
