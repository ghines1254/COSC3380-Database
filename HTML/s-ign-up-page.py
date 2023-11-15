import mysql.connector as mysql
from dbConnector import *
from uuid import uuid4
from main import *

from bottle import route, run, template, request, static_file

@app.route('/signup', method = 'POST')
def signupPage():
    customerID = get_unique_id()
    firstName = request.forms.get('firstname')
    lastName = request.forms.get('lastname')
    middleInitial = request.forms.get('middleinitial')
    address1 = request.forms.get('address-line-1')
    address2 = request.forms.get('address-line-2')
    city = request.forms.get('city1')
    state = request.forms.get('state')
    zipcode = request.forms.get('zip')
    email = request.forms.get('email')
    phoneNum = request.forms.get('phone1')
    password = request.forms.get('password')

    print(firstName + " " + lastName)

    query = "INSERT INTO CUSTOMER VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, now() )"
    insertionData = (phoneNum, customerID, zipcode, state, address1 + " " + address2, city, firstName, lastName, email)
    
    cursor.execute(query, insertionData)

    db_connection.commit()

    query = "INSERT INTO WEBUSERS(UserID, Password, Email, CUSTOMERID, ROLEID, created_on) VALUES (%s, %s, %s, %s, 1, now())"
    insertionData = (customerID, password, email, customerID)

    cursor.execute(query, insertionData)
    
    db_connection.commit()
    

def get_unique_id():
    
    query = "SELECT customer_id FROM CUSTOMER;"
    cursor.execute(query)
    existing_ids = cursor.fetchall()
    new_id = str(uuid4().int)[:10]
    
    for row in existing_ids:
        while new_id in existing_ids:
            new_id = str(uuid4().int)[:10]
    return new_id

