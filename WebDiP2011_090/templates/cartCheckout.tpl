{include file = "header.tpl"}

<div id = "sadrzaj">
{if (isset($noCart))}<span class = 'greska'>{$noCart}</span>{/if}
	{if (isset($userList))}
		<div class = 'paging_pages'>
				<table class = 'tablica'>
					<tr> 
						<td class = "td">Ime događaja </td> <td class = "td"> Broj mjesta </td> <td class = "td"> Prijevoz </td> <td class = "td">Noćenje </td>
					</tr>
					{section name=i loop=$userList}
					
					<tr class = "none">
						<td class = 'ime_table'>{if (isset($userList[i].ime_eventa))} {$userList[i].ime_eventa} {/if}</td>
						<td class = 'prezime_table'>{if (isset($userList[i].br_mjesta))} {$userList[i].br_mjesta} {/if}</td>
						<td class = 'username_table'>{if (isset($userList[i].prijevoz))} {$userList[i].prijevoz} {/if}</td>
						<td class = 'email_table'>{if (isset($userList[i].nocenje))} {$userList[i].nocenje} {/if}</td>	
						
					</tr>
					{/section}
					<tr>
					<td colspan = "3" class = 'email_table'>Ukupno </td>
					<td class = 'email_table'>{if (isset($ukupno))}{$ukupno}{/if}</td>
					</tr>
					<tr colspan = "4"><td><button type = "button" id = "purchaseEvents_cart" class = "rateEventButton">Potvrdi kupovinu.</button></td></tr>
				</table>
				
		</div>
	{/if}
</div>
{include file = "footer.tpl"}