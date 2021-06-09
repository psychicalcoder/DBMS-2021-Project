
from PIL import Image, ImageDraw
import sys

im01 = Image.open('reddot.png')
newImage = []
for item in im01.getdata():
    if item[:] == (255, 0, 0, 255) or item[:] == (255, 12, 12, 255) :
       newImage.append((255, 43, 226, 255))
    else:
       newImage.append(item)
im01.putdata(newImage)
im01.show()
im01.save('dot3.png')

