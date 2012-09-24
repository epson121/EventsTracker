<?php /* Smarty version 2.6.6, created on 2012-06-01 23:00:08
         compiled from predlozak_tpl.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id = 'sadrzaj'> 
<?php if (( isset ( $this->_tpl_vars['successfulActivation'] ) )): ?> <span class = 'uspjesno'> <?php echo $this->_tpl_vars['successfulActivation']; ?>
 </span> <?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['updateSuccessful'] ) )): ?><span class = 'uspjesno'> Uspješna promjena podataka. Neke promjene su vidljive automatski dok se za neke potrebno ponovo ulogirati. </span><?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['rejectedActivation'] ) )): ?> <span class = 'greska'> <?php echo $this->_tpl_vars['rejectedActivation']; ?>
 </span> <?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['activationTimedOut'] ) )): ?> <span class = 'greska'> <?php echo $this->_tpl_vars['activationTimedOut']; ?>
 </span> <?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['successCC'] ) )): ?> <span class = 'uspjesno'> <?php echo $this->_tpl_vars['successCC']; ?>
 </span> <?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['insertSuccessful'] ) )): ?> <span class = 'uspjesno'> <?php echo $this->_tpl_vars['insertSuccessful']; ?>
 </span><?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['newPass'] ) )): ?> <span class = 'uspjesno'> <?php echo $this->_tpl_vars['newPass']; ?>
 </span><?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['successPurchase'] ) )): ?> <span class = 'uspjesno'> <?php echo $this->_tpl_vars['successPurchase']; ?>
 </span> <?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['purchaseError'] ) )): ?> <span class = 'greska'> <?php echo $this->_tpl_vars['purchaseError']; ?>
 </span> <?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['failure'] ) )): ?> <span class = 'greska'> <?php echo $this->_tpl_vars['failure']; ?>
 </span> <?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['deniedAccess'] ) )): ?><span class = 'greska'> <?php echo $this->_tpl_vars['deniedAccess']; ?>
</span><?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['successfullAddingToCart'] ) )): ?> <span class = 'uspjesno'> <?php echo $this->_tpl_vars['successfullAddingToCart']; ?>
 </span><?php endif; ?>
<?php if (( isset ( $this->_tpl_vars['changeEventSuccess'] ) )): ?> <span class = 'uspjesno'> <?php echo $this->_tpl_vars['changeEventSuccess']; ?>
 </span><?php endif; ?>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>