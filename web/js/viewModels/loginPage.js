define(["ojs/ojcore","knockout","jquery","ojs/ojselectcombobox","ojs/ojinputtext","ojs/ojbutton"],function(o,e,n){function l(){var l=this;l.userlogin=e.observable(),l.password=e.observable(),l.res=e.observable(),l.verifyInfo=function(){console.log("Button clicked..."),console.log(l.userlogin()),console.log(l.password());var t=JSON.stringify({username:l.userlogin(),password:l.password()});console.log(t),n.ajax({url:"http://volunteerng.herokuapp.com/api/login.php",method:"POST",contentType:"application/json",data:t,success:function(n){if(1==n.status){console.log("logged in");var t=n.user;l.rootModel=e.dataFor(document.getElementById("globalBody")),l.rootModel.globalUserid=t.user_id,l.rootModel.globalFullname=t.fullname,l.rootModel.globalEmail=t.email,l.rootModel.globalPhone=t.phone,l.rootModel.globalStack=t.phone,l.rootModel.globalLocation=t.location,o.Router.rootInstance.go("dashboard")}else console.log("invalid login / bad parsing"),alert("Invalid Credentials! Try again")},error:function(o,e){alert("Invalid Credentials. Try Again")}})},l.signupClick=function(){o.Router.rootInstance.go("signupPage")},l.handleActivated=function(o){},l.handleAttached=function(o){},l.handleBindingsApplied=function(o){},l.handleDetached=function(o){}}return new l});