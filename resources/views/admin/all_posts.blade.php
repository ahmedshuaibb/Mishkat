@extends('layouts.admin_layout')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All posts</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">All Posts</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

        <div style="padding-top:10px; padding-left:50px ;" class="container-fluid">
            <div class="row">
            
                <div class="col-xs-12 sub">
                    <div class="row">
                        @if (Auth::check())
                        <div class="col-xs-12">
                            <h3><span class="fa fa-users"></span> posts <button class="btn btn-success m-l-15"><span class="fa fa-plus"></span><a style="text-decoration: none ; color: white;" href="{{route('posts.create')}}">Add Post</a></button></h3>
                            
                        </div>
                        @endif
                        
                        <div class="col-xs-12 col-sm-12">
                        <table class="table table-bordered table-striped bg-dark" style="color:white; border:none">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>Category Name</th>
                                        <th>Image</th>
                                       
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody style="color:black; font:blod; background:#ffff">
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{$post["id"]}}</td>
                                        <td>{{$post["title"]}}</td>
                                        <td>{{$post["body"]}}</td>
                                        
                                        <td>{{$post["category"]["name"]}}</td>
                                       
                                    
                                    <td>
                                    <img src="{{asset($post['image'])}}" class="rounded-circle" width="60" height="50" /></td>
                                    </td>
                                        <td>
                                            <a href="{{route('posts.edit',$post)}}"><span class="fa fa-edit"></span></a>
                                            <a class="text-success m-l-5" href="{{route('posts.show',$post)}}"><span class="fa fa-eye"></span></a>
                                            <form action="{{route('posts.destroy',$post)}}" method="Post" enctype="multipart/form-data" style="display:inline-block;">
                      @csrf
                      @method("delete")
                     
                      <button type="submit"  value="Delete"
                      class="fa fa-trash"
                              > </button>
                             
                       </form>
                                        </td>
                                    </tr>
                                 @endforeach
                                </tbody>
                            </table>
                            <div class="container">  
                       
                        </div> 
                        </div>
                        <div class="col-xs-12">
                           
                        </div>
                    </div>
                </div>            
            </div>
        </div>

        @endsection('content')