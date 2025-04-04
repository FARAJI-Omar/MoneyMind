@include('layouts.app')

<div style="display: flex; justify-content: space-between; align-items: center; overflow: hidden; background-color: #180e5b; padding: 50px 0; position: relative;">
    <canvas id="hero-particles-canvas" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 0;"></canvas>
    <div style="flex: 1; padding: 20px; text-align: center; position: relative; z-index: 1;">
        <h1 style="font-family: 'Poppins', sans-serif; font-weight: 700; font-size: 36px; color: white;">Welcome to MoneyMind</h1>
        <p style="font-family: 'Poppins', sans-serif; font-size: 18px; color: white; margin-top: 20px;">
            Manage your finances with ease and achieve your financial goals with MoneyMind.
        </p>
        <a href="{{ route('dashboard') }}" style="display: inline-block; margin-top: 30px; padding: 12px 30px; background-color: #00bbf0; color: white; font-family: 'Poppins', sans-serif; font-weight: 600; border-radius: 8px; text-decoration: none; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(0,187,240,0.3);" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
            Get Started
        </a>
    </div>
    <div style="flex: 1; display: flex; justify-content: center; align-items: center; animation: float 3s ease-in-out infinite; position: relative; z-index: 1;">
        <img src="{{ asset('images/slider-img.png') }}" alt="Financial Growth" style="width: 400px; height: auto;">
    </div>
</div>

<!-- service section -->
<section class="service_section layout_padding" style="background-color: #f8fafc; padding: 80px 0;">
    <div class="service_container">
        <div class="container" style="padding: 0 100px;">
            <div class="heading_container heading_center" style="margin-bottom: 60px; text-align: center;">
                <h2 style="font-family: 'Poppins', sans-serif; font-weight: 700; color: #180e5b; font-size: 1.8rem; margin-bottom: 20px;">
                    Our <span style="color: #00bbf0; position: relative;">Services
                        <span style="position: absolute; bottom: -5px; left: 0; width: 100%; height: 3px; background-color: #00bbf0; border-radius: 2px;"></span>
                    </span>
                </h2>
                <p style="font-family: 'Poppins', sans-serif; font-size: 1.1rem; color: #64748b; max-width: 600px; margin: 0 auto;">
                    Discover our comprehensive suite of financial management tools designed to help you achieve your financial goals.
                </p>
            </div>
            <div style="display: flex; justify-content: space-between; gap: 30px;">
                <div class="box" style="text-align: center; flex: 1; background: white; padding: 40px 25px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); transition: all 0.3s ease; cursor: pointer;" onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 15px 35px rgba(0,0,0,0.1)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 30px rgba(0,0,0,0.05)'">
                    <div class="img-box" style="margin-bottom: 25px; background-color: #e8f7fc; width: 100px; height: 100px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 25px; transition: all 0.3s ease;">
                        <img src="{{ asset('images/ex track.png') }}" alt="Expense Tracking" style="width: 50px; height: auto;">
                    </div>
                    <div class="detail-box">
                        <h5 style="font-family: 'Poppins', sans-serif; font-weight: 600; color: #180e5b; font-size: 1.25rem; margin-bottom: 15px;">
                            Smart Expense Tracking
                        </h5>
                        <p style="font-family: 'Poppins', sans-serif; font-size: 0.95rem; color: #64748b; line-height: 1.6;">
                            Easily track your expenses and income with automated categorization and recurring payment management.
                        </p>
                    </div>
                </div>

                <div class="box" style="text-align: center; flex: 1; background: white; padding: 40px 25px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); transition: all 0.3s ease; cursor: pointer;" onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 15px 35px rgba(0,0,0,0.1)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 30px rgba(0,0,0,0.05)'">
                    <div class="img-box" style="margin-bottom: 25px; background-color: #e8f7fc; width: 100px; height: 100px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 25px; transition: all 0.3s ease;">
                        <img src="{{ asset('images/ai insights.png') }}" alt="AI Insights" style="width: 50px; height: auto;">
                    </div>
                    <div class="detail-box">
                        <h5 style="font-family: 'Poppins', sans-serif; font-weight: 600; color: #180e5b; font-size: 1.25rem; margin-bottom: 15px;">
                            AI-Powered Insights
                        </h5>
                        <p style="font-family: 'Poppins', sans-serif; font-size: 0.95rem; color: #64748b; line-height: 1.6;">
                            Get personalized financial advice and budget optimization suggestions powered by Gemini AI technology.
                        </p>
                    </div>
                </div>

                <div class="box" style="text-align: center; flex: 1; background: white; padding: 40px 25px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); transition: all 0.3s ease; cursor: pointer;" onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 15px 35px rgba(0,0,0,0.1)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 30px rgba(0,0,0,0.05)'">
                    <div class="img-box" style="margin-bottom: 25px; background-color: #e8f7fc; width: 100px; height: 100px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 25px; transition: all 0.3s ease;">
                        <img src="{{ asset('images/saving goal.png') }}" alt="Goals & Wishlist" style="width: 50px; height: auto;">
                    </div>
                    <div class="detail-box">
                        <h5 style="font-family: 'Poppins', sans-serif; font-weight: 600; color: #180e5b; font-size: 1.25rem; margin-bottom: 15px;">
                            Goals & Wishlist
                        </h5>
                        <p style="font-family: 'Poppins', sans-serif; font-size: 0.95rem; color: #64748b; line-height: 1.6;">
                            Set and track savings goals while managing your wishlist items to make informed purchasing decisions.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end service section -->

