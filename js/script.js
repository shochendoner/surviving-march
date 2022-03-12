// Change nav menu color if on that page!
let pageUrl = window.location.pathname;
let getNav = document.querySelectorAll("nav div ul li a");

for (let i = 0; i < getNav.length; i++) {
  // Get URL info
  let pageUrlName = pageUrl.split("/");
  let pageUrlLength = pageUrlName.length - 1;
  // Get links info
  let pageNav = getNav[i].pathname;
  let pageNavName = pageNav.split("/");
  let pageNavLength = pageNavName.length - 1;
  let pageFinalName = pageNavName[pageNavLength];
  let pageNavExists = pageUrl.includes(pageFinalName);
  // Change links color
  if (pageNavExists == true) {
    getNav[i].style.cssText = "color: #085cc9;";
  } else if (pageUrlName[pageUrlLength] == "") {
    getNav[0].style.cssText = "color: #085cc9;";
  }
}

var properties = ["name", "email", "pickOne", "pickTwo"];

$.each(properties, function (i, val) {
  var orderClass = "";

  $("#" + val).click(function (e) {
    e.preventDefault();
    $(".filter__link.filter__link--active")
      .not(this)
      .removeClass("filter__link--active");
    $(this).toggleClass("filter__link--active");
    $(".filter__link").removeClass("asc desc");

    if (orderClass == "desc" || orderClass == "") {
      $(this).addClass("asc");
      orderClass = "asc";
    } else {
      $(this).addClass("desc");
      orderClass = "desc";
    }

    var parent = $(this).closest(".header__item");
    var index = $(".header__item").index(parent);
    var $table = $(".table-content");
    var rows = $table.find(".table-row").get();
    var isSelected = $(this).hasClass("filter__link--active");
    var isNumber = $(this).hasClass("filter__link--number");

    rows.sort(function (a, b) {
      var x = $(a).find(".table-data").eq(index).text();
      var y = $(b).find(".table-data").eq(index).text();

      if (isNumber == true) {
        if (isSelected) {
          return x - y;
        } else {
          return y - x;
        }
      } else {
        if (isSelected) {
          if (x < y) return -1;
          if (x > y) return 1;
          return 0;
        } else {
          if (x > y) return -1;
          if (x < y) return 1;
          return 0;
        }
      }
    });

    $.each(rows, function (index, row) {
      $table.append(row);
    });

    return false;
  });
});

import axios from "axios";

const options = {
  method: "GET",
  url: "https://thesportsdb.p.rapidapi.com/searchplayers.php",
  params: { t: "Arsenal" },
  headers: {
    "x-rapidapi-host": "thesportsdb.p.rapidapi.com",
    "x-rapidapi-key": "0346387995msh2c1248af75d544ep175845jsn782b1a09581f",
  },
};

axios
  .request(options)
  .then(function (response) {
    console.log(response.data);
  })
  .catch(function (error) {
    console.error(error);
  });
