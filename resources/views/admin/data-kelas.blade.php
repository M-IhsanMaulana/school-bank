@extends('admin')
@section('title', 'Data Kelas')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data of Class</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fa-solid fa-dashboard"></i>
                            Dashboard</a></div>
                    <div class="breadcrumb-item active" aria-current="page">Data Kelas</div>
                </div>
            </div>

            @if (Session::has('success'))
                <div class="alert alert-primary alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        {{ Session::get('success') }}
                    </div>
                </div>
            @endif
            <div class="section-body">


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Kelas</h4>
                                <hr>
                                <button class="btn btn-icon icon-left btn-primary" data-toggle="modal"
                                    data-target="#exampleModal">
                                    <i class="fa-solid fa-plus-circle"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    No
                                                </th>
                                                <th>Nama</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($data as $kelas)
                                                <tr>
                                                    <td class="text-center">
                                                        {{ $no++ }}
                                                    </td>
                                                    <td>{{ $kelas->name }}</td>
                                                    <td class="text-center">
                                                        <form action="{{ route('admin.data-kelas.delete', $kelas->id) }}" method="POST">
                                                            @csrf
                                                            <input name="_method" type="hidden" value="DELETE">
                                                            <button type="submit"
                                                                class="btn btn-icon icon-left btn-danger"
                                                                id="show-confirmation"
                                                                data-toggle="tooltip" title="Delete">
                                                                <i class="fa-solid fa-trash-alt"></i>
                                                            </button>
                                                        </form>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- Modal 1 --}}
        <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Kelas</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('admin.data-kelas.create') }}" class="needs-validation"
                        novalidate="">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama Kelas</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-school"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Masukan nama kelas"
                                        name="name" tabindex="1" required autofocus>
                                    <div class="invalid-feedback">
                                        Silahkan masukan nama kelas
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer bg-whitesmoke br">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
