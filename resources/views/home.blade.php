<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/png">


        <!--=============== REMIXICONS ===============-->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        
        <!--=============== SWIPER CSS ===============-->
        <link href="{{ asset('css/swiper-bundle.min.css') }}" rel="stylesheet">

        <!--=============== CSS ===============-->
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

        <title>TRUNG TÂM TIN HỌC</title>
    </head>
    <body>
        <header class="header" id="header">
    <nav class="nav container">
        <a href="#" class="nav__logo">TRƯỜNG ĐẠI HỌC CỬU LONG</a>

        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                <li class="nav__item">
                    <a href="#home" class="nav__link active-link">Home</a>
                </li>
                <li class="nav__item">
                    <a href="#about" class="nav__link">About</a>
                </li>
                <li class="nav__item">
                    <a href="#discover" class="nav__link">Discover</a>
                </li>
                <li class="nav__item">
                    <a href="#place" class="nav__link">Places</a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Đăng xuất</button>
                </form>
                
            </ul>

            <div class="nav__dark">
                <!-- Theme change button -->
                <span class="change-theme-name">Dark mode</span>
                <i class="ri-moon-line change-theme" id="theme-button"></i>
            </div>

            <i class="ri-close-line nav__close" id="nav-close"></i>
        </div>

        <div class="nav__toggle" id="nav-toggle">
            <i class="ri-function-line"></i>
        </div>
    </nav>
