<!DOCTYPE html>
<html>
  <head>
       @include('layouts.partials._head')
  </head>
  <body>
     @include('layouts.partials._nav')

     <div class="container py-4">
        @include('layouts.partials._messages')

        @yield('content')
     </div>

     @include('layouts.partials._footer')

     @include('layouts.partials._script')

     @yield('scripts')
  </body>
</html>
