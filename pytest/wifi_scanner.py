import subprocess
import re
import time
import pytz
from datetime import datetime, timedelta
import mysql.connector

def connect():
    return mysql.connector.connect(
            host="localhost",
            user="mraserver",
            password="mraglobal2525",
            database="mraweb" 
        )

# Fungsi untuk mengimbas rangkaian
def scan_network(interface="wlp2s0b1"):    
    command = ["sudo", "arp-scan", "--localnet", "-I", interface]
    result = subprocess.run(command, capture_output=True, text=True)

    # Dapatkan waktu semasa dalam zon Asia/Kuala_Lumpur
    kl_timezone = pytz.timezone("Asia/Kuala_Lumpur")
    date = datetime.now(kl_timezone).strftime("%Y-%m-%d")
    times = datetime.now(kl_timezone).strftime("%H:%M:%S")

    devices = []
    for line in result.stdout.splitlines():
        match = re.search(r"(\d+\.\d+\.\d+\.\d+)\s+([\da-f:]+)\s+(.+)", line, re.IGNORECASE)
        if match:
            ip, mac, vendor = match.groups()
            mac = mac.upper()  # Tukar MAC ke huruf besar
            devices.append((ip, mac, vendor, date, times))

    return devices

def select(ip, mac, date, times):
    db = connect()
    select = db.cursor()
    select.execute("SELECT * FROM attandance WHERE mac = %s", (mac,))  # Tambah koma di sini
    result = select.fetchall()
    
    if result:
        for row in result:
            name = row[1]
            ic=row[2]
            data_date =str(row[6])
            print(f"NAME: {name}, IC: {ic}, IP: {ip}, MAC: {mac}, DATE SERVER: {date}, DATE DATABASE: {data_date}, TIME: {times}")
            if data_date != date:
                print(f"UPDATE")
                update(ip, mac, date, times)
                insert(ic, times, date)
            else:
                print(f"SAMA")
    else:
        print("TIADA DATA")

    db.close()

def update(ip, mac, date, times):
    db=connect()
    cursor=db.cursor()
    cursor.execute("UPDATE attandance SET ip=%s, date=%s, time=%s WHERE mac=%s",(ip, date, times, mac))
    db.commit()
    db.close()

def insert(ic, times, date):
    db_insert = connect()
    cursor_insert=db_insert.cursor()
    cursor_insert.execute("INSERT INTO `mra_office`(`ic`, `inoffice`, `outoffice`, `date_apply`) VALUES (%s, %s, %s, %s)", (ic, times, '00:00:00', date))
    db_insert.commit()
    db_insert.close()
 
def main():
    while True:
        devices = scan_network()
        if devices:
            for ip, mac, vendor, date, times in devices:
                select(ip, mac, date, times)
        else:
            print("Tiada peranti dikesan.")

        time.sleep(1)

# Jalankan program
if __name__ == "__main__":
    main()