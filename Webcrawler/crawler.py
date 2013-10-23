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

reload(sys)
sys.setdefaultencoding('utf-8')


# {
# 299778:{b:"ZJU09",t:"The sociology of medical science and technology /(作者：Elston, Mary Ann.)"},
# 299806:{b:"ZJU09",t:"Migration, immigration and social policy /(作者：Jones Finer, Catherine.)"},
# 299765:{b:"ZJU09",t:"Individual differences and behavior in organizations /(作者：Murphy, Kevin R.,)"},
# 299776:{b:"ZJU09",t:"Health and the sociology of emotions /(作者：James, Veronica.)"},
# 299777:{b:"ZJU09",t:"Medicine, health, and risk : sociological approaches /(作者：Gabe, Jonathan.)"},
# 299784:{b:"ZJU09",t:"Art : history : visual : culture /(作者：Cherry, Deborah.)"},
# 299787:{b:"ZJU09",t:"Fingering Ingres /(作者：Siegfried, Susan L.)"},
# 299790:{b:"ZJU09",t:"About Mieke Bal /(作者：Cherry, Deborah.)"},
# 299797:{b:"ZJU09",t:"Grammatical development in language learning /(作者：DeKeyser, Robert.)"},
# 299761:{b:"ZJU09",t:"Emotions in the workplace : understanding the structure and role of emotions in organizational behav(作者：Lord, Robert G.)"},
# 299763:{b:"ZJU09",t:"Compensation in organizations : current research and practice /(作者：Rynes, S.)"},
# 299764:{b:"ZJU09",t:"The changing nature of performance : implications for staffing, motivation, and development /(作者：Ilgen, Daniel R.)"},
# 299768:{b:"ZJU09",t:"The view from here : bioethics and the social sciences /(作者：De Vries, Raymond G.)"},
# 299775:{b:"ZJU09",t:"The sociology of health inequalities /(作者：Bartley, Mel.)"},
# 299783:{b:"ZJU09",t:"Between luxury and the everyday : decorative arts in eighteenth-century France /(作者：Scott, Katie,)"},
# 299785:{b:"ZJU09",t:"Difference and excess in contemporary art : the visibility of women's practice /(作者：Perry, Gillian.)"},
# 299796:{b:"ZJU09",t:"Reading and language learning /(作者：Koda, Keiko,)"},
# 299804:{b:"ZJU09",t:"Transnational social policy /(作者：Jones Finer, Catherine.)"},
# 299805:{b:"ZJU09",t:"Crime & social exclusion /(作者：Jones Finer, Catherine.)"},
# 299807:{b:"ZJU09",t:"Making a European welfare state? : convergences and conflicts over European social policy /(作者：Taylor-Gooby, Peter.)"}
# }



# url部分
booksurl = "http://webpac.zju.edu.cn/cgi-bin/newbook.cgi?total=38857&base=ALL&date=180&cls=ALL&page="
thisbookurl = "http://webpac.zju.edu.cn/F/QJBLP34LMP2IAKIPDVD8P9TGKCMAQSGAC7XBJLBEJQ6FQ1GDXN-21216?func=find-b&find_code=SYS&local_base=ZJU09&request="

# 遍历
for i in range(1,3):
    

    page = urllib2.urlopen(booksurl + str(i))

    soup = BeautifulSoup(page)

    jsonstring = soup.p.string
    # print  jsonstring[9:jsonstring.find(');nav(')-1]
    j = jsonstring[8:jsonstring.find(');nav(')-1]
    
    # 我要学正则
    j = j.replace("{",'{"')
    j = j.replace(":{",'":{')
    j = j.replace("b:",'b":')
    j = j.replace("t:",'"t":')
    j = j.replace('"},','"},"')
    j = j+"}"
    ddata = simplejson.loads( j )
    # print ddata
    # print type(ddata)
    for book in ddata:
        ID = book
        titleandauthor = ddata[book]['t']
        title = titleandauthor[:titleandauthor.find(' /')]
        author = titleandauthor[titleandauthor.find('作者：') + 3 : titleandauthor.find(')')]
        print title
        print author