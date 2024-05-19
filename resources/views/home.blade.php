@extends('layouts.master')

@section('page-css')
    <style>
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
        }
    </style>
@endsection

@section('main-content')

@include('layouts.header')
<div class="container">

    <div class="jumbotron text-center">
      <h1 class="display-4">Selamat Datang!</h1>
      <p class="lead">Silakan pilih salah satu opsi di bawah ini:</p>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-12 mb-4">
            <div class="card bg-primary text-white mb-2">
                <div class="card-body">
                    <h5 class="card-title">Lihat Daftar Alsim</h5>
                    <p class="card-text">Lihat daftar Alsim yang sudah tersimpan.</p>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#historyAlsimModal" class="btn btn-light">
                        Lihat Daftar
                    </button>
                </div>
            </div>
            @if(session('message_history'))
                <div class="alert alert-{{ session('message_history')['class'] }} alert-dismissible fade show"  role="alert">
                    {{ session('message_history')['text'] }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

        </div>
        <div class="col-md-6 col-sm-12 mb-4">    
            <div class="card bg-success text-white mb-2">
                <div class="card-body">
                    <h5 class="card-title">Buat Daftar Alsim Baru</h5>
                    <p class="card-text">Buat daftar alsim baru untuk tanggal tertentu.</p>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#newAlsimModal" class="btn btn-light">Buat Daftar Baru</button>
                </div>
            </div>

            @if(session('message'))
                <div class="alert alert-{{ session('message')['class'] }} alert-dismissible fade show"  role="alert">
                    {{ session('message')['text'] }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

        </div>
    </div>
</div>

<!-- Modal Buat Absen Baru -->
<div class="modal fade" id="newAlsimModal" tabindex="-1" role="dialog" aria-labelledby="newAlsimModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="buatAbsenModalLabel">Buat Daftar Reject Alsim Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('schedule.store') }}" >
                    @csrf
                    <div class="mb-3">
                        <label for="date" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="date" required  name="date">
                    </div>
                    
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Buat lihat alsim lama -->
<div class="modal fade" id="historyAlsimModal" tabindex="-1" role="dialog" aria-labelledby="newAlsimModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="buatAbsenModalLabel">Check Riwayat Alsim</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('schedule.check') }}" >
                    @csrf
                    <div class="mb-3">
                        <label for="date" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="date" required  name="date">
                    </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Lanjutkan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')




@endsection
