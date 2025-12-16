<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>Reminder Pembayaran Outstanding</h3>

    <p>Yth. {{ $piutang->broker }},</p>

    <p>Ini adalah pengingat polis Anda:</p>

    <ul>
        <li><strong>COB:</strong> {{ $piutang->cob }}</li>
        <li><strong>Nomor Polis:</strong> {{ $piutang->nomor_polis }}</li>

        <li>
            <strong>Tanggal Polis:</strong>
            {{ \Carbon\Carbon::parse($piutang->tanggal_polis)->format('d/m/Y') }}
        </li>

        <li><strong>Agen / Broker / Ceding:</strong> {{ $piutang->broker }}</li>
        <li><strong>Nama Tertanggung:</strong> {{ $piutang->nama_tertanggung }}</li>

        <li>
            <strong>Jatuh Tempo (WPC):</strong>
            {{ \Carbon\Carbon::parse($piutang->wpc)->format('d/m/Y') }}
        </li>

        <li><strong>E-mail:</strong> {{ $piutang->email }}</li>
        <li><strong>Currency:</strong> {{ $piutang->currency }}</li>

        <li>
            <strong>Outstanding:</strong>
            {{ number_format((float) $piutang->outstanding, 2, ',', '.') }}
        </li>
    </ul>

    <p>Harap segera melakukan pembayaran sebelum tanggal jatuh tempo. Terima kasih.</p>
    <br>
    <p>Salam Hormat, </p>
    <p>Pt. Asuransi Kredit Indonesia</p>

</body>
</html>
