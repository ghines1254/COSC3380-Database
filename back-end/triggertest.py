import mysql.connector
from mysql.connector import Error
import smtplib

smtpObj = smtplib.SMTP()

def openConnection():
    connection = mysql.connector.connect(host = '34.68.154.206', database = 'Post_Office_Schema',
    user = 'root', password = 'umapuma')

    return connection

def closeConnection(connection):
    if connection:
        connection.close()


def getLowStock():
    try:
        connection = openConnection()
        #Cursor to interact with server
        cursor = connection.cursor() 
        #Select statement for tuples with low stock.
        selectStock = "SELECT product_id FROM IN_STORE_PRODUCTS WHERE stock_remaining < 10;"
        cursor.execute(selectStock)

        #Storing all the low stock items in a variable.
        lowStock = cursor.fetchall()

        for x in lowStock:
            if x == 0:
                raise Exception("Out of stock")

        for y in lowStock:
            #("???? how do i notify employees cryingemoji.gif")
            emailReceiver = ["ghines1254@gmail.com"]
            smtpObj.sendmail("cougarcourier2023@gmail.com", emailReceiver, "Low stock")
        


    except Error as e:
        print("Error: ", e)
    
    finally:
        cursor.close()
        closeConnection(connection)


#SQL versions of what I'm trying to do 

# CREATE TRIGGER low_stock_trigger AFTER UPDATE ON IN_STORE_PRODUCTS WHEN stock_remaining < 10 
# FOR EACH ROW EXECUTE FUNCTION (functiongoeshere?)

#CREATE TRIGGER no_stock_trigger BEFORE UPDATE ON IN_STORE_PRODUCTS WHEN stock_remaining = 0
#FOR EACH ROW IF stock_remaining = 0 THROW 50000, 'out of stock.' ;