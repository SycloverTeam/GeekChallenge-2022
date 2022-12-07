#Author:Leon
from email import header
from wsgiref import headers
from selenium import webdriver
from selenium.webdriver.chrome.options import Options
import requests
import time

chrome_opt = Options()
chrome_opt.binary_location = '/usr/bin/google-chrome-stable'
chrome_opt.add_argument('--headless')
chrome_opt.add_argument('--disable-gpu')
chrome_opt.add_argument('--window-size=1366,768')
chrome_opt.add_argument("--no-sandbox")

#Modification
get_url = "http://172.20.0.3/ae956df30fcd8f35ca75d87fb84335ec_bot.php"
del_url = "http://172.20.0.3/ae956df30fcd8f35ca75d87fb84335ec_del.php"
cookie1 = {'name':'secret','value':'testxxx','path':'/'}

with open("/var/xssbot/xssbot.log", "w+") as f:
    while 1:
        try:
            # requests.adapters.DEFAULT_RETRIES = 5
            # s = requests.session()
            # s.keep_alive = False

            req = requests.get(get_url, headers={'Connection':'close','User-Agent':'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36'})
            url = req.text.split("\n")[0].strip()

            if (url == ''):
                time.sleep(20)
                continue

            browser = webdriver.Chrome(executable_path='/usr/bin/chromedriver', chrome_options=chrome_opt)
            f.write("REQUEST: %s\n" % url)
            browser.get(url)
            f.write("OK: %s\n" % browser.current_url)
            f.flush()

        except Exception as e:
            f.write("ERROR: %s\n" % e)
            f.flush()
            time.sleep(20)
            continue

        finally:
            try:
                if (url):
                    requests.post(del_url, data={"url": url})
                    f.write("Deleted: %s\n" % url)
                    url = None
                if (browser):
                    time.sleep(2)
                    browser.quit()
                    browser = None
            except Exception:
                pass