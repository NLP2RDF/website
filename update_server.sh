#push any changes
git push server

# sync run
rsync -rav * nlp2rdf@www.uni-leipzig.de:/data/homewww/nlp2rdf/webdir/
