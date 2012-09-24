{*Ispis Korisnika*}

{include file="header.tpl"}

<div id = 'sadrzaj'> 

		<table class = 'tablica'>
			<tr> <td> Ime </td> <td> Prezime </td> <td> Korisničko ime </td> <td>E-mail adresa </td></tr>
			{section name=i loop=$userList}
			
			<tr>
			<td class = 'white'>{if (isset($userList[i].Ime))} {$userList[i].Ime} {/if}</td>
			<td class = 'white'>{if (isset($userList[i].prezime))} {$userList[i].prezime} {/if}</td>
			<td class = 'white'>{if (isset($userList[i].username))} {$userList[i].username} {/if}</td>
			<td class = 'white'>{if (isset($userList[i].e_mail))} {$userList[i].e_mail} {/if}</td>
			</tr>
			
			{/section}
		</table>

</div>
{include file="footer.tpl"}
