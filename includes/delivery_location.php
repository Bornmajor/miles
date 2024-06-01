<?php include('includes/header.php'); ?>
    <title>Miles concepts store | Address </title>
    <meta name="description" content="Miles concepts - Login">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</head>
<body>

<?php  
 //navbar
 include('includes/navbar.php');
 ?>

 <div class="container_form"  >



<form id="countyForm" class="form_add_address" style="padding:20px;" action="" method="POST">

<div class="mb-3">
<div class="title_group">
  <h5>Use this form to add locations</h5>  
</div>
</div>

<div id="loc_address_feedback"></div>

      <div class="mb-3">
        <label for="countySelect" class="form-label">Select County:</label>
        <select class="form-select" id="countySelect" style="width: 100%;" required>
          <option selected disabled>Select County</option>
        </select>
      </div>

      <div class="mb-3">
        <label for="subCountySelect" class="form-label">Select Sub-County:</label>
        <select class="form-select" id="subCountySelect" style="width: 100%;" required>
          <option selected disabled>Select Sub-County</option>
        </select>
      </div>

      <div class="mb-3">
        <label for="ward" class="form-label">Ward</label>
        <input type="text" class="form-control" placeholder="Ward" id="ward" required>
      </div>

      <div class="mb-3">
        <label for="street" class="form-label">Street</label>
        <input type="text" class="form-control" placeholder="Street address" id="street" required>
      </div>

      <div class="mb-3">
        <label for="street" class="form-label">Home address</label>
        <input type="text" class="form-control" placeholder="Home address.." id="home_address" required>
      </div>





      <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">Additional info(optional)</label>
      <textarea class="form-control" id="extra_info" rows="3"></textarea>
    </div>
      
 
      <div class="mb-3">
        <button type="submit" class="btn btn-primary">Confirm</button>
      </div>
    </form>

 </div>


 <script>
    let countiesData;

// Function to fetch JSON data from an external file
async function fetchCountiesData() {
  try {
    const response = await fetch('js/counties.json');
    const data = await response.json();
    return data;
  } catch (error) {
    console.error('Error fetching data:', error);
  }
}

// Function to populate county dropdown with Select2
async function populateCounties() {
  const countySelect = $('#countySelect');

  countiesData = await fetchCountiesData();

  countySelect.select2({
    data: countiesData.map(county => ({ id: county.name, text: county.name })),
    placeholder: 'Select County',
    width: 'resolve'
  });
}

// Function to update sub-county dropdown with Select2
function updateSubCounties() {
  const countySelect = $('#countySelect');
  const subCountySelect = $('#subCountySelect');

  // Clear previous options
  subCountySelect.empty().select2({
    placeholder: 'Select Sub-County',
    width: 'resolve'
  });

  // Get selected county
  const selectedCounty = countySelect.val();

  // Find the selected county in the JSON data
  const selectedCountyData = countiesData.find(county => county.name === selectedCounty);

  // Populate sub-counties dropdown if county is found
  if (selectedCountyData && selectedCountyData.sub_counties) {
    subCountySelect.select2({
      data: selectedCountyData.sub_counties.map(subCounty => ({ id: subCounty, text: subCounty })),
      placeholder: 'Select Sub-County',
      width: 'resolve',
    
    });
  }
}

// Function to handle form submission
// function submitForm(e) {
//   e.preventDefault();
//   const descLocation= $('#desc-location').val();
//   const selectedCounty = $('#countySelect').val();
//   const selectedSubCounty = $('#subCountySelect').val();

//   // You can do something with the captured data here
//   console.log('Name:', descLocation);
//   console.log('Selected County:', selectedCounty);
//   console.log('Selected Sub-County:', selectedSubCounty);
// }
$("#countyForm").submit(function(e){
  e.preventDefault();

  const selectedCounty = $('#countySelect').val();
  const selectedSubCounty = $('#subCountySelect').val();
  const ward = $('#ward').val();
  const street = $("#street").val();
  const home_address = $("#home_address").val();
  const extra_info = $("#extra_info").val();
  

 $.post("php/add_delivery_location.php",{county:selectedCounty,sub_county:selectedSubCounty,ward:ward,street:street,home_address:home_address,extra_info:extra_info},function(data){
    $("#loc_address_feedback").html(data);

    $("#countyForm")[0].reset();

    $('html, body').animate({
          scrollTop: 0
        }, 'slow');

 })


})
// Populate counties dropdown on page load
populateCounties();

// Bind updateSubCounties to change event of countySelect
$('#countySelect').on('change', updateSubCounties);
 </script>