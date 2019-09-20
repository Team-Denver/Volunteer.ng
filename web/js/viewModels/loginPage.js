define([
  "ojs/ojcore",
  "knockout",
  "jquery",
  "ojs/ojselectcombobox",
  "ojs/ojinputtext",
  "ojs/ojbutton"
], function(o, e, n) {
  function l() {
    var l = this;
    (l.userlogin = e.observable()),
      (l.password = e.observable()),
      (l.res = e.observable()),
      (l.verifyInfo = function() {
        console.log("Button clicked..."),
          console.log(l.userlogin()),
          console.log(l.password());
        var t = JSON.stringify({
          username: l.userlogin(),
          password: l.password()
        });
        console.log(t),
          n.ajax({
            url: "http://volunteerng.herokuapp.com/api/login.php",
            method: "POST",
            contentType: "application/json",
            data: t,
            success: function(n) {
              if (1 == n.status) {
                console.log("logged in");
                console.log(n.user.fullname);
                console.log(n.user.user_id);
                console.log(n.user.email);
                console.log(n.user.phone);
                console.log(n.user.stack);
                console.log(n.user.user_location);
                (l.rootModel = e.dataFor(
                  document.getElementById("globalBody")
                )),
                  (l.rootModel.globalUserid = n.user.user_id),
                  (l.rootModel.globalFullname = n.user.fullname),
                  (l.rootModel.globalEmail = n.user.email),
                  (l.rootModel.globalPhone = n.user.phone),
                  (l.rootModel.globalStack = n.user.stack),
                  (l.rootModel.globalLocation = n.user.user_location),
                  o.Router.rootInstance.go("dashboard");
              } else
                console.log("invalid login / bad parsing"),
                  alert("Invalid Credentials! Try again");
            },
            error: function(o, e) {
              alert("Invalid Credentials. Try Again");
            }
          });
      }),
      (l.signupClick = function() {
        o.Router.rootInstance.go("signupPage");
      }),
      (l.handleActivated = function(o) {}),
      (l.handleAttached = function(o) {}),
      (l.handleBindingsApplied = function(o) {}),
      (l.handleDetached = function(o) {});
  }
  return new l();
});
