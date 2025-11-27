$(document).ready(function() {
let cart = [];
let isLoggedIn = false;
let currentUser = null; 

checkLoginStatus();

function checkLoginStatus() {
    $.ajax({
        url: 'auth.php',
        method: 'POST',
        data: { action: 'check_session' },
        dataType: 'json',
        success: function(response) {
            if (response.logged_in) {
                isLoggedIn = true;
                currentUser = response.user_name;
                $('#loginButton span').text(response.user_name);
            } else {
                isLoggedIn = false;
                currentUser = null;
                $('#loginButton span').text('Log In');
            }
        },
        error: function() {
            console.log('Could not check login status');
        }
    });
}

function showSection(sectionId) {
    $('.page-section').removeClass('active');
    $('#' + sectionId).addClass('active');
    window.scrollTo(0, 0);
}

$('.site-title').click(function() {
    window.location.href = 'index.php';
});

$('#shopNowBtn').click(function() {
    window.location.href = 'products.php';
});

$('#loginButton').click(function(e) {
    e.preventDefault();
    if (isLoggedIn) {
        if (confirm('Do you want to log out?')) {
            logout();
        }
    } else {
        $('#authModal').addClass('active');
        $('body').addClass('modal-open');
    }
});

function logout() {
    $.ajax({
        url: 'auth.php',
        method: 'POST',
        data: { action: 'logout' },
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                isLoggedIn = false;
                currentUser = null;
                cart = [];
                updateCartCount();
                updateCartDisplay();
                $('#loginButton span').text('Log In');
                alert('You have been logged out successfully.');
                   
                location.reload();
            }
        },
        error: function() {
            alert('Logout failed. Please try again.');
        }
    });
}

$('#cartIcon').click(function(e) {
    e.preventDefault();
        
    if (!isLoggedIn) {
        alert('Please log in to view your cart.');
        $('#authModal').addClass('active');
        $('body').addClass('modal-open');
        return;
    }
        
    $('#cartModal').addClass('active');
    $('body').addClass('modal-open');
});

function updateCartCount() {
    const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
    $('.cart-count').text(totalItems);
}

function updateCartDisplay() {
    const cartItemsContainer = $('#cartItems');
    cartItemsContainer.empty();

    if (!isLoggedIn) {
        cartItemsContainer.html('<p class="empty-cart">Please log in to view your cart</p>');
        $('#cartTotal').text('$0.00');
        $('#checkoutBtn').prop('disabled', true);
        return;
    }

    if (cart.length === 0) {
        cartItemsContainer.html('<p class="empty-cart">Your cart is empty</p>');
        $('#cartTotal').text('$0.00');
        $('#checkoutBtn').prop('disabled', true);
        return;
    }

    $('#checkoutBtn').prop('disabled', false);
    let total = 0;

    cart.forEach((item, index) => {
        const itemTotal = item.price * item.quantity;
        total += itemTotal;

        const cartItemHTML = `
            <div class="cart-item">
                <div class="cart-item-info">
                    <h4>${item.name}</h4>
                    <p class="cart-item-price">$${item.price.toFixed(2)} each</p>
                </div>
                <div class="cart-item-actions">
                    <div class="quantity-controls">
                        <button class="quantity-btn decrease-qty" data-index="${index}">-</button>
                        <span class="quantity">${item.quantity}</span>
                        <button class="quantity-btn increase-qty" data-index="${index}">+</button>
                    </div>
                    <button class="remove-item" data-index="${index}">Remove</button>
                </div>
            </div>
        `;
        cartItemsContainer.append(cartItemHTML);
    });

    $('#cartTotal').text('$'+ total.toFixed(2));
}

function addToCart(name, price) {
    const existingItem = cart.find(item => item.name === name);
        
    if (existingItem) {
        existingItem.quantity++;
    } else {
        cart.push({
            name: name,
            price: price,
            quantity: 1
        });
    }
        
    updateCartCount();
    updateCartDisplay();
}

