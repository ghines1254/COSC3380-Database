#This is where the server logic is set up
from bottle import run, route, static_file
from pyFiles import *

@route('/')
def homePage():
    return static_file('index.html', root='.')

if __name__ == '__main__':
    run(host='34.174.156.167', port=3306, debug=True)