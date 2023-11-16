#This is where the server logic is set up
from bottle import Bottle, run, route, static_file, template
from dbConnector import *
from triggertest import *
import mysql.connector as mysql
from dbConnector import *

app = Bottle()

@app.route('/')

@app.route('/index')
def homePage():
    return template("index.html")

if __name__ == '__main__':
    run(host='0.0.0.0', port=443)