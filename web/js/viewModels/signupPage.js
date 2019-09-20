define([
  "ojs/ojcore",
  "knockout",
  "jquery",
  "ojs/ojselectcombobox",
  "ojs/ojinputtext",
  "ojs/ojbutton"
], function(e, o, n) {
  function a() {
    var a = this;
    (a.firstname = o.observable()),
      (a.middlename = o.observable()),
      (a.lastname = o.observable()),
      (a.email = o.observable()),
      (a.username = o.observable()),
      (a.phone = o.observable()),
      (a.stack = o.observableArray()),
      (a.location = o.observable()),
      (a.password = o.observable()),
      (a.verifyPassword = o.observable()),
      (a.submitInfo = function() {
        console.log("Button clicked..");
        var o = a.firstname() + " " + a.middlename() + " " + a.lastname(),
          t = a.stack().join();
        console.log(t), console.log(o), console.log(a.email());
        var l = JSON.stringify({
          fullname: o,
          email: a.email(),
          username: a.username(),
          user_location: a.location(),
          phone: a.phone(),
          stack: t,
          password: a.password()
        });
        console.log(l),
          n.ajax({
            url: "http://volunteerng.herokuapp.com/api/create_user.php",
            method: "POST",
            contentType: "application/json",
            data: l,
            success: function(o) {
              1 == o.status
                ? (console.log("registered"),
                  (l.rootModel = e.dataFor(
                    document.getElementById("globalBody")
                  )),
                  (l.rootModel.progressMessage = "Registred Succesfully!"),
                  e.Router.rootInstance.go("loginPage"))
                : (console.log("invalid login / bad parsing"),
                  alert("Could not Register"));
            },
            error: function(e, o) {
              alert("Could not Register");
            }
          });
      }),
      (a.loginClick = function() {
        e.Router.rootInstance.go("loginPage");
      }),
      (a.handleActivated = function(e) {}),
      (a.handleAttached = function(e) {}),
      (a.handleBindingsApplied = function(e) {}),
      (a.handleBindingsApplied = function(e) {}),
      (a.handleDetached = function(e) {});
  }
  return new a();
});
