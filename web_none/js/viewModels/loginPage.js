define(["ojs/ojcore","knockout","jquery","ojs/ojselectcombobox","ojs/ojinputtext","ojs/ojbutton"],function(e,o,n){function a(){var a=this;a.userlogin=o.observable(),a.password=o.observable(),a.res=o.observable(),a.progressValue=o.observable(20),a.pageMessage=o.observable(""),a.verifyInfo=function(){a.progressValue(-1),a.pageMessage("Logging In! Please Wait...."),console.log("Button clicked..."),console.log(a.userlogin()),console.log(a.password());var o=JSON.stringify({username:a.userlogin(),password:a.password()});console.log(o),n.ajax({url:"http://volunteerng.herokuapp.com/api/login.php",method:"POST",contentType:"applicantion/json",data:o,success:function(o){1==o.status?(console.log("logged in"),a.pageMessage("Logged In! Welcome back"),e.Router.rootInstance.go("dashboard")):(console.log("invalid login / bad parsing"),a.pageMessage="Invalid Credentials. Try Again",alert("Invalid Credentials! Try again"))},error:function(e,o){a.pageMessage("Invalid Credentials. Try Again"),a.pageMessage="Invalid Credentials. Try Again",alert("Invalid Credentials. Try Again")}})},a.signupClick=function(){e.Router.rootInstance.go("signupPage")},a.handleActivated=function(e){},a.handleAttached=function(e){},a.handleBindingsApplied=function(e){},a.handleDetached=function(e){}}return new a});