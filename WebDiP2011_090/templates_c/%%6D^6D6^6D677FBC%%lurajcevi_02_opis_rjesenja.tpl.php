<?php /* Smarty version 2.6.6, created on 2012-06-05 08:26:12
         compiled from lurajcevi_02_opis_rjesenja.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<div id = 'sadrzaj'> 
			<div class= "about_container">
				
					<h2> Opis projektnog rješenja</h2> 
					<div class="about_styling">
					<p> 
					<p style="color:white;font-size:20px;font-style:oblique;">
					Projektni zadatak "Sustav za on-line događanja" je kreiran uz pomoć html-a, php-a, javascripta i xml-a. Korišten
					je i sustav predložaka Smarty kako bi se odvojila prezentacija aplikacije od aplikacijske logike (programski kod).
					<br/>
					Javascript je korišten na "unobtrusive" način. To znači da se cijeli javaScript kod nalazi u vanjskim datotekama
					te ad nije direktno embeddan u sam HTML. Osim "čistog" javascripta, korištene su i neke javaScript biblioteke.
					Neke od njih su JQuery, lightBox i JQuery-UI.
					</p>
					<br/>
					POPIS DATOTEKA
					(PHP)
					<P class = 'popisDatoteka'>
						addAdress.php	=> Skripta koja prikazuje formu za dodavanje adrese u JQuery dialog
 		<br/>			addAdress2.php => Skripta koja obrađuje formu za dodavanje adrese i sprema istu u bazu
		<br/>			addCreditCard2.php => Skripta koja obrađuje formu za dodavanje kartice i sprema istu u bazu
		<br/>			addCreditCard.php =>Skripta koja prikazuje formu za dodavanje kartice u JQuery dialog
		<br/>			addImageToGalleryForm.php => Slika koja prikazuje formu za dodavanje nove slike u galeriju 
		<br/>			addImageToGallery.php => Skripta koja dodaje sliku u bazu
		<br/>			addToCart2.php => Skripta koja sprema odabrani događaj u košaricu
		<br/>			addToCart.php => Skripta koja prikazuje formu za odabir događaja i spremanje u košaricu
		<br/>			adressPaging.php => Skripta koja prikazuje popis adresa
		<br/>			aktivacija.php => Skripta koja provjerava aktivacijski email i sktivira korisnika
		<br/>			allEventsPaging.php => Skripta koja ispisuje sve događaje (ajax poziv is JQuery-a, XML format)
		<br/>			allEvents.php => Skripta koja prikazuje sve događaje kojima je ulogirani korisnik administrator
		<br/>			buyersXML.php => Skripta koja prikazuje sve korisnike koji su kupili određeni događaj
		<br/>			cartCheckout.php => Skripta koja prikazuje podatke iz košarice
		<br/>			categoriesPaging.php => Skripta koja ispisuje kategorije
		<br/>			category_management.php => Skripta koja prikazuje formu za promjenu podataka neke kategorije
		<br/>			ccPaging.php => Skripta koja ispisuje podatke o kreditnim karticama određenog korisnika
		<br/>			change_category_data.php => Skripta koja mijenja podatke o nekoj kategoriji 
		<br/>			changeEventData.php => Skripta kojamijenja podatke o određenom događaju
		<br/>			change_user_data.php => Skripta koja mijenja podatke o nekom korisniku
		<br/>			commentPosting.php => Skripta koja sprema postavljeni komentar u bazu
		<br/>			commentsXml.php => Skripta koja u XML formatu lista sve komentare za određeni događaj
		<br/>			deleteCategory2.php => Skripta koja briše odabranu kategoriju
		<br/>			deleteCategory.php => Skripta koja prikazuje formu za odabir kategorije za brisanje
		<br/>			deleteEvent2.php => Skripta koja briše određeni događaj
		<br/>			deleteEvent.php => Skripta koja prikazuje formu za odabir događaja za brisanje
		<br/>			deleteUser2.php => Skripta koja briše korisnika iz baze
		<br/>			deleteUser.php => Skripta koja prikauzuje formu za odabir korisnika za brisanje
		<br/>			deniedUsersPaging.php => Skripta koja lista sve korisnike kojima je zabranjen pristup određenom događaju
		<br/>			disableUser2.php => Skripta koja onemogućava pristup nekom korisniku za određeni događaj
		<br/>			disableUser.php => Skripta koja prikazuje formu za odabir korisnika i događaja za koji je korisnik blokiran
		<br/>			eventDetails.php => Skripta koja dohvaća i prikazuje detalje o određenom događaju
		<br/>			eventManagement.php => Skripta koja prikazuje podatke o događaju koji se uređuje
		<br/>			eventPaging.php => Skripta koja ispisuje sve događaje u nadležnosti određenog moderatora
		<br/>			eventsPaging.php => Skripta koja ispisuje događaje u XML obliku (koristi ga AJAX)
		<br/>			events.php => Skripta koja ispisuje aktivne događaje u nadležnosti određenog moderatora
		<br/>			flterEvents.php => Skripta koja filtrira događaje prema unedenim upitima i vraća podatke
		<br/>			forgottenPassword2.php => Skripta koja šalje novu lozinku korisniku koji ju je zatražio
		<br/>			forgottenPassword.php => Skripta koja prikazuje formu za unos korisničkog imena zaboravljene lozinke
		<br/>			grantUserAccess.php => Skripta koja omogućava pristup događaju određenom korisniku
		<br/>			insertCategory.php => Skripta koja mijenja podatke o kategoriji u bazi
		<br/>			insertEvent.php => Skripta koja mijenja podatke o događaju u bazi
		<br/>			insert.php => Skripta koja unosi podatke o registriranom korisniku u bazu
		<br/>			loadPurchaseData.php => Skripta koja prikazuje formu za kupovinu događaja u JQuery dialog
		<br/>			lockedUsersPaging.php=> Skripta koja ispisuje podatke o korisnicima kojima je račun zaključan
		<br/>			logger.txt => tekst datoteka koja sadrži unose o neovlaštenom pokušaju pristupanju promjene podataka nekog korisnika
		<br/>			login.php => Skripta koja provjerava podatke o prijavi korisnika
		<br/>			lurajcevi_02_admin_panel.php => Skripta koja prikazuje admin panel
		<br/>			lurajcevi_02_css_1.css => CSS projekta
	<br/>				lurajcevi_02_dokumentacija_era.php => Skripta koja prikazuje predložak za era model
	<br/>				lurajcevi_02_dokumentacija_navigation.php => Skripta koja prikazuje predložak za navigacijski dijagram
	<br/>				lurajcevi_02_dokumentacija.php => Skripta koja prikazuje predložak za dokumentaciju
	<br/>				lurajcevi_02_dokumentacija_sequence.php => Skripta koja prikazuje predložak za sekvencijalni dijagram
	<br/>				lurajcevi_02_dokumentacija_useCase.php => Skripta koja prikazuje predložak za slučajeve korištenja
	<br/>				lurajcevi_02_kreiranje_dogadaja.php => Skripta koja prikazuje formu za kreiranje događaja
	<br/>				lurajcevi_02_kreiranje_kategorije.php => Skripta koja prikazuje formu za kreiranje kategorija
	<br/>				lurajcevi_02_login.php => Skripta koja prikazuje formu za login
	<br/>				lurajcevi_02_opis_rjesenja.php => Skripta koja prikazuje opis rješenja
	<br/>				lurajcevi_02_osobno.php => Skripta koja prikazuje osobnu (autorovu) stranicu
	<br/>				lurajcevi_02.php => Skripta koja prikazuje početnu stranicu
	<br/>				lurajcevi_02_registration.php => Skripta koja prikazuje stranicu za registraciju
	<br/>				lurajcevi_ispis_korisnika.php => Skripta koja prikazuje ispis korisnika
	<br/>				markedUsersPaging.php => Skripta koja ispisuje označene korisnike
	<br/>				markUser2.php => Skripta koja označava korisnika u bazi
	<br/>				markUser.php => Skripta koja prikazuje formu za označavanje korisnika
	<br/>				myEventsXml.php => Skripta koja dohvaća podatke o događajima koje je neki korisnik kupio
	<br/>				odjava.php => Skripta koja odjavljuje korisnika iz aplikacije
	<br/>				Opis_projektnog_zadatka.pdf
	<br/>				overlay.png
	<br/>				popisDogadaja.php => Skripta koja prikazuje stranicu na kojoj se dinamički generiraju događaji
	<br/>				purchaseByCart2.php => Skripta koja obrađuje podatke o događajima koji se kupuju preko košarice
	<br/>				purchaseByCart.php => Skripta koja prikazuje formu za odabir kartice i adrese za kupnju preko košarice
	<br/>				purchaseEventTickets.php => Skripta koja obrađuje podatke dohvaćene preko loadPurchaseData skripte i sprema podatke u bazu
	<br/>				rateEvents.php => Skripta koja omogućava ocjenjivanje događaja
	<br/>				recaptchalib.php => Skripta koja omogućava korištenje ReCaptcha-e u aplikaciji prilikom registracije
	<br/>				spajanje.php => Skripta koja omogućava spajanje na bazu
	<br/>				user_management.php => Skripta koja omogućava promjenu podataka određenog korisnika
	<br/>				usersPaging.php => Skripta koja izlistava korisnike u sustavu
	<br/>				virtualTime.php => Skripta koja omogućava upravljanje sustavskim vremenom
	<br/>				votersXml.php => Skripta koja dohvaća podatke o osobama koje su ocjenile neki događaj
	<br/><br/>JAVASCRIPT
						<br/>
						lurajcevi.js => glavna javaScript biblioteka sa svim metodama korištenima u aplikaciji
						<br/>
						lib.js  => vlastita javascript datoteka koja sadrži jednu funkciju koja se koristi kod promjene podataka korisnika
						<br/>
						paginationJQuery.js => javascript biblioteka funkcija za straničenje na klijentskoj strani
						<br/>
						vrijeme.php => funkcije koje upravljaju sustavskim vremenom (čitaju XML na arci i spremaju u bazu)
						<br/>
						xmlCreator.php => skripta koja služi za AJAX provjeru korisničkih imena u bazi
					</p>
					<p style="color:white;font-size:20px;font-style:oblique;">
					IZVORI:<br/>
					Jako je teško nabrojati izvore koje sam koristio jer sam za većinu problema koristio google tražilicu, ali ipak, među najvećim izvorima su 
					slijedeće stranice i knjige:<br/>
					<ul>
						<li>Prezentacije s predavanja</li>
						<li>PHP 6 Fast and Easy Web development - Matt Telles, 2008. </li>
						<li>Smarty, PHP Template Programming and Applications - Gheorghe, Hayder, Prado-Maia; 2006. </li>
						<li>PHP 6 and MySQL 5 for Dynamic Web Sites - Larry Ullman, 2008.</li>
						<li>Eloquent Javascript - Marijn Haverbeke</li>
						<li>Visual QuickStart Guide JavaScript and Ajax for the Web - Tom Negrino, 2006.</li>
						<li>Razni web izvori: Tizag, stackoverflow, daniweb ...</li>
					</ul>
					
					</p>
					
					<p style="color:white;font-size:20px;font-style:oblique;">
					Opis završenosti projekta:<br/>
					Mislim da ne mogu dati 100% točan odgovor na ovo pitanje zato što zasigurno postoji velik broj stvari koje se trebaju doraditi, popraviti
					i/ili promijeniti kako u kodu tako i u samom izgledu aplikacije. Pošto je ovo moja prva web aplikacija i pošto sam u nju uložio jako puno truda
					bojim se da ću morati biti malo subjektivan i reći kako je dovršenost aplikacije otprilike 90% u odnosu na zahtjeve koji se nalaze u opisu. <br/>
					Naravno, postoje stvari koje nedostaju a to su: 
						<ul>
							<li>OpenID</li>
							<li>.htaccess ispis korisnika</li>
							<li>CRU kontrola nad SVIM tablicama u bazi (iako kontrola postoji nad većinom tablica, točnije 10/13 tablica ima tu mogućnost)</li>
						</ul>
					</p>
					
					</p>
				</div>
			</div>
		</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>