<h2><?php echo $comment['Comment']['name']?></h2>
<p><?php echo $comment['Comment']['time']?></p>
<p><?php echo $comment['Comment']['comment']?></p>

<a class="big" href="../../../comments/delete/<?php echo $comment['Comment']['id']?>">
<span class="comment">Delete this comment</span>
</a>
<a class="big" href="../comments/viewall">View Comments</a>
