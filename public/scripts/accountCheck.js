const sign_in_btn = document.querySelector("#signInBtn");
const sign_up_btn = document.querySelector("#signUpBtn");
const container = document.querySelector(".mainContainer");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("signUpAnimation");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("signUpAnimation");
});
