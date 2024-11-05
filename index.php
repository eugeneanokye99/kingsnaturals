<?php
    if (!isset($_COOKIE['uid'])) {
        header("Location: src/register.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "metatags.php"; ?>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body id="homepage">
    <!---------------------- NAVBAR ------------------------------>
    <?php include "navbar.php"; ?>

    <!---------------------- HOME ------------------------------>
    <section class="home" id="home">
        <div class="home-container">
            <!-- Swiper -->
            <div class="swiper mySwiper home-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide slide1">
                        <div class="content">
                            <h1>Ghana's best hair product</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo voluptatem eligendi maiores vero repudiandae et, inventore similique cumque ducimus eos.
                            </p>
                            <form action="" class="home-search">
                                <input type="text" name="search" id="" placeholder="Search here">
                                <button type="submit" class="btn"><span class="lnr lnr-magnifier"></span></button>
                            </form>
                        </div>
                    </div>
                    <div class="swiper-slide slide2">
                        <div class="content">
                            <h1>Ghana's best hair product</h1>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Impedit in repudiandae possimus dolorem veritatis, eligendi ut dignissimos laborum soluta maxime.
                            </p>
                            <form action="" class="home-search">
                                <input type="text" name="search" class="search" placeholder="Search here">
                                <button type="submit" class="btn"><span class="lnr lnr-magnifier"></span></button>
                            </form>
                        </div>
                    </div>
                    <div class="swiper-slide slide3">
                        <div class="content">
                            <h1>Ghana's best hair product</h1>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ea earum recusandae iusto quod corporis temporibus quae ipsa quos laborum totam.
                            </p>
                            <form action="" class="home-search">
                                <input type="text" name="search" class="search" placeholder="Search here">
                                <button type="submit" class="btn"><span class="lnr lnr-magnifier"></span></button>
                            </form>
                        </div>
                    </div>
                    <div class="swiper-slide slide4">
                        <div class="content">
                            <h1>Ghana's best hair product</h1>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel sed totam exercitationem similique voluptas, explicabo labore voluptate ipsa voluptatem architecto.
                            </p>
                            <form action="" class="home-search">
                                <input type="text" name="search" class="search" placeholder="Search here">
                                <button type="submit" class="btn"><span class="lnr lnr-magnifier"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </section>

    <!---------------------- ABOUT ------------------------------>
    <section class="about" id="about">
        <div class="container about-container">
            <div class="left">
                <div class="content">
                    <div class="title">
                        <h2>Name of Professionals</h2>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labor
                        e et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                        nisi ut aliquip ex ea commodo consequat. Duis aut
                        e irure dolor in reprehenderit in voluptate velit esse
                    </p>
                    <button class="btn">Learn more</button>
                </div>
            </div>
            <div class="right">
                <div class="image">
                    <img src="assets/IMG-20241002-WA0009.jpg" alt="Kings Olive image">
                </div>
            </div>
        </div>
    </section>


    <!---------------------- SERVICES ------------------------------>
    <section class="services" id="services">
        <div class="title">
            <h2>Our Hair Product Services</h2>
        </div>
        <div class="container services-container">
            <div class="col">
                <img src="assets/b1.jpg" alt="services1">
                <div class="info">
                    <h4>Daily Makeup</h4>
                    <ul>
                        <li>$40.00</li>
                        <li class="dis">$60.00</li>
                    </ul>
                    <a href="">Book Service</a>
                </div>
            </div>
            <div class="col">
                <div class="info">
                    <h4>Daily Makeup</h4>
                    <ul>
                        <li>$40.00</li>
                        <li class="dis">$60.00</li>
                    </ul>
                    <a href="">Book Service</a>
                </div>
                <img src="assets/bg2.jpg" alt="">
            </div>
            <div class="col">
                <img src="assets/bg3.jpg" alt="">
                <div class="info">
                    <h4>Daily Makeup</h4>
                    <ul>
                        <li>$40.00</li>
                        <li class="dis">$60.00</li>
                    </ul>
                    <a href="">Book Service</a>
                </div>
            </div>
            <div class="col">
                <div class="info">
                    <h4>Daily Makeup</h4>
                    <ul>
                        <li>$40.00</li>
                        <li class="dis">$60.00</li>
                    </ul>
                    <a href="">Book Service</a>
                </div>
                <img src="assets/b1.jpg" alt="">
            </div>
        </div>
    </section>


    <!---------------------- SHOP ------------------------------>
    <section class="shop" id="shop">
        <div class="title">
            <h2>Our Porducts</h2>
        </div>
        <div class="container shop-container">
            <!-- Swiper -->
            <div class="swiper mySwiper shop-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="box">
                            <div class="image">
                                <img src="assets/olive.png" alt="">
                                <div class="add">
                                    <span class="lnr lnr-cart"></span>
                                    <span class="lnr lnr-heart"></span>
                                    <span class="lnr lnr-magnifier"></span>
                                </div>
                            </div>
                        </div>
                        <div class="info">
                            <p>Hairer</p>
                            <p>Anti Natural and Hir growth Formula</p>
                            <p>$29.00</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="box">
                            <div class="image">
                                <img src="assets/kings.png" alt="">
                                <div class="add">
                                    <span class="lnr lnr-cart"></span>
                                    <span class="lnr lnr-heart"></span>
                                    <span class="lnr lnr-magnifier"></span>
                                </div>
                            </div>
                        </div>
                        <div class="info">
                            <p>Hairer</p>
                            <p>Anti Natural and Hir growth Formula</p>
                            <p>$29.00</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="box">
                            <div class="image">
                                <img src="assets/coconut_oil.png" alt="">
                                <div class="add">
                                    <span class="lnr lnr-cart"></span>
                                    <span class="lnr lnr-heart"></span>
                                    <span class="lnr lnr-magnifier"></span>
                                </div>
                            </div>
                        </div>
                        <div class="info">
                            <p>Hairer</p>
                            <p>Anti Natural and Hir growth Formula</p>
                            <p>$29.00</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="box">
                            <div class="image">
                                <img src="assets/pack.png" alt="">
                                <div class="add">
                                    <span class="lnr lnr-cart"></span>
                                    <span class="lnr lnr-heart"></span>
                                    <span class="lnr lnr-magnifier"></span>
                                </div>
                            </div>
                        </div>
                        <div class="info">
                            <p>Hairer</p>
                            <p>Anti Natural and Hir growth Formula</p>
                            <p>$29.00</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="box">
                            <div class="image">
                                <img src="assets/olive.png" alt="">
                                <div class="add">
                                    <span class="lnr lnr-cart"></span>
                                    <span class="lnr lnr-heart"></span>
                                    <span class="lnr lnr-magnifier"></span>
                                </div>
                            </div>
                        </div>
                        <div class="info">
                            <p>Hairer</p>
                            <p>Anti Natural and Hir growth Formula</p>
                            <p>$29.00</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="box">
                            <div class="image">
                                <img src="assets/kings.png" alt="">
                                <div class="add">
                                    <span class="lnr lnr-cart"></span>
                                    <span class="lnr lnr-heart"></span>
                                    <span class="lnr lnr-magnifier"></span>
                                </div>
                            </div>
                        </div>
                        <div class="info">
                            <p>Hairer</p>
                            <p>Anti Natural and Hir growth Formula</p>
                            <p>$29.00</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="box">
                            <div class="image">
                                <img src="assets/coconut_oil.png" alt="">
                                <div class="add">
                                    <span class="lnr lnr-cart"></span>
                                    <span class="lnr lnr-heart"></span>
                                    <span class="lnr lnr-magnifier"></span>
                                </div>
                            </div>
                        </div>
                        <div class="info">
                            <p>Hairer</p>
                            <p>Anti Natural and Hir growth Formula</p>
                            <p>$29.00</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="box">
                            <div class="image">
                                <img src="assets/pack.png" alt="">
                                <div class="add">
                                    <span class="lnr lnr-cart"></span>
                                    <span class="lnr lnr-heart"></span>
                                    <span class="lnr lnr-magnifier"></span>
                                </div>
                            </div>
                        </div>
                        <div class="info">
                            <p>Hairer</p>
                            <p>Anti Natural and Hir growth Formula</p>
                            <p>$29.00</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="box">
                            <div class="image">
                                <img src="assets/olive.png" alt="">
                                <div class="add">
                                    <span class="lnr lnr-cart"></span>
                                    <span class="lnr lnr-heart"></span>
                                    <span class="lnr lnr-magnifier"></span>
                                </div>
                            </div>
                        </div>
                        <div class="info">
                            <p>Hairer</p>
                            <p>Anti Natural and Hir growth Formula</p>
                            <p>$29.00</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="box">
                            <div class="image">
                                <img src="assets/kings.png" alt="">
                                <div class="add">
                                    <span class="lnr lnr-cart"></span>
                                    <span class="lnr lnr-heart"></span>
                                    <span class="lnr lnr-magnifier"></span>
                                </div>
                            </div>
                        </div>
                        <div class="info">
                            <p>Hairer</p>
                            <p>Anti Natural and Hir growth Formula</p>
                            <p>$29.00</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="box">
                            <div class="image">
                                <img src="assets/coconut_oil.png" alt="">
                                <div class="add">
                                    <span class="lnr lnr-cart"></span>
                                    <span class="lnr lnr-heart"></span>
                                    <span class="lnr lnr-magnifier"></span>
                                </div>
                            </div>
                        </div>
                        <div class="info">
                            <p>Hairer</p>
                            <p>Anti Natural and Hir growth Formula</p>
                            <p>$29.00</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="box">
                            <div class="image">
                                <img src="assets/pack.png" alt="">
                                <div class="add">
                                    <span class="lnr lnr-cart"></span>
                                    <span class="lnr lnr-heart"></span>
                                    <span class="lnr lnr-magnifier"></span>
                                </div>
                            </div>
                        </div>
                        <div class="info">
                            <p>Hairer</p>
                            <p>Anti Natural and Hir growth Formula</p>
                            <p>$29.00</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="box">
                            <div class="image">
                                <img src="assets/olive.png" alt="">
                                <div class="add">
                                    <span class="lnr lnr-cart"></span>
                                    <span class="lnr lnr-heart"></span>
                                    <span class="lnr lnr-magnifier"></span>
                                </div>
                            </div>
                        </div>
                        <div class="info">
                            <p>Hairer</p>
                            <p>Anti Natural and Hir growth Formula</p>
                            <p>$29.00</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="box">
                            <div class="image">
                                <img src="assets/kings.png" alt="">
                                <div class="add">
                                    <span class="lnr lnr-cart"></span>
                                    <span class="lnr lnr-heart"></span>
                                    <span class="lnr lnr-magnifier"></span>
                                </div>
                            </div>
                        </div>
                        <div class="info">
                            <p>Hairer</p>
                            <p>Anti Natural and Hir growth Formula</p>
                            <p>$29.00</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!---------------------- EXPERTS ------------------------------>
    <section class="experts">
        <div class="title">
            <h2>Our Experts</h2>
        </div>
        <div class="container experts-container">
            <div class="box">
                <div class="image">
                    <img src="assets/bg2.jpg" alt="">
                    <div class="social">
                        <i class="fa-brands fa-facebook"></i>
                        <i class="fa-brands fa-instagram"></i>
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-snapchat"></i>
                    </div>
                    <span></span>
                </div>
                <div class="info">
                    <h3>Jeffery Asante</h3>
                    <span>Executive Officer</span>
                    <div class="rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half"></i>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="image">
                    <img src="assets/bg3.jpg" alt="">
                    <div class="social">
                        <i class="fa-brands fa-facebook"></i>
                        <i class="fa-brands fa-instagram"></i>
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-snapchat"></i>
                    </div>
                    <span></span>
                </div>
                <div class="info">
                    <h3>Jeffery Asante</h3>
                    <span>Executive Officer</span>
                    <div class="rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="image">
                    <img src="assets/b1.jpg" alt="">
                    <div class="social">
                        <i class="fa-brands fa-facebook"></i>
                        <i class="fa-brands fa-instagram"></i>
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-snapchat"></i>
                    </div>
                    <span></span>
                </div>
                <div class="info">
                    <h3>Jeffery Asante</h3>
                    <span>Executive Officer</span>
                    <div class="rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half"></i>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="image">
                    <img src="assets/bg3.jpg" alt="">
                    <div class="social">
                        <i class="fa-brands fa-facebook"></i>
                        <i class="fa-brands fa-instagram"></i>
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-snapchat"></i>
                    </div>
                    <span></span>
                </div>
                <div class="info">
                    <h3>Jeffery Asante</h3>
                    <span>Executive Officer</span>
                    <div class="rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <!---------------------- TESTIMONIALS ------------------------------>
        <section class="testimonial">
        <div class="container testimonial-container">
            <div class="swiper mySwiper testimonial-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="quote">
                            <img src="assets/quote.png" alt="">
                        </div>
                        <div class="profile">
                            <img src="assets/bg3.jpg" alt="">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore ea repellat numquam
                                nihil voluptas error aut, ipsum illum libero incidunt, esse quas dolores neque
                                asperiores
                                fugiat dignissimos quod commodi. At!
                            </p>
                        </div>
                        <div class="dot">
                            <div class="rating">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star-half"></i>
                            </div>
                            <h4>Eugene Anokye</h4>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="quote">
                            <img src="assets/quote.png" alt="">
                        </div>
                        <div class="profile">
                            <img src="assets/b1.jpg" alt="">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore ea repellat numquam
                                nihil voluptas error aut, ipsum illum libero incidunt, esse quas dolores neque
                                asperiores
                                fugiat dignissimos quod commodi. At!
                            </p>
                        </div>
                        <div class="dot">
                            <div class="rating">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star-half"></i>
                            </div>
                            <h4>Eugene Anokye</h4>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="quote">
                            <img src="assets/quote.png" alt="">
                        </div>
                        <div class="profile">
                            <img src="assets/bg2.jpg" alt="">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore ea repellat numquam
                                nihil voluptas error aut, ipsum illum libero incidunt, esse quas dolores neque
                                asperiores
                                fugiat dignissimos quod commodi. At!
                            </p>
                        </div>
                        <div class="dot">
                            <div class="rating">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star-half"></i>
                            </div>
                            <h4>Eugene Anokye</h4>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    
    <!---------------------- BLOG ------------------------------>
    <section class="blog" id="blog">
        <div class="title">
            <h2>Our Blog</h2>
        </div>
        <div class="container blog-container">
            <div class="box">
                <div class="image">
                    <img src="assets/KN 10.jpg" alt="">
                    <div class="tag">
                        <span>20</span>
                        <s>JUN</s>
                    </div>
                </div>
                <div class="detail">
                    <h3>People's number one choice</h3>
                    <div class="respnc">
                        <span>222 <i class="fa-solid fa-thumbs-up"></i></span>
                        <span>42 <i class="fa-solid fa-comment"></i></span>
                    </div>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloremque deserunt iste,
                        veritatis distinctio quae consequuntur, voluptatum ad doloribus,
                        repellat assumenda harum nemo tempore rem officia nostrum voluptatibus adipisci mollitia iusto!
                    </p>
                </div>
            </div>
            <div class="box">
                <div class="image">
                    <img src="assets/KN 11.jpg" alt="">
                    <div class="tag">
                        <span>20</span>
                        <s>JUN</s>
                    </div>
                </div>
                <div class="detail">
                    <h3>People's number one choice</h3>
                    <div class="respnc">
                        <span>222 <i class="fa-solid fa-thumbs-up"></i></span>
                        <span>42 <i class="fa-solid fa-comment"></i></span>
                    </div>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloremque deserunt iste,
                        veritatis distinctio quae consequuntur, voluptatum ad doloribus,
                        repellat assumenda harum nemo tempore rem officia nostrum voluptatibus adipisci mollitia iusto!
                    </p>
                </div>
            </div>
            <div class="box">
                <div class="image">
                    <img src="assets/KN 8.jpg" alt="">
                    <div class="tag">
                        <span>20</span>
                        <s>JUN</s>
                    </div>
                </div>
                <div class="detail">
                    <h3>People's number one choice</h3>
                    <div class="respnc">
                        <span>222 <i class="fa-solid fa-thumbs-up"></i></span>
                        <span>42 <i class="fa-solid fa-comment"></i></span>
                    </div>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloremque deserunt iste,
                        veritatis distinctio quae consequuntur, voluptatum ad doloribus,
                        repellat assumenda harum nemo tempore rem officia nostrum voluptatibus adipisci mollitia iusto!
                    </p>
                </div>
            </div>
            <div class="box">
                <div class="image">
                    <img src="assets/KN 9.jpg" alt="">
                    <div class="tag">
                        <span>20</span>
                        <s>JUN</s>
                    </div>
                </div>
                <div class="detail">
                    <h3>People's number one choice</h3>
                    <div class="respnc">
                        <span>222 <i class="fa-solid fa-thumbs-up"></i></span>
                        <span>42 <i class="fa-solid fa-comment"></i></span>
                    </div>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloremque deserunt iste,
                        veritatis distinctio quae consequuntur, voluptatum ad doloribus,
                        repellat assumenda harum nemo tempore rem officia nostrum voluptatibus adipisci mollitia iusto!
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!---------------------- CONTACT ------------------------------>
    <section class="contact" id="contact">
        <div class="container contact-container">
            <div class="left col">
                <div class="title">
                    <h2>Get in touch</h2>
                </div>
                <form action="" class="contact-form">
                    <div class="form-name">
                        <input type="text" name="name" id="name" placeholder="Enter your full name">
                        <input type="email" name="email" id="email" placeholder="Enter your email">
                    </div>
                    <input type="text" name="subject" id="subject" placeholder="Subject">
                    <textarea name="Messages" id="Messages" cols="30" rows="10"
                        placeholder="Enter your Message"></textarea>
                    <button class="btn">Send Message <span></span></button>
                </form>
            </div>
            <div class="right col">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3971.1449616857876!2d-0.20965291978648729!3d5.545514166172896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfdf90be86c3f279%3A0x279e6044f9eca537!2sRawlings%20Park%2C%20Market%20Street%2C%20Accra!5e0!3m2!1sen!2sgh!4v1728141524000!5m2!1sen!2sgh"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam repellendus temporibus saepe cumque, modi voluptate.</p>
                    <span>Tel: 0244458439 | 0244261212
                        Email: myinfo@kings.com
                        Address: Kings Ventures, Makola-Accra Rawlings Park
                    </span>
            </div>
        </div>
    </section>


    <!---------------------- FOOTER ------------------------------>
    <?php include "footer.php"; ?>

    <div class="copyright">
        <p>copyright &copy; 2024 All rights reserved</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.linearicons.com/free/1.0.0/svgembedder.min.js"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="javascript/script.js"></script>
</body>

</html>