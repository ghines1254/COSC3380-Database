import mysql.connector as mysql
from dbConnector import *

from bottle import route, run, template, request, static_file

@route('/admin-login-page', method = 'post')

def adminLogin():
    userID = request.forms.get('username')
    password = request.forms.get('password')  

