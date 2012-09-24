<?php /* Smarty version 2.6.6, created on 2012-06-04 16:31:46
         compiled from lurajcevi_02_dokumentacija.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id = 'sadrzaj'> 
			<div class= 'documentation_container'>
				<span id = 'izbornik'><a href ='Opis_projektnog_zadatka.pdf' ><h4>Opis projektnog zadatka </h4></a></span>
				<span id = 'izbornik'><a href ='lurajcevi_02_opis_rjesenja.php'><h4>Opis projektnog rješenja </h4></a></span>
				<br/><br/><br/>
				<h2> Dokumentacija - ER model, sequence dijagrami i use case dijagrami</h2>
				<ul class = "dokumentacija_slike" >
						
							<li> 
								<div class = 'thumb_holder'>
								<a href = 'lurajcevi_02_dokumentacija_era.php' > 
									<img src = "pictures/tn_database.jpg" alt = "er_model" />
								</a>
								<p> ERA model </p>
								</div>
							</li>
						
						
						<li> 
							<div class = 'thumb_holder'>
								<a href = 'lurajcevi_02_dokumentacija_navigation.php'>
									<img src = "pictures/tn_directions.jpg" alt = "navigacijski_model" /> 
								</a>
								<p> Navigacijski dijagram </p>
								</div>
						</li>
					
						
						<li> 
							<div class = 'thumb_holder'>
								<a href = 'lurajcevi_02_dokumentacija_sequence.php' >
									<img src = "pictures/tn_sequence.jpg" alt = "sequence dijagram" />
								</a>
								<p> Sekvencijalni dijagrami </p>
							</div>
						</li>
						
					
						<li> 
								<div class = 'thumb_holder'>
								<a href = 'lurajcevi_02_dokumentacija_useCase.php' >
									<img src = "pictures/tn_useCase.jpg" alt = "useCase" />
								</a>
								<p> Use case dijagrami </p>
							</div>
						</li>
						
				</ul>
			</div>
		</div>




<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>