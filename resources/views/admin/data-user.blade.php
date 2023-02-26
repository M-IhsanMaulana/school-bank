@extends('admin')
@section('title', 'Data User')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data of User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fa-solid fa-dashboard"></i> Dashboard</a></div>
                <div class="breadcrumb-item active" aria-current="page">Data User</div>
            </div>
        </div>

        <div class="section-body">


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data User</h4>
                            <hr>
                            <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa-solid fa-user-plus"></i> Buat Akun</a>
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
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Foto</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no = 1;
                                        @endphp
                                        @foreach ($data as $user)
                                        <tr>
                                            <td class="text-center">
                                                {{ $no++ }}
                                            </td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if ($user->foto == null)
                                                <img alt="image" src="{{ asset('storage/data-image/avatar-1.png') }}" class="rounded-circle" width="35" data-toggle="tooltip" title="{{ $user->name }}">
                                                @else
                                                <img alt="image" src="{{ asset('storage/data-image/'. $user->foto) }}" class="rounded-circle" width="35" data-toggle="tooltip" title="{{ $user->name }}">
                                                @endif
                                            </td>
                                            <td>
                                                <div class="badge badge-success text-uppercase">{{ $user->role }}</div>
                                            </td>
                                            <td class="text-center">
                                                <form action="{{ route('admin.data-user.delete', $user->id) }}" method="POST">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="submit"
                                                        class="btn btn-icon icon-left btn-danger"
                                                        id="show"
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
                    <h5 class="modal-title">Tambahkan Akun</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('admin.data-user.create') }}" class="needs-validation" novalidate="">
                    @csrf
                    <div class="modal-body">
                        {{-- Nama --}}
                        <div class="form-group">
                            <label>Nama User</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-user-alt"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" placeholder="Masukan nama" name="name" tabindex="1" required autofocus>
                                <div class="invalid-feedback">
                                    Silahkan masukan nama user
                                </div>
                            </div>
                        </div>
                        {{-- Username --}}
                        <div class="form-group">
                            <label>Username Default</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="far fa-user"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" placeholder="Masukan username" name="username" tabindex="1" required autofocus>
                                <div class="invalid-feedback">
                                    Silahkan masukan username
                                </div>
                            </div>
                        </div>
                        {{-- Email --}}
                        <div class="form-group">
                            <label>Email</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                </div>
                                <input type="email" class="form-control" placeholder="Masukan email" name="email" tabindex="1" required autofocus>
                                <div class="invalid-feedback">
                                    Silahkan masukan email
                                </div>
                            </div>
                        </div>
                        {{-- Password --}}
                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </div>
                                </div>
                                <input type="password" class="form-control" placeholder="Masukan password" name="password" tabindex="1" required autofocus>
                                <div class="invalid-feedback">
                                    Silahkan masukan password
                                </div>
                            </div>
                        </div>
                        {{-- Role --}}
                        <div class="form-group">
                            <label>Role</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-list"></i>
                                    </div>
                                </div>
                                <select class="form-control selectric" name="role" required>
                                    <option selected disabled value="">Silahkan Pilih Role.</option>
                                    <option value="0">User</option>
                                    <option value="1">Admin</option>
                                </select>
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
