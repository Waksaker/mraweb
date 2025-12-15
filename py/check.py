import mysql.connector
import time
from datetime import datetime
def connect():
  return mysql.connector.connect(
    host="localhost",
    user="mraserver",
    password="mraglobal2525",
    database="mraweb"
  )
def check1():
  db=connect()
  cursor=db.cursor()
  cursor.execute("SELECT id, lponum, duedate FROM projek")
  result=cursor.fetchall()
  db.close()
  return result
def updatebildate():
  db=connect()
  cursor=db.cursor()
  data=check1()
  for row in data:
    id=row[0]
    lponum=row[1]
    duedate=row[2]
    today=datetime.now().date()
    end=duedate.date()
    total=(end-today).days
    print(f"ID: {id}, LPO Number: {lponum}, Tarikh akhir: {end}, Tarikh hari ni: {today}, Jumlah hari: {total} days")
    cursor.execute("UPDATE projek SET bildate = %s WHERE id = %s", (total,id))
  db.commit()
  db.close()
def main():
  while True:
    print(f"Check jumlah hari akhir projek.")
    updatebildate()
    time.sleep(3)
main()
