<form action="../comments/add" method="post">
<input type="text" value="I just want to say..." onclick="this.value=''" name="comment"> <input type="submit" value="add">
</form>
<br/><br/>
<?php $number = 0?>

<?php foreach ($comments as $comment):?>
	<a class="big" href="../comments/view/<?php echo $comment['Comment']['tag']?>/<?php echo strtolower(str_replace(" ","-",$comment['Comment']['name']))?>">
	<span class="comment">
	<?php echo ++$number?>
	<?php echo $comment['Comment']['name']?>
	</span>
	</a><br/>
<?php endforeach?>
