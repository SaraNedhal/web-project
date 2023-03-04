"use strict";
let tabs = document.querySelectorAll(".tabs li");
let tabsArray = Array.from(tabs);

let movies = document.querySelectorAll(".movieRows");
let moviesArray = Array.from(movies);

tabsArray.forEach((element) => {
  console.log("HI");
  element.addEventListener("click", function (e) {
    tabsArray.forEach((element) => {
      element.classList.remove("active");
    });
    e.currentTarget.classList.add("active");
    moviesArray.forEach((div) => {
      div.classList.add("none");
    });
    document
      .querySelector(e.currentTarget.dataset.cont)
      .classList.remove("none");
  });
});
