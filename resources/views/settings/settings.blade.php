@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Settings</div>

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

                    <form action ="{{route('setting.update')}}" method="POST" >
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="blog_name">Bolg Name</label>
                    <input type="text" class="form-control" name="blog_name" value="{{$settings->blog_name}}">
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" class="form-control" name="phone_number" value="{{$settings->phone_number}}">
                    </div>
                    <div class="form-group">
                        <label for="blog_email">Email</label>
                        <input type="text" class="form-control" name="blog_email" value="{{$settings->blog_email}}">
                    </div>
                    <div class="form-group">
                        <label for="address">Adress</label>
                        <input type="text" class="form-control" name="address" value="{{$settings->address}}">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
