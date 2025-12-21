import java.sql.{Connection, DriverManager, ResultSet}

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
            val resultSet = statement.executeQuery("SELECT * FROM mra_staff")
            while (resultSet.next()) {
                val name = resultSet.getString("name")
                println(s"Name: $name")
            }
            Thread.sleep(1000) 
        }
    }
}