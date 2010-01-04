<h1>My Comments App</h1>

<form action="../comments/add" method="post">
<p>say something: <input type="text" value="I just want to say..." onclick="this.value=''" name="comment"/></p>
<p>your name: <input type="text" value="your name" onclick="this.value=''" name="name"/></p>
<input type="submit" value="add"/>
</form>

<?php foreach ($comments as $c):?>
     
     <div class="comment">
     <div class="id"><?php echo $c['Comment']['id']?></div>
     <div class="name"><?php echo $c['Comment']['name']?></div>
     <div class="time"><?php echo $c['Comment']['time']?></div>
     <div class="text"><?php echo $c['Comment']['comment']?></div>
     <a href="../comments/view/<?php echo $c['Comment']['id']?>/<?php echo strtolower(str_replace(" ","-",$c['Comment']['name']))?>">More</a>
     </div>

<?php endforeach?>