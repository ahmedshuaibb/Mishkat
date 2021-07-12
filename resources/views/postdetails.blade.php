@extends('Layouts.temp')
@section('section')
      
       <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="heading-page header-text">
      <section class="page-heading">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="text-content">
                
                <h2>{{$post["category"]["name"]}}</h2>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    
    <!-- Banner Ends Here -->

    


    <section class="blog-posts grid-system">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="all-blog-posts">
              <div class="row">
                <div class="col-lg-12">
                  <div class="blog-post">
                    <div class="blog-thumb">
                      <img src="assets/images/blog-post-02.jpg" alt="">
                    </div>
                    <div class="down-content">
                      <span>{{$post["category"]["name"]}}</span>
                      <a href="#"><h4>{{$post["title"]}}</h4></a>
                      <ul class="post-info">
                        <li><a href="#">Admin</a></li>
                        <li><a href="#">{{$post->created_at->diffForHumans()}}</a></li>
                        <li><a href="#">10 Comments</a></li>
                      </ul>
                      <p>{{$post["body"]}}</p>
                      <div class="post-options">
                        <div class="row">
                          <div class="col-6">
                            <ul class="post-tags">
                              <li><i class="fa fa-tags"></i></li>
                              <li><a href="#">Best Templates</a>,</li>
                              <li><a href="#">TemplateMo</a></li>
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
                <div class="col-lg-12">
                  <div class="sidebar-item comments">
                    <div class="sidebar-heading">
                      <h2>4 comments</h2>
                    </div>
                    <div class="content">
                      <ul>
                        <li>
                          <div class="author-thumb">
                            <img src="assets/images/comment-author-01.jpg" alt="">
                          </div>
                          @foreach($comments as $comment)
                          <div class="right-content">
                            <h4>{{$comment['name']}}<span>{{$comment->created_at->diffForHumans()}}</span></h4>
                            <p>{{$comment['comment']}} </p>
                          </div>
                          
                          @endforeach
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>

                @if (Auth::check())
                <div class="col-lg-12">
                  <div class="sidebar-item submit-comment">
                    <div class="sidebar-heading">
                      <h2>Your comment</h2>
                    </div>
                    <div class="content">
                    @if(session()->has('message'))
                                  <div class="alert alert-success">
                                   {{ session()->get('message') }}
                                 </div>
                                 @endif             

                      <form  action="{{route('comment' , $post->id) }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      
                        <div class="row">
                          <div class="col-md-6 col-sm-12">
                            <fieldset>
                              <input name="name" type="text" id="name" placeholder="Your name" required="">
                              <label class="text-danger"> {{$errors->first("name")}}</label>
                            </fieldset>
                          </div>
                          
                          
                          <div class="col-lg-12">
                            <fieldset>
                              <!-- <textarea name="Comment" rows="6" id="message" placeholder="Type your comment" required=""></textarea>
                              <label class="text-danger"> {{$errors->first("comment")}}</label> -->
                              <textarea class="form-control" rows="3" name="comment" id="note" placeholder="Note About Course ..."></textarea>
                            <label class="text-danger"> {{$errors->first("comment")}}</label>
                            </fieldset>
                          </div>
                          <div class="col-lg-12">
                            <fieldset>
                              <button type="submit" id="form-submit" class="main-button">Submit</button>
                            </fieldset>
                          </div>
                        </div>
                        
                      </form>
                    </div>
                  </div>
                </div>
                @endif
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