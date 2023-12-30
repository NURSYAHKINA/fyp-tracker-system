@include('admin.layouts.header')
@include('admin.layouts.sidebar')

<div class="main-content">
@yield('content')<!--get if from layouts.app-->
</div>

@include('admin.layouts.footer')