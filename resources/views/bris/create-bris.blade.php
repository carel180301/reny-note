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
    <form method="post" action="{{ route('bris.store') }}">
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
            <label>Unit:</label>
            <input type="text" name="unit" placeholder="Unit">
        </div>

        <!-- <div>
            <label>Tanggal Polis: </label> 
            <input type="date" name="tanggal_polis" placeholder="Tanggal Polis" />
        </div>

        <div>
            <label class="form-label">Status:</label>
            <select name="status" class="form-select">
                <option value="" disabled selected>Pilih status</option>
                <option value="terima">Terima</option>
                <option value="tolak">Tolak</option>
                <option value="proses_analisa">Proses Analisa</option>
            </select>
        </div> -->
        <div>
            <input type="submit" value="Save a New Claim"/>
        </div>
    </form>
</body>
</html>