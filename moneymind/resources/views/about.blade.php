@include('layouts.app')

<div style="background: linear-gradient(135deg, #180e5b 0%, #1a237e 100%); padding: 80px 0; color: white; min-height: 100vh;">
    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
        <!-- Hero Section -->
        <div class="hero-section" style="text-align: center; margin-bottom: 60px;">
            <h1 style="font-family: 'Poppins', sans-serif; font-size: 3rem; font-weight: 700; margin-bottom: 20px;">About MoneyMind</h1>
            <p style="font-family: 'Poppins', sans-serif; font-size: 1.2rem; color: #e2e8f0;">Your Trusted Partner in Financial Management</p>
        </div>

        <!-- Mission Section -->
        <div class="mission-section" style="margin-bottom: 60px;">
            <h2 style="font-family: 'Poppins', sans-serif; font-size: 2rem; color: #00bbf0; margin-bottom: 20px;">Our Mission</h2>
            <p style="font-family: 'Poppins', sans-serif; font-size: 1.1rem; line-height: 1.8; color: #e2e8f0;">
                At MoneyMind, we're committed to empowering individuals to take control of their financial future. Our mission is to provide innovative, user-friendly tools that make financial management accessible to everyone, regardless of their financial expertise. We believe that financial literacy and proper money management should be available to all, not just financial experts.
            </p>
            <p style="font-family: 'Poppins', sans-serif; font-size: 1.1rem; line-height: 1.8; color: #e2e8f0; margin-top: 20px;">
                Founded with a vision to revolutionize personal finance management, MoneyMind combines cutting-edge technology with intuitive design to create a platform that not only tracks your finances but helps you understand and improve your financial habits.
            </p>
        </div>

        <!-- Vision Section -->
        <div class="vision-section" style="margin-bottom: 60px;">
            <h2 style="font-family: 'Poppins', sans-serif; font-size: 2rem; color: #00bbf0; margin-bottom: 20px;">Our Vision</h2>
            <p style="font-family: 'Poppins', sans-serif; font-size: 1.1rem; line-height: 1.8; color: #e2e8f0;">
                We envision a world where everyone has the tools and knowledge to achieve financial wellness. Through our platform, we aim to:
            </p>
            <ul style="font-family: 'Poppins', sans-serif; font-size: 1.1rem; line-height: 1.8; color: #e2e8f0; margin: 20px 0 0 40px;">
                <li style="margin-bottom: 10px;">Democratize financial management tools</li>
                <li style="margin-bottom: 10px;">Promote smart spending and saving habits</li>
                <li style="margin-bottom: 10px;">Provide personalized financial insights</li>
                <li style="margin-bottom: 10px;">Help users achieve their financial goals</li>
            </ul>
        </div>

        <!-- Features Section -->
        <div class="features-section" style="margin-bottom: 60px;">
            <h2 style="font-family: 'Poppins', sans-serif; font-size: 2rem; color: #00bbf0; margin-bottom: 30px; text-align: center;">What Sets Us Apart</h2>
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px;">
                <div class="feature-card" style="background: rgba(255, 255, 255, 0.1); padding: 30px; border-radius: 15px; text-align: center; transition: all 0.3s ease;">
                    <i class="fas fa-chart-line" style="font-size: 2.5rem; color: #00bbf0; margin-bottom: 20px;"></i>
                    <h3 style="font-family: 'Poppins', sans-serif; font-size: 1.5rem; margin-bottom: 15px;">Smart Analytics</h3>
                    <p style="font-family: 'Poppins', sans-serif; color: #e2e8f0;">Advanced financial tracking and analysis tools to help you make informed decisions. Real-time insights into your spending patterns and financial health.</p>
                </div>
                <div class="feature-card" style="background: rgba(255, 255, 255, 0.1); padding: 30px; border-radius: 15px; text-align: center; transition: all 0.3s ease;">
                    <i class="fas fa-shield-alt" style="font-size: 2.5rem; color: #00bbf0; margin-bottom: 20px;"></i>
                    <h3 style="font-family: 'Poppins', sans-serif; font-size: 1.5rem; margin-bottom: 15px;">Secure Platform</h3>
                    <p style="font-family: 'Poppins', sans-serif; color: #e2e8f0;">Bank-level security measures to protect your sensitive financial information. Your data safety is our top priority.</p>
                </div>
                <div class="feature-card" style="background: rgba(255, 255, 255, 0.1); padding: 30px; border-radius: 15px; text-align: center; transition: all 0.3s ease;">
                    <i class="fas fa-robot" style="font-size: 2.5rem; color: #00bbf0; margin-bottom: 20px;"></i>
                    <h3 style="font-family: 'Poppins', sans-serif; font-size: 1.5rem; margin-bottom: 15px;">AI-Powered Insights</h3>
                    <p style="font-family: 'Poppins', sans-serif; color: #e2e8f0;">Intelligent recommendations and insights to optimize your financial decisions. Let our AI help you make smarter financial choices.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .feature-card:hover {
        transform: translateY(-10px);
        background: rgba(255, 255, 255, 0.2);
        box-shadow: 0 10px 30px rgba(0, 187, 240, 0.2);
    }

    /* Scroll Animation Base Classes */
    .reveal {
        opacity: 0;
        visibility: hidden;
    }

    .reveal.active {
        opacity: 1;
        visibility: visible;
        transition: all 1s ease;
    }

    /* Animation Variations */
    .reveal.fade-up {
        transform: translateY(100px);
    }

    .reveal.fade-up.active {
        transform: translateY(0);
    }

    .reveal.fade-left {
        transform: translateX(-100px);
    }

    .reveal.fade-left.active {
        transform: translateX(0);
    }

    .reveal.fade-right {
        transform: translateX(100px);
    }

    .reveal.fade-right.active {
        transform: translateX(0);
    }

    /* Delay classes */
    .delay-1 {
        transition-delay: 0.2s;
    }

    .delay-2 {
        transition-delay: 0.4s;
    }

    .delay-3 {
        transition-delay: 0.6s;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add reveal classes to sections
        document.querySelector('.hero-section').classList.add('reveal', 'fade-up');
        document.querySelector('.mission-section').classList.add('reveal', 'fade-left');
        document.querySelector('.vision-section').classList.add('reveal', 'fade-right');
        
        // Add reveal classes to feature cards with delays
        const featureCards = document.querySelectorAll('.feature-card');
        featureCards.forEach((card, index) => {
            card.classList.add('reveal', 'fade-up', `delay-${index + 1}`);
        });

        // Scroll animation function
        function reveal() {
            const reveals = document.querySelectorAll('.reveal');
            
            reveals.forEach(element => {
                const windowHeight = window.innerHeight;
                const elementTop = element.getBoundingClientRect().top;
                const elementVisible = 150; // Adjust this value to change when the animation triggers

                if (elementTop < windowHeight - elementVisible) {
                    element.classList.add('active');
                } else {
                    element.classList.remove('active');
                }
            });
        }

        // Add scroll event listener
        window.addEventListener('scroll', reveal);
        
        // Initial check for elements in view
        reveal();
    });
</script>

@include('layouts.footer')


