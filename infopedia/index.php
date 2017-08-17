<?php
if(isset($_GET['success']))
{
    if(unlink("index.php"))
    {
        rename("index1.php","index.php");
    }
}
?>
<!DOCTYPE html xmlns="http://www.w3.org/1999/html">
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon"
          type="image/png"
          href="img/favicon.ico"
    
	<link href="css1/font-awesome.css" rel="stylesheet">
        <link href="css1/bootstrap.min.css" rel="stylesheet">
		<link href="css2/bootstrap.min.css" rel="stylesheet">
    <!-- for fontawesome icon css file -->
    <link href="css2/font-awesome.min.css" rel="stylesheet">
    <!-- superslides css -->
    <link rel="stylesheet" href="css2/superslides.css">
    <!-- for content animate css file -->
    <link rel="stylesheet" href="css2/animate.css">     
    <!-- slick slider css file -->
    <link href="css2/slick.css" rel="stylesheet">  
<link href="css2/style.css" rel="stylesheet"> 	
    <!-- website theme color file -->   
     <link id="switcher" href="css2/themes/cyan-theme.css" rel="stylesheet">

        <!-- owl carousel css -->

        <link href="css1/owl.carousel.css" rel="stylesheet">
        <link href="css1/owl.theme.css" rel="stylesheet">	        

        <!-- Theme stylesheet -->
        <link href="css1/style.default.css" rel="stylesheet" id="theme-stylesheet">

        <!-- Custom stylesheet - for your changes -->
        <link href="css1/custom.css" rel="stylesheet">

        <!-- CSS Animations -->
        <link href="css1/animate.css" rel="stylesheet">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<script src="js2/modernizr-2.6.2.min.js"></script>

        
        <script src="js2/respond.min.js"></script>
    <script>
        function showResult(str) {
            if (str.length==0) {
                document.getElementById("livesearch").innerHTML="";
                document.getElementById("livesearch").style.border="0px";
                return;
            }
            if (window.XMLHttpRequest) {

                xmlhttp=new XMLHttpRequest();
            } else {
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                    document.getElementById("livesearch").innerHTML=this.responseText;
                    document.getElementById("livesearch").style.border="1px solid #A5ACB2";
                }
            }
            xmlhttp.open("GET","livesearch.php?q="+str,true);
            xmlhttp.send();
        }
    </script>






    <style>
        input[type=text] {
            width: 130px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            background-color: transparent;
            background-image: url('#');
            background-position: 10px 10px;
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;

        }

        input[type=text]:focus {
            width: 50%;
        }
    </style>

</head>

<body>

    <!-- Navigation -->
    <a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle"><i class="fa fa-bars"></i></a>
    <nav id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
            <li class="sidebar-brand">
                <a href="#top" onclick=$("#menu-close").click();>Welcome User</a>
            </li>
            <li>
                <a href="#top" onclick=$("#menu-close").click();>Home</a>
            </li>
            <li>
                <a href="#about" onclick=$("#menu-close").click();>About</a>
            </li>
            <li>
                <a href="ExamPortal/Teachers/teacherLogin.php" onclick=$("#menu-close").click();>Teachers Login</a>
            </li>
            <li>
                <a href="ExamPortal/Students/studLogin.php" onclick=$("#menu-close").click();>Student Login</a>
            </li>
            <li>
                <a href="ExamPortal/Admin/adminLogin.php" onclick=$("#menu-close").click();>Admin Login</a>
            </li>
        </ul>
    </nav>

    <!-- Header -->
    <header id="top" class="header">

        <div class="text-vertical-center">
            <form>
                <input type="text" name="search" placeholder="Search.." onkeyup = "showResult(this.value)">
                <div id="livesearch" style="background-color:transparent;width: 130px;"> </div>
            </form> <br>
            <br>
            <br>
            <h1>Welcome To Infopedia</h1>
            <h3>we help you to make life changing Decisions</h3>
            <br>
            <a href="#about" class="btn btn-dark btn-lg">Find Out More</a>
        </div>
    </header>

    <!-- About -->
    <section id="about" class="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Now Don't listen to fake promiss and advertismemt!</h2>
                    <p class="lead">We are here to choose a better path for you <a target="_blank" href="http://join.deathtothestockphoto.com/">Death to the Stock Photo</a>.</p>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <!-- Services -->
    <!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
    <section id="services" class="services bg-primary">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-10 col-lg-offset-1">
				<i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i>
