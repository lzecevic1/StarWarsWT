# StarWarsWT
Web Stranica za predmet Web tehnologije.


Stranica s detaljima o planetama, clanci o Jedi-ima i Sith-ovima, kao i online shop gdje se mogu kupiti Star Wars privjesci za kljuceve, case-ovi za mobitel i sl.

I - Sta je uradjeno?
- 3 forme: Contact, Log in, Sign up
- 5 podstranica: Siths, Jedi, Planets, Home, About us
- Meni koji vidljiv na svim podstranicama
- Koristen grid view i media queries
- Validacija svih formi
- Dropdown meni na svims postranicama
- Na shop.html je napravljena galerija. Kad se klikne na bilo koju od slika, ona se zumira, a kada se pritisne esc, vrati se na pogled na galeriju.
- Sa index.html podstranice se učitavaju bez reload-a cijele stranice, nego se samo sadržaj stranice mijenja
- Sa sign up forme se podaci upisuju u users.xml; pri logiranju korisnika, na login.php provjerava se da li korisnik postoji u users.xml. Ukoliko korisnik ne postoji, ispisuje se poruka sa prikladnim sadržajem.
- Na stranici about.php se nalazi tabela sa poslovnicama. Svaka poslovnica ima adresu i broj telefona. Podatke o poslovnici može da unese admin, koji ujedno može da obriše i edituje neku poslovnicu. 
- Podaci o broju telefona i radnom vremenu, koje admin unosi na stranici about.php, moraju biti u sljedećim formatima: 000 000 000 i hh:mm - hh:mm
- Admin može da downloaduje csv file. Kod za download csv file-a se nalazi u downloadcsv.php. 
- Korisnik - guest može samo da vidi tabelu sa poslovnicama i da pogleda izvještaj. Kod za izvještaj nalazi se u file-u izvjestaj.php. Za ovo je korištena biblioteka fpdf.
- Podaci za login admina - email: admin@gmail.com, password: tajna
- Podaci za login guesta - email: lejla@gmail.com, password: 123 
- Uradjen je deployment, link: http://lzecevic1-lzecevic1.44fs.preview.openshiftapps.com/

II - Sta nije uradjeno?
- Odgovarajuci tekstovi (koristen je Lorem ipsum)

III i IV - Bugovi:

- na stranicama siths.html, jedi.html, planets.html, kada se resize-a, treca slika predje na desnu stranu, umjesto na lijevu (sto je dobro uradjeno na shop.html)
(nakon sto sam promijenila sliku jedne od planeta, na planets.html, slika je presla na lijevu stranu, tako da je bug vjerovatno zbog velicine slike)
update: popravljeno i na jedi.html, bug je prisutan samo jos na siths.html

V - Lista file-ova

- index.php- pocetna stranica
- planets.html - info o planetamau vidu clanaka (slika + tekst) 
- siths.html - info o Siths u vidu clanaka (slika + tekst) 
- jedi.html - info o Jedi u vidu clanaka (slika + tekst) 
- login.php - login stranica 
- shop.php - podstranica sa stvarima koje se mogu kupiti iz shopa
- register.php - registracija novih korisnika
- contact.php - kontakt forma
- style.css - CSS file
- skripta.js - JavaScript file
