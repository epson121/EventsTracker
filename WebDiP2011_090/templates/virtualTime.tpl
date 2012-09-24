{include file = 'header.tpl'}

<div id = "sadrzaj">

		<div style = "font-size:20px; color:orange;">
		{if (isset($novoVrijeme))}{$novoVrijeme}{/if}<br/>
		<a href = "virtualTime.php?vt=1" style = "text-decoration:none;color:white;"> Dohvati novo vrijeme </a>
		</div><br/><br/>
		<div style = "font-size:20px; color:green;">
		{if (isset($gotTime))}{$gotTime}{/if}
		</div>
</div>

{include file = 'footer.tpl'}