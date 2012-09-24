{include file= 'header.tpl'}

<div id = "sadrzaj">

	<div class = "originalData">
		{if (isset($cat))}
		{section name=i loop=$cat}
		<form id = 'category' class = "form1" name= "categoryData" method = "post" action="change_category_data.php?id={$cat[i].id_kategorija}" enctype="multipart/form-data">
			<table class = "management">
				<tr>
					<td style="color:#CC6600;" colspan= 3>Podaci o kategoriji</td>
				</tr>
				<tr>
				
					<td>Naziv kategorije</td>
					<td><input type = "text" cols = 43 name = "naziv_kategorije" value = {if (isset($cat[i].naziv_kategorije))}"{$cat[i].naziv_kategorije}"{/if}/></td>
				</tr>
				<tr>
					<td>Opis</td>
					<td><textarea rows= 4 cols=43  name = "opis_kategorije">{if (isset($cat[i].kratak_opis))}{$cat[i].kratak_opis}{/if}</textarea></td>
				</tr>
				{/section}
				<tr>
					<td>Moderator</td>
					<td><select name = 'mod' id = 'mod'>	
						<option value= 'none'>Odaberite moderatora</option>
						{section name=i loop=$users}
						<option value= {$users[i].username} {if ($users[i].username == $mod)} selected = "selected" {/if}>{$users[i].username}</option>
						{/section}
						</select>
				</tr>
				<tr>
				<td colspan=3><input type = "submit" name = "ok" value = "Promjeni podatke!" /></td>
				</tr>
			</table>
		{/if}
		</form>
		<span class = 'greska'>{if (isset($greske))}{$greske}{/if}</span>
		<span class = 'uspjesno'>{if (isset($imDone))}{$imDone}{/if}</span>
		
		
	</div>
	<div class = "form2">
	</div>


</div>


{include file = 'footer.tpl'}


