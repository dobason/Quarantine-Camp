@extends('layouts/blankLayout')

@section('title', 'Welcome')

@section('page-style')
  @vite(['resources/assets/vendor/scss/pages/page-misc.scss', 'resources/css/home.css'])
@endsection

@section('content')
  <!--Under Maintenance -->
  <div class="misc-wrapper">
    <h4 class="mb-2 mx-2">Welcome to Quarantine Camp</h4>
    <p class="mb-10 mx-2"></p>
    <a href="/dashboard">
      <button class="btn btn-primary text-center my-12">Go to Home Page</button>
    </a>
    <div class="d-flex flex-column align-items-center">
      <img src="{{asset('assets/img/illustrations/misc-under-maintenance.png')}}" alt="misc-error" class="img-fluid z-1" width="780">
    </div>

    <div class="d-flex justify-content-center mt-5">
      <img src="{{asset('assets/img/illustrations/tree-3.png')}}" alt="misc-tree" class="img-fluid misc-object d-none d-lg-inline-block">
      <img src="{{asset('assets/img/illustrations/misc-mask-light.png')}}" alt="misc-error" class="scaleX-n1-rtl misc-bg d-none d-lg-inline-block" height="172">
    </div>
  </div>
@endsection

@section('page-script')
  @vite(['resources/js/home.js'])
@endsection