<span class="sr-only">Loading...</span>
                    <h2>Our Services</h2>
                    <hr class="small"><br><br>
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                
                                <i class="fa fa-university" aria-hidden="true"></i>
                            </span>
                                <h4>
                                    <strong>Managmenent and CMS application.</strong>
                                </h4>
                                <p>For Coaching, School, College..</p>
                               
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-search-plus" aria-hidden="true"></i>
                            </span>
                                <h4>
                                    <strong>Search Engine For Coaching And School.</strong>
                                </h4>
                                <p>We help You to find best coaching in your city</p>
                                
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                              <i class="fa fa-youtube" aria-hidden="true"></i>
                            </span>
                                <h4>
                                    <strong>Online Coaching And Cources.</strong>
                                </h4>
                                <p>Now you can Study From any coaching center at your home.</p>
                                
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-magic" aria-hidden="true"></i>
                            </span>
                                <h4>
                                    <strong>Automation.</strong>
                                </h4>
                                <p>We are trying to automate the whole process inside the institute</p>
                                
                            </div>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.col-lg-10 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <!-- Callout -->
    <section id="portfolio" class="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <h2>Our Work</h2>
                    <hr class="small">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="#">
                                   <iframe width="400" height="400" src="https://www.youtube.com/embed/dVRKVuwF3Js" frameborder="0" allowfullscreen></iframe>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="#">
                                   <iframe width="400" height="400" src="https://www.youtube.com/embed/lCv4r3wgsPQ" frameborder="0" allowfullscreen></iframe>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="#">
                                   <iframe width="400" height="400" src="https://www.youtube.com/embed/dVRKVuwF3Js" frameborder="0" allowfullscreen></iframe>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="#">
<iframe width="400" height="400" src="https://www.youtube.com/embed/phIDNo4Vjkw" frameborder="0" allowfullscreen></iframe>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                    <a href="#" class="btn btn-dark">View More Items</a>
                </div>
                <!-- /.col-lg-10 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
	
    <div class="section text-gray" id="section3" data-animate="fadeInUp">

                <div class="container">
                    <div class="col-md-12">

                        <div class="mb20">
                            <h2 class="title" data-animate="fadeInUp">Customers said about us</h2>

                            <p class="lead text-center" data-animate="fadeInUp"></p> 
                        </div>

                        <ul class="owl-carousel testimonials same-height-row" data-animate="fadeInUp">
                            <li class="item">
                                <div class="testimonial same-height-always">
                                    <div class="text">
                                        <p>One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections.</p>
                                    </div>
                                    <div class="bottom">
                                        <div class="icon"><i class="fa fa-quote-left"></i></div>
                                        <div class="name-picture">
                                            <img class="" alt="" src="img/person-1.jpg">
                                            <h5>John McIntyre</h5>
                                            <p>CEO, TransTech</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="item">
                                <div class="testimonial same-height-always">
                                    <div class="text">
                                        <p>The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked. "What's happened to me? " he thought. It wasn't a dream.</p>
                                    </div>
                                    <div class="bottom">
                                        <div class="icon"><i class="fa fa-quote-left"></i></div>
                                        <div class="name-picture">
                                            <img class="" alt="" src="img/person-2.jpg">
                                            <h5>John McIntyre</h5>
                                            <p>CEO, TransTech</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="item">
                                <div class="testimonial same-height-always">
                                    <div class="text">
                                        <p>His room, a proper human room although a little too small, lay peacefully between its four familiar walls.</p>

                                        <p>A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame.</p>
                                    </div>
                                    <div class="bottom">
                                        <div class="icon"><i class="fa fa-quote-left"></i></div>
                                        <div class="name-picture">
                                            <img class="" alt="" src="img/person-3.jpg">
                                            <h5>John McIntyre</h5>
                                            <p>CEO, TransTech</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="item">
                                <div class="testimonial same-height-always">
                                    <div class="text">
                                        <p>It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. Gregor then turned to look out the window at the dull weather. Drops of rain could be heard hitting the pane, which made him feel quite sad.</p>
                                    </div>

                                    <div class="bottom">
                                        <div class="icon"><i class="fa fa-quote-left"></i></div>
                                        <div class="name-picture">
                                            <img class="" alt="" src="img/person-4.jpg">
                                            <h5>John McIntyre</h5>
                                            <p>CEO, TransTech</p>
                                        </div>
                                    </div>
                                </div> 
                            </li>
                            <li class="item">
                                <div class="testimonial same-height-always">
                                    <div class="text">
                                        <p>It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. Gregor then turned to look out the window at the dull weather. Drops of rain could be heard hitting the pane, which made him feel quite sad. Gregor then turned to look out the window at the dull weather. Drops of rain could be heard hitting the pane, which made him feel quite sad.</p>
                                    </div>

                                    <div class="bottom">
                                        <div class="icon"><i class="fa fa-quote-left"></i></div>
                                        <div class="name-picture">
                                            <img class="" alt="" src="img/person-4.jpg">
                                            <h5>John McIntyre</h5>
                                            <p>CEO, TransTech</p>
                                        </div>
                                    </div>
                                </div> 
                            </li>
                        </ul> <!-- /.owl-carousel -->
                    </div> <!-- /.12 -->
                </div> <!-- /.container -->

            </div
			
