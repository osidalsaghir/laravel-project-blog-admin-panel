@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                <table class="table table-dark">
                    <thead>
                        <tr>
                        <th scope="col">Soft deleted Post id</th>
                        <td>Post title</td>
                        <td>Post content</td>
                        <td>Post images</td>
                      
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                    
                        <tr>
                        <th scope="row">{{$post->id}}</th>
                        <td>{{$post->title}}</td>
                        <td>{{$post->content}}</td>
                        <td> 
                            <a href=""><img width="50px" height="50px" src="{{$post->feature}}" alt="{{$post->title}}"></a>
                        </td>
                        <td>     
                            <a  href="{{route('post.restore' , ['id' => $post -> id])}}"> restore</a></td>
                        </td>
                        <td> 
                            <a  href="{{route('post.hardDelete' , ['id' => $post -> id])}}"> delete</a></td>
                        </td>
                        <tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



