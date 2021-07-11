@extends('layouts.admin_layout')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add post</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add post</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?php
   
    use App\Models\category;
    $categories=new  Category;
    $categories=$categories->all();
    ?>
             
    <div style="padding-top:10px; padding-left:250px ;" class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <div class="row">
                    <form method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
                    @csrf
                        <div style="width: 600px;" class="form-group">
                            <label for="course_name">Post Title</label>
                            <input type="text" maxlength="100" class="form-control"  name="title" placeholder="Enter Post Title" >
                            <label class="text-danger"> {{$errors->first("title")}}</label>
                        </div>

                      
                        <div class="form-group">
                            <label for="role">Category Name</label>
                            
                           
                            <select class="form-control" name="category" multiple>
                                <option disabled selected>Please Select Category</option>
                                @foreach($categories as $categories)
                                <option value="{{$categories['id']}}">{{$categories["name"]}}</option>
                                @endforeach
                            </select>
                            <label class="text-danger"> {{$errors->first("category")}}</label>
                           
                        </div>

                      
                        

                        <div class="form-group">
                            <label for="note">Body</label>
                            <textarea class="form-control" rows="3" name="body" id="note" placeholder="Note About Course ..."></textarea>
                            <label class="text-danger"> {{$errors->first("body")}}</label>
                        </div>

                        <div class="form-group">
                            <label for="note">Post Image</label>
                            <input type="file" class="form-control"  name="image">
                            <label class="text-danger"> {{$errors->first("image")}}</label>
                        </div>
                       

                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                        <br><br><br><br>
                    </form>
                </div>
            </div>
     
        </div>
    </div>


    @endsection('content')