<!-- about section -->
<section class="about_section layout_padding" style="background: linear-gradient(135deg, #180e5b 0%, #1a237e 100%); padding: 80px 0; color: white; position: relative; overflow: hidden;">
    <canvas id="about-particles-canvas" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 0;"></canvas>
    <div class="container" style="padding: 0 100px; position: relative; z-index: 1;">
        <div class="heading_container heading_center" style="margin-bottom: 60px; text-align: center;">
            <h2 style="font-family: 'Poppins', sans-serif; font-weight: 700; font-size: 1.8rem; color: white; margin-bottom: 20px;">
                Our <span style="color: #00bbf0; position: relative;">Mission
                    <span style="position: absolute; bottom: -5px; left: 0; width: 100%; height: 3px; background-color: #00bbf0; border-radius: 2px;"></span>
                </span>
            </h2>
        </div>
        <div class="row" style="display: flex; align-items: center;">
            <div class="col-md-6" style="text-align: left; padding-right: 40px;">
                <div class="detail-box">
                    <h3 style="font-family: 'Poppins', sans-serif; font-weight: 600; color: #00bbf0; font-size: 2rem; margin-bottom: 25px; text-align: left;">
                        Your Financial Journey Starts Here
                    </h3>
                    <p style="font-family: 'Poppins', sans-serif; font-size: 1rem; color: #e2e8f0; line-height: 1.8; margin-bottom: 20px; text-align: left;">
                        MoneyMind is more than just a financial management tool - it's your personal financial companion. We combine cutting-edge technology with user-friendly design to help you master your money. Whether you're saving for a dream vacation, planning for retirement, or simply wanting better control of your spending, we've got you covered.
                    </p>
                    <p style="font-family: 'Poppins', sans-serif; font-size: 1rem; color: #e2e8f0; line-height: 1.8; margin-bottom: 30px; text-align: left;">
                        Our AI-powered insights provide personalized recommendations, while our intuitive tracking tools make managing your finances effortless. Experience the perfect blend of innovation and simplicity as you take control of your financial future with MoneyMind.
                    </p>
                    <a href="{{ route('about') }}" style="display: inline-block; margin-top: 30px; padding: 12px 30px; background-color: #00bbf0; color: white; font-family: 'Poppins', sans-serif; font-weight: 600; border-radius: 8px; text-decoration: none; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(0,187,240,0.3);" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                        Learn More About Us
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="video-box" style="position: relative; width: 100%; margin-left: auto; border-radius: 20px; overflow: hidden; box-shadow: 0 20px 40px rgba(0,0,0,0.2);">
                    <video
                        autoplay
                        muted
                        playsinline
                        style="width: 100%; height: auto; border-radius: 20px; display: block;"
                        id="aboutVideo"
                    >
                        <source src="{{ asset('images/moneymind video.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(45deg, rgba(0,187,240,0.2) 0%, rgba(24,14,91,0.2) 100%); border-radius: 20px; pointer-events: none;"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end about section -->

<script>
    // Only keeping video playback logic
    const video = document.getElementById('aboutVideo');
    if (video) {
        video.playbackRate = 0.8;
        video.addEventListener('ended', function() {
            setTimeout(() => video.play(), 2000);
        });
    }
</script>

<style>
    @keyframes float {
        0% {
            transform: translateY(0px);
        }
        50% {
            transform: translateY(-20px);
        }
        100% {
            transform: translateY(0px);
        }
    }

    /* Keep existing hover effects for boxes */
    .box:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    }

    .box .img-box {
        transition: all 0.3s ease;
    }

    .box:hover .img-box {
        transform: scale(1.1) rotate(5deg);
        background-color: #00bbf0;
    }

    .box:hover img {
        filter: brightness(0) invert(1);
    }
</style>

<script src="{{ asset('js/hero-particles.js') }}"></script>
<script src="{{ asset('js/about-particles.js') }}"></script>

@include('layouts.footer')
