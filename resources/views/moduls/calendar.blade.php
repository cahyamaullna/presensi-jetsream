@extends('layouts.master')
@section('content')
          <div class="section-header">
            <h1>Calendar</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Modules</a></div>
              <div class="breadcrumb-item">Calendar</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Calendar</h4>
                  </div>
                  <div class="card-body">
                    <div class="fc-overflow">
                      <div id="myEvent"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

  <!-- General JS Scripts -->

@endsection