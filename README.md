persistence.uni-leipzig.de
==========================

All ontologies used in NIF (nif-core + vocabulary modules )


## Note the workflow for these ontologies
I decided to put this here, as I find it quite practical. 
### \# vs /

When you publish ontologies without data, you can use '#' . However, if you want to query instances via Linked Data in a database, you have to use '/' as DBpedia does for classes: http://dbpedia.org/ontology/PopulatedPlace
 
### Workflow
1. I edit the ontologies in turtle syntax with the Geany text editor (or a Turtle editor http://blog.aksw.org/2013/xturtle-turtle-editing-the-eclipse-way ),
   This allows me to make developers comments using "#" directly in the source, see e.g. nlp2rdf/ontologies/nif-core.ttl
2. When I am finished I use rapper (http://librdf.org/raptor/rapper.html) to convert it to rdfxml ( nlp2rdf/ontologies/nif-core.owl )
3. I am versioning the ontologies in a folder with the version number, e.g. version-1.0
   If somebody wants to find old ontologies, she can find them in the GitHub repository, which is linked from the ontology.
   I assume this is not often required, but it is nice to keep old versions.
   The old versions should be linked to in the comment of the ontology.
4. Then I use git push to push the changes to our server
5. (not yet) I use a simple OWL2HTML generator, e.g. https://github.com/specgen/specgen
6. The versions are switched and published by these .htaccess rules, e.g. 

	RewriteRule \.(owl|rdf|html|ttl|nt|txt|md)$ - [L]
	
	# (in progress) RewriteCond %{HTTP_ACCEPT} text/html
	# (in progress) RewriteRule ^nif-core$ /nlp2rdf/ontologies/nif-core/version-1.0/nif-core.html [R=303,L]
	
	RewriteCond %{HTTP_ACCEPT} application/rdf\+xml
	RewriteRule ^nif-core$ /nlp2rdf/ontologies/nif-core/version-1.0/nif-core.owl [R=303,L]
	
	RewriteRule ^nif-core$ /nlp2rdf/ontologies/nif-core/version-1.0/nif-core.ttl [R=303,L]
7. last step add yourself to http://prefix.cc, see e.g. http://prefix.cc/nif
