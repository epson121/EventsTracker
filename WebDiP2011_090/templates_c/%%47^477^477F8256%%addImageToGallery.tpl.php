<?php /* Smarty version 2.6.6, created on 2012-05-13 23:33:16
         compiled from addImageToGallery.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id = "sadrzaj">
	<form  method='post' action = 'addImageToGallery.php?id=<?php if (( isset ( $this->_tpl_vars['id'] ) )):  echo $this->_tpl_vars['id'];  endif; ?>' enctype="multipart/form-data">
	<br/>
		Naziv slike: <br/>
		<input type = "text" name = "namePicture" /> <br/>
		Opis slike:<br/>
		<textarea name = "descriptionPicture" rows = "3" cols = "43"></textarea><br/>
		<input type="hidden" name="MAX_FILE_SIZE" value="1048576">
		Slika: <br/><input type = "file" name = "uploadPicture" /><br/><br/>
		<input type = "submit" name = "ok" value = "Dodaj sliku u galeriju" />
	
	</form>


<span class = 'uspjesno'><?php if (( isset ( $this->_tpl_vars['uspjehslika'] ) )):  echo $this->_tpl_vars['uspjeh'];  endif; ?></span>
</div>




<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>