 <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="santa rosa del aguaray" content="">
    <meta name="santa rosa online" content="">

    <title>S.R.Online</title>
     <!-- Favicons -->
  <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">


    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}"  >

  <link href="{{asset('assets/icofont/icofont.min.css')}}" rel="stylesheet">

   
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/jquery.mCustomScrollbar.min.css')}}">

     <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200&display=swap" rel="stylesheet">

     <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 

</head>

<body>

    <div class=" ">
        <!-- Sidebar  -->
        <nav id="sidebar">
                <div id="dismiss">
                    <p class="atrasico animated-icon3" ><span></span><span></span><span></span></p>
                </div>

                <div class="sidebar-header">
                   <a  href="index.html">
                     <img class=" fadeIn1 logo m-top-20" src="{{asset('assets/img/logo.png')}}" >
                    </a>
                    
                </div>

                <ul class="list-unstyled components">
                    @foreach ($sections as $section)
                    <li>
                        <a href="#">{{ $section->name }}</a>
                    </li>
                    @endforeach
                </ul>

        </nav>

        <div class="overlay"></div>

        <!-- Page Content  -->
        <div class="container search-box">
            <div class="row">

                <!-- LOGO  -->

                <div class="col-sm-12"> 

                        <!-- MENU  -->

                        <div class="row mt-10 "> 
                            <nav class="navbar navbar-expand-lg  ">
                                <div class="container-fluid">  
                                
                                     <div class="logocontent"> 
                                       
                                      <div class="f-left "> 
                                          <button  class="btn navbar-toggler third-button collapsed m-top-20" id="sidebarCollapse"  href="#" >
                                              <div class="animated-icon3"><span></span><span></span><span></span></div>
                                          </button>
                                      </div>

                                        <div class="f-left">
                                              <a  href="https://santarosadelaguaray.online/">
                                            <img class=" fadeIn1 logo m-top-20" src="{{asset('assets/img/logo.png')}}" ></a>
                                        </div>
                                    </div>
  

                                     <!--   <button class="btn navbar-toggler third-button collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="#navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                      <div class="animated-icon3"><span></span><span></span><span></span></div>
                                    </button>


                                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                        
                                        <ul class="nav menu_top fadeIn4 ">
                                           

                                            <li class="nav-item fadeIn2  ">
                                                
                                                <a class="nav-link" href="#" data-toggle="dropdown">
                                                  <i class="icofont-cart"></i>
                                                  Comercios
                                                </a>

                                            

                                            </li>

                                            <li class="nav-item fadeIn3  ">

                                                <a class="nav-link" href="#" data-toggle="dropdown">
                                                 <i class="icofont-briefcase"></i>
                                                  Mapa 
                                                </a>

                                                  <!--  <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Albañileria</a>
                                                    <a class="dropdown-item" href="#">Jardineria</a>
                                                    <a class="dropdown-item" href="#">Electrisista</a>
                                                    <a class="dropdown-item" href="#">Limpieza de patio</a>

                                                  </div> 

                                            </li>

                                           
                                            <li class="nav-item fadeIn4">
                                              
                                                  <a class="nav-link" type="button"   data-toggle="dropdown" >
                                                    <img  class="menuicon" src="icons/star.svg" alt="" width="16em">
                                                  NOsotros
                                                  </a>
                                                   <!--<div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Restaurantes</a>
                                                    <a class="dropdown-item" href="#">Comida rapida</a>
                                                    <a class="dropdown-item" href="#">Pizza</a>
                                                    <a class="dropdown-item" href="#">Minutas</a>
                                                    <a class="dropdown-item" href="#">Churrasquerias</a>

                                                  </div> 
                                                
                                            </li>

                                            <li class="nav-item fadeIn1  ">
                                               
                                                <a class="nav-link ac tive" type="button" id="sidebarCollapse"  href="#">

                                                   <img class="menuicon" src="icons/text-left.svg" alt=""  width="16em">
                                                  Categorias
                                               </a>

                                            </li>
                                        </ul>
                                    </div>-->
                                </div>
                            </nav> 
                        </div>

                        <div>
                            <h4 class="txini col-12 fadeIn1 text-center">
                                      Te Ayudamos a encontrar lo que buscas en la ciudad de Santa Rosa del Aguaray!  
                              </h4>

                              <input id="myInput" type="text" placeholder="Qué estás buscando?" class="input-field fadeIn2 inputblack   stylesearch">
                        </div>
                </div>


            </div>

        </div>

        <div class="con tainer fadeIn3">
          <div id="myList" class="list-group ">     
              @foreach ($sections as $section)
              <a class="boxhover col-sm-2 fadeIn2" href="{{route('categoriasXseccion', $section)}}"> 
                  <div class="text-white  ">
                    <h5>{{ $section->name }}</h5>
                  </div>
            
                  <div class=" img-hover-zoom img-hover-zoom--basic text-center border_radius">
                    <img class=" " src="{{asset( 'uploads/'.$section->image_url ) }}">
                  </div>
              </a>
              @endforeach
          </div>     
        </div>
    </div>
    
<footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-logo-item">
                        <div class="f-logo">
                            <a href="https://santarosadelaguaray.online/"><img src="{{asset('assets/img/logo.png')}}" alt=""></a>
                        </div>
                        <p>Registra tu negocio en esta ciudad Online</p>
                        <div class="social-links">
                            <h6>Seguinos</h6>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
          <!-- <div class="col-lg-3 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Our Blog</h5>
                        <div class="footer-blog">
                            <a href="#" class="fb-item">
                                <h6>Most people who work</h6>
                                <span class="blog-time"><i class="fa fa-clock-o"></i> Jan 02, 2019</span>
                            </a>
                            <a href="#" class="fb-item">
                                <h6>Freelance Design Tricks How </h6>
                                <span class="blog-time"><i class="fa fa-clock-o"></i> Jan 02, 2019</span>
                            </a>
                            <a href="#" class="fb-item">
                                <h6>have a computer at home have had </h6>
                                <span class="blog-time"><i class="fa fa-clock-o"></i> Jan 02, 2019</span>
                            </a>
                        </div>
                    </div>
                </div>-->
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>Categorias</h5>
                        <ul class="workout-program">
                            <li><a href="#">Talleres</a></li>
                            <li><a href="#">Supermercados</a></li>
                            <li><a href="#">Peluquerias</a></li>
                            <li><a href="#">Bancos</a></li>
                            <li><a href="#">Hoteles</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer-widget">
                        <h5>Información</h5>
                        <ul class="footer-info">
                            <li>
                                <i class="fa fa-phone"></i>
                                <span>Teléfono</span>
                                +595981 102 724
                            </li>
                            <li>
                                <i class="fa fa-envelope-o"></i>
                                <span>Email:</span>
                                hola@santarosadelaguaray.online
                            </li>
                            <li>
                                <i class="fa fa-map-marker"></i>
                                <span>direccíon</span>
                                Stella Marys,ruta11 km 224, Santa Rosa Del Aguaray
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="ct-inside"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright ©<script>document.write(new Date().getFullYear());</script>2020 Todos los derechos Reservados |  <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://pauldefault.com" target="_blank">PaulDefault</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --> </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    

    

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="{{asset('assets/js/jquery-3.3.1.slim.min.js')}}"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#dismiss, .overlay').on('click', function () {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>

    <script>
$(document).ready(function(){
  $("#myInput").keyup(function() {
    let value = $(this).val().toLowerCase();
    $("#myList a").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
  });
});
</script>

<script>
$(document).ready(function () {

  $('.first-button').on('click', function () {

    $('.animated-icon1').toggleClass('open');
  });
  $('.second-button').on('click', function () {

    $('.animated-icon2').toggleClass('open');
  });
  $('.third-button').on('click', function () {

    $('.animated-icon3').toggleClass('open');
  });
});
</script>
</body>

</html>
