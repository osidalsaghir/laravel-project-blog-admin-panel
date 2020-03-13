@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create User</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(count($errors) > 0 )
                    @foreach($errors -> all() as $error)
                    
                    <div class="alert alert-info" role="alert">
                            {{$error}}
                    </div>
                    @endforeach
                    @endif

                    <form action ="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email">
                    </div>
                    
                     <div class="form-group">
                        <label for="featured">Photo</label>
                        <input type="file" class="form-control-file" name="avatar">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
