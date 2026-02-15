<!-- SUCCESS ALERT -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div id="datapantryTable">
    <div class="table-responsive">
        <table class="table table-hover w-100 align-middle">
            <thead style="position: sticky; top: 0; z-index: 10;">
                <tr class="text-center">
                    <th class="text-white" style="background:#2a3d5e; min-width:100px;">No.</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Cabang Bank</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:200px;">Action</th>
                </tr>
            </thead>

            <tbody>
            @foreach($datapantries as $index => $datapantry)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td class="text-center">{{ $datapantry->produk }}</td>
                    <!-- <td class="text-center">
                        {{ $bjb->tanggal_dokumen_diterima ? \Carbon\Carbon::parse($bjb->tanggal_dokumen_diterima)->format('d/m/Y') : '' }}
                    </td>
                    <td class="text-center">{{ $bjb->status }}</td> -->
                    
                    <td class="text-center">
                        <div class="d-inline-flex gap-2">
                            <button class="btn p-0 text-warning" data-bs-toggle="modal" data-bs-target="#editDataPantryModal{{ $datapantry->id }}">
                                <i class="bi bi-pencil-fill fs-5"></i>
                            </button>

                            <form method="POST" action="{{ route('datapantries.destroy', $datapantry) }}" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
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
@foreach($datapantries as $datapantry)
<div class="modal fade" id="editDatapantryModal{{ $datapantry->id }}" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Klaim</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form method="POST" action="{{ route('datapantries.update', $datapantry) }}">
                @csrf
                @method('PUT')
                
                <div class="modal-body">
                    <div><label class="form-label">Produk</label><input name="produk" class="form-control" value="{{ $datapantry->produk }}"></div>
                </div>
<!-- 
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
                </div> -->

                <div class="modal-footer justify-content-center">
                    <button class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
