<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Klaim</title>
</head>
<body>

<h1>Edit Klaim</h1>

<form method="POST" action="{{ route('bris.update', $bris) }}">
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
        <label>Unit:</label>
        <input type="text" name="unit" value="{{ $bris->unit }}">
    </div>

    <div>
        <label>Cabang Bank:</label>
        <input type="text" name="cabang_bank" value="{{ $bris->cabang_bank }}">
    </div>

    <div>
        <label>Nama Debitur:</label>
        <input type="text" name="nama_debitur" value="{{ $bris->nama_debitur }}">
    </div>

    <div>
        <label>Nomor Rekening:</label>
        <input type="text" name="nomor_rekening" value="{{ $bris->nomor_rekening }}">
    </div>

    <div>
        <label>Nilai Tuntutan Klaim:</label>
        <input type="text" name="nilai_tuntutan_klaim" value="{{ $bris->nilai_tuntutan_klaim }}">
    </div>

    <div>
        <label>Tanggal Klaim Diterima:</label>
        <input type="date" name="tanggal_klaim_diterima" value="{{ $bris->tanggal_klaim_diterima }}">
    </div>

    <div>
        <label>Tanggal Klaim Masuk Portal:</label>
        <input type="date" name="tanggal_klaim_masuk_portal" value="{{ $bris->tanggal_klaim_masuk_portal }}">
    </div>

    <div>
        <label>Status:</label>
        <select name="status">
            <option value="batal" {{ $bris->status == 'batal' ? 'selected' : '' }}>Batal</option>
            <option value="disetujui" {{ $bris->status == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
            <option value="pending" {{ $bris->status == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="regist" {{ $bris->status == 'regist' ? 'selected' : '' }}>Regist</option>
            <option value="suspect" {{ $bris->status == 'suspect' ? 'selected' : '' }}>Suspect</option>
            <option value="tamdat" {{ $bris->status == 'tamdat' ? 'selected' : '' }}>Tamdat</option>
            <option value="tolak" {{ $bris->status == 'tolak' ? 'selected' : '' }}>Tolak</option>
        </select>
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
    </div>


    <!-- <div>
        <label>Tanggal Polis:</label>
        <input type="date" name="tanggal_polis" value="{{ $akms->tanggal_polis }}">
    </div>

    <div>
        <label>Status:</label>
        <select name="status">
            <option value="terima" {{ $akms->status == 'terima' ? 'selected' : '' }}>Terima</option>
            <option value="tolak" {{ $akms->status == 'tolak' ? 'selected' : '' }}>Tolak</option>
            <option value="proses_analisa" {{ $akms->status == 'proses_analisa' ? 'selected' : '' }}>Proses Analisa</option>
        </select>
    </div> -->

    <div>
        <button type="submit">Update</button>
    </div>
</form>

</body>
</html>
