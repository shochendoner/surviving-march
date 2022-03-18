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

function Insert_record() {
  $(document).on("click", "#btn_register", function () {
    var User = $("#UserName").val();
    var DayOneWin = TRUE;

    if (User == "" || Email == "") {
      $("#message").html("Please Fill in the Blanks ");
    } else {
      $.ajax({
        url: "win.php",
        method: "post",
        data: { UName: User, DayOneWin: DayOneWin },
        success: function (data) {
          $("#message").html(data);
          $("#Registration").modal("show");
          $("form").trigger("reset");
          view_record();
        },
      });
    }
  });

  $(document).on("click", "#btn_close", function () {
    $("form").trigger("reset");
    $("#message").html("");
  });
}

function view_record() {
  $.ajax({
    url: "view.php",
    method: "post",
    success: function (data) {
      data = $.parseJSON(data);
      if (data.status == "success") {
        $("#table").html(data.html);
      }
    },
  });
}

function get_record() {
  $(document).on("click", "#btn_edit", function () {
    var ID = $(this).attr("data-id");
    $.ajax({
      url: "get_data.php",
      method: "post",
      data: { UserID: ID },
      dataType: "JSON",
      success: function (data) {
        $("#Up_User_ID").val(data[0]);
        $("#Up_UserName").val(data[1]);
        $("#Up_UserEmail").val(data[2]);
        $("#update").modal("show");
      },
    });
  });
}

function update_record() {
  $(document).on("click", "#btn_update", function () {
    var UpdateID = $("#Up_User_ID").val();
    var UpdateUser = $("#Up_UserName").val();
    var UpdateEmail = $("#Up_UserEmail").val();

    if (UpdateUser == "" || UpdateEmail == "") {
      $("#up-message").html("please Fill in the Blanks");
      $("#update").modal("show");
    } else {
      $.ajax({
        url: "update.php",
        method: "post",
        data: { U_ID: UpdateID, U_User: UpdateUser, U_Email: UpdateEmail },
        success: function (data) {
          $("#up-message").html(data);
          $("#update").modal("show");
          view_record();
        },
      });
    }
  });
}

function delete_record() {
  $(document).on("click", "#btn_delete", function () {
    var Delete_ID = $(this).attr("data-id1");
    $("#delete").modal("show");

    $(document).on("click", "#btn_delete_record", function () {
      $.ajax({
        url: "delete.php",
        method: "post",
        data: { Del_ID: Delete_ID },
        success: function (data) {
          $("#delete-message").html(data).hide(5000);
          view_record();
        },
      });
    });
  });
}
