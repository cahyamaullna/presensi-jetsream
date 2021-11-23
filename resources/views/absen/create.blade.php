@extends('layouts.master')
  
@section('content')
<div class="section-header">
    <h1>Tambah Absen</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="dashboard">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="absen">Data</a></div>
      <div class="breadcrumb-item"><a href="students">Daftar Rayon</a></div>
    </div>
  </div>

    <div class="row">
        <div class="col-lg-12 margin-tb">
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
        
    <form action="{{ route('absen.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>NIS</strong>
                    <input type="text" name="nis" class="form-control" placeholder="NIS">
                </div>
                <div class="form-group">
                    <strong>Nama:</strong>
                    <input type="text" name="nama" class="form-control" placeholder="Nama">
                </div>
                <div class="form-group">
                    <strong>Rombel:</strong>
                    <select class="form-control" name="rombel">
                        @foreach($rombel as $rombel)
                        <option value="{{$rombel->rombel}}">{{$rombel->rombel}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <strong>Rayon:</strong>
                    <select class="form-control" name="rayon">
                        @foreach($rayons as $rayon)
                        <option value="{{$rayon->rayon}}">{{$rayon->rayon}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <strong>Jam Kedatangan</strong>
                    <input type="datetime-local" name="jam_kedatangan" class="form-control" placeholder="Jam Kedatangan">
                </div>
                <div class="form-group">
                    <strong>Jam Kepulangan</strong>
                    <input type="datetime-local" name="jam_kepulangan" class="form-control" placeholder="Jam Kepulangan">
                </div>
                <div class="form-group">
                    <strong>Keterangan:</strong>
                    <input type="radio" name="keterangan" value="Hadir"> Hadir
                    <input type="radio" name="keterangan" value="Sakit"> Sakit
                    <input type="radio" name="keterangan" value="Ijin"> Ijin
                    <input type="radio" name="keterangan" value="Alfa"> Alfa
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        
    </form>
@endsection