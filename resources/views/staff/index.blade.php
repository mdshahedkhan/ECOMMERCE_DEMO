@extends('staff.app.app')
@section('title', "Dashboard")

@section('content')
    <div class="page-content-wrapper">
        @includeIf('staff.app.dashboard-content')
    </div>
@endsection
