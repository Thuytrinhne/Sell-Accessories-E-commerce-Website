<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <title>Phụ kiện TP- Đẹp đến từng khoảnh khắc ...</title>
    <!-- font roboto -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet"> 
    <!-- reset css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <!-- link font awesome -->
    <link rel="stylesheet" href="./assets/font/fontawesome-free-6.4.2-web/css/all.min.css">
    <!-- link bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
     <!-- link css -->
    <link rel="stylesheet" href="{{asset('Assets/css/base.css')}}">
    <link rel="stylesheet" href="{{asset('Assets/css/auth/sign_in.css')}}">
    <link rel="stylesheet" href="{{asset('Assets/css/auth/sign_up.css')}}">

    <link rel="stylesheet" href="{{asset('Assets/css/front/homepage.css')}}">
    @yield('css')

     <link rel="stylesheet" href="./css/base.css">
     <link rel="stylesheet" href="./css/sign_in.css">
     <link rel="stylesheet" href="css/footer.css">
     <!-- link js -->
     <script src="./js/signin.js"></script>
</head>
<body>

    <div>
    <!-- ==================================  SIGNIN  ================================== -->
 
    @yield('content');

    <!-- ==================================  FOOTER  ================================== -->
    @include('shared.front.footer')
    </div>


</body>
</html>
