const textInputs = document.querySelectorAll('input[type="text"]:not([name="mname"])');
const emailInput = document.querySelector('input[type="email"]');
const contactNumberInput = document.querySelector('input[type="tel"]');


textInputs.forEach(input => {
  input.addEventListener('input', validateInput);
});

emailInput.addEventListener('input', validateEmail);

contactNumberInput.addEventListener('input', validateContactNumber);

function validateInput() {
  const value = this.value.trim();
  const regex = /^[A-Za-z ]+$/;

  if (/^[A-Za-z0-9Ññ/#._%+-,]{2,}(?:[ ](?! )|[A-Za-z0-9#._%+-,]+)*$/.test(value) && regex.test(value)) {
    this.classList.remove('is-invalid');
    this.setCustomValidity('');
  } else {
    this.classList.add('is-invalid');
    this.setCustomValidity('Please enter a valid value (invalid spaces or too short)');
  }
}

function validateEmail() {
  const emailValue = emailInput.value.trim();
  const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{3,}$/;

  if (emailRegex.test(emailValue)) {
    emailInput.classList.remove('is-invalid');
    emailInput.setCustomValidity('');
  } else {
    emailInput.classList.add('is-invalid');
    emailInput.setCustomValidity('Please enter a valid email address');
  }
}

function validateContactNumber() {
  const contactNumberValue = contactNumberInput.value.trim();
  const contactNumberRegex = /^(\+63|0)?(2|3[0-9]{2}|4[0-9]{2}|5[0-9]{2}|6[0-9]{2}|7[0-9]{2}|8[0-9]{2}|9[0-9]{2})?[0-9]{7}$/;

  if (contactNumberRegex.test(contactNumberValue)) {
    contactNumberInput.classList.remove('is-invalid');
    contactNumberInput.setCustomValidity('');
  } else {
    contactNumberInput.classList.add('is-invalid');
    contactNumberInput.setCustomValidity('Please enter a valid Contact Number');
  }
}


const postalInput = document.querySelector('input#postal-code');

postalInput.addEventListener('input', validatePostal);

function validatePostal() {
  const value = this.value.trim();
  const regex = /^[0-9]+$/;

  if (regex.test(value)) {
    this.classList.remove('is-invalid');
    this.setCustomValidity('');
  } else {
    this.classList.add('is-invalid');
    this.setCustomValidity('Please enter a valid postal code');
  }
}

const streetInput = document.querySelector('input#street-address');

streetInput.addEventListener('input', validateStreet);

function validateStreet() {
  const value = this.value.trim();
  const regex =/^[a-zA-Z0-9Ññ#._%+, -]+$/;

  if (regex.test(value)) {
    this.classList.remove('is-invalid');
    this.setCustomValidity('');
  } else {
    this.classList.add('is-invalid');
    this.setCustomValidity('Please enter a valid street address');
  }
}


const companyAddressInput = document.querySelector('input#address');

companyAddressInput.addEventListener('input', validateCompanyAddress);

function validateCompanyAddress() {
  const value = this.value.trim();
  const regex = /^[A-Za-z0-9.,#/ ]+$/;

  if (regex.test(value)) {
    this.classList.remove('is-invalid');
    this.setCustomValidity('');
  } else {
    this.classList.add('is-invalid');
    this.setCustomValidity('Please enter a valid company address');
  }
}



