# StarWarsWT
Web Stranica za Predmet Web tehnologije.


Stranica s detaljima o planetama, clanci o Jedi-ima i Sith-ovima, kao i online shop gdje se mogu kupiti Star Wars privjesci za kljuceve, case-ovi za mobitel i sl.

I - Sta je uradjeno?
- 3 forme: Contact, Log in, Sign up
- 5 podstranica: Siths, Jedi, Planets, Home, About us
- Meni koji vidljiv na svim podstranicama
- Koristen grid view i media queries
- Validacija svih formi
- Dropdown meni na index.html

II - Sta nije uradjeno?
- Odgovarajuci tekstovi (koristen je Lorem ipsum)

III i IV - Bugovi:

- meni nije skalabilan, linkovi idu jedni ispod drugih kada se prozor smanjuje (kad se smanji ispod 920 px)
	Rjesenje: Kada se smanji ispod 920 px, napraviti neku ikonicu, koja ce prikazivati meni kada se klikne na nju.

- na stranicama siths.html, jedi.html, planets.html, kada se resize-a, treca slika predje na desnu stranu, umjesto na lijevu (sto je dobro uradjeno na shop.html)
(nakon sto sam promijenila sliku jedne od planeta, na planets.html, slika je presla na lijevu stranu, tako da je bug vjerovatno zbog velicine slike)
update: popravljeno i na jedi.html, bug je prisutan samo jos na siths.html

V - Lista file-ova

- index.html - pocetna stranica
- planets.html - info o planetamau vidu clanaka (slika + tekst) 
- siths.html - info o Siths u vidu clanaka (slika + tekst) 
- jedi.html - info o Jedi u vidu clanaka (slika + tekst) 
- login.html - login stranica 
- shop.html - podstranica sa stvarima koje se mogu kupiti iz shopa
- register.html - registracija novih korisnika
- contact.html - kontakt forma
- style.css - CSS file
