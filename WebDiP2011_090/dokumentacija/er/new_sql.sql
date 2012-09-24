CREATE TABLE tip_korisnika (
  id_tipa_korisnika INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  naziv_tipa VARCHAR(20) NOT NULL,
  PRIMARY KEY(id_tipa_korisnika)
)
TYPE=InnoDB;

CREATE TABLE korisnik (
  id_korisnika INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  tip_korisnika_id_tipa_korisnika INTEGER UNSIGNED NOT NULL,
  Ime VARCHAR(25) NOT NULL,
  prezime VARCHAR(30) NULL,
  e_mail VARCHAR(30) NOT NULL,
  username VARCHAR(15) NOT NULL,
  lozinka VARCHAR(20) NOT NULL,
  status_korisnika INTEGER UNSIGNED NULL,
  avatar VARCHAR(255) NULL,
  aktivacijski_kod VARCHAR(100) NULL,
  datum_aktivacije TIMESTAMP NULL,
  blokiran_do DATETIME NULL,
  PRIMARY KEY(id_korisnika),
  INDEX korisnik_FKIndex1(tip_korisnika_id_tipa_korisnika),
  FOREIGN KEY(tip_korisnika_id_tipa_korisnika)
    REFERENCES tip_korisnika(id_tipa_korisnika)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
)
TYPE=InnoDB;

CREATE TABLE korisnik_kartica (
  korisnik_id_korisnika INTEGER UNSIGNED NOT NULL,
  kreditna_kartica VARCHAR(50) NULL,
  broj_kartice VARCHAR(30) NULL,
  INDEX Table_12_FKIndex1(korisnik_id_korisnika),
  FOREIGN KEY(korisnik_id_korisnika)
    REFERENCES korisnik(id_korisnika)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
)
TYPE=InnoDB;

CREATE TABLE korisnik_telefon (
  korisnik_id_korisnika INTEGER UNSIGNED NOT NULL,
  broj_telefona VARCHAR(255) NULL,
  INDEX Table_11_FKIndex1(korisnik_id_korisnika),
  FOREIGN KEY(korisnik_id_korisnika)
    REFERENCES korisnik(id_korisnika)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
)
TYPE=InnoDB;

CREATE TABLE korisnik_adresa (
  korisnik_id_korisnika INTEGER UNSIGNED NOT NULL,
  adresa VARCHAR(255) NULL,
  INDEX Table_10_FKIndex1(korisnik_id_korisnika),
  FOREIGN KEY(korisnik_id_korisnika)
    REFERENCES korisnik(id_korisnika)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
)
TYPE=InnoDB;

CREATE TABLE kategorija (
  id_kategorija INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  korisnik_id_korisnika INTEGER UNSIGNED NOT NULL,
  naziv_kategorije VARCHAR(25) NOT NULL,
  kratak_opis VARCHAR(255) NOT NULL,
  broj_dogadaja INTEGER UNSIGNED NULL,
  PRIMARY KEY(id_kategorija),
  INDEX kategorija_FKIndex1(korisnik_id_korisnika),
  FOREIGN KEY(korisnik_id_korisnika)
    REFERENCES korisnik(id_korisnika)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
)
TYPE=InnoDB;

CREATE TABLE dogadaj (
  id_dogadaj INTEGER UNSIGNED NOT NULL,
  korisnik_id_korisnika INTEGER UNSIGNED NOT NULL,
  kategorija_id_kategorija INTEGER UNSIGNED NOT NULL,
  naziv_dogadaja VARCHAR(50) NOT NULL,
  opis_dogadaja VARCHAR(255) NULL,
  datum_dogadjaja DATE NOT NULL,
  vrijeme_pocetka TIME NOT NULL,
  cijena_karte INTEGER UNSIGNED NOT NULL,
  mjesto VARCHAR(50) NOT NULL,
  status_dogadjaja INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(id_dogadaj),
  INDEX dogadaj_FKIndex1(kategorija_id_kategorija),
  INDEX dogadaj_FKIndex2(korisnik_id_korisnika),
  FOREIGN KEY(kategorija_id_kategorija)
    REFERENCES kategorija(id_kategorija)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(korisnik_id_korisnika)
    REFERENCES korisnik(id_korisnika)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
)
TYPE=InnoDB;

CREATE TABLE kupljeni_dogadjaji (
  korisnik_id_korisnika INTEGER UNSIGNED NOT NULL,
  dogadaj_id_dogadaj INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(korisnik_id_korisnika, dogadaj_id_dogadaj),
  INDEX korisnik_has_dogadaj_FKIndex1(korisnik_id_korisnika),
  INDEX korisnik_has_dogadaj_FKIndex2(dogadaj_id_dogadaj),
  FOREIGN KEY(korisnik_id_korisnika)
    REFERENCES korisnik(id_korisnika)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(dogadaj_id_dogadaj)
    REFERENCES dogadaj(id_dogadaj)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
)
TYPE=InnoDB;

CREATE TABLE slika (
  id_slike INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  dogadaj_id_dogadaj INTEGER UNSIGNED NOT NULL,
  velicina_ INTEGER UNSIGNED NULL,
  naziv_slike VARCHAR(30) NULL,
  opis_slike VARCHAR(255) NULL,
  slika_ BLOB NULL,
  PRIMARY KEY(id_slike),
  INDEX slika_FKIndex1(dogadaj_id_dogadaj),
  FOREIGN KEY(dogadaj_id_dogadaj)
    REFERENCES dogadaj(id_dogadaj)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
)
TYPE=InnoDB;

CREATE TABLE slobodna_mjesta (
  dogadaj_id_dogadaj INTEGER UNSIGNED NOT NULL,
  broj_mjesta INTEGER UNSIGNED NULL,
  broj_slobodnih_mjesta INTEGER UNSIGNED NULL,
  PRIMARY KEY(dogadaj_id_dogadaj),
  INDEX dogadaj_has_dogadaj_FKIndex1(dogadaj_id_dogadaj),
  INDEX dogadaj_has_dogadaj_FKIndex2(dogadaj_id_dogadaj),
  FOREIGN KEY(dogadaj_id_dogadaj)
    REFERENCES dogadaj(id_dogadaj)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(dogadaj_id_dogadaj)
    REFERENCES dogadaj(id_dogadaj)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
)
TYPE=InnoDB;

CREATE TABLE komentar (
  id_komentara INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  slika_id_slike INTEGER UNSIGNED NULL,
  dogadaj_id_dogadaj INTEGER UNSIGNED NOT NULL,
  korisnik_id_korisnika INTEGER UNSIGNED NOT NULL,
  tekst_komentara VARCHAR(255) NULL,
  PRIMARY KEY(id_komentara),
  INDEX komentar_FKIndex1(korisnik_id_korisnika),
  INDEX komentar_FKIndex2(dogadaj_id_dogadaj),
  INDEX komentar_FKIndex3(slika_id_slike),
  FOREIGN KEY(korisnik_id_korisnika)
    REFERENCES korisnik(id_korisnika)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(dogadaj_id_dogadaj)
    REFERENCES dogadaj(id_dogadaj)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(slika_id_slike)
    REFERENCES slika(id_slike)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
)
TYPE=InnoDB;


