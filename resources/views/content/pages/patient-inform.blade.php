@section('content')
  <!-- Basic Bootstrap Table -->
  <div class="card">

    {{--  Bảng danh sách bệnh nhân....--}}
    <h5 class="card-header">Danh sách bệnh nhân</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
        <tr>
          {{--<th>Project</th>--}}
          <th>Mã số</th>
          <th>Họ và tên</th>
          <th>Giới tính</th>
          <th>Trạng thái</th>
          <th>Hành động</th>
        </tr>
        </thead>
        <tbody class="table-border-bottom-0">
        <tr>
          {{--<td><i class="ri-suitcase-2-line ri-22px text-danger me-4"></i><span>Tours Project</span></td>--}}
          <td>1</td>
          <td>Võ Văn A</td>
          <td>Nam</td>
          <td><span class="badge rounded-pill bg-label-primary me-1">Dương tính</span></td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ri-more-2-line"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);"><i class="ri-pencil-line me-1"></i> Chỉnh sửa</a>
                <a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-6-line me-1"></i> Xoá</a>
              </div>
            </div>
          </td>
        </tr>
        <tr>
          {{--<td><i class="ri-basketball-fill ri-22px text-info me-4"></i><span>Sports Project</span></td>--}}
          <td>2</td>
          <td>Võ Thị B</td>
          <td>Nữ</td>
          <td><span class="badge rounded-pill bg-label-success me-1">Dương tính</span></td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ri-more-2-line"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);"><i class="ri-pencil-line me-2"></i> Chỉnh sửa</a>
                <a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-6-line me-2"></i> Xoá</a>
              </div>
            </div>
          </td>
        </tr>
        <tr>
          {{--<td><i class="ri-leaf-fill ri-22px text-success me-4"></i><span>Greenhouse Project</span></td>--}}
          <td>3</td>
          <td>Võ Văn C</td>
          <td>Nam</td>
          <td><span class="badge rounded-pill bg-label-info me-1">Âm tính</span></td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ri-more-2-line"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);"><i class="ri-pencil-line me-2"></i> Chỉnh sửa</a>
                <a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-6-line me-2"></i> Xoá</a>
              </div>
            </div>
          </td>
        </tr>
        <tr>
          {{--<td><i class="ri-bank-fill ri-22px text-primary me-4"></i><span>Bank Project</span></td>--}}
          <td>4</td>
          <td>Võ Thị D</td>
          <td>Nữ</td>
          <td><span class="badge rounded-pill bg-label-warning me-1">Dương tính</span></td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ri-more-2-line"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);"><i class="ri-pencil-line me-2"></i> Chỉnh sửa</a>
                <a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-6-line me-2"></i> Xoá</a>
              </div>
            </div>
          </td>
        </tr>
        </tbody>
      </table>
    </div>
  </div>
