<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('include.header')
    <body>
        <!-- container section start -->
        <section id="container" class="">
      
      
        @include('include.navbar')
      
          <!--sidebar start-->
            @include('include.sidebar')
          <!--sidebar end-->
      
          <!--main content start-->
          <section id="main-content">
            <section class="wrapper">
             
                @yield('content')
      
            </section>
            @include('include.footer')
          </section>
          <!--main content end-->
        </section>
        <!-- container section start -->
      
        <!-- javascripts -->
       @include('include.scripts')
      
      </body>
</html>