</header>
 

        <main class="main">
            <!--==================== HOME ====================-->
            <section class="home" id="home">
                <img src="img/dhcl.jpg" alt="" class="home__img">

                <div class="home__container container grid">
                    

                    <div class="home__social">
                        <a href="https://www.facebook.com/" target="_blank" class="home__social-link">
                            <i class="ri-facebook-box-fill"></i>
                        </a>
                        <a href="https://www.instagram.com/" target="_blank" class="home__social-link">
                            <i class="ri-instagram-fill"></i>
                        </a>
                        <a href="https://twitter.com/" target="_blank" class="home__social-link">
                            <i class="ri-twitter-fill"></i>
                        </a>
                    </div>

                    <div class="home__info">
                        <div>
                            <span class="home__info-title"></span>
                            <a href="" class="button button--flex button--link home__info-button">
                                More <i class="ri-arrow-right-line"></i>
                            </a>
                        </div>

                        <div class="home__info-overlay">
                            <img src="img/logodhcl.jpg" alt="" class="home__info-img">
                        </div>
                    </div>
                </div>
            </section>

            <!--==================== ABOUT ====================-->
            <section class="about section" id="about">
                <div class="about__container container grid">
                    <div class="about__data">
                        <h2 class="section__title about__title">THÔNG BÁO THI CHỨNG CHỈ ỨNG DỤNG CNTT NĂM 2024</h2>
                        <p class="about__description">Lệ phí dự thi:
                            - Chứng chỉ Ứng dụng CNTT Cơ bản: 300.000 VNĐ
                            - Chứng chỉ Ứng dụng CNTT Nâng cao: 350.000 VNĐ <BR>
                     - Lệ phí Ôn thi 2 buổi:
                        - CNTT cơ bản 300.000 VNĐ
                        - CNTT nâng cao 350.000 VNĐ (học online)<BR>
                    - Thí sinh nhận thông tin dự thi qua tin nhắn SMS trước ngày thi 02 ngày.<BR>
                    - Thí sinh có mặt trước thời gian thi 15 phút tại đúng địa điểm thi.<BR>
                    - Mang theo CMND/ CCCD/ Hộ chiếu/ Thẻ HSSV/ Giấy tờ tùy thân khác (có ảnh) khi dự thi.<BR>
                    - Thí sinh có thể xem điểm thi trên trang web: https://mku.edu.vn/ hoặc tại các địa điểm ghi danh kể từ ngày công bố kết quả (Hotline: 0902 44 91 98).<BR>
                    - Thí sinh khi có kết quả Đạt, sau 3 tuần (kể từ ngày có kết quả) sẽ được trung tâm thông báo SMS đến nhận chứng chỉ.
                        </p>
                        <a href="registration" class="button">FROM ĐĂNG KÍ</a>
                    </div>

                    <div class="about__img">
                        <div class="about__img-overlay">
                            <img src="image/CB truoc.jpg" alt="" class="about__img-two">
                        </div>

                        <div class="about__img-overlay">
                            <img src="image/CB sau.jpg" alt="" class="about__img-two">
                        </div>
                    </div>
                </div>
            </section>
            <div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
                
                <img src="image/thongbao1.jpg" alt="" style="max-width: 100%; max-height: 100vh;">
            </div>

            
            <!--==================== DISCOVER ====================-->
            <section class="discover section" id="discover">
                <h2 class="section__title"> MỘT SỐ HÌNH ẢNH VỀ TRUNG TÂM    </h2>
                
                <div class="discover__container container swiper-container">
                    <div class="swiper-wrapper">
                        <!--==================== DISCOVER 1 ====================-->
                        <div class="discover__card swiper-slide">
                            <img src="img/hinh1.jpg" alt="" class="discover__img" style="object-fit: cover; width: 100%; height: 100%;">
                            <div class="discover__data">
                                
                            </div>
                        </div>
                
                        <!--==================== DISCOVER 2 ====================-->
                        <div class="discover__card swiper-slide">
                            <img src="img/hinh2.jpg" alt="" class="discover__img" style="object-fit: cover; width: 100%; height: 100%;">
                            <div class="discover__data">
                                
                            </div>
                        </div>
                
                        <!--==================== DISCOVER 3 ====================-->
                        <div class="discover__card swiper-slide">
                            <img src="img/hinh3.jpg" alt="" class="discover__img" style="object-fit: cover; width: 100%; height: 100%;">
                            <div class="discover__data">
                                
                            </div>
                        </div>
                
                        <!--==================== DISCOVER 4 ====================-->
                        <div class="discover__card swiper-slide">
                            <img src="img/hinh4.jpg" alt="" class="discover__img" style="object-fit: cover; width: 100%; height: 100%;">
                            <div class="discover__data">
                                
                            </div>
                        </div>
                    </div>
                </div>
                
            </section>

            {{-- <!--==================== EXPERIENCE ====================-->
            <section class="experience section">
                <h2 class="section__title">THÔNG BÁO</h2>

                <div class="experience__container container grid">
                    

                    <div class="experience__img grid">
                        <div class="experience__overlay" style="height: 100%; display: flex; justify-content: center; align-items: center;">
                            <img src="image/thongbao1.jpg" alt="" style="max-width: 100%; max-height: 100%;">
                        </div>
                        
                        
                       
                    </div>
                </div>
            </section> --}}
           
            

            <!--==================== VIDEO ====================-->
            <section class="video section">
                <h2 class="section__title">Video </h2>

                <div class="video__container container">
                

                    <div class="video__content">
                        <video id="video-file">
                            <source src="video/video.mp4" type="video/mp4">
                        </video>

                        <button class="button button--flex video__button" id="video-button">
                            <i class="ri-play-line video__button-icon" id="video-icon"></i>
                        </button>
                    </div>
                </div>
            </section>

            

            
            
            <!--==================== SPONSORS ====================-->
           
        </main>

        <!--==================== FOOTER ====================-->
        <footer class="footer section">
            <div class="footer__container container grid">
                <div class="footer__content grid">
                    <div class="footer__data">
                        <h3 class="footer__title">Kênh thông tin ĐHCL</h3>
                        <p class="footer__description">Các kênh thông tin đang hoạt động chính thức của trường Đại học Cửu Long trên mạng xã hội: Facebook, Zalo, Youtube,…
                        </p>
                        <div>
                            <a href="https://www.facebook.com/" target="_blank" class="footer__social">
                                <i class="ri-facebook-box-fill"></i>
                            </a>
                            <a href="https://twitter.com/" target="_blank" class="footer__social">
                                <i class="ri-twitter-fill"></i>
                            </a>
                            <a href="https://www.instagram.com/" target="_blank" class="footer__social">
                                <i class="ri-instagram-fill"></i>
                            </a>
                            <a href="https://www.youtube.com/" target="_blank" class="footer__social">
                                <i class="ri-youtube-fill"></i>
                            </a>
                        </div>
                    </div>
    
                    <div class="footer__data">
                        <h3 class="footer__subtitle">Liên kết Website</h3>
                        <ul>
                            <li class="footer__item">
                                <a href="" class="footer__link">XÉT TUYỂN TRỰC TUYẾN</a>
                            </li>
                            <li class="footer__item">
                                <a href="" class="footer__link">CỔNG THÔNG TIN SINH VIÊN</a>
                            </li>
                            <li class="footer__item">
                                <a href="" class="footer__link">ĐÀO TẠO TỪ XA</a>
                            </li>
                        </ul>
                    </div>
    
                    <div class="footer__data">
                        <h3 class="footer__subtitle">Thông tin liên hệ</h3>
                        <ul>
                            <li class="footer__item">
                                <a href="" class="footer__link">QL1A, Phú Quới, Long Hồ, Vĩnh Long </a>
                            </li>
                            <li class="footer__item">
                                <a href="" class="footer__link">ĐT 1: 02703831155 (Phòng Hành Chính)</a>
                            </li>
                            <li class="footer__item">
                                <a href="" class="footer__link">ĐT 2: 02703832538 (Phòng Tuyển Sinh)</a>
                            </li>
                        </ul>
                    </div>
    
                    <div class="footer__data">
                        <h3 class="footer__subtitle">Thông tin hổ trợ</h3>
                        <ul>
                            <li class="footer__item">
                                <a href="" class="footer__link">FAQs</a>
                            </li>
                            <li class="footer__item">
                                <a href="" class="footer__link">Support Center</a>
                            </li>
                            <li class="footer__item">
                                <a href="" class="footer__link">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="footer__rights">
                    <p class="footer__copy">&#169; Bản quyền thuộc về TRƯỜNG ĐẠI HỌC CỬU LONG<br>
                        Quốc lộ 1A xã Phú Quới huyện Long Hồ tỉnh Vĩnh Long</p>
                    
                </div>
            </div>
        </footer>

         <!--========== SCROLL UP ==========-->
        <a href="#" class="scrollup" id="scroll-up">
            <i class="ri-arrow-up-line scrollup__icon"></i>
        </a>

                <!--=============== SCROLL REVEAL===============-->
        <script src="{{ asset('js/scrollreveal.min.js') }}"></script>

        <!--=============== SWIPER JS ===============-->
        <script src="{{ asset('js/swiper-bundle.min.js') }}"></script>

        <!--=============== MAIN JS ===============-->
        <script src="{{ asset('js/main.js') }}"></script>

    </body>
</html>