@extends('layouts.master')
  
@section('content')
<div class="section-header">
    <h1>Daftar Siswa</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="admin">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="#">Data</a></div>
      <div class="breadcrumb-item"><a href="students">Daftar Siswa</a></div>
    </div>
  </div>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('students.index') }}"> Back</a>
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
        
    <form action="{{ route('students.update',$student->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>NIS:</strong>
                <input type="text" name="nis" class="form-control" placeholder="NIS">
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama:</strong>
                <input type="text" name="nama" class="form-control" placeholder="Nama">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Rombel:</strong>
                <select class="form-control" name="rombel">
                    @foreach($rombel as $r)
                    <option value="{{$r->rombel}}">{{$r->rombel}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Rayon:</strong>
                <select class="form-control" name="rayon">
                    @foreach($rayons as $rayon)
                    <option value="{{$rayon->rayon}}">{{$rayon->rayon}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    
</form>
@endsection