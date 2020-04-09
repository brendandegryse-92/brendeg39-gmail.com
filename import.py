import pandas as pd
import mysql.connector
file = pd.read_csv('C:/Users/brend/Downloads/operator.csv')
#print(file['OpName'])
values = [
mydb = mysql.connector.connect(
  host="localhost",
  user="client",
  passwd="Pass",
  database="simplifiedtechnologyservices"
)

cursor = mydb.cursor()

sql = "INSERT INTO operator (OpName, OpAddress, OpCity, OpState, OpZip, OpPhone, IsActive, UserID) Values (%s,%s,%s,%s,%s,%s,%s,%s)"
for i in range(len(file)):
    print((file['OpName'][i], file['OpAddress'][i], file['OpCity'][i], file['OpState'][i], file['OpZip'][i], file['OpPhone'][i], file['IsActive'][i], 22))
    values = values.append((file['OpName'][i], file['OpAddress'][i], file['OpCity'][i], file['OpState'][i], file['OpZip'][i], file['OpPhone'][i], file['IsActive'][i], 22))
print(values)
cursor.execute(sql, values)
