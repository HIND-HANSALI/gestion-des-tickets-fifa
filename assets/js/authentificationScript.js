/* ======================================= SignIn ======================================= */
EmailLogin = document.querySelector(".emailSignin");
passwordLogin = document.querySelector(".passwordSignin");

iconenvelope = document.querySelector(".fa-envelope");
iconlock = document.querySelector(".fa-lock");
iconlockRepPsw = document.querySelector(".lockRepeatpassword");
iconuser = document.querySelector(".fa-user");

validationInputSignin = document.querySelector(".validation-input-signin");
validationInputSignup = document.querySelector(".validation-input-signup");

errorName = document.querySelector(".errorName");
errorEmail = document.querySelector(".errorEmail");
errorpassword = document.querySelector(".errorPassword");
errorpasswordrepaeat = document.querySelector(".errorRPassword");

buttonSubmitlogin = document.querySelector("#login");

const form = document.forms[0];
let text = "";
for (let i = 0; i < form.length; i++) {
  console.log(form.elements[i].className);
}

function valideSignin() {
  if (EmailLogin.value === "" || passwordLogin.value === "") {
    if (EmailLogin.value === "") {
      errorEmail.style.display = "block";
      iconenvelope.style.color = "#f3aea9";
      EmailLogin.style.borderBottomColor = "#f3aea9";
    }

    if (passwordLogin.value === "") {
      errorpassword.style.display = "block";
      iconlock.style.color = "#f3aea9";
      passwordLogin.style.borderBottomColor = "#f3aea9";
    }

    buttonSubmitlogin.setAttribute("type", "button");
    validationInputSignin.style.display = "flex";
  } else {
    buttonSubmitlogin.setAttribute("type", "submit");
    validationInputSignin.style.display = "none";
  }
}

function checkEmailSignin() {
  var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

  if (EmailLogin.value.match(mailformat)) {
    buttonSubmitlogin.setAttribute("type", "submit");
    errorEmail.style.display = "none";
    EmailLogin.style.borderBottomColor = "#85E8FD";
    iconenvelope.style.color = "#85E8FD";
  } else {
    buttonSubmitlogin.setAttribute("type", "button");
    errorEmail.style.display = "block";
    EmailLogin.style.borderBottomColor = "#f3aea9";
    iconenvelope.style.color = "#f3aea9";
  }
}

function checkPasswordSignin() {
  if (passwordLogin.value == "" || passwordLogin.value.length < 8) {
    errorpassword.style.display = "block";
    iconlock.style.color = "#f3aea9";
    passwordLogin.style.borderBottomColor = "#f3aea9";
  } else {
    errorpassword.style.display = "none";
    iconlock.style.color = "#85E8FD";
    passwordLogin.style.borderBottomColor = "#85E8FD";
  }
}

/* ======================================= SignUp ======================================= */

NameSinup = document.querySelector(".nameSignup");
EmailSinup = document.querySelector(".emailSignup");
passwordSinup = document.querySelector(".passwordSignup");
PasswordSignuprepeat = document.querySelector(".PasswordRPassword");

buttonSubmit = document.querySelector("#signup");

function valideSignup() {
  if (
      NameSinup.value == "" ||
      EmailSinup.value == "" ||
      passwordSinup.value == "" ||
      PasswordSignuprepeat.value == ""
  ) {
    if (NameSinup.value === "") {
      errorName.style.display = "block";
      iconuser.style.color = "#f3aea9";
      NameSinup.style.borderBottomColor = "#f3aea9";
    }

    if (EmailSinup.value === "") {
      errorEmail.style.display = "block";
      iconenvelope.style.color = "#f3aea9";
      EmailSinup.style.borderBottomColor = "#f3aea9";
    }

    if (passwordSinup.value === "") {
      errorpassword.style.display = "block";
      iconlock.style.color = "#f3aea9";
      passwordSinup.style.borderBottomColor = "#f3aea9";
    }

    if (PasswordSignuprepeat.value === "") {
      errorpasswordrepaeat.style.display = "block";
      iconlockRepPsw.style.color = "#f3aea9";
      PasswordSignuprepeat.style.borderBottomColor = "#f3aea9";
    }

    buttonSubmit.setAttribute("type", "button");
    validationInputSignup.style.display = "flex";
  } else {
    buttonSubmit.setAttribute("type", "submit");
    validationInputSignup.style.display = "none";
  }
}

