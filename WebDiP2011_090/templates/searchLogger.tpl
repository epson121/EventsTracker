{* Events paging template *}

{include file="header.tpl"}

<div id = 'sadrzaj'>
			<div> 
			<form name = "searchLogger" method = "post" action = "searchLogger.php">
				<input type = "text" name = "filter"  />&nbsp;&nbsp;&nbsp;
				<input type = "submit" name = 'ok' value = "Pretraži dnevnik"/>
			</form>
			{if (isset($filter))}
			<div>
				<span class = 'uspjesno' style="font-size:12px;float:left;">{$x}</span>
			</div>
			{/if}
			{if (isset($noFilter))}<span class ='greska'> {$noFilter} </span>{/if}
			{if (isset($noRecord))}<span class = 'greska'> {$noRecord}</span>{/if}
			
</div>
			
	
</div>

{include file="footer.tpl"}

