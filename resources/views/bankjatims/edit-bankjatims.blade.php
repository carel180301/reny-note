<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Klaim</title>
</head>
<body>

<h1>Edit Klaim</h1>

<form method="POST" action="{{ route('bankjatims.update', $bankjatims) }}">
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
        <label>Cabang Bank:</label>
        <input type="text" name="cabang_bank" value="{{ $bankjatims->cabang_bank }}">
    </div>

    <div>
        <label>Nama:</label>
        <input type="text" name="nama" value="{{ $bankjatims->nama }}">
    </div>
    
    <div>
        <label>Nomor Rekening:</label>
        <input type="text" name="nomor_rekening" value="{{ $bankjatims->nomor_rekening }}">
    </div>

    <div>
        <label>Nilai Tuntutan:</label>
        <input type="text" name="nilai_tuntutan" value="{{ $bankjatims->nilai_tuntutan }}">
    </div>

    <div>
        <label>NET Klaim:</label>
        <input type="text" name="net_klaim" value="{{ $bankjatims->net_klaim }}">
    </div>

     <!-- <div>
        <label>Tanggal Dokumen Diterima:</label>
        <input type="date" name="tanggal_klaim_diajukan" value="{{ $bris->tanggal_klaim_diajukan }}">
    </div> -->

    <!-- <div>
        <label>Nama Debitur:</label>
        <input type="text" name="nama_debitur" value="{{ $mandiris->nama_debitur }}">
    </div>

    <div>
        <label>Nomor Rekening:</label>
        <input type="text" name="nomor_rekening" value="{{ $mandiris->nomor_rekening }}">
    </div>

    <div>
        <label>Tuntutan:</label>
        <input type="text" name="tuntutan" value="{{ $mandiris->tuntutan }}">
    </div>

    <div>
        <label>Net Klaim:</label>
        <input type="text" name="net_klaim" value="{{ $mandiris->net_klaim }}">
    </div>
    
   

    <div>
        <label>Status:</label>
        <select name="status">
            <option value="batal" {{ $mandiris->status == 'batal' ? 'selected' : '' }}>Batal</option>
            <option value="disetujui" {{ $mandiris->status == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
            <option value="pending" {{ $mandiris->status == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="regist" {{ $mandiris->status == 'regist' ? 'selected' : '' }}>Regist</option>
            <option value="suspect" {{ $mandiris->status == 'suspect' ? 'selected' : '' }}>Suspect</option>
            <option value="tamdat" {{ $mandiris->status == 'tamdat' ? 'selected' : '' }}>Tamdat</option>
            <option value="tolak" {{ $mandiris->status == 'tolak' ? 'selected' : '' }}>Tolak</option>
        </select>
    </div>

    <div>
        <label>Keterangan:</label>
        <input type="text" name="keterangan" value="{{ $mandiris->keterangan }}">
    </div>

    <div>
        <label>Kekurangan Data:</label>
        <input type="text" name="kekurangan_data" value="{{ $mandiris->kekurangan_data }}">
    </div>
    
    <div>
        <label>Tanggal Update:</label>
        <input type="date" name="tanggal_update" value="{{ $mandiris->tanggal_update }}">
    </div>

    <div>
        <label>Nomor Box:</label>
        <input type="text" name="nomor_box" value="{{ $mandiris->nomor_box }}">
    </div> -->

    <!-- <div>
        <label>Cabang Bank:</label>
        <input type="text" name="cabang_bank" value="{{ $bris->cabang_bank }}">
    </div>

    <div>
        <label>Nilai Tuntutan Klaim:</label>
        <input type="text" name="nilai_tuntutan_klaim" value="{{ $bris->nilai_tuntutan_klaim }}">
    </div>

    <div>
        <label>Tanggal Klaim Masuk Portal:</label>
        <input type="date" name="tanggal_klaim_masuk_portal" value="{{ $bris->tanggal_klaim_masuk_portal }}">
    </div>

    <div>
        <label>Tambahan Data:</label>
        <input type="text" name="tambahan_data" value="{{ $bris->tambahan_data }}">
    </div>

    <div>
        <label>Date Update:</label>
        <input type="date" name="date_update" value="{{ $bris->date_update }}">
    </div>

    <div>
        <label>No Box:</label>
        <input type="text" name="nomor_box" value="{{ $bris->nomor_box }}">
    </div> -->


    <!-- <div>
        <label>Tanggal Polis:</label>
        <input type="date" name="tanggal_polis" value="{{ $akms->tanggal_polis }}">
    </div> -->

    <div>
        <button type="submit">Update</button>
    </div>
</form>

</body>
</html>
