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
       <div class="col-md-12">
       @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
       </div>
       <div class="col-md-12">
       @if (session('error'))
            <div class="alert alert-error">
                {{ session('error') }}  
            </div>
        @endif
       </div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreate">
            Create
        </button>
        <!-- button print -->
        <a href="{{ route('siswa.pdf') }}" class="btn btn-warning btn-small">PDF</a>

        <!-- Modal -->
        <div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create data</h5>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('siswa.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                                            placeholder="Please insert your name"/>
                                        @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">NIK</label>
                                        <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror"
                                            placeholder="Please insert your NIK"/>
                                        @error('nik')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <div class="form-group">
                                        <label class="form-label">Genders</label>
                                        <select name="id_gender" class="form-select @error('id_gender') is-invalid @enderror">
                                            <option selected disabled>-- Pilih Jenis Kelamin --</option>
                                            @foreach ($genders as $gender)
                                            <option value="{{ $gender->id }}">{{$gender->jenkel}}</option>
                                            @endforeach
                                        </select>
                                        @error('id_gender')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <div class="form-group">
                                        <label class="form-label">Tanggal Lahir</label>
                                        <input type="date" name="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror"
                                            placeholder="Please insert your birth date"/>
                                        @error('tgl_lahir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror    
                                    </div>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <div class="form-group">
                                        <label class="form-label">Jurusan</label>
                                        <input type="text" name="jurusan" class="form-control @error('jurusan') is-invalid @enderror"
                                            placeholder="Please insert your Majority"/>
                                        @error('jurusan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <div class="form-group">
                                        <label class="form-label">Angkatan</label>
                                        <input type="number" name="angkatan" class="form-control @error('angkatan') is-invalid @enderror"
                                            placeholder="Please insert your Generation"/>
                                        @error('angkatan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <br/>
                                <div class="col-md mt-2">
                                    <div class="form-group">
                                        <label class="form-label">Photo</label>
                                        <br/>
                                        <img id="previewImg" src="{{ asset('img/avatar.png')}}" class="image"/>
                                        <div class="input-group">
                                        <input type="file" name="photo" onchanges="previewFile(this)" class="form-control uploads" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label class="form-label">Alamat</label>
                                        <textarea name="alamat" rows="5" class="form-control @error('alamat') is-invalid @enderror" placeholder="Please insert your Address"></textarea>
                                        @error('alamat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>`
        <!-- membuat sebuah table -->
        <div class="table-responsive m-4">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Photo</th>
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
                        @foreach ($siswa->jenkels as $jenis_kelamin)
                        <td>{{$siswa->jenkels as $jenkel}}</td>
                        <td>
                            <img class="image" src="{{ $siswa->photo == null? asset('img/avatar.png')  : asset('uploads/' . $siswa->photo) }}" alt="">    
                        </td>
                        <td>{{$siswa->tgl_lahir}}</td>
                        <td>{{$siswa->nik}}</td>
                        <td>{{$siswa->jurusan}}</td>
                        <td>{{$siswa->angkatan}}</td>
                        <td>{{$siswa->alamat}}</td>
                        <td class="text-center">
                            <button data-href="{{route('siswa.delete',$siswa->id)}}" data-name="{{$siswa->nama}}" type="submit" class="btn btn-danger btn-small deleteSiswa">Delete</button>
                            <br/><br/>
                            <!-- membuat fungsi edit -->
                            <button data-bs-toggle="modal" data-bs-target="#modalEdit_{{ $siswa->id }}" type="button" class="btn btn-info btn-small">Edit</button>
                            </td>
                        </tr>

                        <!-- Modal edit dan Update -->
                        <div class="modal fade" id="modalEdit_{{ $siswa->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit data</h5>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="{{ route('siswa.update', $siswa->id) }}" enctype="multipart/form-data">
                                    @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="nama" value="{{ $siswa->nama }}" class="form-control" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nik</label>
                                            <input type="text" name="nik" value="{{ $siswa->nik }}" class="form-control" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Day of Birth</label>
                                            <input type="date" name="tgl_lahir" value="{{ $siswa->tgl_lahir }}" class="form-control" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Genders</label>
                                            <select name="id_gender" class="form-select" required>
                                                <option selected disable>-- Pilih jenis kelamin --</option>
                                                @foreach ($genders as $gender)
                                                <option value="{{ $gender->id }}" {{ $siswa->id_gender == $gender->id ? 'selected' : ''}}>{{ $gender->jenkel }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="" class="form-label">Jurusan</label>
                                            <input type="text" name="jurusan" value="{{ $siswa->jurusan }}" class="form-control" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">  
                                        <div class="form-group">
                                            <label for="" class="form-label">Angkatan</label>
                                            <input type="text" name="angkatan" value="{{ $siswa->angkatan }}" class="form-control" required />
                                        </div>
                                    </div>
                                    <div class="col-md mt-2">
                                    <div class="form-group">
                                        <label class="form-label">Photo</label>
                                        <br/>

                                        <img id="previewImg" src="{{ asset('img/avatar.png')}}" class="image"/>
                                        <div class="input-group">
                                        <input type="file" name="photo-edit" onchanges="previewFile(this)" class="form-control uploads" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                        </div>
                                    </div>
                                    </div>
                                        <div class="form-group">
                                            <label for="" class="form-label">Alamat</label>
                                            <div class="form-group">
                                              <label for=""></label>
                                              <textarea name="alamat"  class="form-control" required>{{ $siswa->alamat }}</textarea>
                                            </div> 
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="8" style="text-align:center">Data Not Found!</td>
                    </tr>
                    @endif
                </tbody>
            </table>
            <div class="text-center">
                    {{ $students->render() }}
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{ asset('js/siswa.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).on('click', '.deleteSiswa', function () {
        var url = $(this).attr('data-href');
        var nama = $(this).attr('data-name');
    Swal.fire({
        title: 'Delete ' + nama + "?",
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url
            }
        })
    });
    
    // function previewFile(input){
    //     var file = $("input[type=file]").get(0).files[0];
    //     if(file){
    //         var reader = new FileReader();
    //         reader.onload = function(){
    //             $("#previewImg").attr("src", reader.result);
    //         }
    //         reader.readAsDataURL(file);
    //     }
    // }

    // event listener ketika klik button upload
    $('.uploads').on('change', function(){
        var input = $(this);

        // untuk mendefinisikan nama file
        var reader = new FileReader();
        reader.onload = function(){
            $('.image').attr('src', reader.result);
        }
        reader.readAsDataURL($input[0].files[0]);
    });
   
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> -->
</body>

</html>