$('.add-to-cart').click(function() {
    if (!isLoggedIn) {
        alert('Please log in to add items to your cart.');
        $('#authModal').addClass('active');
        $('body').addClass('modal-open');
        return; 
    }

    const productCard = $(this).closest('.product-card');
    const productName = productCard.data('product-name');
    const productPrice = parseFloat(productCard.data('product-price'));
        
    addToCart(productName, productPrice);
        
    $(this).text('Added!').css('background', '#27ae60');
    setTimeout(() => {
        $(this).text('Add to Cart').css('background', '');
    }, 1000);
});

$('#closeCart').click(function() {
    $('#cartModal').removeClass('active');
    $('body').removeClass('modal-open');
});

$('#cartModal').click(function(e) {
    if (e.target.id === 'cartModal') {
        $('#cartModal').removeClass('active');
        $('body').removeClass('modal-open');
    }
});

$(document).on('click', '.increase-qty', function() {
    const index = $(this).data('index');
    cart[index].quantity++;
    updateCartCount();
    updateCartDisplay();
});

$(document).on('click', '.decrease-qty', function() {
    const index = $(this).data('index');
    if (cart[index].quantity > 1) {
        cart[index].quantity--;
        updateCartCount();
        updateCartDisplay();
    }
});

$(document).on('click', '.remove-item', function() {
    const index = $(this).data('index');
    cart.splice(index, 1);
    updateCartCount();
    updateCartDisplay();
});

$('#checkoutBtn').click(function() {
    if (cart.length > 0) {
        alert('Proceeding to checkout...');
        cart = [];
        updateCartCount();
        updateCartDisplay();
        $('#cartModal').removeClass('active');
        $('body').removeClass('modal-open');
    }
});

function switchForm(targetForm) {
    $('.form.active').fadeOut(200, function() {
        $(this).removeClass('active');
        $(targetForm).fadeIn(200).addClass('active');
    });
}

$('#closeModal').click(function() {
    $('#authModal').removeClass('active');
    $('body').removeClass('modal-open');
});

$('#authModal').click(function(e) {
    if (e.target.id === 'authModal') {
        $('#authModal').removeClass('active');
        $('body').removeClass('modal-open');
    }
});

function showError(inputElement, message) {
    inputElement.addClass('invalid');
    inputElement.siblings('.error-message').text(message);
}

function clearError(inputElement) {
    inputElement.removeClass('invalid');
    inputElement.siblings('.error-message').text('');
}

function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

function validatePhone(phone) {
    const re = /^\+?[\d\s-]{10,}$/;
    return re.test(phone);
}

$('.form-group input, .form-group textarea').on('input', function() {
    clearError($(this));
});

$('#showSignup').click(function(e) {
    e.preventDefault();
    switchForm('#signupForm');
});

$('#showLogin, #backToLogin').click(function(e) {
    e.preventDefault();
    switchForm('#loginForm');
});

$('#showForgot').click(function(e) {
    e.preventDefault();
    switchForm('#forgotForm');
});

$('.toggle-password').click(function() {
    $(this).toggleClass('fa-eye fa-eye-slash');
    let input = $(this).siblings('input');
    if (input.attr('type') === 'password') {
        input.attr('type', 'text');
    } else {
        input.attr('type', 'password');
    }
});

$('#loginForm').submit(function(e) {
    e.preventDefault();
    let isValid = true;
    const emailInput = $('#loginEmail');
    const passwordInput = $('#loginPassword');
    const passwordValue = passwordInput.val();

    if (/\s/.test(passwordValue)) {
        isValid = false;
        alert('Please enter a valid password.'); 
        passwordInput.val(''); 
        passwordInput.focus();
    }

    clearError(emailInput);
    clearError(passwordInput);

    if (!validateEmail(emailInput.val())) {
        showError(emailInput, 'Please enter a valid email address.');
        isValid = false;
    }

    if (passwordInput.val().length < 6) {
        showError(passwordInput, 'Password must be at least 6 characters.');
        isValid = false;
    }

    if (isValid) {
        $.ajax({
            url: 'auth.php',
            method: 'POST',
            data: {
                action: 'login',
                email: emailInput.val(),
                password: passwordInput.val()
            },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    isLoggedIn = true;
                    currentUser = response.user_name;
                        
                    alert('Login successful!');
                    $('#authModal').removeClass('active');
                    $('body').removeClass('modal-open');
                    $('#loginButton span').text(response.user_name);
                        
                    $('#loginForm')[0].reset();
                        
                } else {
                    alert(response.message);
                }
            },
            error: function() {
                alert('Login failed. Please try again.');
            }
        });
    }
});

