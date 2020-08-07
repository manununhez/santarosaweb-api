 <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="santa rosa del aguaray" content="">
    <meta name="santa rosa online" content="">

    <title>Talleres</title>
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

  <div class="container">
      <div class=" container txt-cen">
          <a href="https://santarosadelaguaray.online/">
            <img class=" fadeIn1 logo " src="{{asset('assets/img/logo.png')}}"></a>
        </div>  
        <h5>{{ $section->name }} / {{ $category->name }} / {{ $item->name }}</h5>

        <br>{{ $item->name }}</br>
        <br>{{ $item->description }}</br>
        <br>Web: {{ $item->website }}</br>
        <br>Telefono: {{ $item->phone }}</br>
        <br>Delivery disponible: {{ $item->delivery_available == 0 ? "No" : "Sí" }}</br>
        <br>Horario apertura: {{ $item->info_hours_opening }}</br>
        <br>Horario cierrre: {{ $item->info_hours_closing }}</br>

        @foreach ($products as $product)
        <a class="box_cate_interna   fadeIn2" href="">         
            <div class=" img-hover-zoom img-hover-zoom--basic text-center">
                <img class=" " src="{{asset( 'uploads/'.$product->image_url ) }}">
              </div>

            <div class="text-white-interna  ">
                <h5>{{ $product->name }}</h5>
                <h5>Precio: {{ $product->price }}</h5>
                <h6>{{ $product->description }}</h5>
            </div>            
        </a>
        @endforeach
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
    <script src="{{asset('assets/js/jquery-3.3.1.slim.min.js')}}" ></script>
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
