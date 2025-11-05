<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Edutopia -Educational Website</title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-eduwell-style.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">
<!--

TemplateMo 573 EduWell

https://templatemo.com/tm-573-eduwell

-->
  </head>

<body>


  <!-- ***** Header Area Start ***** -->
  <?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: LogIn.php");
    exit();
}
include("database.php");
include("header.php");
?>

  <!-- ***** Header Area End ***** -->

  <!-- ***** Main Banner Area Start ***** -->
  <section class="main-banner" id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="header-text">
            <h6>Welcome to our school</h6>
            <h2>Best Place To manage and edit your <em>Course!</em></h2>
            <div class="main-button-gradient">
              <div class="scroll-to-section"><a href="#contact-section">Join Us Now!</a></div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="right-image">
            <img src="assets/images/banner-right-image.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="services" id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <h6>Our Services</h6>
            <h4>Provided <em>Services</em></h4>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="owl-service-item owl-carousel">
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="assets/images/service-icon-01.png" alt="">
                </div>
                <h4>Useful Tricks</h4>
                <p>EduWell is the professional Academy for your journey to learning programming languages!</p>
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="assets/images/service-icon-02.png" alt="">
                </div>
                <h4>Creative Ideas</h4>
                <p>You can download and use EduWell courses for different programming Languages.</p>
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="assets/images/service-icon-03.png" alt="">
                </div>
                <h4>Ready Target</h4>
                <p>Please tell your friends about the best online Academy that is EduWell.</p>
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="assets/images/service-icon-04.png" alt="">
                </div>
                <h4>Technology</h4>
                <p>We are specialised in bringing the best material and visualisation.</p>
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="assets/images/service-icon-01.png" alt="">
                </div>
                <h4>Useful Tricks</h4>
                <p>EduWell is the professional Academy for your journey to learning programming languages!</p>
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="assets/images/service-icon-02.png" alt="">
                </div>
                <h4>Useful experience</h4>
                <p>We offer our experience to your cause in a difficult but noble journey.</p>
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="assets/images/service-icon-03.png" alt="">
                </div>
                <h4>Specialized Mentors.</h4>
                <p>All our Mentors are specialized in the software Engineering field and ready to share everything they know with you.</p>
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="assets/images/service-icon-04.png" alt="">
                </div>
                <h4>Technology</h4>
                <p>Aenean bibendum consectetur ex eu porttitor. Pellentesque id ultrices metus.</p>
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="assets/images/service-icon-01.png" alt="">
                </div>
                <h4>Useful Tricks</h4>
                <p>In non nisi eget magna efficitur ultricies non quis sapien. Pellentesque tellus.</p>
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="assets/images/service-icon-02.png" alt="">
                </div>
                <h4>Creative Ideas</h4>
                <p>Aenean bibendum consectetur ex eu porttitor. Pellentesque id ultrices metus.</p>
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="assets/images/service-icon-03.png" alt="">
                </div>
                <h4>Ready Target</h4>
                <p>In non nisi eget magna efficitur ultricies non quis sapien. Pellentesque tellus.</p>
              </div>
            </div>
            <div class="item">
              <div class="service-item">
                <div class="icon">
                  <img src="assets/images/service-icon-04.png" alt="">
                </div>
                <h4>Technology</h4>
                <ge>EduWell is the professional Academy for your journey to learning programming languages!</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="our-courses" id="courses">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading">
            <h6>OUR SERVICES</h6>
            <h4>What action you can <em>Take</em></h4>
            <p>We have created this easy shortcurts to help you navigate easily.</p>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="naccs">
            <div class="tabs">
              <div class="row">
                <div class="col-lg-3">
                  <div class="menu">
                    <div class="active gradient-border"><span>Create a new course</span></div>
                    <div class="gradient-border"><span>See all my Course details.</span></div>
                    <div class="gradient-border"><span>Modify my course.</span></div>
                    <div class="gradient-border"><span>Delete my course.</span></div>
                  </div>
                </div>
                <div class="col-lg-9">
                  <ul class="nacc">
                    <li class="active">
                      <div>
                        <div class="left-image">
                          <img src="assets/images/courses-01.jpg" alt="">
                          <div class="price"><h6>Create</h6></div>
                        </div>
                        <div class="right-content">
                          <h4>Create a new course</h4>
                          <p>We have ensured that the creation process for a new course will be easy and quick. 
                          <br><br>You will be required to fill only the most important details for this process.</p>
                          <span>30-60 minutes</span>
                          <span>Safe</span>
                          <span class="last-span">Easy</span>
                          <div class="text-button">
                            <a href="create.php">Create Course</a>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="left-image">
                          <img src="assets/images/courses-02.jpg" alt="">
                          <div class="price"><h6>Read</h6></div>
                        </div>
                        <div class="right-content">
                          <h4>Visit my Course and all the details.</h4>
                          <p>This redirection takes you to the complete details of your course and its forensics.<br><br>Take a quick look from time to time to ensure everything is as you wish.</p>
                          <span>10-20 minutes</span>
                          <span>Quick</span>
                          <span class="last-span">Detailed</span>
                          <div class="text-button">
                            <a href="see-course.php">Read Course</a>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="left-image">
                          <img src="assets/images/courses-03.jpg" alt="">
                          <div class="price"><h6>Update</h6></div>
                        </div>
                        <div class="right-content">
                          <h4>Modify my Course.</h4>
                          <p>Courses change from time to time so don't be shy, take your time.<br><br>Don't forget to save all the changes and do not leave if you are not sure that the progress has been saved.</p>
                          <span>20-35 minutes</span>
                          <span>Intuitive</span>
                          <span class="last-span">Interactive</span>
                          <div class="text-button">
                            <a href="see-course.php">Modify Course</a>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="left-image">
                          <img src="assets/images/courses-04.jpg" alt="">
                          <div class="price"><h6>Delete</h6></div>
                        </div>
                        <div class="right-content">
                          <h4>Delete your course</h4>
                          <p>Be careful, if you delete a course this action cannot be undone, so do so only when you are absolutely sure you do not need it anymore.<br>
                          <br>We recommend having the course inactive for at least 2 months by any Student, so it is safe to delete.</p>
                          <span>5-10 minutes</span>
                          <span>Unchangaeble</span>
                          <span class="last-span">Versatile</span>
                          <div class="text-button">
                            <a href="see-course.php">Delete Course</a>
                          </div>
                        </div>
                      </div>
                      </li>
                    </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="simple-cta">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 offset-lg-1">
          <div class="left-image">
            <img src="assets/images/cta-left-image.png" alt="">
          </div>
        </div>
        <div class="col-lg-5 align-self-center">
          <h6>Get the sale right now!</h6>
          <h4>Up to 25% OFF For 1+ courses</h4>
          <p>Pile up all your courses in one go and profit of our sales for more than one course choosen at the same time.</p>
          <div class="white-button">
            <a href="index.php">View Courses</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="testimonials" id="testimonials">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <h6>Testimonials</h6>
            <h4>What They <em>Think</em></h4>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="owl-testimonials owl-carousel" style="position: relative; z-index: 5;">
            <div class="item">
              <p>“just think about EduWell if you need a great Programming Language course.”</p>
                <h4>Catherine Walk</h4>
                <span>Former &amp; EduWell user</span>
                <img src="assets/images/quote.png" alt="">
            </div>
            <div class="item">
              <p>“think about our website first when you need great discounts on more than one program.”</p>
                <h4>Martin Vila</h4>
                <span>Founder</span>
                <img src="assets/images/quote.png" alt="">
            </div>
            <div class="item">
              <p>“just think about our website wherever you need a storage  for your course”</p>
                <h4>Sophia Whity</h4>
                <span>CEO and Co-Founder</span>
                <img src="assets/images/quote.png" alt="">
            </div>
            <div class="item">
              <p>“think about our website first when you need great discounts on more than one program.”</p>
                <h4>Helen Shiny</h4>
                <span>Tech Officer</span>
                <img src="assets/images/quote.png" alt="">
            </div>
            <div class="item">
              <p>“think about our website first when you need great discounts on more than one program.”</p>
                <h4>George Soft</h4>
                <span>Gadget Reviewer</span>
                <img src="assets/images/quote.png" alt="">
            </div>
            <div class="item">
              <p>“think about our website first when you need great discounts on more than one program..”</p>
                <h4>Andrew Hall</h4>
                <span>Marketing Manager</span>
                <img src="assets/images/quote.png" alt="">
            </div>
            <div class="item">
              <p>“Praesent accumsan condimentum arcu, id porttitor est semper nec. Nunc diam lorem.”</p>
                <h4>Maxi Power</h4>
                <span>Fashion Designer</span>
                <img src="assets/images/quote.png" alt="">
            </div>
            <div class="item">
              <p>“think about our website first when you need great discounts on more than one program.”</p>
                <h4>Olivia Too</h4>
                <span>Creative Designer</span>
                <img src="assets/images/quote.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="contact-us" id="contact-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div id="map">

            <!-- You just need to go to Google Maps for your own map point, and copy the embed code from Share -> Embed a map section -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d10150.37473154084!2d19.816819528123418!3d41.326151293503486!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1742485876143!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div class="row">
              <div class="col-lg-4 offset-lg-1">
                <div class="contact-info">
                  <div class="icon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <h4>Phone</h4>
                  <span>+35586749390</span>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="contact-info">
                  <div class="icon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <h4>Mobile</h4>
                  <span>+355894349393</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php

