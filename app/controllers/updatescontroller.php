<?php

class UpdatesController extends Controller {

	function index() {
        $this->Update->orderBy('id','DESC');
		$this->set('updates',$this->Update->search());
	}

    function all() {
        //        index(); // or copy the lines from that function over? only the views differ
        $this->Update->orderBy('id','DESC');
		$this->set('updates',$this->Update->search());
    }

/*doesn't like longtext. had to change the comment to be varchar(255) */
	function add() {
        $this->doNotRenderHeader = true;
		$this->Update->update = $_POST['update'];
		$this->Update->name = $_POST['name'];
		$this->Update->save();
	}

	function delete() {
        $this->doNotRenderHeader = true;
        $this->Update->id = $_POST['id'];
        $this->Update->delete();
	}
}
