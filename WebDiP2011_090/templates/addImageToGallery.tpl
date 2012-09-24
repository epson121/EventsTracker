{include file = "header.tpl"}

<div id = "sadrzaj">
	<form  method='post' action = 'addImageToGallery.php?id={if (isset($id))}{$id}{/if}' enctype="multipart/form-data">
	<br/>
		Naziv slike: <br/>
		<input type = "text" name = "namePicture" /> <br/>
		Opis slike:<br/>
		<textarea name = "descriptionPicture" rows = "3" cols = "43"></textarea><br/>
		<input type="hidden" name="MAX_FILE_SIZE" value="1048576">
		Slika: <br/><input type = "file" name = "uploadPicture" /><br/><br/>
		<input type = "submit" name = "ok" value = "Dodaj sliku u galeriju" />
	
	</form>


<span class = 'uspjesno'>{if (isset($uspjehslika))}{$uspjeh}{/if}</span>
</div>




{include file = "footer.tpl"}