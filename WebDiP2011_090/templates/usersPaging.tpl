{* Users paging template *}

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
						<td class = "td"> Ime </td> 
						<td class = "td"> Prezime </td> <td class = "td"> Korisničko ime </td> <td class = "td">E-mail adresa </td><td class = "td"> Avatar </td>{if (isset($uredi))}<td class = "td"> Uredi </td>{/if}
					</tr>
					{section name=i loop=$userList}
					
					<tr class = "none">
						<td class = 'ime_table'>{if (isset($userList[i].Ime))} {$userList[i].Ime} {/if}</td>
						<td class = 'prezime_table'>{if (isset($userList[i].prezime))} {$userList[i].prezime} {/if}</td>
						<td class = 'username_table'>{if (isset($userList[i].username))} {$userList[i].username} {/if}</td>
						<td class = 'email_table'>{if (isset($userList[i].e_mail))} {$userList[i].e_mail} {/if}</td>
						<td class = 'avatar_table'>{if (isset($userList[i].avatar))} <img src ="{$userList[i].avatar}" width="50" height= "50"/>{/if}</td>
						{if (isset($uredi))}
						<td class = 'uredi_table'><a href = "user_management.php?user={$userList[i].username}">{$uredi}</a></td>
						{/if}
					</tr>
					
					{/section}
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
