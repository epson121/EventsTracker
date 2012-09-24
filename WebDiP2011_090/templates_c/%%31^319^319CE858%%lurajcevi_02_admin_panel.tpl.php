<?php /* Smarty version 2.6.6, created on 2012-06-04 21:34:38
         compiled from lurajcevi_02_admin_panel.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id = 'sadrzaj'> 

	
	<div class = "admin_panel">
	
	
		<ul class = "adminPanelList">
		<?php if (( isset ( $this->_tpl_vars['admin'] ) )): ?>
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
		<?php endif; ?>
			<li><a>Događaji</a>
				<ul>
					<li><a href = "lurajcevi_02_kreiranje_dogadaja.php"> Kreiranje događaja </a> </li>
					<li><a href = "eventPaging.php"> Uređivanje događaja </a> </li>
					<li><a href = "events.php">Pregled aktivnih događaja </a> </li>
					<li><a href = "allEvents.php">Pregled svih događaja </a> </li>
				</ul> 
			</li><br/>
			<?php if (isset ( $this->_tpl_vars['admin'] )): ?>
			<li>
			<a href ='searchLogger.php'>Pretraži dnevnik </a>
			</li><br/>
			<?php endif; ?>
			<?php if (( isset ( $this->_tpl_vars['admin'] ) )): ?>
				<button name = 'deleteCategory' id = "deleteCategoryButton" class = "rateEventButton">Izbriši kategoriju!</button>
				<button name = 'deleteEvent' id = "deleteEventButton" class = "rateEventButton">Izbriši događaj!</button>
				<button name = 'deleteUser' id = "deleteUserButton" class = "rateEventButton">Izbriši korisnika!</button>
			<?php endif; ?>
			<button name = 'markUser' id = "markUserButton" class = "rateEventButton">Označi korisnika</button>
			<button name = 'disableUserAccess' id = "disableUserAccessButton" class = "rateEventButton">Onemogući pristup korisniku</button>
		</ul>
		
			<div>
			<canvas id="mycanvas" style= "float:right;margin-left:40px;"></canvas>
			</div>
			
		
	
	
	
	
	</div> 


</div>







<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>