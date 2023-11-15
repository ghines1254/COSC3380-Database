import mysql.connector as mysql
from dbConnector import *

from bottle import route, run, template, request, static_file

@route('/employee-login-page', method = 'post')

def employeeLogin():
    userID = request.forms.get('username')
    password = request.forms.get('password')  