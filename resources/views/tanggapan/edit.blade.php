
<div class="container-fluid px-0">
<div class="card mb-4">
<div class="card-header">
<div class="col-xs-12 col-sm-12 col-md-12 text-left">
<h1 class="mt-0">Edit Pengaduan</h1>
</div>
</div>
<div class="card-body">
@if ($errors->any())
<div class="alert alert-danger">
<strong>Whoops!</strong> There were some problems with your input.<br><br>
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
<form action="{{ route('tanggapan.update',$tanggapan->id) }}" method="POST" enctype="multipart/form-data">
@csrf

@method('PUT')
<div class="row">

</form>

</div>
</div>
<!-- Button Tanggapan -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
Tanggapan
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h1 class="modal-title fs-5" id="exampleModalLabel">Berikan Tanggapan</h1>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body" id="modalContent">
<div>
<strong>Isi Tanggapan</strong>
<label for="exampleTextarea1"></label>
<textarea class="form-control" id="exampleTextarea1" cols="30" rows="30" style="height:100px"></textarea>
</div>
<br>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <div class="col-md-5">
            <div class="form-group row">
                <strong>Status</strong>
                <div class="col-sm-4">
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input @error('status') is invalid @enderror" name="status" id="proses" value="proses" {{ ($pengaduan->status = 'proses') ? 'checked' : '' }}>
                        Proses
                        </label>
                        @error('status')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="col-sm-5">
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input @error('status') is invalid @enderror" name="status" id="selesai" value="selesai" {{ ($pengaduan->status = 'selesai') ? 'checked' : '' }}>
                        Selesai
                        </label>
                        @error('status')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary btn-rounded btn-fw">Save</button>
<button type="button" class="btn btn-secondary btn-rounded btn-fw" data-bs-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
