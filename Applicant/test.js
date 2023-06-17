


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
    const emails = form.emails.value;
    const phone_ = form.phone.value;
    const civil_ = form.civil.value;
    const province_ = form.province.value;
    const city_ = form.city.value;
    const baranggay_ = form.baranggay.value;
    const street_ = form.street.value;
    const postal_ = form.postal.value;
   
    const father_ = form.father.value;
    const f_occu_ = form.f_occu.value;
    const mother_ = form.mother.value;
    const m_occu_ = form.m_occu.value;

    const cname_ = form.cname.value;
    const cprogram_ = form.cprogram.value;
    const cyear_ = form.cyear.value;
    
    const sname_ = form.sname.value;
    const sprogram_ = form.sprogram.value;
    const syear_ = form.syear.value;


    const hname_ = form.hname.value;
    const hyear_ = form.hyear.value;

    const ename_ = form.ename.value;
    const eyear_ = form.eyear.value;

    const company_name1_ = form.company_name1.value;
    const company_address1_ = form.company_address1.value;
    const position1_ = form.position1.value;
    const work_date_start1_ = form.work_date_start1.value;
    const date_ended1_= form.date_ended1.value; 

    const company_name2_ = form.company_name2.value;
    const company_address2_ = form.company_address2.value;
    const position2_ = form.position2.value;
    const work_date_start2_ = form.work_date_start2.value;
    const date_ended2_= form.date_ended2.value; 

    const company_name3_ = form.company_name3.value;
    const company_address3_ = form.company_address3.value;
    const position3_ = form.position3.value;
    const work_date_start3_ = form.work_date_start3.value;
    const date_ended3_= form.date_ended3.value;


    const cfname_ = form.cfname.value;
    const clname_ = form.clname.value;
    const email_ref_ = form.email_ref.value;
    const phone_ref_ = form.phone_ref.value;
    const occu_ref_= form.occu_ref.value;


    const cv_file_= form.cv_file.value;

    modalBody.innerHTML = `
    
    <h2><b>Personal Information</b></h2> 
    <p><b>First Name:</b> ${firstName}</p>
    <p><b>Middle Name:</b> ${middleName}</p>
    <p><b>Last Name:</b> ${lastName}</p>
    <p><b>Birthplace:</b> ${birthplace}</p>
    <p><b>Birthdate:</b> ${birthdate}</p>
    <p><b>Age: </b>${age_}</p>
    <p><b>Gender:</b> ${gender_}</p>
    <p><b>Email:</b> ${emails}</p>
    <p><b>Contact Number:</b> ${phone_}</p>
    <p><b>Civil:</b> ${civil_}</p>
    <p><b>Province:</b> ${province_}</p>
    <p><b>City: </b>${city_}</p>
    <p><b>Baranggay:</b> ${baranggay_}</p>
    <p><b>Street:</b> ${street_}</p>
    <p><b>Postal code:</b> ${postal_}</p>

  <h2>Parent / Guardian Information</h2>
    <p><b>Father's Name:</b> ${father_}</p>
    <p><b>Father's Occupation:</b> ${f_occu_}</p>
    <p><b>Mother's Name:</b> ${mother_}</p>
    <p><b>Mother's Occupation:</b> ${m_occu_}</p>

  <h2>Educational Background</h2>
  <h3>College Information</h3>
    <p><b>College name:</b> ${cname_}</p>
    <p><b>Study program:</b> ${cprogram_}</p>
    <p><b>Year graduated: </b>${cyear_}</p>
  <h3>Senior HighSchool Information</h3>
    <p><b>Senior High School Name:</b> ${sname_}</p>
    <p><b>Study program: </b>${sprogram_}</p>
    <p><b>Year graduated: </b>${syear_}</p>
  <h3>High School Information</h3>
    <p><b>High School Name: </b>${hname_}</p>
    <p><b>Year graduated:</b> ${hyear_}</p>
  <h3>Elementary Information</h3>
    <p><b>Elementary Name: </b>${ename_}</p>
    <p><b>Year graduated: </b>${eyear_}</p>
    
  <h2>Work Experiences</h2>
  <h3>First Job</h3>
    <p><b>Company Name:</b> ${company_name1_}</p>
    <p><b>Company Address:</b> ${company_address1_}</p>
    <p><b>Position:</b> ${position1_}</p>
    <p><b>Work Date Start:</b> ${work_date_start1_}</p>
    <p><b>Work Date Ended:</b> ${date_ended1_}</p>
  <h3>Second Job</h3>
    <p><b>Company Name:</b> ${company_name2_}</p>
    <p><b>Company Address:</b> ${company_address2_}</p>
    <p><b>Position:</b> ${position2_}</p>
    <p><b>Work Date Start:</b> ${work_date_start2_}</p>
    <p><b>Work Date Ended:</b> ${date_ended2_}</p>
  <h3>Third Job</h3>
    <p><b>Company name:</b> ${company_name3_}</p>
    <p><b>Company address:</b> ${company_address3_}</p>
    <p><b>Position:</b> ${position3_}</p>
    <p><b>Work Date Start:</b> ${work_date_start3_}</p>
    <p><b>Work Date Ended:</b> ${date_ended3_}</p>
  <h2>Character References</h2>
    <p><b>Firstname:</b> ${cfname_}</p>
    <p><b>Lastname:</b> ${clname_}</p>
    <p><b>Email:</b> ${email_ref_}</p>
    <p><b>Phone: </b>${phone_ref_}</p>
    <p><b>Occupation:</b> ${occu_ref_}</p>
  <h2>Resume / CV</h2>
    <p><b>Resume / Curriculum Vitae:</b> ${cv_file_}</p>
  `;
    $('#exampleModal').modal('show'); // show the modal
    
  });

