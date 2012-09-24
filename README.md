Sustav za on-line doga�aje 
 
Sustav omogu�uje kreiranje doga�aja podijeljenih prema kategorijama doga�aja. Svaki doga�aj opisan je datumom i 
vremenom po�etka, brojem slobodnih mjesta, maksimalnim brojem karata za jednu osobu, cijenom karte i ostalo �to 
developer smatra bitnim. Svaki korisnik, da bi mogao koristiti sustav, mora kreirati korisni�ki ra�un. Sustav ima 
sljede�e korisnike: 
� neregistrirani korisnik je korisnik koji nema korisni�ki ra�un na sustavu. �lanom sustava mo�e postati u 
slu�aju registracije na sustav, bilo putem OpenID ra�una (Google, Facebook i druge sustavi koji podr�avaju OID) ili 
putem ugra�enog sustava za registraciju korisnika.  Korisnik se smatra registriranim tek nakon aktivacije ra�une putem 
aktivacijse poruke elektroni�ke po�te (link za aktivaciju vrijedi 24 sati). Neregistrirani korisnik ima mogu�nost 
pregledavanja aktivnih doga�aja u sustavu uz detalje samog doga�aja. Mo�e vidjeti listu ljudi koji su obavili kupovinu 
ulaznica za navedeni doga�aj. Mo�e vidjeti komentare koji su stavljeni kao komentari doga�aja no ne mo�e stavljati 
svoje komentare. 
� registrirani korisnik ima kreiran i aktiviran korisni�ki ra�un. U slu�aju tri neuspje�ne prijave na sustav (za 
redom), korisniku se zaklju�ava pristup sustavu; u tom slu�aju  se  aktiviranje korisni�kog ra�una obavlja od strane 
administratora sustava. U slu�aju uspje�ne prijave na sustav, kreira se korisni�ka sesija koja traje ili do isteka vremena 
pode�enog od strane servera (default: 30 minuta) ili do odjave korisnika sa sustava. Registrirani korisnik ima sva prava 
kao i neregistrirani korisnik plus mogu�nost uvida u doga�aje za koje je kupio kartu, popis ostalih korisnika koji su 
kupili kartu za isti doga�aj, svoje i tu�e komentare za te i za doga�aje za koje nije kupio ulaznicu, komentiranje svih 
aktivnih doga�aja u sustavu. Ovaj tip korisnika ima uvid u sve aktivne doga�aje u sustavu (rok de�avanja jo� nije 
istekao) za koje nije kupio kartu koji se ispisuju putem strani�enja ukoliko je to potrebno (npr. ima vi�e od 10 aktivnih 
doga�aja u sustavu); za takve doga�aje mo�e kupiti od jedne do maksimalno navedenog broja karata. Mogu�e je 
pregledati detalje svakog doga�aja poput galerije slika, dodatnih paketa i tome sli�no. Korisnik mo�e pretra�ivati i 
sortirati aktivne oglase po grupi oglasa, po datumu isteka, korisni�kom imenu, po imenu doga�aja, po grupi doga�aja. 
Korisniku je omogu�ena pohrana �esto kori�tenih podataka, poput podataka kreditne kartice koja se koristi za kupovinu, 
jedne ili vi�e adresa za dostavu, na�in dostave i tome sli�no. Svi doga�aji su grupirani u kategorije (npr. glazba, koncert, 
film, sport i sl.; kona�an broj kategorija je ostavljen na slobodu osobi koja razvija sustav). Svaki registrirani korisnik 
ima mogu�nost promjene vlastitih podataka. Prilikom odabira doga�aja korisnik odabire set usluga vezanih za odabrani 
doga�aj (npr. samo ulaznica ili ulaznica + prijevoz) koji se stavljaju u ko�aricu. Korisnik mo�e imati jedan ili vi�e 
odabranih doga�aja koji se nalaze u ko�arici radi provjere odabranih doga�aja prije finalizacije transakcije. 
� moderator ima sve ovlasti kao i registrirani korisnik uz mogu�nosti upravljanja odre�enim doga�ajem kojeg je 
vlasnik. Moderator mo�e biti vlasnik doga�aja koji se nalazi u kategoriji za koju je zadu�en. Unutar aktivnosti vezanih 
za njegovu kategoriju ima pravu uvida u sve istekle i aktivne doga�aje, pratiti stanje svakog od doga�aja (broj 
slobodnih karata, komentari), mijenjati lokaciju, slike (u slu�aju vi�e od jedne slike generira se galerija slika) i ostale 
multimedijske podatke (ukoliko su prisutni) svakog od doga�aja, otkazivati aktivne doga�aje ukoliko do�e do 
nepredvi�enih okolnosti, onemogu�ivanje korisnika za prisustvo odre�enog registriranog korisnika na doga�ajima koji 
su organizirani od strane njega, ozna�avanje korisnika radi neprimjerenih komentara unutar njegovih doga�aja. 
Prilikom definiranja dog�aja, moderator mo�e definirati i dodatni paket usluga koji prati doga�aje i uklju�uje, izme�u 
ostalog, prijevoz, preno�i�te, hranu i ostale usluge sli�nog tipa. 
� administrator sustava ima sva prava kao i administrator fakulteta uz ovlasti upravljanja korisni�kim podacima 
svakog korisnika, uvida u statistiku rada sustava, uvid u statistiku pojedinog korisnika (status prijave, uvid u 
dokumente, status korisni�kog ra�una), blokiranja korisni�kih ra�una u slu�aju povrede pravila kori�tenja (pritu�ba 
drugih korisnika, pritu�ba moderatora �asopisa, vulgarni komentari i tome sli�no), zamrzavanje kori�tenja ra�una na 
odre�eno vrijeme (X sati, X dana,...), brisanje korisni�kih ra�una u slu�aju tre�e opomene, odobravanje/brisanje 
kategorije, odobravanje/brisanje moderatora, odobravanje/brisanje  doga�aja. Osim toga, on ima mogu�nost upravljanja 
"sustavskim vremenom" radi simuliranja protoka vremena na projektnoj aplikaciji. 