function checkName() {
  var NameFormat = /^([a-zA-Z0-9]*[ ]{0,1}[a-zA-Z0-9]*)$/;
  if (NameSinup.value.match(NameFormat)) {
    buttonSubmit.setAttribute("type", "submit");
    errorName.style.display = "none";
    NameSinup.style.borderBottomColor = "#85E8FD";
    iconuser.style.color = "#85E8FD";
  } else {
    buttonSubmit.setAttribute("type", "button");
    errorName.style.display = "block";
    NameSinup.style.borderBottomColor = "#f3aea9";
    iconuser.style.color = "#f3aea9";
  }
}

function checkEmailSignup() {
  var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

  if (EmailSinup.value.match(mailformat)) {
    buttonSubmit.setAttribute("type", "submit");
    errorEmail.style.display = "none";
    EmailSinup.style.borderBottomColor = "#85E8FD";
    iconenvelope.style.color = "#85E8FD";
  } else {
    buttonSubmit.setAttribute("type", "button");
    errorEmail.style.display = "block";
    EmailSinup.style.borderBottomColor = "#f3aea9";
    iconenvelope.style.color = "#f3aea9";
  }
}

function checkPasswordSignup() {
  if (passwordSinup.value == "" || passwordSinup.value.length < 8) {
    buttonSubmit.setAttribute("type", "button");
    errorpassword.style.display = "block";
    iconlock.style.color = "#f3aea9";
    passwordSinup.style.borderBottomColor = "#f3aea9";
  } else {
    buttonSubmit.setAttribute("type", "submit");
    errorpassword.style.display = "none";
    iconlock.style.color = "#85E8FD";
    passwordSinup.style.borderBottomColor = "#85E8FD";
  }
}

function checkMatchPassword() {
  console.log(passwordSinup.value);
  console.log(PasswordSignuprepeat.value);
  if (
      passwordSinup.value !== PasswordSignuprepeat.value ||
      PasswordSignuprepeat.value === ""
  ) {
    console.log("hhhh");
    buttonSubmit.setAttribute("type", "button");
    errorpasswordrepaeat.style.display = "block";
    iconlockRepPsw.style.color = "#f3aea9";
    PasswordSignuprepeat.style.borderBottomColor = "#f3aea9";
  } else {
    buttonSubmit.setAttribute("type", "submit");
    errorpasswordrepaeat.style.display = "none";
    iconlockRepPsw.style.color = "#85E8FD";
    PasswordSignuprepeat.style.borderBottomColor = "#85E8FD";
  }
}

/* ======================================= Update ======================================= */

NameEdit = document.querySelector("#user_name");
EmailEdit = document.querySelector("#user_email");
passwordEdit = document.querySelector("#user_password");
PasswordEditrepeat = document.querySelector("#user_Rpassword");

buttonUpdate = document.querySelector("#update");

function valideUpdate() {
  if (
      NameEdit.value == "" ||
      EmailEdit.value == ""
  ) {
    if (NameEdit.value === "") {
      errorName.style.display = "block";
    }

    if (EmailEdit.value === "") {
      errorEmail.style.display = "block";
    }

    buttonUpdate.setAttribute("type", "button");
    validationInputSignup.style.display = "flex";
  } else {
    buttonUpdate.setAttribute("type", "submit");
    validationInputSignup.style.display = "none";
  }
}

function checkNameUpdate() { 
  var NameFormat = /^([a-zA-Z0-9]*[ ]{0,1}[a-zA-Z0-9]*)$/;
  if (NameEdit.value.match(NameFormat)) {
    buttonUpdate.setAttribute("type", "submit");
    errorName.style.display = "none";
  } else {
    buttonUpdate.setAttribute("type", "button");
    errorName.style.display = "block";
  }
}

function checkEmailUpdate() {
  var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

  if (EmailEdit.value.match(mailformat)) {
    buttonUpdate.setAttribute("type", "submit");
    errorEmail.style.display = "none";
  } else {
    buttonUpdate.setAttribute("type", "button");
    errorEmail.style.display = "block";
  }
}

function checkMatchPasswordUpdate() {
  if (passwordEdit.value !== PasswordEditrepeat.value) {
    buttonUpdate.setAttribute("type", "button");
    errorpasswordrepaeat.style.display = "block";
  } else {
    buttonUpdate.setAttribute("type", "submit");
    errorpasswordrepaeat.style.display = "none";
  }
}
