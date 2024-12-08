@extends('layouts/contentNavbarLayout')

@section('title', 'Create patient')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card mb-6">
      <div class="card-body">
        <div class="d-flex align-items-start align-items-sm-center gap-6">
          <img src="{{asset('assets/img/avatars/1.png')}}" alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar" />
        </div>
      </div>

      <div class="card-body pt-0">
        <form id="formAccountSettings" method="POST" action="{{ route('storage-patient') }}">
        @csrf
        <div class="row mt-1 g-5">
            <div class="col-md-6">
              <div class="form-floating form-floating-outline">
                <input class="form-control" type="text" id="Full_Name" name="Full_Name" value="" placeholder="Fullname" />
                <label for="Full_Name">Fullname</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating form-floating-outline">
                <input class="form-control" type="text" name="Identity_Number" id="Identity_Number" value=""  placeholder="Identity Number" />
                <label for="Identity_Number">Identity Number</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="input-group input-group-merge">
                <div class="form-floating form-floating-outline">
                  <input type="text" id="Phone" name="Phone" class="form-control" placeholder="202 555 0111" />
                  <label for="Phone">Phone</label>
                </div>
                <span class="input-group-text">VN (+84)</span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating form-floating-outline">
                <input type="text" class="form-control" id="Address" name="Address" placeholder="Địa chỉ" />
                <label for="Address">Address</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating form-floating-outline">
                <select id="Gender" name="Gender" class="select2 form-select">
                  <option value="Male" selected>Male</option>
                  <option value="Female">Female</option>
                </select>
                <label for="Gender">Gender</label>
              </div>
            </div>
            <div class="row mt-1 g-5">
            <div class="col-md-6">
              <small class="text-light fw-medium">Choose Patient's Symptoms</small>
              <div class="demo-inline-spacing mt-4">
                <div class="list-group">
                  @foreach($symptoms as $symptom)
                  <label class="list-group-item">
                    <span class="form-check mb-0">
                      <input id="Symptom_ID[]" name="Symptom_ID[]" class="form-check-input me-4" type="checkbox" value="{{ $symptom->Symptom_ID }}">
                      {{ $symptom->Symptom_Name }}
                    </span>
                  </label>
                  @endforeach
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <small class="text-light fw-medium">Choose Patient's Comorbidities</small>
              <div class="demo-inline-spacing mt-4">
                <div class="list-group">
                  @foreach($comorbidities as $comorbidity)
                  <label class="list-group-item">
                    <span class="form-check mb-0">
                      <input id="Comorbidity_ID[]" name="Comorbidity_ID[]" class="form-check-input me-4" type="checkbox" value="{{ $comorbidity->Comorbidity_ID }}">
                      {{ $comorbidity->Description }}
                    </span>
                  </label>
                  @endforeach
                </div>
              </div>
            </div>
            </div>
            <div class="mt-6">
              <button type="submit" class="btn btn-primary me-1">Save</button>
              <button type="reset" id="resetButton" class="btn btn-outline-secondary">Reset</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
    document.getElementById('resetButton').addEventListener('click', function() {
        // Reload the page
        window.location.reload();
    });
</script>
@endsection
