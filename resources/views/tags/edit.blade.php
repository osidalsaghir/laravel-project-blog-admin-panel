@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit {{$tags->tag}}</div>

                <div class="card-body">
                   
                    <form action ="{{route('tags.update' , ['id' => $tags->id])}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        
                        <div class="form-group">
                            <label for="title">New Tag Name </label>
                            <input type="text"  value="{{$tags->tag}}" class="form-control" name="tag">
                        </div>
                       
                        
                        <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection