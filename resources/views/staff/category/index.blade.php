@extends('staff.app.app')
@section('title', "Manage All Category")
@push('CSS')
    <link href="{{ asset('assets/backend/assets/bootstrap-toggle.min.css') }}" rel="stylesheet">
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
                            <li class="breadcrumb-item active" aria-current="page">Category Table</li>
                        </ol>
                    </nav>
                </div>
                <div class="ml-auto">
                    <div class="btn-group">
                        <a href="{{  route('staff.category.create') }}" class="btn btn-info"><i class="bx bx-plus-circle"></i> Create New Category</a>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="card radius-15">
                <div class="card-body">
                    <div class="card-title">
                        <h4 class="mb-0">Category Table</h4>
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
                                            <input type="checkbox" data-toggle="toggle" data-id="{{ $item->id }}" data-url="" id="CategoryStatus" data-on="Active" data-onstyle="success" data-off="Inactive" data-offstyle="warning"  data-size="small" {{  $item->status == 'active' ? 'checked' :''  }}>
                                        </td>
                                        <td>
                                            <a href="{{  route('staff.category.edit', base64_encode($item->id)) }}" class="btn btn-info btn-sm">Edit</a>
                                            <a href="javascript:;" onclick="DeleteItems('{{ route('staff.category.destroy', $item->id) }}', '{{ $item->id }}')" data-id="{{ $item->id }}" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                    @if(count($item->sub_category))
                                        @foreach($item->sub_category as $sub_category1)
                                            <tr class="RemoveRow{{ $sub_category1->id }}">
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{  $item->name .' > '. $sub_category1->name }}</td>
                                                <td>{{  $sub_category1->slug }}</td>
                                                <td>{{  $sub_category1->users->name }}</td>
                                                <td>
                                                    <input type="checkbox" data-toggle="toggle" data-id="{{ $sub_category1->id }}" data-url="" id="CategoryStatus" data-on="Active" data-onstyle="success" data-off="Inactive" data-offstyle="warning"  data-size="small" {{  $sub_category1->status == 'active' ? 'checked' :''  }}>
                                                </td>
                                                <td>
                                                    <a href="{{  route('staff.category.edit', base64_encode($sub_category1->id)) }}" class="btn btn-info btn-sm">Edit</a>
                                                    <a href="javascript:;" onclick="DeleteItems('{{ route('staff.category.destroy', base64_encode($sub_category1->id)) }}', '{{ $sub_category1->id }}')" data-id="{{ $sub_category1->id }}" class="btn btn-danger btn-sm">Delete</a>
                                                </td>
                                            </tr>
                                            @if(count($sub_category1->sub_category))
                                                @foreach($sub_category1->sub_category as $sub_category2)
                                                    <tr class="RemoveRow{{ $sub_category2->id }}">
                                                        <th scope="row">{{ $loop->iteration }}</th>
                                                        <td>{{  $item->name .' > '. $sub_category1->name .' > '.$sub_category2->name }}</td>
                                                        <td>{{  $sub_category2->slug }}</td>
                                                        <td>{{  $sub_category2->users->name }}</td>
                                                        <td>
                                                            <input type="checkbox" data-toggle="toggle" data-size="mini" data-id="{{ $sub_category2->id }}" data-url="" id="CategoryStatus" data-on="Active" data-onstyle="success" data-off="Inactive" data-offstyle="warning"  data-size="small" {{  $sub_category2->status == 'active' ? 'checked' :''  }}>
                                                        </td>
                                                        <td>
                                                            <a href="{{  route('staff.category.edit', base64_encode($sub_category2->id)) }}" class="btn btn-info btn-sm">Edit</a>
                                                            <a href="javascript:;" onclick="DeleteItems('{{ route('staff.category.destroy', $sub_category2->id) }}', '{{ $sub_category2->id }}')" data-id="{{ $sub_category2->id }}" class="btn btn-danger btn-sm">Delete</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @endif
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
    <script src="{{ asset('assets/backend/assets/bootstrap-toggle.min.js') }}"></script>
    <!--Data Tables js-->
    <script src="{{  asset('assets/backend/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script>
        $('.table').DataTable();
    </script>
@endpush
