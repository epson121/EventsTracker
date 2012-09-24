{include file = "header.tpl"}



<div id = "sadrzaj">
	
	<table id = "tablica" class = "tablica">
			<tr>
				<td class = 'tdAjax'> Username </td><td class = 'tdAjax'> Događaj </td><td class = 'tdAjax'> Razlog </td><td class = 'tdAjax'> Omogući pristup </td>
			</tr>
			{section name = i loop = $users}
			<tr>
				<td class = 'ime_table2'> {if (isset($users[i].korisnik))}{$users[i].korisnik}{/if}</td>
				<td class = 'ime_table2'> {if (isset($users[i].dogadaj))}{$users[i].dogadaj}{/if}</td>
				<td class = 'ime_table2'> {if (isset($users[i].razlog))}{$users[i].razlog}{/if}</td>
				<td class = 'ime_table2'> <a href = 'grantUserAccess.php?user={$users[i].korisnik}&ev={$users[i].dogadaj_id_dogadaj}'>Omogući!</a></td>
			</tr>
			{/section}
	</table>
	<br/>
	<br/>
	{if (isset($grantedAccess))}<span class = 'uspjesno'>{$grantedAccess}</span>{/if}



</div>



{include file = "footer.tpl"}