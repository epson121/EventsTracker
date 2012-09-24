Sustav za on-line dogaðaje 
 
Sustav omoguæuje kreiranje dogaðaja podijeljenih prema kategorijama dogaðaja. Svaki dogaðaj opisan je datumom i 
vremenom poèetka, brojem slobodnih mjesta, maksimalnim brojem karata za jednu osobu, cijenom karte i ostalo što 
developer smatra bitnim. Svaki korisnik, da bi mogao koristiti sustav, mora kreirati korisnièki raèun. Sustav ima 
sljedeæe korisnike: 
• neregistrirani korisnik je korisnik koji nema korisnièki raèun na sustavu. Èlanom sustava može postati u 
sluèaju registracije na sustav, bilo putem OpenID raèuna (Google, Facebook i druge sustavi koji podržavaju OID) ili 
putem ugraðenog sustava za registraciju korisnika.  Korisnik se smatra registriranim tek nakon aktivacije raèune putem 
aktivacijse poruke elektronièke pošte (link za aktivaciju vrijedi 24 sati). Neregistrirani korisnik ima moguænost 
pregledavanja aktivnih dogaðaja u sustavu uz detalje samog dogaðaja. Može vidjeti listu ljudi koji su obavili kupovinu 
ulaznica za navedeni dogaðaj. Može vidjeti komentare koji su stavljeni kao komentari dogaðaja no ne može stavljati 
svoje komentare. 
• registrirani korisnik ima kreiran i aktiviran korisnièki raèun. U sluèaju tri neuspješne prijave na sustav (za 
redom), korisniku se zakljuèava pristup sustavu; u tom sluèaju  se  aktiviranje korisnièkog raèuna obavlja od strane 
administratora sustava. U sluèaju uspješne prijave na sustav, kreira se korisnièka sesija koja traje ili do isteka vremena 
podešenog od strane servera (default: 30 minuta) ili do odjave korisnika sa sustava. Registrirani korisnik ima sva prava 
kao i neregistrirani korisnik plus moguænost uvida u dogaðaje za koje je kupio kartu, popis ostalih korisnika koji su 
kupili kartu za isti dogaðaj, svoje i tuðe komentare za te i za dogaðaje za koje nije kupio ulaznicu, komentiranje svih 
aktivnih dogaðaja u sustavu. Ovaj tip korisnika ima uvid u sve aktivne dogaðaje u sustavu (rok dešavanja još nije 
istekao) za koje nije kupio kartu koji se ispisuju putem stranièenja ukoliko je to potrebno (npr. ima više od 10 aktivnih 
dogaðaja u sustavu); za takve dogaðaje može kupiti od jedne do maksimalno navedenog broja karata. Moguæe je 
pregledati detalje svakog dogaðaja poput galerije slika, dodatnih paketa i tome slièno. Korisnik može pretraživati i 
sortirati aktivne oglase po grupi oglasa, po datumu isteka, korisnièkom imenu, po imenu dogaðaja, po grupi dogaðaja. 
Korisniku je omoguæena pohrana èesto korištenih podataka, poput podataka kreditne kartice koja se koristi za kupovinu, 
jedne ili više adresa za dostavu, naèin dostave i tome slièno. Svi dogaðaji su grupirani u kategorije (npr. glazba, koncert, 
film, sport i sl.; konaèan broj kategorija je ostavljen na slobodu osobi koja razvija sustav). Svaki registrirani korisnik 
ima moguænost promjene vlastitih podataka. Prilikom odabira dogaðaja korisnik odabire set usluga vezanih za odabrani 
dogaðaj (npr. samo ulaznica ili ulaznica + prijevoz) koji se stavljaju u košaricu. Korisnik može imati jedan ili više 
odabranih dogaðaja koji se nalaze u košarici radi provjere odabranih dogaðaja prije finalizacije transakcije. 
• moderator ima sve ovlasti kao i registrirani korisnik uz moguænosti upravljanja odreðenim dogaðajem kojeg je 
vlasnik. Moderator može biti vlasnik dogaðaja koji se nalazi u kategoriji za koju je zadužen. Unutar aktivnosti vezanih 
za njegovu kategoriju ima pravu uvida u sve istekle i aktivne dogaðaje, pratiti stanje svakog od dogaðaja (broj 
slobodnih karata, komentari), mijenjati lokaciju, slike (u sluèaju više od jedne slike generira se galerija slika) i ostale 
multimedijske podatke (ukoliko su prisutni) svakog od dogaðaja, otkazivati aktivne dogaðaje ukoliko doðe do 
nepredviðenih okolnosti, onemoguæivanje korisnika za prisustvo odreðenog registriranog korisnika na dogaðajima koji 
su organizirani od strane njega, oznaèavanje korisnika radi neprimjerenih komentara unutar njegovih dogaðaja. 
Prilikom definiranja dogðaja, moderator može definirati i dodatni paket usluga koji prati dogaðaje i ukljuèuje, izmeðu 
ostalog, prijevoz, prenoèište, hranu i ostale usluge sliènog tipa. 
• administrator sustava ima sva prava kao i administrator fakulteta uz ovlasti upravljanja korisnièkim podacima 
svakog korisnika, uvida u statistiku rada sustava, uvid u statistiku pojedinog korisnika (status prijave, uvid u 
dokumente, status korisnièkog raèuna), blokiranja korisnièkih raèuna u sluèaju povrede pravila korištenja (pritužba 
drugih korisnika, pritužba moderatora èasopisa, vulgarni komentari i tome slièno), zamrzavanje korištenja raèuna na 
odreðeno vrijeme (X sati, X dana,...), brisanje korisnièkih raèuna u sluèaju treæe opomene, odobravanje/brisanje 
kategorije, odobravanje/brisanje moderatora, odobravanje/brisanje  dogaðaja. Osim toga, on ima moguænost upravljanja 
"sustavskim vremenom" radi simuliranja protoka vremena na projektnoj aplikaciji. 