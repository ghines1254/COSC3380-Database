import mysql.connector as mysql
from dbConnector import *
from bottle import route, run, template, request, static_file
import json

@route('admin-employees-page', method = 'post')

def adminEmployeePage():
    query = "SELECT first_name, last_name, idnum, dept FROM EMPLOYEE"

    cursor.execute(query)

    employees = cursor.fetchall()

    
    json_output = json.dumps(employees)

    return json_output