@include('layouts.app')

<div style="display: flex; justify-content: space-between; align-items: center; overflow: hidden; background-color: #180e5b; padding: 50px 0;">
    <div style="flex: 1; padding: 20px; text-align: center;">
        <h1 style="font-family: 'Poppins', sans-serif; font-weight: 700; font-size: 36px; color: white;">Welcome to MoneyMind</h1>
        <p style="font-family: 'Poppins', sans-serif; font-size: 18px; color: white; margin-top: 20px;">
            Manage your finances with ease and achieve your financial goals with MoneyMind.
        </p>
        <a href="{{ route('dashboard') }}" style="display: inline-block; margin-top: 30px; padding: 10px 20px; background-color: #00bbf0; color: white; font-family: 'Poppins', sans-serif; font-weight: 600; border-radius: 5px; text-decoration: none; transition: transform 0.3s ease-in-out;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
            Get Started
        </a>
    </div>
    <div style="flex: 1; display: flex; justify-content: center; align-items: center; animation: float 3s ease-in-out infinite;">
        <img src="{{ asset('images/slider-img.png') }}" alt="Financial Growth" style="width: 400px; height: auto;">
    </div>
</div>

<!-- service section -->
<section class="service_section layout_padding" style="background-color: #f9f9f9;">
    <div class="service_container">
        <div class="container">
            <div class="heading_container heading_center">
                <h2 style="font-family: 'Poppins', sans-serif; font-weight: 700; color: #180e5b;">
                    Our <span style="color: #00bbf0;">Services</span>
                </h2>
                <p style="font-family: 'Poppins', sans-serif; font-size: 16px; color: #5a5a5a;">
                    There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration.
                </p>
            </div>
            <div style="display: flex; justify-content: space-between;">
                <div class="box" style="text-align: center; flex: 1; margin: 0 10px;">
                    <div class="img-box">
                        <img src="{{ asset('images/moneymindicon.png') }}" alt="Currency Wallet" style="width: 80px; height: auto;">
                    </div>
                    <div class="detail-box">
                        <h5 style="font-family: 'Poppins', sans-serif; font-weight: 600; color: #3a3a3a;">
                            Currency Wallet
                        </h5>
                        <p style="font-family: 'Poppins', sans-serif; font-size: 14px; color: #5a5a5a;">
                            Fact that a reader will be distracted by the readable content of a page when looking at its layout.
                        </p>
                        <a href="" style="font-family: 'Poppins', sans-serif; font-weight: 600; color: #00bbf0;">
                            Read More
                        </a>
                    </div>
                </div>
                <div class="box" style="text-align: center; flex: 1; margin: 0 10px;">
                    <div class="img-box">
                        <img src="{{ asset('images/moneymindicon.png') }}" alt="Security Storage" style="width: 80px; height: auto;">
                    </div>
                    <div class="detail-box">
                        <h5 style="font-family: 'Poppins', sans-serif; font-weight: 600; color: #3a3a3a;">
                            Security Storage
                        </h5>
                        <p style="font-family: 'Poppins', sans-serif; font-size: 14px; color: #5a5a5a;">
                            Fact that a reader will be distracted by the readable content of a page when looking at its layout.
                        </p>
                        <a href="" style="font-family: 'Poppins', sans-serif; font-weight: 600; color: #00bbf0;">
                            Read More
                        </a>
                    </div>
                </div>
                <div class="box" style="text-align: center; flex: 1; margin: 0 10px;">
                    <div class="img-box">
                        <img src="{{ asset('images/moneymindicon.png') }}" alt="Expert Support" style="width: 80px; height: auto;">
                    </div>
                    <div class="detail-box">
                        <h5 style="font-family: 'Poppins', sans-serif; font-weight: 600; color: #3a3a3a;">
                            Expert Support
                        </h5>
                        <p style="font-family: 'Poppins', sans-serif; font-size: 14px; color: #5a5a5a;">
                            Fact that a reader will be distracted by the readable content of a page when looking at its layout.
                        </p>
                        <a href="" style="font-family: 'Poppins', sans-serif; font-weight: 600; color: #00bbf0;">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
            <div class="btn-box" style="text-align: center; margin-top: 30px;">
                <a href="" style="font-family: 'Poppins', sans-serif; font-weight: 600; color: white; background-color: #00bbf0; padding: 10px 20px; border-radius: 5px; text-decoration: none;">
                    View All
                </a>
            </div>
        </div>
    </div>
</section>
<!-- end service section -->

<!-- about section -->
<section class="about_section layout_padding" style="background-color: #180e5b;">
    <div class="container">
        <div class="heading_container heading_center">
            <h2 style="font-family: 'Poppins', sans-serif; font-weight: 700; color: ##00bbf0;">
                About <span style="color: #00bbf0;">Us</span>
            </h2>
            <p style="font-family: 'Poppins', sans-serif; font-size: 16px; color: #5a5a5a;">
                Magni quod blanditiis non minus sed aut voluptatum illum quisquam aspernatur ullam vel beatae rerum ipsum voluptatibus.
            </p>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="img-box">
                    <img src="{{ asset('images/moneymindicon.png') }}" alt="About Us" style="width: 100%; height: auto;">
                </div>
            </div>
            <div class="col-md-6">
                <div class="detail-box">
                    <h3 style="font-family: 'Poppins', sans-serif; font-weight: 600; color: white;">
                        We Are MoneyMind
                    </h3>
                    <p style="font-family: 'Poppins', sans-serif; font-size: 14px; color: white;">
                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.
                    </p>
                    <p style="font-family: 'Poppins', sans-serif; font-size: 14px; color: white;">
                        Molestiae odio earum non qui cumque provident voluptates, repellendus exercitationem, possimus at iste corrupti officiis unde alias eius ducimus reiciendis soluta eveniet. Nobis ullam ab omnis quasi expedita.
                    </p>
                    <a href="" style="font-family: 'Poppins', sans-serif; font-weight: 600; color: white; background-color: #00bbf0; padding: 10px 20px; border-radius: 5px; text-decoration: none;">
                        Read More
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end about section -->

<style>
    @keyframes float {
        0% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-20px);
        }

        100% {
            transform: translateY(0);
        }
    }

</style>

@include('layouts.footer')
