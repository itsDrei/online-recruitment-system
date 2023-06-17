$(document).ready(function() {
    // Populate the list of provinces
    $.ajax({
      url: "https://psgc.gov.ph/api/provinces",
      type: "GET",
      dataType: "json",
      success: function(data) {
        const provinceOptions = data.map(province => `<option value="${province.provCode}">${province.provDesc}</option>`);
        $("#province").html(`<option value="">Select Province</option>${provinceOptions.join("")}`);
      }
    });

    // Populate the list of cities when a province is selected
    $("#province").change(function() {
      const selectedProvince = $(this).val();
      $.ajax({
        url: `https://psgc.gov.ph/api/cities?provCode=${selectedProvince}`,
        type: "GET",
        dataType: "json",
        success: function(data) {
          const cityOptions = data.map(city => `<option value="${city.cityMunCode}">${city.cityMunDesc}</option>`);
          $("#city").html(`<option value="">Select City</option>${cityOptions.join("")}`);
          $("#baranggay").html("<option value=''>Select Baranggay</option>");
        }
      });
    });
  
    // Populate the list of baranggays when a city is selected
    $("#city").change(function() {
      const selectedCity = $(this).val();
      $.ajax({
        url: `https://psgc.gov.ph/api/barangays?citymunCode=${selectedCity}`,
        type: "GET",
        dataType: "json",
        success: function(data) {
          const baranggayOptions = data.map(baranggay => `<option value="${baranggay.brgyCode}">${baranggay.brgyDesc}</option>`);
          $("#baranggay").html(`<option value="">Select Baranggay</option>${baranggayOptions.join("")}`);
        }
      });
    });
  });