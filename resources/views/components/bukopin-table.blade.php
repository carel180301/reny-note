<!-- SUCCESS ALERT -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div id="bukopinTable">
    <!-- ================= TABLE ================= -->
    <div class="table-responsive">
        <table class="table table-hover w-100 align-middle">
            <thead style="position: sticky; top: 0; z-index: 10;">
                <tr class="text-center">
                    <th class="text-white" style="background:#2a3d5e; min-width:100px;">No.</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Nama Debitur</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Nomor Rekening</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Cabang Bank</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Nilai Tuntutan</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Nilai NET Klaim</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">JW Awal</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">JW Akhir</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Tanggal Dokumen Diterima</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Status</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Tanggal CL</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Keterangan Usaha</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Nomor CL</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Kekurangan Data</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Nomor Box</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:200px;">Action</th>
                </tr>
            </thead>

            <tbody>
            @foreach($bukopins as $index => $bukopin)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td class="text-center">{{ $bukopin->nama_debitur }}</td>
                    <td class="text-center">{{ $bukopin->nomor_rekening }}</td>
                    <td class="text-center">{{ $bukopin->cabang_bank }}</td>
                    <td class="text-center">{{ $bukopin->nilai_tuntutan }}</td>
                    <td class="text-center">{{ $bukopin->nilai_net_klaim }}</td>
                    <td class="text-center">{{ $bukopin->jw_awal }}</td>
                    <td class="text-center">{{ $bukopin->jw_akhir }}</td>
                    <td class="text-center">{{ $bukopin->tanggal_dokumen_diterima }}</td>
                    <td class="text-center">{{ $bukopin->status }}</td>
                    <td class="text-center">{{ $bukopin->tanggal_cl }}</td>
                    <td class="text-center">{{ $bukopin->keterangan_usaha }}</td>
                    <td class="text-center">{{ $bukopin->nomor_cl }}</td>
                    <td class="text-center">{{ $bukopin->kekurangan_data }}</td>
                    <td class="text-center">{{ $bukopin->nomor_box }}</td>

                    <td class="text-center">
                        <div class="d-inline-flex gap-2">
                            <button class="btn p-0 text-warning" data-bs-toggle="modal" data-bs-target="#editBukopinModal{{ $bukopin->id }}">
                                <i class="bi bi-pencil-fill fs-5"></i>
                            </button>

                            <form method="POST" action="{{ route('bukopins.destroy', $bukopin) }}" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
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
@foreach($bukopins as $bukopin)
<div class="modal fade" id="editBukopinModal{{ $bukopin->id }}" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Klaim</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form method="POST" action="{{ route('bukopins.update', $bukopin) }}">
                @csrf
                @method('PUT')
                
                <div class="modal-body">
                    <div><label class="form-label">Nama Debitur</label><input name="nama_debitur" class="form-control" value="{{ $bukopin->nama_debitur }}"></div>
                </div>

                <div class="modal-body">
                    <div><label class="form-label">Nomor Rekening</label><input name="nomor_rekening" class="form-control" value="{{ $bukopin->nomor_rekening }}"></div>
                </div>

                <div class="modal-body">
                    <div><label class="form-label">Cabang Bank</label><input name="cabang_bank" class="form-control" value="{{ $bukopin->cabang_bank }}"></div>
                </div>

                <div class="modal-body">
                    <div><label class="form-label">Nilai Tuntutan</label><input name="nilai_tuntutan" class="form-control" value="{{ $bukopin->nilai_tuntutan }}"></div>
                </div>

                <div class="modal-body">
                    <div><label class="form-label">Nilai NET Klaim</label><input name="nilai_net_klaim" class="form-control" value="{{ $bukopin->nilai_net_klaim }}"></div>
                </div>

                <div class="modal-body">
                    <div><label class="form-label">JW Awal</label><input type="date" name="jw_awal" class="form-control" value="{{ $bukopin->jw_awal }}"></div>
                </div>
                    
                <div class="modal-body">
                    <div><label class="form-label">JW Akhir</label><input type="date" name="jw_akhir" class="form-control" value="{{ $bukopin->jw_akhir }}"></div>
                </div>

                <div class="modal-body">
                    <div><label class="form-label">Tanggal Dokumen Diterima</label><input type="date" name="tanggal_dokumen_diterima" class="form-control" value="{{ $bukopin->tanggal_dokumen_diterima }}"></div>
                </div>

                <div class="modal-body">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control">
                        <option value="batal" {{ $bukopin->status == 'batal' ? 'selected' : '' }}>Batal</option>
                        <option value="setuju" {{ $bukopin->status == 'setuju' ? 'selected' : '' }}>setuju</option>
                        <option value="pending" {{ $bukopin->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="regist" {{ $bukopin->status == 'regist' ? 'selected' : '' }}>Regist</option>
                        <option value="suspect" {{ $bukopin->status == 'suspect' ? 'selected' : '' }}>Suspect</option>
                        <option value="tamdat" {{ $bukopin->status == 'tamdat' ? 'selected' : '' }}>Tamdat</option>
                        <option value="tolak" {{ $bukopin->status == 'tolak' ? 'selected' : '' }}>Tolak</option>
                    </select>
                </div>

                <div class="modal-body">
                    <div><label class="form-label">Tanggal CL</label><input type="date" name="tanggal_cl" class="form-control" value="{{ $bukopin->tanggal_cl }}"></div>
                </div>

                <div class="modal-body">
                    <div><label class="form-label">Keterangan Usaha</label><input name="keterangan_usaha" class="form-control" value="{{ $bukopin->keterangan_usaha }}"></div>
                </div>

                <div class="modal-body">
                    <div><label class="form-label">Nomor CL</label><input name="nomor_cl" class="form-control" value="{{ $bukopin->nomor_cl }}"></div>
                </div>

                <div class="modal-body">
                    <div><label class="form-label">Kekurangan Data</label><input name="kekurangan_data" class="form-control" value="{{ $bukopin->kekurangan_data }}"></div>
                </div>

                <div class="modal-body">
                    <div><label class="form-label">Nomor Box</label><input name="nomor_box" class="form-control" value="{{ $bukopin->nomor_box }}"></div>
                </div>

                <div class="modal-footer justify-content-center">
                    <button class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
