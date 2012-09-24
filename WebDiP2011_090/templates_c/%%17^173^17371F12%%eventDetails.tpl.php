<?php /* Smarty version 2.6.6, created on 2012-06-04 22:56:15
         compiled from eventDetails.tpl */ ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id = 'sadrzaj'> 
		
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
			<div class = "event" id = "event">
				<ul>	
					<br/>
					<div class = "eventHeader">
					<li>
					
						<?php if (( isset ( $this->_tpl_vars['events'][$this->_sections['i']['index']]['naziv_dogadaja'] ) )):  echo $this->_tpl_vars['events'][$this->_sections['i']['index']]['naziv_dogadaja'];  endif; ?>
					</li>
					</div>
					<div class = "eventBody" id = "eventBody">
					<li>Mjesto:
						<ul>
							
							<li>
							<?php if (( isset ( $this->_tpl_vars['events'][$this->_sections['i']['index']]['mjesto'] ) )):  echo $this->_tpl_vars['events'][$this->_sections['i']['index']]['mjesto'];  endif; ?>
							</li>
							
						</ul>
					</li>
					<li>Datum:
						<ul>
							<li>
							<?php if (( isset ( $this->_tpl_vars['events'][$this->_sections['i']['index']]['datum_dogadjaja'] ) )):  echo $this->_tpl_vars['events'][$this->_sections['i']['index']]['datum_dogadjaja'];  endif; ?><br/>
							</li>
						</ul>
					</li>	
					<li>Opis:
						<ul>
							<li>
							<?php if (( isset ( $this->_tpl_vars['events'][$this->_sections['i']['index']]['opis_dogadaja'] ) )):  echo $this->_tpl_vars['events'][$this->_sections['i']['index']]['opis_dogadaja'];  endif; ?><br/>
							</li>
						</ul>
					</li>	
					<li>Cijena:
						<ul>
							<li> 
							<?php if (( isset ( $this->_tpl_vars['events'][$this->_sections['i']['index']]['cijena_karte'] ) )):  echo $this->_tpl_vars['events'][$this->_sections['i']['index']]['cijena_karte'];  endif; ?>kn
							</li>
						</ul>
						<?php if (( $this->_tpl_vars['events'][$this->_sections['i']['index']]['prijevoz_cijena'] != 0 )): ?>
						<ul>Cijena prijevoza:
							<li> 
							<?php if (( isset ( $this->_tpl_vars['events'][$this->_sections['i']['index']]['prijevoz_cijena'] ) )):  echo $this->_tpl_vars['events'][$this->_sections['i']['index']]['prijevoz_cijena'];  endif; ?>kn
							</li>
						</ul>
						<?php endif; ?>
						<?php if (( $this->_tpl_vars['events'][$this->_sections['i']['index']]['nocenje_cijena'] != 0 )): ?>
						<ul>Cijena noćenja:
							<li> 
							<?php if (( isset ( $this->_tpl_vars['events'][$this->_sections['i']['index']]['nocenje_cijena'] ) )):  echo $this->_tpl_vars['events'][$this->_sections['i']['index']]['nocenje_cijena'];  endif; ?>kn
							</li>
						</ul>
						<?php endif; ?>
					</li>
					<li>Ocjena
							<ul>
							<li>
								<?php if (( isset ( $this->_tpl_vars['uspjeh'] ) )): ?>
									<select name = "eventRate" id = "eventRate">
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
										<option>5</option>
									</select>
									
									
										<button type = "button" id = "rateEventButton" class = "rateEventButton">Ocijeni!</button>
										<button type = "button" id = "getVotersNames" class = "rateEventButton">Pogledaj ocjene!</button><br/>
								<?php endif; ?>	
							</li>
							<li>
							Prosjek:
								<span id = "prosjek"></span><span id = "xD"><?php if (( isset ( $this->_tpl_vars['prosjek'] ) )):  echo $this->_tpl_vars['prosjek'];  endif; ?></span>
							</li>
							</ul>
						</li>
							<?php if (( isset ( $this->_tpl_vars['uspjeh'] ) )): ?>
						<li>
						Broj slobodnih mjesta:
							<ul>
								<li>
									<?php if (( isset ( $this->_tpl_vars['events'][$this->_sections['i']['index']]['br_mjesta'] ) )):  echo $this->_tpl_vars['events'][$this->_sections['i']['index']]['br_mjesta'];  endif; ?>
								</li>
							</ul>
						<?php endif; ?>
						</li>
						<li>
						Galerija slika
						<li>
							<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['slika']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
								<div id = "gallery" class = 'imageGallery'><a href = '<?php if (( isset ( $this->_tpl_vars['slika'][$this->_sections['i']['index']]['path_slike'] ) )):  echo $this->_tpl_vars['slika'][$this->_sections['i']['index']]['path_slike'];  endif; ?>' class = "lightbox_trigger"><img src = '<?php if (( isset ( $this->_tpl_vars['slika'][$this->_sections['i']['index']]['path_slike_thumb'] ) )):  echo $this->_tpl_vars['slika'][$this->_sections['i']['index']]['path_slike_thumb'];  endif; ?>' alt = 'slika'/></a></div>
							<?php endfor; endif; ?>
						</li>
						<li>
						<br/><br/>
							<?php if (( isset ( $this->_tpl_vars['autor'] ) )): ?>
								<a href = "addImageToGalleryForm.php?id=<?php if (( isset ( $this->_tpl_vars['idEventa'] ) )):  echo $this->_tpl_vars['idEventa'];  endif; ?>" alt = "dodaj_sliku_u_avatar"  class = 'addImageToGallery'"> Dodaj sliku u galeriju</a>
								<a href = "editImageGallery.php?id=<?php if (( isset ( $this->_tpl_vars['idEventa'] ) )):  echo $this->_tpl_vars['idEventa'];  endif; ?>" alt = "uredi_sliku"  class = 'addImageToGallery'"> Uredi galeriju</a>
							<?php endif; ?>
						</li>
						<?php if (( isset ( $this->_tpl_vars['uspjeh'] ) )): ?>
						<li><br/>	
							<?php if (( ( $this->_tpl_vars['events'][0]['status_dogadjaja'] == 1 ) )): ?>
								<button type = "button" id = "purchaseButton" class = "purchaseButton">Kupi ulaznice!</button>
								<button type = "button" id = "addToCartButton" class = "purchaseButton">Dodaj u košaricu!</button>
								
						
							<?php else: ?>
								Događaj je istekao!
							<?php endif; ?>
						<?php endif; ?>
							<button type = "button" id = "getBuyers" class = "purchaseButton">Pregled kupljenih karti!</button>
						</li>
						
					</div>
					<div id = "eventStuff">
					</div>
					<div id = "eventBuyers">
					</div>
					<?php if (( isset ( $this->_tpl_vars['uspjeh'] ) )): ?>
						<div id = "commentAnEvent">
							<span class = 'eventCommentHeader'>Komentiraj: </span><br/>
							<textarea class = 'eventCommentText' id = "eventCommentText" cols="40" rows = "4"></textarea><br/>
							<button type = "button" id = "postCommentButton" class = "rateEventButton">Komentiraj</button>
						</div>
					<?php endif; ?>
					<br/>
					<div id = "eventComments">
					</div>
				</ul>
			</div>
		<?php endfor; endif; ?>
		<div id = "purchaseEvent" style= "display:none;">
		<form>
		<span> Kupovina ulaznica: </span> <br/>
		<span> Cijena ulaznice: </span>
			<?php if (( isset ( $this->_tpl_vars['events'][$this->_sections['i']['index']]['cijena_karte'] ) )):  echo $this->_tpl_vars['events'][$this->_sections['i']['index']]['cijena_karte'];  endif; ?>kn<br/>
		<input type = "text" name = "ticketNumber" /><br/>
		<input type = "submit" value = "kupi"><br/>
		</form>
		</div>
		
	
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>