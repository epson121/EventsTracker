{include file = "header.tpl"}



<div id = "sadrzaj">
	
	<table id = "tablica" class = "tablica">
			<tr>
				<td class = 'tdAjax'> Naziv slike </td><td class = 'tdAjax'> Opis slike </td><td class = 'tdAjax'> Slika </td><td class = 'tdAjax'> Obriši </td>
			</tr>
			{section name = i loop = $image}
			<tr>
				<td class = 'ime_table2'> {if (isset($image[i].naziv_slike))}{$image[i].naziv_slike}{/if}</td>
				<td class = 'ime_table2'> {if (isset($image[i].opis_slike))}{$image[i].opis_slike}{/if}</td>
				<td class = 'ime_table2'> <a href ="{$image[i].path_slike}"/><img src = '{if (isset($image[i].path_slike_thumb))}{$image[i].path_slike_thumb}{/if}'></a></td>
				<td class = 'ime_table2'> <a href = 'deleteImageFromGallery.php?id={$image[i].id_slike}&eid={$image[i].dogadaj_id_dogadaj}'>Obriši!</a></td>
			</tr>
			{/section}
	</table>
	<br/>
	<br/>
	{if (isset($grantedAccess))}<span class = 'uspjesno'>{$grantedAccess}</span>{/if}



</div>



{include file = "footer.tpl"}