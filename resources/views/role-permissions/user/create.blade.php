<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Create User
                            <a href="{{url('users')}}" class="btn btn-danger bg-danger float-end">Back</a>

                        </h4>
                    </div>
               

                <div class="card-body">
                    <form action="{{url('users')}}" method="POST">
                        @csrf
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control"/>
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control"/>
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control"/>
                    </div>
                    <div class="mb-3">
                        <label for="role"></label>
                        <select name="role[]" class="form-control" multiple>
                            <option value="">Select Role</option>
                            @foreach ($roles as $role)
                                <option value="{{$role}}">{{$role}}</option>
                            @endforeach

                        </select>
                    </div>
                    
                    
                    <div class="mb-3">
                        <button type="submit" class="btn btn-secondary text-black">Save</button>
                    </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
        
    </div>
</x-app-layout>
