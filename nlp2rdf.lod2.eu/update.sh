#!/bin/sh
cd ~/nlp2rdf_ontologies
hg pull -u 
cd /var/www/nlp2rdf.lod2.eu
rm -r schema 
cp -rv ~/nlp2rdf_ontologies/core/generated/src/main/resources/eu/lod2/nlp2rdf/schema schema 
mv -v schema/.htaccess .
