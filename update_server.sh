#update index.html
#./generate_attribution > index.html

# update owl files:
for f in `find . -name "*.ttl" ` ; do FILE=$(echo $f | sed 's/.ttl$//'); rapper -i turtle -o rdfxml-abbrev $f >  $FILE".owl" ; done

#push any changes
git push server

# sync run
rsync -rav * nlp2rdf@www.uni-leipzig.de:/data/homewww/nlp2rdf/webdir/
