var users = [];
var idCounter = 1;

$("#tutorial-form").validate({
  rules: {
    first_name: {
      required: true,
      minlength: 3,
    },
    password: {
      required: true,
      minlength: 3,
    },
    confirm_password: {
        equalTo: "#password",
    },
  },
  messages: {
    first_name: {
      required: "You have to fill it in!",
      minlength: "Too short!",
    },
    confirm_password: {
        equalTo: "The password and confirm password fields should be the same",
    },
  },
  submitHandler: function (form, event) {
    apiFormHandler(form, event); //Handles the form submission event by calling apiFormHandler to submit the form data.
  },
});

function objectFormHandler(form, event) {
  
  event.preventDefault();
  blockUi("#tutorial-form");
  let data = serializeForm(form);  // converts the form fields into a JSON object for easier handling

  data["id"] = idCounter;
  
  idCounter += 1;
  users.push(data);

  
}

function apiFormHandler(form, event) {
  event.preventDefault();
  blockUi("#tutorial-form");
  let data = serializeForm(form);

  $.post(
    "http://reqres.in/api/users",
    JSON.stringify(data)
  ).done(function (data) {
    $("#tutorial-form")[0].reset();
    $("#toast-description").text(data.message);
    $("#success-toast").toast("show");
  }).fail(function (xhr) {
    $("#toast-description").text(xhr.responseJSON.message);
    $("#success-toast").toast("show");
  }).always(function() {
    unblockUi("#tutorial-form");
  });
}

blockUi = (element) => {
  $(element).block({
    message: '<div class="spinner-border text-primary" role="status"></div>',
    css: {
      backgroundColor: "transparent",
      border: "0",
    },
    overlayCSS: {
      backgroundColor: "#000",
      opacity: 0.25,
    },
  });
};

unblockUi = (element) => {
  $(element).unblock({});
};

serializeForm = (form) => {
  let jsonResult = {};
  $.each($(form).serializeArray(), function () {
    jsonResult[this.name] = this.value;
  });
  return jsonResult;
};

editUserDetails = (userId) => {
  var selectedUser = {};
  $.each(users, (idx, user) => {
    if (user.id === userId) {
      selectedUser = user;
      return false; // break;
    }
  });

  if (selectedUser !== undefined) {
    $("#id").val(selectedUser.id);
    $("#first_name").val(selectedUser.first_name);
    $("#email").val(selectedUser.email);
    $("#password").val(selectedUser.password);
  }
};

