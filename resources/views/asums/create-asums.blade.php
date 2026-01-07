<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>add new Klaim</h1>
    <form method="post" action="{{ route('asums.store') }}">
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
            <label>Nama Tertanggung:</label>
            <input type="text" name="nama_tertanggung" placeholder="Nama Tertanggung">
        </div>

        <div>
            <label class="form-label">Posisi:</label>
            <select name="posisi" class="form-select">
                <option value="" disabled selected>Pilih Posisi</option>
                <option value="member">Member</option>
                <!-- <option value="tolak">Tolak</option>
                <option value="proses_analisa">Proses Analisa</option> -->
            </select>
        </div>

        <div>
            <label>COB:</label>
            <input type="text" name="cob" placeholder="COB">
        </div>

        <div>
            <label>Nama Pekerjaan:</label>
            <input type="text" name="nama_pekerjaan" placeholder="Nama Pekerjaan">
        </div>

        <div>
            <label>Nomor Polis:</label>
            <input type="text" name="nomor_polis" placeholder="Nomor Polis">
        </div>

        <div>
            <label>Tanggal Polis:</label>
            <input type="date" name="tanggal_polis" placeholder="Tanggal Polis">
        </div>

        <div>
            <label>Nomor STGR:</label>
            <input type="text" name="nomor_stgr" placeholder="Nomor STGR">
        </div>

        <div>
            <label>Tanggal STGR:</label>
            <input type="date" name="tanggal_stgr" placeholder="Tanggal STGR">
        </div>

        <div>
            <label>Bulan STGR:</label>
            <input type="text" name="bulan_stgr" placeholder="Bulan STGR">
        </div>

        <div>
            <label>Tanggal DOL:</label>
            <input type="date" name="tanggal_dol" placeholder="Tanggal DOL">
        </div>

        <div>
            <label>Jangka Waktu Awal:</label>
            <input type="date" name="jangka_waktu_awal" placeholder="Jangka Waktu Awal">
        </div>

        <div>
            <label>Jangka Waktu Akhir:</label>
            <input type="date" name="jangka_waktu_akhir" placeholder="Jangka Waktu Akhir">
        </div>

        <div>
            <label>Penyebab Klaim:</label>
            <input type="text" name="penyebab_klaim" placeholder="Penyebab Klaim">
        </div>

        <!-- <div>
            <label>Cabang Bank:</label>
            <input type="text" name="cabang_bank" placeholder="Cabang Bank">
        </div>

        <div>
            <label>Nomor Rekening: </label> 
            <input type="text" name="nomor_rekening" placeholder="Nomor Rekening" />
        </div>
         
        <div>
            <label>Nomor Polis: </label> 
            <input type="text" name="nomor_polis" placeholder="Nomor Polis" />
        </div>

         <div>
            <label>Tanggal Polis: </label> 
            <input type="date" name="tanggal_polis" placeholder="Tanggal Polis" />
        </div>

        <div>
            <label>Nomor STGR: </label> 
            <input type="text" name="nomor_stgr" placeholder="Nomor STGR" />
        </div>

        <div>
            <label>Tanggal STGR: </label> 
            <input type="date" name="tanggal_stgr" placeholder="Tanggal STGR" />
        </div>

        <div>
            <label>Bulan STGR: </label> 
            <input type="text" name="bulan_stgr" placeholder="Bulan STGR" />
        </div>

        <div>
            <label>Tanggal DOL: </label> 
            <input type="date" name="tanggal_dol" placeholder="Tanggal DOL" />
        </div>

        <div>
            <label>Jangka Waktu Awal: </label> 
            <input type="date" name="jangka_waktu_awal" placeholder="Jangka Waktu Awal" />
        </div>

        <div>
            <label>Jangka Waktu Akhir: </label> 
            <input type="date" name="jangka_waktu_akhir" placeholder="Jangka Waktu Akhir" />
        </div>
        
        <div>
            <label>Penyebab Klaim: </label> 
            <input type="text" name="penyebab_klaim" placeholder="Penyebab Klaim" />
        </div>
        
        <div>
            <label>Plafond: </label> 
            <input type="text" name="plafond" placeholder="Plafond" />
        </div>
        
        <div>
            <label>Nilai Tuntutan Klaim: </label> 
            <input type="text" name="nilai_tuntutan_klaim" placeholder="Nilai Tuntutan Klaim" />
        </div>
        
        <div>
            <label class="form-label">Status:</label>
            <select name="status" class="form-select">
                <option value="" disabled selected>Pilih status</option>
                <option value="terima">Terima</option>
                <option value="tolak">Tolak</option>
                <option value="proses_analisa">Proses Analisa</option>
            </select>
        </div>

        <div>
            <label>Tindak Lanjut: </label> 
            <input type="text" name="tindak_lanjut" placeholder="Tindak Lanjut" />
        </div>
        
        <div>
            <label>Nomor Surat Tambahan Data: </label> 
            <input type="text" name="nomor_surat_tambahan_data" placeholder="Nomor Surat Tambahan Data" />
        </div>
        
        <div>
            <label>Tanggal Surat Tambahan Data: </label> 
            <input type="date" name="tanggal_surat_tambahan_data" placeholder="Tanggal Surat Tambahan Data" />
        </div>
        
        <div>
            <label>Nomor Register Sistem: </label> 
            <input type="text" name="nomor_register_sistem" placeholder="Nomor Register Sistem" />
        </div>

        <div>
            <label>Tanggal Register Sistem: </label> 
            <input type="date" name="tanggal_register_sistem" placeholder="Tanggal Register Sistem" />
        </div>
        
        <div>
            <label class="form-label">Status Sistem:</label>
            <select name="status_sistem" class="form-select">
                <option value="" disabled selected>Pilih Status sistem</option>
                <option value="done">Done</option>
                <option value="not_done">Not Done Yet</option>
            </select>
        </div>

        <div>
            <label>Keterangan / Feedback Pemutus: </label> 
            <input type="text" name="keterangan" placeholder="Keterangan" />
        </div>

        <div>
            <label>Nomor Surat Persetujuan atau Penolakan: </label> 
            <input type="text" name="nomor_surat_persetujuan_atau_penolakan" placeholder="Nomor Surat Persetujuan atau Penolakan" />
        </div>

        <div>
            <label>Tanggal Surat Persetujuan atau Penolakan: </label> 
            <input type="date" name="tanggal_surat_persetujuan_atau_penolakan" placeholder="Tanggal Surat Persetujuan atau Penolakan" />
        </div> -->





        <!-- <div>
            <label>Nomor Polis: </label>
            <input type="text" name="nomor_polis" placeholder="Nomor Polis" />
        </div>
        <div>
            <label>Tanggal Polis: </label>
            {{-- <input type="date" name="tanggal_polis" placeholder="Tanggal Polis" /> --}}
            <input type="text" name="tanggal_polis" class="form-control" placeholder="dd/mm/yyyy">
        </div>
        <div>
            <label>Agen / Broker / Ceding: </label> 
            <input type="text" name="broker" placeholder="Nama Broker" />
        </div>
        <div>
            <label>Nama Tertanggung: </label> 
            <input type="text" name="nama_tertanggung" placeholder="Nama Tertanggung" />
        </div>
        <div>
            <label>WPC (Jatuh Tempo): </label>
            {{-- <input type="date" name="wpc" placeholder="WPC (Jatuh Tempo)" /> --}}
            <input type="text" name="wpc" class="form-control" placeholder="dd/mm/yyyy">
        </div>
        <div>
            <label>E-mail: </label>
            <input type="email" name="email" placeholder="E-mail" />
        </div>
       <div class="mb-3">
            <label class="form-label">Currency:</label>
            <select name="currency" class="form-select">
                <option value="" disabled selected>Select currency</option>
                <option value="IDR">IDR</option>
                <option value="USD">USD</option>
                <option value="EUR">EUR</option>
                <option value="SGD">SGD</option>
            </select>
        </div>
        {{-- <div>
            <label>TSI: </label>
            <input type="text" name="tsi" placeholder="TSI" />
        </div> --}}
         <div>
            <label>Outstanding: </label>
            <input type="text" name="outstanding" placeholder="Outstanding" />
        </div> -->
        <div>
            <input type="submit" value="Save a New Claim"/>
        </div>
    </form>
</body>
</html>