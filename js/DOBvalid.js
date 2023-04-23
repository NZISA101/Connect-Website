const dob = document.getElementById("dob");
dob.addEventListener("change", validateDate);

function validateDate() {
  const selectedDate = new Date(dob.value);
  const currentDate = new Date();
  const selectedYear = selectedDate.getFullYear();
  const currentYear = currentDate.getFullYear();
  const age = currentYear - selectedYear;
  
  if (age < 15) {
    alert("You must be at least 15 years old to register");
    dob.value = ""; // clear the date input
  }
}
