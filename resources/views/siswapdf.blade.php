<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/test.css') }}" />
    <title>Data Alumni</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</head>

<style>
    .image {
        width: 90px;
        heigt: 90px;
        margin-bottom: 15px;
    }
</style>

<body>
    <div class="container-fluid">
        <h1>Data alumni</h1>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Laporan PDF Siswa</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>    

        <!-- membuat sebuah table -->
        <div class="table-responsive m-4">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <!-- <th>Photo</th> -->
                        <th>Tanggal Lahir</th>
                        <th>NIK</th>
                        <th>Jurusan</th>
                        <th>Angkatan</th>
                        <th>Alamat</th>
                        <!-- fungsi untuk menampung button delete dan edit serta detail -->
                        <th>Opsi</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                ?>
                    @if (count($students) > 0)
                    @foreach ($students as $siswa)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$siswa->nama}}</td>
                        <!-- <td>
                            <img class="image" src="{{ $siswa->photo == null? asset('img/avatar.png')  : asset('uploads/' . $siswa->photo) }}" alt="">    
                        </td> -->
                        <td>{{$siswa->tgl_lahir}}</td>
                        <td>{{$siswa->nik}}</td>
                        <td>{{$siswa->jurusan}}</td>
                        <td>{{$siswa->angkatan}}</td>
                        <td>{{$siswa->alamat}}</td>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="8" style="text-align:center">Data Not Found!</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
