#!/bin/sh
curl https://en.wikipedia.org/wiki/Arachnophobia > Arachnophobia.html
curl https://en.wikipedia.org/wiki/Alcoholism > Alcoholism.html

pandoc -f html -t plain Arachnophobia.html > Arachnophobia.txt
pandoc -f html -t plain Alcoholism.html > Alcoholism.txt

for i in `ls` ; do VAR="#"`wc -m $i` ; echo $VAR ;done


for i in `ls` 
do 
	VAR=`wc -m $i | cut -f1 -d ' '` 
	echo "" 
	echo "# $VAR $i" 
	echo "#char=0,$VAR" 
	echo "nif:beginIndex \"0\"" 
	echo "nif:endIndex \"$VAR\"" 
done
