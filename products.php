<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - Origin Fashion Store</title>
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
                <li><a href="products.php" class="nav-link active">Products</a></li>
                <li><a href="about.php" class="nav-link">About</a></li>
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

    <section id="products" class="page-section active">
        <div class="content-wrapper">
            <h1 style="text-align: center; margin-bottom: 2rem;">Our Products</h1>
            <div class="products-grid">
                <div class="product-card" data-product-name="Classic T-Shirt" data-product-price="24.99">
                    <div class="product-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTpBOP_HJqBzh1DMr9ALXTj5abqW8WzMCVZww&s" alt="Classic T-Shirt">
                    </div>
                    <div class="product-info">
                        <h3>Classic T-Shirt</h3>
                        <p>Comfortable cotton blend</p>
                        <div class="product-price">$24.99</div>
                        <button class="add-to-cart">Add to Cart</button>
                    </div>
                </div>
                <div class="product-card" data-product-name="Summer Hat" data-product-price="19.99">
                    <div class="product-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSnTk54Op4vm2Fg3-XCdaURNYUb0U2kn8xA_Q&s" alt="Summer Hat">
                    </div>
                    <div class="product-info">
                        <h3>Summer Hat</h3>
                        <p>Perfect for sunny days</p>
                        <div class="product-price">$19.99</div>
                        <button class="add-to-cart">Add to Cart</button>
                    </div>
                </div>
                <div class="product-card" data-product-name="Casual Sneakers" data-product-price="49.99">
                    <div class="product-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQCaTukDLZYT_-z-MxKy204TWUqaDg7JaMMzQ&s" alt="Casual Sneakers">
                    </div>
                    <div class="product-info">
                        <h3>Casual Sneakers</h3>
                        <p>Stylish and comfortable</p>
                        <div class="product-price">$49.99</div>
                        <button class="add-to-cart">Add to Cart</button>
                    </div>
                </div>
                <div class="product-card" data-product-name="Slip Dress" data-product-price="49.99">
                    <div class="product-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR3SFofBND60-EJTrN2McZb-8Ry2hF4Zr557Q&s" alt="Dress Shirt">
                    </div>
                    <div class="product-info">
                        <h3>Slip Dress</h3>
                        <p>Professional elegance</p>
                        <div class="product-price">$49.99</div>
                        <button class="add-to-cart">Add to Cart</button>
                    </div>
                </div>
                <div class="product-card" data-product-name="Flap Bag" data-product-price="59.99">
                    <div class="product-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSy55Dj_vJlW_0YYRxlvyvKc3OMITz6Gb3XPQ&s" alt="Winter Gloves">
                    </div>
                    <div class="product-info">
                        <h3>Flap Bag</h3>
                        <p>Shape and silhouette</p>
                        <div class="product-price">$59.99</div>
                        <button class="add-to-cart">Add to Cart</button>
                    </div>
                </div>
                <div class="product-card" data-product-name="Sunglasses" data-product-price="14.99">
                    <div class="product-image">
                        <img src="https://images.unsplash.com/photo-1511499767150-a48a237f0083?w=400&h=400&fit=crop" alt="Sunglasses">
                    </div>
                    <div class="product-info">
                        <h3>Sunglasses</h3>
                        <p>UV protection included</p>
                        <div class="product-price">$14.99</div>
                        <button class="add-to-cart">Add to Cart</button>
                    </div>
                </div>
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