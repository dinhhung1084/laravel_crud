<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Danh Sách Sinh Viên</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f7f9fc;
    }

    .container {
      background-color: #fff;
      border-radius: 8px;
      padding: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h2 {
      font-weight: 600;
      color: #333;
    }

    table {
      margin-top: 20px;
    }

    table thead {
      background-color: #f0f0f0;
    }

    table tbody tr:hover {
      background-color: #f1f1f1;
    }

    .btn {
      border-radius: 50px;
    }

    .alert {
      margin-bottom: 20px;
    }

    a.btn-sm {
      padding: 8px 16px;
    }
    .pagination .page-item {
    margin-left: 5px;
}

.pagination {
    display: flex;
    justify-content: center;
}
  </style>
</head>

<body>
  <div class="container mt-5">
    <h2 class="text-center mb-4">Danh Sách Sinh Viên</h2>
    <a href="{{ route('AddUserForm') }}" class="btn btn-secondary btn-sm float-end mb-3">Thêm Mới</a>

    @if (Session::has('success'))
      <div class="alert alert-success p-2">{{ Session::get('success') }}</div>
    @endif
    @if (Session::has('fail'))
      <div class="alert alert-danger p-2">{{ Session::get('fail') }}</div>
    @endif


    <div class="mb-3">

        <a href="{{ route('users', ['sort_by' => 'masv', 'order' => ($sort_by == 'masv' && $order == 'asc') ? 'desc' : 'asc']) }}" class="btn btn-secondary btn-sm">
            Sắp xếp theo mã sinh viên
            @if($sort_by == 'masv')
                @if($order == 'asc')
                    <i class="fas fa-arrow-up"></i> <!-- Hiển thị icon mũi tên lên -->
                @else
                    <i class="fas fa-arrow-down"></i> <!-- Hiển thị icon mũi tên xuống -->
                @endif
            @endif
        </a>
        <a href="{{ route('users', ['sort_by' => 'name', 'order' => ($sort_by == 'name' && $order == 'asc') ? 'desc' : 'asc']) }}" class="btn btn-secondary btn-sm">
            Sắp xếp theo tên
            @if($sort_by == 'name')
                @if($order == 'asc')
                    <i class="fas fa-arrow-up"></i> <!-- Hiển thị icon mũi tên lên -->
                @else
                    <i class="fas fa-arrow-down"></i> <!-- Hiển thị icon mũi tên xuống -->
                @endif
            @endif
        </a>

        <a href="{{ route('users', ['sort_by' => 'email', 'order' => ($sort_by == 'email' && $order == 'asc') ? 'desc' : 'asc']) }}" class="btn btn-secondary btn-sm">
            Sắp xếp theo email
            @if($sort_by == 'email')
                @if($order == 'asc')
                    <i class="fas fa-arrow-up"></i>
                @else
                    <i class="fas fa-arrow-down"></i>
                @endif
            @endif
        </a>

    </div>

    <table class="table table-striped">
      <thead>
        <tr>
          {{-- <th scope="col">ID</th> --}}
          <th scope="col">Mã Sinh Viên</th>
          <th scope="col">Tên Sinh Viên</th>
          <th scope="col">Email</th>
          <th scope="col">Số Điện Thoại</th>
          <th scope="col">Địa Chỉ</th>
          <th colspan="2" scope="col">Hành Động</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($all_users as $user)
          <tr>
            {{-- <th scope="row">{{ $user->id }}</th> --}}
            <td>{{ $user->masv }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->sdt }}</td>
            <td>{{ $user->address }}</td>
            <td><a href="/edit/{{$user->id}}" class="btn btn-info btn-sm">Sửa</a></td>
            <td><a href="/delete/{{$user->id}}" class="btn btn-danger btn-sm">Xóa</a></td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $all_users->links('pagination::bootstrap-5') }}
        {{-- {{ $all_users->appends(request()->query())->links() }} --}}
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
