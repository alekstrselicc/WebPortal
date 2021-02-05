# WebPortal

#instalacija
pip install mysql-connector-python

#za socketio
pip install flask-socketio

#instalacija flask
pip install Flask

#ko ti rata instalirat 
sudo mysql "da prides notr"
pol pa tole enga pa po enga  copy paste notr 

NOVA BAZA!!!
CREATE  TABLE Person(
id_person INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
ime VARCHAR(45) NOT NULL,
priimek VARCHAR(45) NOT NULL,
email VARCHAR(45) NOT NULL,
password VARCHAR(45) NOT NULL
);

CREATE TABLE objava(
id_objava INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
tekst TEXT NOT NULL,
datum DATE NOT NULL,
timee TIME NOT NULL,
naslov VARCHAR(45) NOT NULL,
tk_person INT NOT NULL
);

ALTER TABLE Objava ADD CONSTRAINT tk_povezava1 FOREIGN KEY (tk_person) REFERENCES Person(id_person);

CREATE TABLE Friends(id_friends INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
tk_person INT NOT NULL,
tk_friend INT NOT NULL
);
ALTER TABLE Friends ADD CONSTRAINT tk_povezava2 FOREIGN KEY (tk_person) REFERENCES Person(id_person);
ALTER TABLE Friends ADD CONSTRAINT tk_povezava3 FOREIGN KEY (tk_friend) REFERENCES Person(id_person);
