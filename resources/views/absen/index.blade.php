@extends('layouts.master')

@section('content')
<div class="section-header">
  <h1>Absensi Siswa</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="dashboard">Dashboard</a></div>
    <div class="breadcrumb-item"><a href="#">Data</a></div>
  </div>
</div>
<div class="row">
  <div class="col-lg-12 margin-tb">
      <div class="pull-right">
          <a class="btn btn-success" href="{{ route('absen.create') }}"> Absen Disini</a>
      </div>
  </div>
</div>
<br>
@if ($message = Session::get('success'))
  <div class="alert alert-success">
      <p>{{ $message }}</p>
  </div>
@endif
<div class="card">
<table class="table table-striped">
  <tr>
      <th scope="col">No</th>
      <th scope="col">NIS</th>
      <th scope="col">Nama</th>
      <th scope="col">Rombel</th>
      <th scope="col">Rayon</th>
      <th scope="col">Jam Kedatangan</th>
      <th scope="col">Jam Kepulangan</th>
      <th scope="col">Keterangan</th>
      <th width="280px" scope="col">Action</th>
  </tr>
  @foreach ($absen as $a)
  <tr>
      <td>{{ ++$i }}</td>
      <td>{{ $a->nis }}</td>
      <td>{{ $a->nama }}</td>
      <td>{{ $a->rombel }}</td>
      <td>{{ $a->rayon }}</td>
      <td>{{ $a->jam_kedatangan }}</td>
      <td>{{ $a->jam_kepulangan }}</td>
      <td>{{ $a->keterangan }}</td>
      <td>
          <form action="{{ route('absen.destroy',$a->id) }}" method="POST">
     
              <a class="btn btn-primary" href="{{ route('absen.edit',$a->id) }}">Edit</a>

              @csrf
              @method('DELETE')
              @if (auth()->user()->level == "admin")
              <button type="submit" class="btn btn-danger">Delete</button>
              @endif
          </form>
      </td>
  </tr>
  @endforeach
</table>
</div>

{!! $absen->links() !!}
@endsection