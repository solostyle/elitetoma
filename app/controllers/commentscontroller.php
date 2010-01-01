<?php

class CommentsController extends Controller {

	function view($id = null,$name = null) {

		$this->set('title',$name.' - My Comments App');
		$this->set('comment',$this->Comment->select($id));

	}

	function viewall() {

		$this->set('title','All Comments - My Comments App');
		$this->set('comment',$this->Comment->selectAll());
	}

	function add() {
		$id = $_POST['tag'];
		$this->set('title','Success - My Comments App');
		$this->set('comment',$this->Comment->query('insert into comments (tag) values (\''.mysql_real_escape_string($id).'\')'));
	}

	function delete($id = null) {
		$this->set('title','Success - My Comments App');
		$this->set('comment',$this->Comment->query('delete from comments where tag = \''.mysql_real_escape_string($id).'\''));
	}

}
