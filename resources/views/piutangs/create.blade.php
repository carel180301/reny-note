<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>add new piutang</h1>
    <form method="post" action="{{ route('piutang.store') }}">
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
            <label>COB: </label> 
            <input type="text" name="cob" placeholder="COB" />
        </div>
        <div>
            <label>Nomor Polis: </label>
            <input type="text" name="nomor_polis" placeholder="Nomor Polis" />
        </div>
        {{-- <div>
            <label>Nomor Jurnal: </label>
            <input type="text" name="nomor_jurnal" placeholder="Nomor Jurnal" />
        </div> --}}
        <div>
            <label>Tanggal Polis: </label>
            <input type="date" name="tanggal_polis" placeholder="Tanggal Polis" />
        </div>
        <div>
            <label>Broker / Agen / Ceding: </label> 
            <input type="text" name="broker" placeholder="Nama Broker" />
        </div>
        <div>
            <label>Nama Tertanggung: </label> 
            <input type="text" name="nama_tertanggung" placeholder="Nama Tertanggung" />
        </div>
        <div>
            <label>WPC (Jatuh Tempo): </label>
            <input type="date" name="wpc" placeholder="WPC (Jatuh Tempo)" />
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
        </div>
        <div>
            <input type="submit" value="Save a New Piutang"/>
        </div>
    </form>
</body>
</html>