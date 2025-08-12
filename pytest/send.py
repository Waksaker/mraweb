import subprocess
import time
import pytz
from datetime import datetime

def run():
    try:
        # Jalankan skrip PHP
        result = subprocess.run(["php", "/var/www/html/send.php"], capture_output=True, text=True)
        
        # Cetak output dari skrip PHP
        if result.stdout.strip():
            print(result.stdout.strip())
            print("BERJAYA HANTAR")
        else:
            print("GAGAL HANTAR")

    except Exception as e:
        print("Ralat:", str(e))

def main(): 
    while True:
        kl_timezone = pytz.timezone("Asia/Kuala_Lumpur")
        check_times = datetime.now(kl_timezone).strftime("%H:%M:%S")
		
        if check_times == "10:00:00": run()
        elif check_times == "19:00:00": run()
        elif check_times == "22:00:00": run()
        else: print("BELUM WAKTU:", check_times)
        
        time.sleep(1)

# Jalankan program
if __name__ == "__main__":
    main()