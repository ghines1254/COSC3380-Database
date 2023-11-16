import mysql.connector
from mysql.connector import Error
import smtplib
from email.mime.text import MIMEText
from email.mime.multipart import MIMEMultipart

smtpObj = smtplib.SMTP()

def openConnection():
    connection = mysql.connector.connect(host = '34.68.154.206', database = 'Post_Office_Schema',
    user = 'root', password = 'umapuma')

    return connection

def closeConnection(connection):
    if connection:
        connection.close()

def send_email():
    emailRecipient = "ghines1254@gmail.com"
    subject = "Low Stock Notification"
    message = "Low stock detected on item"

    emailSender = "cougarcourier2023@gmail.com"
    senderPassword = "Umapuma123"

    sentEmail = MIMEMultipart()
    sentEmail['From'] = emailSender
    sentEmail['To'] = emailRecipient
    sentEmail['Subject'] = subject

    sentEmail.attach(MIMEText(message,'plain'))

    with smtplib.SMTP('smtp.gmail.com', 587) as server:
        server.starttls()
        server.login(emailSender, senderPassword)
        server.sendmail(emailSender, emailRecipient, sentEmail.as_string())

    return "Email sent Successfully"


def getLowStock():
    try:
        connection = openConnection()
        
        #Cursor to interact with server
        cursor = connection.cursor() 
        
        #Select statement for tuples with low stock.
        lowStockQuery = "SELECT product_name FROM IN_STORE_PRODUCTS WHERE stock_remaining < 10;"
        noStockQuery = "SELECT product_name FROM IN_STORE_PRODUCTS WHERE stock_remaining = 0;"
        cursor.execute(lowStockQuery)

        cursor2 = connection.cursor()
        cursor2.execute(noStockQuery)

        #Storing all the low and no stock items in variables.
        lowStock = cursor.fetchall()
        noStock = cursor2.fetchall()
        

        for x in noStock:
            raise Exception("Out of stock")

        for y in lowStock:
            #("???? how do i notify employees cryingemoji.gif")
            emailReceiver = ["ghines1254@gmail.com"]
            smtpObj.sendmail("cougarcourier2023@gmail.com", emailReceiver, "Low stock")
        


    except Error as e:
        print("Error: ", e)
    
    finally:
        cursor.close()
        cursor2.close()
        closeConnection(connection)


#SQL versions of what I'm trying to do 

# CREATE TRIGGER low_stock_trigger AFTER UPDATE ON IN_STORE_PRODUCTS WHEN stock_remaining < 10 
# FOR EACH ROW EXECUTE FUNCTION (functiongoeshere?)

#CREATE TRIGGER no_stock_trigger BEFORE UPDATE ON IN_STORE_PRODUCTS WHEN stock_remaining = 0
#FOR EACH ROW IF stock_remaining = 0 THROW 50000, 'out of stock.' ;
