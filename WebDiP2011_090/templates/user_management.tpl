{include file= 'header.tpl'}

<div id = "sadrzaj">

	<div class = "originalData">
		
		<form id = 'regis' class = "form1" name= "userData" method = "post" action="change_user_data.php" enctype="multipart/form-data">
			<table class = "management">
				<tr>
					<td style="color:#CC6600;" colspan= 3>Kako bi promjenili podatke, označite polje!</td>
				</tr>
				<tr>
					<td>Username</td>
					<td><input type = "text" readonly= "true" name = "username" value = {if (isset($Username))}"{$Username}"{/if}/></td>
					<td>Nemoguće promjeniti!</td>
					<td>Ime</td>
					<td><input type = "text" readonly="true" name = "ime" value = {if (isset($Ime))}"{$Ime}"{/if}"/></td>
					<td><input type="checkbox" onclick="provjera()" name="imeBox" value="ON"/></td>
				</tr>
				<tr>
					<td>Prezime</td>
					<td><input type = "text" readonly="true" name = "prezime" value = {if (isset($Prezime))}"{$Prezime}"{/if}/></td>
					<td><input type="checkbox" onclick="provjera()" name="prezimeBox" value="ON"/></td>
					<td>Tip korisnika</td>
					 {if (!isset($nonAdmin))} 
					<td><select name = "tipKorisnika"><option {if (isset($tipKorisnika)) && $tipKorisnika == 1}selected{/if}>1</option><option {if (isset($tipKorisnika)) && $tipKorisnika == 2}selected{/if}>2</option><option {if (isset($tipKorisnika)) && $tipKorisnika == 3}selected{/if}>3</option></select></td>
					{else}<td><input type= "text" readonly = "true" name = "tipKorisnika" value ={if (isset($tipKorisnika))}{$tipKorisnika}{/if}></td> 
					{/if}
					<td>{if (!isset($nonAdmin))} 1.RK, 2.MOD, 3.ADMIN {else}Nemoguće promjeniti{/if}</td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type = "text" readonly="true"  name = "email" value = {if (isset($Email))}"{$Email}"{/if}/></td>
					<td><input type="checkbox" onclick="provjera()" name="emailBox" value="ON"/></td>
					<td>Avatar</td>
					<td><input type = "file" readonly="true"  name = "avatar" value = {if (isset($Avatar))}"{$Avatar}"{/if}/></td>
					<td>Promjena avatara</td>
				</tr>
				<tr>
					<td>Lozinka</td>
					<td><input type = "text" readonly="true"  name = "lozinka" value = {if (isset($lozinka))}"{$lozinka}"{/if}/></td>
					<td><input type="checkbox" onclick="provjera()" name="passBox" value="ON"/></td>
					<td>Status korisnika</td>
					{if (!isset($nonAdmin))}
					<td><select name = "statusKorisnika"><option {if (isset($statusKorisnika)) && $statusKorisnika == 0}selected{/if}>0</option><option {if (isset($statusKorisnika)) && $statusKorisnika == 1}selected{/if}>1</option><option {if (isset($statusKorisnika)) && $statusKorisnika == 2}selected{/if}>2</option></select></td>
					{else}<td><input type = "text" readonly = "true" name= "statusKorisnika" value = {if (isset($statusKorisnika))}{$statusKorisnika}{/if}></td>
					{/if}
					<td>{if (!isset($nonAdmin))}0.Neaktiviran 1.Aktiviran 2.Zaključan{else}Nemoguće promjeniti{/if}</td>
				</tr>
				<tr>
					<td colspan=3><input type = "submit" name = "ok" value = "Promjeni podatke!" /></td>
				</tr>
			</table>
		
		</form>
		<button type = "button" id = "addCreditCardButton" class = "rateEventButton">Dodaj kreditnu karticu!</button>
		<button type = "button" id = "addAdress" class = "rateEventButton">Dodaj adresu!</button>
		<button type = "button" id = "getMyEvents" class = "rateEventButton">Moji događaji!</button><br/><br/>
		<a href = 'adressPaging.php'><button type = "button" id = "checkAdress" class = "rateEventButton">Pregled adresa!</button></a>
		<a href ='ccPaging.php'><button type = "button" id = "checkCc" class = "rateEventButton">Pregled kartica!</button></a>
		{if (isset($noName))} <span class = 'greska'> {$noName} </span> {/if} <br/>
		{if (isset($noSurname))} <span class = 'greska'> {$noSurname} </span> {/if} <br/>
		{if (isset($noEmail))} <span class = 'greska'> {$noEmail} </span> {/if}<br/>
		{if (isset($uspjesnoDodanaKartica))} <span class = 'uspjesno'> {$uspjesnoDodanaKartica} </span> {/if}<br/>
		
		
		
	</div>
	<div id = "myEvents">
	</div>


</div>


{include file = 'footer.tpl'}


