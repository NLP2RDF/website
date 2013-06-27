# update owl files:
for f in `find . -name "*.ttl"` ; do FILE=$(echo $f | sed 's/.ttl$//'); rapper -i turtle -c $f ; done

