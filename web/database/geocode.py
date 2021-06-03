import urllib.request, urllib.parse, json

KEY = "AIzaSyApaj14PBOXclTYt8Bg3fIJnkiSiELkMZA"

f = open("random_snatch.csv", "r")
w = open("random_snatch_pos.csv", "w")


for line in iter(f):
    line = line.rstrip()
    addr = line.split(',')[5]
    url = "https://maps.googleapis.com/maps/api/geocode/json?address=" + urllib.parse.quote(addr) + "&key=" + KEY + "&language=zh-TW"
    response = urllib.request.urlopen(url)
    data = json.loads(response.read())
    if data['status'] == 'OK':
        pos = data['results'][0]['geometry']['location']
        geo = ",{lat},{lng}\n".format(lat=pos['lat'], lng=pos['lng'])
        w.write(line+geo)
    else:
        w.write(line+",,\n")
f.close()
w.close()
