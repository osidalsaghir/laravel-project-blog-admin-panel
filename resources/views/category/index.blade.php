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
                        <th scope="col">Category id</th>
                        <td>Category name</td>
                        <td>edit</td>
                        <td>delete</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                    
                        <tr>
                        <th scope="row">{{$category->id}}</th>
                        <td>{{$category->name}}</td>
                        <td> <a  href="{{route('category.edit' , ['id' => $category -> id])}}"> update</a></td>
                        <td> <a  href="{{route('category.delete' , ['id' => $category -> id])}}"> delete</a></td>
                        </tr>
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