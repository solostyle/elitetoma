this.Elitetoma.Shell = this.Elitetoma.Shell || function() {

	return {

		HandleDomReady: function(obj) {
			//onDOMReady uses the Custom Event signature, with the object
			//passed in as the third argument:
			//type <string>, args <array>, customobject <object>
			//"DOMReady", [], obj
			if (console.log) console.log("onDomReady event fired.");
			
			// load comments web part
			Elitetoma.Comments.Load();

			// load updates web part
			Elitetoma.Updates.Load();
		},

		LoadWebParts: function() {
			Yevent.onDOMReady(this.HandleDomReady);
		}
	};

}();

this.Elitetoma.Shell.LoadWebParts();