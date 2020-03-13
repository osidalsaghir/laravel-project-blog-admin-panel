@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Uses</div>

                <div class="card-body">
                    @if($users->count()>0)
                    
                <table class="table table-dark">
                    <thead>
                        <tr>
                        <th scope="col">user id</th>
                        <td>user name</td>
                        <td>user rool</td>
                        {{-- <td>use content</td>
                        <td>Post images</td> --}}
                      
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                    
                        <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td> 
                            <a href=""><img width="50px" height="50px" 
                                @foreach($profiles as $profile)
                                @if($profile->user_id == $user->id)
                                src="{{$profile->avatar}}"
                                else 
                                src=""
                                @endif
                                @endforeach

                                
                                alt="{{$user->name}}"></a>
                            
                         
                        </td>
                        @if($user->admin)
                        <td>

                        <a href="{{route('users.not.admin' , ['id' => $user->id])}}">
                                admin
                            </a>
                        </td>
                        @else 
                        <td> <a href="
                            {{route('users.admin' , ['id' => $user->id])}}">make admin
                        </a></td>
                        @endif
                        {{-- <td> 
                            <a href=""><img width="50px" height="50px" src="{{$user->feature}}" alt="{{$user->title}}"></a>
                            
                         
                        </td> --}}
                        <td> 
                            
                            
                            {{-- <a  href="{{route('post.edit' , ['id' => $user -> id])}}"> edit</a></td> --}}
                        </td>
                        {{-- <td> 
                           
                            
                            <a  href="{{route('post.delete' , ['id' => $user -> id])}}"> delete</a></td>
                        </td> --}}
                        <tr>
                    @endforeach
                    </tbody>
                </table>
                @else
                <h2>there is no users</h2>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



