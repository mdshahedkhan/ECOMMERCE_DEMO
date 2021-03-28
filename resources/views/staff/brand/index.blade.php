@extends('staff.app.app')
@section('title', "Manage All Brand")
@push('CSS')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <!--Data Tables -->
    <link href="{{  asset('assets/backend/assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
    <style>
        .toggle-off.btn-sm {
            padding-left: 8px;
        }
    </style>
@endpush
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                <div class="breadcrumb-title pr-3">Dashboard</div>
                <div class="pl-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Brand Table</li>
                        </ol>
                    </nav>
                </div>
                <div class="ml-auto">
                    <div class="btn-group">
                        <a href="{{  route('staff.brand.create') }}" class="btn btn-info"><i class="bx bx-plus-circle"></i> Create New Brand</a>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="card radius-15">
                <div class="card-body">
                    <div class="card-title">
                        <h4 class="mb-0">Brand Table</h4>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Create By</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr class="RemoveRow{{ $item->id }}">
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{  $item->name }}</td>
                                        <td>{{  $item->slug }}</td>
                                        <td>{{  $item->users->name }}</td>
                                        <td>
                                            <input type="checkbox" data-toggle="toggle" data-id="{{ $item->id }}" data-url="" id="BrandStatus" data-on="Active" data-onstyle="success" data-off="Inactive" data-offstyle="warning"  data-size="small" {{  $item->status == 'active' ? 'checked' :''  }}>
                                        </td>
                                        <td>
                                            <a href="{{  route('staff.brand.edit', base64_encode($item->id)) }}" class="btn btn-info btn-sm">Edit</a>
                                            <a href="javascript:;" onclick="DeleteItems('{{ route('staff.brand.destroy', $item->id) }}', '{{ $item->id }}')" data-id="{{ $item->id }}" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('JS')
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<!--Data Tables js-->
<script src="{{  asset('assets/backend/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script>
    $('.table').DataTable();
</script>
@endpush
