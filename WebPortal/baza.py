
current_user_search = "SELECT id_person FROM Person WHERE ime=%s AND password=%s"

insert_objava="INSERT INTO objava(naslov, tekst, datum, timee,tk_person)VALUES    (%s, %s, %s, %s, %s)"

#select id_person za iskanje prijatelja
search_friend_id = "SELECT id_person FROM Person WHERE ime=%s"

#insert into  friends 
vpisaovanje_v_friend = "INSERT INTO friends(tk_person, tk_friend)VALUES(%s, %s)"

#za predstavitev objav na home 
get_objave = "SELECT ime, naslov, tekst, datum, timee  FROM Person, objava WHERE objava.tk_pe    rson = Person.id_person ORDER BY timee DESC"

#za predstavitev objav na user.html 
get_objave_user = "SELECT naslov, tekst, datum FROM Person, objava WHERE Person.id_person = ob    java.tk_person AND  ime=%s AND password=%s"

#select tk_friend  da dobis prijatelje 
get_tk_friend = "SELECT tk_friend FROM Person, friends WHERE friends.tk_person = Person.    id_person AND id_person=%s"

#select da najdes ime 
get_name = "SELECT ime FROM Person WHERE id_person=%s"

#select za login 
get_login = "SELECT * FROM Person WHERE ime=%s AND password=%s"

#insert  za register
get_register = "INSERT INTO Person(ime, priimek, email, password)VALUES(%s, %s, %s, %s)"




