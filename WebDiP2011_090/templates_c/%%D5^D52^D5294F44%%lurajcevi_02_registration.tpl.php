<?php /* Smarty version 2.6.6, created on 2012-06-04 22:30:41
         compiled from lurajcevi_02_registration.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id = 'sadrzaj'> 
			<div class = image_div>
			<img class = 'image' src = "pictures/Giraffe.png" alt = 'Žirafa' />
			</div>
			<div class = "reg_form" >
				Registriraj se:
				<form id = 'registracija' name='registracija_' method='post' action = 'insert.php' enctype="multipart/form-data">
					Ime:<br/>
					<div>
					<input type="text" class = "formInput" id = "ime" name = "ime" value ="<?php if (( isset ( $this->_tpl_vars['ime'] ) )):  echo $this->_tpl_vars['ime'];  endif; ?>"/>
					<?php if (( isset ( $this->_tpl_vars['noName'] ) )): ?> <span class = 'greska'> <?php echo $this->_tpl_vars['noName']; ?>
 </span> <?php endif; ?> 
					
					</div>
					<div>
					Prezime:<br/><input type="text" class = "formInput" name= "prezime" value = "<?php if (( isset ( $this->_tpl_vars['prezime'] ) )):  echo $this->_tpl_vars['prezime'];  endif; ?>"/>
					<?php if (( isset ( $this->_tpl_vars['noSurname'] ) )): ?> <span class = 'greska'> <?php echo $this->_tpl_vars['noSurname']; ?>
 </span> <?php endif; ?> 
					
					</div>
					<div>
					E-mail<br/><input type ="text"  class = "formInput" name = "email" value = "<?php if (( isset ( $this->_tpl_vars['email'] ) )):  echo $this->_tpl_vars['email'];  endif; ?>" />
					<?php if (( isset ( $this->_tpl_vars['noEmail'] ) )): ?> <span class = 'greska'> <?php echo $this->_tpl_vars['noEmail']; ?>
 </span> <?php endif; ?>
					
					</div>
					<div>
					Korisničko ime <br/><input type = "text" class = "formInput" id = "kor_ime" name = "username" value = "<?php if (( isset ( $this->_tpl_vars['username'] ) )):  echo $this->_tpl_vars['username'];  endif; ?>"/>
					<span id = "usernameStatus" class = "jsOk"></span>
					<?php if (( isset ( $this->_tpl_vars['noUsername'] ) )): ?> <span class = 'greska'> <?php echo $this->_tpl_vars['noUsername']; ?>
 </span> <?php endif; ?>
					
					</div>
					<div>
					Lozinka<br/><input type = "password" class = "formInput" id = "password" name = "password" />
					<?php if (( isset ( $this->_tpl_vars['noPassword'] ) )): ?> <span class = 'greska'> <?php echo $this->_tpl_vars['noPassword']; ?>
 </span> <?php endif; ?>
					
					</div>
					<div>
					Ponovljena lozinka: <br/><input type = "password" class = "formInput" name = "re_password" />
					<?php if (( isset ( $this->_tpl_vars['noRePass'] ) )): ?> <span class = 'greska'> <?php echo $this->_tpl_vars['noRePass']; ?>
 </span> <?php endif; ?>
					
					</div>
					<input type="hidden" name="MAX_FILE_SIZE" value="1048576">
					<div>
					Avatar: <br/><input type = "file" name = "avatar" /><br/>
					</div>
					<?php if (( isset ( $this->_tpl_vars['captcha'] ) )): ?> <?php echo $this->_tpl_vars['captcha']; ?>
 <?php endif; ?>
					<div>
					<input type = "submit" name = "ok" value = "Registriraj se" />
					</div>
				</form>
				<?php if (( isset ( $this->_tpl_vars['noPassMatch'] ) )): ?> <span class = 'greska'> <?php echo $this->_tpl_vars['noPassMatch']; ?>
 </span> <?php endif; ?>
				<?php if (( isset ( $this->_tpl_vars['passwordError'] ) )): ?> <br/><span class = 'greska'> <?php echo $this->_tpl_vars['passwordError']; ?>
 </span><?php endif; ?>
				<?php if (( isset ( $this->_tpl_vars['recaptcha_err'] ) )): ?> <br/><span class = 'greska'> <?php echo $this->_tpl_vars['recaptcha_err']; ?>
 </span><?php endif; ?>
			</div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>