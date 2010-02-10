<?php

class CommentsController extends Controller {

	function view($id = null,$name = null) {
        $this->Comment->id = $id;
        $comment = $this->Comment->search();
		$this->set('comment',$comment);
	}

	function index($isAjaxR) {
        if ($isAjaxR) $this->doNotRenderHeader = true;
        $this->Comment->orderBy('id','DESC');
		$this->set('comments',$this->Comment->search());
	}

    function all() {
        $this->doNotRenderHeader = true; /* i want this to be an ajax request*/
        $this->Comment->orderBy('id','DESC');
		$this->set('comments',$this->Comment->search());
    }

/*doesn't like longtext. had to change the comment to be varchar(255) */
/* make sure ID is big enough */
	function add() {
        $this->doNotRenderHeader = true; /* i want this to be an ajax request*/
		$this->Comment->comment = $_POST['comment'];
		$this->Comment->name = $_POST['name'];
		$this->Comment->save();
	}

	function delete() {
        $this->doNotRenderHeader = true;
        $this->Comment->id = $_POST['id'];
        $this->Comment->delete();
	}
}
