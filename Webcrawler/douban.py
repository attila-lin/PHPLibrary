# -*- coding: utf-8 -*-
import urllib
import urllib2
import requests
import re
from bs4 import BeautifulSoup   # To get everything
import time
import sys
# import json
import simplejson
import httplib2

reload(sys)
sys.setdefaultencoding('utf-8')

http = httplib2.Http('.cache')

urllib2.socket.setdefaulttimeout(4)

headers = {
    'Host' : 'book.douban.com',
    'User-Agent' : 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:24.0) Gecko/20100101 Firefox/24.0',
    'Accept' : 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
    'Accept-Language' : 'en-US,en;q=0.5',
    'Accept-Encoding' : 'gzip, deflate',
    'Cookie' : 'bid="YPFCwQ3tMM8"; __utma=30149280.1637324852.1370710132.1370710132.1370710132.1; __utmz=30149280.1370710132.1.1.utmcsr=web.qq.com|utmccn=(referral)|utmcmd=referral|utmcct=/; __utma=81379588.1838081057.1370710132.1370710132.1370710132.1; __utmz=81379588.1370710132.1.1.utmcsr=web.qq.com|utmccn=(referral)|utmcmd=referral|utmcct=/; viewed="25731751_20374758_1468997"; __utmv=30149280.4667',
    'Connection' : 'keep-alive',
    'Cache-Control' : 'max-age=0',
}

baseurl = 'http://book.douban.com/subject/'
# 遍历
# First time   20000000 20001000
for i in range(20000000,20001000):
    try:
        url = baseurl + str(i) +'/'
        # print url
        # page = urllib2.urlopen(url)
        response, content = http.request(url, 'GET', headers=headers)
        # soup = BeautifulSoup(page)
        soup = BeautifulSoup(content)

        # print soup
        # soup.body.
        if soup.title == "页面不存在":
            continue
        else:
            booktitle = soup.title
            # print soup.find("span", {"class":"pl"})
            info = soup.find("div",{"id":"info"})

            # print info
            # 存在可能有span的情况所以不行
            # br = info.findAll('br')
            # k = -1
            # for i in info.findAll('span'):
            #     if k >= 0:
            #         print i.string
            #         print "element= " + br[k].previous_element
            #     k += 1

            # print info.next_element.next_element

            
            # for i in info:
            #     print type(i)
            #     if i.find('a'):
            #         print i.findAll('span')
            #         print i.find('a').string

            # author = info.findAll("a")[0].string

            # for br in info.findAll('br'):
            #     next = br.previous_element
            #     print next

            # print info
            print "{{{"
            print "id:",
            print i
            if info != None:
                for inf in info.findAll('span'):
                    if inf.string == ' 作者':
                        print "作者:",
                        print str(inf.find_next_sibling('a').string).replace(" ","")
                    if inf.string == '出版社:':
                        print "出版社:",
                        print str(inf.next_element.next_element).replace(" ","")
                    if inf.string == '原作名:':
                        print "原作名:",
                        print str(inf.next_element.next_element).replace(" ","")
                    if inf.string == ' 译者':
                        print "译者:",
                        print str(inf.find_next_sibling('a').string).replace(" ","")
                    if inf.string == '出版年:':
                        print "出版年:",
                        print str(inf.next_element.next_element).replace(" ","")
                    if inf.string == '页数:':
                        print "页数:",
                        print str(inf.next_element.next_element).replace(" ","")
                    if inf.string == '定价:':
                        print "定价:",
                        print str(inf.next_element.next_element).replace(" ","")
                    if inf.string == '装帧:':
                        print "装帧:",
                        print str(inf.next_element.next_element).replace(" ","")
                    if inf.string == 'ISBN:':
                        print "ISBN:",
                        print str(inf.next_element.next_element).replace(" ","")

            # 评分
            if soup.find('strong',{'class':'ll rating_num '}) != None:
                print "评分:",
                print str(soup.find('strong',{'class':'ll rating_num '}).string).replace(" ","").replace("\n",'').replace("\t","")

            if soup.find('span',{'property':'v:votes'}) != None:
                print "评价人数:",
                print soup.find('span',{'property':'v:votes'}).string

            if soup.find('div',{'id':'db-tags-section'}) != None:
                print "标签:",
                lable = soup.find('div',{'id':'db-tags-section'})
                for a in lable.findAll('a'):
                    print a.string,
            print "}}}"

    except urllib2.HTTPError, e:
        # print "Not Found"
        pass
    except httplib2.RedirectLimit, e:
        # print "RedirectLimit"
        pass
    else:
        pass
    finally:
        pass
    # break
