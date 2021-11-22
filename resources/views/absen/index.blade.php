@extends('layouts.master')

@section('content')
<div class="section-header">
  <h1>Absensi Siswa</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="admin">Dashboard</a></div>
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

<table class="table table-bordered">
  <tr>
      <th>No</th>
      <th>NIS</th>
      <th>Nama</th>
      <th>Rombel</th>
      <th>Rayon</th>
      <th>Jam Kedatangan</th>
      <th>Jam Kepulangan</th>
      <th>Keterangan</th>
      <th width="280px">Action</th>
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

{!! $absen->links() !!}
@endsection