/*------------------------------------------------------------------------------------------*/
/*---            FUNCTION TO CHECK ALL / UNCHECK ALL CHECKBOXES                         ----*/
/*------------------------------------------------------------------------------------------*/

function Chkstatus(FormName, FieldtoCheck ,FieldtoChange ){ 
 if(document.forms[FormName].elements[FieldtoCheck].checked == true){
	SetAllCheckBoxes(FormName, FieldtoChange, true);
 }else{
	 SetAllCheckBoxes(FormName, FieldtoChange, false);
 }
	
}

function SetAllCheckBoxes(FormName, FieldName, CheckValue){
	if(!document.forms[FormName]){
		return;
	}
	var objCheckBoxes = document.forms[FormName].elements[FieldName];
	if(!objCheckBoxes){
		return;
	}
	var countCheckBoxes = objCheckBoxes.length;
	if(!countCheckBoxes){
		objCheckBoxes.checked = CheckValue;
	}else{
		// set the check value for all check boxes
		for(var i = 0; i < countCheckBoxes; i++)
			objCheckBoxes[i].checked = CheckValue;
	}
}




/*------------------------------------------------------------------------------------------*/
/*---                  ADD ADDITIONAL FORM ELEMENT DYNAMICALLY                          ----*/
/*------------------------------------------------------------------------------------------*/

var counterText = 0;
var counterRadioButton = 0;
var counterCheckBox = 0;
var counterTextArea = 0;
function addAllInputs(divName, inputType, cssclass, name, label){
     var newdiv = document.createElement('div');
     switch(inputType) {
          case 'text':
               newdiv.innerHTML = "<p><input cssclass='"+cssclass+"' type='text' name='"+name+"'></p>";
               counterText++;
               break;
          case 'radio':
               newdiv.innerHTML = "Entry " + (counterRadioButton + 1) + " <br><input type='radio' name='myRadioButtons[]'>";
               counterRadioButton++;
               break;
          case 'checkbox':
               newdiv.innerHTML = "Entry " + (counterCheckBox + 1) + " <br><input type='checkbox' name='myCheckBoxes[]'>";
               counterCheckBox++;
               break;
          case 'textarea':
	       newdiv.innerHTML = "Entry " + (counterTextArea + 1) + " <br><textarea name='myTextAreas[]'>type here...</textarea>";
               counterTextArea++;
               break;
          }
     document.getElementById(divName).appendChild(newdiv);
}




/*------------------------------------------------------------------------------------------*/
/*---                  JAVASCRIPT COSE TO ENCODE IN BASE64	                            ----*/
/*------------------------------------------------------------------------------------------*/

var Base64 = {

	// private property
	_keyStr : "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",

	// public method for encoding
	encode : function (input) {
		var output = "";
		var chr1, chr2, chr3, enc1, enc2, enc3, enc4;
		var i = 0;

		input = Base64._utf8_encode(input);

		while (i < input.length) {

			chr1 = input.charCodeAt(i++);
			chr2 = input.charCodeAt(i++);
			chr3 = input.charCodeAt(i++);

			enc1 = chr1 >> 2;
			enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
			enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
			enc4 = chr3 & 63;

			if (isNaN(chr2)) {
				enc3 = enc4 = 64;
			} else if (isNaN(chr3)) {
				enc4 = 64;
			}

			output = output +
			this._keyStr.charAt(enc1) + this._keyStr.charAt(enc2) +
			this._keyStr.charAt(enc3) + this._keyStr.charAt(enc4);

		}

		return output;
	},

	// public method for decoding
	decode : function (input) {
		var output = "";
		var chr1, chr2, chr3;
		var enc1, enc2, enc3, enc4;
		var i = 0;

		input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");

		while (i < input.length) {

			enc1 = this._keyStr.indexOf(input.charAt(i++));
			enc2 = this._keyStr.indexOf(input.charAt(i++));
			enc3 = this._keyStr.indexOf(input.charAt(i++));
			enc4 = this._keyStr.indexOf(input.charAt(i++));

			chr1 = (enc1 << 2) | (enc2 >> 4);
			chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
			chr3 = ((enc3 & 3) << 6) | enc4;

			output = output + String.fromCharCode(chr1);

			if (enc3 != 64) {
				output = output + String.fromCharCode(chr2);
			}
			if (enc4 != 64) {
				output = output + String.fromCharCode(chr3);
			}

		}

		output = Base64._utf8_decode(output);

		return output;

	},

	// private method for UTF-8 encoding
	_utf8_encode : function (string) {
		string = string.replace(/\r\n/g,"\n");
		var utftext = "";

		for (var n = 0; n < string.length; n++) {

			var c = string.charCodeAt(n);

			if (c < 128) {
				utftext += String.fromCharCode(c);
			}
			else if((c > 127) && (c < 2048)) {
				utftext += String.fromCharCode((c >> 6) | 192);
				utftext += String.fromCharCode((c & 63) | 128);
			}
			else {
				utftext += String.fromCharCode((c >> 12) | 224);
				utftext += String.fromCharCode(((c >> 6) & 63) | 128);
				utftext += String.fromCharCode((c & 63) | 128);
			}

		}

		return utftext;
	},

	// private method for UTF-8 decoding
	_utf8_decode : function (utftext) {
		var string = "";
		var i = 0;
		var c = c1 = c2 = 0;

		while ( i < utftext.length ) {

			c = utftext.charCodeAt(i);

			if (c < 128) {
				string += String.fromCharCode(c);
				i++;
			}
			else if((c > 191) && (c < 224)) {
				c2 = utftext.charCodeAt(i+1);
				string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
				i += 2;
			}
			else {
				c2 = utftext.charCodeAt(i+1);
				c3 = utftext.charCodeAt(i+2);
				string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
				i += 3;
			}

		}

		return string;
	}
}



