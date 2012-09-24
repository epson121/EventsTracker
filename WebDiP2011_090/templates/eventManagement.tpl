{include file = "header.tpl"}


<div id = "sadrzaj">
	<div style = "float:left; border:1px solid orange;">
	
		{section name=i loop=$events}
		<form id = 'createEvent' name='createEvent' method='post' action = 'changeEventData.php?id={if (isset($events[0].id_dogadaj))}{$events[0].id_dogadaj}{/if}'>
		Autor:<br/>
		<div>
		<input type= "text" readonly = "true" name= "eventAuthor" id = "eventAuthor" value = {if (isset($userName))}"{$userName}"{/if}/>
		</div>
		Kategorija:<br/>
		<div>
		<select name = "eventCategoryName" id = "eventCategoryName">
			{if (isset($admin))}
			<option value = "none">Odaberite kategoriju </option>
			{section name=i loop=$cat} 
			<option value ={$cat[i].naziv_kategorije} {if ($cat[i].naziv_kategorije == $categoryName)} selected = "selected" {/if}> {$cat[i].naziv_kategorije}</option>
			{/section}
			{/if}
			{if (isset($mod))}
				{section name=i loop=$cat} 
				<option value ={$cat[i].naziv_kategorije} {if ($cat[i].naziv_kategorije == $categoryName)} selected = "selected" {/if}> {$cat[i].naziv_kategorije}</option>
				{/section}
			{/if}
		</select><br/>
		</div>
		Naziv događaja<br/>
		<div>
		<input type = "text" name = "eventName" id = "eventName"  {if (isset($events[0].naziv_dogadaja))} value ="{$events[0].naziv_dogadaja}" {/if} />
		</div>
		Opis događaja: <br/>
		<div>
		<textarea rows= 4 cols=43  name = "eventDescription">{if (isset($events[0].opis_dogadaja))}{$events[0].opis_dogadaja}{/if}</textarea>
		</div>
		Datum:
		<div>
		<select name = "dan" id = "dan"><option value ="none" > Dan </dan>
						  <option value ='pre' selected = "selected">{if (isset($day))}{$day}{/if}</option>
						 <option value= "01">01</option>
						 <option value='02'>02</option>
						 <option value='03'>03</option>
						 <option value='04'>04</option>
						 <option value='05'>05</option>
						 <option value='06'>06</option>
						 <option value='07'>07</option>
						 <option value='08'>08</option>
						 <option value='09'>09</option>
						 <option value='10'>10</option>
						 <option value='11'>11</option>
						 <option value='12'>12</option>
						 <option value='13'>13</option>
						 <option value='14'>14</option>
						 <option value='15'>15</option>
						 <option value='16'>16</option>
						 <option value='17'>17</option>
						 <option value='18'>18</option>
						 <option value='19'>19</option>
						 <option value='20'>20</option>
						 <option value='21'>21</option>
						 <option value='22'>22</option>
						 <option value='23'>23</option>
						 <option value='24'>24</option>
						 <option value='25'>25</option>
						 <option value='26'>26</option>
						 <option value='27'>27</option>
						 <option value='28'>28</option>
						 <option value='29'>29</option>
						 <option value='30'>30</option>
						 <option value='31'>31</option>
		</select>
		<select name="mjesec" > <option value ="none">Izaberi mjesec</option>
			 <option value ='{if (isset($n))}{$n}{/if}' selected = "selected">{if (isset($month))}{$month}{/if}</option>
			 <option value='01'>Siječanj</option>
			 <option value='02'>Veljača</option>
			 <option value='03'>Ožujak</option>
			 <option value='04'>Travanj</option>
			 <option value='05'>Svibanj</option>
			 <option value='06'>Lipanj</option>
			 <option value='07'>Srpanj</option>
			 <option value='08'>Kolovoz</option>
			 <option value='09'>Rujan</option>
			 <option value='10'>Listopad</option>
			 <option value='11'>Studeni</option>
			 <option value='12'>Prosinac</option>
		</select>
		<input type = 'text' name = 'godina' value =  {if (isset($year))} "{$year}" {/if} />
		</div>
		Vrijeme početka: <br/>
		<div>
		<input type = text name = "vrijemePocetkaSat" maxlength="2" id = "vrijemePocetkaSat" size = "2" {if (isset($hour))} value="{$hour}" {/if} /> :
		<input type = text name = "vrijemePocetkaMinuta" maxlength="2" id = "vrijemePocetkaMinuta" size = "2" {if (isset($minute))} value="{$minute}" {/if} />
		</div>
		Cijena: <br/>
		<div>
		<input type = "text" name = "cijena" id = "cijena" {if (isset($events[0].cijena_karte))} value="{$events[0].cijena_karte}" {/if} />
		</div>

		<div id ="eventBenefits" >
			<span>Prijevoz</span>
			<div>
				<input type='text' style='width:30px;' name ='prijevoz_cijena' {if ($events[0].prijevoz_cijena == "")}
																					value = "0"
																			   {else}
																					value = {$events[0].prijevoz_cijena}
																				{/if}/>kn
			</div>
			<span>Noćenje</span>
			<div>
				<input type='text' style='width:30px;' name ='nocenje_cijena' {if ($events[0].nocenje_cijena == "")}
																					value = "0"
																			   {else}
																					value = {$events[0].nocenje_cijena}
																				{/if}/>kn
			</div>
		
		</div>
		Broj mjesta: <br/>
		<div>
		<input type = "text" name = "br_mjesta" id = "br_mjesta" value ={if (isset($events[0].br_mjesta))}"{$events[0].br_mjesta}"{/if} >
		</div>
		Mjesto održavanja (Adresa): <br/>
		<div>
		<input type = "text" name = "mjesto" id = "mjesto" size = "43" value ="{$events[0].mjesto}" >
		
		</div>
		<div>
		<select name="status" > 
			<option value ="none">Status</option>
			<option value = {$events[0].status_dogadjaja} selected = "selected"> {$events[0].status_dogadjaja}</option>
			<option value = "0"> 0 </value>
			<option value = "1"> 1 </value>
		</select>
		</div>
		<div>
		<input  type = "submit" name = "ok" value = "Kreiraj događaj"/>
		</div>
		<span class = 'err'>
		{if (isset($emptyField))}{$emptyField}{/if}
		</span>
	</div>
	<div  style= "float:right;">
		<img src = "pictures/kreiranje_dogadaja.png" alt = "dogadaj" width = "400" height = "280" style = "margin-top:7em;"/>
	</div>
	{/section}
	</form>
</div>


{include file = "footer.tpl"}