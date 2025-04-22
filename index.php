<!DOCTYPE html>
<html lang="en">
<!-- Add this line in the head section of your HTML file, before your script.js -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NextGen Food Processing Systems</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
</head>
<body>
    <!-- Updated Header -->
<!-- Updated Header with Fixed Navbar -->
<header>
    <div class="container">
        <nav>
            <div class="logo">
                <i class="fas fa-seedling"></i> NextGen Food Processing
            </div>
            <ul class="nav-links">
                <li><a href="#about">About</a></li>
                <li><a href="#features">Features</a></li>
                <li><a href="#process">Process</a></li>
                <li><a href="#dashboard">Dashboard</a></li>
            </ul>
            <div class="auth-buttons">
                <a href="login.php" class="btn btn-outline">Login</a>
                <a href="signup.php" class="btn btn-primary">Sign Up</a>
                <a href="contact.php" class="btn btn-outline">Contact Us</a>

            </div>
        </nav>
    </div>
</header>


    <!-- Contact Modal - Updated with PHP form action -->

<div class="modal" id="contactModal">
    <div class="modal-content">
        <span class="close-modal">&times;</span>
        <h2>Request a Demo</h2>
        <p>Fill out the form below and one of our experts will contact you to schedule a demo of our innovative food processing system.</p>
        <form id="contactForm" action="contact_process.php" method="POST">
            <div style="margin-bottom: 1rem;">
                <label for="name" style="display: block; margin-bottom: 0.5rem;">Full Name</label>
                <input type="text" id="name" name="name" style="width: 100%; padding: 0.8rem; border: 1px solid #ddd; border-radius: 4px;" required>
            </div>
            <div style="margin-bottom: 1rem;">
                <label for="company" style="display: block; margin-bottom: 0.5rem;">Company</label>
                <input type="text" id="company" name="company" style="width: 100%; padding: 0.8rem; border: 1px solid #ddd; border-radius: 4px;" required>
            </div>
            <div style="margin-bottom: 1rem;">
                <label for="email" style="display: block; margin-bottom: 0.5rem;">Email</label>
                <input type="email" id="email" name="email" style="width: 100%; padding: 0.8rem; border: 1px solid #ddd; border-radius: 4px;" required>
            </div>
            <div style="margin-bottom: 1rem;">
                <label for="phone" style="display: block; margin-bottom: 0.5rem;">Phone</label>
                <input type="tel" id="phone" name="phone" style="width: 100%; padding: 0.8rem; border: 1px solid #ddd; border-radius: 4px;" required>
            </div>
            <div style="margin-bottom: 1.5rem;">
                <label for="message" style="display: block; margin-bottom: 0.5rem;">Message</label>
                <textarea id="message" name="message" style="width: 100%; padding: 0.8rem; border: 1px solid #ddd; border-radius: 4px; height: 120px;" required></textarea>
            </div>
            <button type="submit" class="btn" style="width: 100%;">Submit Request</button>
        </form>
    </div>
