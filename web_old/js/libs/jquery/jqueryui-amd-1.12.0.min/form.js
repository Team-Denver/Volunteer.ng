!function(n){"function"==typeof define&&define.amd?define(["jquery","./version"],n):n(jQuery)}(function(n){return n.fn.form=function(){return"string"==typeof this[0].form?this.closest("form"):n(this[0].form)}});