var responseMessages = [ "request not initialized","server connection established","request received","processing request","request finished and response is ready" ];
var urlsForThings = { "noun":"noun","pluralnoun":"noun/plural","adjective":"adjective","adjectivemore":"adjective/more","verb":"verb","presentcontinuousverb":"verb/present","titleFormat":"titleFormat" };

function getJSON(thingToGet, elementID, signal) {
	if (typeof(signal)==='undefined') signal = false;
        var xmlhttp = new XMLHttpRequest();
        var jsonurl = "/get/";
	var result = "";

        xmlhttp.open("GET", jsonurl + urlsForThings[thingToGet] + "?" +  Math.random().toString().split("\.")[1] );
        xmlhttp.send();

        xmlhttp.onreadystatechange = function() {
                var xmlhttpresult = "Current JSON request status: " + responseMessages[xmlhttp.readyState];
                if (xmlhttp.readyState == 4) {
                        if (xmlhttp.status == 200) {
				// Success!!!
				result = JSON.parse(xmlhttp.responseText).string;
				console.log(elementID + " returned " + result);
				document.getElementById(elementID).innerHTML = result;
				console.log("set " + elementID + " to " + document.getElementById(elementID).innerHTML);
				if ( signal ) {
					titleSet();
				}
                        } else { 
				// Failure!!!
                                xmlhttpresult += " with http status: " + xmlhttp.status;
                        }
                } else {
			// Not done yet
			//console.log("request result: " + xmlhttpresult);
                }
        }
}

function setTitleFormat() {
	getJSON("titleFormat","conferencetitle",true);
}

function setTitleValue(itemID) {
	var itemType = itemID.replace( /\d+$/, '' );
	//console.log("itemID: " + itemID + ", itemType: " + itemType);
	getJSON(itemType, itemID);
}

function fillInTitleBits() {
	var titleChildren = document.getElementById("conferencetitle").children;	
	console.log("found " + titleChildren.length + " child nodes.");
	for (i = 0; i < titleChildren.length; i++) {
		console.log("doing: " + titleChildren[i].id);
		setTitleValue(titleChildren[i].id);
	}
}

function titleSet() {
	fillInTitleBits();
}

setTitleFormat();
