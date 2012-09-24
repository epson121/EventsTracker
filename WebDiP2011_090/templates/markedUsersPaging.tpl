{include file = "header.tpl"}



<div id = "sadrzaj">
	
	<table id = "tablica" class = "tablica">
			<tr>
				<td class = 'tdAjax'> Username </td><td class = 'tdAjax'> Razlog označavanja </td><td class = 'tdAjax'> Uredi </td>
			</tr>
			{section name = i loop = $users}
			<tr>
				<td class = 'ime_table2'> {if (isset($users[i].username))}{$users[i].username}{/if}</td>
				<td class = 'ime_table2'> {if (isset($users[i].razlog_oznacavanja))}{$users[i].razlog_oznacavanja}{/if}</td>
				<td class = 'ime_table2'> <a href = 'user_management.php?user={$users[i].username}'>Uredi korisnika</a></td>
			</tr>
			{/section}
	</table>
	



</div>



{include file = "footer.tpl"}