</div>
</div>

<section id="featuredBlog">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="featuredBlog_area">
            <div class="team_title">
              <hr>
              <h2>News <span>From Our Blog</span></h2>
              
            </div>
            <!-- start featured blog -->
            <div class="featured_blog">
              <div class="row">
                <!-- start single featured blog -->
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <div class="single_featured_blog">                      
                    <img alt="img" src="img/blog.jpg">
                    <h2>It's That time of year again! </h2>
                    <div class="post_commentbox">
                      <a href="#"><i class="fa fa-tags"></i>Technology</a>
                      <a href="#"><i class="fa fa-comments"></i>Comments</a>      
                    </div>
                    <p>As the second largest social network in existence, a Google+ profile will give your brand a massive reach. But the most valuable thing about getting your eCommerce store onto Google+ is that Google prioritises all Google+, making it the best social media platform for search engine optimisation.</p>
                    <a href="single.html" class="read_more">read more<i class="fa fa-long-arrow-right"></i></a>
                  </div>
                </div>
                <!-- start single featured blog -->
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <div class="single_featured_blog">                      
                    <img alt="img" src="img/blog.jpg">
                    <h2>It's That time of year again! Prepare your ecomarce </h2>
                    <div class="post_commentbox">
                      <a href="#"><i class="fa fa-tags"></i>Technology</a>
                      <a href="#"><i class="fa fa-comments"></i>Comments</a>      
                    </div>
                    <p>As the second largest social network in existence, a Google+ profile will give your brand a massive reach. But the most valuable thing about getting your eCommerce store onto Google+ is that Google prioritises all Google+, making it the best social media platform for search engine optimisation.</p>
                    <a href="single.html" class="read_more">read more<i class="fa fa-long-arrow-right"></i></a>
                  </div>
                </div>
                <!-- start single featured blog -->
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <div class="single_featured_blog">                      
                    <img alt="img" src="img/blog.jpg">
                    <h2>It's That time of year again!</h2>
                    <div class="post_commentbox">
                      <a href="#"><i class="fa fa-tags"></i>Technology</a>
                      <a href="#"><i class="fa fa-comments"></i>Comments</a>      
                    </div>
                    <p>As the second largest social network in existence, a Google+ profile will give your brand a massive reach. But the most valuable thing about getting your eCommerce store onto Google+ is that Google prioritises all Google+, making it the best social media platform for search engine optimisation.</p>
                    <a href="single.html" class="read_more">read more<i class="fa fa-long-arrow-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="ourTeam">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="team_area wow fadeInLeftBig">
            <div class="team_title">
              <hr>
              <h2>Meet <span>Our Team</span></h2>
              
            </div>
            <div class="team">
              <ul class="team_nav">
                <li>
                  <div class="team_img">
                    <img src="img/person-1.png" alt="team-img">
                  </div>
                  <div class="team_content">
                    <h4>Ranjan Singh</h4>
                    <p></p>
                  </div>
                  <div class="team_social">
                    <a href="https://www.facebook.com/ranjan1703"><span class="fa fa-facebook"></span></a>
                    <a href="https://twitter.com/RanjanK1703"><span class="fa fa-twitter"></span></a>
                    <a href="https://in.linkedin.com/in/ranjan-singh-40a472b2"><span class="fa fa-linkedin"></span></a>
                    <a href="#"><span class="fa fa-google-plus"></span></a>
                  </div>
                </li>
                <li>
                  <div class="team_img">
                    <img src="img/person-2.png" alt="team-img">
                  </div>
                  <div class="team_content">
                    <h4 class="team_name">Rohit</h4>
                    <p></p>
                  </div>
                  <div class="team_social">
                    <a href="#"><span class="fa fa-facebook"></span></a>
                    <a href="#"><span class="fa fa-twitter"></span></a>
                    <a href="#"><span class="fa fa-linkedin"></span></a>
                    <a href="#"><span class="fa fa-google-plus"></span></a>
                  </div>
                </li>
                <li>
                  <div class="team_img">
                    <img src="img/person-3.png" alt="team-img">
                  </div>
                  <div class="team_content">
                    <h4 class="team_name">Anupurba</h4>
                    <p></p>
                  </div>
                  <div class="team_social">
                    <a href="#"><span class="fa fa-facebook"></span></a>
                    <a href="#"><span class="fa fa-twitter"></span></a>
                    <a href="#"><span class="fa fa-linkedin"></span></a>
                    <a href="#"><span class="fa fa-google-plus"></span></a>
                  </div>
                </li>
                <li>
                  <div class="team_img">
                    <img src="img/person-4.png" alt="team-img">
                  </div>
                  <div class="team_content">
                    <h4 class="team_name">Manojit</h4>
                    <p></p>
                  </div>
                  <div class="team_social">
                    <a href="#"><span class="fa fa-facebook"></span></a>
                    <a href="#"><span class="fa fa-twitter"></span></a>
                    <a href="#"><span class="fa fa-linkedin"></span></a>
                    <a href="#"><span class="fa fa-google-plus"></span></a>
                  </div>
                </li>
                <li>
                  <div class="team_img">
                    <img src="img/sa.png" alt="team-img">
                  </div>
                  <div class="team_content">
                    <h4 class="team_name">Satyam Rai</h4>
                    <p>Managing Director</p>
                  </div>
                  <div class="team_social">
                    <a href="#"><span class="fa fa-facebook"></span></a>
                    <a href="#"><span class="fa fa-twitter"></span></a>
                    <a href="#"><span class="fa fa-linkedin"></span></a>
                    <a href="#"><span class="fa fa-google-plus"></span></a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
    <!-- Map -->
    <section id="contact" class="map">

        <div id="map" style="width:100%;height:500px;background:gray"></div>
		

