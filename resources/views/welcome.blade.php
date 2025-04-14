<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to the Eyewear Store Website</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Tajawal', sans-serif;
            background: linear-gradient(135deg, #1E90FF, #4682B4); /* Blue gradient background */
            color: white;
            overflow-x: hidden;
            line-height: 1.6;
        }

        /* Navigation Bar */
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: rgba(30, 144, 255, 0.9); /* Semi-transparent blue */
            padding: 10px 0;
            z-index: 1000;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        header nav {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        header nav a {
            color: white;
            text-decoration: none;
            font-size: 1.2rem;
            padding: 10px 15px;
            border-radius: 5px;
            transition: all 0.3s;
        }

        header nav a:hover {
            background: #87CEFA;
            color: #1E90FF;
        }

        /* Decorative Background Circles */
        .background-circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            z-index: -1;
            animation: floatY 6s ease-in-out infinite;
        }

        .background-circle:nth-child(1) {
            width: 400px;
            height: 400px;
            top: 10%;
            left: 15%;
        }

        .background-circle:nth-child(2) {
            width: 300px;
            height: 300px;
            bottom: 15%;
            right: 10%;
        }

        .background-circle:nth-child(3) {
            width: 200px;
            height: 200px;
            top: 50%;
            left: 70%;
        }

        /* Main Content */
        section#home {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            position: relative;
            padding: 20px;
        }

        section#home .content h1 {
            font-size: 4rem;
            margin-bottom: 20px;
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.3);
            animation: fadeInDown 1.5s ease-in-out;
        }

        section#home .content p {
            font-size: 1.8rem;
            margin-bottom: 30px;
            line-height: 1.8;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
            animation: fadeInUp 1.5s ease-in-out;
        }

        section#home .btn {
            background: linear-gradient(90deg, #00BFFF, #1E90FF); /* Blue gradient button */
            color: white;
            text-decoration: none;
            font-size: 1.5rem;
            padding: 15px 40px;
            border-radius: 50px;
            transition: all 0.3s ease-in-out;
            font-weight: bold;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            animation: bounceIn 2s ease-in-out;
        }

        section#home .btn:hover {
            background: linear-gradient(90deg, #87CEEB, #4682B4);
            transform: scale(1.1);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
        }

        /* About Section */
        section#about {
            background: #F0F8FF; /* Light blue background */
            color: #333;
            padding: 50px 20px;
            text-align: center;
        }

        section#about h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #1E90FF;
        }

        section#about p {
            font-size: 1.2rem;
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.8;
        }

        /* Footer */
        footer {
            background: #333;
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 1rem;
        }

        footer p {
            margin: 5px 0;
        }

        /* Animations */
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes bounceIn {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-20px);
            }
            60% {
                transform: translateY(-10px);
            }
        }

        @keyframes floatY {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-20px);
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            header nav a {
                font-size: 1rem;
            }

            section#home .content h1 {
                font-size: 2.5rem;
            }

            section#home .content p {
                font-size: 1.2rem;
            }

            section#home .btn {
                font-size: 1.2rem;
                padding: 10px 25px;
            }

            section#about p {
                font-size: 1rem;
            }

            .background-circle {
                display: none; /* Hide background circles on smaller screens */
            }
        }
    </style>
</head>
<body>
    <!-- Background Decorative Elements -->
    <div class="background-circle"></div>
    <div class="background-circle"></div>
    <div class="background-circle"></div>

    <!-- Navigation Bar -->
    <header>
        <nav>
            <a href="#home">Home</a>
            <a href="#about">About Us</a>
            <a href="{{ route('products.index') }}">Products</a>
            <a href="#contact">Contact Us</a>
        </nav>
    </header>

    <!-- Main Content -->
    <section id="home">
        <div class="content">
            <h1>Welcome to the Eyewear Store Website</h1>
            <p>We provide the latest eyewear and lenses at the best prices. <br> Book your appointment now or browse the products.</p>
            <a href="{{ route('products.index') }}" class="btn">Browse Products</a>
        </div>
    </section>

    <!-- About Section -->
    <section id="about">
        <div class="about-content">
            <h2>About Us</h2>
            <p>We specialize in providing the best optical solutions, whether it's prescription glasses, sunglasses, or contact lenses. Our goal is to enhance your visual experience.</p>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact">
        <p>© {{ date('Y') }} Eyewear Store. All rights reserved.</p>
        <p>Contact us: contact@example.com | 123-456-7890</p>
    </footer>
</body>
</html>