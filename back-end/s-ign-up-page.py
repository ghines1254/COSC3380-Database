import mysql.connector as mysql
from dbConnector import *
from uuid import uuid4

from bottle import route, run, template, request, static_file
@route('/s-ign-up-page', method = 'post')

def signupPage():
    customerID = get_unique_id()
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
    

def get_unique_id():
    
    query = "SELECT customer_id FROM CUSTOMER;"
    cursor.execute(query)
    existing_ids = cursor.fetchall()
    new_id = int(str(uuid4().int)[:10])
    
    for row in existing_ids:
        while new_id in existing_ids:
            new_id = int(str(uuid4().int)[:10])
        return new_id