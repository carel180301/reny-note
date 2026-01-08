<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Klaim</title>
</head>
<body>

<h1>Edit Klaim</h1>

<form method="POST" action="{{ route('asums.update', $asums) }}">
    @csrf
    @method('PUT')

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div>
        <label>Nama Tertanggung:</label>
        <input type="text" name="nama_tertanggung" value="{{ $asums->nama_tertanggung }}">
    </div>

    <!-- <div>
        <label>Posisi:</label>
        <select name="posisi">
            <option value="member" {{ $asums->status == 'member' ? 'selected' : '' }}>member</option>
        </select>
    </div>

    <div>
        <label>COB:</label>
        <input type="text" name="cob" value="{{ $asums->cob }}">
    </div>

    <div>
        <label>Nama Pekerjaan:</label>
        <input type="text" name="nama_pekerjaan" value="{{ $asums->nama_pekerjaan }}">
    </div>

    <div>
        <label>Nomor Polis:</label>
        <input type="text" name="nomor_polis" value="{{ $asums->nomor_polis }}">
    </div>

    <div>
        <label>Tanggal Polis:</label>
        <input type="date" name="tanggal_polis" value="{{ $asums->tanggal_polis }}">
    </div>

    <div>
        <label>Nomor STGR:</label>
        <input type="text" name="nomor_stgr" value="{{ $asums->nomor_stgr }}">
    </div>

    <div>
        <label>Tanggal STGR:</label>
        <input type="date" name="tanggal_stgr" value="{{ $asums->tanggal_stgr }}">
    </div>

    <div>
        <label>Bulan STGR:</label>
        <input type="text" name="bulan_stgr" value="{{ $asums->bulan_stgr }}">
    </div>

    <div>
        <label>Tanggal DOL:</label>
        <input type="date" name="tanggal_dol" value="{{ $asums->tanggal_dol }}">
    </div>

    <div>
        <label>Jangka Waktu Awal:</label>
        <input type="date" name="jangka_waktu_awal" value="{{ $asums->jangka_waktu_awal }}">
    </div>

    <div>
        <label>Jangka Waktu Akhir:</label>
        <input type="date" name="jangka_waktu_akhir" value="{{ $asums->jangka_waktu_akhir }}">
    </div>

    <div>
        <label>Penyebab Klaim:</label>
        <input type="text" name="penyebab_klaim" value="{{ $asums->penyebab_klaim }}">
    </div>

    <div>
        <label>Nilai TSI:</label>
        <input type="text" name="nilai_tsi" value="{{ $asums->nilai_tsi }}">
    </div>

    <div>
        <label>Share ASK:</label>
        <input type="text" name="share_ask" value="{{ $asums->share_ask }}">
    </div>

    <div>
        <label>Nilai Share ASK:</label>
        <input type="text" name="nilai_share_ask" value="{{ $asums->nilai_share_ask }}">
    </div>

    <div>
        <label>Nilai Tuntutan Klaim:</label>
        <input type="text" name="nilai_tuntutan_klaim" value="{{ $asums->nilai_tuntutan_klaim }}">
    </div>

    <div>
        <label>Status:</label>
        <select name="status">
            <option value="tambahan data" {{ $asums->status == 'tambahan_data' ? 'selected' : '' }}>Tambahan Data</option>
        </select>
    </div>

    <div>
        <label>Tindak Lanjut:</label>
        <input type="text" name="tindak_lanjut" value="{{ $asums->tindak_lanjut }}">
    </div>

    <div>
        <label>Tindak Lanjut:</label>
        <input type="text" name="tindak_lanjut" value="{{ $asums->tindak_lanjut }}">
    </div>

    <div>
        <label>Nomor Surat Tambahan Data:</label>
        <input type="text" name="nomor_surat_tambahan_data" value="{{ $asums->nomor_surat_tambahan_data }}">
    </div>

    <div>
        <label>Tanggal Surat Tambahan Data:</label>
        <input type="date" name="tanggal_surat_tambahan_data" value="{{ $asums->tanggal_surat_tambahan_data }}">
    </div>

    <div>
        <label>Nomor Register Sistem:</label>
        <input type="text" name="nomor_register_sistem" value="{{ $asums->nomor_register_sistem }}">
    </div>

    <div>
        <label>Tanggal Register Sistem:</label>
        <input type="date" name="tanggal_register_sistem" value="{{ $asums->tanggal_register_sistem }}">
    </div>
    
    <div>
        <label>Status Sistem:</label>
        <select name="status_sistem">
            <option value="" {{ $asums->status_sistem == 'a' ? 'selected' : '' }}>-</option>
        </select>
    </div>

    <div>
        <label>Keterangan / Feedback Pemutus:</label>
        <input type="text" name="keterangan" value="{{ $asums->keterangan }}">
    </div>

    <div>
        <label>Tanggal Persetujuan:</label>
        <input type="date" name="tanggal_persetujuan" value="{{ $asums->tanggal_persetujuan }}">
    </div>

    <div>
        <label>Nomor Claim Settlement:</label>
        <input type="text" name="nomor_claim_settlement" value="{{ $asums->nomor_claim_settlement }}">
    </div>

    <div>
        <label>Tanggal Claim Settlement:</label>
        <input type="date" name="tanggal_claim_settlement" value="{{ $asums->tanggal_claim_settlement }}">
    </div>

    <div>
        <label>Nomor Surat Persetujuan atau Penolakan:</label>
        <input type="text" name="nomor_surat_persetujuan_atau_penolakan" value="{{ $asums->nomor_surat_persetujuan_atau_penolakan }}">
    </div>
    
    <div>
        <label>Tanggal Surat Persetujuan atau Penolakan:</label>
        <input type="date" name="tanggal_surat_persetujuan_atau_penolakan" value="{{ $asums->tanggal_surat_persetujuan_atau_penolakan }}">
    </div>

    <div>
        <label>Nomor Memo Permintaan Dana:</label>
        <input type="text" name="nomor_memo_permintaan_dana" value="{{ $asums->nomor_memo_permintaan_dana }}">
    </div>

    <div>
        <label>Tanggal Memo Permintaan Dana:</label>
        <input type="date" name="tanggal_memo_permintaan_dana" value="{{ $asums->tanggal_memo_permintaan_dana }}">
    </div>

    <div>
        <label>Status Pembayaran:</label>
        <select name="status_pembayaran">
            <option value="a" {{ $asums->status_pembayaran == 'a' ? 'selected' : '' }}>-</option>
        </select>
    </div> -->

    <div>
        <button type="submit">Update</button>
    </div>
</form>

</body>
</html>
