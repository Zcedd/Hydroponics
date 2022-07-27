/*==================== SIGNUP/LOGIN BUTTON====================*/
const sign_in_btn = document.querySelector("#sign__in__btn");
const sign_up_btn = document.querySelector("#sign__up__btn");
const container = document.querySelector(".form__container ");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign__up__mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign__up__mode");
});