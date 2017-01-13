# StarWarsWT
Web Stranica za predmet Web tehnologije.


Stranica s detaljima o planetama, clanci o Jedi-ima i Sith-ovima, kao i online shop gdje se mogu kupiti Star Wars privjesci za kljuceve, case-ovi za mobitel i sl.

I - Sta je uradjeno?
- 3 forme: Contact, Log in, Sign up
- 5 podstranica: Siths, Jedi, Planets, Home, About us
- Meni koji vidljiv na svim podstranicama
- Koristen grid view i media queries
- Validacija svih formi
- Dropdown meni na svim postranicama
- Na shop.html je napravljena galerija. Kad se klikne na bilo koju od slika, ona se zumira, a kada se pritisne esc, vrati se na pogled na galeriju.
- Sa index.html podstranice se učitavaju bez reload-a cijele stranice, nego se samo sadržaj stranice mijenja
- Sa sign up forme se podaci upisuju u users.xml; pri logiranju korisnika, na login.php provjerava se da li korisnik postoji u users.xml. Ukoliko korisnik ne postoji, ispisuje se poruka sa prikladnim sadržajem.
- Na stranici about.php se nalazi tabela sa poslovnicama. Svaka poslovnica ima adresu, broj telefonai radno vrijeme. Podatke o poslovnici može da unese admin, koji ujedno može da obriše i edituje neku poslovnicu. 
- Podaci o broju telefona i radnom vremenu, koje admin unosi na stranici about.php, moraju biti u sljedećim formatima: 000 000 000 i hh:mm - hh:mm
- Admin može da downloaduje csv file. Kod za download csv file-a se nalazi u downloadcsv.php. 
- Korisnik - guest može samo da vidi tabelu sa poslovnicama i da pogleda izvještaj. 
- Kod za izvještaj nalazi se u file-u izvjestaj.php. Za ovo je korištena biblioteka fpdf.
- Napravljena je i forma za search koju može vidjeti i admin i guest. Polja koja se pretražuju su adresa i broj telefona poslovnice. Prikazuje se do 10 rezultata.
- Podaci za login admina - email: admin@gmail.com, password: tajna
- Podaci za login guesta - email: lejla@gmail.com, password: 123 
- Urađen je deployment, link: http://lzecevic1-wtprojekat.44fs.preview.openshiftapps.com/

Spirala 4:
- Kada se korisnik registruje na register stranici, vrši se provjera email-a koji je unio. Ukoliko već postoji korisnik u bazi sa istim email-om, ispisuje se poruka o grešci, u suprotnom, korisnik se dodaje u bazu i njegova uloga je 'user'.
- Kada korisnik želi da uradi login, vrši se provjera postojanja u bazi podataka. Ako korisnik ne postoji u bazi ili ako je šifra pogrešna, poruka o grešci se ispisuje.
- Pristupni podaci za admina su admin@admin.com, password: tajna
- Pristupni podaci za jednog korisnika su lejla@gmail.com, password: lejla
- Na About stranici, forma za search koja je napravljena u trećoj spirali je zakomentarisana.
- Na About stranici, admin ima mogućnost dodavanja nove poslovnice. Pošto se sada poslovnica dodaje u bazu, gdje je potrebno dodati i šefa, pored forme za dodavanje nalazi se lista osoba čija je uloga šef, a koje nisu još dodijeljene kao šef nijednoj poslovnici. Na taj način, admin može da vidi koji je id osobe koju želi dodijeliti kao šefa poslovnici i upisati ga u polje predviđeno za to.
- Ukoliko admin ne želi da kao šefa postavi već postojeću osobu, već želi da doda novog šefa u bazu, klikom na dugme "Dodaj novog šefa", usmjerava se na formu u kojoj popunjava podatke za šefa.
- Buttoni Edituj i Obriši rade editovanje i brisanje reda iz tabele, s tim što se te izmjene sada prikazuju u bazi, a ne u XML-u.


II - Sta nije uradjeno?
- Odgovarajuci tekstovi (koristen je Lorem ipsum)
- Funkcionalnost na dugmetu Pretraži (Spirala 3)

III i IV - Bugovi:

- na stranicama siths.html, jedi.html, planets.html, kada se resize-a, treca slika predje na desnu stranu, umjesto na lijevu (sto je dobro uradjeno na shop.html)
(nakon sto sam promijenila sliku jedne od planeta, na planets.html, slika je presla na lijevu stranu, tako da je bug vjerovatno zbog velicine slike)
update: popravljeno i na jedi.html, bug je prisutan samo jos na siths.html

V - Lista file-ova

- index.php- pocetna stranica
- planets.php - info o planetamau vidu clanaka (slika + tekst) 
- siths.php - info o Siths u vidu clanaka (slika + tekst) 
- jedi.php - info o Jedi u vidu clanaka (slika + tekst) 
- login.php - login stranica 
- shop.php - podstranica sa stvarima koje se mogu kupiti iz shopa
- register.php - registracija novih korisnika
- contact.php - kontakt forma
- downloadcsv.php - kod za downloadovanje CSV file-a
- izvjestaj.php - kod za generisanje izvještaja
- style.css - CSS file
- skripta.js - JavaScript file

VI - Baza

Baza sadrži 4 tabele: Osoba, Poslovnica, Artikal i Skladiste
Tabela Osoba:
-id, int i PK
-ime, varchar 50
-prezime, varchar 50
-email, varchar 100
-uloga, varchar 10  (Uloga može biti: admin, sef ili user)

Tabela Poslovnica:
-id, int i PK
-adresa, varchar 100
-telefon, varchar 12
-sef, foreign key na osobu (odnosi se zapravo na osobu koja je odgovorna za poslovnicu)

Tabela Artikal:
-id, int i PK
-naziv, varchar
-opis, text
-cijena, float

Tabela Skladiste (junction table, služi da prikaže koliko se nekih artikala nalazi u određenoj poslovnici):
-id, int i PK
-poslovnica, FK na poslovnicu
-artikal, FK na artikal
-kolicina, int

