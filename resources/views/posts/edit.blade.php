@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit {{$post->title}}</div>

                <div class="card-body">
                   
                    <form action ="{{route('post.update' , ['id' => $post->id])}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select type="text" class="form-control"name="category_id">
                            @foreach($categories as $category)
                            @if ($category->id == $post->category_id)
                                     <option value="{{$category->id}}" selected>{{$category->name}}</option>

                             @else
                                    
                              <option value="{{$category->id}}">{{$category->name}}</option>
                              @endif
                              @endforeach
                            </select>
                          </div>
                          @foreach($tags as $tag)
                         
                          <div class="form-check form-check-inline">
                          
                           
                            <label class="form-check-label"  >
                            <input class="form-check-input" type="checkbox" name="tags[]" id="inlineCheckbox1" value="{{$tag->id}}"
                            
                            @foreach ($post->tags as $ta)
                            @if ($tag->id == $ta->id)
                                checked
                            @endif
                            @endforeach
                             >  {{$tag->tag}}  </label>
                           
                        </div> <br>
                        @endforeach

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text"  value="{{$post->title}}" class="form-control" name="title">
                        </div>
                        <div class="form-group">
                            <label for="content" >Content</label>
                            <textarea class="form-control"  name="content" rows="8" col="8">{{$post->content}}</textarea>
                         </div>
                         <div class="form-group">
                            <label for="featured">Photo</label>
                            <input type="file" class="form-control-file" value="{{$post->feature}}" name="featured">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection