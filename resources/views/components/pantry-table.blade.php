<!-- SUCCESS ALERT -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div id="pantryTable">
    <!-- ================= TABLE ================= -->
    <div class="table-responsive">
        <table class="table table-hover w-100 align-middle">
            <thead style="position: sticky; top: 0; z-index: 10;">
                <tr class="text-center">
                    <th class="text-white" style="background:#2a3d5e; min-width:100px;">No.</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Produk</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Kategori</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Nama Brand</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Jumlah</th>
                    <!-- <th class="text-white" style="background:#2a3d5e; min-width:300px;">Tanggal Dokumen Diterima</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Status</th> -->
                    <th class="text-white" style="background:#2a3d5e; min-width:200px;">Action</th>
                </tr>
            </thead>

            <tbody>
            @foreach($pantrys as $index => $pantry)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td class="text-center">{{ $pantry->produk }}</td>
                    <td class="text-center">{{ $pantry->kategori }}</td>
                    <td class="text-center">{{ $pantry->nama_brand }}</td>
                    <td class="text-center">{{ $pantry->jumlah }}</td>
                    
                    <td class="text-center">
                        <div class="d-inline-flex gap-2">
                            <button class="btn p-0 text-warning" data-bs-toggle="modal" data-bs-target="#editPantryModal{{ $pantry->id }}">
                                <i class="bi bi-pencil-fill fs-5"></i>
                            </button>

                            <form method="POST" action="{{ route('pantrys.destroy', $pantry) }}" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
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
@foreach($pantrys as $pantry)
<div class="modal fade" id="editPantryModal{{ $pantry->id }}" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Klaim</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form method="POST" action="{{ route('pantrys.update', $pantry) }}">
                @csrf
                @method('PUT')
                
                <div class="modal-body">
                    <div><label class="form-label">Produk</label><input name="produk" class="form-control" value="{{ $pantry->produk }}"></div>
                    <div><label class="form-label">Kategori</label><input name="kategori" class="form-control" value="{{ $pantry->kategori }}"></div>
                    <div><label class="form-label">Nama Brand</label><input name="nama_brand" class="form-control" value="{{ $pantry->nama_brand }}"></div>
                    <div><label class="form-label">Jumlah</label><input name="jumlah" class="form-control" value="{{ $pantry->jumlah }}"></div>
                </div>
                
                <div class="modal-footer justify-content-center">
                    <button class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
