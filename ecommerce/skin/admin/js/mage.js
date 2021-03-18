var Base = function () {
	// body...
};
Base.prototype = {
	alert : function () {
		
	},
	url : null,
	params : {},
	method : 'post',
	form : null,
	setUrl : function (url) {
		this.url = url;
		return this;
	},
	getUrl : function () {
		return this.url;
	},
	setMethod : function (method) {
		this.method = method;
		return this;
	},
	getMethod : function () {
		return this.method;
	},
	resetParams : function () {
		this.params = {};
		return this;
	},
	setParams : function (params) {
		this.params = params;
		return this;
	},
	getParams : function (key) {
		if (typeof key === 'undefined') {
			return this.params;
		}
		if (typeof this.params[key] == 'undefined') {
			return null;
		}
		return this.params[key];
	},
	addParam : function (key , value) {
		this.params[key] = value;
		return this;
	},
	removeParam : function (key) {
		if (typeof this.params[key] != 'undefined') {
			delete this.params[key];
		}
		return this;
	},
	setForm : function (form) {
		this.setUrl($(form).attr('action'));
        this.setParams(new FormData($(form)[0]));
        this.setMethod($(form).attr('method'));
		this.form = form;
		return this;
	},
	getForm : function () {
		return this.form;
	},
	load : function () {
		var self = this;
		$.ajax({
			method : this.getMethod(),
			url : this.getUrl(),
			data : this.getParams(),
			contentType:false,
			cache:false,
			processData:false,
			success : function (response) {
				$.each(response.element, function (i , element) {
					$(element.selector).html(element.html);
				});
			},
		});
	},
};
