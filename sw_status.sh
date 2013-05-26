#!/bin/sh


doit () { 
  #rapper  http://persistence.uni-leipzig.org/nlp2rdf/ontologies/nif-core | grep vocab-status | grep $1 | rapper -I - - file -i ntriples -o turtle  -f 'xmlns:nif="http://persistence.uni-leipzig.org/nlp2rdf/ontologies/nif-core#"' -f  'xmlns:vs="http://www.w3.org/2003/06/sw-vocab-status/ns#"' --quiet | grep '^nif' 
  rapper  -i turtle ontologies/nif-core/version-1.0/nif-core.ttl | grep vocab-status | grep $1 | rapper -I - - file -i ntriples -o turtle  -f 'xmlns:nif="http://persistence.uni-leipzig.org/nlp2rdf/ontologies/nif-core#"' -f  'xmlns:vs="http://www.w3.org/2003/06/sw-vocab-status/ns#"' --quiet | grep '^nif' 

}

echo "########"
echo "# stable"
echo "########"
doit "\"stable"

echo "########"
echo "# testing"
echo "########"
doit "\"testing"

echo "########"
echo "# unstable"
echo "########"
doit "\"unstable"

echo "########"
echo "# deprecated"
echo "########"
doit "deprecated"

echo "########"
echo "# discouraged"
echo "########"
doit "\"discouraged"


