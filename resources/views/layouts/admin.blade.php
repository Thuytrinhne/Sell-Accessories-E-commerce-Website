<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phụ kiện TP- Đẹp đến từng khoảnh khắc ...</title>
    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- reset css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <!-- link font awesome -->
    <link rel="stylesheet" href="./assets/font/fontawesome-free-6.4.2-web/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <!-- link bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    <!-- link css laravel -->
    <link rel="stylesheet" href="{{asset('Assets/css/base.css')}}">
    <link rel="stylesheet" href="{{asset('Assets/css/front/homepage.css')}}">
    <link rel="stylesheet" href="{{asset('Assets/css/admin/admin-view.css')}}">
    <link rel="stylesheet" href="{{asset('Assets/css/admin/admin-view-manage.css')}}">
    <link rel="stylesheet" href="{{asset('Assets/css/admin/admin-view-report.css')}}">
    <link rel="stylesheet" href="{{asset('Assets/css/admin/admin-view-sale-off.css')}}">
    <link rel="stylesheet" href="{{asset('Assets/css/admin/admin-view-order.css')}}">
    <link rel="stylesheet" href="{{asset('Assets/css/admin/admin-view-product.css')}}">
    <link rel="stylesheet" href="{{asset('Assets/css/admin/admin-view-dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('Assets/css/admin/admin-view-category.css')}}">

    <!-- toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
</head>

<body>
    <style>
        html,body{
            width: 100%;
            position: relative;
        }
        .create_account .card{
            position: absolute;
            width: 82%;
            margin-top: 10px;
            line-height: 1.7;
        }

        .create_account .form-group{
            margin: 10px 0;
            margin-right: 30px;
            font-size: 16px;
        }

        .create_account input{
            font-size: 14px;
            padding: 5px 10px;
        }

        .create_account button{
            padding: 6px 20px;
            font-size: 14px;
            margin-bottom: 7px;
        }

        .account_management .btn-primary{
            padding: 8px 18px;
            font-size: 14px;
            background-color: gainsboro;
            outline: none;
            color: black;
            border: none;
        }

        .account_management .btn{
            padding: 8px 18px;
        }
        
    </style>
    <header class="header"></header>
    <div class="container">
        <!-- nav here -->
        @include('shared.admin.nav')
        <div>
        <!-- content show here -->
        @yield('content');
        </div>
    </div>
    
    <script src="{{asset('Assets/js/admin.js')}}"></script>
</body>
  

</html>