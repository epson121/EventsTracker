{include file = "header.tpl"}

<div id = 'sadrzaj'> 

	
	<div class = "admin_panel">
	
	
		<ul class = "adminPanelList">
		{if (isset($admin))}
			<li><a href ='virtualTime.php'>Virtualno vrijeme</a></li><br/>
			<li><a>Korisnici</a>
				<ul>
					<li><a href ='usersPaging.php'>Uređivanje korisnika</a></li>
					<li><a href ='lockedUsersPaging.php'>Ispis zaključanih korisnika</a></li>
					<li><a href ='markedUsersPaging.php'>Ispis označenih korisnika</a></li>
					<li><a href ='deniedUsersPaging.php'>Ispis korisnika kojima je zabranjen pristup</a></li>
				</ul>
			</li><br/>
			<li><a>Kategorije</a>
				<ul>
					<li><a href = "categoriesPaging.php"> Uređivanje kategorija </a> </li>
					<li><a href = "lurajcevi_02_kreiranje_kategorije.php"> Kreiranje kategorije</a> </li>
					
				</ul>
			</li><br/>
		{/if}
			<li><a>Događaji</a>
				<ul>
					<li><a href = "lurajcevi_02_kreiranje_dogadaja.php"> Kreiranje događaja </a> </li>
					<li><a href = "eventPaging.php"> Uređivanje događaja </a> </li>
					<li><a href = "events.php">Pregled aktivnih događaja </a> </li>
					<li><a href = "allEvents.php">Pregled svih događaja </a> </li>
				</ul> 
			</li><br/>
			{if isset($admin)}
			<li>
			<a href ='searchLogger.php'>Pretraži dnevnik </a>
			</li><br/>
			{/if}
			{if (isset($admin))}
				<button name = 'deleteCategory' id = "deleteCategoryButton" class = "rateEventButton">Izbriši kategoriju!</button>
				<button name = 'deleteEvent' id = "deleteEventButton" class = "rateEventButton">Izbriši događaj!</button>
				<button name = 'deleteUser' id = "deleteUserButton" class = "rateEventButton">Izbriši korisnika!</button>
			{/if}
			<button name = 'markUser' id = "markUserButton" class = "rateEventButton">Označi korisnika</button>
			<button name = 'disableUserAccess' id = "disableUserAccessButton" class = "rateEventButton">Onemogući pristup korisniku</button>
		</ul>
		
			<div>
			<canvas id="mycanvas" style= "float:right;margin-left:40px;"></canvas>
			</div>
			
		
	
	
	
	
	</div> 


</div>







{include file = "footer.tpl"}