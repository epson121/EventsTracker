{* Categories paging template *}

<?php 
	require_once ("recaptchalib.php");
	$mailhide_pubkey = '';
	$mailhide_privkey = '';
?>
{include file="header.tpl"}

<div id = 'sadrzaj'> 
		
			<div class = 'paging_pages'>
				<table class = 'tablica'>
					<tr> 
						<td class = "td"> Naziv kategorije </td> <td class = "td"> Opis kategorije </td> <td class = "td">Autor </td><td class = "td">Uredi</td>
					</tr>
					{section name=i loop=$userList}
					
					<tr class = "none">
						<td class = 'ime_table'>{if (isset($userList[i].naziv_kategorije))} {$userList[i].naziv_kategorije} {/if}</td>
						<td class = 'opis_kategorije_table'>{if (isset($userList[i].kratak_opis))} {$userList[i].kratak_opis} {/if}</td>
					
				
						<td class = 'ime_table'>{if (isset($authorList[i].username))}{$authorList[i].username}{/if}</td>
						<td class = 'uredi_table'><a href = "category_management.php?id={$userList[i].id_kategorija}">Uredi kategoriju </a></td>
					{/section}
					</tr>
				</table>
			</div>
			<div class = 'paging_links'>
				{if (isset($prva))} {$prva} 
				<span>{else if (isset($prvaLabel))} {$prvaLabel} {/if}</span>
				{if (isset($trenutna)> 1)}{$naPocetak} {$prethodna}{/if}
				{if (isset($prev))} {$prev} {/if}
				<span>{if (isset($trenutna))} {$trenutna} {/if}</span>
				{if (isset($next))} {$next} {/if}
				<span>{if (isset($posljednja))} {$posljednja}</span>
				{else if (isset($posljednjaLabel))} {$posljednjaLabel} {/if}
			</div>
	
</div>

{include file="footer.tpl"}
