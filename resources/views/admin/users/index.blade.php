@extends('admin.layouts.master')

@section('content')

<div class="row col-6 justify-content-between align-items-center">
    <div class="col-auto">
        <h4 class="font-weight-bold text-dark">Users</h4>
    </div>
</div>
<div class="row mt-3">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header bg-white">
                <div class="row justify-content-between align-items-center">
                    <div>
                        <a
                            @if(Request::get('status') == 'active')
                                href="{{ route('users') }}"
                            @else
                                href="?status=active"
                            @endif
                            class="text-dark btn-br-0 btn {{ Request::get('status') == 'active' ? 'btn-light' : 'btn-outline-light' }}">
                            Active
                        </a><a
                            @if(Request::get('status') == 'inactive')
                                href="{{ route('users') }}"
                            @else
                                href="?status=inactive"
                            @endif
                            class="text-dark btn btn-br-0 {{ Request::get('status') == 'inactive' ? 'btn-light' : 'btn-outline-light' }}">
                            Inactive
                        </a><a
                            @if(Request::get('status') == 'deleted')
                                href="{{ route('users') }}"
                            @else
                                href="?status=deleted"
                            @endif
                            class="text-dark btn btn-br-0 {{ Request::get('status') == 'deleted' ? 'btn-light' : 'btn-outline-light' }}">
                            Deleted
                        </a>
                    </div>
                    <div>
                        <input class="form-control" placeholder="search...">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $index => $user)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $user->full_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone_number }}</td>
                                <td>
                                    <!-- <label class="badge {{ $user->status == 1 ? 'badge-success' : 'badge-danger' }}">
                                        {{ $user->status == 1 ? 'Active' : 'Inactive' }}
                                    </label> -->
                                    <label class="toggle-switch toggle-switch-success">
                                        <input class="user_status" data-slug="{{$user->slug}}" type="checkbox" {{ $user->status == 1 ? 'checked' : '' }}>
                                        <span class="toggle-slider round"></span>
                                    </label>
                                </td>
                                <td>
                                    @if(Request::get('status') == 'deleted')
                                    <a href="javascript:void(0)" data-slug="{{$user->slug}}" title="restore" class="text-success btn btn-sm btn-outline-light restore_user">
                                        <i class="icon-reload"></i>
                                    </a>
                                    @else
                                    <a href="{{route('users.edit', $user->slug)}}" title="edit" class="text-dark btn btn-sm btn-outline-light">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="javascript:void(0)" data-slug="{{$user->slug}}" title="delete" class="text-danger btn btn-sm btn-outline-light delete_user">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="6">No user found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

@include('scripts.userjs')

@endpush
