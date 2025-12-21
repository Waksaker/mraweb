import java.sql.{Connection, DriverManager, ResultSet}
import java.time.LocalDate
import java.time.temporal.ChronoUnit

object Check {
    def getConnection(): Connection = {
        val url = "jdbc:mysql://localhost:3306/mraweb"
        val username = "root"
        val password = ""
        Class.forName("com.mysql.cj.jdbc.Driver") // pastikan driver ada
        DriverManager.getConnection(url, username, password)
    }

    def updatedata(id: String, Baki: Long, conn: Connection): Unit = {
        println(s"ID: $id, Baki: $Baki")
        val sql = "UPDATE projek SET bildate = ? WHERE id = ?"
        val stm = conn.prepareStatement(sql)
        stm.setLong(1, Baki)
        stm.setString(2, id)
        stm.executeUpdate()
        stm.close()
    }

    def main(args: Array[String]): Unit = {
        var connection: Connection = null
        connection = getConnection()
        val statement = connection.createStatement()
        while (true) {
            val resultSet = statement.executeQuery("SELECT id,duedate FROM projek")
            while (resultSet.next()) {
                val id = resultSet.getString("id")
                val tarikhAkhir = resultSet.getDate("duedate").toLocalDate
                val harini = LocalDate.now()
                val bakiHari = ChronoUnit.DAYS.between(harini, tarikhAkhir)
                updatedata(id, bakiHari, connection)
                // println(s"ID: $id, Tarikh harini: $harini, Tarihk akhir: $tarikhAkhir, Baki: $bakiHari")
            }
            Thread.sleep(1000) 
        }
    }
}