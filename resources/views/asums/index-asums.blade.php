<x-asum-table :asums="$asums" />
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
            flex: 1; 
        }
    </style>
</head>

<body>
    <main class="m-4 pb-16 asum-page">

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
                <button type="button" class="btn p-0 me-3 text-primary" data-bs-toggle="modal" data-bs-target="#addAsumModal">
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


    <h2 class="text-center mt-2 akm-heading">Daftar AKM</h2>

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
                    <th class="text-white" style="background:#2a3d5e">Nama Tertanggung</th>
                    <th class="text-white" style="background:#2a3d5e">Posisi</th>
                    <th class="text-white" style="background:#2a3d5e">COB</th>
                    <th class="text-white" style="background:#2a3d5e">Nama Pekerjaan</th>
                    <th class="text-white" style="background:#2a3d5e">Nomor Polis</th>
                    <th class="text-white" style="background:#2a3d5e">Tanggal Polis</th>
                    <th class="text-white" style="background:#2a3d5e">Nomor STGR</th>
                    <th class="text-white" style="background:#2a3d5e">Tanggal STGR</th>
                    <th class="text-white" style="background:#2a3d5e">Bulan STGR</th>
                    <th class="text-white" style="background:#2a3d5e">Tanggal DOL</th>
                    <th class="text-white" style="background:#2a3d5e">Jangka Waktu Awal</th>
                    <th class="text-white" style="background:#2a3d5e">Jangka Waktu Akhir</th>
                    <th class="text-white" style="background:#2a3d5e">Action</th>
                </tr>
            </thead>
            <tbody>

            @foreach($asums as $asum)
                <tr>
                    <td>{{ $asum->nama_tertanggung }}</td>
                    <td>{{ $asum->posisi }}</td>
                    <td>{{ $asum->cob }}</td>
                    <td>{{ $asum->nama_pekerjaan }}</td>
                    <td>{{ $asum->nomor_polis }}</td>
                    <td>{{ $asum->tanggal_polis }}</td>
                    <td>{{ $asum->nomor_stgr }}</td>
                    <td>{{ $asum->tanggal_stgr }}</td>
                    <td>{{ $asum->bulan_stgr }}</td>
                    <td>{{ $asum->tanggal_dol }}</td>
                    <td>{{ $asum->jangka_waktu_awal }}</td>
                    <td>{{ $asum->jangka_waktu_akhir }}</td>

                    <!-- <td>{{ $claim->nomor_polis }}</td> -->
                    <!-- <td>{{ $claim->tanggal_polis }}</td>
                    <td>{{ $claim->broker }}</td>
                    <td>{{ $claim->nama_tertanggung }}</td>
                    <td>{{ $claim->wpc }}</td>
                    <td>{{ $claim->email }}</td>
                    <td>{{ $claim->currency }}</td> -->

                    <!-- OUTSTANDING -->
                    <!-- <td>{{ $akm->outstanding }}</td> -->

                    <!-- <td>
                        @php
                            $today = \Carbon\Carbon::today();
                            $wpc = \Carbon\Carbon::parse($claim->wpc);
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
                    </td> -->

                    <!-- ACTIONS -->
                    <td>
                        <div class="d-flex gap-2 align-items-center">
                              <!-- SEND EMAIL -->
                            <button class="btn p-0 text-primary" onclick="sendEmail({{ $asum->id }})">
                                <i class="bi bi-envelope-fill fs-5"></i>
                            </button>

                            <!-- EDIT BUTTON -->
                            <button class="btn p-0 text-warning" data-bs-toggle="modal"
                                    data-bs-target="#editAsumModal{{ $asum->id }}">
                                <i class="bi bi-pencil-fill fs-5"></i>
                            </button>

                            <!-- DELETE -->
                            <form method="POST" action="{{ route('asum.destroy', $asum) }}">
                                @csrf
                                @method('delete')
                                <button class="btn p-0 text-danger">
                                    <i class="bi bi-trash-fill fs-5"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>

                <!-- EDIT MODAL -->
                <div class="modal fade" id="editAsumModal{{ $asum->id }}">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title">Edit Asum</h5>
                                <button class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">
                                <form method="POST" action="{{ route('asum.update', $asum) }}">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label class="form-label">Nama Tertanggung</label>
                                        <input class="form-control" name="nama_tertanggung" value="{{ $asum->nama_tertanggung }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Posisi</label>
                                        <select class="form-select" name="posisi">
                                            <option value="member" {{ $asum->posisi=='member'?'selected':'' }}>Member</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">COB</label>
                                        <input class="form-control" name="cob" value="{{ $asum->cob }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Nama Pekerjaan</label>
                                        <input class="form-control" name="nama_pekerjaan" value="{{ $asum->nama_pekerjaan }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Nomor Polis</label>
                                        <input class="form-control" name="nomor_polis" value="{{ $asum->nomor_polis }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Polis</label>
                                        <input class="form-control" name="tanggal_polis" value="{{ $asum->tanggal_polis }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Nomor STGR</label>
                                        <input class="form-control" name="nomor_stgr" value="{{ $asum->nomor_stgr }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Tanggal STGR</label>
                                        <input class="form-control" name="tanggal_stgr" value="{{ $asum->tanggal_stgr }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Bulan STGR</label>
                                        <input class="form-control" name="bulan_stgr" value="{{ $asum->bulan_stgr }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Tanggal DOL</label>
                                        <input class="form-control" name="tanggal_dol" value="{{ $asum->tanggal_dol }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Jangka Waktu Awal</label>
                                        <input class="form-control" name="jangka_waktu_awal" value="{{ $asum->jangka_waktu_awal }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Jangka Waktu Akhir</label>
                                        <input class="form-control" name="jangka_waktu_akhir" value="{{ $asum->jangka_waktu_akhir }}">
                                    </div>

                                    <!-- <div class="mb-3">
                                        <label class="form-label">Cabang Bank</label>
                                        <input class="form-control" name="cabang_bank" value="{{ $akm->cabang_bank }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Nomor Rekening</label>
                                        <input class="form-control" name="nomor_rekening" value="{{ $akm->nomor_rekening }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Nomor Polis</label>
                                        <input class="form-control" name="nomor_polis" value="{{ $akm->nomor_polis }}">
                                    </div> -->

                                    <!-- <div class="mb-3">
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
                                    </div> -->

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


    <!-- Add Asum Modal -->
    <div class="modal fade" id="addAsumModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Add New Asum</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <form method="POST" action="{{ route('asum.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Nama Tertanggung</label>
                            <input class="form-control" name="nama_tertanggung">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Posisi</label>
                            <select class="form-select" name="posisi">
                                <option disabled selected>Pilih Posisi</option>
                                <option value="member">Member</option>
                                <!-- <option value="USD">USD</option>
                                <option value="EUR">EUR</option>
                                <option value="SGD">SGD</option> -->
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">COB</label>
                            <input class="form-control" name="cob">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama Pekerjaan</label>
                            <input class="form-control" name="nama_pekerjaan">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nomor Polis</label>
                            <input class="form-control" name="nomor_polis">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tanggal Polis</label>
                            <input class="form-control" name="tanggal_polis">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nomor STGR</label>
                            <input class="form-control" name="nomor_stgr">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tanggal STGR</label>
                            <input class="form-control" name="tanggal_stgr">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Bulan STGR</label>
                            <input class="form-control" name="bulan_stgr">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tanggal DOL</label>
                            <input class="form-control" name="tanggal_dol">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jangka Waktu Awal</label>
                            <input class="form-control" name="jangka_waktu_awal">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jangka Waktu Akhir</label>
                            <input class="form-control" name="jangka_waktu_akhir">
                        </div>

                        <!-- <div class="mb-3">
                            <label class="form-label">Nomor Polis</label>
                            <input class="form-control" name="nomor_polis">
                        </div> -->

                        <!-- <div class="mb-3">
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
                        </div> -->

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

    <script>
        function sendEmail(id) {
            fetch(`/asum/${id}/send-email`)
                .then(res => res.text())
                .then(msg => alert(msg))
                .catch(() => alert("Failed to send email"));
        }
    </script>

</body>
</html>
