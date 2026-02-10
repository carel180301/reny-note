<!-- SUCCESS ALERT -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div id="bjbTable">
    <!-- ================= TABLE ================= -->
    <div class="table-responsive">
        <table class="table table-hover w-100 align-middle">
            <thead>
                <tr class="text-center">
                    <th class="text-white" style="background:#2a3d5e; min-width:100px;">No.</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Cabang Bank</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Nama Debitur</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Nomor Rekening</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Tuntutan</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">NET Klaim</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Tanggal Dokumen Diterima</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Status</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Keterangan</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Nomor CL</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Date Update</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Nomor Memo Permohonan Pembayaran Klaim</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Tanggal Memo Permohonan Pembayaran Klaim</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Tanggal Pembayaran Klaim</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Tanggal Pelunasan Di Bagian Keuangan</th>

                    <!-- 
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Nomor Dokumen Diterima</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">JW Awal</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">JW Akhir</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Tanggal CL</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Nomor CL</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Tanggal Pembayaran Klaim</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Tanggal Pelunasan Di Bagian Keuangan</th> -->
                    <th class="text-white" style="background:#2a3d5e; min-width:200px;">Action</th>
                </tr>
            </thead>

            <tbody>
            @foreach($bjbs as $index => $bjb)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td class="text-center">{{ $bjb->cabang_bank }}</td>
                    <td class="text-center">{{ $bjb->nama_debitur }}</td>
                    <td class="text-center">{{ $bjb->nomor_rekening }}</td>
                    <td class="text-center">{{ $bjb->tuntutan }}</td>
                    <td class="text-center">{{ $bjb->net_klaim }}</td>
                    <td class="text-center">{{ $bjb->tanggal_dokumen_diterima }}</td>
                    <td class="text-center">{{ $bjb->status }}</td>
                    <td class="text-center">{{ $bjb->keterangan }}</td>
                    <td class="text-center">{{ $bjb->nomor_cl }}</td>
                    <td class="text-center">{{ $bjb->date_update }}</td>
                    <td class="text-center">{{ $bjb->nomor_memo_permohonan_pembayaran_klaim }}</td>
                    <td class="text-center">{{ $bjb->tanggal_memo_permohonan_pembayaran_klaim }}</td>
                    <td class="text-center">{{ $bjb->tanggal_pembayaran_klaim }}</td>
                    <td class="text-center">{{ $bjb->tanggal_pelunasan_di_bagian_keuangan }}</td>

                    <td class="text-center">
                        <div class="d-inline-flex gap-2">
                            <button class="btn p-0 text-warning" data-bs-toggle="modal" data-bs-target="#editBjbModal{{ $bjb->id }}">
                                <i class="bi bi-pencil-fill fs-5"></i>
                            </button>

                            <form method="POST" action="{{ route('bjbs.destroy', $bjb) }}" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
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
@foreach($bjbs as $bjb)
<div class="modal fade" id="editBjbModal{{ $bjb->id }}" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Klaim</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form method="POST" action="{{ route('bjbs.update', $bjb) }}">
                @csrf
                @method('PUT')
                
                <div class="modal-body">
                    <div><label class="form-label">Cabang Bank</label><input name="cabang_bank" class="form-control" value="{{ $bjb->cabang_bank }}"></div>
                </div>

                <div class="modal-body">
                    <div><label class="form-label">Nama Debitur</label><input name="nama_debitur" class="form-control" value="{{ $bjb->nama_debitur }}"></div>
                </div>

                <div class="modal-body">
                    <div><label class="form-label">Nomor Rekening</label><input name="nomor_rekening" class="form-control" value="{{ $bjb->nomor_rekening }}"></div>
                </div>

                <div class="modal-body">
                    <div><label class="form-label">Tuntutan</label><input name="tuntutan" class="form-control" value="{{ $bjb->tuntutan }}"></div>
                </div>

                <div class="modal-body">
                    <div><label class="form-label">NET Klaim</label><input name="net_klaim" class="form-control" value="{{ $bjb->net_klaim }}"></div>
                </div>

                <div class="modal-body">
                    <div><label class="form-label">Tanggal Dokumen Diterima</label><input type="date" name="tanggal_dokumen_diterima" class="form-control" value="{{ $bjb->tanggal_dokumen_diterima }}"></div>
                </div>

                <div class="modal-body">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control">
                        <option value="batal" {{ $bjb->status == 'batal' ? 'selected' : '' }}>Batal</option>
                        <option value="disetujui" {{ $bjb->status == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                        <option value="pending" {{ $bjb->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="regist" {{ $bjb->status == 'regist' ? 'selected' : '' }}>Regist</option>
                        <option value="suspect" {{ $bjb->status == 'suspect' ? 'selected' : '' }}>Suspect</option>
                        <option value="tamdat" {{ $bjb->status == 'tamdat' ? 'selected' : '' }}>Tamdat</option>
                        <option value="tolak" {{ $bjb->status == 'tolak' ? 'selected' : '' }}>Tolak</option>
                    </select>
                </div>

                <div class="modal-body">
                    <div><label class="form-label">Keterangan</label><input name="keterangan" class="form-control" value="{{ $bjb->keterangan }}"></div>
                </div>

                <div class="modal-body">
                    <div><label class="form-label">Nomor CL</label><input name="nomor_cl" class="form-control" value="{{ $bjb->nomor_Cl }}"></div>
                </div>

                <div class="modal-body">
                    <div><label class="form-label">Date Update</label><input type="date" name="date_update" class="form-control" value="{{ $bjb->date_update }}"></div>
                </div>

                <div class="modal-body">
                    <div><label class="form-label">Nomor Memo Permohonan Pembayaran Klaim</label><input name="nomor_memo_permohonan_pembayaran_klaim" class="form-control" value="{{ $bjb->nomor_memo_permohonan_pembayaran_klaim }}"></div>
                </div>

                <div class="modal-body">
                    <div><label class="form-label">Tanggal Memo Permohonan Pembayaran Klaim</label><input type="date" name="tanggal_memo_permohonan_pembayaran_klaim" class="form-control" value="{{ $bjb->tanggal_memo_permohonan_pembayaran_klaim }}"></div>
                </div>

                <div class="modal-body">
                    <div><label class="form-label">Tanggal Pembayaran Klaim</label><input type="date" name="tanggal_pembayaran_klaim" class="form-control" value="{{ $bjb->tanggal_pembayaran_klaim }}"></div>
                </div>

                 <div class="modal-body">
                    <div><label class="form-label">Tanggal Pelunasan Di Bagian Keuangan</label><input type="date" name="tanggal_pelunasan_di_bagian_keuangan" class="form-control" value="{{ $bjb->tanggal_pelunasan_di_bagian_keuangan }}"></div>
                </div>

                <div class="modal-footer justify-content-center">
                    <button class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
