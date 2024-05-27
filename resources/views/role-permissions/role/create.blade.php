<x-app-layout>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <div class="card">
                            <div class="card-header">
                                <h4>Create roles
                                    <a href="{{url('roles')}}" class="btn btn-danger bg-danger float-end">Back</a>

                                </h4>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{url('roles')}}" method="POST">
                                @csrf
                            <div class="mb-3">
                                <label for="role name"></label>
                                <input type="text" name="name" class="form-control"/>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-secondary text-black">Save</button>
                            </div>
                            </form>
                        </div>

                    </div>
                </div>
                
            </div>
</x-app-layout>
