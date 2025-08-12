import subprocess
import re
import time
import pytz
import datetime
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
    date = datetime.datetime.now(kl_timezone).strftime("%Y-%m-%d")
    times = datetime.datetime.now(kl_timezone).strftime("%H:%M:%S")

    devices = []
    for line in result.stdout.splitlines():
        match = re.search(r"(\d+\.\d+\.\d+\.\d+)\s+([\da-f:]+)\s+(.+)", line, re.IGNORECASE)
        if match:
            ip, mac, vendor = match.groups()
            mac = mac.upper()  # Tukar MAC ke huruf besar
            devices.append((ip, mac, vendor, date, times))

    return devices

def save(ip, mac, date, times):
    db=connect()
    cursor=db.cursor()
    cursor.execute("UPDATE attandance SET ip=%s, date=%s, time=%s WHERE mac=%s",(ip, date, times, mac))
    db.commit()
    db.close()

def main():
    while True:
        devices = scan_network()
        if devices:
            for ip, mac, vendor, date, times in devices:
                print(f"IP: {ip}, MAC: {mac}, DATE: {date}, TIME: {times}")
                save(ip, mac, date, times)
        else:
            print("Tiada peranti dikesan.")

        time.sleep(1)

# Jalankan program
if __name__ == "__main__":
    main()