<!-- resources/views/home.blade.php -->

@extends('layouts.master')

@section('page-css')
@endsection

@section('main-content')

@include('layouts.header')
<div class="container">
    <form action="{{ route('log.index') }}" method="GET">
        <div class="row mb-4">
            <div class="col-md-2 mt-1">
                <label for="tanggal">Tanggal</label>
                <input type="date" id="date" value="{{ request('date') }}" name="date" class="form-control" required>
            </div>
            <div class="col-md-2 mt-1">
                <label for="shift">Shift ke</label>
                <select id="shift" name="shift" class="form-control">
                    <option value="1" {{ (request('shift') == '1') ? 'selected' : '' }}>Shift 1</option>
                    <option value="2" {{ (request('shift') == '2') ? 'selected' : '' }}>Shift 2</option>
                    <option value="3" {{ (request('shift') == '3') ? 'selected' : '' }}>Shift 3</option>
                </select>          
            </div>
            <div class="col-md-2 mt-1 align-self-end">
                <button type="submit" class="btn btn-primary btn-block">Search</button>
            </div>
        </div>
    </form>
            
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-4">
                <div  id="carouselExampleAutoplaying" class="carousel slide m-1" data-bs-ride="carousel" style="width: 100%; height: 400px;">
                <div class="carousel-inner d-block" style="width: 100%; height: 400px;">
                        <div class="carousel-item active">
                            <img src="{{asset('storage/img/foto1.jpg')}}" class="d-block w-100" alt="..." data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('storage/img/danone_1.jpg')}}" class="d-block w-100" alt="..." data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{asset('storage/img/danone_2.jpg')}}" class="d-block w-100" alt="..." data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-md-4">
                <h5 class="mb-1">Tabel Alsim 1</h5>
                <p class="mb-1">Target : Max 20 Bph</p>
                <table class="table table-sm table-bordered border-primary text-center">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 20%; background-color: #4285f4; color:white;">Jam Ke-</th>
                            <th scope="col" style="width: 40%; background-color: #4285f4; color:white;">Total</th>
                            <th scope="col" style="width: 20%; background-color: #4285f4; color:white;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 1; $i <= 8; $i++)
                        <tr>
                            <th style="font-size: 1.1em;" scope="row">{{ $i }}</th>
                            <td>
                                @php
                                    $log_amount = $logs->where('time_in', $i)->where('id_alsim', 1)->pluck('log_amount')->first();
                                @endphp
                                <span style="color: {{ $log_amount > 20 ? 'red' : 'black' }}; font-size: 1.1em;">   
                                    {{ $log_amount }}
                                </span>
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal-alsim1{{ $i }}">
                                    edit
                                </button>
                            </td>
                        </tr>
                        <div class="modal fade" id="exampleModal-alsim1{{ $i }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div style="display: flex; align-items: center;">
                                            <h6 style="margin-right: 5px;">Tanggal</h6>
                                            <h6 style="margin-right: 5px;">:</h6>
                                            <h6>{{ request('date') }}</h6>
                                        </div>
                                        <div style="display: flex; align-items: center;">
                                            <h6 style="margin-right: 5px;">Shift Ke</h6>
                                            <h6 style="margin-right: 5px;">:</h6>
                                            <h6>{{ request('shift') }}</h6>
                                        </div>
                                        <div style="display: flex; align-items: center;">
                                            <h6 style="margin-right: 5px;">Jam Ke</h6>
                                            <h6 style="margin-right: 5px;">:</h6>
                                            <h6>{{ $i }}</h6>
                                        </div>
                                        <form method="post" action="{{ route('log.store') }}" >
                                            @csrf
                                            <div class="mb-3">
                                                <label for="log_amount" class="form-label">Jumlah</label>
                                                <input type="number" class="form-control" id="log_amount" required  name="log_amount" value="{{ $log_amount }}">
                                            </div>

                                            <div style="display: hidden">
                                                <input type="hidden" readonly class="form-control" id="date" required  name="date" value="{{ request('date') }}">
                                                <input type="hidden" readonly class="form-control" id="shift" required  name="shift" value="{{ request('shift') }}">
                                                <input type="hidden" readonly class="form-control" id="time_in" required  name="time_in" value="{{$i}}">
                                                <input type="hidden" readonly class="form-control" id="id_alsim" required  name="id_alsim" value="1">
                                            </div>
                                            
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </form>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                        @endfor
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <h5 class="mb-1">Tabel Alsim 3</h5>
                <p class="mb-1">Target : Max 20 Bph</p>
                <table class="table table-sm  table-bordered border-primary text-center">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col" style="width: 20%; background-color: #4285f4; color:white;">Jam Ke-</th>
                            <th scope="col" style="width: 40%; background-color: #4285f4; color:white;">Total</th>
                            <th scope="col" style="width: 20%; background-color: #4285f4; color:white;">Aksi</th>
                        </tr>
                    </thead>                    
                    <tbody>
                        @for ($i = 1; $i <= 8; $i++)
                        <tr>
                            <th style="font-size: 1.1em;" scope="row">{{ $i }}</th>
                            <td >
                                @php
                                    $log_amount = $logs->where('time_in', $i)->where('id_alsim', 2)->pluck('log_amount')->first();
                                @endphp
                                <span style="color: {{ $log_amount > 20 ? 'red' : 'black' }}; font-size: 1.1em;">   
                                    {{ $log_amount }}
                                </span>
                                
                            </td>

                            <td>
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal-alsim3{{ $i }}">
                                    edit
                                </button>
                            </td>
                        </tr>
                        <div class="modal fade" id="exampleModal-alsim3{{ $i }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div style="display: flex; align-items: center;">
                                            <h6 style="margin-right: 5px;">Tanggal</h6>
                                            <h6 style="margin-right: 5px;">:</h6>
                                            <h6>{{ request('date') }}</h6>
                                        </div>
                                        <div style="display: flex; align-items: center;">
                                            <h6 style="margin-right: 5px;">Shift Ke</h6>
                                            <h6 style="margin-right: 5px;">:</h6>
                                            <h6>{{ request('shift') }}</h6>
                                        </div>
                                        <div style="display: flex; align-items: center;">
                                            <h6 style="margin-right: 5px;">Jam Ke</h6>
                                            <h6 style="margin-right: 5px;">:</h6>
                                            <h6>{{ $i }}</h6>
                                        </div>
                                        <form method="post" action="{{ route('log.store') }}" >
                                            @csrf
                                            <div class="mb-3">
                                                <label for="log_amount" class="form-label">Jumlah</label>
                                                <input type="number" class="form-control" id="log_amount" required  name="log_amount" value="{{ $log_amount }}">
                                            </div>

                                            <div style="display: hidden">
                                                <input type="hidden" readonly class="form-control" id="date" required  name="date" value="{{ request('date') }}">
                                                <input type="hidden" readonly class="form-control" id="shift" required  name="shift" value="{{ request('shift') }}">
                                                <input type="hidden" readonly class="form-control" id="time_in" required  name="time_in" value="{{$i}}">
                                                <input type="hidden" readonly class="form-control" id="id_alsim" required  name="id_alsim" value="2">
                                            </div>
                                            
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </form>
                                    </div>
            
                                </div>
                            </div>
                        </div>

                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
  
@endsection
