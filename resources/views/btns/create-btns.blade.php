<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Tambah Klaim Baru</h1>
    <form method="post" action="{{ route('bankjatims.store') }}">
        <div>
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        @csrf
        @method('post')
        <div>
            <label>Cabang Bank:</label>
            <input type="text" name="cabang_bank" placeholder="Cabang Bank">
        </div>

        <div>
            <label>Nama Debitur:</label>
            <input type="text" name="nama_debitur" placeholder="Nama Debitur">
        </div>

        <div>
            <label>Nomor Rekening:</label>
            <input type="text" name="nomor_rekening" placeholder="Nomor Rekening">
        </div>

        <div>
            <label>Nilai Tuntutan Klaim:</label>
            <input type="text" name="nilai_tuntutan_klaim" placeholder="Nilai Tuntutan Klaim">
        </div>

        
        <div>
            <label>Net Klaim:</label>
            <input type="text" name="net_klaim" placeholder="Net Klaim">
        </div>

        
        <div>
            <label>Tanggal Dokumen Diterima:</label>
            <input type="date" name="tanggal_dokumen_diterima" placeholder="Tanggal Dokumen Diterima">
        </div>

        <div>
            <label class="form-label">Status:</label>
            <select name="status" class="form-select">
                <option value="" disabled selected>Pilih status</option>
                <option value="batal">Batal</option>
                <option value="disetujui">Disetujui</option>
                <option value="pending">Pending</option>
                <option value="regist">Regist</option>
                <option value="suspect">Suspect</option>
                <option value="tamdat">Tamdat</option>
                <option value="tolak">Tolak</option>
            </select>
        </div>


        <!-- 
        <div>
            <label>Nilai Tuntutan:</label>
            <input type="text" name="nilai_tuntutan" placeholder="Nilai Tuntutan">
        </div>

        
        <div>
            <label>Tanggal Disetujui:</label>
            <input type="date" name="tanggal_disetujui" placeholder="Tanggal Disetujui">
        </div>

        <div>
            <label>Tambahan Data:</label>
            <input type="text" name="tambahan_data" placeholder="Tambahan Data">
        </div> -->



        <!-- <div>
            <label>Nama Debitur:</label>
            <input type="text" name="nama_debitur" placeholder="Nama Debitur">
        </div>

        <div>
            <label>Net Klaim:</label>
            <input type="text" name="net_klaim" placeholder="net_klaim">
        </div>

       

        <div>
            <label>Keterangan:</label>
            <input type="text" name="keterangan" placeholder="Keterangan">
        </div>

        <div>
            <label>Kekurangan Data:</label>
            <input type="text" name="kekurangan_data" placeholder="Kekurangan_data">
        </div>

        <div>
            <label>Tanggal Update:</label>
            <input type="date" name="tanggal_update" placeholder="Tanggal Update">
        </div>

        <div>
            <label>Nomor Box:</label>
            <input type="text" name="nomor_box" placeholder="nomor_box">
        </div>
 -->

        <!-- <div>
            <label>Cabang Bank:</label>
            <input type="text" name="cabang_bank" placeholder="Cabang Bank">
        </div>

        <div>
            <label>Nilai Tuntutan Klaim:</label>
            <input type="text" name="nilai_tuntutan_klaim" placeholder="Nilai Tuntutan Klaim">
        </div>

        <div>
            <label>Tanggal Klaim Masuk Portal:</label>
            <input type="date" name="tanggal_klaim_masuk_portal" placeholder="Tanggal Klaim Masuk Portal">
        </div>

        <div>
            <label>Tambahan Data:</label>
            <input type="text" name="tambahan_data" placeholder="Tambahan Data">
        </div>

        <div>
            <label>Date Update:</label>
            <input type="date" name="date_update" placeholder="Date Update">
        </div>

        <div>
            <label>Nomor Box:</label>
            <input type="text" name="nomor_box" placeholder="Nomor Box">
        </div> -->


        <!-- <div>
            <label>Tanggal Polis: </label> 
            <input type="date" name="tanggal_polis" placeholder="Tanggal Polis" />
        </div> -->
        <div>
            <input type="submit" value="Save a New Claim"/>
        </div>
    </form>
</body>
</html>