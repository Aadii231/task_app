<x-app-layout>
    <div class="container">
        <div class="row">

            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
             @endif
             
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Role: {{$role->name}}
                            <a href="{{url('roles')}}" class="btn btn-danger bg-danger float-end">Back</a>

                        </h4>
                    </div>

                <div class="card-body">
                    <form action="{{url('roles/'.$role->id.'/give-permissions')}}" method="POST">
                        @csrf
                        @method('put')

                        <div class="mb-3">
                            @error('permission')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <label for="">Permissions</label>

                            <div class="row">
                                @foreach ($permissions as $permission)
                                    <div class="col-md-3 mt-3">
                                        <label>
                                                <input type="checkbox"
                                                name="permission[]" 
                                                value="{{$permission->name}}" 
                                                {{in_array($permission->id,$rolePermissions)?'checked':''}}
                                                />
                                                {{$permission->name}}
                                        </label>
                                    </div>    
                                @endforeach
                            </div>
                        </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-secondary text-black">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
          
            </div>
        </div>
        
    </div>
</x-app-layout>
