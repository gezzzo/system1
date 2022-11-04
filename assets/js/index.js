const loginbtn = document.getElementById("loginbtn");
const logincard = document.getElementById("logincard");
const regbtn = document.getElementById("regbtn");
const regcard = document.getElementById("regcard");

loginbtn.onclick = () => {
    logincard.style.display = "block";
    regcard.style.display = "none";
};

regbtn.onclick = () => {
    logincard.style.display = "none";
    regcard.style.display = "block";
};

const mailAlret= document.getElementById("mail-alret");
function ValidateEmail(inputText) {
    var mailformat = /^\d{9}@+(s.mu.edu.sa)+$/;
    if (inputText.value.match(mailformat)) {
        return true;
    } else {
        mailAlret.classList.remove("d-none");
        document.form1.text1.focus();
        return false;
    }
}