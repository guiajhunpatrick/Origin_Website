<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Origin Fashion Store</title>
    <link rel="stylesheet" href="web.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="web.js"></script>
    
    <nav>
        <div class="nav-content">
            <h1 class="site-title">Origin</h1>
            <ul class="nav-menu">
                <li><a href="index.php" class="nav-link">Home</a></li>
                <li><a href="products.php" class="nav-link">Products</a></li>
                <li><a href="about.php" class="nav-link">About</a></li>
                <li><a href="contact.php" class="nav-link active">Contact</a></li>
            </ul>
            <div class="nav-icons">
                <a class="icon" id="cartIcon">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="cart-count">0</span>
                </a>
                <div class="vertical-line"></div>
                <button class="login-btn" id="loginButton">
                    <span><?php echo isset($_SESSION['user_name']) ? htmlspecialchars($_SESSION['user_name']) : 'Log In'; ?></span>
                </button>
            </div>
        </div>
    </nav>

    <section id="contact" class="page-section active">
        <div class="content-wrapper">
            <h1 style="text-align: center; margin-bottom: 3rem;">Contact Us</h1>
            <div class="contact-container">
                <div class="contact-info">
                    <h2>Get in Touch</h2>
                    <p>Have questions? We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>

                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <h3>Address</h3>
                            <p>123 Fashion Street, Metro Manila, Philippines</p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <div>
                            <h3>Phone</h3>
                            <p>+63 923 456 7890</p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <h3>Email</h3>
                            <p>support@Origin.com</p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <i class="fas fa-clock"></i>
                        <div>
                            <h3>Business Hours</h3>
                            <p>Mon - Fri: 9:00 AM - 6:00 PM<br>Sat: 10:00 AM - 4:00 PM</p>
                        </div>
                    </div>
                </div>
                
                <form class="contact-form" id="contactForm">
                    <div class="form-group">
                        <input type="text" id="contactName" required placeholder=" ">
                        <label>Your Name</label>
                    </div>
                    
                    <div class="form-group">
                        <input type="email" id="contactEmail" required placeholder=" ">
                        <label>Your Email</label>
                    </div>
                    
                    <div class="form-group">
                        <input type="text" id="contactSubject" required placeholder=" ">
                        <label>Subject</label>
                    </div>
                    
                    <div class="form-group">
                        <textarea id="contactMessage" required placeholder=" "></textarea>
                        <label>Message</label>
                    </div>
                    
                    <button type="submit">Send Message</button>
                </form>
            </div>
        </div>
    </section>
    <div class="auth-modal" id="authModal">
        <div class="modal-content">
            <button class="close-modal" id="closeModal">&times;</button>
            
            <form id="loginForm" class="form active">
                <h2>Log In</h2>
                <div class="form-group">
                    <input type="email" id="loginEmail" required placeholder=" ">
                    <label>Email</label>
                    <span class="error-message"></span>
                </div>
                <div class="form-group">
                    <input type="password" id="loginPassword" required placeholder=" ">
                    <label>Password</label>
                    <i class="fas fa-eye-slash toggle-password"></i>
                    <span class="error-message"></span>
                </div>
                <button type="submit">Log In</button>
                <div class="form-links">
                    <a id="showSignup">No account yet?</a>
                    <a id="showForgot">Forgot Password</a>
                </div>
            </form>

            <form id="signupForm" class="form">
                <h2>Sign Up</h2>
                <div class="form-group">
                    <input type="text" id="signupName" required placeholder=" ">
                    <label>Full Name</label>
                    <span class="error-message"></span>
                </div>
                <div class="form-group">
                    <input type="email" id="signupEmail" required placeholder=" ">
                    <label>Email</label>
                    <span class="error-message"></span>
                </div>
                <div class="form-group">
                    <textarea id="signupAddress" required placeholder=" "></textarea>
                    <label>Address</label>
                    <span class="error-message"></span>
                </div>
                <div class="form-group">
                    <input type="tel" id="signupPhone" required placeholder=" ">
                    <label>Contact Number</label>
                    <span class="error-message"></span>
                </div>
                <div class="form-group">
                    <input type="password" id="signupPassword" required placeholder=" ">
                    <label>Password</label>
                    <i class="fas fa-eye-slash toggle-password"></i>
                    <span class="error-message"></span>
                </div>
                <div class="form-group">
                    <input type="password" id="signupRetypePassword" required placeholder=" ">
                    <label>Retype Password</label>
                    <i class="fas fa-eye-slash toggle-password"></i>
                    <span class="error-message"></span>
                </div>
                <button type="submit">Submit</button>
                <div class="form-links">
                    <a id="showLogin">Already have an account? Log In</a>
                </div>
            </form>

            <form id="forgotForm" class="form">
                <h2>Reset Password</h2>
                <div class="form-group">
                    <input type="email" id="forgotEmail" required placeholder=" ">
                    <label>Email</label>
                    <span class="error-message"></span>
                </div>
                <button type="submit">Reset Password</button>
                <div class="form-links">
                    <a id="backToLogin">Back to Log In</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Shopping Cart Modal (same as index.php) -->
    <div class="cart-modal" id="cartModal">
        <div class="cart-modal-content">
            <div class="cart-header">
                <h2>Shopping Cart</h2>
                <button class="close-cart" id="closeCart">&times;</button>
            </div>
            <div class="cart-items" id="cartItems">
                <p class="empty-cart">Your cart is empty</p>
            </div>
            <div class="cart-footer">
                <div class="cart-total">
                    <span>Total:</span>
                    <span id="cartTotal">$0.00</span>
                </div>
                <button class="checkout-btn" id="checkoutBtn">Checkout</button>
            </div>
        </div>
    </div>


    <footer style="text-align: center; padding: 2rem; background: #f5f5f5; margin-top: 4rem;">
        <p>&copy; 2025 Origin Fashion Store. All rights reserved.</p>
    </footer>
</body>
</html>