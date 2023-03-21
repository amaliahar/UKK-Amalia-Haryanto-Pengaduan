<!DOCTYPE html>
<html>
    <head>
        <title>Pengaduan Masyarakat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <h1 style="text-align: center">Pengaduan Masyarakat Kecamatan Ciawi</h1>
        {{-- <div class="container">
            <div class="row">
                    <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col"></th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Address</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>Surabaya</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>Sidoarjo</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>Mojokerto</td>
                            </tr>
                            </tbody>
                        </table>
            </div>
            <div class="row">
                <a href="{{ route('print')}}" class="btn btn-sm btn-danger"> Print</a>
            </div>
        </div> --}}

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
                    {{-- <tbody>
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
                    </tbody> --}}
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

                            {{-- <div class="col-xs-12 col-sm-12 col-md-12">
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
                            </div> --}}

                </div>
                        </form>

            </div>
        </div>
    </body>
</html>


