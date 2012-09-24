{include file = "header.tpl"}



<div id = "sadrzaj">
	
	<table id = "tablica" class = "tablica">
			<tr>
				<td class = 'tdAjax'> Naziv događaja </td><td class = 'tdAjax'> Vrijeme </td><td class = 'tdAjax'> Cijena </td><td class = 'tdAjax'> Mjesto </td><td class = 'tdAjax'> Pogledaj!</td>
			</tr>
			{section name = i loop = $events}
			<tr>
				<td class = 'ime_table2'> {if (isset($events[i].naziv_dogadaja))}{$events[i].naziv_dogadaja}{/if}</td>
				<td class = 'ime_table2'> {if (isset($events[i].vrijeme_pocetka))}{$events[i].vrijeme_pocetka}{/if}</td>
				<td class = 'ime_table2'> {if (isset($events[i].cijena_karte))}{$events[i].cijena_karte}{/if}</td>
				<td class = 'ime_table2'> {if (isset($events[i].mjesto))}{$events[i].mjesto}{/if}</td>
				<td class = 'ime_table2'> <a href = 'eventManagement.php?id={if (isset($events[i].id_dogadaj))}{$events[i].id_dogadaj}{/if}'>Uredi događaj</a></td>
			</tr>
			{/section}
	</table>
	



</div>



{include file = "footer.tpl"}