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
                                        <div class="wizard-step wizard-step-success">
                                            <div class="wizard-step-icon">
                                                <i class="far fa-user"></i>
                                            </div>
                                            <div class="wizard-step-label">
                                                Data Pribadi
                                            </div>
                                        </div>
                                        <div class="wizard-step wizard-step-active">
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

                            <form class="wizard-content mt-2 needs-validation" action="{{ route('user.create-step-2.post') }}" method="POST" novalidate="">
                                @csrf
                                <div class="wizard-pane">
                                    <div class="form-group row align-items-center">
                                        <label class="col-md-4 text-md-right text-left">Nomor Induk</label>
                                        <div class="col-lg-4 col-md-6">
                                            <input type="number" value="{{ $rekening->nomor_induk }}" name="nomor_induk" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row align-items-center">
                                        <label class="col-md-4 text-md-right text-left mt-2">Kelas</label>
                                        <div class="col-lg-4 col-md-6">
                                            <select class="form-control selectric" name="kelas_id">
                                                <option value="">Silahkan Pilih Kelas Anda</option>
                                                @foreach ($kelas as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group align-items-center justify-content-center">
                                        <a href="{{ route('user.create-step-1') }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-arrow-left"></i> Back </a>
                                        <button type="submit" class="btn btn-icon icon-right btn-primary float-right">Next <i class="fas fa-arrow-right"></i></button>
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
