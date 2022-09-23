const verticalNavBar = document.querySelector(".vericalAdminBar");
const menuBar = document.getElementById("menuBarAdmin");
const adminVerticalNavbar = document.getElementById("adminVerticalNavbar");
const mainContentAdminPannel = document.getElementById(
  "mainContentAdminPannel"
);

menuBar.addEventListener("click", () => {
  adminVerticalNavbar.classList.toggle("d-none");
  mainContentAdminPannel.classList.toggle("col-12");
});
$(window).on("scroll", function () {
  if ($(this).scrollTop() > 20) {
    verticalNavBar.style.top = "0";
  } else {
    verticalNavBar.style.top = "70px";
  }
});
