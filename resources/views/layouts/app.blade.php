<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phụ kiện TP- Đẹp đến từng khoảnh khắc ...</title>
    <!-- font roboto -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet"> 
    <!-- reset css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <!-- link font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- link bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
     <!-- link css -->
     <link rel="stylesheet" href="{{asset('Assets/css/base.css')}}">
     <link rel="stylesheet" href="{{asset('Assets/css/front/header.css')}}">
     <link rel="stylesheet" href="{{asset('Assets/css/front/homepage.css')}}">
     <link rel="stylesheet" href="{{asset('Assets/css/shared/cart.css')}}">
     <link rel="stylesheet" href="{{asset('Assets/css/shared/quick-view.css')}}">

     <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
     <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

      @yield('css')
   
     <!-- link js -->
     <script src="./js/header.js"></script>
     <script src="./js/homepage.js" defer></script>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="app">
      @include('shared.front.header')
        <div class="body">
  
      @yield('body-main');
        </div>
           
      @include('shared.front.footer')
    </div>

    <!-- modal cart-->  
      @include('shared.front.cart')
    <!-- yield modal quickview -->
      @yield('quick-view');
   </body>
</html>