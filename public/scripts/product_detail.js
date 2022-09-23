const tabBtn = document.querySelectorAll(".tabBtn");
const aboutCollapse = document.querySelector(".tabBtn_row");
const tabsContainer = document.querySelector(".tabsContainer");

tabBtn.forEach((item, index, list) => {
    item.addEventListener("click", () => {
        item.classList.add("active");
        tabsContainer.children[index].classList.add("active-tab");
        for (let i = 0; i < tabBtn.length; i++) {
            if (i !== index) {
                aboutCollapse.children[i].classList.remove("active");
                tabsContainer.children[i].classList.remove("active-tab");
            }
        }
    });
});