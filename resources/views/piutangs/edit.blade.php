<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Edit Piutang</h1>
    <form method="post" action="{{ route('piutang.update', ['piutang' => $piutang]) }}">
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
        @method('put')
        <div>
            <label>COB:</label> 
            <input type="text" name="cob" placeholder="COB" value="{{$piutang->cob}}" />
        </div>
        <div>
            <label>Nomor Polis:</label>
            <input type="text" name="nomor_polis" placeholder="Nomor Polis" value="{{$piutang->nomor_polis}}" />
        </div>
        {{-- <div>
            <label>Nomor Jurnal:</label>
            <input type="text" name="nomor_jurnal" placeholder="Nomor Jurnal" value="{{$piutang->nomor_jurnal}}" />
        </div> --}}
        <div>
            <label>Tanggal Polis:</label>
            <input type="date" name="tanggal_polis" placeholder="Tanggal Polis" value="{{$piutang->tanggal_polis}}" />
        </div>
        <div>
            <label>Broker / Agen / Ceding:</label> 
            <input type="text" name="broker" placeholder="Nama Broker" value="{{$piutang->broker}}" />
        </div>
        <div>
            <label>Nama Tertanggung:</label> 
            <input type="text" name="nama_tertanggung" placeholder="Nama Tertanggung" value="{{$piutang->nama_tertanggung}}" />
        </div>
        <div>
            <label>WPC (Jatuh Tempo):</label>
            <input type="date" name="wpc" placeholder="WPC (Jatuh Tempo)" value="{{$piutang->wpc}}" />
        </div>
        <div>
            <label>E-mail:</label>
            <input type="email" name="email" placeholder="E-mail" value="{{$piutang->email}}" />
        </div>
        <div>
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
            <label>TSI:</label>
            <input type="text" name="tsi" placeholder="TSI" value="{{$piutang->tsi}}" />
        </div> --}}
        <div>
            <label>Outstanding:</label>
            <input type="text" name="outstanding" placeholder="Outstanding" value="{{$piutang->outstanding}}" />
        </div>
        <div>
            <input type="submit" value="Update"/>
        </div>
    </form>
</body>
</html>