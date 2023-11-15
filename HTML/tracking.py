import mysql.connector as mysql
from bottle import route, run, request, response, app
import json

# Assuming dbConnector contains the database connection details
from dbConnector import db_connection, cursor

@app.route('/track', method='GET')
def track_package():
    tracking_number = request.query.tracking_number
    if tracking_number:
        query = "SELECT package_id FROM PACKAGE"
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
run(app, host='localhost', port=8080)
