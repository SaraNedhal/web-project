const form = document.getElementById("form");

// Show input error message
function showError(input, message) {
  const parentElement = input.parentElement;
  parentElement.className = "S error";
  const small = parentElement.querySelector("small");
  small.innerText = message;
}

// Show success outline
function showSuccess(input) {
  const parentElement = input.parentElement;
  parentElement.className = "S success";

  const small = parentElement.querySelector("small");
  small.innerText = "";
}

// Check email is valid
function checkEmail(input) {
  let error = 0;
  const re =
    /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  if (re.test(input.value.trim())) {
    showSuccess(input);
  } else {
    showError(input, "Email is not valid");
    ++error;
  }
  return error;
}

// Check required fields
function checkRequired(inputArr) {
  let error = 0;
  inputArr.forEach(function (input) {
    // console.log(input);
    if (input.value.trim() === "") {
      showError(input, `${getFieldName(input)} is required`);
      ++error;
    } else {
      showSuccess(input);
    }
  });
  return error;
}

// Check input length
function checkLength(input, min, max) {
  let error = 0;
  if (input.value.length < min) {
    showError(
      input,
      `${getFieldName(input)} must be at least ${min} characters`
    );
    ++error;
  } else if (input.value.length > max) {
    showError(
      input,
      `${getFieldName(input)} must be less than ${max} characters`
    );
    ++error;
  } else {
    showSuccess(input);
  }
  return error;
}

function checkPasswordsMatch(input1, input2) {
  let error = 0;
  if (input1.value !== input2.value) {
    showError(input2, "Passwords do not match");
    ++error;
  }
  return error;
}
/**
 * @param {Element} input
 * @returns number
 */
function CheckGender(input) {
  let error = 0;
  var radio = document.querySelector('[name="g"]').parentElement;
  if (!input) {
    showError(radio, "no gender been selected");
    error++;
  } else {
    showSuccess(radio);
  }
  return error;
}

function CheckBirthday(input) {
  var bd = document.getElementById("birthday").parentElement;
  var error = 0;
  if (!input) {
    showError(bd, "no birthday date been selected");
    error++;
  } else {
    showSuccess(bd);
  }
  return error;
}
function getFieldName(input) {
  return input.id.charAt(0).toUpperCase() + input.id.slice(1);
}
function vaildun(input) {
  let error = 0;
  if (!usernames.includes(input.value)) {
    showSuccess(input);
  } else {
    showError(input, "Username already exist. Please choose another one.");
    ++error;
  }
  return error;
}
function validPhone(input) {
  const re = /^((\+00)973\s?)?[36][0-9]{7}$/;
  let error = 0;
  if (re.test(input.value.trim())) {
    showSuccess(input);
  } else {
    showError(input, "phone number isnt vaild");
    ++error;
  }
  return error;
}
function validPassword(input) {
  const re = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,32}$/;
  let error = 0;
  if (re.test(input.value.trim())) {
    showSuccess(input);
  } else {
    showError(input, "phone number isnt vaild");
    ++error;
  }
  return error;
}
// Event listeners

// form.addEventListener('submit',
//   /**
//    * @param {Event} e
//    */
//   function (e) {
//     // e.preventDefault();
//     //   e.stopPropagation();

//   });
function ValidateThenSubmit() {
  // console.log('Hmsh');
  var Name = document.getElementById("Name");
  var NameL = document.getElementById("NameL");
  var un = document.getElementById("un");
  var email = document.getElementById("email");
  var g = document.querySelector('[name="g"]:checked');
  var password = document.getElementById("password");
  var confirmPassword = document.getElementById("confirmPassword");
  var phone = document.getElementById("phone");
  // const r = document.querySelector('[name="r"]:checked');
  var bd = document.getElementById("birthday");

  var allErrors = 0;
  allErrors += checkRequired([
    un,
    Name,
    NameL,
    email,
    password,
    confirmPassword,
    bd,
  ]);
  allErrors += checkLength(Name, 3, 15);
  allErrors += checkLength(NameL, 3, 15);
  allErrors += checkLength(un, 3, 15);
  allErrors += CheckGender(g);
  allErrors += checkLength(password, 6, 25);
  allErrors += checkLength(confirmPassword, 6, 25);
  allErrors += checkEmail(email);
  allErrors += checkPasswordsMatch(password, confirmPassword);
  allErrors += CheckBirthday(bd);
  allErrors += vaildun(un);
  allErrors += validPhone(phone);
  // allErrors += CheckRole(r);

  //If all requirements are successful, submit the form
  if (allErrors !== 0) {
    return;
  }
  form.submit();
}

