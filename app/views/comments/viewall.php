<form action="../comments/add" method="post">
<input type="text" value="I just want to say..." onclick="this.value=''" name="comment"> <input type="submit" value="add">
</form>
<br/><br/>
<?php $number = 0?>

<?php foreach ($comment as $c):?>
	<a class="big" href="../comments/view/<?php echo $c['Comment']['tag']?>/<?php echo strtolower(str_replace(" ","-",$c['Comment']['name']))?>">
	<span class="comment">
	<?php echo ++$number?>
	<?php echo $c['Comment']['name']?>
	</span>
	</a><br/>
<?php endforeach?>
