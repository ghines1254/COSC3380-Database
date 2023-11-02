import mysql.connector as mysql
from dbConnector import *
from bottle import route, run, template, request, static_file
import random


@route('/shipping-page.py', method = 'post')
def shippingPage():
    senderFirst = request.forms.get('sender-first-name')
    senderMiddle = request.forms.get('sender-middle-initial')
    senderLast = request.forms.get('sunder-last-name')
    senderAddress1 = request.forms.get('sender-address-line-1')
    senderAddressLine2 = request.forms.get('sender-address-line-2')
    senderCity = request.forms.get('sender-city')
    senderState = request.forms.get('sender-state')
    senderZip = request.forms.get('sender-zip')
    senderEmail = request.forms.get('sender-email')
    senderPhone = request.forms.get('sender-phone')

    receiverFirst = request.forms.get('receiver-first-name')
    receiverMiddle = request.forms.get('receiver-middle-initial')
    receiverLast = request.forms.get('receiver-last-name')
    receiverAddress1 = request.forms.get('receiver-address-line1')
    receiverAddress2 = request.forms.get('receiver-address-line-2')
    receiverCity = request.forms.get('receiver-city')
    receiverState = request.forms.get('receiver-state')
    receiverZip = request.forms.get('receiver-zip')
    receiverEmail = request.forms.get("receiver-email")
    receiverPhone = request.forms.get('receiver-phone')

    receiverFullName = receiverFirst + " " + receiverLast
    receiverFullAddress = receiverAddress1 + " " + receiverAddress2

    dimensions = 25
    weight = 3.5
    contents = "puma"
    CustID = 1
    postOfficeID = 1

    query = "SELECT package_id FROM PACKAGE"
    cursor.execute(query)

    result = cursor.fetchall()

    def generate_unique_number(existing_ID):
        while True:
            tempNum = random.randint(100000000, 999999999)
            if tempNum not in existing_ID:
                return tempNum

    packageID = generate_unique_number(result)
    trackingNumber = packageID
    packageQuery = "INSERT INTO PACKAGE VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)"
    insertionData = (packageID, dimensions, trackingNumber, weight, contents, receiverFullName, receiverFullAddress, CustID, postOfficeID, receiverZip, receiverState)

    cursor.execute(packageQuery, insertionData)
    
    db_connection.commit()