</div>


    <section class="hero">
        <div class="container">
            <h1>Revolutionizing Food Processing</h1>
            <p>Our innovative system improves quality, shelf life, and nutritional value while ensuring better storage, packaging, and distribution.</p>
            <a href="#about" class="btn">Learn More</a>
        </div>
    </section>

    <section id="about" class="about">
        <div class="container">
            <div class="section-title">
                <h2>About Our System</h2>
            </div>
            <div class="about-content">
                <div class="about-text fade-in">
                    <h3>The Challenge</h3>
                    <p>Traditional food processing methods often lead to significant loss of nutrients, deterioration in quality, and shortened shelf life. This results in food waste, increased costs, and diminished nutritional value for consumers.</p>
                    <h3>Our Solution</h3>
                    <p>Our NextGen Food Processing System uses advanced technologies and innovative approaches to preserve the nutritional integrity of food while extending shelf life and improving overall quality. By optimizing every stage of the food processing chain, we minimize waste and maximize value.</p>
                    <p>The system integrates smart sensors, controlled atmosphere technology, and precision processing to deliver food products that are not only safer and more nutritious but also have superior taste and texture.</p>
                </div>
                <div class="about-image fade-in">
                    <img src="food-processing-svg-green.svg" alt="Food Processing System">
                </div>
            </div>
        </div>
    </section>

    <section id="features" class="features">
        <div class="container">
            <div class="section-title">
                <h2>Key Features</h2>
            </div>
            <div class="features-grid">
                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-utensils"></i>
                    </div>
                    <h3>Nutrient Preservation</h3>
                    <p>Our gentle processing methods retain up to 95% of essential vitamins and minerals compared to conventional methods.</p>
                </div>
                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3>Extended Shelf Life</h3>
                    <p>Advanced packaging and preservation techniques extend product shelf life by 30-50% without chemical additives.</p>
                </div>
                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-tachometer-alt"></i>
                    </div>
                    <h3>Energy Efficiency</h3>
                    <p>Our system reduces energy consumption by up to 40% compared to traditional processing methods.</p>
                </div>
                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-recycle"></i>
                    </div>
                    <h3>Reduced Waste</h3>
                    <p>Precision processing and smart monitoring minimize waste throughout the production chain.</p>
                </div>
                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3>Food Safety</h3>
                    <p>Integrated safety monitoring eliminates contaminants and ensures product safety at every stage.</p>
                </div>
                <div class="feature-card fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <h3>Eco-Friendly</h3>
                    <p>Sustainable practices and materials reduce environmental impact throughout the process.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="stats">
        <div class="container">
            <div class="stats-container">
                <div class="stat-item">
                    <div class="stat-number" id="nutrient-stat">0%</div>
                    <div>Increased Nutrient Retention</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number" id="shelf-life-stat">0%</div>
                    <div>Extended Shelf Life</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number" id="efficiency-stat">0%</div>
                    <div>Operational Efficiency</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number" id="waste-stat">0%</div>
                    <div>Reduced Food Waste</div>
                </div>
            </div>
        </div>
    </section>

    <section id="process" class="process">
        <div class="container">
            <div class="section-title">
                <h2>Our Process</h2>
            </div>
            <div class="process-steps">
                <div class="step">
                    <div class="step-content fade-in">
                        <h3>Controlled Harvesting</h3>
                        <p>Optimally timed harvesting paired with gentle handling techniques to minimize physical damage and stress to produce. Immediate pre-cooling stabilizes produce and slows enzyme activity.</p>
                    </div>
                    <div class="step-number">1</div>
                </div>
                <div class="step">
                    <div class="step-content fade-in">
                        <h3>Smart Sorting & Cleaning</h3>
                        <p>Computer vision and AI-powered sorting removes imperfections while our water-efficient cleaning system removes contaminants without damaging product integrity.</p>
                    </div>
                    <div class="step-number">2</div>
                </div>
                <div class="step">
                    <div class="step-content fade-in">
                        <h3>Precision Processing</h3>
                        <p>Low-temperature, high-pressure processing techniques preserve nutritional content while ensuring food safety. Sensors monitor key parameters in real-time to maintain optimal conditions.</p>
                    </div>
                    <div class="step-number">3</div>
                </div>
                <div class="step">
                    <div class="step-content fade-in">
                        <h3>Advanced Packaging</h3>
                        <p>Modified atmosphere packaging combined with biodegradable active packaging materials extends shelf life while maintaining quality and reducing environmental impact.</p>
                    </div>
                    <div class="step-number">4</div>
                </div>
                <div class="step">
                    <div class="step-content fade-in">
                        <h3>Smart Distribution</h3>
                        <p>IoT-enabled cold chain management with real-time tracking ensures optimal conditions during transport and storage, preventing quality degradation.</p>
                    </div>
                    <div class="step-number">5</div>
                </div>
            </div>
        </div>
    </section>

    <section id="dashboard" class="dashboard">
        <div class="container">
            <div class="section-title">
                <h2>System Performance Dashboard</h2>
            </div>
            <div class="dashboard-container">
                <div class="dashboard-card">
                    <h3><i class="fas fa-chart-line"></i> Key Performance Metrics</h3>
                    <div class="metrics-grid">
                        <div class="metric-card">
                            <div class="metric-value">95%</div>
                            <div class="metric-label">Nutrient Retention</div>
                        </div>
                        <div class="metric-card">
                            <div class="metric-value">42%</div>
                            <div class="metric-label">Shelf Life Extension</div>
                        </div>
                        <div class="metric-card">
                            <div class="metric-value">38%</div>
                            <div class="metric-label">Energy Savings</div>
                        </div>
                        <div class="metric-card">
                            <div class="metric-value">79%</div>
                            <div class="metric-label">Water Efficiency</div>
                        </div>
                    </div>
                    <div class="chart-container">
                        <h4>Nutritional Retention Comparison</h4>
                        <canvas id="nutritionChart"></canvas>
                    </div>
                </div>
                
                <div class="dashboard-card">
                    <h3><i class="fas fa-calendar-alt"></i> Shelf Life Comparison</h3>
                    <div class="chart-container">
                        <canvas id="shelfLifeChart"></canvas>
                    </div>
                    <div class="nutrition-comparison">
                        <div class="nutrition-item">
                            <div class="nutrition-circle traditional">60%</div>
                            <div>Traditional Processing</div>
                        </div>
                        <div class="nutrition-item">
                            <div class="nutrition-circle our-system">95%</div>
                            <div>Our System</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cta">
        <div class="container">
            <h2>Ready to Transform Your Food Processing?</h2>
            <p>Improve food quality, extend shelf life, and preserve nutritional value with our innovative system.</p>
            <button id="contactBtn" class="btn">Request a Demo</button>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>NextGen Food Processing</h3>
                    <p>Revolutionizing the food industry through innovative processing technologies that preserve quality and nutrition.</p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="footer-column">
                    <h3>Quick Links</h3>
                    <ul class="footer-links">
                        <li><a href="#about">About Us</a></li>
                        <li><a href="#features">Features</a></li>
                        <li><a href="#process">Our Process</a></li>
                        <li><a href="#dashboard">Dashboard</a></li>
                        <li><a href="#">Case Studies</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Contact Us</h3>
                    <ul class="footer-links">
                        <li><i class="fas fa-map-marker-alt"></i> 123 Innovation Way, FoodTech Park</li>
                        <li><i class="fas fa-phone"></i> +91 1234567890</li>
                        <li><i class="fas fa-envelope"></i> info@nextgenfood.tech</li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2025 NextGen Food Processing. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Contact Modal -->
    <div class="modal" id="contactModal">
        <div class="modal-content">
            <span class="close-modal">&times;</span>
            <h2>Request a Demo</h2>
            <p>Fill out the form below and one of our experts will contact you to schedule a demo of our innovative food processing system.</p>
            <form id="contactForm">
                <div style="margin-bottom: 1rem;">
                    <label for="name" style="display: block; margin-bottom: 0.5rem;">Full Name</label>
                    <input type="text" id="name" style="width: 100%; padding: 0.8rem; border: 1px solid #ddd; border-radius: 4px;" required>
                </div>
                <div style="margin-bottom: 1rem;">
                    <label for="company" style="display: block; margin-bottom: 0.5rem;">Company</label>
                    <input type="text" id="company" style="width: 100%; padding: 0.8rem; border: 1px solid #ddd; border-radius: 4px;" required>
                </div>
                <div style="margin-bottom: 1rem;">
                    <label for="email" style="display: block; margin-bottom: 0.5rem;">Email</label>
                    <input type="email" id="email" style="width: 100%; padding: 0.8rem; border: 1px solid #ddd; border-radius: 4px;" required>
                </div>
                <div style="margin-bottom: 1rem;">
                    <label for="phone" style="display: block; margin-bottom: 0.5rem;">Phone</label>
                    <input type="tel" id="phone" style="width: 100%; padding: 0.8rem; border: 1px solid #ddd; border-radius: 4px;" required>
                </div>
                <div style="margin-bottom: 1.5rem;">
                    <label for="message" style="display: block; margin-bottom: 0.5rem;">Message</label>
                    <textarea id="message" style="width: 100%; padding: 0.8rem; border: 1px solid #ddd; border-radius: 4px; height: 120px;" required></textarea>
                </div>
                <button type="submit" class="btn" style="width: 100%;">Submit Request</button>
            </form>
        </div>
    </div>

    <script src="script.js"></script>
    
</body>
</html>