<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="{{asset('front/icon/idn.png')}}" type="image/x-icon">
    <title>{{$title ?? ''}}</title>    

    <link rel="stylesheet" href="{{asset('front/fontawesome/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('front/cutome/style.css')}}">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('front/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }      

      main{
          padding-top: 32px;
      }
      
      .slider{
          height: 100vh;
      }      
    
      i{
        padding-right: 10px;
      }      

      body{
        padding-bottom: 0px !important;
      }

      .box{
        border-color: 1px solid white !important;
      }

      .pro-index:hover{
        background-color: #f3f9fd;
      }

      .anchor{
        color:#ffffff8c;
        /* font-weight: 400;
        margin-right: 18px; */
      }

      .anchor:hover{
        font-weight: 600;
        color: white !important;
      }

      .telegram{
        color: #fff;
        background-color: #35a2d5;
        border-color: #35a2d5;
      }
      .telegram:hover{
        color: #fff;
        background-color: #288bb9;
        border-color: #288bb9;
      }

    </style>

    <!-- Custom styles for this template -->
    <link href="{{asset('front/cutome/carousel.css')}}" rel="stylesheet">

    <!-- Image Zoom -->
    <script src="{{asset('image-zoom/js/jquery-1.10.1.min.js')}}"></script>
    <script src="{{asset('image-zoom/js/jquery.elevatezoom.js')}}"></script>
  </head>

  <body>

   @include('front.includes.navbar')

<main>

    @yield('content')

</main>


    @include('front.includes.footer')

    <script src="{{asset('front/js/bootstrap.bundle.min.js')}}" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script>
          $('#zoom_01').elevateZoom({
          zoomType: "inner",
          cursor: "crosshair",          
          }); 
    </script>  
      
  </body>
</html>
