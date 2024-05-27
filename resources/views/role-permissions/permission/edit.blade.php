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
                        <h4>EDit Premissions
                            <a href="{{url('permissions')}}" class="btn btn-danger bg-danger float-end">Back</a>

                        </h4>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{url('permissions/'.$Permission->id)}}" method="POST">
                        @csrf
                        @method('put')
                    <div class="mb-3">
                        <label for="Permission name"></label>
                        <input type="text" name="name" value="{{$Permission->name}}" class="form-control"/>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-secondary text-black">Update</button>
                    </div>
                    </form>
                </div>

            </div>
        </div>
        
    </div>
</x-app-layout>
