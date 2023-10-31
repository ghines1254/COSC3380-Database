import mysql.connector as mysql

HOST = "34.68.154.206"

DATABASE = ""

USER = "root"

PASSWORD = "umapuma"

db_connection = mysql.connect(host=HOST, database=DATABASE, user=USER, password=PASSWORD)
print("Connected to:", db_connection.get_server_info())



