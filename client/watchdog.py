#!/usr/bin/python
import MySQLdb, time, random, string
#time
now = int(time.time())
#password
chars=string.ascii_letters+string.digits
randpwd=''.join([random.choice(chars) for i in range(length)])
print randpwd
#connect database
db = MySQLdb.connect("host","root",'pass',"db") 
cursor = db.cursor()
# sql command
sql = "SELECT username, enable, expire_time FROM members WHERE 1" 
try:
    cursor.execute(sql)
    results = cursor.fetchall()
    for row in results:
        username = row[0]
        expire_time = row[2]
        if expire_time < now:
            sql = "UPDATE members SET enable=0 WHERE username='%s'" %(username)
            try:
                cursor.execute(sql)
                db.commit()
            except:
                db.rollback()
            print "%s" %(username)
except:
    print "ERROR"

#close DB
db.close()

