import mysql.connector as mysql
from bottle import route, run, request, response, app
import json

# Database connection details
HOST = "34.68.154.206"
DATABASE = "Post_Office_Schema"
USER = "root"
PASSWORD = "umapuma"

# Establishing the connection
db_connection = mysql.connect(host=HOST, database=DATABASE, user=USER, password=PASSWORD)
print("Connected to:", db_connection.get_server_info())

# Creating a cursor object using the cursor() method
cursor = db_connection.cursor(buffered=True)

@app.route('/tracking-page.py', method='GET')
def track_package():
    tracking_number = request.query.tracking_number
    if tracking_number:
        query = "SELECT status FROM PACKAGE WHERE tracking_number = %s"
        cursor.execute(query, (tracking_number,))
        status = cursor.fetchone()

        if status:
            response.content_type = 'application/json'
            return json.dumps({'status': status[0]})
        else:
            response.content_type = 'application/json'
            return json.dumps({'status': 'not_found'})

    response.content_type = 'application/json'
    return json.dumps({'status': 'invalid'})


# Replace HOST and PORT with your server's configuration
run(app, host='34.68.154.206', port=8080)
