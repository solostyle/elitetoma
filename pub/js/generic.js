if (this.elitetoma) {
	// do nothing
} else this.elitetoma = function() {

	var ydom = YAHOO.util.Dom,
	ycnxn = YAHOO.util.Connect,
	ajaxR = function (url, callback) {
		ycnxn.asyncRequest(callback.method, url, callback, callback.data);
	},
	yevent = YAHOO.util.Event,
	listen = function (event, fn, elid) {
		yevent.addListener(ydom.get(elid), event, fn);
	};

	// Elements
	var div = ydom.get('container'),
	inpComment = function() {return ydom.get('comment').value;},
	inpName = function() {return ydom.get('name').value;};

	// Success and failure functions for different requests
	var handleSuccess = function(o){
		var indexRequest = ajaxR('../comments/index',indexCallback);
	};

	var handleFailure = function(o){
		if(o.responseText !== undefined){
			div.set("innerHTML", "request failure: " + o.responseText + div.get("innerHTML"));
		}
	};

	var handleIndexSuccess = function(o) {
		// TODO: really i should make this place html into a container
		document.write(o.responseText);
	};

	/* Callback/Config objects for transactions */
	var callback = {
		method: "POST",
		success: handleSuccess,
		failure: handleFailure
	};

	var indexCallback ={
		method:"GET",
		success: handleIndexSuccess,
		failure: handleFailure
	};


	//Handler to make XHR request for adding a comment
	function addCommentRequest(){
		callback.data = 'comment='+inpComment()+'&name='+inpName();
		var addRequest = ajaxR('../comments/add', callback);
	}

	function deleteCommentRequest(id) {
		callback.data = 'id='+id;
		var deleteRequest = ajaxR('../comments/delete', callback);
	}

	function indexRequest() {
		var indexRequest = ajaxR('../comments/index', indexCallback);
	}

	// Make a request when the button is clicked:
	listen("click", handleClick, "container");

	function handleClick(e) {
		var targetId= e.target.getAttribute('id'),
		// clean the id string, everything before a number
		command = targetId.split('_', 2)[0],
		id = targetId.split('_', 2)[1];
		switch (command) {
		case "addComment": 
			addCommentRequest();
			break;
		case "deleteComment":
			deleteCommentRequest(id);
			break;
		default:
			break;
		}
	}
}();