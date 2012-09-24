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
		{literal}
		$(function() {
			// Use this example, or...
			//$('a[@rel*=lightbox]').lightBox(); // Select all links that contains lightbox in the attribute rel
			// This, or...
			$('#gallery a').lightBox(); // Select all links in object with gallery ID
			// This, or...
			//$('a.lightbox').lightBox(); // Select all links with lightbox class
			// This, or...
			//$('a').lightBox(); // Select all links in the page
			// ... The possibility are many. Use your creative or choose one in the examples above
		});
		{/literal}
		</script>
		<script type = "text/javascript" src = "scripts/lurajcevi.js">
		</script>
	<script type="text/processing" data-processing-target="mycanvas">
		{literal}
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
	{/literal}
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
						{if (!isset($uspjeh))}
							<li><a href = 'lurajcevi_02_login.php'>Login </a>&nbsp;&nbsp;</li>
							<li><a href = 'lurajcevi_02_registration.php'>Registration </a>&nbsp;&nbsp; </li>
						{/if}
						{if (isset($admin))}
							<li><a href = 'usersPaging.php'>Ispis korisnika</a></li>&nbsp;&nbsp;
						{/if}
						{if (isset($admin) || isset($mod))}	
							<li><a href = 'lurajcevi_02_admin_panel.php'>Data Panel</a></li>&nbsp;&nbsp;
						{/if}
							<li><a href = 'popisDogadaja.php'>Događaji</a></li>&nbsp;&nbsp;
						{if (isset($uspjeh))}
							<li><a href = 'cartCheckout.php'>Pregledaj košaricu</a></li>
							<li><a href = "user_management.php?user={if (isset($userName))}{$userName}{/if}">Moji podaci</a></li>&nbsp;&nbsp;
						{/if}
						{if (isset($admin))}
							<li><a href = 'lurajcevi_02_dokumentacija.php'>Dokumentacija</a></li>&nbsp;&nbsp;
						{/if}
					</ul>
				</div>
			</div>
			<div id = 'izbornik2' style="float:right;">
			{if (isset($uspjeh))}
				<div class = 'izborni_tekst'>
					<ul class= "izbornik_lista">
					<li style="float:right;"><a>Prijavljeni ste kao: </a><img style="padding:0;" src="{if (isset($slika))}{$slika}{/if}" width="18px" height="18px"/>  <a href = "user_management.php?user={if (isset($userName))}{$userName}{/if}">{$userName}</a><a href ="odjava.php">&nbsp;(odjava)</a></a></li>                                              
					</ul>
				</div>
			{/if}
			</div>
			{if (isset($cart))}
				<div class = 'shoppingCart'>
					<table class = 'tablica'>
						<tr>
						<td colspan = "2" class = 'cartName'> Košarica </td>
						</tr>
						{if (!isset($userList))}
						<tr>
						<td class = 'cartItems'>Košarica je prazna!</td><br/>
						</tr>
						{/if}
						{if (isset($userList))}
							<tr>
							<td>Naziv</td><td>broj karata </td>
							</tr>
							{section name=i loop=$userList}
							<tr>
							<td class = 'cartItems'>{if (isset($userList[i].ime_eventa))} {$userList[i].ime_eventa} {/if}</td><td class = 'cartItems'> {if (isset($userList[i].br_mjesta))} {$userList[i].br_mjesta} {/if}</td>
							</tr>
							{/section}
							<tr>
							<td colspan = "2" class = 'cartName'>Ukupno: {if (isset($ukupno))}{$ukupno}{/if} kn</td><br/>
							</tr>
						{/if}
						
					</table>
					</ul>
				</div>
				
			{/if}
		</div>
			
	
		
		
		
		
		
		
		
		
		
		
		
		
		
		