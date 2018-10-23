$(function() {

  $("form[name='Registration']").validate({

    rules: {
      licno: "required",
      dname: "required",
      dob: "required",
      contact:"required",
      Vehicle type: "required",
      password: {
        required: true,
        minlength: 8
      },

    },

    messages: {
      licno: "Please enter your license number",
      dname: "Please enter your name of the driver",
      dob: "Please enter the date",
      contact: "required",
      Vehicle Type: "required",
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },

    },
    submitHandler: function(form) {
      form.submit();
    }
  });
});