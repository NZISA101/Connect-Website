const firstNameInput = document.querySelector('input[name="fname"]');
    const lastNameInput = document.querySelector('input[name="lname"]');
    const phoneNumberInput = document.querySelector('input[name="phone"]');

    firstNameInput.addEventListener('input', (event) =>
    {
      // Remove non-letter characters from the input value
      event.target.value = event.target.value.replace(/[^a-zA-Z]/g, '');
    });

    lastNameInput.addEventListener('input', (event) =>
    {
      // Remove non-letter characters from the input value
      event.target.value = event.target.value.replace(/[^a-zA-Z]/g, '');
    });

    phoneNumberInput.addEventListener('input', (event) => {
    // Remove non-number characters from the input value, except for the first character
    event.target.value = event.target.value.charAt(0) + event.target.value.substring(1).replace(/[^0-9]/g, '');

    // Check if the input starts with "07"
    if (!event.target.value.startsWith('0')) {
      // If the input does not start with "07", clear the input value
      event.target.value = '';
      alert('Phone number must start with "07"');
    }
    });

    
function validateRegistrationNumber()
{
    const registrationNumberInput = document.getElementById("registration_number");
    const registrationNumberPattern = /^[A-Za-z]{3}\/[A-Za-z]\/\d{2}-\d{5}\/\d{4}$/;
    
    if (!registrationNumberPattern.test(registrationNumberInput.value)) {
      alert("Invalid registration number format. Please enter a registration number in the format of 'ABC/X/12-12345/1234'");
      return false;
    }
    
    return true;
}