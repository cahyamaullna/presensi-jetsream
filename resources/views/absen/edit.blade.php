@extends('layouts.master')
  
@section('content')
<div class="section-header">
    <h1>Daftar Siswa</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="admin">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="#">Data</a></div>
      <div class="breadcrumb-item"><a href="students">Daftar Rayon</a></div>
    </div>
  </div>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('absen.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <br>    
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        
    <form action="{{ route('absen.update',$absen->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf

        @method('PUT')
        
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>NIS</strong>
                    <input type="text" name="nis" class="form-control" placeholder="NIS" value="{{$absen->nis}}">
                </div>
                <div class="form-group">
                    <strong>Jam Kedatangan</strong>
                    <input type="text" name="jam_kedatangan" class="form-control" placeholder="Jam Kedatangan" value="{{$absen->jam_kedatangan}}">
                </div>
                <div class="form-group">
                    <strong>Jam Kedatangan</strong>
                    <input type="text" name="jam_kepulangan" class="form-control" placeholder="Jam Kepulangan" value="{{$absen->jam_kepulangan}}">
                </div>
                <div class="form-group">
                    <strong>Keterangan:</strong>
                    <input type="radio" name="keterangan" value="Hadir" {{$absen->keterangan == 'Hadir'? 'checked' : ''}}> Hadir
                    <input type="radio" name="keterangan" value="Sakit" {{$absen->keterangan == 'Sakit'? 'checked' : ''}}> Sakit
                    <input type="radio" name="keterangan" value="Ijin" {{$absen->keterangan == 'Ijin'? 'checked' : ''}}> Ijin
                    <input type="radio" name="keterangan" value="Alfa"  {{$absen->keterangan == 'Alfa'? 'checked' : ''}}> Alfa
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        
    </form>
@endsection