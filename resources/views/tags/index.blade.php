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
                        <th scope="col">Tag id</th>
                        <td>Tag name</td>
                      
                      
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($tags as $tag)
                    
                        <tr>
                        <th scope="row">{{$tag->id}}</th>
                        <td>{{$tag->tag}}</td>
                       
                        
                        <td> 
                            
                            
                            <a  href="{{route('tags.edit' , ['id' => $tag -> id])}}"> edit</a></td>
                        </td>
                        <td> 
                           
                            
                            <a  href="{{route('tags.delete' , ['id' => $tag -> id])}}"> delete</a></td>
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



