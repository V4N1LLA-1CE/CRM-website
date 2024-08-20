const form = document.getElementById("contact-form");
form.addEventListener("submit", () => {
  let phoneNum = document.getElementById("phone").value;
  if (isNaN(phoneNum) || phoneNum.length !== 10) {
    alert("The phone number must be a number that is 10 length");
    return false;
  }
});
