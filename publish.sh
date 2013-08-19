# sync run
rsync -rav documents/ nlp2rdf@www.uni-leipzig.de:/data/homewww/nlp2rdf/webdir/documents
rsync -rav examples/ nlp2rdf@www.uni-leipzig.de:/data/homewww/nlp2rdf/webdir/examples
rsync -rav page/ nlp2rdf@www.uni-leipzig.de:/data/homewww/nlp2rdf/webdir/page

#push any changes
#git push server


