# sync run
rsync -rav index.html nlp2rdf@www.uni-leipzig.de:/data/homewww/nlp2rdf/webdir/index.html
rsync -rav resources.html nlp2rdf@www.uni-leipzig.de:/data/homewww/nlp2rdf/webdir/resources.html
rsync -rav documents/ nlp2rdf@www.uni-leipzig.de:/data/homewww/nlp2rdf/webdir/documents
rsync -rav examples/ nlp2rdf@www.uni-leipzig.de:/data/homewww/nlp2rdf/webdir/examples
rsync -rav page/ nlp2rdf@www.uni-leipzig.de:/data/homewww/nlp2rdf/webdir/page


curl http://persistence.uni-leipzig.org/nlp2rdf/ontologies/dev/misc/resources.ttl > /tmp/resources.ttl
curl --data-urlencode content@/tmp/resources.ttl http://rdf-translator.appspot.com/convert/n3/json-ld/content > /tmp/resources.json
if [ -s  /tmp/resources.json ]
then
  cp /tmp/resources.json resources.json
fi
rsync -rav resources.json nlp2rdf@www.uni-leipzig.de:/data/homewww/nlp2rdf/webdir/resources.json

#push any changes
#git push server


