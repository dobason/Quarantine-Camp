@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard')

@section('content')
<!-- Basic Bootstrap Table -->
<div class="card">

{{--  Bảng danh sách bệnh nhân....--}}
  <h5 class="card-header">Patient List</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>Patient ID</th>
          <th>Full Name</th>
          <th>Gender</th>
          <th>Address</th>
          <th>Phone</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach($patients as $patient)
        <tr>
          <td>{{ $patient->Patient_ID }}</td>
          <td>{{ $patient->Full_Name }}</td>
          <td>{{ $patient->Gender }}</td>
          <td>{{ $patient->Address }}</td>
          <td>{{ $patient->Phone }}</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ri-more-2-line"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="/testings?patient_id={{ $patient->Patient_ID }}"><i class="ri-eye-line me-1"></i>View Testings of Patient</a>
                <a class="dropdown-item" href="/report?patient_id={{ $patient->Patient_ID }}"><i class="ri-file-chart-line me-1"></i>View Detail of Patient</a>
              </div>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

{{--Bảng danh sách các nhân viên y tế--}}
<hr class="my-12">
<div class="card">
  <h5 class="card-header">Employee List</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead class="table-dark">
      <tr>
        <th>Employee ID</th>
        <th>Full Name</th>
        <th>Role</th>
        <th>Phone</th>
      </tr>
      </thead>
      <tbody class="table-border-bottom-0">
      @foreach($employees as $employee)
      <tr>
        <td>{{ $employee->Employee_ID }}</td>
        <td>{{ $employee->Full_Name }}</td>
        <td>{{ $employee->Role }}</td>
        <td>{{ $employee->Phone }}</td>
      </tr>
      @endforeach
      </tbody>
    </table>
  </div>
</div>


<hr class="my-12">
  <!-- Basic Bootstrap Table -->
  <div class="card">
    <h5 class="card-header">Testing Result List</h5>
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
