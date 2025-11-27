<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Origin Fashion Store</title>
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
                <li><a href="about.php" class="nav-link active">About</a></li>
                <li><a href="contact.php" class="nav-link">Contact</a></li>
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

    <section id="about" class="page-section active">
        <div class="content-wrapper">
            <div class="about-content">
                <h1>About Origin</h1>
                <p>Welcome to Origin, your premier destination for contemporary fashion and timeless style. Since our establishment, we've been committed to bringing you the finest selection of clothing and accessories that blend quality, comfort, and elegance.</p>
                
                <h2>Our Story</h2>
                <p>Founded with a passion for fashion and a dedication to excellence, Origin has grown from a small boutique into a trusted name in the fashion industry. We believe that everyone deserves to look and feel their best, which is why we carefully curate our collections to offer something special for every occasion.</p>
                
                <h2>Our Mission</h2>
                <p>At Origin, our mission is simple: to provide high-quality, stylish clothing that empowers our customers to express their unique personalities. We strive to create a shopping experience that is not only enjoyable but also memorable, with exceptional customer service at every touchpoint.</p>
                
                <h2>Why Choose Us</h2>
                <p>We stand behind every product we sell, offering only items that meet our rigorous standards for quality and craftsmanship. Our team is dedicated to staying ahead of fashion trends while maintaining timeless appeal. With fast shipping, easy returns, and responsive customer support, we make shopping with us effortless and enjoyable.</p>
                
                <h2>Our Commitment</h2>
                <p>We're committed to sustainability and ethical practices in the fashion industry. We work closely with our suppliers to ensure fair labor practices and environmentally responsible methods. When you shop with Origin, you're not just buying clothes—you're supporting a brand that cares about people and the environment.</p>
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