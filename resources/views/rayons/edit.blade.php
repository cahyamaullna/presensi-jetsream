@extends('layouts.master')
  
@section('content')
<div class="section-header">
    <h1>Edit Rayon</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="admin">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="#">Data</a></div>
      <div class="breadcrumb-item"><a href="students">Daftar Rayon</a></div>
    </div>
  </div>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('rayons.index') }}"> Back</a>
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
        
    <form action="{{ route('rayons.update',$rayon->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf

        @method('PUT')
        
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Rayon</strong>
                    <input type="text" name="rayon" class="form-control" placeholder="Rayon" value="{{$rayon->rayon}}">
                </div>
                <div class="form-group">
                    <strong>Nama Pembimbing</strong>
                    <input type="text" name="nama_pembimbing" class="form-control" placeholder="Nama Pembimbing" value="{{$rayon->nama_pembimbing}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        
    </form>
@endsection