<?php

class CommentsController extends Controller {

	function view($id = null,$name = null) {
        $this->Comment->id = $id;
        $comment = $this->Comment->search();
		$this->set('comment',$comment);
	}

	function index() {
        $this->Comment->orderBy('id','DESC');
		$this->set('comments',$this->Comment->search());
	}

/*doesn't like longtext. had to change the comment to be varchar(255) */
	function add() {
		$this->Comment->comment = $_POST['comment'];
		$this->Comment->name = $_POST['name'];
		$this->Comment->save();
	}

	function delete($id) {
        $this->Comment->id = $id;
        $this->Comment->delete();
	}
}
