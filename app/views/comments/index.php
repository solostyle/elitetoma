<h1>My Comments App</h1>
<form action="../comments/add" method="post">
     say something: <input type="text" value="I just want to say..." onclick="this.value=''" name="comment"/> 
<br />
     your name: <input type="text" value="your name" onclick="this.value=''" name="name"/>
<br />
<input type="submit" value="add"/>
</form>
<br/>

<?php foreach ($comments as $c):?>

	<div class="comment">
	<?php echo $c['Comment']['id']?>
	<?php echo $c['Comment']['name']?><br />
	<?php echo $c['Comment']['time']?><br />
	<?php echo $c['Comment']['comment']?>
	<a href="../comments/view/<?php echo $c['Comment']['id']?>/<?php echo strtolower(str_replace(" ","-",$c['Comment']['name']))?>">View</a>
	</div>

<?php endforeach?>