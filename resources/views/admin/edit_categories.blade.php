@extends('layouts.admin_layout')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit categery</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit categery</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <div style="padding-top:10px; padding-left:400px ;" class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-3">
                <div style="width: 200px;" class="row">
                <form method="POST" action="{{route('categories.update',$category)}}" enctype="multipart/form-data">
                    @csrf
                     @method("put")
                        <div  style="width: 600px;"  class="form-group">
                            <label for="first_name">Categery name</label>
                            <input type="text" class="form-control" value="{{$category['name']}}" name="name" placeholder="Enter Categery Name" >
                            <label class="text-danger"> {{$errors->first("name")}}</label>
                          </div>
                          <div  style="width: 600px;"  class="form-group">
                            <label>Categery image</label>
                            <input type="file" class="form-control"  name="image"  >
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