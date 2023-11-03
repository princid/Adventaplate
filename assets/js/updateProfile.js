

class profileUpdate {
  setError(errType, error) {
    const elements = document.getElementsByClassName(errType);
    if (elements.length > 0) {
      elements[0].innerText = error;
    }
  }

  clearErrors() {
    // Clearing all the error messages
    const errorElements = document.querySelectorAll(".formError");
    errorElements.forEach((element) => {
      element.innerText = "";
    });
  }

  profileUpdateForm(event) {
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

    // Validating D.O.B.
    let dateOfBirth = new Date(document.getElementById("dob").value);
    let currentDate = new Date();
    if (isNaN(dateOfBirth)) {
      this.setError("dateOfBirth", "*Add your valid Date of Birth!!");
      returnVal = false;
    } else if (dateOfBirth > currentDate) {
      this.setError("dateOfBirth", "*Please select a valid Date of Birth!!");
      returnVal = false;
    }

    // Validating Subject
    let checkSub = document.querySelectorAll('input[type="checkbox"]');
    let val = 0;
    checkSub.forEach((el) => {
      if (el.checked == true) {
        val++;
      }
    });
    if (val === 0) {
      this.setError("subject", "*Add at least one subject!!");
      returnVal = false;
    } else {
      this.setError("subject", "");
      returnVal = true;
    }

    // If there are no errors, allow form submission
    if (returnVal) {
      document.getElementById("profileForm").submit(); // Use getElementById
    }
  }
}

let profileFormObj = new profileUpdate();

document.addEventListener("DOMContentLoaded", function () {
  let profileForm = document.getElementById("profileForm");

  if (profileForm) {
    profileForm.addEventListener("submit", (event) => {
      if (!profileFormObj.profileUpdateForm(event)) {
        event.preventDefault(); // Prevent form submission if validation fails
      }
    });
  }
});