<?php /* Smarty version 2.6.6, created on 2012-05-31 01:02:38
         compiled from eventManagement.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<div id = "sadrzaj">
	<div style = "float:left; border:1px solid orange;">
	
		<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['events']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
		<form id = 'createEvent' name='createEvent' method='post' action = 'changeEventData.php?id=<?php if (( isset ( $this->_tpl_vars['events'][0]['id_dogadaj'] ) )):  echo $this->_tpl_vars['events'][0]['id_dogadaj'];  endif; ?>'>
		Autor:<br/>
		<div>
		<input type= "text" readonly = "true" name= "eventAuthor" id = "eventAuthor" value = <?php if (( isset ( $this->_tpl_vars['userName'] ) )): ?>"<?php echo $this->_tpl_vars['userName']; ?>
"<?php endif; ?>/>
		</div>
		Kategorija:<br/>
		<div>
		<select name = "eventCategoryName" id = "eventCategoryName">
			<?php if (( isset ( $this->_tpl_vars['admin'] ) )): ?>
			<option value = "none">Odaberite kategoriju </option>
			<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['cat']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?> 
			<option value =<?php echo $this->_tpl_vars['cat'][$this->_sections['i']['index']]['naziv_kategorije']; ?>
 <?php if (( $this->_tpl_vars['cat'][$this->_sections['i']['index']]['naziv_kategorije'] == $this->_tpl_vars['categoryName'] )): ?> selected = "selected" <?php endif; ?>> <?php echo $this->_tpl_vars['cat'][$this->_sections['i']['index']]['naziv_kategorije']; ?>
</option>
			<?php endfor; endif; ?>
			<?php endif; ?>
			<?php if (( isset ( $this->_tpl_vars['mod'] ) )): ?>
				<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['cat']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?> 
				<option value =<?php echo $this->_tpl_vars['cat'][$this->_sections['i']['index']]['naziv_kategorije']; ?>
 <?php if (( $this->_tpl_vars['cat'][$this->_sections['i']['index']]['naziv_kategorije'] == $this->_tpl_vars['categoryName'] )): ?> selected = "selected" <?php endif; ?>> <?php echo $this->_tpl_vars['cat'][$this->_sections['i']['index']]['naziv_kategorije']; ?>
</option>
				<?php endfor; endif; ?>
			<?php endif; ?>
		</select><br/>
		</div>
		Naziv događaja<br/>
		<div>
		<input type = "text" name = "eventName" id = "eventName"  <?php if (( isset ( $this->_tpl_vars['events'][0]['naziv_dogadaja'] ) )): ?> value ="<?php echo $this->_tpl_vars['events'][0]['naziv_dogadaja']; ?>
" <?php endif; ?> />
		</div>
		Opis događaja: <br/>
		<div>
		<textarea rows= 4 cols=43  name = "eventDescription"><?php if (( isset ( $this->_tpl_vars['events'][0]['opis_dogadaja'] ) )):  echo $this->_tpl_vars['events'][0]['opis_dogadaja'];  endif; ?></textarea>
		</div>
		Datum:
		<div>
		<select name = "dan" id = "dan"><option value ="none" > Dan </dan>
						  <option value ='pre' selected = "selected"><?php if (( isset ( $this->_tpl_vars['day'] ) )):  echo $this->_tpl_vars['day'];  endif; ?></option>
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
			 <option value ='<?php if (( isset ( $this->_tpl_vars['n'] ) )):  echo $this->_tpl_vars['n'];  endif; ?>' selected = "selected"><?php if (( isset ( $this->_tpl_vars['month'] ) )):  echo $this->_tpl_vars['month'];  endif; ?></option>
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
		<input type = 'text' name = 'godina' value =  <?php if (( isset ( $this->_tpl_vars['year'] ) )): ?> "<?php echo $this->_tpl_vars['year']; ?>
" <?php endif; ?> />
		</div>
		Vrijeme početka: <br/>
		<div>
		<input type = text name = "vrijemePocetkaSat" maxlength="2" id = "vrijemePocetkaSat" size = "2" <?php if (( isset ( $this->_tpl_vars['hour'] ) )): ?> value="<?php echo $this->_tpl_vars['hour']; ?>
" <?php endif; ?> /> :
		<input type = text name = "vrijemePocetkaMinuta" maxlength="2" id = "vrijemePocetkaMinuta" size = "2" <?php if (( isset ( $this->_tpl_vars['minute'] ) )): ?> value="<?php echo $this->_tpl_vars['minute']; ?>
" <?php endif; ?> />
		</div>
		Cijena: <br/>
		<div>
		<input type = "text" name = "cijena" id = "cijena" <?php if (( isset ( $this->_tpl_vars['events'][0]['cijena_karte'] ) )): ?> value="<?php echo $this->_tpl_vars['events'][0]['cijena_karte']; ?>
" <?php endif; ?> />
		</div>

		<div id ="eventBenefits" >
			<span>Prijevoz</span>
			<div>
				<input type='text' style='width:30px;' name ='prijevoz_cijena' <?php if (( $this->_tpl_vars['events'][0]['prijevoz_cijena'] == "" )): ?>
																					value = "0"
																			   <?php else: ?>
																					value = <?php echo $this->_tpl_vars['events'][0]['prijevoz_cijena']; ?>

																				<?php endif; ?>/>kn
			</div>
			<span>Noćenje</span>
			<div>
				<input type='text' style='width:30px;' name ='nocenje_cijena' <?php if (( $this->_tpl_vars['events'][0]['nocenje_cijena'] == "" )): ?>
																					value = "0"
																			   <?php else: ?>
																					value = <?php echo $this->_tpl_vars['events'][0]['nocenje_cijena']; ?>

																				<?php endif; ?>/>kn
			</div>
		
		</div>
		Broj mjesta: <br/>
		<div>
		<input type = "text" name = "br_mjesta" id = "br_mjesta" value =<?php if (( isset ( $this->_tpl_vars['events'][0]['br_mjesta'] ) )): ?>"<?php echo $this->_tpl_vars['events'][0]['br_mjesta']; ?>
"<?php endif; ?> >
		</div>
		Mjesto održavanja (Adresa): <br/>
		<div>
		<input type = "text" name = "mjesto" id = "mjesto" size = "43" value ="<?php echo $this->_tpl_vars['events'][0]['mjesto']; ?>
" >
		
		</div>
		<div>
		<select name="status" > 
			<option value ="none">Status</option>
			<option value = <?php echo $this->_tpl_vars['events'][0]['status_dogadjaja']; ?>
 selected = "selected"> <?php echo $this->_tpl_vars['events'][0]['status_dogadjaja']; ?>
</option>
			<option value = "0"> 0 </value>
			<option value = "1"> 1 </value>
		</select>
		</div>
		<div>
		<input  type = "submit" name = "ok" value = "Kreiraj događaj"/>
		</div>
		<span class = 'err'>
		<?php if (( isset ( $this->_tpl_vars['emptyField'] ) )):  echo $this->_tpl_vars['emptyField'];  endif; ?>
		</span>
	</div>
	<div  style= "float:right;">
		<img src = "pictures/kreiranje_dogadaja.png" alt = "dogadaj" width = "400" height = "280" style = "margin-top:7em;"/>
	</div>
	<?php endfor; endif; ?>
	</form>
</div>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>