$courseName = "Introduction to Web Development";
$courseEmail = "webdev@example.com"; // maybe course instructor email
$courseDescription = "Learn the basics of HTML, CSS, and JavaScript.";
?>

<div class="col-lg-4">
  <form id="contact" action="update_course.php" method="post">
    <div class="row">
      <div class="col-lg-12">
        <div class="section-heading">
          <h6>Send a Course idea</h6>
          <h4>We will <em>review it for you</em></h4>
          <p>We will get back at you with great ideas for improvments</p>
        </div>
      </div>
      <div class="col-lg-12">
        <fieldset>
          <input type="text" name="name" id="name" placeholder="Course Name" value="<?= htmlspecialchars($courseName) ?>" required>
        </fieldset>
      </div>
      <div class="col-lg-12">
        <fieldset>
          <input type="email" name="email" id="email" placeholder="Instructor Email" value="<?= htmlspecialchars($courseEmail) ?>" required>
        </fieldset>
      </div>
      <div class="col-lg-12">
        <fieldset>
          <textarea name="message" id="message" placeholder="Course Description"><?= htmlspecialchars($courseDescription) ?></textarea>
        </fieldset>
      </div>
      <div class="col-lg-12">
        <fieldset>
          <button type="submit" id="form-submit" class="main-gradient-button">Send</button>
        </fieldset>
      </div>
    </div>
  </form>
