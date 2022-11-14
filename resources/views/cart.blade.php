<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/js/app.js')
        <title>Laravel</title>
        @vite('resources/css/app.css')
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
        <script src='https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js' type='javascript'></script>
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
            .col-sm,.col{
                border:1px solid black;
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
                                  Departments
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                @foreach ($categories as $category )
                                    <a class="dropdown-item" href={{ "shop/".$category['name'] }}>{{ $category['name'] }}</a>
                                @endforeach
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
                        @auth
                            <a href="logout" class="nav-link text-white"><i class='fa fa-user'></i> Welcome {{ auth()->user()->username }}</a>
                            @else
                            <a href="login" class="nav-link text-white"><i class='fa fa-user'></i> Login</a>
                        @endauth
                    </li>
                    <li class="nav-item rounded">
                        <a href="/cart" class='nav-link text-white'>
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            Cart
                        </a>
                    </li>
                    </ul>
                </div>
            </nav>
            <div id="app">
                <cart></cart>
            </div>
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