<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <style>
            body {
                font-family: 'Nunito', sans-serif;
                padding:0;
                margin:0;
            }
            a{
                font-weight: bold;
            }
            li{
                border-radius:40px;
            }
            
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand  bg-primary p-2 gap-3 font-weight-bold h5">
            <a class="navbar-brand text-white" href="#">ONLINESHOP</a>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <div class="dropdown h5">
                            <i class='fa-solid fa-table-cells-large'></i>
                            <button class="btn text-white  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Categories
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="#">Action</a>
                              <a class="dropdown-item" href="#">Another action</a>
                              <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                          </div>
                    </li>
                </ul>
                <ul class='navbar-nav w-50'>
                    <li class="nav-item w-100 ">
                        <input type="text" style='position: relative;border-radius:40px;min-width:200px;padding:0.2rem 0.8rem 0.2rem 0.8rem' placeholder='Search for a product in the store...' class=' w-100 border h-100 h6'>
                         <button  style='margin-left:0.5rem;background:#ffc220;border:none;position: absolute;border-radius:45%;padding:0.5rem 0.7rem 0.5rem 0.7rem'>
                            <i class='fa fa-search text-white'></i>
                        </button>
                    </li>
                </ul>
                <ul class="navbar-nav gap-5 sw-20">
                    <li class="nav-item rounded">
                        <a href="" class="nav-link text-white"><i class='fa fa-user'></i> Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link text-white"><i class='fa fa-shopping-cart'></i> Cart</a>
                    </li>
                </ul>
            </div>
          </nav>
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <!-- JavaScript Bundle with Popper -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
            <script>
                $(function(){
                    $('.dropdown').hover(function(){ 
                        $('.dropdown-toggle', this).trigger('click'); 
                    });
                })
            </script>
    </body>
</html>
