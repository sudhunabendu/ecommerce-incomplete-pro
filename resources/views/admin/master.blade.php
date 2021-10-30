<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>@yield('page_title')</title>

    <link href="{{asset('admin_assets/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset('admin_assets/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">
    <!-- Main CSS-->
    <link href="{{asset('admin_assets/css/theme.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/css/style.css')}}" rel="stylesheet" media="all">


</head>

<body class="animsition">

<div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="dashboard">
                            <img src="{{asset('admin_assets/images/icon/logo.png')}}" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                    <li>
                            <a href="dashboard">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>

                        </li>
                        <li>
                            <a href="category">
                                <i class="fas fa-chart-bar"></i>Category</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="dashboard">
                    <img src="{{asset('admin_assets/images/icon/logo.png')}}" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="{{url('admin/dashboard')}}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>

                        </li>
                        <li>
                            <a href="{{url('admin/category')}}">
                                <i class="fas fa-chart-bar"></i>Category</a>
                        </li>
                        <li>
                            <a href="{{url('admin/product')}}">
                                <i class="fas fa-chart-bar"></i>Product</a>
                        </li>
                        <li>
                            <a href="{{url('admin/coupon')}}">
                                <i class="fas fa-chart-bar"></i>Coupon</a>
                        </li>

                        <li>
                            <a href="{{url('admin/users')}}">
                                <i class="fas fa-chart-bar"></i>Users</a>
                        </li>

                        <li>
                            <a href="{{url('admin/showCategory')}}">
                                <i class="fas fa-chart-bar"></i>Special Category</a>
                        </li>

                        <li>
                            <a href="{{url('admin/users')}}">
                                <i class="fas fa-chart-bar"></i>Users</a>
                        </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

<!-- PAGE CONTAINER-->
<div class="page-container">
    <!-- HEADER DESKTOP-->
    <header class="header-desktop">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="header-wrap">
                    <form class="form-header" action="" method="POST">
                        <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                        <button class="au-btn--submit" type="submit">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                    </form>
    <div class="header-button">
        <div class="noti-wrap">
            <div class="noti__item js-item-menu">
                <i class="zmdi zmdi-comment-more"></i>
                <span class="quantity">1</span>
                <div class="mess-dropdown js-dropdown">
                    <div class="mess__title">
                        <p>You have 2 news message</p>
                    </div>
                    <div class="mess__item">
                        <div class="image img-cir img-40">
                            <img src="images/icon/avatar-06.jpg" alt="Michelle Moreno" />
                        </div>
                        <div class="content">
                            <h6>Michelle Moreno</h6>
                            <p>Have sent a photo</p>
                            <span class="time">3 min ago</span>
                        </div>
                    </div>
                    <div class="mess__item">
                        <div class="image img-cir img-40">
                            <img src="images/icon/avatar-04.jpg" alt="Diane Myers" />
                        </div>
                        <div class="content">
                            <h6>Diane Myers</h6>
                            <p>You are now connected on message</p>
                            <span class="time">Yesterday</span>
                        </div>
                    </div>
                    <div class="mess__footer">
                        <a href="#">View all messages</a>
                    </div>
                </div>
            </div>
            <div class="noti__item js-item-menu">
                <i class="zmdi zmdi-email"></i>
                <span class="quantity">1</span>
                <div class="email-dropdown js-dropdown">
                    <div class="email__title">
                        <p>You have 3 New Emails</p>
                    </div>
                    <div class="email__item">
                        <div class="image img-cir img-40">
                            <img src="images/icon/avatar-06.jpg" alt="Cynthia Harvey" />
                        </div>
                        <div class="content">
                            <p>Meeting about new dashboard...</p>
                            <span>Cynthia Harvey, 3 min ago</span>
                        </div>
                    </div>
                    <div class="email__item">
                        <div class="image img-cir img-40">
                            <img src="images/icon/avatar-05.jpg" alt="Cynthia Harvey" />
                        </div>
                        <div class="content">
                            <p>Meeting about new dashboard...</p>
                            <span>Cynthia Harvey, Yesterday</span>
                        </div>
                    </div>
                    <div class="email__item">
                        <div class="image img-cir img-40">
                            <img src="images/icon/avatar-04.jpg" alt="Cynthia Harvey" />
                        </div>
                        <div class="content">
                            <p>Meeting about new dashboard...</p>
                            <span>Cynthia Harvey, April 12,,2018</span>
                        </div>
                    </div>
                    <div class="email__footer">
                        <a href="#">See all emails</a>
                    </div>
                </div>
            </div>
            <div class="noti__item js-item-menu">
                <i class="zmdi zmdi-notifications"></i>
                <span class="quantity">3</span>
                <div class="notifi-dropdown js-dropdown">
                    <div class="notifi__title">
                        <p>You have 3 Notifications</p>
                    </div>
                    <div class="notifi__item">
                        <div class="bg-c1 img-cir img-40">
                            <i class="zmdi zmdi-email-open"></i>
                        </div>
                        <div class="content">
                            <p>You got a email notification</p>
                            <span class="date">April 12, 2018 06:50</span>
                        </div>
                    </div>
                    <div class="notifi__item">
                        <div class="bg-c2 img-cir img-40">
                            <i class="zmdi zmdi-account-box"></i>
                        </div>
                        <div class="content">
                            <p>Your account has been blocked</p>
                            <span class="date">April 12, 2018 06:50</span>
                        </div>
                    </div>
                    <div class="notifi__item">
                        <div class="bg-c3 img-cir img-40">
                            <i class="zmdi zmdi-file-text"></i>
                        </div>
                        <div class="content">
                            <p>You got a new file</p>
                            <span class="date">April 12, 2018 06:50</span>
                        </div>
                    </div>
                    <div class="notifi__footer">
                        <a href="#">All notifications</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="account-wrap">

           <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
          </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Account</a>
          <a class="dropdown-item" href="logout">Logout</a>
         </li>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                    @yield('content')

                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

 <!-- Jquery JS-->

  <!-- Jquery JS-->
  <script src="{{asset('admin_assets/vendor/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap JS-->
    <script src="{{asset('admin_assets/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{asset('admin_assets/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <!-- Vendor JS       -->
    <script src="{{asset('admin_assets/vendor/slick/slick.min.js')}}">
    </script>
    <script src="{{asset('admin_assets/vendor/wow/wow.min.js')}}"></script>

    <!-- Main JS-->
    <script src="{{asset('admin_assets/js/main.js')}}"></script>
    <script type="text/javascript">
    $(document).ready(function() {
      $(".btn-success").click(function(){ 
          var lsthmtl = $(".clone").html();
          $(".increment").after(lsthmtl);
      });
      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".hdtuto").remove();
      });
    });
</script>
</body>

</html>
<!-- end document-->
