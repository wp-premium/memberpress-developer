/** Some basic methods to validate form elements */
var mpValidateEmail = function (email) {
  //In case the email is not entered yet and is not required
  if (!email || 0 === email.length) {
    return true;
  }

  var filter = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,25}$/i;

  return filter.test(email);
};

var mpValidateNotBlank = function (val) {
  return (val && val.length > 0);
};
