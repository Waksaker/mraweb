import mysql.connector
from datetime import datetime, timedelta
import time
import pytz
import subprocess
import re
import os

def connect():
    return mysql.connector.connect(
        host="localhost",
        user="mraserver",
        password="mraglobal2525",
        database="mraweb"
    )

def ping(ic, ip, date, times):
    response = os.system(f"ping -c 4 {ip}")

    if response == 0:
        print(f"Ping ke {ip} berjaya. Dalam Tarikh {date} dan waktu {times}.\n")
        checklulus(ic, date, times)
    else:
        print(f"Ping ke {ip} gagal. Dalam Tarikh {date} dan waktu {times}.\n")
        checkgagal(ic, date, times)

def checklulus(ic, date, times):
    db = connect()
    cursor = db.cursor()
    cursor.execute("SELECT * FROM `mra_office` WHERE ic=%s AND date_apply=%s", (ic, date))
    result = cursor.fetchall()

    if result:
        for row in result:
            iclulus = row[1]
            outoffice = str(row[3])

            if outoffice != "0:00:00":
                print(f"KENE UBAH MENJADI 0")
                updatelulus(iclulus, date)
            else:
                print(f"TIDAK UBAH")
    else:
        print(f"DATA TIDAK WUJUD")

def checkgagal(ic, date, times):
    db_check = connect()
    cursor_check = db_check.cursor()
    cursor_check.execute("SELECT * FROM `mra_office` WHERE ic=%s AND date_apply=%s", (ic, date))
    result_check = cursor_check.fetchall()

    if result_check:
        for row in result_check:
            ic_user = row[1]
            outoffice = str(row[3])
            # print(f"out:{outoffice}")
            if outoffice == '0:00:00':
                update(ic_user, date, times)
            else:
                print(f"SUDAH UPDATE")
    else:
        print(f"DATA TIDAK WUJUD")


def update(ic_user, date, times):
    db = connect()
    cursor = db.cursor()
    cursor.execute("UPDATE mra_office SET outoffice=%s WHERE ic=%s AND date_apply=%s", (times, ic_user, date))
    db.commit()
    db.close()

def updatelulus(ic, date):
    db = connect()
    cursor = db.cursor()
    cursor.execute("UPDATE mra_office SET outoffice=%s WHERE ic=%s AND date_apply=%s", ("00:00:00", ic, date))
    db.commit()
    db.close()

    
def main():
    db = connect()
    select = db.cursor()

    kl_timezone = pytz.timezone("Asia/Kuala_Lumpur")
    date = datetime.now(kl_timezone).strftime("%Y-%m-%d")

    while True:
        # Dapatkan waktu semasa dalam zon Asia/Kuala_Lumpur
        check_date = datetime.now(kl_timezone).strftime("%Y-%m-%d")
        check_times = datetime.now(kl_timezone).strftime("%H:%M:%S")

        select.execute("SELECT * FROM attandance WHERE date = %s", (date,))
        result = select.fetchall()

        if result:
            for row in result:
                mac = row[3]
                ip = row[4]
                ic = row[2]

                ping(ic, ip, check_date, check_times)

                # Semak jika waktu antara 10:00:00 hingga 11:00:00
                # if "10:00:00" <= check_times <= "11:00:00":
                #     ping(ip, mac, check_date, check_times)
                # else:
                #     print(f"BELUM WAKTU ({check_times})")
        else:
            print("TIADA DATA")
        
        time.sleep(1)

if __name__ == "__main__":
    main()