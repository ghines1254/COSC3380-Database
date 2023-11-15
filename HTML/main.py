#This is where the server logic is set up
from bottle import run, route, static_file
from dbConnector import *
from triggertest import *


@route('/')
def homePage():
    return static_file('index.html', root='.')

if __name__ == '__main__':
    run(host='0.0.0.0', port=8080, debug=True)