<!-- resources/views/select_shift.blade.php -->

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
      <h1 class="display-4">Pilih Tanggal dan Shift</h1>
      <p class="lead">Silakan pilih taggal dan shift dan tanggal sebelum melanjutkan.</p>
    </div>
  
    <div class="row">
        <div class="col-md-6 offset-md-3">
            @if(session('message'))
            <div class="alert alert-{{ session('message')['class'] }} alert-dismissible fade show"  role="alert">
                {{ session('message')['text'] }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <a href="/" >+ Tambah Jadwal Baru</a>
            <form class="mt-3" method="get" action="{{ route('log.index') }}">
                <div class="form-group mb-2">
                    <label for="shift">Pilih Tanggal:</label>
                    <input type="date" class="form-control" id="date" required  name="date" value="{{ request('date') }}">
                </div>
                <div class="form-group mb-2">
                    <label for="shift">Pilih Shift:</label>
                    <select class="form-control" name="shift" id="shift" required>
                        @for($i=1; $i<=3; $i++)
                            <option value="{{ $i }}"  {{ (request('shift') == $i) ? 'selected' : '' }}>Shift {{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Lanjutkan</button>
            </form>
        </div>
    </div>
</div>
@include('layouts.footer')

@endsection
