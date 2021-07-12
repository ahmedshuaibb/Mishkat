@extends('Layouts.temp')
@section('section')

<!-- Page Content -->
    <!-- Banner Starts Here -->
    
    <div class="main-banner header-text">
      <div class="container-fluid">
        <div class="owl-banner owl-carousel">
        @foreach($posts as $post)
          <div class="item">
            <img height='400px' width='400px' src="{{asset($post['image'])}}" alt="">
            <div class="item-content">
              <div class="main-content">
                <div class="meta-category">
                  <span>{{$post["category"]["name"]}}</span>
                </div>
                <a href="{{route('singlePost.show',$post['id'])}}"><h4>{{$post["title"]}}</h4></a>
                <ul class="post-info">
                  <li><a href="#">Admin</a></li>
                  <li><a href="#">{{$post->created_at->diffForHumans()}}</a></li>
                  <li><a href="#">12 Comments</a></li>
                </ul>
              </div>
            </div>
          </div>
          @endforeach
         
        </div>
      </div>
    </div>
    <!-- Banner Ends Here -->

    


    <section class="blog-posts">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="all-blog-posts">
              <div class="row">
              @foreach($posts as $post)
                <div class="col-lg-12"> 
                  <div class="blog-post">
                    <div class="blog-thumb">
                      <img height='400px' width='400px' src="{{asset($post['image'])}}" alt="">
                    </div>
                    <div class="down-content">
                      <span>{{$post["category"]["name"]}}</span>
                      <a href="{{route('singlePost.show',$post['id'])}}"><h4>{{$post["title"]}}</h4></a>
                      <ul class="post-info">
                        <li><a href="#">Admin</a></li>
                        <li><a href="#">{{$post->created_at->diffForHumans()}}</a></li>
                        <li><a href="#">12 Comments</a></li>
                      </ul>
                      <p>{{$post["body"]}}</p>
                      <div class="post-options">
                        <div class="row">
                          <div class="col-6">
                            <ul class="post-tags">
                              <li><i class="fa fa-tags"></i></li>
                              <li><a href="#">Beauty</a>,</li>
                              <li><a href="#">Nature</a></li>
                            </ul>
                          </div>
                          <div class="col-6">
                            <ul class="post-share">
                              <li><i class="fa fa-share-alt"></i></li>
                              <li><a href="#">Facebook</a>,</li>
                              <li><a href="#"> Twitter</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
                
                <div class="col-lg-12">
                  <div class="main-button">
                    <a href="blog.html">View All Posts</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="sidebar">
              <div class="row">
                
                
                <div class="col-lg-12">
                  <div class="sidebar-item categories">
                    <div class="sidebar-heading">
                      <h2>Categories</h2>
                    </div>
                    <div class="content">
                      <ul>
                      @foreach($categories as $category)
                        <li><a href="{{route('categoryposts.show',$category['id'])}}">{{$category["name"]}}</a></li>
                      @endforeach  
                     
                      </ul>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
 @endsection

 @section('script')
    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Additional Scripts -->
    <script src="{{asset('assets/js/custom.js')}}"></script>
    <script src="{{asset('assets/js/owl.js')}}"></script>
    <script src="{{asset('assets/js/slick.js')}}"></script>
    <script src="{{asset('assets/js/isotope.js')}}"></script>
    <script src="{{asset('assets/js/accordions.js')}}"></script>

    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>


 @endsection