<div id="container"> 
     <h1 id="addAComment">Add a Comment</h1>
     <div id="commentsForm"
     <p>name: <input type="text" value="moniker" id="name"/></p>
     <p>comment: <input type="text" value="I just want to say..." id="comment"/>
     <input type="button" id="addComment" value="add"/></p>
     </div><!-- end form div -->

<div id="commentsWP">

     <?php foreach ($comments as $c):?>
     
     <div class="comment" id="comment<?php echo $c['Comment']['id']?>">
     <div class="id"><?php echo $c['Comment']['id']?></div>
     <div class="name"><?php echo $c['Comment']['name']?></div>
     <div class="time"><?php echo $c['Comment']['time']?></div>
     <div class="text"><?php echo $c['Comment']['comment']?></div>
     <a id="deleteComment_<?php echo $c['Comment']['id']?>">Delete</a>
     </div>

     <?php endforeach?>

</div>
</div>

     <!-- Individual YUI JS files --> 
     <?php $html = new HTML();?>
     <?php echo $html->includeJs('yui27yahoo');?>
     <?php echo $html->includeJs('yui27event');?>
     <?php echo $html->includeJs('yui27connection');?>
     <?php echo $html->includeJs('yui27dom');?>
     <?php echo $html->includeJs('elitetoma');?>
     <?php echo $html->includeJs('elitetoma.comments');?>