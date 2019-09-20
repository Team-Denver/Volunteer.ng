define(["ojs/ojcore", "knockout", "jquery"], function(o, e, l) {
  function a() {
    var o = this;
    (o.fullname = e.observable()),
      (o.userid = e.observable()),
      (o.email = e.observable()),
      (o.phone = e.observable()),
      (o.stack = e.observableArray()),
      (o.location = e.observable()),
      (o.rootModel = e.dataFor(document.getElementById("globalBody"))),
      (o.fullname = o.rootModel.globalFullname),
      (o.userid = o.rootModel.globalUserid),
      (o.email = o.rootModel.globalEmail),
      (o.phone = o.rootModel.globalPhone),
      (o.stack = o.rootModel.globalStack),
      (o.location = o.rootModel.globalLocation),
      (o.handleActivated = function(o) {}),
      (o.handleAttached = function(o) {}),
      (o.handleBindingsApplied = function(o) {}),
      (o.handleDetached = function(o) {});
  }
  return new a();
});
