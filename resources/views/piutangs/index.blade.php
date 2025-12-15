<x-piutang-table :piutangs="$piutangs" />
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        html, body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1; /* pushes footer to bottom */
        }
    </style>

</head>

<body>
    <main class="m-4 pb-16 piutang-page">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg sticky-top bg-white" style="z-index:1030">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/logo_askrindo.png') }}" style="max-width: 180px;">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">

                <ul class="navbar-nav me-auto"></ul>

                <!-- Add Button -->
                <button type="button" class="btn p-0 me-3 text-primary" data-bs-toggle="modal" data-bs-target="#addPiutangModal">
                    <i class="bi bi-plus-lg fs-4"></i>
                </button>

                <!-- Search -->
                <form class="d-flex me-4">
                    <div class="input-group">
                        <input type="search" class="form-control" placeholder="Search">
                        <button class="btn btn-outline-secondary">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>

                <!-- User Menu -->
                <div class="dropdown">
                    <a href="#" id="userMenu" data-bs-toggle="dropdown">
                        <div class="rounded-circle text-white d-flex align-items-center justify-content-center"
                             style="width: 40px; height: 40px; background-color:#f08523; font-weight:600;">
                             ASK
                        </div>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </nav>


    <h2 class="text-center mt-2 piutang-heading">Daftar Piutang</h2>

    <!-- SUCCESS ALERT -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif


    <!-- TABLE WRAPPER -->
    <div>
        <table class="table table-hover">
            <thead>
                <tr class="text-center">
                    <th class="text-white" style="background:#2a3d5e">COB</th>
                    <th class="text-white" style="background:#2a3d5e">Nomor Polis</th>
                    <th class="text-white" style="background:#2a3d5e">Tanggal Polis</th>
                    <th class="text-white" style="background:#2a3d5e">Agen / Broker / Ceding</th>
                    <th class="text-white" style="background:#2a3d5e">Nama Tertanggung</th>
                    <th class="text-white" style="background:#2a3d5e">WPC</th>
                    <th class="text-white" style="background:#2a3d5e">E-mail</th>
                    <th class="text-white" style="background:#2a3d5e">Currency</th>
                    <th class="text-white" style="background:#2a3d5e">Outstanding</th>
                    <th class="text-white" style="background:#2a3d5e">Status</th>
                    <th class="text-white" style="background:#2a3d5e">Action</th>
                </tr>
            </thead>

            <tbody>

            @foreach($piutangs as $piutang)
                <tr>
                    <td>{{ $piutang->cob }}</td>
                    <td>{{ $piutang->nomor_polis }}</td>
                    <td>{{ $piutang->tanggal_polis }}</td>
                    <td>{{ $piutang->broker }}</td>
                    <td>{{ $piutang->nama_tertanggung }}</td>
                    <td>{{ $piutang->wpc }}</td>
                    <td>{{ $piutang->email }}</td>
                    <td>{{ $piutang->currency }}</td>

                    <!-- OUTSTANDING -->
                    <td>{{ $piutang->outstanding }}</td>

                    <td>
                        @php
                            $today = \Carbon\Carbon::today();
                            $wpc = \Carbon\Carbon::parse($piutang->wpc);
                            $daysLeft = $today->diffInDays($wpc, false);
                        @endphp

                        @if($daysLeft > 0)
                            @if($daysLeft <= 30)
                                <span class="badge bg-danger">{{ $daysLeft }} Hari Lagi</span>
                            @elseif($daysLeft <= 60)
                                <span class="badge bg-warning">{{ $daysLeft }} Hari Lagi</span>
                            @elseif($daysLeft <= 90)
                                <span class="badge bg-success">{{ $daysLeft }} Hari Lagi</span>
                            @else
                                <span class="badge bg-secondary">{{ $daysLeft }} Hari Lagi</span>
                            @endif

                        @elseif($daysLeft === 0)
                            <span class="badge bg-warning text-dark">Due today</span>

                        @else
                            <span class="badge bg-danger">{{ abs($daysLeft) }} Hari Lewat</span>
                        @endif
                    </td>

                    <!-- ACTIONS -->
                    <td>
                        <div class="d-flex gap-2 align-items-center">
                              <!-- SEND EMAIL -->
                            <button class="btn p-0 text-primary" onclick="sendEmail({{ $piutang->id }})">
                                <i class="bi bi-envelope-fill fs-5"></i>
                            </button>

                            <!-- EDIT BUTTON -->
                            <button class="btn p-0 text-warning" data-bs-toggle="modal"
                                    data-bs-target="#editPiutangModal{{ $piutang->id }}">
                                <i class="bi bi-pencil-fill fs-5"></i>
                            </button>

                            <!-- DELETE -->
                            <form method="POST" action="{{ route('piutang.destroy', $piutang) }}">
                                @csrf
                                @method('delete')
                                <button class="btn p-0 text-danger">
                                    <i class="bi bi-trash-fill fs-5"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>

                <!-- EDIT MODAL (OUTSIDE THE TR!!) -->
                <div class="modal fade" id="editPiutangModal{{ $piutang->id }}">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title">Edit Piutang</h5>
                                <button class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">
                                <form method="POST" action="{{ route('piutang.update', $piutang) }}">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label class="form-label">COB</label>
                                        <input class="form-control" name="cob" value="{{ $piutang->cob }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Nomor Polis</label>
                                        <input class="form-control" name="nomor_polis" value="{{ $piutang->nomor_polis }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Polis</label>
                                        <input type="date" class="form-control" name="tanggal_polis" value="{{ $piutang->tanggal_polis }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Agen / Broker / Ceding</label>
                                        <input class="form-control" name="broker" value="{{ $piutang->broker }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Nama Tertanggung</label>
                                        <input class="form-control" name="nama_tertanggung" value="{{ $piutang->nama_tertanggung }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">WPC</label>
                                        <input type="date" class="form-control" name="wpc" value="{{ $piutang->wpc }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input class="form-control" name="email" value="{{ $piutang->email }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Currency</label>
                                        <select class="form-select" name="currency">
                                            <option value="IDR" {{ $piutang->currency=='IDR'?'selected':'' }}>IDR</option>
                                            <option value="USD" {{ $piutang->currency=='USD'?'selected':'' }}>USD</option>
                                            <option value="EUR" {{ $piutang->currency=='EUR'?'selected':'' }}>EUR</option>
                                            <option value="SGD" {{ $piutang->currency=='SGD'?'selected':'' }}>SGD</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Outstanding</label>
                                        <input class="form-control" name="outstanding" value="{{ $piutang->outstanding }}">
                                    </div>

                                    <div class="text-center">
                                        <button class="btn btn-primary">Update</button>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            @endforeach

            </tbody>
        </table>
    </div>


    <!-- ADD PIUTANG MODAL -->
    <div class="modal fade" id="addPiutangModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Add New Piutang</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <form method="POST" action="{{ route('piutang.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">COB</label>
                            <input class="form-control" name="cob">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nomor Polis</label>
                            <input class="form-control" name="nomor_polis">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tanggal Polis</label>
                            <input type="date" class="form-control" name="tanggal_polis">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Agen / Broker / Ceding</label>
                            <input class="form-control" name="broker">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama Tertanggung</label>
                            <input class="form-control" name="nama_tertanggung">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">WPC</label>
                            <input type="date" class="form-control" name="wpc">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input class="form-control" name="email">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Currency</label>
                            <select class="form-select" name="currency">
                                <option disabled selected>Select currency</option>
                                <option value="IDR">IDR</option>
                                <option value="USD">USD</option>
                                <option value="EUR">EUR</option>
                                <option value="SGD">SGD</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Outstanding</label>
                            <input class="form-control" name="outstanding">
                        </div>

                        <div class="text-center">
                            <button class="btn btn-primary">Save</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
    </main>

    <div class="container mt-5">
        <hr>
        <footer class="py-3 my-4 mt-auto fixed bottom-0 left-0 w-full bg-white shadow z-40">
            {{-- <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item">
                    <a href="#" class="nav-link px-2 text-body-secondary">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link px-2 text-body-secondary">Features</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link px-2 text-body-secondary">Pricing</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link px-2 text-body-secondary">FAQs</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link px-2 text-body-secondary">About</a>
                </li>
            </ul> --}}

            <p class="text-center text-body-secondary">
                &copy; 2025 PT. Asuransi Kredit Indonesia
            </p>
        </footer>
    </div>



    <!-- SEND EMAIL FUNCTION -->
    <script>
        function sendEmail(id) {
            fetch(`/piutang/${id}/send-email`)
                .then(res => res.text())
                .then(msg => alert(msg))
                .catch(() => alert("Failed to send email"));
        }
    </script>

</body>
</html>
