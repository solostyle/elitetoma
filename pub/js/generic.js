YUI({combine: true, timeout: 10000}).use("io",

										 function(Y) {

											 // Elements
											 var div = Y.Node.get('#container');
											 var inpComment = function() {
												 return document.getElementById('comment').value;
											 };
											 var inpName = function() {
												 return document.getElementById('name').value;
											 };


											 // Success and failure functions for different requests
											 var handleSuccess = function(ioId, o){
												 var indexRequest = Y.io('../comments/index',indexCallback);
											 };

											 var handleFailure = function(ioId, o){
												 if(o.responseText !== undefined){
													 var s = "<li>Transaction id: " + ioId + "</li>";
													 s += "<li>HTTP status: " + o.status + "</li>";
													 s += "<li>Status code message: " + o.statusText + "</li>";
													 div.set("innerHTML", s+div.get("innerHTML"));
												 }
											 };

											 function handleIndexSuccess(ioId,o) {
												 // TODO: really i should make this place html into a container
												 document.write(o.responseText);
											 }


											 /* Callback/Config objects for transactions */
											 var callback = {
												 method: "POST",
												 //data: 'comment='+inpComment()+'&name='+inpName(),
												 headers: { 'X-Transaction': 'POST Example'},
												 on: {
													 success: handleSuccess,
													 failure: handleFailure
												 }
											 };

											 var indexCallback ={
												 method:"GET",
												 on:{
													 success: handleIndexSuccess,
													 failure: handleFailure
												 }
											 };
											 

											 //Handler to make XHR request for adding a comment
											 function addCommentRequest(){
												 callback.data = 'comment='+inpComment()+'&name='+inpName();
												 var addRequest = Y.io('../comments/add', callback);
											 }

											 function deleteCommentRequest(id) {
												 callback.data = 'id='+id;
												 window.console.log(callback.data);
												 var deleteRequest = Y.io('../comments/delete', callback);
											 }

											 function indexRequest() {
												 var indexRequest = Y.io('../comments/index', indexCallback);
											 }
											 // Make a request when the button is clicked:
											 Y.on("click", handleClick, "#container");

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
											 
										 }
										);