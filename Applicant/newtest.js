const form = document.querySelector('form');
const modalBody = document.querySelector('.modal-body');

form.addEventListener('submit', () => {
  // prevent form from submitting

  const firstName = form.fname.value;
  const middleName = form.mname.value;
  const lastName = form.lname.value;
  const birthplace = form.bplace.value;
  const birthdate = form.birthdate.value;
  const age_ = form.age.value;
  const gender_ = form.gender.value;
  const email_ = form.email.value;
  const phone_ = form.phone.value;
  const civil_ = form.civil.value;
  const province_ = form.province.value;
  const city_ = form.city.value;
  const baranggay_ = form.baranggay.value;
  const street_ = form.street.value;
  const postal_ = form.postal.value;
 

  modalBody.innerHTML = `
  <h2>Personal Information</h2>
  <p>First Name: ${firstName}</p>
  <p>Middle Name: ${middleName}</p>
  <p>Last Name: ${lastName}</p>
  <p>Birthplace: ${bplace_}</p>
  <p>Birthdate: ${bdate_}</p>
  <p>Age: ${age_}</p>
  <p>Gender: ${gender_}</p>
  <p>Email: ${email_}</p>
  <p>Contact Number: ${phone_}</p>
  <p>Civil: ${civil_}</p>
  <p>Province: ${province_}</p>
  <p>City: ${city_}</p>
  <p>Baranggay: ${baranggay_}</p>
  <p>Street: ${street_}</p>
  <p>Postal: ${postal_}</p>

`;
  $('#exampleModal').modal('show'); // show the modal
});

