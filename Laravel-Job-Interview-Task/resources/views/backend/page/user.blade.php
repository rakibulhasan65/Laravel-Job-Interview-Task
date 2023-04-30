@extends('backend.layout.master')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">Small Table</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>#SL</th>
                            <th>Users</th>
                            <th>email</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($usersData as $users)
                            <tr>
                                <td>{{ $usersData->firstItem()+$loop->index }}</td>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                    <strong>{{ $users->name }}</strong>
                                </td>
                                <td>{{ $users->email }}</td>
                               
                                <td>
                                    @if ($users->status == 1)
                                        <span class="badge bg-label-primary me-1">Active</span>
                                    @else
                                        <span class="badge bg-label-danger me-1">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <button class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#usersDeleteModal-{{ $users->id }}"><i
                                                    class="bx bx-trash me-1"></i> Delete</button>
                                        </div>
                                    </div>
                                </td>

                            </tr>

                             {{-- User Item Delete Modal  --}}
                                    <div class="modal fade" id="usersDeleteModal-{{ $users->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Item Delete Confirmation
                                                        Message ! </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure confirm this item !
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary"
                                                        data-dismiss="modal">No</button>
                                                    <form method="POST"
                                                        action="{{ Route('users.destroy', $users->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Yes</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- / User Item Delete Modal  --}}

                        @endforeach
                    </tbody>
                </table>
                <div class="paginate my-3 px-3">
                    <span class="page-numbers current">
                    {{ $usersData->links('pagination::bootstrap-5') }}
                </span>
                </div>
            </div>
        </div>
    </div>
@endsection
