// JavaScript for NextGen Food Processing System Website

// Authentication Modals Functionality
document.addEventListener('DOMContentLoaded', function() {
    // Modal Elements
    const loginModal = document.getElementById('loginModal');
    const signupModal = document.getElementById('signupModal');
    const loginBtn = document.getElementById('loginBtn');
    const signupBtn = document.getElementById('signupBtn');
    const loginForm = document.getElementById('loginForm');
    const signupForm = document.getElementById('signupForm');
    
    // Close Modal Functions
    function closeModal(modal) {
        modal.style.display = 'none';
    }
    
    // Open Modal Functions
    function openLoginModal() {
        loginModal.style.display = 'flex';
        signupModal.style.display = 'none';
    }
    
    function openSignupModal() {
        signupModal.style.display = 'flex';
        loginModal.style.display = 'none';
    }
    
    // Event Listeners for Modal Triggers
    loginBtn.addEventListener('click', openLoginModal);
    signupBtn.addEventListener('click', openSignupModal);
    
    // Close Modal Button Listeners
    document.querySelectorAll('.close-modal').forEach(closeModalBtn => {
        closeModalBtn.addEventListener('click', function() {
            closeModal(loginModal);
            closeModal(signupModal);
        });
    });
    
    // Window Click to Close Modal
    window.addEventListener('click', function(event) {
        if (event.target === loginModal) {
            closeModal(loginModal);
        }
        if (event.target === signupModal) {
            closeModal(signupModal);
        }
    });
    
    // Switch Between Login and Signup
    document.getElementById('switchToSignup').addEventListener('click', function(e) {
        e.preventDefault();
        openSignupModal();
    });
    
    document.getElementById('switchToLogin').addEventListener('click', function(e) {
        e.preventDefault();
        openLoginModal();
    });
    
    // Login Form Submission
    loginForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const email = document.getElementById('loginEmail').value;
        const password = document.getElementById('loginPassword').value;
        
        // Simulate login (replace with actual authentication logic)
        if (email && password) {
            alert('Login Successful!');
            closeModal(loginModal);
            loginForm.reset();
        } else {
            alert('Please enter email and password');
        }
    });
    
    // Signup Form Submission
    signupForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const name = document.getElementById('signupName').value;
        const email = document.getElementById('signupEmail').value;
        const password = document.getElementById('signupPassword').value;
        const confirmPassword = document.getElementById('confirmPassword').value;
        
        // Basic validation
        if (password !== confirmPassword) {
            alert('Passwords do not match');
            return;
        }
        
        // Simulate signup (replace with actual signup logic)
        if (name && email && password) {
            alert('Account Created Successfully!');
            closeModal(signupModal);
            signupForm.reset();
        } else {
            alert('Please fill in all fields');
        }
    });
    
    // Forgot Password Link
    document.getElementById('forgotPasswordLink').addEventListener('click', function(e) {
        e.preventDefault();
        const email = prompt('Please enter your email address:');
        if (email) {
            alert('A password reset link has been sent to ' + email);
        }
    });
});
// Document Ready Function
document.addEventListener('DOMContentLoaded', function() {
    // Fade in animation for elements
    const fadeElements = document.querySelectorAll('.fade-in');
    
    // Create an observer for fade-in elements
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.2
    });
    
    // Observe all fade elements
    fadeElements.forEach(element => {
        observer.observe(element);
    });
    
    // Animate statistics counters
    setTimeout(() => {
        animateCounter('nutrient-stat', 40, '%', 1500);
        animateCounter('shelf-life-stat', 45, '%', 1500);
        animateCounter('efficiency-stat', 60, '%', 1500);
        animateCounter('waste-stat', 75, '%', 1500);
    }, 500);
    
    // Initialize charts
    initializeCharts();
    
    // Modal functionality
    const modal = document.getElementById('contactModal');
    const contactBtn = document.getElementById('contactBtn');
    const closeModal = document.querySelector('.close-modal');
    const contactForm = document.getElementById('contactForm');
    
    // Open modal
    contactBtn.addEventListener('click', () => {
        modal.style.display = 'flex';
    });
    
    // Close modal
    closeModal.addEventListener('click', () => {
        modal.style.display = 'none';
    });
    
    // Close modal when clicking outside
    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
    
    // Form submission
    contactForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const formData = {
            name: document.getElementById('name').value,
            company: document.getElementById('company').value,
            email: document.getElementById('email').value,
            phone: document.getElementById('phone').value,
            message: document.getElementById('message').value
        };
        
        // Just for demo purposes, simulate successful submission
        alert('Thank you for your interest! A representative will contact you shortly.');
        modal.style.display = 'none';
        contactForm.reset();
    });
    
    // Smooth scrolling for navigation links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 80,
                    behavior: 'smooth'
                });
            }
        });
    });
});

// Counter animation function
function animateCounter(elementId, target, suffix = '', duration = 2000) {
    const element = document.getElementById(elementId);
    const start = 0;
    const increment = target / (duration / 16);
    let current = start;
    
    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            current = target;
            clearInterval(timer);
        }
        element.textContent = Math.floor(current) + suffix;
    }, 16);
}

