<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
                     @endif
                <div class="card mt-3">
                    <div class="card-header">
                        <h2> Roles
                            <a href="{{url('roles/create')}}" class="btn bg btn-primary float-end">Create New Roles</a>

                        </h2>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{$role->id}}</td>
                                        <td>{{$role->name}}</td>
                                        <td>
                                            <a href="{{url('roles/'.$role->id.'/give-permissions')}}" class="btn btn-success">
                                                Add/Edit  Roles/Permissions</a>

                                            <a href="{{url('roles/'.$role->id.'/edit')}}" class="btn btn-success">Edit</a>
                                            <a href="{{url('roles/'.$role->id.'/delete')}}" class="btn btn-danger">Delete</a>

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

</x-app-layout>
