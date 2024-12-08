@extends('layouts/contentNavbarLayout')

@section('title', 'Patient Detail')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div id="print-area" class="card mb-6">
      <div class="card-body">
        <div class="d-flex align-items-start align-items-sm-center gap-6">
          <img src="{{asset('assets/img/avatars/1.png')}}" alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar" />
        </div>
      </div>

      <div class="card-body pt-0">
        <div class="row mt-1 g-5">
          <div class="col-md-6">
            <label for="Patient_ID">Patient ID</label>
            <div>{{ $patient->Patient_ID }}</div>
          </div>
          <div class="col-md-6">
            <label for="Patient_ID">Fullname</label>
            <div>{{ $patient->Full_Name }}</div>
          </div>
          <div class="col-md-6">
            <label for="Identity_Number">Identity Number</label>
            <div>{{ $patient->Identity_Number }}</div>
          </div>
          <div class="col-md-6">
            <label for="Phone">Phone</label>
            <div>{{ $patient->Phone }}</div>
          </div>
          <div class="col-md-6">
            <label for="Gender">Gender</label>
            <div>{{ $patient->Gender }}</div>
          </div>
          <div class="col-md-6">
            <label for="Gender">Address</label>
            <div>{{ $patient->Address }}</div>
          </div>
          <div class="col-md-6">
            <small class="text-light fw-medium">Patient's Symptoms</small>
            <div class="demo-inline-spacing mt-4">
              <div class="list-group">
                @forelse($patient->symptoms as $symptom)
                  <a href="javascript:void(0);" class="list-group-item list-group-item-action">{{ $symptom->Symptom_Name }}</a>
                @empty
                    <li>No symptom recorded.</li>
                @endforelse
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <small class="text-light fw-medium">Patient's Comorbidities</small>
            <div class="demo-inline-spacing mt-4">
              <div class="list-group">
                @forelse($patient->comorbidities as $comorbidity)
                  <a href="javascript:void(0);" class="list-group-item list-group-item-action">{{ $comorbidity->Description }}</a>
                @empty
                    <li>No comorbidities recorded.</li>
                @endforelse
              </div>
            </div>
          </div>
      </div>
      <div class="row mt-1 g-5">
        <h5 class="card-header">Testing Results:</h5>
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
    </div>
  </div>
  <div class="mt-6 g-5">
    <button id="downloadPdf" type="button" class="btn btn-primary me-1">Download Report</button>
  </div>
  <div class="card mb-6 mt-6">
    <div class="card-body pt-0">
    <div class="row mt-1 g-5">
        <form id="addTestingResult" method="POST" action="{{ route('storage-testing') }}">
        @csrf
        <div class="row mt-1 g-5">
            <div class="col-md-6">
              <input type="hidden" id="Patient_ID" name="Patient_ID" value="{{ $patient->Patient_ID }}" />
              <div class="form-floating form-floating-outline">
                <input class="form-control" type="text" id="Test_Type" name="Test_Type" value="" placeholder="Test Type" />
                <label for="Test_Type">Test Type</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating form-floating-outline">
                <select id="Result" name="Result" class="select2 form-select">
                  <option value="Positive" selected>Positive</option>
                  <option value="Negative">Negative</option>
                </select>
                <label for="Result">Result</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating form-floating-outline">
                <input class="form-control" type="text" name="CT_Value" id="CT_Value" value=""  placeholder="CT Value" />
                <label for="CT_Value">CT Value</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating form-floating-outline">
                <input class="form-control" type="text" name="SPO2" id="SPO2" value=""  placeholder="SPO2" />
                <label for="SPO2">SPO2</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating form-floating-outline">
                <input type="text" class="form-control" id="Respiratory_Rate" name="Respiratory_Rate" placeholder="Respiratory Rate" />
                <label for="Respiratory_Rate">Respiratory Rate</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating form-floating-outline">
                <select id="Warning" name="Warning" class="select2 form-select">
                  <option value="0" selected>false</option>
                  <option value="1">true</option>
                </select>
                <label for="Warning">Warning</label>
              </div>
            </div>

            <div class="mt-6">
              <button type="submit" class="btn btn-success me-1">Add testing result</button>
              <button id="resetButton" type="reset" class="btn btn-outline-secondary">Reset</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://rawgit.com/eKoopmans/html2pdf.js/master/dist/html2pdf.bundle.js"></script>
<script>
    document.getElementById('resetButton').addEventListener('click', function() {
        // Reload the page
        window.location.reload();
    });
    document.getElementById("downloadPdf").addEventListener("click", function () {
        // Get the button and hide it before generating the PDF
        var button = document.getElementById("downloadPdf");
        button.style.display = "none";  // Hide the button

        // Get the element to be converted to PDF
        var element = document.getElementById("print-area");

        // Define options for html2pdf
        var opt = {
            margin:       [10, 10, 10, 10], // Set margins (top, right, bottom, left)
            filename:     'patient_details.pdf', // Set filename
            html2canvas:  {
                // scale: 4, // Increase resolution for clearer output
                width: 1200, // Ensure the width is correctly captured
                height: 1200 // Ensure the full height is captured
            },
            jsPDF:        {
                unit: 'mm',
                format: 'a4',
                orientation: 'portrait',
                compressPdf: true
            }
        };

        html2pdf().from(element).set(opt).save()
            .finally(function() {
                // Make the button visible again after the PDF is generated
                button.style.display = "block"; // Show the button again
            });
    });
</script>
@endsection
