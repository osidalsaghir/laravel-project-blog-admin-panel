@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Posts</div>

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

                    <form action ="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control" name="content" rows="8" col="8"></textarea>
                     </div>
                     <div class="form-group">
                        <label for="featured">Photo</label>
                        <input type="file" class="form-control-file" name="featured">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
