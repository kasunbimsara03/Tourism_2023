-- Active: 1675781840600@@127.0.0.1@3306@biblioteca
create database Biblioteca;

use Biblioteca;

create Table utenti(
    username VARCHAR (16) PRIMARY KEY,
    password VARCHAR(16) NOT NULL,
    cf char(16) NOT NULL,
    nome varchar(64) NOT NULL,
    cognome varchar(64) NOT NULL,
    data_n DATE NOT NULL,
    cell CHAR(10),
    indirizzo varchar(64),
    email VARCHAR(64)
);

create Table libri(
    cod_isbn char(13) PRIMARY KEY,
    titolo VARCHAR(64) NOT NULL,
    n_pag INT NOT NULL,
    prezzo DOUBLE NOT NULL,
    casa_ed VARCHAR(32) NOT NULL
);

create Table autori(
    id_autore INT AUTO_INCREMENT PRIMARY KEY,
    nome varchar(64) NOT NULL,
    cognome varchar(64) NOT NULL,
    nazionalita VARCHAR(32) NOT null,
    data_n DATE NOT NULL
);

create Table scritti(
    cod_isbn char(13),
    id_autore INT AUTO_INCREMENT,
    FOREIGN KEY (cod_isbn) REFERENCES libri(cod_isbn),
    FOREIGN KEY (id_autore) REFERENCES autori(id_autore),
    PRIMARY KEY(cod_isbn, id_autore)
);

INSERT INTO autori(nome,cognome,nazionalita,data_n) VALUES
("Camus","Albert","italiano","1955-05-08"),
("Proust","Marcel","francese","1955-05-08"),
("Kafka","Albert","giapponesi","1922-9-20"),
("Camus","Franz","italiano","1915-3-15"),
("Antoine","de Saint-Exupéry","olandesi","1980-09-20"),
("Marouane","Leïla","albanesi","1800-02-25"),
("Jumièges","Guglielmo","normanni","1975-06-17"),
("Matteoti","Filippo","normanni","1975-06-17");

INSERT INTO libri(cod_isbn,titolo,n_pag,prezzo,casa_ed) VALUES
("9783161404100","Lo straniero", 285,180.00,"Adelphi Edizioni"),
("9780169584100","Alla ricerca del tempo perduto", 15,50.00,"Chiarelettere"),
("9783160484100","La vita bugiarda degli adulti", 520,300.00,"Arnoldo Mondadori Editore"),
("9783161484100","Il secondo sesso", 900,80.01,"Bompiani Editore"),
("9783109084100","Il piccolo principe", 360,54.99,"Cairo Editore"),
("0783125684100","Il processo", 520,300.00,"De Agostini Editore"),
("9703165484100","Il grande Meaulnes", 150,19.99,"Del Vecchio editore"),
("9783163014100","Il mondo nuovo", 96,64.99,"Editori Riuniti");

INSERT into scritti(cod_isbn,id_autore) VALUES
("9783161404100",1),
("9780169584100",2),
("9783160484100",3),
("9783161484100",4),
("9783109084100",5),
("0783125684100",6),
("9703165484100",7),
("9783163014100",8);

INSERT INTO utenti(username,password,nome,data_n,cognome,cf) VALUES
('admin','admin','admin','2023-02-25','gg','password');