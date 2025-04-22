function validateForm() {
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;

    // Email validation
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        alert("Please enter a valid email address.");
        return false;
    }

    // Password validation
    if (password.length < 8) {
        alert("Password must be at least 8 characters long.");
        return false;
    }

    // Form submission
    // This is just an example to demonstrate form submission.
    alert("Form submitted successfully.");
    return true;
}
