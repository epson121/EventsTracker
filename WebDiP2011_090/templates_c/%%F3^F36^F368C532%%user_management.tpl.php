<?php /* Smarty version 2.6.6, created on 2012-06-02 12:36:49
         compiled from user_management.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id = "sadrzaj">

	<div class = "originalData">
		
		<form id = 'regis' class = "form1" name= "userData" method = "post" action="change_user_data.php" enctype="multipart/form-data">
			<table class = "management">
				<tr>
					<td style="color:#CC6600;" colspan= 3>Kako bi promjenili podatke, označite polje!</td>
				</tr>
				<tr>
					<td>Username</td>
					<td><input type = "text" readonly= "true" name = "username" value = <?php if (( isset ( $this->_tpl_vars['Username'] ) )): ?>"<?php echo $this->_tpl_vars['Username']; ?>
"<?php endif; ?>/></td>
					<td>Nemoguće promjeniti!</td>
					<td>Ime</td>
					<td><input type = "text" readonly="true" name = "ime" value = <?php if (( isset ( $this->_tpl_vars['Ime'] ) )): ?>"<?php echo $this->_tpl_vars['Ime']; ?>
"<?php endif; ?>"/></td>
					<td><input type="checkbox" onclick="provjera()" name="imeBox" value="ON"/></td>
				</tr>
				<tr>
					<td>Prezime</td>
					<td><input type = "text" readonly="true" name = "prezime" value = <?php if (( isset ( $this->_tpl_vars['Prezime'] ) )): ?>"<?php echo $this->_tpl_vars['Prezime']; ?>
"<?php endif; ?>/></td>
					<td><input type="checkbox" onclick="provjera()" name="prezimeBox" value="ON"/></td>
					<td>Tip korisnika</td>
					 <?php if (( ! isset ( $this->_tpl_vars['nonAdmin'] ) )): ?> 
					<td><select name = "tipKorisnika"><option <?php if (( isset ( $this->_tpl_vars['tipKorisnika'] ) ) && $this->_tpl_vars['tipKorisnika'] == 1): ?>selected<?php endif; ?>>1</option><option <?php if (( isset ( $this->_tpl_vars['tipKorisnika'] ) ) && $this->_tpl_vars['tipKorisnika'] == 2): ?>selected<?php endif; ?>>2</option><option <?php if (( isset ( $this->_tpl_vars['tipKorisnika'] ) ) && $this->_tpl_vars['tipKorisnika'] == 3): ?>selected<?php endif; ?>>3</option></select></td>
					<?php else: ?><td><input type= "text" readonly = "true" name = "tipKorisnika" value =<?php if (( isset ( $this->_tpl_vars['tipKorisnika'] ) )):  echo $this->_tpl_vars['tipKorisnika'];  endif; ?>></td> 
					<?php endif; ?>
					<td><?php if (( ! isset ( $this->_tpl_vars['nonAdmin'] ) )): ?> 1.RK, 2.MOD, 3.ADMIN <?php else: ?>Nemoguće promjeniti<?php endif; ?></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type = "text" readonly="true"  name = "email" value = <?php if (( isset ( $this->_tpl_vars['Email'] ) )): ?>"<?php echo $this->_tpl_vars['Email']; ?>
"<?php endif; ?>/></td>
					<td><input type="checkbox" onclick="provjera()" name="emailBox" value="ON"/></td>
					<td>Avatar</td>
					<td><input type = "file" readonly="true"  name = "avatar" value = <?php if (( isset ( $this->_tpl_vars['Avatar'] ) )): ?>"<?php echo $this->_tpl_vars['Avatar']; ?>
"<?php endif; ?>/></td>
					<td>Promjena avatara</td>
				</tr>
				<tr>
					<td>Lozinka</td>
					<td><input type = "text" readonly="true"  name = "lozinka" value = <?php if (( isset ( $this->_tpl_vars['lozinka'] ) )): ?>"<?php echo $this->_tpl_vars['lozinka']; ?>
"<?php endif; ?>/></td>
					<td><input type="checkbox" onclick="provjera()" name="passBox" value="ON"/></td>
					<td>Status korisnika</td>
					<?php if (( ! isset ( $this->_tpl_vars['nonAdmin'] ) )): ?>
					<td><select name = "statusKorisnika"><option <?php if (( isset ( $this->_tpl_vars['statusKorisnika'] ) ) && $this->_tpl_vars['statusKorisnika'] == 0): ?>selected<?php endif; ?>>0</option><option <?php if (( isset ( $this->_tpl_vars['statusKorisnika'] ) ) && $this->_tpl_vars['statusKorisnika'] == 1): ?>selected<?php endif; ?>>1</option><option <?php if (( isset ( $this->_tpl_vars['statusKorisnika'] ) ) && $this->_tpl_vars['statusKorisnika'] == 2): ?>selected<?php endif; ?>>2</option></select></td>
					<?php else: ?><td><input type = "text" readonly = "true" name= "statusKorisnika" value = <?php if (( isset ( $this->_tpl_vars['statusKorisnika'] ) )):  echo $this->_tpl_vars['statusKorisnika'];  endif; ?>></td>
					<?php endif; ?>
					<td><?php if (( ! isset ( $this->_tpl_vars['nonAdmin'] ) )): ?>0.Neaktiviran 1.Aktiviran 2.Zaključan<?php else: ?>Nemoguće promjeniti<?php endif; ?></td>
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
		<?php if (( isset ( $this->_tpl_vars['noName'] ) )): ?> <span class = 'greska'> <?php echo $this->_tpl_vars['noName']; ?>
 </span> <?php endif; ?> <br/>
		<?php if (( isset ( $this->_tpl_vars['noSurname'] ) )): ?> <span class = 'greska'> <?php echo $this->_tpl_vars['noSurname']; ?>
 </span> <?php endif; ?> <br/>
		<?php if (( isset ( $this->_tpl_vars['noEmail'] ) )): ?> <span class = 'greska'> <?php echo $this->_tpl_vars['noEmail']; ?>
 </span> <?php endif; ?><br/>
		<?php if (( isset ( $this->_tpl_vars['uspjesnoDodanaKartica'] ) )): ?> <span class = 'uspjesno'> <?php echo $this->_tpl_vars['uspjesnoDodanaKartica']; ?>
 </span> <?php endif; ?><br/>
		
		
		
	</div>
	<div id = "myEvents">
	</div>


</div>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

