import mysql.connector
def connect():
  return mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="mraweb"
  )
def check1():
  db=connect()
  cursor=db.cursor()
  cursor.execute("SELECT * FROM mra_staff")
  result=cursor.fetchall()
  db.close()
  return result
def main():
  data1=check1()
  for row in data1:
    name=row[2]
    print(f"Name: {name}")
main()
