import mysql.connector

def connect():
    return mysql.connector.connect(
        host='localhost',
        user='root',
        password='',
        database='mraweb'
    )

try:
    print("Connecting to DB...")
    db = connect()
    print("Connected to DB!")
except mysql.connector.Error as err:
    print("Error connecting to DB:", err)
    exit(1)

cursor = db.cursor()
cursor.execute("SELECT dateattan FROM mra_staff")
results = cursor.fetchall()
print("Rows fetched:", len(results))

for row in results:
    print("DATE ATTENDANCE:", row[0])

cursor.close()
db.close()