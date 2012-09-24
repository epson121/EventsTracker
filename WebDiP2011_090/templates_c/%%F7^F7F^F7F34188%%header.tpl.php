<?php /* Smarty version 2.6.6, created on 2012-06-04 22:01:58
         compiled from header.tpl */ ?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<link rel="shortcut icon" href="pictures/favicon.ico"/>
		<link type = 'text/css' rel = 'stylesheet' href='lurajcevi_02_css_1.css'/>
		<meta http-equiv = "Content-Type" content = "text/html; charset = utf-8"/>
		<title> Registracija </title>
		<style>
		</style>
		<script type = "text/javascript" src = "scripts/lib.js"> 
		</script>
		
		
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js">
		</script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js">
		</script>
		<script type="text/javascript" src="scripts/jquery.lightbox-0.5.js">
		</script>
		
		<script type = "text/javascript" src = "scripts/paginationJQuery.js">
		</script>
		<script type = "text/javascript" src = "scripts/processing.js">
		</script>
		<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7/themes/smoothness/jquery-ui.css"/>
		<link rel="stylesheet" type="text/css" href="scripts/jquery.lightbox-0.5.css" media="screen" />
		<script type="text/javascript">
		<?php echo '
		$(function() {
			// Use this example, or...
			//$(\'a[@rel*=lightbox]\').lightBox(); // Select all links that contains lightbox in the attribute rel
			// This, or...
			$(\'#gallery a\').lightBox(); // Select all links in object with gallery ID
			// This, or...
			//$(\'a.lightbox\').lightBox(); // Select all links with lightbox class
			// This, or...
			//$(\'a\').lightBox(); // Select all links in the page
			// ... The possibility are many. Use your creative or choose one in the examples above
		});
		'; ?>

		</script>
		<script type = "text/javascript" src = "scripts/lurajcevi.js">
		</script>
	<script type="text/processing" data-processing-target="mycanvas">
		<?php echo '
			void setup() 
			{
			  size(200, 200);
			  stroke(255);
			  smooth();
			}
			void draw() 
			{
			  //background(0); 
			  background(#cc6600)
			  fill(80);
			  noStroke();
			  //ellipse(100, 100, 160, 160);
			  float s = map(second(), 0, 60, 0, TWO_PI) - HALF_PI;
			  float m = map(minute(), 0, 60, 0, TWO_PI) - HALF_PI;
			  float h = map(hour() % 12, 0, 12, 0, TWO_PI) - HALF_PI;
			  stroke(255);
			  
			  strokeWeight(1);
			  line(100, 100, cos(s) * 72 + 100, sin(s) * 72 + 100);
			  strokeWeight(2);
			  line(100, 100, cos(m) * 60 + 100, sin(m) * 60 + 100);
			  strokeWeight(4);
			  line(100, 100, cos(h) * 50 + 100, sin(h) * 50 + 100);
			}
	'; ?>

	</script>
			
	</head>
	<body>
		
		<div id = 'zaglavlje'>
		</div>
		<div>
			<div  id = 'izbornik'>
				<div class = 'izborni_tekst'>
					<ul class= "izbornik_lista">
							<li><a href = 'lurajcevi_02.php'> Home </a>&nbsp;&nbsp;</li>
						<?php if (( ! isset ( $this->_tpl_vars['uspjeh'] ) )): ?>
							<li><a href = 'lurajcevi_02_login.php'>Login </a>&nbsp;&nbsp;</li>
							<li><a href = 'lurajcevi_02_registration.php'>Registration </a>&nbsp;&nbsp; </li>
						<?php endif; ?>
						<?php if (( isset ( $this->_tpl_vars['admin'] ) )): ?>
							<li><a href = 'usersPaging.php'>Ispis korisnika</a></li>&nbsp;&nbsp;
						<?php endif; ?>
						<?php if (( isset ( $this->_tpl_vars['admin'] ) || isset ( $this->_tpl_vars['mod'] ) )): ?>	
							<li><a href = 'lurajcevi_02_admin_panel.php'>Data Panel</a></li>&nbsp;&nbsp;
						<?php endif; ?>
							<li><a href = 'popisDogadaja.php'>Događaji</a></li>&nbsp;&nbsp;
						<?php if (( isset ( $this->_tpl_vars['uspjeh'] ) )): ?>
							<li><a href = 'cartCheckout.php'>Pregledaj košaricu</a></li>
							<li><a href = "user_management.php?user=<?php if (( isset ( $this->_tpl_vars['userName'] ) )):  echo $this->_tpl_vars['userName'];  endif; ?>">Moji podaci</a></li>&nbsp;&nbsp;
						<?php endif; ?>
						<?php if (( isset ( $this->_tpl_vars['admin'] ) )): ?>
							<li><a href = 'lurajcevi_02_dokumentacija.php'>Dokumentacija</a></li>&nbsp;&nbsp;
						<?php endif; ?>
					</ul>
				</div>
			</div>
			<div id = 'izbornik2' style="float:right;">
			<?php if (( isset ( $this->_tpl_vars['uspjeh'] ) )): ?>
				<div class = 'izborni_tekst'>
					<ul class= "izbornik_lista">
					<li style="float:right;"><a>Prijavljeni ste kao: </a><img style="padding:0;" src="<?php if (( isset ( $this->_tpl_vars['slika'] ) )):  echo $this->_tpl_vars['slika'];  endif; ?>" width="18px" height="18px"/>  <a href = "user_management.php?user=<?php if (( isset ( $this->_tpl_vars['userName'] ) )):  echo $this->_tpl_vars['userName'];  endif; ?>"><?php echo $this->_tpl_vars['userName']; ?>
</a><a href ="odjava.php">&nbsp;(odjava)</a></a></li>                                              
					</ul>
				</div>
			<?php endif; ?>
			</div>
			<?php if (( isset ( $this->_tpl_vars['cart'] ) )): ?>
				<div class = 'shoppingCart'>
					<table class = 'tablica'>
						<tr>
						<td colspan = "2" class = 'cartName'> Košarica </td>
						</tr>
						<?php if (( ! isset ( $this->_tpl_vars['userList'] ) )): ?>
						<tr>
						<td class = 'cartItems'>Košarica je prazna!</td><br/>
						</tr>
						<?php endif; ?>
						<?php if (( isset ( $this->_tpl_vars['userList'] ) )): ?>
							<tr>
							<td>Naziv</td><td>broj karata </td>
							</tr>
							<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['userList']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
							<tr>
							<td class = 'cartItems'><?php if (( isset ( $this->_tpl_vars['userList'][$this->_sections['i']['index']]['ime_eventa'] ) )): ?> <?php echo $this->_tpl_vars['userList'][$this->_sections['i']['index']]['ime_eventa']; ?>
 <?php endif; ?></td><td class = 'cartItems'> <?php if (( isset ( $this->_tpl_vars['userList'][$this->_sections['i']['index']]['br_mjesta'] ) )): ?> <?php echo $this->_tpl_vars['userList'][$this->_sections['i']['index']]['br_mjesta']; ?>
 <?php endif; ?></td>
							</tr>
							<?php endfor; endif; ?>
							<tr>
							<td colspan = "2" class = 'cartName'>Ukupno: <?php if (( isset ( $this->_tpl_vars['ukupno'] ) )):  echo $this->_tpl_vars['ukupno'];  endif; ?> kn</td><br/>
							</tr>
						<?php endif; ?>
						
					</table>
					</ul>
				</div>
				
			<?php endif; ?>
		</div>
			
	
		
		
		
		
		
		
		
		
		
		
		
		
		
		