#This is where the server logic is set up
from bottle import Bottle, run, route, static_file
from dbConnector import *
from triggertest import *
import mysql.connector as mysql
from dbConnector import *


route('/')
def homePage():
    return static_file('index.html', root='.')


if __name__ == '__main__':
    run(host='0.0.0.0', port=443, debug=True)