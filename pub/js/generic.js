if (this.elitetoma) {
	// do nothing
} else this.elitetoma = function() {

	// Libraries and functions
	var ydom = YAHOO.util.Dom,
	ycnxn = YAHOO.util.Connect,
	ajaxR = function (url, callback) {
		ycnxn.asyncRequest(callback.method, url, callback, callback.data);
	},
	yevent = YAHOO.util.Event,
	listen = function (event, fn, el) {
		yevent.addListener(el, event, fn);
	};

	// Elements
	var commentsDivElem = ydom.get('commentsWP'),
	inpComment = function() {return ydom.get('comment').value;},
	inpName = function() {return ydom.get('name').value;},
	formDivElem = ydom.get('commentsForm');

	// Success and failure functions for different requests
	var handleSuccess = function(o){
		allRequest();
	};

	var handleFailure = function(o){
		if(o.responseText !== undefined){
			commentsDivElem.innerHTML = "request failure: " + o.responseText + commentsDivElem.innerHTML;
		}
	};

	var handleAllSuccess = function(o) {
		if(o.responseText !== undefined){
			commentsDivElem.innerHTML = o.responseText;
		}
	};

	/* Callback/Config objects for transactions */
	var callback = {
		method: "POST",
		success: handleSuccess,
		failure: handleFailure
	};

	var allCallback ={
		method:"GET",
		success: handleAllSuccess,
		failure: handleFailure
	};

	//Handler to make XHR request for adding a comment
	var addCommentRequest = function(){
		callback.data = 'comment='+inpComment()+'&name='+inpName();
		var addRequest = ajaxR('../comments/add', callback);
	};

	var deleteCommentRequest = function(id) {
		callback.data = 'id='+id;
		var deleteRequest = ajaxR('../comments/delete', callback);
	};

	var allRequest = function() {
		var allRequest = ajaxR('../comments/all', allCallback);
	};

	var toggleForm = function() {
		formDivElem.style.display=(formDivElem.style.display=='none')?'block':'none';
	};

	var handleClick = function(e) {
		var targetId= e.target.getAttribute('id'),
		// clean the id string, everything before a number
		command = (targetId)?targetId.split('_', 2)[0]:null;
		id = (targetId)?targetId.split('_', 2)[1]:null;
		switch (command) {
		case "addComment": 
			addCommentRequest();
			break;
		case "deleteComment":
			deleteCommentRequest(id);
			break;
		case "addAComment":
			toggleForm();
			break;
		default:
			break;
		}
	};

	// Listen to all clicks in this web part
	listen("click", handleClick, commentsDivElem);

}();