<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asum;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AsumsImport;

class AsumController extends Controller
{
    public function index(){
        $asums = Asum::orderBy('created_at', 'asc')->get();
        return view('asums.index', ['asums' => $asums]);
    }

    public function create(){
        return view('asums.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'nama_tertanggung' => 'required',
            'posisi' => 'required',
            'cob' => 'required',
            'nama_pekerjaan' => 'required'
            // 'nomor_polis' => 'required',
            // 'tanggal_polis' => 'required',
            // 'nomor_stgr' => 'required',
            // 'tanggal_stgr' => 'required',
            // 'bulan_stgr' => 'required',
            // 'tanggal_dol' => 'required',
            // 'jangka_waktu_awal' => 'required',
            // 'jangka_waktu_akhir' => 'required',
            // 'penyebab_klaim' => 'required',
            // 'nilai_tsi' => 'required',
            // 'share_ask' => 'required',
            // 'nilai_share_ask' => 'required',
            // 'nilai_tuntutan_klaim' => 'required',
            // 'status' => 'required',
            // 'tindak_lanjut' => 'required',
            // 'nomor_surat_tambahan_data' => 'required',
            // 'tanggal_surat_tambahan_data' => 'required',
            // 'nomor_register_sistem' => 'required',
            // 'tanggal_register_sistem' => 'required',
            // 'status_sistem' => 'required',
            // 'keterangan' => 'required',
            // 'tanggal_persetujuan' => 'required',
            // 'nomor_claim_settlement' => 'required',
            // 'tanggal_claim_settlement' => 'required',
            // 'nomor_surat_persetujuan_atau_penolakan' => 'required',
            // 'tanggal_surat_persetujuan_atau_penolakan' => 'required',
            // 'nomor_memo_permintaan_dana' => 'required',
            // 'tanggal_memo_permintaan_dana' => 'required',
            // 'status_pembayaran' => 'required'
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

        Asum::create($data);
        return redirect()->route('dashboard', ['table' => 'asum'])->with('success', 'Klaim baru berhasil ditambahkan!');
    }

    public function edit(Asum $asums){
        return view('asums.edit', ['asums' => $asums]);
    }

    public function update(Asum $asums, Request $request){
        $data = $request->validate([
            'nama_tertanggung' => 'required',
            'posisi' => 'required',
            'cob' => 'required',
            'nama_pekerjaan' => 'required'
            // 'nomor_polis' => 'required',
            // 'tanggal_polis' => 'required',
            // 'nomor_stgr' => 'required',
            // 'tanggal_stgr' => 'required',
            // 'bulan_stgr' => 'required',
            // 'tanggal_dol' => 'required',
            // 'jangka_waktu_awal' => 'required',
            // 'jangka_waktu_akhir' => 'required',
            // 'penyebab_klaim' => 'required',
            // 'nilai_tsi' => 'required',
            // 'share_ask' => 'required',
            // 'nilai_share_ask' => 'required',
            // 'nilai_tuntutan_klaim' => 'required',
            // 'status' => 'required',
            // 'tindak_lanjut' => 'required',
            // 'nomor_surat_tambahan_data' => 'required',
            // 'tanggal_surat_tambahan_data' => 'required',
            // 'nomor_register_sistem' => 'required',
            // 'tanggal_register_sistem' => 'required',
            // 'status_sistem' => 'required',
            // 'keterangan' => 'required',
            // 'tanggal_persetujuan' => 'required',
            // 'nomor_claim_settlement' => 'required',
            // 'tanggal_claim_settlement' => 'required',
            // 'nomor_surat_persetujuan_atau_penolakan' => 'required',
            // 'tanggal_surat_persetujuan_atau_penolakan' => 'required',
            // 'nomor_memo_permintaan_dana' => 'required',
            // 'tanggal_memo_permintaan_dana' => 'required',
            // 'status_pembayaran' => 'required'
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

        $asums->update($data);
        return back()->with('success', 'Klaim berhasil di-update!');
    }

    public function destroy(Asum $asums){
        $asums->delete();
        return redirect(route('dashboard'))->with('success', 'Klaim berhasil dihapus!');
    }

    public function search(Request $request)
    {
        $keyword = $request->query('q', '');

        $data = Asum::where('nama_tertanggung', 'like', "%$keyword%")
            ->orWhere('posisi', 'like', "%$keyword%")
            ->orWhere('cob', 'like', "%$keyword%")
            ->orWhere('nama_pekerjaan', 'like', "%$keyword%")
            // ->orWhere('nomor_polis', 'like', "%$keyword%")
            // ->orWhere('tanggal_polis', 'like', "%$keyword%")
            // ->orWhere('nomor_stgr', 'like', "%$keyword%")
            // ->orWhere('tanggal_stgr', 'like', "%$keyword%")
            // ->orWhere('bulan_stgr', 'like', "%$keyword%")
            // ->orWhere('tanggal_dol', 'like', "%$keyword%")
            // ->orWhere('jangka_waktu_awal', 'like', "%$keyword%")
            // ->orWhere('jangka_waktu_akhir', 'like', "%$keyword%")
            // ->orWhere('penyebab_klaim', 'like', "%$keyword%")
            // ->orWhere('nilai_tsi', 'like', "%$keyword%")
            // ->orWhere('share_ask', 'like', "%$keyword%")
            // ->orWhere('nilai_share_ask', 'like', "%$keyword%")
            // ->orWhere('nilai_tuntutan_klaim', 'like', "%$keyword%")
            // ->orWhere('status', 'like', "%$keyword%")
            // ->orWhere('tindak_lanjut', 'like', "%$keyword%")
            // ->orWhere('nomor_surat_tambahan_data', 'like', "%$keyword%")
            // ->orWhere('tanggal_surat_tambahan_data', 'like', "%$keyword%")
            // ->orWhere('nomor_register_sistem', 'like', "%$keyword%")
            // ->orWhere('tanggal_register_sistem', 'like', "%$keyword%")
            // ->orWhere('status_sistem', 'like', "%$keyword%")
            // ->orWhere('keterangan', 'like', "%$keyword%")
            // ->orWhere('tanggal_persetujuan', 'like', "%$keyword%")
            // ->orWhere('nomor_claim_settlement', 'like', "%$keyword%")
            // ->orWhere('tanggal_claim_settlement', 'like', "%$keyword%")
            // ->orWhere('nomor_surat_persetujuan_atau_penolakan', 'like', "%$keyword%")
            // ->orWhere('tanggal_surat_persetujuan_atau_penolakan', 'like', "%$keyword%")
            // ->orWhere('nomor_memo_permintaan_dana', 'like', "%$keyword%")
            // ->orWhere('tanggal_memo_permintaan_dana', 'like', "%$keyword%")
            // ->orWhere('status_pembayaran', 'like', "%$keyword%")
            // ->orderBy('created_at', 'asc')
            ->get();

        return view('components.asum-table', [
            'asums' => $data
        ]);
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xls,xlsx'
        ]);

        Excel::import(new AsumImport, $request->file('file'));

        return redirect()->route('dashboard')
            ->with('success', 'Excel berhasil di-import!');
    }
}