/*-----------------------------------------------------------------------------------------------*/
/*        FUNCTIOS USED IN THE EDIT SECTION TO MANAGE MULTI-LANGUAGE ( HOW TO REDIRECTS )        */
/*-----------------------------------------------------------------------------------------------*/

function redirect(baseurl,page,act,id,lid){ 
		window.location=baseurl+"home.php?page="+page+"&act="+act+"&id="+Base64.encode(id)+"&lid="+Base64.encode(lid)+"";
}
function redirect2(baseurl,page,act,id,pid,lid){ 
		window.location=baseurl+"home.php?page="+page+"&act="+act+"&id="+Base64.encode(id)+"&pid="+Base64.encode(pid)+"&lid="+Base64.encode(lid)+"";
}

function redirect2gallery(baseurl,page,act,id,dc_id,lid){ 
		window.location=baseurl+"home.php?page="+page+"&act="+act+"&id="+Base64.encode(id)+"&lid="+Base64.encode(lid)+"";
}

function redirect2staff(baseurl,page,act,id,dc_id,lid){ 
		window.location=baseurl+"home.php?page="+page+"&act="+act+"&id="+Base64.encode(id)+"&dc_id="+Base64.encode(dc_id)+"&lid="+Base64.encode(lid)+"";
}

function redirect2services(baseurl,page,act,id,type,lid){ 
        window.location=baseurl+"home.php?page="+page+"&act="+act+"&id="+Base64.encode(id)+"&lid="+Base64.encode(lid)+"&type="+Base64.encode(type)+"";
}

function redirect2content(baseurl,page,id,type,lid){ 
		window.location=baseurl+"home.php?page="+page+"&id="+Base64.encode(id)+"&lid="+Base64.encode(lid)+"&type="+Base64.encode(type)+"";
}

function simpleredirect(baseurl,page,act){ 
		window.location=baseurl+"home.php?page="+page+"&act="+act+"";
}
function redirect2content(baseurl,page,id,lid){ 
		window.location=baseurl+"home.php?page="+page+"&id="+Base64.encode(id)+"&lid="+Base64.encode(lid)+"";
}




/*------------------------------------------------------------------------------------------*/
/*---         ACCORDIAN SCRIPT INITILIZE WHEN ADMIN PAGE IS LOADED	                    ----*/
/*------------------------------------------------------------------------------------------*/
	<!-- Accordian Script -->

	ddaccordion.init({
		headerclass: "nav-top-item", //Shared CSS class name of headers group
		contentclass: "submenu", //Shared CSS class name of contents group
		revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click" or "mouseover
		mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
		collapseprev: true, //Collapse previous content (so only one open at any time)? true/false
		defaultexpanded: [0], //index of content(s) open by default [index1, index2, etc] [] denotes no content
		onemustopen: true, //Specify whether at least one header should be open always (so never all headers closed)
		animatedefault: false, //Should contents open by default be animated into view?
		persiststate: true, //persist state of opened contents within browser session?
		toggleclass: ["", "current"], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
		togglehtml: ["", "", ""], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
		animatespeed: "slow", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
		oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
			//do nothing
		},
		onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed	//do nothing
		}
	})

function gettype(type){
	window.location="home.php?page=sendnewsletter&type="+type+"";
}
