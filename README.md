persistence.uni-leipzig.de
==========================

All ontologies used in NIF (nif-core + vocabulary modules )


## Note by SH, my personal workflow for these ontologies
I decided to put this here, as I find it quite practical.

1. I edit the ontologies in turtle syntax with the geany text editor, e.g. nif-core.ttl
   This allows me to make developers comments using "#"
2. When I am finished I use "rapper" to convert it to rdfxml to nif-core.owl
3. I am versioning the ontologies in a folder with the version number, e.g. version-1.0
   If somebody wants to find old ontologies, she can find them in the GitHub repository. 
   I assume this is not often the case, but it is nice to keep old versions
4. Then I use git push to push the changes to our server
5. The versions are switched and published by the .htaccess rules, e.g. 

	RewriteRule \.(owl|rdf|html|ttl|nt|txt|md)$ - [L]
	RewriteCond %{HTTP_ACCEPT} application/rdf\+xml
	RewriteRule ^nif-core$ /nlp2rdf/ontologies/nif-core/version-1.0/nif-core.owl [R=303,L]
	
	RewriteRule ^nif-core$ /nlp2rdf/ontologies/nif-core/version-1.0/nif-core.ttl [R=303,L]

