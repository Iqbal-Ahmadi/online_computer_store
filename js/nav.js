let bars = document.querySelector("#bars");
let nav_items = document.querySelectorAll(".nav-item");
let sub_links = document.querySelectorAll(".sub-link");

// add bottom arrow to nav-item in navbar of index.php

let data_links = ["", "catagories", "brands"];
for (let re = 1; re < nav_items.length; re++) {
  nav_items[
    re
  ].innerHTML += `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5" style="height:1em; width:1em; margin-top: .45em;" data-link=${data_links[re]} >
  <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
</svg>`;
}

// show and hide the side bar by side-bar-icon
bars.addEventListener("click", () => {
  document.querySelector(".nav-bar").classList.toggle("active");
});

// dropdowm targeted for dropdown menue
// display it
document.querySelectorAll(".dropdowns").forEach((element) => {
  element.addEventListener("mouseenter", () => {
    document.querySelectorAll(".dropdowns-menu").forEach((element) => {
      element.classList.add("d-none");
    });
    document
      .getElementById(`${element.id}-sub-links`)
      .classList.remove("d-none");
  });
});

// lhide it
document.querySelectorAll(".dropdowns").forEach((element) => {
  element.addEventListener("mouseleave", () => {
    document.getElementById(`${element.id}-sub-links`).classList.add("d-none");
  });
});

// dropdown menue
document.querySelectorAll(".dropdowns-menu").forEach((element) => {
  element.addEventListener("mouseenter", () =>
    element.classList.toggle("d-none")
  );
});

document.querySelectorAll(".dropdowns-menu").forEach((element) => {
  element.addEventListener("mouseleave", () =>
    element.classList.toggle("d-none")
  );
});