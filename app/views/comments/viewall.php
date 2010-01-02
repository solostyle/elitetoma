<form action="../comments/add" method="post">
<input type="text" value="I just want to say..." onclick="this.value=''" name="comment"/> 
<br />
<input type="text" value="your name" onclick="this.value=''" name="name"/>
<input type="submit" value="add"/>
</form>
<br/>

<?php foreach ($comments as $c):?>
	<a class="big" href="../comments/view/<?php echo $c['Comment']['id']?>/<?php echo strtolower(str_replace(" ","-",$c['Comment']['name']))?>">
	<span class="comment">
	<?php echo $c['Comment']['id']?>
	<?php echo $c['Comment']['name']?><br />
	<?php echo $c['Comment']['time']?><br />
	<?php echo $c['Comment']['comment']?>
	</span>
	</a><br /><br />
<?php endforeach?>