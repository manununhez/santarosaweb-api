 <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="santa rosa del aguaray" content="">
    <meta name="santa rosa online" content="">

    <title>{{ $item->name }}</title>
     <!-- Favicons -->
  <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">


    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}"  >
    <link href="{{asset('assets/icofont/icofont.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/animate.css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/venobox/venobox.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/style.css')}}">

  
     <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">


</head>

<body> 
        
<div class="container">



  <h5>{{ $section->name }} / {{ $category->name }} / {{ $item->name }}</h5>
</div>
 
 <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container text-right">
      <i class="icofont-phone"></i> {{ $item->phone }}
      <i class="icofont-clock-time icofont-rotate-180"></i> [ -- FALTA AGREGAR LOS DIAS Y HORAS DE APERTURA/CIERRE -- ]
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
        <a href="#header"> <img  class=" " src="{{asset( 'uploads/'.$item->image_url_logo ) }}"></a>
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="#header">inicio</a></li>
         
          <li><a href="#menu">Menu</a></li>
          
           
          <li><a href="#contact">Nosotros</a></li>

          <li class="book-a-table text-center"><a href="#book-a-table">Contactar</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->

          <div class="carousel-item active" style="background: url(  {{asset( 'uploads/'.$item->image_url_1 )}});">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animated fadeInDown"><span>Son Más Que Un </span> Antojo Todo Casero</h2>
                <p class="animated fadeInUp">Estamos sobre la ruta 11 Juana Maria de Lara, frente mismo al Hotel Brayan Nicolas!
                  Delivery 0991748631</p>
                <div>
                  <a href="#menu" class="btn-menu animated fadeIn scrollto">Nuestro menú</a>
                  <a href="#book-a-table" class="btn-book animated fadeIn scrollto">Reservar</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item" style="background: url( {{asset( 'uploads/'.$item->image_url_2 )}});">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animated fadeInDown"><span>Veni a disfrutar </span> de ese antojo que no te deja vivir!!</h2>
                <p class="animated fadeInUp">Las mejores pizzas de Santa Rosa Del Aguaray</p>
                <div>
                  <a href="#menu" class="btn-menu animated fadeIn scrollto">Menu Pizza</a>
                  <a href="#book-a-table" class="btn-book animated fadeIn scrollto">Hacer pedido</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="carousel-item" style="background: url( {{asset( 'uploads/'.$item->image_url_3 )}});">
            

            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animated fadeInDown"><span>Buffet </span> todos los días </h2>
                <p class="animated fadeInUp">Ruta 11 juana maria de lara frente al hotel brayan nicolas. Delivery 099174863</p>
                <div>
                  <a href="#menu" class="btn-menu animated fadeIn scrollto">Menu Buffet</a>
                   
                </div>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">


    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu">
      <div class="container">

        <div class="section-title">
          <h2>Mira nuestro sabroso <span>Menú</span></h2>
        </div>

        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="menu-flters">
              <li data-filter="*" class="filter-active">Mostrar todo</li>
              <li data-filter=".filter-starters">Entrantes</li>
              <li data-filter=".filter-salads">Comida Rapida</li>
              <li data-filter=".filter-specialty">Pizzas</li>
            </ul>
          </div>
        </div>

        <div class="row menu-container">          
            <!-- Aca deben listarse los productos de un local ! -->      
            @foreach ($products as $product)
                <div class="col-lg-3 menu-item filter-specialty">
                  <a href="{{asset( 'uploads/'.$product->image_url ) }}" class="venobox" data-gall="gallery-item">
                              <img src="{{asset( 'uploads/'.$product->image_url ) }}" alt="" class="img-fluid">
                            </a>
                  <div class="menu-content">
                    <a href="#">{{ $product->name }}</a><span>Precio: {{ $product->price }}</span>
                  </div>
                  <div class="menu-ingredients">
                    {{ $product->description }}
                  </div>
                  <div class="menu-ingredients">
                    {{ $product->tag }}
                  </div>
                </div>
              @endforeach
        </div>

      </div>
    </section><!-- End Menu Section -->

 

    <!-- ======= Book A Table Section ======= -->
    <section id="book-a-table" class="book-a-table">
      <div class="container">

        <div class="section-title">
          <h2>Ponete en contacto con  <span>Nosotros</span></h2>
          <p>Para cualquier consulta, o sugerencia</p>
        </div>
           
            <div class=" text-center">
            

              <a class="btn-whatsapp animated fadeIn scrollto" href="https://api.whatsapp.com/send?phone=5959991748631&amp;text=SR.Online: " target="_blank"><span class="fa fa-whatsapp"></span>whatsapp</a>
              
              <a href="tel:+595991 748 631" class="btn-menu animated fadeIn scrollto"><i class="icofont-phone"></i>Llamar</a>
            </div>
        

      </div>
    </section><!-- End Book A Table Section -->



 

 
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2><span>Contacte con</span> Nosotros</h2>
          <p>{{ $item->description }}</p>

          <p>Latitud: {{ $item->coordinate_latitude }}</p>
          <p>Longitud: {{ $item->coordinate_longitude }}</p>
        </div>
      </div>

      <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14599.028131037!2d{{ $item->coordinate_latitude }}!3d{{ $item->coordinate_longitude }}!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9aace72f349dc442!2sSon%20M%C3%A1s%20que%20un%20Antojo%20TODO%20CASERO!5e0!3m2!1ses!2spy!4v1588984303086!5m2!1ses!2spy" style="border:0; width: 100%; height: 350px;" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
      </div>

      <div class="container mt-5">

        <div class="info-wrap">
          <div class="row">
            <div class="col-lg-3 col-md-6 info">
              <i class="icofont-google-map"></i>
              <h4>Ubicación:</h4>

              <p>{{ $item->address_1 }}</p>
              <p>{{ $item->address_2 }}</p>
              <p>{{ $item->house_number }}</p>
              <p>{{ $item->neighborhood }}</p>
              <p>{{ $item->city }}</p>
              <p>{{ $item->postal_code }}</p>
            </div>

            <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
              <i class="icofont-clock-time icofont-rotate-90"></i>
              <h4>Horarios:</h4>
              <p>[ -- FALTA AGREGAR LOS DIAS -- ]<br>
                Horario apertura: {{ $item->info_hours_opening }}<br>
                Horario cierre: {{ $item->info_hours_closing }}</p>
            </div>

            <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
              <i class="icofont-envelope"></i>
              <h4>Email:</h4>
              <p>{{ $item->email }}</p>
            </div>

            <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
              <i class="icofont-phone"></i>
              <h4>Llamada</h4>
              <p>Telefono: {{ $item->phone }}</p>
            </div>
          </div>
        </div>

         

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>Todo Casero <br><span>Mas que un Antojo</span></h3>
      <p> {{ $item->description }}</p>
      <div class="social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span>Mas que un Antojo</span></strong>. Todos los derechos reservados
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/ -->
        Diseñado por <a href="https://bootstrapmade.com/">PaulDefault.com</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


    

    
    <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}" ></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}" ></script>
    <script src="{{asset('assets/vendor/jquery.easing/jquery.easing.min.js')}}" ></script>
    <script src="{{asset('assets/vendor/php-email-form/validate.js')}}" ></script>
    <script src="{{asset('assets/vendor/jquery-sticky/jquery.sticky.js')}}" ></script>
    <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}" ></script>
    <script src="{{asset('assets/vendor/venobox/venobox.min.js')}}" ></script>
    <script src="{{asset('assets/vendor/owl.carousel/owl.carousel.min.js')}}" ></script>
    <script src="{{asset('assets/vendor/main.js')}}" ></script>


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

      
     

        
</body>

</html>
