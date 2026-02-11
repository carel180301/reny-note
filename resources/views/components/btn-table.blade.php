<!-- SUCCESS ALERT -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div id="btnTable">
    <!-- ================= TABLE ================= -->
    <div class="table-responsive">
        <table class="table table-hover w-100 align-middle">
            <thead style="position: sticky; top: 0; z-index: 10;">
                <tr class="text-center">
                    <th class="text-white" style="background:#2a3d5e; min-width:100px;">No.</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Cabang Bank</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Nama Debitur</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Nomor Rekening</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Nilai Tuntutan Klaim</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">NET Klaim</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Tanggal Dokumen Diterima</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Status</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Keterangan</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Nomor CL</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Date Update</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Nomor Memo Permohonan Pembayaran Klaim</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Tanggal Memo Permohonan Pembayaran Klaim</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Tanggal Memo Pembayaran Klaim</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Tanggal Pelunasan Di Bagian Keuangan</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:200px;">Action</th>
                </tr>
            </thead>

            <tbody>
            @foreach($btns as $index => $btn)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td class="text-center">{{ $btn->cabang_bank }}</td>
                    <td class="text-center">{{ $btn->nama_debitur }}</td>
                    <td class="text-center">{{ $btn->nomor_rekening }}</td>
                    <td class="text-center">{{ $btn->nilai_tuntutan_klaim }}</td>
                    <td class="text-center">{{ $btn->net_klaim }}</td>
                    <td class="text-center">
                        {{ $btn->tanggal_dokumen_diterima ? \Carbon\Carbon::parse($btn->tanggal_dokumen_diterima)->format('d/m/Y') : '' }}
                    </td>
                    <td class="text-center">{{ $btn->status }}</td>
                    <td class="text-center">{{ $btn->keterangan }}</td>
                    <td class="text-center">{{ $btn->Nomor_cl }}</td>
                    <td class="text-center">
                        {{ $btn->date_update ? \Carbon\Carbon::parse($btn->date_update)->format('d/m/Y') : '' }}
                    </td>
                    <td class="text-center">{{ $btn->nomor_memo }}</td>
                    <td class="text-center">
                        {{ $btn->tanggal_memo ? \Carbon\Carbon::parse($btn->tanggal_memo)->format('d/m/Y') : '' }}
                    </td>
                    <td class="text-center">
                        {{ $btn->tanggal_pembayaran_klaim ? \Carbon\Carbon::parse($btn->tanggal_pembayaran_klaim)->format('d/m/Y') : '' }}
                    </td>
                    <td class="text-center">
                        {{ $btn->tanggal_pelunasan ? \Carbon\Carbon::parse($btn->tanggal_pelunasan)->format('d/m/Y') : '' }}
                    </td>
                    
                    <td class="text-center">
                        <div class="d-inline-flex gap-2">
                            <button class="btn p-0 text-warning" data-bs-toggle="modal" data-bs-target="#editBtnModal{{ $btn->id }}">
                                <i class="bi bi-pencil-fill fs-5"></i>
                            </button>

                            <form method="POST" action="{{ route('btns.destroy', $btn) }}" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn p-0 text-danger">
                                    <i class="bi bi-trash-fill fs-5"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- ================ Edit Modals ================= -->
@foreach($btns as $btn)
<div class="modal fade" id="editBtnModal{{ $btn->id }}" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Klaim</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form method="POST" action="{{ route('btns.update', $btn) }}">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div><label class="form-label">Cabang Bank</label><input name="cabang_bank" class="form-control" value="{{ $btn->cabang_bank }}"></div>
                </div>

                <div class="modal-body">
                    <div><label class="form-label">Nama Debitur</label><input name="nama_debitur" class="form-control" value="{{ $btn->nama_debitur }}"></div>
                </div>

                <div class="modal-body">
                    <div><label class="form-label">Nomor Rekening</label><input name="nomor_rekening" class="form-control" value="{{ $btn->nomor_rekening }}"></div>
                </div>

                <div class="modal-body">
                    <div><label class="form-label">Nilai Tuntutan Klaim</label><input name="nilai_tuntutan_klaim" class="form-control" value="{{ $btn->nilai_tuntutan_klaim }}"></div>
                </div>

                <div class="modal-body">
                    <div><label class="form-label">NET Klaim</label><input name="net_klaim" class="form-control" value="{{ $btn->net_klaim }}"></div>
                </div>

                <div class="modal-body">
                    <div><label class="form-label">Tanggal Dokumen Diterima</label><input type="date" name="tanggal_dokumen_diterima" class="form-control" value="{{ $btn->tanggal_dokumen_diterima }}"></div>
                </div>

                <div class="modal-body">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control">
                        <option value="batal" {{ $btn->status == 'batal' ? 'selected' : '' }}>Batal</option>
                        <option value="disetujui" {{ $btn->status == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                        <option value="pending" {{ $btn->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="regist" {{ $btn->status == 'regist' ? 'selected' : '' }}>Regist</option>
                        <option value="suspect" {{ $btn->status == 'suspect' ? 'selected' : '' }}>Suspect</option>
                        <option value="tamdat" {{ $btn->status == 'tamdat' ? 'selected' : '' }}>Tamdat</option>
                        <option value="tolak" {{ $btn->status == 'tolak' ? 'selected' : '' }}>Tolak</option>
                    </select>
                </div>

                <div class="modal-body">
                    <div><label class="form-label">Keterangan</label><input name="keterangan" class="form-control" value="{{ $btn->keterangan }}"></div>
                </div>

                <div class="modal-body">
                    <div><label class="form-label">Nomor CL</label><input name="nomor_cl" class="form-control" value="{{ $btn->nomor_cl }}"></div>
                </div>

                <div class="modal-body">
                    <div><label class="form-label">Date Update</label><input type="date" name="date_update" class="form-control" value="{{ $btn->date_update }}"></div>
                </div>

                <div class="modal-body">
                    <div><label class="form-label">Nomor Memo Permohonan Pembayaran Klaim</label><input name="nomor_memo" class="form-control" value="{{ $btn->nomor_memo }}"></div>
                </div>

                <div class="modal-body">
                    <div><label class="form-label">Tanggal Memo Permohonan Pembayaran Klaim</label><input type="date" name="tanggal_memo" class="form-control" value="{{ $btn->tanggal_memo }}"></div>
                </div>

                <div class="modal-body">
                    <div><label class="form-label">Tanggal Pembayaran Klaim</label><input type="date" name="tanggal_pembayaran_klaim" class="form-control" value="{{ $btn->tanggal_pembayaran_klaim }}"></div>
                </div>

                <div class="modal-body">
                    <div><label class="form-label">Tanggal Pelunasan Di Bagian Keuangan</label><input type="date" name="tanggal_pelunasan" class="form-control" value="{{ $btn->tanggal_pelunasan }}"></div>
                </div>

                <div class="modal-footer justify-content-center">
                    <button class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
