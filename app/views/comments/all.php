<?php foreach ($comments as $c):?>
     
<div class="comment" id="comment<?php echo $c['Comment']['id']?>">
     <div class="id"><?php echo $c['Comment']['id']?></div>
     <div class="name"><?php echo $c['Comment']['name']?></div>
     <div class="time"><?php echo $c['Comment']['time']?></div>
     <div class="text"><?php echo $c['Comment']['comment']?></div>
     <a id="deleteComment_<?php echo $c['Comment']['id']?>">Delete</a>
</div>

<?php endforeach?>