// Initialize charts
function initializeCharts() {
    // Nutrition retention chart
    const nutritionCtx = document.getElementById('nutritionChart').getContext('2d');
    const nutritionChart = new Chart(nutritionCtx, {
        type: 'bar',
        data: {
            labels: ['Vitamin C', 'Vitamin A', 'Vitamin E', 'B Vitamins', 'Minerals', 'Antioxidants'],
            datasets: [
                {
                    label: 'Traditional Processing',
                    data: [45, 55, 40, 60, 65, 50],
                    backgroundColor: 'rgba(239, 83, 80, 0.7)',
                    borderColor: 'rgba(239, 83, 80, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Our Processing System',
                    data: [90, 85, 92, 88, 95, 93],
                    backgroundColor: 'rgba(46, 125, 50, 0.7)',
                    borderColor: 'rgba(46, 125, 50, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Nutrient Retention (%)'
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100,
                    title: {
                        display: true,
                        text: 'Retention (%)'
                    }
                }
            }
        }
    });
    
    // Shelf life chart
    const shelfLifeCtx = document.getElementById('shelfLifeChart').getContext('2d');
    const shelfLifeChart = new Chart(shelfLifeCtx, {
        type: 'line',
        data: {
            labels: ['Day 1', 'Day 5', 'Day 10', 'Day 15', 'Day 20', 'Day 25', 'Day 30'],
            datasets: [
                {
                    label: 'Traditional Processing',
                    data: [100, 90, 75, 60, 40, 20, 10],
                    backgroundColor: 'rgba(239, 83, 80, 0.2)',
                    borderColor: 'rgba(239, 83, 80, 1)',
                    borderWidth: 2,
                    tension: 0.3,
                    fill: true
                },
                {
                    label: 'Our Processing System',
                    data: [100, 98, 95, 92, 87, 82, 75],
                    backgroundColor: 'rgba(46, 125, 50, 0.2)',
                    borderColor: 'rgba(46, 125, 50, 1)',
                    borderWidth: 2,
                    tension: 0.3,
                    fill: true
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Product Quality Over Time'
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return context.dataset.label + ': ' + context.parsed.y + '% quality';
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100,
                    title: {
                        display: true,
                        text: 'Quality (%)'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Time'
                    }
                }
            }
        }
    });
    
    // Add responsive behavior for charts
    window.addEventListener('resize', function() {
        nutritionChart.resize();
        shelfLifeChart.resize();
    });
}

// Add data visualization functionality for the dashboard
function updateDashboard(data) {
    // This function would be used to update the dashboard with real data
    // Currently using static demo data
    console.log("Dashboard would be updated with:", data);
}

// Example function to simulate real-time data updates
function simulateDataUpdates() {
    // This would connect to a real data source in a production environment
    setInterval(() => {
        const randomData = {
            nutrientRetention: Math.floor(90 + Math.random() * 5),
            shelfLifeExtension: Math.floor(40 + Math.random() * 5),
            energySavings: Math.floor(35 + Math.random() * 5),
            waterEfficiency: Math.floor(75 + Math.random() * 5)
        };
        updateDashboard(randomData);
    }, 5000);
}

// Initialize the data simulation for demonstration purposes
// Uncomment this line to enable simulated data updates
// simulateDataUpdates();

// Mobile menu toggle functionality (for responsive design)
function setupMobileMenu() {
    const mobileMenuBtn = document.createElement('div');
    mobileMenuBtn.className = 'mobile-menu-btn';
    mobileMenuBtn.innerHTML = '<i class="fas fa-bars"></i>';
    
    const nav = document.querySelector('nav');
    nav.appendChild(mobileMenuBtn);
    
    mobileMenuBtn.addEventListener('click', () => {
        const navLinks = document.querySelector('.nav-links');
        navLinks.classList.toggle('active');
    });
}

// Add this to make the menu work on mobile devices
// setupMobileMenu();

// Add parallax effect to hero section
window.addEventListener('scroll', function() {
    const scrollPosition = window.scrollY;
    const hero = document.querySelector('.hero');
    
    if (hero) {
        hero.style.backgroundPosition = `center ${scrollPosition * 0.5}px`;
    }
});

// Add light/dark theme toggle functionality
function setupThemeToggle() {
    const themeToggle = document.createElement('button');
    themeToggle.className = 'theme-toggle';
    themeToggle.innerHTML = '<i class="fas fa-moon"></i>';
    
    const header = document.querySelector('header .container');
    header.appendChild(themeToggle);
    
    themeToggle.addEventListener('click', () => {
        document.body.classList.toggle('dark-theme');
        const icon = themeToggle.querySelector('i');
        if (document.body.classList.contains('dark-theme')) {
            icon.className = 'fas fa-sun';
        } else {
            icon.className = 'fas fa-moon';
        }
    });
}

// Add this to enable theme toggling
// setupThemeToggle();