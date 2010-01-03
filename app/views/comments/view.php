<h1>My Comments App</h1>
<h2><?php echo $comment['Comment']['name']?></h2>
<p><?php echo $comment['Comment']['time']?></p>
<p><?php echo $comment['Comment']['comment']?></p>

<a href="../../../comments/delete/<?php echo $comment['Comment']['id']?>">Delete this comment</a>
<a href="../../../comments/index">View Comments</a>