</div>

        <?php

include("footer.php");
?>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/tabs.js"></script>
    <script src="assets/js/video.js"></script>
    <script src="assets/js/slick-slider.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>
        //according to loftblog tut
        $('.nav li:first').addClass('active');

        var showSection = function showSection(section, isAnimate) {
          var
          direction = section.replace(/#/, ''),
          reqSection = $('.section').filter('[data-section="' + direction + '"]'),
          reqSectionPos = reqSection.offset().top - 0;

          if (isAnimate) {
            $('body, html').animate({
              scrollTop: reqSectionPos },
            800);
          } else {
            $('body, html').scrollTop(reqSectionPos);
          }

        };

        var checkSection = function checkSection() {
          $('.section').each(function () {
            var
            $this = $(this),
            topEdge = $this.offset().top - 80,
            bottomEdge = topEdge + $this.height(),
            wScroll = $(window).scrollTop();
            if (topEdge < wScroll && bottomEdge > wScroll) {
              var
              currentId = $this.data('section'),
              reqLink = $('a').filter('[href*=\\#' + currentId + ']');
              reqLink.closest('li').addClass('active').
              siblings().removeClass('active');
            }
          });
        };

        $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function (e) {
          e.preventDefault();
          showSection($(this).attr('href'), true);
        });

        $(window).scroll(function () {
          checkSection();
        });
    </script>
    <script>
document.addEventListener("DOMContentLoaded", function() {
    if (window.location.hash) {
        let target = document.querySelector(window.location.hash);
        if (target) {
            setTimeout(() => {
                target.scrollIntoView({ behavior: "smooth" });
            }, 300); // Small delay to allow page loading
        }
    }
});
</script>

</body>

</html>