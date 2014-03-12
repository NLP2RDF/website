$(function() {
	//onload
	colors={ontology:'#d1ebbc', specification:'#8fc7e4', wikipage: '#d9ddfc',poster: '#d9ddfc', software: '#e7eb9f', demo: '#00E6FF' ,corpus: '#FFDE00' };
	//order={ontology, specification, wikipage, software };
	createCategories('#NIF_resources','resources.json',colors);

});
function createCategories(container,input_file,colors){
	var moreinfo='';
	var rows='';
	$(container).html('<ul class="list-group"></ul>');
	$(container).prepend('<a href="#all" onclick="showAllCategories()">Expand all</a> | <a href="#none" onclick="hideAllCategories()">Collapse all</a>');
	$.getJSON(input_file, function(data) {
		var graph=data['@graph'];
		sortJsonArrayByProperty(graph, 'http://persistence.uni-leipzig.org/nlp2rdf/ontologies/dev/misc/resources.ttl#type');
		$.each(graph, function(key, val) {
			rows='';
			link=val['@id'];
			label=val['http://www.w3.org/2000/01/rdf-schema#label']['@value'];
			type=val['http://persistence.uni-leipzig.org/nlp2rdf/ontologies/dev/misc/resources.ttl#type'];
			desc=val['http://persistence.uni-leipzig.org/nlp2rdf/ontologies/dev/misc/resources.ttl#description'];
			example=val['http://persistence.uni-leipzig.org/nlp2rdf/ontologies/dev/misc/resources.ttl#example'];
			prefix=val['http://persistence.uni-leipzig.org/nlp2rdf/ontologies/dev/misc/resources.ttl#prefix'];
			revisions=val['http://persistence.uni-leipzig.org/nlp2rdf/ontologies/dev/misc/resources.ttl#revisions'];
			status=val['http://persistence.uni-leipzig.org/nlp2rdf/ontologies/dev/misc/resources.ttl#status'];
			versioningLevel=val['http://persistence.uni-leipzig.org/nlp2rdf/ontologies/dev/misc/resources.ttl#versioningLevel'];
			versioningMethod=val['http://persistence.uni-leipzig.org/nlp2rdf/ontologies/dev/misc/resources.ttl#versioningMethod'];
			highlight=val['http://persistence.uni-leipzig.org/nlp2rdf/ontologies/dev/misc/resources.ttl#highlight'];
			
			if(desc) {
				rows=rows+'<tr><td class="text-info">Description</td><td>'+desc+'</td></tr>';
				}
			
			if(example) {
				rows=rows+'<tr><td class="text-info">Example</td><td class="text-warning">'+example+'</td></tr>';
				}
			
			if(prefix) {
				rows=rows+'<tr><td class="text-info">Prefix</td><td>'+prefix+'</td></tr>';
				}
			
			if(revisions) {
				rows=rows+'<tr><td class="text-info">Revisions</td><td>'+revisions+'</td></tr>';
				}
			
			if(status) {
				rows=rows+'<tr><td class="text-info">Status</td><td><span class="badge">'+status+'</span></td></tr>';
				}
			
			if(versioningLevel) {
				rows=rows+'<tr><td class="text-info">Versioning Level</td><td>'+versioningLevel+'</td></tr>';
				}
			
			if(versioningMethod) {
				rows=rows+'<tr><td class="text-info">Versioning Method</td><td>'+versioningMethod+'</td></tr>';
				}
			if(highlight){
				label = '<b>'+label+' ( ★ important) </b>';
				}	
				
			moreinfo='<div style="border-radius: 3px 3px 3px 3px;border: 1px solid black;margin: 10px 5px 5px 5px;background-color:#FFF;display:none;" class="item-desc"><table class="table table-striped table-hover table-condensed">'+rows+'</table></div>';
			
			colorbar = '<li onclick="showCategory(this)" style="margin-top:5px;border-radius: 3px 3px 3px 3px;border: 1px solid black;cursor:pointer;background-color:'+colors[type]+'" class="list-group-item">'+'<span class="badge" style="color: black;border: 1px solid #999;background-color: transparent;">'+type+'   <a href="'+link+'" target="_blank">URI</a></span>'+label+moreinfo+'</li>';
				
			$(container+' .list-group').append(colorbar);
		});
	});
}
function showCategory(e){
	if($(e).find('.item-desc').is(":visible") ){
		$(e).find('.item-desc').hide();
	}else{
		$(e).find('.item-desc').show();
	}
}
function showAllCategories(){
	$('.item-desc').show();
}
function hideAllCategories(){
	$('.item-desc').hide();
}

function sortJsonArrayByProperty(objArray, prop, direction){
    if (arguments.length<2) throw new Error("sortJsonArrayByProp requires 2 arguments");
    var direct = arguments.length>2 ? arguments[2] : 1; //Default to ascending

    if (objArray && objArray.constructor===Array){
        var propPath = (prop.constructor===Array) ? prop : prop.split("|");
        objArray.sort(function(a,b){
            for (var p in propPath){
                if (a[propPath[p]] && b[propPath[p]]){
                    a = a[propPath[p]];
                    b = b[propPath[p]];
                }
            }
            // convert numeric strings to integers
            a = a.match(/^\d+$/) ? +a : a;
            b = b.match(/^\d+$/) ? +b : b;
            return ( (a < b) ? -1*direct : ((a > b) ? 1*direct : 0) );
        });
    }
}


