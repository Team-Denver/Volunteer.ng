define(["ojs/ojcore", "knockout", "jquery", "ojs/ojselectcombobox", "ojs/ojinputtext", "ojs/ojbutton"], function (o, n, e) {
    function t() {
        var t = this;
        t.userlogin = n.observable(), t.password = n.observable(), t.res = n.observable(), t.verifyInfo = function () {
            console.log("Button clicked..."), console.log(t.userlogin()), console.log(t.password());
            var n = {
                username: t.userlogin(),
                password: t.password()
            };
            console.log(n), e.ajax({
                url: "https://volunteerng.herokuapp.com/api/login.php",
                method: "POST",
                contentType: "application/json",
                data: n,
                success: function (n) {
                    1 == n.status ? (console.log("logged in"), o.Router.rootInstance.go("dashboard")) : (console.log("invalid login / bad parsing"), alert("login failed"))
                },
                error: function (o, n) {
                    console.log("API error"), console.log(o), alert("internal server error")
                }
            })
        }, t.signupClick = function () {
            o.Router.rootInstance.go("signupPage")
        }, t.handleActivated = function (o) {}, t.handleAttached = function (o) {}, t.handleBindingsApplied = function (o) {}, t.handleDetached = function (o) {}
    }
    return new t
});