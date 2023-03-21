@extends('layout')

@section('content')

<div class="container-fluid px-6">
    <div class="card mb-4">
        <div class="card-header">
            <h2 class="mt-1">Data Pengaduan</h2>
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Pengaduan</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Tambah Data</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <table id="MyTables" class="table table-stripped">
                        <thead style="text-align: center">
                            <tr>
                                <th style="width: 90px;">Tanggal Pengaduan</th>
                                <th style="width: 100px;">NIK</th>
                                <th style="width: 300px;">Isi Pengaduan</th>
                                <th style="width: 200px;">Image</th>
                                <th style="width: 100px;">Status</th>
                                <th style="width: 100px;">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Tanggal Pengaduan</th>
                                <th>NIK</th>
                                <th>Isi Pengaduan</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th style="width: 100px;">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($pengaduan as $p)
                            <tr>
                                <td>{{ date('D,
                                    d M Y',$p->created_at->timestamp) }}</td>
                                <td>{{ $p->nik }}</td>
                                <td style="width: 100px;" class="text-wrap"><?= substr($p->isi, 0, 100) ?></td>
                                <td>
                            <div>
                                <img src="{{ asset('storage/' . $p->image) }}" alt="No Image" class="img-fluid mt-3">
                            </div>
                            </td>
                            <td>
                            @switch($p->status)
                                @case("Selesai")
                                    <span class="badge bg-success">{{ $p->status }}</span>
                                @break
                                @case("Proses")
                                    <span class="badge bg-warning ">{{ $p->status }}</span>
                                @break
                            @default
                            @endswitch
                            </td>
                            <td>
                                <form action="{{ route('pengaduan.destroy',$p->id) }}" method="POST">
                                    <a class="btn btn-primary btn-rounded" href="{{ route('pengaduan.edit',$p->id) }}"><i class="ti-pencil"></i></a>
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-rounded" onclick="return confirm('Delete?')">
                                            <i class="ti-trash"></i>
                                        </button>
                                            <a class="btn btn-warning btn-rounded" href="{{ url('laporan') }}"><i class="ti-printer"></i></a>

                                </form>
                            </td>
                            </tr>
                            @endforeach
                            </tbody>
                    </table>
                </div>

                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <br>
                    <div class="container-fluid px-1">
                        <div class="card mb-2">
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
                            <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body" id="modalContent">
                            {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                            <strong>Tanggal Pengaduan</strong>
                            <input type="text" name="date" class="form-control" @error('date') is-invalid @enderror placeholder="Tanggal" " value="{{ old('date') }}">
                            @error('date')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                            </div>
                            </div> --}}

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>NIK</strong>
                                        <input type="text" name="nik" class="form-control" @error('nik') is-invalid @enderror placeholder="nik" value="{{ old('nik')}}">
                                        @error('nik')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                                    <div class="form-group">
                                        <strong>Isi Laporan</strong>
                                        <textarea name="isi" id="isi">{{ old('isi') }}</textarea>
                                        <script>
                                            CKEDITOR.replace('isi');
                                        </script>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Foto</strong>
                                        <img src="img-preview img-fluid mb-3 col-sm-5" >
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control" @error('image') is-invalid @enderror name="image" id="image" onchange="previewImage()">
                                            @error('image')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-5">
                                            <div class="form-group row">
                                                <strong>Status</strong>
                                                <div class="col-sm-5">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                        <input type="radio" class="form-check-input @error('status') is-invalid @enderror" name="status" id="proses" value="Proses" {{ old('proses') == 'proses'? 'checked' : '' }}>
                                                        Proses
                                                        </label>
                                                        @error('proses')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                    <div class="col-sm-5">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input @error('status') is-invalid @enderror" name="status" id="selesai" value="Selesai" {{ old('selesai') == 'selesai'? 'checked' : '' }}>
                                                                Selesai
                                                            </label>
                                                            @error('selesai')
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

                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary text-align center">Submit</button>
                                </div>
                    </div>
                            </form>

                </div>
            </div>
    </div>
</div>

{!! $pengaduan->links() !!}
@endsection