$('#signupForm').submit(function(e) {
    e.preventDefault();
    let isValid = true;
    const nameInput = $('#signupName');
    const emailInput = $('#signupEmail');
    const addressInput = $('#signupAddress');
    const phoneInput = $('#signupPhone');
    const passwordInput = $('#signupPassword');
    const retypePasswordInput = $('#signupRetypePassword');

    $('#signupForm .form-group input, #signupForm .form-group textarea').each(function() {
        clearError($(this));
    });

    if (nameInput.val().trim().length < 2) {
        showError(nameInput, 'Please enter your full name.');
        isValid = false;
    }
    if (!validateEmail(emailInput.val())) {
        showError(emailInput, 'Please enter a valid email address.');
        isValid = false;
    }
    if (addressInput.val().trim().length < 10) {
        showError(addressInput, 'Please enter a complete address.');
        isValid = false;
    }
    if (phoneInput.val().trim() === '' || !validatePhone(phoneInput.val()) || phoneInput.val().length < 11) {
        showError(phoneInput, 'Please enter a valid phone number.');
        alert('Phone number must contain at least 11 digits.');
        isValid = false;
    }
    if (passwordInput.val().trim().length < 6) {
        showError(passwordInput, 'Password must be at least 6 characters long.');
        isValid = false;
    }
    if (passwordInput.val() !== retypePasswordInput.val()) {
        showError(retypePasswordInput, 'Passwords do not match.');
        isValid = false;
    }

    if (isValid) {
          
        $.ajax({
            url: 'auth.php',
            method: 'POST',
            data: {
                action: 'signup',
                name: nameInput.val(),
                email: emailInput.val(),
                address: addressInput.val(),
                phone: phoneInput.val(),
                password: passwordInput.val()
            },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    alert('Registration successful! Please log in.');
                    switchForm('#loginForm');
                    $('#signupForm')[0].reset();
                } else {
                    alert(response.message);
                }
            },
            error: function() {
                alert('Registration failed. Please try again.');
            }
        });
    }
});

$('#forgotForm').submit(function(e) {
        e.preventDefault();
        let isValid = true;
        const emailInput = $('#forgotEmail');

        clearError(emailInput);

        if (!validateEmail(emailInput.val())) {
            showError(emailInput, 'Please enter a valid email address.');
            isValid = false;
        }

        if (isValid) {
            alert('Password reset instructions have been sent to your email.');
            switchForm('#loginForm');
            $('#forgotForm')[0].reset();
        }
    });

$('#contactForm').submit(function(e) {
        e.preventDefault();

        let isValid = true;
        const form = $(this);
        
        const nameInput = $('#contactName');
        const subjectInput = $('#contactSubject');
        const messageInput = $('#contactMessage'); 
        
        const inputsToCheck = [
            { field: nameInput, name: 'Your Name' },
            { field: subjectInput, name: 'Subject' },
            { field: messageInput, name: 'Message' }
        ];
        
        for (let i = 0; i < inputsToCheck.length; i++) {
            const item = inputsToCheck[i];
            const field = item.field;
            const fieldName = item.name;
            
            const trimmedValue = field.val().trim();
            
            if (field.prop('required') && trimmedValue.length === 0) { 
                alert('Please fill out these fields');
                field.focus();
                isValid = false;
                return;
            }
            
            field.val(trimmedValue);
        }

        if (isValid) {
            alert('Thank you for contacting us! We will get back to you soon.');
            form[0].reset();
        }
    });
});