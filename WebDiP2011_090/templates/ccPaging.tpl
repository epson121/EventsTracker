{include file = "header.tpl"}



<div id = "sadrzaj">
	
	<table id = "tablica" class = "tablica">
			<tr>
				<td class = 'tdAjax'> Kartica </td><td class = 'tdAjax'> Broj kartice </td><td class = 'tdAjax'> Uredi </td>
			</tr>
			{section name = i loop = $users}
			<tr>
				<form name = 'ccChange' method = 'post' name = 'from12' action = '{$action}'>
				<td><input type = "text" name = 'ccName' value = "{$users[i].kreditna_kartica}"/>
				<input type = "hidden" name = 'idCc' value = "{$users[i].id_kartica}"/>
				<input type = "hidden" name = 'idUser' value = "{$users[i].korisnik_id_korisnika}"/></td>
				<td><input type = "text" name = 'ccNum' value = "{$users[i].broj_kartice}"/></td>
				<td><input type = "submit" name = "ok"/></td>
				</form>
			</tr>
			{/section}
	</table>
	<br/>
	<br/>
	{if (isset($grantedAccess))}<span class = 'uspjesno'>{$grantedAccess}</span>{/if}



</div>



{include file = "footer.tpl"}