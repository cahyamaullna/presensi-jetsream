@extends('layouts.master')

@section('content')
<div class="section-header">
  <h1>Daftar Rombel</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="dashboard">Dashboard</a></div>
    <div class="breadcrumb-item"><a href="#">Data</a></div>
  </div>
</div>
@if (auth()->user()->level == "admin")
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('rombel.create') }}"> Create</a>
            </div>
        </div>
    </div>
    <br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
@endif
     
        <div class="card">
        <table class="table table-striped">
        <tr>
            <th>No</th>
            <th>Nama Rombel</th>
            @if (auth()->user()->level == "admin")
            <th width="280px">Action</th>
            @endif
        </tr>
        @foreach ($rombel as $r)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $r->rombel }}</td>
            @if (auth()->user()->level == "admin")
            <td>
                <form action="{{ route('rombel.destroy',$r->id) }}" method="POST">
           
                    <a class="btn btn-primary" href="{{ route('rombel.edit',$r->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
            @endif
        </tr>
        @endforeach
    </table>
    {!! $rombel->links() !!}
@endsection