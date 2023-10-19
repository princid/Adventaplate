


class registerForm {
  setError(errType, error) {
    const elements = document.getElementsByClassName(errType);
    if (elements.length > 0) {
      elements[0].innerText = error;
    }
  }

  clearErrors() {
    // Clearing all the error messages
    const errorElements = document.querySelectorAll('.formError');
    errorElements.forEach((element) => {
      element.innerText = '';
    });
  }

  validateForm(event) {
    event.preventDefault();
    let returnVal = true;

    // Clearing the previous error messages
    this.clearErrors();

    // Validating Name
    let name = document.getElementById("name").value.trim(); // Trim whitespace
    if (name.length === 0) {
      this.setError("name", "*Name cannot be blank!");
      returnVal = false;
    }

    // Validating Email
    let email = document.getElementById("email").value;
    if (email.length === 0) {
      this.setError("email", "*Email cannot be blank!");
      returnVal = false;
    } else if (!/^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/.test(email)) {
      this.setError("email", "*Please enter a valid email, like your@abc.com");
      returnVal = false;
    }

    // Validating Password
    let password = document.getElementById("password").value;
    if (password.length < 8) {
      this.setError("password", "*Password should be at least 8 characters long");
      returnVal = false;
    } else if (!/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@#$%^&*!])[A-Za-z\d@#$%^&*!]+$/.test(password)) {
      this.setError("password", "*Password should contain at least one uppercase letter, one lowercase letter, one number, and one symbol");
      returnVal = false;
    }

    // Validating Confirm Password
    let confirm_password = document.getElementById("confirm_password").value;
    if (confirm_password.length < 8) {
      this.setError("confirm_password", "*Please confirm the password!");
      returnVal = false;
    } else if (password !== confirm_password) {
      this.setError("confirm_password", "*Confirm Password does not match your original password");
      returnVal = false;
    }

    // Validating age
    let age = document.getElementById("age").value;
    if (age.length === 0) {
      this.setError("age", "*Please enter your age!");
      returnVal = false;
    } else if (age > 100 || age <= 0) {
      this.setError("age", "*Please enter a valid age!");
      returnVal = false;
    }

    // Validating Phone
    let phone = document.getElementById("phone").value;
    if (!/^\d{10}$/.test(phone)) {
      this.setError("phone", "*Please enter a valid 10-digit phone number");
      returnVal = false;
    }

    // If there are no errors, allow form submission
    if (returnVal) {
      document.getElementById("signUp_form").submit(); // Use getElementById
    }
  }
}

let registerObj = new registerForm();

  let signUp_form = document.getElementById("signUp_form");

signUp_form.addEventListener("submit", (event) => {
  if (!registerObj.validateForm(event)) {
    event.preventDefault(); // Prevent form submission if validation fails
  }
});


