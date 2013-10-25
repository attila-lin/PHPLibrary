import MySQLdb
 
try:
    conn=MySQLdb.connect(host='localhost',user='root',passwd='lyu66559033',db='test',port=3306,charset='utf8')
    cur=conn.cursor()
    
    # cur.execute('create database if not exists PHPLibrary')
    conn.select_db('PHPLibrary')
    # cur.execute('create table test(id int,info varchar(20))')

    cur.execute(
        'create table book (bno char(8) ,category char(10),title varchar(40),press varchar(30),year char(10),author varchar(20),price decimal(7,2),total int ,Stock int ,\
            labels char(50),\
            cover char(20),\
            page int ,\
            Format char(10),ISBN char(15))')

    cur.close()
    conn.close()
except MySQLdb.Error,e:
     print "Mysql Error %d: %s" % (e.args[0], e.args[1])