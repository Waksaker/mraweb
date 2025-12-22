import java.sql.{Connection, DriverManager, SQLException}
import java.time.LocalDate
import java.time.temporal.ChronoUnit

object Check {

    val url = "jdbc:mysql://localhost:3306/mraweb"
    val username = "root"
    val password = ""

    // load driver SEKALI
    Class.forName("com.mysql.cj.jdbc.Driver")

    def getConnection(): Option[Connection] = {
        try {
            Some(DriverManager.getConnection(url, username, password))
        } catch {
            case _: SQLException =>
                println("❌ XAMPP / MySQL belum hidup")
                None
        }
    }

    def updatedata(id: String, baki: Long, conn: Connection): Unit = {
        val sql = "UPDATE projek SET bildate = ? WHERE id = ?"
        val stm = conn.prepareStatement(sql)
        stm.setLong(1, baki)
        stm.setString(2, id)
        stm.executeUpdate()
        stm.close()
    }

    def main(args: Array[String]): Unit = {

        while (true) {

            getConnection() match {
                case Some(conn) =>
                    println("✅ MySQL bersambung")

                    val stmt = conn.createStatement()
                    val rs = stmt.executeQuery("SELECT id, duedate FROM projek")

                    val hariIni = LocalDate.now()

                    while (rs.next()) {
                        val id = rs.getString("id")
                        val dateSql = rs.getDate("duedate")

                        if (dateSql != null) {
                            val tarikhAkhir = dateSql.toLocalDate
                            val bakiHari = ChronoUnit.DAYS.between(hariIni, tarikhAkhir)
                            updatedata(id, bakiHari, conn)
                        }
                    }

                    rs.close()
                    stmt.close()
                    conn.close()

                case None =>
                    println("⏳ Menunggu XAMPP dihidupkan...")
            }

            Thread.sleep(3000)
        }
    }
}