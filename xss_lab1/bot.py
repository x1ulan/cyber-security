from selenium import webdriver
from time import sleep

wb = webdriver.Chrome()

sleep(1)

PASS = "password"
HIDDEN = "fca9b80f-0bda-4e52-ad50-7ff8bde6b061"

url=f"http://localhost/slide/xssinphp/{HIDDEN}.php?pass={PASS}"

wb.get(url)

sleep(3)