/////////////////////-------------------TOPUP-----------------//////////////////////////////////////////////

// Check input Fixed num
function checkFix(input, fix) {
  let error = 0;
  if (input.value.length != fix) {
    showError(input, `${getFieldName(input)} must be  ${fix} characters`);
    ++error;
  } else {
    showSuccess(input);
  }
  return error;
}

// Check Expiry input
function ExpireDate(input) {
  let error = 0;
  const re = /^(0[1-9]|1[0-2])\/?([0-9]{2})$/;
  if (re.test(input.value.trim())) {
    showSuccess(input);
  } else {
    showError(input, "Epiry date is not valid");
    ++error;
  }
  return error;
}

form.addEventListener("submit", function (m) {
  const form = document.getElementById("form");
  const cnum = document.getElementById("cnum");
  const dexp = document.getElementById("dexp");
  const csv = document.getElementById("csv");

  let allErrors = 0;

  allErrors += checkRequired([cnum, dexp, csv]);
  allErrors += checkFix(cnum, 16);
  allErrors += checkFix(csv, 3);
  allErrors += ExpireDate(dexp);

  if (allErrors !== 0) {
    m.preventDefault();
    m.stopPropagation();
  }
});

//////////////////////---Admin insertion validation---//////////////////////////////////

// Check Date input
function checkDate(input) {
  let error = 0;
  const re = /^\d{4}\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])$/;
  if (re.test(input.value.trim())) {
    showSuccess(input);
  } else {
    showError(input, "date is not valid");
    ++error;
  }
  return error;
}

// Check Date input
function posterCheck(input) {
  let error = 0;
  const re = /([a-zA-Z0-9\s_\\.\-\(\):])+(.doc|.jpg|.pdf|.png|.PNG|.webp)$/;
  if (re.test(input.value.trim())) {
    showSuccess(input);
  } else {
    showError(input, "poster name is not valid");
    ++error;
  }
  return error;
}

function Zero(input) {
  let error = 0;
  if (input.value != 0) {
    showError(input, `${getFieldName(input)} must be  ${0} value`);
    ++error;
  } else {
    showSuccess(input);
  }
  return error;
}

form.addEventListener("submit", function (x) {
  const form = document.getElementsByClassName("form");
  const mname = document.getElementById("name");
  const lang = document.getElementById("lang");
  const duration = document.getElementById("duration");
  const rate = document.getElementById("rate");
  const genre = document.getElementById("genre");
  const status = document.getElementById("status");
  const ticketPrice = document.getElementById("ticketPrice");
  const NOsets = document.getElementById("NOseats");
  const date = document.getElementById("date");
  const poster = document.getElementById("poster");
  const details = document.getElementById("details");

  let allErrors = 0;

  allErrors += checkRequired([
    mname,
    lang,
    duration,
    rate,
    genre,
    status,
    ticketPrice,
    NOsets,
    date,
    poster,
    details,
  ]);

  allErrors += checkLength(mname, 3, 100);
  allErrors += checkLength(lang, 4, 50);
  allErrors += checkLength(duration, 2, 9);
  allErrors += Zero(rate);
  allErrors += checkLength(genre, 3, 100);
  allErrors += checkLength(status, 4, 8);
  allErrors += checkLength(ticketPrice, 1, 4);
  allErrors += checkLength(NOsets, 1, 1000);
  allErrors += posterCheck(poster);
  allErrors += checkLength(details, 20, 1000);

  if (allErrors !== 0) {
    x.preventDefault();
    x.stopPropagation();
  }
});
