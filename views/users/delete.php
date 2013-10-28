<form method="POST" enctype="multipart/form-data">
<ul>
	<li>
		Id: <input type="hidden" name="id" value="<?=$_GET['id'];?>" />
	</li>
	<li>
		Seguro que desea borrar al usuario
			<input type="submit" name="submit" value="Si"/>
			<input type="submit" name="submit" value="No"/>
	</li>	

</ul>



</form>
