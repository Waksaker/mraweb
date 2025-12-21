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

    def main(args: Array[String]): Unit = {
        var connection: Connection = null
        connection = getConnection()
        val statement = connection.createStatement()
        while (true) {
            val resultSet = statement.executeQuery("SELECT duedate FROM projek")
            while (resultSet.next()) {
                val tarikhAkhir = resultSet.getDate("duedate").toLocalDate
                val harini = LocalDate.now()
                val bakiHari = ChronoUnit.DAYS.between(harini, tarikhAkhir)
                println(s"Tarikh harini: $harini, Tarihk akhir: $tarikhAkhir, Baki: $bakiHari")
            }
            Thread.sleep(1000) 
        }
    }
}