<script>
    function myMap() {
        var myCenter = new google.maps.LatLng(22.5726,88.3639);
        var mapCanvas = document.getElementById("map");
        var mapOptions = {center: myCenter, zoom: 5};
        var map = new google.maps.Map(mapCanvas, mapOptions);
        var marker = new google.maps.Marker({position:myCenter});
        marker.setMap(map);

        google.maps.event.addListener(marker,'click',function() {
            map.setZoom(15);
            map.setCenter(marker.getPosition());
        });
    }
</script></section>
<br><br><br>    

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <h4><strong>Visit Us</strong>
                    </h4>
                    <p>Salt Lake 
                        <br>SDF Building, Sector V</p>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-phone fa-fw"></i> 7090157437</li>
                        <li><i class="fa fa-envelope-o fa-fw"></i> <a href="mailto:name@example.com">team.hpepro@gmail.com</a>
                        </li>
                    </ul>
                    <br>
                    <ul class="list-inline">
                        <li>
                            <a href="#"><i class="fa fa-facebook fa-fw fa-3x"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter fa-fw fa-3x"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-dribbble fa-fw fa-3x"></i></a>
                        </li>
                    </ul>
                    <hr class="small">
                    <p class="text-muted">Copyright &copy; Infopedia 2014</p>
                </div>
            </div>
        </div>
		<a href="https://www.freecounterstat.com" title="page view counters"><img src="https://counter6.freecounter.ovh/private/freecounterstat.php?c=blrc4rkdzt4gpm4cljw7pdba3mq5xx2l" border="0" title="page view counters" alt="page view counters"></a>
        <a id="to-top" href="#top" class="btn btn-dark btn-lg"><i class="fa fa-chevron-up fa-fw fa-1x"></i></a>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script>
    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });
    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });
    // Scrolls to the selected menu item on the page
    $(function() {
        $('a[href*=#]:not([href=#],[data-toggle],[data-target],[data-slide])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    //#to-top button appears after scrolling
    var fixed = false;
    $(document).scroll(function() {
        if ($(this).scrollTop() > 250) {
            if (!fixed) {
                fixed = true;
                // $('#to-top').css({position:'fixed', display:'block'});
                $('#to-top').show("slow", function() {
                    $('#to-top').css({
                        position: 'fixed',
                        display: 'block'
                    });
                });
            }
        } else {
            if (fixed) {
                fixed = false;
                $('#to-top').hide("slow", function() {
                    $('#to-top').css({
                        display: 'none'
                    });
                });
            }
        }
    });
    // Disable Google Maps scrolling
    // See http://stackoverflow.com/a/25904582/1607849
    // Disable scroll zooming and bind back the click event
    var onMapMouseleaveHandler = function(event) {
        var that = $(this);
        that.on('click', onMapClickHandler);
        that.off('mouseleave', onMapMouseleaveHandler);
        that.find('iframe').css("pointer-events", "none");
    }
    var onMapClickHandler = function(event) {
            var that = $(this);
            // Disable the click handler until the user leaves the map area
            that.off('click', onMapClickHandler);
            // Enable scrolling zoom
            that.find('iframe').css("pointer-events", "auto");
            // Handle the mouse leave event
            that.on('mouseleave', onMapMouseleaveHandler);
        }
        // Enable map zooming with mouse scroll when the user clicks the map
    $('.map').on('click', onMapClickHandler);
    </script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSkWWRWp63Df7KxlXdQzkLDoUfPVPgBQg&callback=myMap"></script>

	 <script src="js2/jquery-1.11.0.min.js"></script>
        <script src="js2/bootstrap.min.js"></script>


        <!-- waypoints for scroll spy -->
        <script src="js2/waypoints.min.js"></script>

        <!-- owl carousel -->
        <script src="js2/owl.carousel.min.js"></script>

        <!-- jQuery scroll to -->
        <script src="js2/jquery.scrollTo.min.js"></script>

        <!-- main js file -->

        <script src="js2/front.js"></script>
		
		 <script src="js3/wow.min.js"></script>
  <!-- bootstrap js file -->
  <script src="js3/bootstrap.min.js"></script> 
  <!-- superslides slider -->
  <script src="js3/jquery.easing.1.3.js"></script>
  <script src="js3/jquery.animate-enhanced.min.js"></script>
  <script src="js3/jquery.superslides.min.js" type="text/javascript" charset="utf-8"></script>
  <!-- slick slider js file -->
  <script src="js3/slick.min.js"></script>
  <script src="js3/custom.js"></script> 
	
</body>

</html>
