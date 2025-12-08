<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>Reminder for Outstanding Payment</h3>

    <p>Dear {{ $piutang->nama_tertanggung }},</p>

    <p>This is a reminder that your policy:</p>

    <ul>
        <li><strong>Nomor Polis:</strong> {{ $piutang->nomor_polis }}</li>
        <li><strong>Outstanding:</strong> {{ $piutang->outstanding }}</li>
        <li><strong>Due Date (WPC):</strong> {{ $piutang->wpc }}</li>
    </ul>

    <p>Please settle the outstanding amount before the due date.</p>

    <p>Thank you.</p>

</body>
</html>