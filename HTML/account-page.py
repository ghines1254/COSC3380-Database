import mysql.connector as mysql
from dbConnector import *

from bottle import route, run, template, request, static_file

@route('/account-page', method = 'post')
def accountPage(userID):
    customerID = userID
    firstName = request.forms.get('firstname')
    lastName = request.forms.get('lastname')
    address1 = request.forms.get('address-line-1')
    address2 = request.forms.get('address-line-2')
    city = request.forms.get('city1')
    state = request.forms.get('state')
    zipcode = request.forms.get('zip')
    email = request.forms.get('email')
    phoneNum = request.forms.get('phone1')    

    query = "UPDATE CUSTOMER SET customer_phone = %s, zip = %s, state = %s, street_address = %s, city = %s, first_name = %s, last_name = %s, email = %s WHERE customer_id = %s ;"
    
    updateData = (phoneNum, zipcode, state, address1, city, firstName, lastName, email, customerID)
    
    cursor.execute(query, updateData)
    
    db_connection.commit()

