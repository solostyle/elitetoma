<h1>My Comments App</h1>
<div class="comment">
     <p><?php echo $comment['Comment']['name']?></p>
     <p><?php echo $comment['Comment']['time']?></p>
     <p><?php echo $comment['Comment']['comment']?></p>
     <a href="../../../comments/delete/<?php echo $comment['Comment']['id']?>">Delete</a>
     <a href="../../../comments/index">Back</a>
</div>