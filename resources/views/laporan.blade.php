<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Pengaduan_Masyarakat.pdf</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>
    <div class="content-text-center">
        <h2 style="text-align: center">Data Pengaduan Masyarakat </h2>
        <h2 style="text-align: center">Kecamatan Ciawi</h2>
        <hr>
    </div>

    <div class="content">
        <ol>
            <ul>NIK               :</ul>
            <ul>Tanggal Pengaduan :</ul>
            <ul>Status            :</ul>
        </ol>
    </div>


    <div class="container mt-4">
        <table class="table table-striped">
            <thead>
                <tr style="align-content: center">
                    <th scope="col">No</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Tanggal Pengaduan</th>
                    <th scope="col">Isi Pengaduan</th>
                    <th scope="col">Image</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th></th>
                </tr>

            </tbody>
            {{-- <div class="text-center">
                <h5>Laporan Pengaduan Masyarakat</h5>
                <h6>Ihsanfrr.githu.io</h6>
            </div> --}}
            <div class="container">
                <table class="table">
                    {{-- <tbody>
                        @foreach ($pengaduan as $p)
                            <tr>
                                <td>{{ $p += 1 }}</td>
                                <td>{{ $p->tgl_pengaduan->format('d-M-Y') }}</td>
                                <td>{{ $p->isi }}</td>
                                <td>{{ $p->status == '0' ? 'Pending' : ucwords($p->status) }}</td>
                            </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
        </table>
    </div>


    {{-- <div class="card-body">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <table id="MyTables" class="table table-stripped">
                        <thead>
                            <tr style="align-content: center">
                                <th scope="col">No</th>
                                <th scope="col">Tanggal Pengaduan</th>
                                <th scope="col">NIK</th>
                                <th scope="col">Isi Pengaduan</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                                <tbody>
                                    <th>Tanggal Pengaduan</th>
                                    <th>NIK</th>
                                    <th>Isi Pengaduan</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                </tbody>
                    </table>
                </div>
            </div>
    </div> --}}

</body>

</html>


