from re import *
fh=open("mish")
lines=fh.readlines()
fh.close()
l=[]
for i in findall(r"\$([A-Z_]+)","".join(lines)):
	l.append(i)
s=set(l)
for i in s:
	print('"' + i+'"'+':')
