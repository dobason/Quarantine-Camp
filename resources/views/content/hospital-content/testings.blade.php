@extends('layouts/contentNavbarLayout')

@section('title', 'Testing Result')

@section('content')
<!-- Basic Bootstrap Table -->
<div class="card">
  <div class="d-flex">
    <a class="my-4" href="/dashboard">
      <button type="button" class="btn btn-secondary ms-2">Back to Dashboard</button>
    </a>
    <a class="my-4" href="/report?patient_id={{ request()->input('patient_id') }}">
      <button type="button" class="btn btn-primary ms-2">Add testing for this patient</button>
    </a>
  </div>
  <h5 class="card-header">Testing List from Patient ID: {{ request()->input('patient_id') }}</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
      <tr>
        {{--<th>Project</th>--}}
        <th>TestID</th>
        <th>Test type</th>
        <th>Patient Name</th>
        <th>Result</th>
        <th>CT Value</th>
        <th>SPO2</th>
        <th>Breathing rate</th>
        <th>Warning</th>
      </tr>
      </thead>
      <tbody class="table-border-bottom-0">
      @foreach($testings as $testing)
      <tr>
        {{--<td><i class="ri-suitcase-2-line ri-22px text-danger me-4"></i><span>Tours Project</span></td>--}}
        <td>{{ $testing->Test_ID }}</td>
        <td>{{ $testing->Test_Type }}</td>
        <td>{{ $testing->patient->Full_Name }}</td>
        <td>{{ $testing->Result }}</td>
        <td>{{ $testing->CT_Value }}</td>
        <td>{{ $testing->SPO2 }}</td>
        <td>{{ $testing->Respiratory_Rate }}</td>
        <td>{!! $testing->Warning == 1 ? '<span class="badge rounded-pill bg-label-danger me-1">Dangerous</span>' : '<span class="badge rounded-pill bg-label-success me-1">Safe</span>' !!}</td>
      </tr>
      @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection
