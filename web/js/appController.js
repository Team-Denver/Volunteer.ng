define(["ojs/ojcore","knockout","ojs/ojrouter","ojs/ojknockout","ojs/ojarraytabledatasource","ojs/ojoffcanvas"],function(e,o){function a(){var a=this,r=e.ResponsiveUtils.getFrameworkQuery(e.ResponsiveUtils.FRAMEWORK_QUERY_KEY.SM_ONLY);a.smScreen=e.ResponsiveKnockoutUtils.createMediaQueryObservable(r);var s=e.ResponsiveUtils.getFrameworkQuery(e.ResponsiveUtils.FRAMEWORK_QUERY_KEY.MD_UP);a.mdScreen=e.ResponsiveKnockoutUtils.createMediaQueryObservable(s),a.router=e.Router.rootInstance,a.router.configure({signupPage:{label:"Signup",isDefault:!0},loginPage:{label:"Login"},dashboard:{label:"Dashboard"}}),e.Router.defaults.urlAdapter=new e.Router.urlParamAdapter;var n=[{name:"Dashboard",id:"dashboard",iconClass:"oj-navigationlist-item-icon demo-icon-font-24 demo-chart-icon-24"}];a.navDataSource=new e.ArrayTableDataSource(n,{idAttribute:"id"}),a.mdScreen.subscribe(function(){e.OffcanvasUtils.close(a.drawerParams)}),a.drawerParams={displayMode:"push",selector:"#navDrawer",content:"#pageContent"},a.toggleDrawer=function(){return e.OffcanvasUtils.toggle(a.drawerParams)},$("#navDrawer").on("ojclose",function(){$("#drawerToggleButton").focus()}),a.appName=o.observable("OJET TEAM 7"),a.userLogin=o.observable("")}return new a});