import mysql.connector
from mysql.connector import Error
import time
from datetime import datetime

def connect():
    try:
        conn = mysql.connector.connect(
            host="localhost",
            user="root",
            password="",
            database="mraweb"
        )
        if conn.is_connected():
            return conn
    except Error:
        print("⚠️ PHPMyAdmin/MySQL belum run! Sila pastikan XAMPP atau MySQL server dijalankan.")
        return None

def check1():
    db = connect()
    if db is None:
        return []  # tiada data jika database tidak connect
    cursor = db.cursor()
    cursor.execute("SELECT id, lponum, duedate FROM projek")
    result = cursor.fetchall()
    db.close()
    return result

def updatebildate():
    db = connect()
    if db is None:
        return  # keluar jika tiada sambungan database
    cursor = db.cursor()
    data = check1()
    for row in data:
        id = row[0]
        lponum = row[1]
        duedate = row[2]
        today = datetime.now().date()
        end = duedate.date()
        total = (end - today).days
        if total <= -1:
            print(f"ID: {id}, LPO Number: {lponum}, Tarikh akhir: {end}, Tarikh hari ni: {today}, Jumlah hari: {0} days")
            cursor.execute("UPDATE projek SET bildate = %s WHERE id = %s", (0, id))
        else:
            print(f"ID: {id}, LPO Number: {lponum}, Tarikh akhir: {end}, Tarikh hari ni: {today}, Jumlah hari: {total} days")
            cursor.execute("UPDATE projek SET bildate = %s WHERE id = %s", (total, id))
    db.commit()
    db.close()

def main():
    while True:
        print(f"Check jumlah hari akhir projek.")
        updatebildate()
        time.sleep(3)

if __name__ == "__main__":
    main()
