<?php

class CommentsController extends Controller {

	function view($id = null,$name = null) {

		$this->set('title',$name.' - My Comments App');
		$this->set('comment',$this->Comment->select($id));

	}

	function viewall() {

		$this->set('title','All Comments - My Comments App');
		$this->set('comments',$this->Comment->selectAll());
	}


/*doesn't like longtext. had to change the comment to be varchar(255) */
	function add() {
		$comment = $_POST['comment'];
		$name = $_POST['name'];
		$this->set('title','Success - My Comments App');
		$this->set('comment',$this->Comment->query('insert into comments (name,comment) values (\''.mysql_real_escape_string($name).'\',\''.mysql_real_escape_string($comment).'\')'));
	}

	function delete($id = null) {
		$this->set('title','Success - My Comments App');
		$this->set('comment',$this->Comment->query('delete from comments where id = \''.mysql_real_escape_string($id).'\''));
	}

}
