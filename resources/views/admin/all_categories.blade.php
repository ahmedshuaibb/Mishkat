@extends('layouts.admin_layout')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All categories</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">All categories</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

        <div style="padding-top:10px; padding-left:50px ;" class="container-fluid">
            <div class="row">
            
                <div class="col-xs-12 sub">
                    <div class="row">
                        <div class="col-xs-12">
                            <h3><span class="fa fa-users"></span> categories <button class="btn btn-success m-l-15"><span class="fa fa-plus"></span><a style="text-decoration: none ; color: white;" href="{{route('categories.create')}}">Add categories</a></button></h3>
                            
                        </div>
                        
                        <div class="col-xs-12 col-sm-6">
                        <table class="table table-bordered table-striped bg-dark" style="color:white; border:none">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>categery name</th>
                                        
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody style="color:black; font:blod; background:#ffff">
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category["id"]}}</td>
                                        <td>{{$category["name"]}}</td>
                                        
                                        @csrf
                               @method("delete")
                               <td>
                                 <form action="{{route('categories.destroy',$category)}}" method="Post">
                                  @csrf
                                  @method("delete")
                                      <center> 
                                         <button type="submit"  value="Delete {{$category['id']}}" 
                                                  class="fa fa-trash"> </button>
                                      </center>
                                    
                                 </form>
                              </td>
                             
                       </form>
                                        
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