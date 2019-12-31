<!DOCTYPE html>
<html lang="en">
  <head>
       @include('partials._head')
  </head>
  <body>

       @include('partials._nav')

     <br>

     <div class="container">
        @include('partials._messages')

        @yield('content')

     </div>

      <br><br><br><br>

       @include('partials._footer')

       @include('partials._script')

       @yield('scripts')

  </body>
</html>
