<style>
    .logo-header,
    #share {
        display: inline-block
    }

    .table>thead>tr>th,
    .table>thead>tr>td {
        border-top: none !important;
    }

    .table th,
    .table td {
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
        color: #B6CD29/*#C5D939*/
        ;
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

    .alert {
        border-radius: 0px
    }

    .alert-warning {
        color: #F05422;
        /*background-color: rgba(251,175,63,0.5);
			border-color: transparent;*/
    }

    .alert-info {
        color: #006AB6;
    }

    .CodeMirror {
        color: #333;
        border: 1px solid #c0c0c0;
        font-size: 10pt;
        height: 370px;
    }

    .CodeMirror pre {
        padding: 0 8px;
    }

    .CodeMirror-linenumber {
        padding: 0 3px 0 0px!important
    }

    .line-disallow {
        background: #F05422 !important;
        color: white !important;
    }

    .line-allow {
        background: #B6CD29 !important;
        color: white !important;
    }

    .note-gutter {
        width: 20px;
        background: #ccc;
    }

    .fa-gutter {
        margin: 2px 0 0 7px;
    }

    .fa-external-link {
        font-size: 10px;
    }

    .fa-ban,
    .fa-times-circle {
        color: #F05422;
        vertical-align: middle;
    }

    .fa-question-circle {
        color: #F79021;
        cursor: pointer;
        vertical-align: middle;
    }
    /*.fa-info-circle {color:#F79021;vertical-align:middle;}*/

    .fa-check,
    .fa-server,
    .fa-check-circle {
        color: #B6CD29;
        vertical-align: middle;
    }

    .fa-exclamation-triangle {
        color: #FBAF3F
    }

    .screenshot-icon {
        color: #006AB6
    }

    .pointer {
        cursor: pointer;
    }

    input[type=radio],
    input[type=checkbox] {
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
        max-width: 220px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        /*max-width:280px;*/
        text-align: left!important;
    }

    .tooltip-inner {
        max-width: 500px;
    }

    .tooltip-inner {
        background-color: #1A2F59;
        max-width: 500px;
        -webkit-border-radius: 0px;
        -moz-border-radius: 0px;
        border-radius: 0px
    }

    .tooltip.top .tooltip-arrow {
        border-top: 5px solid #1A2F59
    }

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
        color: #fff;
        font-size: 24px;
        text-align: center;
        padding: 20px;
        background-color: rgba(26, 47, 89, 0.95);
        position: fixed;
        width: 350px;
        top: 50%;
        left: 50%;
        margin-top: -37px;
        margin-left: -175px;
        z-index: 999
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
        <label>&nbsp;</label>
        <br>
        <button id="url_submit" name="url_submit" type="submit" class="btn btn-light-blue"><i class="fa fa-play"></i>Run</button>
    </div>
    <div class="col-md-2">
        <label>&nbsp;</label>
        <br>
        <button class="btn btn-red-orange disabled" style="width:100%;pointer-events:all;" onclick="tablesToExcel(['table1','table2'], ['Valid Structured Data URLs','Non-valid Structured Data URLs'], 'structured-data-report.xls', 'Excel')"><i class="fa fa-file-excel-o"></i>.CSV</button>
    </div>
</div>
<br>
<!--<pre></pre>-->
<table id="table0" class="table hide" style="border-collapse:collapse;">
    <thead>
        <tr>
            <th>URL</th>
            <th>Test Status</th>
            <th>Valid JSON-LD</th>
            <th>Valid Microdata</th>
            <th>Valid RDFa</th>
            <th>Valid Microformat</th>
        </tr>
    </thead>
    <tbody id="maintable">
    </tbody>
</table>

<div class="hide">
    <!--validStructuredDataURLs-->
    <table id="table1">
        <thead>
            <tr>
                <th>URL</th>
            </tr>
        </thead>
        <tbody id="validStructuredDataTable">
        </tbody>
    </table>
    <!--NotvalidStructuredDataURLs-->
    <table id="table2">
        <thead>
            <tr>
                <th>URL</th>
                <th>JSON-LD</th>
                <th>Microdata</th>
                <th>RDFa</th>
                <th>Microformats</th>
            </tr>
        </thead>
        <tbody id="NotvalidStructuredDataTable">
        </tbody>
    </table>
</div>
<br>
<hr>
<div id="test_div">
    <!--Generic API ERRORS go here-->
</div>
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
    window.onload = function() {
            //windows onload b/c document ready wasn't functioning properly; jQuery wasn't loaded on time
            console.log("Window Loaded");

            //Activates bootstrap/jQuery Tooltip for structured data error cells
            $(function() {
                $('[data-toggle="tooltip"]').tooltip();
            });

            ajax_loading = false;
            $("#url_submit").click(function() {
                console.log('clicked');
                if (!ajax_loading) {
                    ajax_loading = true;
                    Array.prototype.unique = function() {
                        return this.filter(function(value, index, self) {
                            return self.indexOf(value) === index;
                        });
                    }
                    var URLs = $('#URLs').val().split('\n').filter(Boolean).unique().slice(0, 50); //split by line break, remove empty lines, removing duplicates (.unique), limits 50 urls

                    $("#table0").addClass("hide"); //jquery styling
                    $("#maintable").html("");
                    $("#validStructuredDataTable").html("");
                    $("#NotvalidStructuredDataTable").html("");
                    $('.modal').remove();
                    $(".btn-red-orange").removeClass("disabled");
                    $("#loading span:nth-child(2)").text("0");
                    $("#loading span:nth-child(3)").text(URLs.length);
                    $("#loading").removeClass('hide');

                    for (var i = 0, len = URLs.length; i < len; i++) {
                        (function(i) {
                            setTimeout(function() {
                                console.log("Sending Request: ", URLs[i]);
                                $.ajax({
                                    url: '/seo-tools/mobile-friendly/api_script.php',
                                    type: 'POST',
                                    cache: false,
                                    data: {
                                        url: URLs[i]
                                    }, //figure out
                                    error: function(errorData) {
                                        $('#test_div').html('<h2>Sorry! The API is acting up! (It could also be a little slow!)</h2><br><p>Here\'s some error data from the API: <br>' + errorData.responseText + '</p>');
                                        console.log("Error,", errorData);
                                    },
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
                                                var structuredDataAllGood_icon = '<i class="fa fa-bug" aria-hidden="true"></i>'; //Delete, I broke down into more elements
                                            }

                                            //if the API responds with a 200 status code, then go through results
                                            else if (true) {

                                                var url_id = results.id; //Delete --> his is null (could be that the last API had the value as an id. This API does not)
                                                var testStatus = 'Completed';

                                                //what are the errors; stores errors
                                                var structuredDataIssuesJson = [];
                                                var structuredDataIssuesMicrodata = [];
                                                var structuredDataIssuesRdfa = [];
                                                var structuredDataIssuesMicroformat = [];

                                                var errorMessages = [];

                                                //variables store symbols for table
                                                var xSymbol = '<i class="fa fa-times-circle" aria-hidden="true"></i>';
                                                var checkmark = '<i class="fa fa-check-circle" aria-hidden="true"></i>';
                                                var naSymbol = '<p>N/A</p>'; // I want to use this eventually, but haven't yet

                                                //json-ld errors (repeats for microdata, microformat, and rdfa)
                                                if (results.data["json-ld"] != "") {
                                                    //initiating error variables
                                                    var ErrorCountJson = 0;
                                                    var ErrorMessagesJson = "";
                                                    var ErrorMessagesJsonTooltip = "";

                                                    //initiating good variables
                                                    var allJsonCount = 0;
                                                    var jsonGoodCount = '';
                                                    var allJsonStuff = "";
                                                    $.each(results.data["json-ld"], function(key, value) {
                                                        //Iterate through JSON-LD results for Good structured data types
                                                        if (value['@type'] != undefined) {
                                                            allJsonStuff += '<p class="text-left"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>' + value['@type'] + '</li>';
                                                            allJsonCount++;
                                                            jsonGoodCount = '+' + allJsonCount;
                                                        }

                                                        //Iterate through JSON-LD results for errors
                                                        var hasErrorJson = false;
                                                        if (value['#error'] != undefined) {
                                                            var ErrorJson = value['#error'];
                                                            $.each(ErrorJson, function(ErrorMessageKeyJson, ErrorMessageValJson) {
                                                                if (ErrorMessageValJson['#location'] != "-1:-1") {
                                                                    ErrorCountJson++;
                                                                    ErrorMessagesJson += '<p>' + ErrorMessageValJson['#message'] + "<br>" + '&nbsp;&nbsp;&nbsp;Found within HTML here: ' + ErrorMessageValJson['#location'] + '</p>';
                                                                    structuredDataIssuesJson.push(ErrorMessagesJson);
                                                                    ErrorMessagesJsonTooltip += '<a href="#" data-toggle="tooltip" title=\"' + ErrorMessageValJson['#message'] + ' :: Found within HTML at: ' + ErrorMessageValJson['#location'] + '\">';
                                                                }
                                                            });
                                                        }

                                                    });
                                                    //All of the markup below the chart; will likely delete
                                                    if (ErrorCountJson > 0) {
                                                        $('#test_div_json').html('<h2><i class="fa fa-times-circle" aria-hidden="true"></i> JSON-LD Errors: ' + ErrorCountJson + '</h2>\n' + ErrorMessagesJson);
                                                    } else {
                                                        $('#test_div_json').html('<h2><i class="fa fa-check-circle" aria-hidden="true"></i>JSON-LD Errors: 0</h2><br><p>You don\'t have any JSON-LD errors</p>'); //not sure if this works
                                                    }
                                                } else {
                                                    $('#test_div_json').html('<h2><i class="fa fa-meh-o" aria-hidden="true"></i>JSON-LD: N/A</h2><p>You don\'t have any JSON-LD</p>'); //not sure if this works
                                                }

                                                //Tooltip message for the JSON-Ld cell on table
                                                if (ErrorMessagesJson == "") {
                                                    ErrorMessagesJsonTooltip = '<a href="#" data-toggle="tooltip" title="There are no JSON-LD errors markup on this page. Way to go!"';
                                                } else if (ErrorMessagesJson == undefined) {
                                                    ErrorMessagesJsonTooltip = '<a href="#" data-toggle="tooltip" title="There was no JSON-LD markup on this page. Consider checking out our site to find opportunities"';
                                                }

                                                //symbol in the table (Markup good, No markup, errors in markup)
                                                var jsonValid = "";

                                                if (ErrorMessagesJson == undefined) {
                                                    jsonValid = naSymbol;
                                                } else if (ErrorMessagesJson == "") {
                                                    jsonValid = checkmark;
                                                } else {
                                                    jsonValid = xSymbol + ' ' + ErrorCountJson;
                                                }

                                                //Microdata errors
                                                if (results.data["microdata"] != "") {
                                                    //initiating good variables
                                                    var allMicrodataCount = 0;
                                                    var microdataGoodCount = '';
                                                    var allMicrodataStuff = "";

                                                    var ErrorCountMicrodata = 0;
                                                    var ErrorMessagesMicrodata = "";
                                                    var ErrorMessagesMicrodataTooltip = "";
                                                    $.each(results.data["microdata"], function(key, value) {
                                                        //Iterate through JSON-LD results for Good structured data types
                                                        if (value['@type'] != undefined) {
                                                            allMicrodataStuff += '<p class="text-left"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>' + value['@type'] + '</li>';
                                                            allMicrodataCount++;
                                                            microdataGoodCount = '+' + allMicrodataCount;
                                                        }

                                                        var hasErrorMicrodata = false;
                                                        if (value['#error'] != undefined) {
                                                            var ErrorMicrodata = value['#error'];
                                                            $.each(ErrorMicrodata, function(ErrorMessageKeyMicrodata, ErrorMessageValMicrodata) {
                                                                if (ErrorMessageValMicrodata['#location'] != "-1:-1") {
                                                                    ErrorCountMicrodata++;
                                                                    ErrorMessagesMicrodata += '<p>' + ErrorMessageValMicrodata['#message'] + "<br>" + '&nbsp;&nbsp;&nbsp;Found within HTML here: ' + ErrorMessageValMicrodata['#location'] + '</p>';
                                                                    structuredDataIssuesMicrodata.push(ErrorMessagesMicrodata);
                                                                    ErrorMessagesMicrodataTooltip += '<a href="#" data-toggle="tooltip" title=\"' + ErrorMessageValMicrodata['#message'] + ' :: Found within HTML at: ' + ErrorMessageValMicrodata['#location'] + '\">';

                                                                }
                                                            });
                                                        }
                                                    });
                                                    if (ErrorCountMicrodata > 0) {
                                                        $('#test_div_Microdata').html('<h2><i class="fa fa-times-circle" aria-hidden="true"></i> Microdata Errors: ' + ErrorCountMicrodata + '</h2>\n' + ErrorMessagesMicrodata);
                                                    } else {
                                                        $('#test_div_Microdata').html('<h2><i class="fa fa-check-circle" aria-hidden="true"></i>Microdata Errors: 0</h2><br><p>You don\'t have any Microdata errors</p>'); //not sure if this works
                                                    }
                                                } else {
                                                    $('#test_div_microdata').html('<h2><i class="fa fa-meh-o" aria-hidden="true"></i>Microdata: N/A</h2><p>You don\'t have any Microdata</p>'); //not sure if this works
                                                }

                                                if (ErrorMessagesMicrodata == "") {
                                                    ErrorMessagesMicrodataTooltip = '<a href="#" data-toggle="tooltip" title="There are no Microdata markup errors on this page. Way to go!"';
                                                } else if (ErrorMessagesMicrodata == undefined) {
                                                    ErrorMessagesMicrodataTooltip = '<a href="#" data-toggle="tooltip" title="There was no Microdata markup on this page. Consider checking out our site to find opportunities"';
                                                }

                                                var microdataValid = "";

                                                if (ErrorMessagesMicrodata == undefined) {
                                                    microdataValid = naSymbol;
                                                } else if (ErrorMessagesMicrodata == "") {
                                                    microdataValid = checkmark;
                                                } else {
                                                    microdataValid = xSymbol + ' ' + ErrorCountMicrodata;
                                                }

                                                //Microformat errors
                                                if (results.data["microformat"] != "") {

                                                    //initiating good variables
                                                    var allMicroformatCount = 0;
                                                    var microformatGoodCount = '';
                                                    var allMicroformatStuff = "";

                                                    var ErrorCountMicroformat = 0;
                                                    var ErrorMessagesMicroformat = "";
                                                    var ErrorMessagesMicroformatTooltip = "";
                                                    $.each(results.data["microformat"], function(key, value) {
                                                        //Iterate through JSON-LD results for Good structured data types
                                                        if (value['@type'] != undefined) {
                                                            allMicroformatStuff += '<p class="text-left"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>' + value['@type'] + '</li>';
                                                            allMicroformatCount++;
                                                            microformatGoodCount = '+' + allMicroformatCount;
                                                        }

                                                        var hasErrorMicroformat = false;
                                                        if (value['#error'] != undefined) {
                                                            var ErrorMicroformat = value['#error'];
                                                            $.each(ErrorMicroformat, function(ErrorMessageKeyMicroformat, ErrorMessageValMicroformat) {
                                                                if (ErrorMessageValMicroformat['#location'] != "-1:-1") {
                                                                    ErrorCountMicroformat++;
                                                                    ErrorMessagesMicroformat += '<p>' + ErrorMessageValMicroformat['#message'] + "<br>" + '&nbsp;&nbsp;&nbsp;Found within HTML here: ' + ErrorMessageValMicroformat['#location'] + '</p>';
                                                                    structuredDataIssuesMicroformat.push(ErrorMessagesMicroformat);
                                                                    ErrorMessagesMicroformatTooltip += '<a href="#" data-toggle="tooltip" title=\"' + ErrorMessageValMicroformat['#message'] + ' :: Found within HTML at: ' + ErrorMessageValMicroformat['#location'] + '\">';

                                                                }
                                                            });
                                                        }
                                                    });
                                                    if (ErrorCountMicroformat > 0) {
                                                        $('#test_div_Microformat').html('<h2><i class="fa fa-times-circle" aria-hidden="true"></i> Microformat Errors: ' + ErrorCountMicroformat + '</h2>\n' + ErrorMessagesMicroformat);
                                                    } else {
                                                        $('#test_div_Microformat').html('<h2><i class="fa fa-check-circle" aria-hidden="true"></i>Microformat Errors: 0</h2><br><p>You don\'t have any Microformat errors</p>'); //not sure if this works
                                                    }
                                                } else {
                                                    $('#test_div_microformat').html('<h2><i class="fa fa-meh-o" aria-hidden="true"></i>Microformat: N/A</h2><p>You don\'t have any Microformat</p>'); //not sure if this works
                                                }

                                                if (ErrorMessagesMicroformat == "") {
                                                    ErrorMessagesMicroformatTooltip = '<a href="#" data-toggle="tooltip" title="There are no Microformat markup errors on this page. Way to go!"';
                                                } else if (ErrorMessagesMicroformat == undefined) {
                                                    ErrorMessagesMicroformatTooltip = '<a href="#" data-toggle="tooltip" title="There was no Microformat markup on this page. Consider checking out our site to find opportunities"';
                                                }

                                                var microformatValid = "";

                                                if (ErrorMessagesMicroformat == undefined) {
                                                    microformatValid = naSymbol;
                                                } else if (ErrorMessagesMicroformat == "") {
                                                    microformatValid = checkmark;
                                                } else {
                                                    microformatValid = xSymbol + ' ' + ErrorCountMicrodata;
                                                }

                                                //rdfa errors
                                                if (results.data["rdfa"] != "") {
                                                    //initiating good variables
                                                    var allRdfaCount = 0;
                                                    var rdfaGoodCount = '';
                                                    var allRdfaStuff = "";

                                                    var ErrorCountRdfa = 0;
                                                    var ErrorMessagesRdfa = "";
                                                    var ErrorMessagesRdfaTooltip = "";

                                                    $.each(results.data["rdfa"], function(key, value) {
                                                        //Iterate through JSON-LD results for Good structured data types
                                                        if (value['@type'] != undefined) {
                                                            allRdfaStuff += '<p class="text-left"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>' + value['@type'] + '</li>';
                                                            allRdfaCount++;
                                                            rdfaGoodCount = '+' + allRdfaCount;
                                                        }

                                                        var hasErrorRdfa = false;
                                                        if (value['#error'] != undefined) {
                                                            var ErrorRdfa = value['#error'];
                                                            $.each(ErrorRdfa, function(ErrorMessageKeyRdfa, ErrorMessageValRdfa) {
                                                                if (ErrorMessageValRdfa['#location'] != "-1:-1") {
                                                                    ErrorCountRdfa++;
                                                                    ErrorMessagesRdfa += '<p>' + ErrorMessageValRdfa['#message'] + "<br>" + '&nbsp;&nbsp;&nbsp;Found within HTML here: ' + ErrorMessageValRdfa['#location'] + '</p>';
                                                                    structuredDataIssuesRdfa.push(ErrorMessagesRdfa);
                                                                    ErrorMessagesRdfaTooltip += '<a href="#" data-toggle="tooltip" title=\"' + ErrorMessageValRdfa['#message'] + ' :: Found within HTML at: ' + ErrorMessageValRdfa['#location'] + '\">';

                                                                }

                                                            });
                                                        }
                                                    });
                                                    if (ErrorCountRdfa > 0) {
                                                        $('#test_div_rdfa').html('<h2><i class="fa fa-times-circle" aria-hidden="true"></i> RDFa Errors: ' + ErrorCountRdfa + '</h2>\n' + ErrorMessagesRdfa);
                                                    } else {
                                                        $('#test_div_rdfa').html('<h2><i class="fa fa-check-circle" aria-hidden="true"></i>RDFa Errors: 0</h2><br><p>You don\'t have any RDFa errors</p>'); //not sure if this works
                                                    }
                                                } else {
                                                    $('#test_div_rdfa').html('<h2><i class="fa fa-meh-o" aria-hidden="true"></i>RDFa: N/A</h2><p>You don\'t have any RDFa</p>'); //not sure if this works
                                                }

                                                if (ErrorMessagesRdfa == "") {
                                                    ErrorMessagesRdfaTooltip = '<a href="#" data-toggle="tooltip" title="There are no RDFa markup errors on this page. Way to go!"';
                                                } else if (ErrorMessagesRdfa == undefined) {
                                                    ErrorMessagesRdfaTooltip = '<a href="#" data-toggle="tooltip" title="There was no RDFa markup on this page. Consider checking out our site to find opportunities"';
                                                }

                                                var rdfaValid = "";

                                                if (ErrorMessagesRdfa == undefined) {
                                                    rdfaValid = naSymbol;
                                                } else if (ErrorMessagesRdfa == "") {
                                                    rdfaValid = checkmark;
                                                } else {
                                                    rdfaValid = xSymbol + ' ' + ErrorCountRdfa;
                                                }

                                                //Reset variables if they do not exist (i.e., there is no markup in this format, ergo we cannot list out the item properties and values)

                                                //must fix - var for all microdata stuff and microformat
                                                if (allJsonStuff == undefined) {
                                                    allJsonStuff = '</ul><p class="text-center">N/A</p><ul>';
                                                }

                                                if (allRdfaStuff == undefined) {
                                                    allRdfaStuff = '</ul><p class="text-center">N/A</p><ul>';
                                                }

                                                if (allMicrodataStuff == undefined) {
                                                    allMicrodataStuff = '</ul><p class="text-center">N/A</p><ul>';

                                                }
                                                if (allMicroformatStuff == undefined) {
                                                    allMicroformatStuff = '</ul><p class="text-center">N/A</p><ul>';
                                                }

                                                //if there is no markup, then return nothing
                                                if (allJsonCount == undefined) {
                                                    jsonGoodCount = "";
                                                }
                                                if (allMicrodataCount == undefined) {
                                                    microdataGoodCount = "";
                                                }
                                                if (allMicroformatCount == undefined) {
                                                    microformatGoodCount = "";
                                                }
                                                if (allRdfaCount == undefined) {
                                                    rdfaGoodCount = "";
                                                }

                                                //adding rows to table with data
                                                var newTR = '<tr class="active">' + '<td class="url-td"><a href="' + URLs[i] + '" title="' + URLs[i] + '" target="_blank" data-toggle="tooltip" data-placement="top">' + URLs[i] + '</a></td>' + '<td>' + testStatus + '</td>' + '<td class="brdr-left">' + ErrorMessagesJsonTooltip + jsonValid + '  ' + jsonGoodCount + '</a></td>' + '<td class="brdr-left">' + ErrorMessagesMicrodataTooltip + microdataValid + '  ' + microdataGoodCount + '</a></td>' + '<td class="brdr-left">' + ErrorMessagesRdfaTooltip + rdfaValid + '  ' + rdfaGoodCount + '</a></td>' + '<td class="brdr-left">' + ErrorMessagesMicroformatTooltip + microformatValid + '  ' + microformatGoodCount + '</a></td>' + '</tr>'

                                                +'<tr><td></td><td>Item Type</td>' + '<td><ul>' + allJsonStuff + '</ul></td>' + '<td><ul>' + allMicrodataStuff + '</ul></td>' + '<td><ul>' + allRdfaStuff + '</ul></td>' + '<td><ul>' + allMicroformatStuff + '</ul></td></tr>'

                                                + '<tr>' + '<td colspan="4">' + '<div class="collapse" id="url_num_' + i + '">' + '<table class="table"><thead><tr><th><i class="fa fa-times-circle"></i>Issue</th></tr></thead><tbody id="sdi_' + i + '">' + '</tbody></table>' + '</div>' + '</td>' + '</tr>';

                                                $("#table0").removeClass("hide");
                                                $("#maintable").append(newTR);
                                                $('[data-toggle="tooltip"]').tooltip()

                                                //hide loading bar, by adding a hide CSS class
                                                $("#loading").addClass('hide');

                                                //array -
                                                $.each(errorMessages, function() {
                                                    console.log("Error: " + value);
                                                });
                                            }

                                        } // success data function

                                }); // jquery AJAX call http://api.jquery.com/jquery.ajax/
                            }, 500 * i); //timeout
                        })(i); // IIFE - immediately invoked function expression
                    } //for all URLs added within the box
                }
            }); //click function
        } //document ready function
</script>
