<?php 
echo "<pre>user:";
print_r($user);
echo "</pre>";

?>

<form method="POST" enctype="multipart/form-data">
<ul>
	<li>
		Id: <input type="hidden" name="id" value="1"/>
	</li>
	<li>
		Nombre: <input type="text" name="name" value="<?=(isset($user[1]))?$user[1]:'';?>"/>
	</li>
	<li>
		Email: <input type="text" name="email" value="<?=(isset($user[2]))?$user[2]:'';?>"/>
	</li>
	<li>
		Password: <input type="password" name="password"/>
	</li>
	<li>
		Direccion: <input type="text" name="address" value="<?=(isset($user[5]))?$user[4]:'';?>"/>
	</li>
	<li>
		Telefono: <input type="text" name="phone" value="<?=(isset($user[5]))?$user[5]:'';?>"/>
	</li>
	<li>
		Descripcion: <textarea name="description"><?=(isset($user[6]))?$user[6]:'';?></textarea>
	</li>
	<li>
		Foto: <input type="file" name="photo"/> 
		<?=(isset($user[12]))?'Borrar Foto: <input type="checkbox" name="deletePhoto" />':'';?>
	</li>
	<li>
		Sexo: 
		M: <input type="radio" name="gender" value="m" <?=(isset($user[7])&&$user[7]=="m")?'checked':'';?> />
		H: <input type="radio" name="gender" value="h" <?=(isset($user[7])&&$user[7]=="h")?'checked':'';?> />
		O: <input type="radio" name="gender" value="o" <?=(isset($user[7])&&$user[7]=="o")?'checked':'';?>/>
	</li>
	<li>
		Mascota: 
		Perro: <input type="checkbox" name="pet[]" value="dog" <?=(isset($user[8])&&in_array('dog', $user[8]))?'checked':'';?>/>
		Gato: <input type="checkbox" name="pet[]" value="cat" <?=(isset($user[8])&&in_array('cat', $user[8]))?'checked':'';?>/>
		Anguila: <input type="checkbox" name="pet[]" value="eel" <?=(isset($user[8])&&in_array('eel', $user[8]))?'checked':'';?>/>
	</li>
	<li>
		Ciudad: <select name="city">
			<option value="zgz" <?=(isset($user[9])&&$user[9]=='zgz')?'selected':'';?>>Zaragoza</option>
			<option value="bcn" <?=(isset($user[9])&&$user[9]=='bcn')?'selected':'';?>>Barcelona</option>
			<option value="bib" <?=(isset($user[9])&&$user[9]=='bib')?'selected':'';?>>Bilbao</option>
		</select>
	</li>
	<li>
		Idiomas: <select multiple name="languages[]">
			<option value="eng" <?=(isset($user[10])&&in_array('eng', $user[10]))?'selected':'';?>>Ingles</option>
			<option value="esp" <?=(isset($user[10])&&in_array('esp', $user[10]))?'selected':'';?>>Espa�ol</option>
			<option value="dut" <?=(isset($user[10])&&in_array('dut', $user[10]))?'selected':'';?>>Holandes</option>
		</select>		
	</li>
	<li>
		Submit: <input type="submit" name="submit" value="Enviar"/>
	</li>
	<li>
		Reset: <input type="reset" name="reset"/>
	</li>
	<li>
		Boton: <input type="button" name="button" value="Boton"/>
	</li>

</ul>



</form>
