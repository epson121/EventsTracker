{* Events paging template *}

{include file="header.tpl"}

<div id = 'sadrzaj'> 
		
		{section name=i loop=$events}
			<div class = "event" id = "event">
				<ul>	
					<br/>
					<div class = "eventHeader">
					<li>
					
						{if (isset($events[i].naziv_dogadaja))}{$events[i].naziv_dogadaja}{/if}
					</li>
					</div>
					<div class = "eventBody" id = "eventBody">
					<li>Mjesto:
						<ul>
							
							<li>
							{if (isset($events[i].mjesto))}{$events[i].mjesto}{/if}
							</li>
							
						</ul>
					</li>
					<li>Datum:
						<ul>
							<li>
							{if (isset($events[i].datum_dogadjaja))}{$events[i].datum_dogadjaja}{/if}<br/>
							</li>
						</ul>
					</li>	
					<li>Opis:
						<ul>
							<li>
							{if (isset($events[i].opis_dogadaja))}{$events[i].opis_dogadaja}{/if}<br/>
							</li>
						</ul>
					</li>	
					<li>Cijena:
						<ul>
							<li> 
							{if (isset($events[i].cijena_karte))}{$events[i].cijena_karte}{/if}kn
							</li>
						</ul>
						{if ($events[i].prijevoz_cijena != 0)}
						<ul>Cijena prijevoza:
							<li> 
							{if (isset($events[i].prijevoz_cijena))}{$events[i].prijevoz_cijena}{/if}kn
							</li>
						</ul>
						{/if}
						{if ($events[i].nocenje_cijena != 0)}
						<ul>Cijena noćenja:
							<li> 
							{if (isset($events[i].nocenje_cijena))}{$events[i].nocenje_cijena}{/if}kn
							</li>
						</ul>
						{/if}
					</li>
					<li>Ocjena
							<ul>
							<li>
								{if (isset($uspjeh))}
									<select name = "eventRate" id = "eventRate">
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
										<option>5</option>
									</select>
									
									
										<button type = "button" id = "rateEventButton" class = "rateEventButton">Ocijeni!</button>
										<button type = "button" id = "getVotersNames" class = "rateEventButton">Pogledaj ocjene!</button><br/>
								{/if}	
							</li>
							<li>
							Prosjek:
								<span id = "prosjek"></span><span id = "xD">{if (isset($prosjek))}{$prosjek}{/if}</span>
							</li>
							</ul>
						</li>
							{if (isset($uspjeh))}
						<li>
						Broj slobodnih mjesta:
							<ul>
								<li>
									{if (isset($events[i].br_mjesta))}{$events[i].br_mjesta}{/if}
								</li>
							</ul>
						{/if}
						</li>
						<li>
						Galerija slika
						<li>
							{section name=i loop=$slika}
								<div id = "gallery" class = 'imageGallery'><a href = '{if (isset($slika[i].path_slike))}{$slika[i].path_slike}{/if}' class = "lightbox_trigger"><img src = '{if (isset($slika[i].path_slike_thumb))}{$slika[i].path_slike_thumb}{/if}' alt = 'slika'/></a></div>
							{/section}
						</li>
						<li>
						<br/><br/>
							{if (isset($autor))}
								<a href = "addImageToGalleryForm.php?id={if (isset($idEventa))}{$idEventa}{/if}" alt = "dodaj_sliku_u_avatar"  class = 'addImageToGallery'"> Dodaj sliku u galeriju</a>
								<a href = "editImageGallery.php?id={if (isset($idEventa))}{$idEventa}{/if}" alt = "uredi_sliku"  class = 'addImageToGallery'"> Uredi galeriju</a>
							{/if}
						</li>
						{if (isset($uspjeh))}
						<li><br/>	
							{if (($events[0].status_dogadjaja == 1))}
								<button type = "button" id = "purchaseButton" class = "purchaseButton">Kupi ulaznice!</button>
								<button type = "button" id = "addToCartButton" class = "purchaseButton">Dodaj u košaricu!</button>
								
						
							{else}
								Događaj je istekao!
							{/if}
						{/if}
							<button type = "button" id = "getBuyers" class = "purchaseButton">Pregled kupljenih karti!</button>
						</li>
						
					</div>
					<div id = "eventStuff">
					</div>
					<div id = "eventBuyers">
					</div>
					{if (isset($uspjeh))}
						<div id = "commentAnEvent">
							<span class = 'eventCommentHeader'>Komentiraj: </span><br/>
							<textarea class = 'eventCommentText' id = "eventCommentText" cols="40" rows = "4"></textarea><br/>
							<button type = "button" id = "postCommentButton" class = "rateEventButton">Komentiraj</button>
						</div>
					{/if}
					<br/>
					<div id = "eventComments">
					</div>
				</ul>
			</div>
		{/section}
		<div id = "purchaseEvent" style= "display:none;">
		<form>
		<span> Kupovina ulaznica: </span> <br/>
		<span> Cijena ulaznice: </span>
			{if (isset($events[i].cijena_karte))}{$events[i].cijena_karte}{/if}kn<br/>
		<input type = "text" name = "ticketNumber" /><br/>
		<input type = "submit" value = "kupi"><br/>
		</form>
		</div>
		
	
</div>

{include file="footer.tpl"}