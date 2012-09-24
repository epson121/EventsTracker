{* Events paging template *}

{include file="header.tpl"}

<div id = 'sadrzaj'>
			<div> 
			<form name = "searchEventsForm" method = "post" action = "filterEvents.php">
				<input type = "text" name = "filter"  />&nbsp;&nbsp;&nbsp;
				<select name = "criteria" id = "criteria"><option value ="none" > Odaberite područje pretrage </dan>
						<option value= "01">Autor</option>
						<option value= "02">Naziv događaja</option>
						<option value= "03">Cijena</option>
						<option value= "04">Status događaja( 0 / 1 )</option>
						<option value= "05">Mjesto</option>
				</select>&nbsp;&nbsp;&nbsp;
				<input type = "submit" name = 'ok' value = "Pretraži događaje"/>
			</form>
			{if (isset($filter))}
			<div class = 'paging_pages'>
				<table class = 'tablica'>
					<tr> 
						<td class = "td"> Naziv događaja </td> 
						<td class = "td"> Vrijeme </td> <td class = "td"> Cijena </td><td class = "td"> Mjesto </td><td class = "td"> Pogledaj! </td>
					</tr>
					{section name=i loop=$userList}
					<tr class="none">
						<td class = 'ime_table'>{if (isset($userList[i].naziv_dogadaja))} {$userList[i].naziv_dogadaja} {/if}</td>
						<td class = 'username_table'>{if (isset($userList[i].vrijeme_pocetka))} {$userList[i].vrijeme_pocetka} {/if}</td>
						<td class = 'email_table'>{if (isset($userList[i].cijena_karte))} {$userList[i].cijena_karte} {/if}</td>
						<td class = 'email_table'>{if (isset($userList[i].mjesto))}{$userList[i].mjesto}{/if}</td>
						<td class = 'uredi_table'><a href = "eventDetails.php?id={if (isset($userList[i].id_dogadaj))}{$userList[i].id_dogadaj}{/if}">Pogledaj</a></td>
					</tr>
					{/section}
				</table>
			</div>
			{/if}
			{if (isset($noFilter))}<span class ='greska'> {$noFilter} </span>{/if}
			{if (isset($noRecord))}<span class = 'greska'> {$noRecord}</span>{/if}
			
</div>
			{if (!isset($filter))}
			<div class = 'paging_pages' id = "paging_events">
			</div>
			{/if}
	
</div>

{include file="footer.tpl"}
