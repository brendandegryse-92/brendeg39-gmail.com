import pandas as pd
import mysql.connector
file = pd.read_csv('C:/Users/brend/Downloads/operator.csv')
UserID = open("C:/xampp/htdocs/UserID.txt", "r").read()
file.fillna(0, inplace=True)
mydb = mysql.connector.connect(
  host="localhost",
  user="client",
  passwd="Pass",
  database="simplifiedtechnologyservices"
)

cursor = mydb.cursor()

sql = "INSERT INTO operator (OpName, OpAddress, OpCity, OpState, OpZip, OpPhone, IsActive, UserID) Values (%s,%s,%s,%s,%s,%s,%s,%s)"
for i in range(len(file)):
    cursor.execute(sql, (file['OpName'][i], file['OpAddress'][i], file['OpCity'][i], file['OpState'][i], int(file['OpZip'][i]), int(file['OpPhone'][i]), int(file['IsActive'][i]), int(UserID)))
mydb.commit()
