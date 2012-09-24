<?php /* Smarty version 2.6.6, created on 2012-06-01 22:50:58
         compiled from lurajcevi_02_login.tpl */ ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

		<div id = 'sadrzaj'> 
		
			<div class = image_div>
				<img src = "pictures/Giraffe.png" alt = 'Žirafa'/>
			</div>
			<div class = "podstava">
				<div>
				<form id = 'logiranje' name='logiranje' method='POST' action = 'login.php'>
					
					<input class= "form_style" id = "uname" type = 'text' name = 'username' value = "<?php if (( isset ( $this->_tpl_vars['cookiedUser'] ) )):  echo $this->_tpl_vars['cookiedUser'];  endif; ?>" /> <br/>
					<input class= "form_style1" id ="pwd" type = 'password' name = 'password'  />  <br/> 
					<input class= "form_checkbox" type = 'checkbox' name= 'remember' value  = '0' checked /> Zapamti me <br/>                                                  
					<input type = 'hidden' name = 'op' value = 'ds'/>
					<input class= "form_style2" type = 'submit' name = 'ok' value = 'Log in' />
					<button type = "button" id = "forgottenPassword" class = "rateEventButton">Zaboravljena lozinka?</button>
				</form>
				</div>
				<div class = 'err' id = "errorDIV">
					<div name = "yy"><?php if (( isset ( $this->_tpl_vars['emptyInput'] ) )): ?>
						<?php echo $this->_tpl_vars['emptyInput']; ?>

					<?php elseif (( isset ( $this->_tpl_vars['neuspjeh'] ) )): ?>
						<?php echo $this->_tpl_vars['neuspjeh']; ?>

					<?php elseif (( isset ( $this->_tpl_vars['nonAuthAccess'] ) )): ?>
						<?php echo $this->_tpl_vars['nonAuthAccess']; ?>

					<?php endif; ?>
					<?php if (( isset ( $this->_tpl_vars['accessDenied'] ) )): ?>
						<?php echo $this->_tpl_vars['accessDenied']; ?>

					<?php endif; ?>
					</div>
				</div>
			</div>
			
		</div>
		
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>