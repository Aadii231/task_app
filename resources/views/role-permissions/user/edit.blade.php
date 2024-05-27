<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit User
                            <a href="{{url('users')}}" class="btn btn-danger bg-danger float-end">Back</a>

                        </h4>
                    </div>
               

                <div class="card-body">
                    <form action="{{url('users/'.$user->id)}}" method="POST">
                        @csrf
                        @method('put')
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{$user->name}}" class="form-control"/>
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" readonly value="{{$user->email}}" class="form-control"/>
                        @error('email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control"/>
                        @error('password')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="role"></label>
                        <select name="role[]" class="" multiple>
                            <option value="">Select Role</option>
                            @foreach ($roles as $role)
                                <option 
                                value="{{$role}}"
                                {{ in_array($user,$userRole) ? 'selected':''}}
                                >
                                {{$role}}
                                </option>
                            @endforeach

                        </select>
                    </div>
                    
                    
                    <div class="mb-3">
                        <button type="submit" class="btn btn-secondary text-black">Update</button>
                    </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
        
    </div>
</x-app-layout>
