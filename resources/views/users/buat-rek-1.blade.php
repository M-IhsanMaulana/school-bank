@extends('user')
@section('title', 'Buat Rekening')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Buat Rekening</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Rekening</a></div>
                <div class="breadcrumb-item">Buat Rekening</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Buat dan Ajukan Rekening Anda</h4>
                        </div>
                        <div class="card-body">
                            <div class="row mt-4">
                                <div class="col-12 col-lg-8 offset-lg-2">
                                    <div class="wizard-steps">
                                        <div class="wizard-step wizard-step-active">
                                            <div class="wizard-step-icon">
                                                <i class="far fa-user"></i>
                                            </div>
                                            <div class="wizard-step-label">
                                                Data Pribadi
                                            </div>
                                        </div>
                                        <div class="wizard-step">
                                            <div class="wizard-step-icon">
                                                <i class="fas fa-box-open"></i>
                                            </div>
                                            <div class="wizard-step-label">
                                                Create an App
                                            </div>
                                        </div>
                                        <div class="wizard-step">
                                            <div class="wizard-step-icon">
                                                <i class="fas fa-server"></i>
                                            </div>
                                            <div class="wizard-step-label">
                                                Server Information
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form class="wizard-content mt-2 needs-validation" action="{{ route('user.create-step-1.post') }}" method="POST" novalidate="">
                                @csrf
                                <div class="wizard-pane">
                                    <div class="form-group row align-items-center">
                                        <label class="col-md-4 text-md-right text-left">Nama Lengkap</label>
                                        <div class="col-lg-4 col-md-6">
                                            <input type="text" name="nama_lengkap" value="{{ $rekening->nama_lengkap ?? '' }}" class="form-control" placeholder="Silahkan masukan nama lengkap anda">
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label class="col-md-4 text-md-right text-left mt-2">Jenis Kelamin</label>
                                        <div class="col-lg-4 col-md-6">
                                            <select class="form-control selectric" name="jenis_kelamin">
                                                <option value="">Silahkan Pilih Jenis Kelamin</option>
                                                <option value="laki-laki">Laki-Laki</option>
                                                <option value="perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label class="col-md-4 text-md-right text-left">NIK</label>
                                        <div class="col-lg-4 col-md-6">
                                            <input type="number" name="nik" value="{{ $rekening->nik ?? '' }}" class="form-control number">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 text-md-right text-left mt-2">Alamat Lengkap</label>
                                        <div class="col-lg-4 col-md-6">
                                            <textarea class="form-control" name="alamat">{{ $rekening->alamat ?? '' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-4"></div>
                                        <div class="col-lg-4 col-md-6 text-right">
                                            {{-- <button type="submit" class="btn btn-icon icon-right btn-primary">Next <i class="fas fa-arrow-right"></button> --}}
                                            <button type="submit" class="btn btn-icon icon-right btn-primary">Next <i class="fas fa-arrow-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
