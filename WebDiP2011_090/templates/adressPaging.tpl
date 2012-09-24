{include file = "header.tpl"}



<div id = "sadrzaj">
	
	<table id = "tablica" class = "tablica">
			<tr>
				<td class = 'tdAjax'> Kartica </td><td class = 'tdAjax'> Potvrdi </td>
			</tr>
			{section name = i loop = $users}
			<tr>
				<form method = 'post' name = 'from12' action = '{$action}'>
				<td><input type = "text" name = "adress" value = "{$users[i].adresa}"/>
				<input type = "hidden" name = 'idAddress' value = "{$users[i].id_adresa}"/>
				<input type = "hidden" name = 'idUser' value = "{$users[i].korisnik_id_korisnika}"/></td>
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