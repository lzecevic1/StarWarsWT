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

II - Sta nije uradjeno?
- Odgovarajuci tekstovi (koristen je Lorem ipsum)

III i IV - Bugovi:

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
- skripta.js - JavaScript file
