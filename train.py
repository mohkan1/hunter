import mysql.connector

mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  passwd="",
  database="test"
)

mycursor = mydb.cursor()

sql = "INSERT INTO gate (house, keyboard) VALUES (%s, %s)"
val = (2, "qwerty")

mycursor.execute(sql, val)

mydb.commit()

print(mycursor.rowcount, "record inserted.")
