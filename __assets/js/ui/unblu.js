(function(){
	var p = {};	
	
	p._c_name = "unblu-injection-required";
	
	p._unblu_injection_reguired = function(){
	
		var _ARRcookies = document.cookie.split(";");
		var len = _ARRcookies.length;
		for ( var i=0 ; i < len ; i++){
			var name = _ARRcookies[i].substr(0,_ARRcookies[i].indexOf("="));
			name = name.replace(/^\s+|\s+$/g,"");
			if ( name == p._c_name ){
				return true;					
			}
		}		
		return false;
	};
			
	if(!p._unblu_injection_reguired() ){
		return;
	}
	
	/* unblu snippet V3.2.20120614 */
	unblu = {APIKEY: "MZsy5sFESYqU7MawXZgR_w"};
	(function() {
		unblu.c = [];
		unblu.registerApiConsumer = function(callback, apiNames) {
			unblu.c.push({a: apiNames, c: callback});
		}	
		unblu.setLocale = function(locale) {
			unblu.l = locale;
		}
		function h(a, b, c) {
			if (a.addEventListener) a.addEventListener(b, c, false);
			else if (a.attachEvent) a.attachEvent("on" + b, c, true);
		}
		h(window, "DOMContentLoaded", function() {window["x-unblu-tmp-dom-ready"] = true;}, false);
		h(window, "load", function() {window["x-unblu-tmp-window-alive"] = true;});
		if (!window["x-unblu-tmp-window-name"]) window["x-unblu-tmp-window-name"]=window.name;
		var q = document.getElementsByTagName("script")[0];
		if (q) {
			var g = document.createElement("script"); 
			g.setAttribute("src", "https://assist.barclays.co.uk/unblu/starter.js");
			g.setAttribute("type", "text/javascript"); 
			g.setAttribute("defer","defer");
			q.parentNode.appendChild(g);
			h(g, "load", function() {}); 
			h(g, "error", function() {});
		}
	})();

	(function( win ) {

		var defaults = {        		
			APISET: ["core.session"],		
			logEnabled : false,
			logPrefix : "unblu: ",
			c_name : p._c_name,
			cd_name: ";domain=.barclays.co.uk"
		};	
		
		var unbluNotAvailable = function(reason){
			var out = "Unblu not available";
			if (reason) {
				out += ". Reason: " + reason;
			}
			
			logger(out);
		};
		
		var unbluAbortSessionHandler = function(){
			removeCookie();
			logger("Session has been aborted");		
		};
			
		var unbluTerminateSessionHandler= function(){
			removeCookie();
			logger("Session has been terminated");		
		};
		
		var unbluNotActiveSessionHandler = function(){
			removeCookie();
			logger('session NOT active!');										
		};
			
		var unbluActiveSessionHandler= function(){		
			logger('session active!');
		};
		
		var removeCookie = function(){		
			document.cookie = defaults.c_name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT" + defaults.cd_name + defaults.c_path;
		}		
		   
		var logger= function( msg ) {
			if ( defaults.logEnabled && win.console && win.console.log ) {
				win.console.log( defaults.logPrefix + msg );
			}
		};		
		
		unblu.registerApiConsumer(function(api){
			if(api.fatalError !== undefined || window.unblu === undefined){
				logger("browser not supported or api not available" );
				return;
			}
			
			api.core.session.Session.getInstance().isCoBrowsingAvailable({

				"onSuccess": function(result) {
					if (result) {					
						unblu.api = api;							
						var session = api.core.session.Session.getInstance();
						session.addSessionTerminatedListener(unbluTerminateSessionHandler);
						session.addSessionAbortedListener(unbluAbortSessionHandler);							
						unblu.api.core.session.Session.getInstance().isSessionActive({
						
							"onSuccess": function(sessionActive) {
								if (sessionActive) {																	
									unbluActiveSessionHandler();
								} else {									
									unbluNotActiveSessionHandler();
								}
							},
							"onFailure": function(error) {
								unbluNotActiveSessionHandler();							
								logger('error: ' + error);
							}
						});
					} else {
						unbluNotAvailable();
					}	
				},
				"onFailure": function(reason) {	
					unbluNotAvailable(reason.message);
				}
			});
		}, defaults.APISET);	
	})( window ); 	
})();