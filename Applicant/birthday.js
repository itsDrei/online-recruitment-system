
  // Get the birthdate input element
  var birthdateInput = document.getElementById("birthdate");

  // Add an event listener to the birthdate input element
  birthdateInput.addEventListener("input", function() {
    // Get the birthdate value
    var birthdateValue = new Date(birthdateInput.value);

    // Calculate the age
    var age = Math.floor((Date.now() - birthdateValue) / (365.25 * 24 * 60 * 60 * 1000));

    // Set the age value
    document.getElementById("age").value = age;
  });

