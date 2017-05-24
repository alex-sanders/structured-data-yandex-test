<style>
.logo-header,#share{display:inline-block}
		.table>thead>tr>th,.table>thead>tr>td{
			border-top: none !important;
		}
		.table th,.table td {
			text-align: center;
			vertical-align: middle!important;
		}
		.text-align-left {
			text-align: left!important;
		}
		/*ul, ol {
			margin: 12px 0;
		}*/
		.text-danger {
			color: #F05422;
		}
		.text-warning {
			color: #F79021;
		}
		.text-success {
			color: #B6CD29/*#C5D939*/;
		}

		.input-group-addon {
			border-radius: 0px;
		}
		.loader {
			top: 185px;
		}
		#url_submit {
			width: 100%;
		}
		.alert {border-radius:0px}
		.alert-warning {
			color: #F05422;
			/*background-color: rgba(251,175,63,0.5);
			border-color: transparent;*/
		}
		.alert-info {
			color: #006AB6;
		}
		.CodeMirror {color:#333; border: 1px solid #c0c0c0;font-size: 10pt;height: 370px;}
		.CodeMirror pre {padding: 0 8px;}
		.CodeMirror-linenumber {padding: 0 3px 0 0px!important}
		.line-disallow {background: #F05422 !important;color: white !important;}
		.line-allow {background: #B6CD29 !important;color: white !important;}
		.note-gutter { width: 20px; background: #ccc;}
		.fa-gutter {margin: 2px 0 0 7px;}
		.fa-external-link {font-size: 10px;}
		.fa-ban,.fa-times-circle {color:#F05422;vertical-align:middle;}
		.fa-question-circle {color:#F79021;cursor:pointer;vertical-align:middle;}
		/*.fa-info-circle {color:#F79021;vertical-align:middle;}*/
		.fa-check, .fa-server, .fa-check-circle {color:#B6CD29;vertical-align:middle;}
		.fa-exclamation-triangle {color:#FBAF3F}
		.screenshot-icon {color:#006AB6}
		.pointer{cursor:pointer;}
		input[type=radio], input[type=checkbox] {
			margin: 1px 0 0;
			width: 18px;
			height: 18px;
		}
		table {
			font-size: 11px;
		}
		.brdr-left {
			border-left: 1px solid #ddd;
		}
		.url-td {
			max-width:220px;
			white-space: nowrap;
			overflow: hidden;
			text-overflow: ellipsis;
			/*max-width:280px;*/
			text-align: left!important;
		}
		.tooltip-inner {
			max-width: 500px;
		}
		.tooltip-inner{background-color:#1A2F59;max-width:500px;-webkit-border-radius:0px;-moz-border-radius:0px;border-radius:0px}
		.tooltip.top .tooltip-arrow{border-top:5px solid #1A2F59}

		.modal-dialog {
			background: #4a4a4a;
			-webkit-border-radius: 28px;
			border-radius: 28px;
			border: 1px solid #4a4a4a;
			margin: -335px auto;
			text-align: center;
			width: 360px;
			top: 50%;
		}
		.screenshot-mobile {
			height: 568.5px;
			margin: 50px 20px;
			overflow: hidden;
			position: relative;
		}
		.screenshot-img-container {
			height: 568.5px;
			width: 100%;
		}
		.screenshot-img-container img {
			position: absolute;
			width: 100%;
			height: auto;
			top: 0;
			left: 0;
			z-index: 1;
		}
		#loading {
			color:#fff;
			font-size:24px;
			text-align:center;
			padding:20px;
			background-color:rgba(26, 47, 89, 0.95);
			position:fixed;
			width:350px;
			top:50%;
			left:50%;
			margin-top:-37px;
			margin-left:-175px;
			z-index:999
		}
</style>

<!--php + navigation-->

<h1><i class="fa fa-mobile"></i>Structured Data Bulk Testing Tool</h1>
<p>Using Yandex's API, quickly check if your pages have any structured data issues.</p>
<hr>
<br>
<div id="loading" class="hide"><i class="fa fa-spinner fa-spin fa-nospace"></i>&nbsp;&nbsp;Completed tests: <span>0</span>/<span></span></div>

<div class="row">
	<div class="col-md-8">
		<label><i class="fa fa-hand-o-right"></i>URLs:</label>
		<textarea id="URLs" name="URLs" class="form-control" rows="1" placeholder="One per line | 50 URLs max." style="resize:vertical">https://www.technicalseo.com</textarea>
	</div>
	<div class="col-md-2">
		<label>&nbsp;</label><br>
		<button id="url_submit"  name="url_submit" type="submit" class="btn btn-light-blue"><i class="fa fa-play"></i>Run</button>
	</div>
	<div class="col-md-2">
		<label>&nbsp;</label><br>
		<button class="btn btn-red-orange disabled" style="width:100%;pointer-events:all;" onclick="tablesToExcel(['table1','table2'], ['Mobile-Friendly URLs','Not Mobile-Friendly URLs'], 'mobile-friendliness-report.xls', 'Excel')"><i class="fa fa-file-excel-o"></i>.CSV</button>
	</div>
</div>
<br>
<!--<pre></pre>-->
<table id="table0" class="table hide" style="border-collapse:collapse;">
	<thead>
		<tr>
			<th>URL</th>
			<th>Test Status</th>
			<th>Mobile-Friendly?</th>
			<th>Screenshot</th>
		</tr>
	</thead>
	<tbody id="maintable">
	</tbody>
</table>

<div class="hide">
	<!--mobileFriendlyURLs-->
	<table id="table1">
		<thead><tr><th>URL</th></tr></thead>
		<tbody id="mobileFriendlyURLsTable">
		</tbody>
	</table>
	<!--NotMobileFriendlyURLs-->
	<table id="table2">
		<thead>
			<tr>
				<th>URL</th>
				<th>Uses incompatible plugins</th>
				<th>Configure viewport</th>
				<th>Size content to viewport</th>
				<th>Use legible font sizes</th>
				<th>Tap targets too close</th>
			</tr>
		</thead>
		<tbody id="NotMobileFriendlyURLsTable">
		</tbody>
	</table>
</div>
<br>
<hr>
<div id="test_div_json">
<!--JSON-LD ERRORS go here-->
</div>
<div id="test_div_microdata">
<!--Microdata ERRORS go here-->
</div>
<div id="test_div_rdfa">
<!--RDFa ERRORS go here-->
</div>
<div id="test_div_microformat">
<!--Microformat ERRORS go here-->
</div>
<!-- //COMMENTS
<div id="disqus_thread"></div>
<script>disqus();setCurrent()</script> -->

<!--outputting excel -->
<script src="/resources/tools/table-excel.js"></script>
<script type="text/javascript">

window.onload = function(){
 console.log("Window Loaded");
 ajax_loading = false;
	 $("#url_submit").click(function(){
		 console.log('clicked');
		 if(!ajax_loading) {
	 	 			ajax_loading = true;
	 				Array.prototype.unique = function() {
		 			return this.filter(function (value, index, self) {
		 			return self.indexOf(value) === index;
		 });
	 }
	 var URLs = $('#URLs').val().split('\n').filter(Boolean).unique().slice(0, 50); //split by line break, remove empty lines, removing duplicates (.unique), limits 50 urls

	 $("#table0").addClass("hide"); //jquery styling
	 $("#maintable").html("");
	 $("#mobileFriendlyURLsTable").html("");
	 $("#NotMobileFriendlyURLsTable").html("");
	 $('.modal').remove();
	 $(".btn-red-orange").removeClass("disabled");
	 $("#loading span:nth-child(2)").text("0");
	 $("#loading span:nth-child(3)").text(URLs.length);
	 $("#loading").removeClass('hide');

	 console.log("URLS: ", URLs);
	 for (var i = 0, len = URLs.length; i < len; i++) {
		 (function(i) {
			 setTimeout(function() {
				 console.log("Sending Request: ", URLs[i]);
				 $.ajax({
					 url: '/seo-tools/mobile-friendly/api_script.php',
					 type: 'POST',
					 cache: false,
					 data: {url: URLs[i]}, //figure out
					 success: function(data) {
						 console.log("Data from ajax", data);
						 ajax_loading = false;
						 var currentDigit = $("#loading span:nth-child(2)").text(); //loading wheel
						 var newDigit = parseInt(currentDigit) + 1;
						 $("#loading span:nth-child(2)").text(newDigit);
						 var JSONdata = JSON.stringify(data);
						 //$("pre").text(JSONdata);
						 var results = JSON && JSON.parse(JSONdata) || $.parseJSON(JSONdata);
						 var url_id = URLs[i];

						 if (false) {
							 var testStatus = results.error.message;
							 var structuredDataAllGood_icon = 'N/A'; //To Do: give image value!
						 }

						 //if the API responds with a 200 status code, then go through results
						 else if (true) {

							 var url_id = results.id;
							 var testStatus = 'Completed';

							 //what are the errors
							 var structuredDataIssues = [];

							 //declare an error message array/  JSON_encode
							 var errorMessages = [];
							 $.each(results.data, function(key, value){
								 console.log("Key: ", key , " Value: ", value);
								 if(key == 'json-ld') {
								 var JsonLd = value;
							 } else if (key == 'microdata') {
								 var Microdata = value;
							 }
							 });


							 console.log("Actual Data", results.data["json-ld"]);
							 console.log("Actual Data", results.data["microdata"]);

//json-ld errors
							 if(results.data["json-ld"] != "") {
								 var ErrorCountjson = 0;
								 var ErrorMessagesjson = "";
										 $.each(results.data["json-ld"], function (key, value){
											 console.log('JSON-LD, KEY: ', key, ' value: ', value);
											 var hasErrorjson = false;
											 if(value['#error'] != undefined) {
												 console.log(value, ' has error');
												 var ErrorJson  = value['#error'];
												 $.each(ErrorJson, function(ErrorMessageKeyjson, ErrorMessageValjson){
													 	 if(ErrorMessageValjson['#location'] != "-1:-1") {
															 	ErrorCountjson ++;
													 			ErrorMessagesjson += '<p>' + ErrorMessageValjson['#message'] + "<br>" + '&nbsp;&nbsp;&nbsp;Found within HTML here: ' + ErrorMessageValjson['#location'] + '</p>';
														}
													 console.log("Errors: ", ErrorCountjson);
													 console.log("Messages: ", ErrorMessagesjson);
												 });
											 }
										 });
										 if(ErrorCountjson > 0){
											 $('#test_div_json').html('<h2><i class="fa fa-times-circle" aria-hidden="true"></i> JSON-LD Errors: ' + ErrorCountjson + '</h2>\n' + ErrorMessagesjson);
										 } else {
											 $('#test_div_json').html('<h2><i class="fa fa-check-circle" aria-hidden="true"></i>JSON-LD Errors: 0</h2><br><p>You don\'t have any JSON-LD errors</p>'); //not sure if this works
										 }
								 } else {
									 console.log("There is no JSON-LD structured data");
									 $('#test_div_json').html('<p>You don\'t have any JSON-LD</p>'); //not sure if this works
}
//Microdata errors
							 if(results.data["microdata"] != "") {
								 var ErrorCountMicrodata = 0;
								 var ErrorMessagesMicrodata = "";
										 $.each(results.data["microdata"], function (key, value){
											 console.log('Microdata, KEY: ', key, ' value: ', value);
											 var hasErrorMicrodata = false;
											 if(value['#error'] != undefined) {
												 console.log(value, ' has error');
												 var ErrorMicrodata  = value['#error'];
												 $.each(ErrorMicrodata, function(ErrorMessageKeyMicrodata, ErrorMessageValMicrodata){
														 if(ErrorMessageValMicrodata['#location'] != "-1:-1") {
																ErrorCountMicrodata ++;
																ErrorMessagesMicrodata += '<p>' + ErrorMessageValMicrodata['#message'] + "<br>" + '&nbsp;&nbsp;&nbsp;Found within HTML here: ' + ErrorMessageValMicrodata['#location'] + '</p>';
														}
													 console.log("Errors: ", ErrorCountMicrodata);
													 console.log("Messages: ", ErrorMessagesMicrodata);
												 });
											 }
										 });
										 if(ErrorCountMicrodata > 0){
											 $('#test_div_Microdata').html('<h2><i class="fa fa-times-circle" aria-hidden="true"></i> Microdata Errors: ' + ErrorCountMicrodata + '</h2>\n' + ErrorMessagesMicrodata);
										 } else {
											 $('#test_div_Microdata').html('<h2><i class="fa fa-check-circle" aria-hidden="true"></i>Microdata Errors: 0</h2><br><p>You don\'t have any Microdata errors</p>'); //not sure if this works
										 }
								 } else {
									 console.log("There is no Microdata structured data");
									 $('#test_div_microdata').html('<h2><i class="fa fa-meh-o" aria-hidden="true"></i>Microdata: N/A</h2><p>You don\'t have any Microdata</p>'); //not sure if this works
								 	}

//Microformat errors
															 if(results.data["microformat"] != "") {
																	 var ErrorCountMicroformat = 0;
																	 var ErrorMessagesMicroformat = "";
																			 $.each(results.data["microformat"], function (key, value){
																				 console.log('Microformat, KEY: ', key, ' value: ', value);
																				 var hasErrorMicroformat = false;
																				 if(value['#error'] != undefined) {
																					 console.log(value, ' has error');
																					 var ErrorMicroformat  = value['#error'];
																					 $.each(ErrorMicroformat, function(ErrorMessageKeyMicroformat, ErrorMessageValMicroformat){
																							 if(ErrorMessageValMicroformat['#location'] != "-1:-1") {
																									ErrorCountMicroformat ++;
																									ErrorMessagesMicroformat += '<p>' + ErrorMessageValMicroformat['#message'] + "<br>" + '&nbsp;&nbsp;&nbsp;Found within HTML here: ' + ErrorMessageValMicroformat['#location'] + '</p>';
																							}
																						 console.log("Errors: ", ErrorCountMicroformat);
																						 console.log("Messages: ", ErrorMessagesMicroformat);
																					 });
																				 }
																			 });
																			 if(ErrorCountMicroformat > 0){
																				 $('#test_div_Microformat').html('<h2><i class="fa fa-times-circle" aria-hidden="true"></i> Microformat Errors: ' + ErrorCountMicroformat + '</h2>\n' + ErrorMessagesMicroformat);
																			 } else {
																				 $('#test_div_Microformat').html('<h2><i class="fa fa-check-circle" aria-hidden="true"></i>Microformat Errors: 0</h2><br><p>You don\'t have any Microformat errors</p>'); //not sure if this works
																			 }
																	 } else {
																		 console.log("There is no Microformat structured data");
																		 $('#test_div_microformat').html('<h2><i class="fa fa-meh-o" aria-hidden="true"></i>Microformat: N/A</h2><p>You don\'t have any Microformat</p>'); //not sure if this works
																	 	}

																		//rdfa errors
																									 if(results.data["rdfa"] != "") {
																										 var ErrorCountRdfa = 0;
																										 var ErrorMessagesRdfa = "";
																												 $.each(results.data["rdfa"], function (key, value){
																													 console.log('rdfa, KEY: ', key, ' value: ', value);
																													 var hasErrorRdfa = false;
																													 if(value['#error'] != undefined) {
																														 console.log(value, ' has error');
																														 var ErrorRdfa  = value['#error'];
																														 $.each(ErrorRdfa, function(ErrorMessageKeyRdfa, ErrorMessageValRdfa){
																																 if(ErrorMessageValRdfa['#location'] != "-1:-1") {
																																		ErrorCountRdfa ++;
																																		ErrorMessagesRdfa += '<p>' + ErrorMessageValRdfa['#message'] + "<br>" + '&nbsp;&nbsp;&nbsp;Found within HTML here: ' + ErrorMessageValRdfa['#location'] + '</p>';
																																}
																															 console.log("Errors: ", ErrorCountRdfa);
																															 console.log("Messages: ", ErrorMessagesRdfa);
																														 });
																													 }
																												 });
																												 if(ErrorCountRdfa > 0){
																													 $('#test_div_rdfa').html('<h2><i class="fa fa-times-circle" aria-hidden="true"></i> RDFa Errors: ' + ErrorCountRdfa + '</h2>\n' + ErrorMessagesRdfa);
																												 } else {
																													 $('#test_div_rdfa').html('<h2><i class="fa fa-check-circle" aria-hidden="true"></i>RDFa Errors: 0</h2><br><p>You don\'t have any RDFa errors</p>'); //not sure if this works
																												 }
																										 } else {
																											 console.log("There is no rdfa structured data");
																											 $('#test_div_rdfa').html('<h2><i class="fa fa-meh-o" aria-hidden="true"></i>RDFa: N/A</h2><p>You don\'t have any RDFa</p>'); //not sure if this works
																										 	}

									 //array -
									 $.each(errorMessages, function (){
									 console.log("Error: " + value);
								 });
								 }

					 } // success data function
					 ,
					 error: function(errorData)
					 {
					 $('#test_div').html(errorData.responseText);
						 console.log("Error,", errorData);
					 }
				 }); // jquery AJAX call http://api.jquery.com/jquery.ajax/
			 }, 500*i); //timeout
		 })(i); // IIFE - immediately invoked function expression
	 } //for all URLs added within the box
 }});//click function
} //document ready function
</script>
