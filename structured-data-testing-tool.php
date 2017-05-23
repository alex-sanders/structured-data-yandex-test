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

<?php include $_SERVER['DOCUMENT_ROOT']."/seo-tools/nav.html" ?>

		<ol class="nav navbar-nav navbar-right desktop breadcrumb-custom">
			<li class="yah"><i class="fa fa-map-marker"></i><i>You are here:</i></li>
			<li><a href="/"><i class="fa fa-home"></i>Home</a></li>
			<li><a href="/seo-tools/"><i class="fa fa-wrench"></i>SEO Tools</a></li>
			<li class="current"><a href="/seo-tools/mobile-friendly/" class="animated bounceIn"><i class="fa fa-mobile"></i>Mobile-Friendly Bulk Testing Tool</a></li>
		</ol>

	  </div>
	</div>
</div>

<h1><i class="fa fa-mobile"></i>Mobile-Friendly Bulk Testing Tool</h1>
<p>Using Google's API, quickly check if your pages are mobile-friendly. If a page is not mobile-friendly click on <i class="fa fa-times-circle fa-nospace"></i> to expand and see the specific issues.</p>
<hr>
<br>
<div id="loading" class="hide"><i class="fa fa-spinner fa-spin fa-nospace"></i>&nbsp;&nbsp;Completed tests: <span>0</span>/<span></span></div>

<div class="row">
	<div class="col-md-8">
		<label><i class="fa fa-hand-o-right"></i>URLs:</label>
		<textarea id="URLs" name="URLs" class="form-control" rows="1" placeholder="One per line | 50 URLs max." style="resize:vertical"></textarea>
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
<!-- //COMMENTS
<div id="disqus_thread"></div>
<script>disqus();setCurrent()</script> -->

<!--outputting excel -->
<script src="/resources/tools/table-excel.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	ajax_loading = false;
    $("#url_submit").click(function(){ if(!ajax_loading) {
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

		for (var i = 0, len = URLs.length; i < len; i++) {
			(function(i) {
				setTimeout(function() {
					$.ajax({
						url: '/seo-tools/mobile-friendly/api_script.php',
						type: 'POST',
						cache: false,
						data: {url: URLs[i]}, //figure out
						success: function(data) {
							ajax_loading = false;
							var currentDigit = $("#loading span:nth-child(2)").text(); //loading wheel
							var newDigit = parseInt(currentDigit) + 1;
							$("#loading span:nth-child(2)").text(newDigit);
							var JSONdata = JSON.stringify(data);
							//$("pre").text(JSONdata);
							var results = JSON && JSON.parse(JSONdata) || $.parseJSON(JSONdata);
							var url_id = URLs[i];
/*

Steps to take:
1. Must fix/create testing environment
2. Have to figure out how to iterate through and manipulate elements that we don't know beforehand, so we can return results ($.each; index value)
3. Must find a way to iterate through values that you know are not dot orientation
4. Must return errors for each structured data format (json-ld, microdata, rdfa, microformats)
5. Remove anything in location -1:-1 (because it's not an error)


			Pseudocode:
						Recussively iterate/go through results.data.json-ld stop when no #errors are left.

							Return all item types and properties without an #error message with a positive visual (checkmark).


							Print all #values and #messages to the user with an error visual (x).


							Do not include anything at location -1:-1.

*/

//everything will change
					//if data has an error provide error message

							if (results.error) {
								var testStatus = results.error.message;
								var structuredDataAllGood_icon = 'N/A'; //To Do: give image value!
							}

							//if the API responds with a 200 status code, then go through results
							else if (results.responseCode === 200) {

								var url_id = results.id;
								var testStatus = 'Completed';

								//what are the errors
								var structuredDataIssues = [];

								//declare an error message array
								var errorMessages = [];
									if(results.data["json-ld"] !== "" && results.data["json-ld"].["#location"] !== "") {
									//strugging with key/value actual meanings; how do I know if the kwy and value align
											$.each(results.data["json-ld"], function (key, value){
												if(value == "-1:-1") {
													console.log("This is not a valid error");
												}
												else if (key = "#message") {
														//add to an array
														value.push(errorMessages);
												} else {
													console.log("Valid Markup! \n This is the attribute: " + key + "\nThis is its value: " + value +"\n\n");
												}
											});
									} else {
										console.log("There is no more structured data in the JSON-LD array");
									}

										//array -
										$.each(errorMessages, function (){
										console.log("Error: " + value);
									}

						} // success data function
					}); // jquery AJAX call http://api.jquery.com/jquery.ajax/
				}, 500*i); //timeout
			})(i); // IIFE - immediately invoked function expression
		} //for all URLs added within the box
	}});//click function
}); //document ready function

</script>
