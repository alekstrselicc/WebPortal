#!/usr/bin/env python3 
import mysql.connector
from flask import Flask, render_template, url_for,redirect, request, session
from bs4 import BeautifulSoup
import datetime
import time 
import baza

app = Flask(__name__)
app.secret_key = "key"


mydatabase = mysql.connector.connect(
    host="localhost",
    user="aleks",
    password="",
    database="WebPortal"
)
conn = mydatabase.cursor()

@app.route('/', methods=["GET", "POST"])
def home():
    if "user" in session:
        conn.execute(current_user_search, (session["user"], session["password"]))
        records = conn.fetchall()
        if len(records):
            for row in records[0]:
                ids = row
            if request.method == "POST":
                naslov = request.form["naslov"]
                tekst = request.form["objavaa"]
                if naslov!="" and tekst!="":
                    datum = datetime.datetime.now()
                    cas = time.localtime()
                    conn.execute("INSERT INTO objava(naslov, tekst, datum, timee,tk_person)VALUES(%s, %s, %s, %s, %s)",(naslov, tekst, datum, cas, ids))
                    mydatabase.commit()
                    return redirect(url_for('home'))
                else:
                    friend_name = request.form["search"] 
                    conn.execute("SELECT id_person FROM Person WHERE ime=%s",(friend_name,))
                    found = conn.fetchall()
                    for row1 in found[0]:
                        ids1 = row1
                        print(ids1)
                        print(ids) 
                    conn.execute("INSERT INTO friends(tk_person, tk_friend)VALUES(%s, %s)",(ids, ids1))
                    conn.execute("INSERT INTO friends(tk_person, tk_friend)VALUES(%s, %s)",(ids1, ids))
                    mydatabase.commit()
                    return redirect(url_for('home'))

    conn.execute("SELECT ime, naslov, tekst, datum, timee  FROM Person, objava WHERE objava.tk_person = Person.id_person ORDER BY timee DESC")
    infos = conn.fetchall()
    return render_template("home.html", allinfo=infos) 

@app.route("/user")
def user():
    mylist = []
    if "user" in session:
        conn.execute("SELECT naslov, tekst, datum FROM Person, objava WHERE Person.id_person = objava.tk_person AND  ime=%s AND password=%s", (session["user"], session["password"]))
        info = conn.fetchall()
       # print(session["user"])
       # print(session["password"]) 
        conn.execute("SELECT id_person FROM Person WHERE ime=%s AND password=%s",(session['user'], session['password'])) 
        current_user = conn.fetchall()
        for i in current_user[0]:
            current_id = i 
            #print(i)
            conn.execute("SELECT tk_friend FROM Person, friends WHERE friends.tk_person = Person.id_person AND id_person=%s",(i,))
            friends_ids = conn.fetchall()
            if len(friends_ids) != 0:
                for f in friends_ids:
                    print(f[0])
                    conn.execute("SELECT ime FROM Person WHERE id_person=%s",(f[0],))    
                    friends_names = conn.fetchall()
                    mylist.append(friends_names[0]) 
                return render_template("user.html", data=info, data1=mylist)
        
            else:
                return render_template("user.html", data=info)
    else:
        return render_template("login.html")

@app.route("/login", methods=["GET", "POST"])
def login():
    if request.method == "POST":
        name1 = request.form["username1"]   
        password1 =request.form["password1"]
        conn.execute("SELECT * FROM Person")
        infoes = conn.fetchall()
        print(infoes)
        conn.execute("SELECT * FROM Person WHERE ime=%s AND password=%s", (name1, password1))
        account = conn.fetchone()
        print(account)
        if account is None:
            return render_template("login.html")
        else:
            session["user"] = name1 
            session["password"]= password1
            return redirect(url_for("home"))
    else:
        if "user" in session:
           print("user is connected")
           return redirect(url_for("home"))
    return render_template("login.html")    

@app.route("/register", methods=["GET", "POST"])
def register():
    if request.method == "POST":
        name = request.form['username']
        email = request.form['email']
        passwd = request.form['password']
        surename = request.form['sure']
        conn.execute("INSERT INTO Person(ime, priimek, email, password)VALUES(%s, %s, %s, %s)", (name, surename ,email, passwd))
        mydatabase.commit()
        return redirect(url_for("home"))
    else:
        return render_template("register.html")  
    

        


@app.route("/logout")
def logout():
    session.pop("user", None)
    return redirect(url_for("home"))














if __name__ == "__main__":
    app.run(debug=True)
