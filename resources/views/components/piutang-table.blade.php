 
   <!-- SUCCESS ALERT -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif


     <!-- Sticky header outside the scroll -->
        <div class="sticky-header text-center">
            <h2>Daftar Piutang</h2>
        </div>

    <div id="piutangTable">
        {{-- <div class="table-scroll-wrapper"> --}}
             <div class="table-responsive" style="overflow: visible !important;">


                <table class="table table-hover w-100">
                    <thead>


                        <tr class="text-center">
                            <th class="text-white" style="background:#2a3d5e">No.</th>
                            <th class="text-white" style="background:#2a3d5e">COB</th>
                            <th class="text-white" style="background:#2a3d5e">Nomor Polis</th>
                            <th class="text-white" style="background:#2a3d5e">Tanggal Polis</th>
                            <th class="text-white" style="background:#2a3d5e">Broker / Agen</th>
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

                    @foreach($piutangs as $index => $piutang)
                        <tr>
                            <td>{{ $index + 1 }}</td>
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
                                                <label class="form-label">Broker</label>
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
        {{-- </div> --}}
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
                            <label class="form-label">Broker</label>
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

            