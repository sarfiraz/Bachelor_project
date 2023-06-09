
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <title>Website Title</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/tooplate-style.css">

    <style>
        #home {
            background: url('{{ asset('images/home.jpg') }}') 50% 0 repeat-y fixed;
        }
    </style>
</head>
<body>
<div class="preloader">
    <div class="spinner">
        <span class="spinner-rotate"></span>
    </div>
</div>

    <section id="home" class="parallax-section">
        <div class="container">
            <div class="row">

                <div class="col-md-offset-5 col-md-7 col-sm-12">
                    <div class="home-thumb">
                        <h1 id="home-1-h1" class="wow fadeInUp" data-wow-delay="0.4s">Hello I am [User]</h1>
                        <p id="home-1-p" class="wow fadeInUp white-color" data-wow-delay="0.6s">
                            finibus urna posuere nec. Quisque vel nunc eget arcu maximus facilisis non eu nisi. Aliquam
                            ullamcorper est a nisl imperdiet luctus.
                        </p>
                        <a id="home-1-a" href="#service" class="wow fadeInUp smoothScroll btn btn-default section-btn"
                           data-wow-delay="1s">
                            discover More' </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section id="service" class="parallax-section service">
        <div class="container">
            <div class="row">

                <div class="wow fadeInUp section-title" data-wow-delay="0.2s">
                    <!-- SECTION TITLE -->
                    <h2 id="service-1-h2">what things i am doing...</h2>
                    <p id="service-1-p"> Lorem ipsum dolor sit amet, consectetur venenatis tincidunt.</p>
                </div>
                    <div id="div-1" class="col-md-3 col-sm-6 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="service-thumb">
                            <i class="fa fa-smile-o"></i>
                            <h4 id="service-1-h4">Graphic Design</h4>
                            <p id="service-2-p">Lorem ipsum dolor sit amet, consectetur venenatis tincidunt.</p>
                        </div>
                    </div>


                    <div id="div-2" class="col-md-3 col-sm-6 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="service-thumb bg-grey">
                            <i class="fa fa-camera"></i>
                            <h4 id="service-2-h4" class="white-color">Photography</h4>
                            <p id="service-3-p">Lorem ipsum dolor sit amet, consectetur venenatis tincidunt.</p>
                        </div>
                    </div>


                    <div id="div-3" class="col-md-3 col-sm-6 wow fadeInUp" data-wow-delay="0.6s">
                        <div class="service-thumb">
                            <i class="fa fa-lightbulb-o"></i>
                            <h4 id="service-3-h4">UI/UX design</h4>
                            <p id="service-4-p"> Lorem ipsum dolor sit amet, consectetur venenatis tincidunt.</p>
                        </div>
                    </div>
                    <div id="div-4" class="col-md-3 col-sm-6 wow fadeInUp" data-wow-delay="0.8s">
                        <div class="service-thumb">
                            <i class="fa fa-clone"></i>
                            <h4 id="service-4-h4">illustration</h4>
                            <p id="service-5-p"> Lorem ipsum dolor sit amet, consectetur venenatis tincidunt.</p>
                        </div>
                    </div>

            </div>
        </div>
    </section>

    <section id="about" class="parallax-section">
        <div class="container">
            <div class="row">
                    <div id="div-5" class="col-md-4 col-sm-8">
                        <div class="about-image-thumb">
                            <img id="aboutprofile"
                                 src="{{ asset('images/profile-image.jpg') }}"
                                 class="wow fadeInUp img-responsive" data-wow-delay="0.2s" alt="about image">
                            <ul class="social-icon">
                                <li id="about-1-li"><a href="#" class="fa fa-facebook"></a></li>
                                <li id="about-2-li"><a href="#" class="fa fa-twitter"></a></li>
                                <li id="about-3-li"><a href="#" class="fa fa-instagram"></a></li>
                                <li id="about-4-li"><a href="#" class="fa fa-behance"></a></li>
                            </ul>
                        </div>
                    </div>

                    <div id="div-6" class="col-md-8 col-sm-12">
                        <div class="about-thumb">
                            <!-- SECTION TITLE -->
                            <div class="wow fadeInUp section-title" data-wow-delay="0.6s">
                                <h2 id="about-1-h2">a little more about [User]</h2>
                                <p id="about-1-p"> Graphic Designer, Creative Photographer & Front-end Developer</p>
                            </div>
                            <div class="wow fadeInUp" data-wow-delay="0.8s">
                                <p id="about-2-p"> Praesent eleifend tristique nisl, nec finibus urna posuere nec.
                                    Quisque vel nunc eget arcu maximus facilisis non eu nisi. Aliquam ullamcorper est a
                                    nisl imperdiet luctus.</p>
                                <p id="about-3-p">Praesent eleifend tristique nisl, nec finibus urna posuere nec.
                                    Quisque vel nunc eget arcu maximus facilisis non eu nisi. Aliquam ullamcorper est a
                                    nisl imperdiet luctus.</p>
                            </div>
                        </div>
                    </div>


            </div>
        </div>
    </section>

    <section id="work" class="parallax-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <!-- SECTION TITLE -->
                    <div class="wow fadeInUp section-title" data-wow-delay="0.2s">
                        <h2 id="work-1-h2">Seleted Designs</h2>
                        <p id="work-1-p">Lorem ipsum dolor sit amet, consectetur venenatis tincidunt.</p>
                    </div>
                </div>
                    <div id="div-7" class="wow fadeInUp col-md-4 col-sm-6" data-wow-delay="0.4s">
                        <!-- WORK THUMB -->
                        <div class="work-thumb">
                            <a
                                href="{{ asset('images/work-image1.jpg') }}"
                                class="image-popup">
                                <div class="work-thumb-overlay">
                                    <h4 id="work-1-h4" class="white-color">First Title</h4>
                                    <h2 id="work-2-h2">Graphic Design</h2>
                                </div>
                                <img id="workfirst"
                                     src="{{ asset('images/work-image1.jpg') }}"
                                     class="img-responsive" alt="Work 1">
                            </a>
                        </div>
                    </div>
                    <div id="div-8" class="wow fadeInUp col-md-4 col-sm-6" data-wow-delay="0.4s">
                        <!-- WORK THUMB -->
                        <div class="work-thumb">
                            <a
                                href="{{ asset('images/work-image2.jpg') }}"
                                class="image-popup">
                                <div class="work-thumb-overlay">
                                    <h4 id="work-2-h4" class="white-color">Second Title</h4>
                                    <h2 id="work-3-h2">Photography</h2>
                                </div>
                                <img id="worksecond"
                                     src="{{ asset('images/work-image2.jpg') }}"
                                     class="img-responsive" alt="Work 2">
                            </a>
                        </div>
                    </div>
                    <div id="div-9" class="wow fadeInUp col-md-4 col-sm-6" data-wow-delay="0.4s">
                        <!-- WORK THUMB -->
                        <div class="work-thumb">
                            <a
                                href="{{ asset('images/work-image3.jpg') }}"
                                class="image-popup">
                                <div class="work-thumb-overlay">
                                    <h4 id="work-3-h4" class="white-color">Third Title</h4>
                                    <h2 id="work-4-h2">illustration</h2>
                                </div>
                                <img id="workthird"
                                     src="{{ asset('images/work-image3.jpg') }}"
                                     class="img-responsive" alt="Work 3">
                            </a>
                        </div>
                    </div>
            </div>
        </div>
    </section>

    <section id="contact" class="parallax-section">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-sm-12">
                    <!-- SECTION TITLE -->
                    <div class="wow fadeInUp section-title" data-wow-delay="0.2s">
                        <h2 id="contact-1-h2"> Get in touch</h2>
                        <p id="contact-1-p">Lorem ipsum dolor sit amet, consectetur venenatis tincidunt.</p>
                    </div>
                </div>

                <div class="col-md-7 col-sm-10">
                    <!-- CONTACT FORM HERE -->
                    <div class="wow fadeInUp" data-wow-delay="0.4s">
                        <form id="contact-form" >
                            @csrf
                            <div class="col-md-6 col-sm-6">
                                <input id="contact-1-input" type="text" class="form-control" name="name"
                                       placeholder="Name" required="">
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <input id="contact-2-input" type="email" class="form-control" name="email"
                                       placeholder="Email" required="">
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <textarea id="contact-1-textarea" class="form-control" rows="5" name="message"
                                          placeholder="Message" required=""></textarea>
                            </div>
                            <div class="col-md-offset-8 col-md-4 col-sm-offset-6 col-sm-6">
                                <button id="submit" type="submit" class="form-control" name="submit">Send Message
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-5 col-sm-8">
                    <!-- CONTACT INFO -->
                    <div class="wow fadeInUp contact-info" data-wow-delay="0.4s">
                        <div class="section-title">
                            <h2 id="contact-2-h2">Contact Info</h2>
                            <p id="contact-2-p">Lorem ipsum dolor sit consectetur adipiscing morbi venenatis et tortor
                                consectetur adipisicing lacinia tortor morbi ultricies.</p>
                        </div>

                        <p id="contact-3-p"><i class="fa fa-map-marker"></i>456 New Street 22000, New York City, USA
                        </p>
                        <p id="contact-4-p"><i class="fa fa-comment"></i> <a href="mailto:info@company.com">info@company.com</a>
                        </p>
                        <p id="contact-5-p"><i class="fa fa-phone"></i>010-020-0340 </p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section id="footer">
        <footer>
            <div class="container">
                <div class="row">

                    <div class="wow fadeInUp col-md-12 col-sm-12" data-wow-delay="0.8s">
                        <p id="footer-1-p" class="white-color">Copyright &copy; 2017 Your Company
                            | Design: Tooplate</p>
                        <div class="wow fadeInUp" data-wow-delay="1s">
                            <ul class="social-icon">
                                <li id="footer-1-li"><a href="#" class="fa fa-facebook"></a></li>
                                <li id="footer-2-li"><a href="#" class="fa fa-twitter"></a></li>
                                <li id="footer-3-li"><a href="#" class="fa fa-instagram"></a></li>
                                <li id="footer-4-li"><a href="#" class="fa fa-behance"></a></li>
                                <li id="footer-5-li"><a href="#" class="fa fa-github"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </section>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.parallax.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/magnific-popup-options.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/custom.js"></script>

</body>
</html>

