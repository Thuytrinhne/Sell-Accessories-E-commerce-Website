@extends('layouts.app')
@section('body-main')
<div class="body-user grid">
              <div class="body-user-flex">
                 @include('shared.front.slide-menu')
              <div class="body-user-display">
                 @yield('content')
              </div>
</div>
</div>
@endsection