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

    query = "INSERT INTO CUSTOMER (customer_phone, customer_id, zip, state, street_address, city, first_name, last_name, email, PASSWORD) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)"
    insertionData = (phoneNum, customerID, zipcode, state, address1, city, firstName, lastName, email, password)
    
    cursor.execute(query, insertionData)

    db_connection.commit()

    query = "INSERT INTO WEBUSERS(UserID, Password, Email, CUSTOMERID, ROLEID) VALUES (%s, %s, %s, %s, 1)"
    insertionData = (customerID, password, email, customerID)

    cursor.execute(query, insertionData)
    
    db_connection.commit()
    

    def get_unique_id():
        
        new_id = str(uuid4().int)[:10]
        return new_id

signupPage()



