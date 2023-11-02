import mysql.connector as mysql
from dbConnector import *
from uuid import uuid4

from bottle import route, run, template, request, static_file

@route('/account-page', method = 'post')
def accountPage():
    customerID = int(str(uuid4().int)[:10])
    firstName = request.forms.get('firstname')
    lastName = request.forms.get('lastname')
    address1 = request.forms.get('address-line-1')
    address2 = request.forms.get('address-line-2')
    city = request.forms.get('city1')
    state = request.forms.get('state')
    zipcode = request.forms.get('zip')
    email = request.forms.get('email')
    phoneNum = request.forms.get('phone1')
    
    
    query = "INSERT INTO CUSTOMER VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)"
    insertionData = (phoneNum, customerID, zipcode, state, address1, city, firstName, lastName, email)
    
    cursor.execute(query, insertionData)
    
    db_connection.commit()
