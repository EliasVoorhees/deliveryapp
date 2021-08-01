
<!DOCTYPE html>
<html>
<head>
    <title>Pizza Place</title>
    <link  rel="icon" href="{{ asset("img/pii.png") }}" type="image/png" />
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset("img/favicon.png") }}" / >

    <!-- Compiled and minified CSS -->
    <link type="text/css" rel="stylesheet" href="{{ asset("css/materialize.min.css") }}" media="screen,projection"/>
    <link rel="stylesheet" href="{{ asset("css/styles.css") }}">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>
<body>
    <!--Navbar-->
    @include('sweetalert::alert')
    <header>
        <div class="navbar-fixed">
            <nav class="green darken-1">
                <div class="nav-wrapper">
                    <a href="{{route('productos.index')}}" class="brand-logo">
                        <img class="responsive-img" src="{{ asset("img/logo1.png") }}" width="340">       
                    </a>
                    <ul class="right">
                        <li><a href="{{route('home')}}"><i class="material-icons" style="font-size: 35px;">account_circle</i></a></li> 
                    </ul>
                </div>
            </nav>
        </div>
    </header> 

    <!--Content-->
    <main>
            @yield('content')

    </main>

    <!--Footer-->
    <footer class="page-footer red darken-1">
        <div class="container">
            <div class="row">
                <div class="col l6 m12">
                    <h5 class="white-text">Pizza Place</h5>
                </div>
                <div class="col l4 offset-l2 s12">
                    <h5 class="white-text">Contacto</h5>
                    <ul>
                        <li><h6><i class="tiny material-icons">call</i>(845) 631-2102</h6></li>
                        <li><h6><i class="tiny material-icons">call</i>(917) 148-1304</h6></li> 
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                © Copyright 2021. All rights reserved. Powered by PizzaPlace
            </div>
        </div>
    </footer> 

    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="{{ asset("js/materialize.min.js") }}"></script>
    <script>

       function selectPizza(){
        var x = document.getElementById("selectPizza");

        if (x.style.display === "none") {
                x.style.display = "block";
        } else {
                x.style.display = "none";
        }

       }

        document.addEventListener('DOMContentLoaded', function() {
            M.AutoInit();

            
        }); 

    </script> 


</body>
</html>