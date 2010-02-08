this.Elitetoma.Comments = this.Elitetoma.Comments || function() {

	// Elements
	var commentsDivElem = Ydom.get('comments'),
	commentsWebPartElem = Ydom.get('commentsWP'),
	formNameElem = Ydom.get('name'),
	formCommentElem = Ydom.get('comment'),
	inpComment = function() {return formCommentElem.value;}, // TODO: escape quotes!
	inpName = function() {return formNameElem.value;}, // TODO: escape quotes!
	formDivElem = Ydom.get('commentsForm'),
	formToggleDivElem = Ydom.get('addAComment');

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
		var addRequest = AjaxR('../comments/add', callback);
	};

	var deleteCommentRequest = function(id) {
		callback.data = 'id='+id;
		var deleteRequest = AjaxR('../comments/delete', callback);
	};

	var allRequest = function() {
		var allRequest = AjaxR('../comments/all', allCallback);
	};

	var toggleForm = function() {
		// todo: there's got to be a better way to reset these.
		formDivElem.style.display = (formDivElem.style.display=='block')?'':'block';
		formToggleDivElem.innerHTML = (formDivElem.style.display=='block')?'Close':'Add a Comment';
		if (formDivElem.style.display=='') {
			formNameElem.value = 'name';
			formCommentElem.value = 'comment';
		}
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
	Listen("click", handleClick, 'commentsWP');

}();