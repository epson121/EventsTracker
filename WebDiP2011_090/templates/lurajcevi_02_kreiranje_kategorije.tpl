{include file = "header.tpl"}


<div id = "sadrzaj">
	<form id = 'createCategory' name='createCategory' method='post' action = 'insertCategory.php' enctype="multipart/form-data">
		Autor:<br/>
		<div>
		<input type= "text" readonly = "true" name= "categoryAuthor" id = "categoryAuthor" value = {if (isset($userName))}"{$userName}"{/if}/>
		</div>
		Naziv kategorije:<br/>
		<div>
		<input type="text"  name = "categoryName" id = "categoryName" />
		</div>
		Kratak opis:<br/>
		<div>
		<textarea name = "categoryDescription" id = "categoryDescription" cols = "40" rows = "4"></textarea>
		</div>
		
		<div>
		<input type = "submit" name = "ok" value = "Dodaj kategoriju!" />
		</div>
		</form>
		<span class = 'err'>
		{if (isset($emptyField))}{$emptyField}{/if}
		</span>
	


</div>


{include file = "footer.tpl"}