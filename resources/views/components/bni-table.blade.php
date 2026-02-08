<!-- SUCCESS ALERT -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div id="bniTable">
    <!-- ================= TABLE ================= -->
    <div class="table-responsive">
        <table class="table table-hover w-100 align-middle">
            <thead>
                <tr class="text-center">
                    <th class="text-white" style="background:#2a3d5e; min-width:100px;">No.</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Tahun</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Tanggal Dokumen Diterima</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Nomor Dokumen Diterima</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Cabang Bank</th>

                    <!-- <th class="text-white" style="background:#2a3d5e; min-width:300px;">Nomor Rekening</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Cabang Bank</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Nilai Tuntutan</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Nilai NET Klaim</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">JW Awal</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">JW Akhir</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Status</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Tanggal CL</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Keterangan Usaha</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Nomor CL</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Kekurangan Data</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Nomor Box</th> -->
                    <th class="text-white" style="background:#2a3d5e; min-width:200px;">Action</th>
                </tr>
            </thead>

            <tbody>
            @foreach($bnis as $index => $bni)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td class="text-center">{{ $bni->tahun }}</td>
                    <td class="text-center">{{ $bni->tanggal_dokumen_diterima }}</td>
                    <td class="text-center">{{ $bni->nomor_dokumen_diterima }}</td>
                    <td class="text-center">{{ $bni->cabang_bank }}</td>

                    <!-- <td class="text-center">{{ $bni->status }}</td> -->

                    <td class="text-center">
                        <div class="d-inline-flex gap-2">
                            <button class="btn p-0 text-warning" data-bs-toggle="modal" data-bs-target="#editBniModal{{ $bni->id }}">
                                <i class="bi bi-pencil-fill fs-5"></i>
                            </button>

                            <form method="POST" action="{{ route('bnis.destroy', $bni) }}" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
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
@foreach($bnis as $bni)
<div class="modal fade" id="editBniModal{{ $bni->id }}" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Klaim</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form method="POST" action="{{ route('bnis.update', $bni) }}">
                @csrf
                @method('PUT')
                
                <div class="modal-body">
                    <div><label class="form-label">Tahun</label><input name="tahun" class="form-control" value="{{ $bni->tahun }}"></div>
                </div>

                <div class="modal-body">
                    <div><label class="form-label">Tanggal Dokumen Diterima</label><input name="tanggal_dokumen_diterima" class="form-control" value="{{ $bni->tanggal_dokumen_diterima }}"></div>
                </div>

                <div class="modal-body">
                    <div><label class="form-label">Nomor Dokumen Diterima</label><input name="nomor_dokumen_diterima" class="form-control" value="{{ $bni->nomor_dokumen_diterima }}"></div>
                </div>

                <div class="modal-body">
                    <div><label class="form-label">Cabang Bank</label><input name="cabang_bank" class="form-control" value="{{ $bni->cabang_bank }}"></div>
                </div>


                <!--
                <div class="modal-body">
                    <div><label class="form-label">Cabang Bank</label><input name="cabang_bank" class="form-control" value="{{ $bni->cabang_bank }}"></div>
                </div>

                <div class="modal-body">
                    <div><label class="form-label">Nilai Tuntutan</label><input name="nilai_tuntutan" class="form-control" value="{{ $bni->nilai_tuntutan }}"></div>
                </div>

                <div class="modal-body">
                    <div><label class="form-label">Nilai NET Klaim</label><input name="nilai_net_klaim" class="form-control" value="{{ $bni->nilai_net_klaim }}"></div>
                </div>

                <div class="modal-body">
                    <div><label class="form-label">JW Awal</label><input name="jw_awal" class="form-control" value="{{ $bni->jw_awal }}"></div>
                </div>
                    
                <div class="modal-body">
                    <div><label class="form-label">JW Akhir</label><input name="jw_akhir" class="form-control" value="{{ $bni->jw_akhir }}"></div>
                </div>

                <div class="modal-body">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control">
                        <option value="batal" {{ $bni->status == 'batal' ? 'selected' : '' }}>Batal</option>
                        <option value="setuju" {{ $bni->status == 'setuju' ? 'selected' : '' }}>setuju</option>
                        <option value="pending" {{ $bni->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="regist" {{ $bni->status == 'regist' ? 'selected' : '' }}>Regist</option>
                        <option value="suspect" {{ $bni->status == 'suspect' ? 'selected' : '' }}>Suspect</option>
                        <option value="tamdat" {{ $bni->status == 'tamdat' ? 'selected' : '' }}>Tamdat</option>
                        <option value="tolak" {{ $bni->status == 'tolak' ? 'selected' : '' }}>Tolak</option>
                    </select>
                </div>

                <div class="modal-body">
                    <div><label class="form-label">Tanggal CL</label><input name="tanggal_cl" class="form-control" value="{{ $bni->tanggal_cl }}"></div>
                </div>

                <div class="modal-body">
                    <div><label class="form-label">Keterangan Usaha</label><input name="keterangan_usaha" class="form-control" value="{{ $bni->keterangan_usaha }}"></div>
                </div>

                <div class="modal-body">
                    <div><label class="form-label">Nomor CL</label><input name="nomor_cl" class="form-control" value="{{ $bni->nomor_cl }}"></div>
                </div>

                <div class="modal-body">
                    <div><label class="form-label">Kekurangan Data</label><input name="kekurangan_data" class="form-control" value="{{ $bni->kekurangan_data }}"></div>
                </div>

                <div class="modal-body">
                    <div><label class="form-label">Nomor Box</label><input name="nomor_box" class="form-control" value="{{ $bni->nomor_box }}"></div>
                </div> -->

                <div class="modal-footer justify-content-center">
                    <button class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
