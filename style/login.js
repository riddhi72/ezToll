$(function() {

  $("form[name='Login']").validate({

    rules: {
      licno: "required",
       password: {
        required: true,
        minlength: 8
      }


    },
    messages: {
      licno: "Please enter your license number",
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




