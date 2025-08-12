import mysql.connector
from datetime import datetime, timedelta
import time

def connect():
    return mysql.connector.connect(
        host="localhost",
        user="mraserver",
        password="mraglobal2525",
        database="mraweb"
    )

def list_attendance():
    db = connect()
    cursor = db.cursor()

    # SQL query untuk ambil semua data dari table attendance
    cursor.execute("SELECT * FROM attandance")

    # Ambil semua baris hasil query
    results = cursor.fetchall()

    # Tutup cursor dan connection
    cursor.close()
    db.close()

    return results

def attan():
    

def main():
    while True:
        # Contoh penggunaan fungsi
        attendance_list = list_attendance()
        if attendance_list:
            for row in attendance_list:
                name = row[1]
                times = row[4]
                date = row[5]
                hari_ini = datetime.today()
                semalam = hari_ini - timedelta(days=1)
                formatted_date = semalam.strftime("%Y-%m-%d")

                print(f"NAME: {name}, TIME: {times}, DATE: {date}, TARIKH SEMALAM: {formatted_date}")
        else:
            print("Tiada data.")

        time.sleep(1)

if __name__ == "__main__":
    main()