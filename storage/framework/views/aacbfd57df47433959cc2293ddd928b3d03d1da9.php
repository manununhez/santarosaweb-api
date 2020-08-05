 <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="santa rosa del aguaray" content="">
    <meta name="santa rosa online" content="">

    <title>S.R.Online - Automoviles</title>
     <!-- Favicons -->
  <link href="<?php echo e(asset('assets/img/favicon.png'), false); ?>" rel="icon">
  <link href="<?php echo e(asset('assets/img/apple-touch-icon.png'), false); ?>" rel="apple-touch-icon">


    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css'), false); ?>"  >

  <link href="<?php echo e(asset('assets/icofont/icofont.min.css'), false); ?>" rel="stylesheet">

   
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/jquery.mCustomScrollbar.min.css'), false); ?>">

     <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200&display=swap" rel="stylesheet">

     <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 

</head>

<body>

    <div class="container">
      <div class=" container txt-cen">
          <a href="../">
              <img class=" fadeIn1 logo " src="<?php echo e(asset('assets/img/logo.png'), false); ?>"></a>
      </div>
       
      <h2><?php echo e($section->name, false); ?></h2>
      <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a class="box_cate_interna   fadeIn2" href="<?php echo e(route('subCategoriasXcategoria', [$section, $category]), false); ?>">             
              
              <div class=" img-hover-zoom img-hover-zoom--basic text-center img_box_internas">
                <img class=" " src="<?php echo e(asset( 'uploads/'.$category->image_url ), false); ?>">
              </div>

              <div class="text-white-interna  ">
                  <h5><?php echo e($category->name, false); ?></h5>
              </div>
             
        </a>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>            
    </div>

    

    

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="<?php echo e(asset('assets/js/jquery-3.3.1.slim.min.js'), false); ?>" ></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="<?php echo e(asset('assets/js/bootstrap.min.js'), false); ?>"></script>
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
<?php /**PATH /var/www/santarosaweb-api/resources/views/categoria.blade.php ENDPATH**/ ?>