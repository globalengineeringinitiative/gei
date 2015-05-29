<?php
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="../../favicon.ico">

		<title>Global Engineering Initiative v1 RESTful API Documentation</title>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

		<!-- Optional theme -->
		<style>
			/*
 * Base structure
 */

			/* Move down content because we have a fixed navbar that is 50px tall */
			body {
				padding-top: 50px;
			}


			/*
			 * Global add-ons
			 */

			.sub-header {
				padding-bottom: 10px;
				border-bottom: 1px solid #eee;
			}

			.navbar-inverse {
				background-color: #00ADEE;
				color: #fff;
				border: none;
			}
			.navbar-inverse .navbar-brand{
				color: #fff;
			}
			
			.nav>li.active>a:hover{
				background-color:#19C0FF;
			}
			/*
			 * Sidebar
			 */

			/* Hide for mobile, show later */
			.sidebar {
				display: none;
			}
			@media (min-width: 768px) {
				.sidebar {
					position: fixed;
					top: 51px;
					bottom: 0;
					left: 0;
					z-index: 1000;
					display: block;
					padding: 20px;
					overflow-x: hidden;
					overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
					background-color: #f5f5f5;
					border-right: 1px solid #eee;
				}
			}

			/* Sidebar navigation */
			.nav-sidebar {
				margin-right: -21px; /* 20px padding + 1px border */
				margin-bottom: 20px;
				margin-left: -20px;
			}
			.nav-sidebar > li > a {
				padding-right: 20px;
				padding-left: 20px;
			}
			.nav-sidebar > .active > a {
				color: #fff;
				background-color: #00ADEE;
			}


			/*
			 * Main content
			 */

			.main {
				padding: 20px;
			}
			@media (min-width: 768px) {
				.main {
					padding-right: 40px;
					padding-left: 40px;
				}
			}
			.main .page-header {
				margin-top: 0;
			}


		</style>
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>

		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">GEI v1 RESTful API Documentation</a>
				</div>
			</div>
		</nav>

		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-3 col-md-2 sidebar">
					<ul class="nav nav-sidebar">
						<li class="active"><a href="#overview">Overview</a></li>
						<li><a href="#valid-calls">Valid Calls</a></li>
						<li><a href="#response">Response</a></li>
						<li><a href="#parameters">Parameters</a></li>
						<li><a href="#examples">Examples</a></li>
						<li><a href="#errors">Error Messages</a></li>
					</ul>

				</div>
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<h1 class="page-header">API Documentation</h1>

					<h2 class="sub-header" id="overview">Overview</h2>
					<ul>	
						<li>Endpoint is <code>/api/v1/</code></li>
						<li>Unless otherwise specified, the default format of the response is <code>application/json</code>.</li>
					</ul>
					<h2 id="valid-calls">Valid Calls</h2>
					<h3><code>http://globalengineeringinitiative.com/api/v1/</code></h3>
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>GET</th>
									<th>Resource</th>
									<th>Parameters</th>
									<th>Implementation Notes</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td></td>
									<td class="text-info">/resources</td>
									<td><a href="#title">title</a>, <a href="#summary">summary</a>, <a href="#authors">authors</a>, <a href="#date">date</a>, <a href="#discipline">discipline</a>, <a href="#language">language</a>, <a href="#module">module</a>,<br /><a href="#region">region</a>, <a href="#skill">skill</a>, <a href="#topic">topic</a>, <a href="#type">type</a>, <a href="#limit">limit</a>, <a href="#offset">offset</a></td>
									<td>Gets information about a collection of resources. <br>
										Limit of 100 returned unless otherwise specified (ie.<code>?limit=0</code>)
									</td>
								</tr>

								<tr>
									<td></td>
									<td class="text-info">/resources/{resource_id}</td>
									<td>n/a</td>
									<td>Gets information about a specific resource.</td>
								</tr>

								<tr>
									<td colspan="4">
										<h3 id="response">Response:</h3>
										<code><pre>{
"success":true,
"data":{
	"376": {
        "id": 376,
        "url": "http://globalengineeringinitiative.com/resources/what-is-a-global-engineer/",
        "title": "What is a Global Engineer?",
        "language": "en",
        "authors": [
            "Dhaval Bhavsar"
        ],
        "source": "EWB Canada",
        "publication_date": "04/06/2012",
        "short_summary": "EWB Canada takes us through the definition of global engineering.",
        "summary": "&lt;p&gt;EWB Canada takes us through the definition of global engineering.&lt;/p&gt;&lt;p&gt;&lt;iframe width=\&quot;100%\&quot; height=\&quot;360\&quot; src=\&quot;//www.youtube.com/embed/ALod6HXZQuU\&quot; frameborder=\&quot;0\&quot; allowfullscreen&gt;&lt;/iframe&gt;&lt;/p&gt;",
        "external_url": "http://www.youtube.com/watch?v=ALod6HXZQuU&feature=youtu.be",
        "module": "Introduction to Global Engineering",
        "topic": "Curriculum Reform",
        "type": "Video",
        "region": "Global",
        "skill": "Communication"
    }
}
}</pre></code>
									</td>
								</tr>							
							</tbody>
						</table>
					</div>
					<h2 id="parameters">Parameters</h2>
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Name</th>
									<th>Format</th>
									<th>Acceptable Values</th>
									<th>Description</th>
								</tr>
							</thead>
							<tbody>
								<tr id="title">
									<td class="text-info">title</td>
									<td>string</td>
									<td>comma separated values</td>
									<td>limit of 5<br>
										partial string match<br>
										<code>/resources?title=value1,value2</code> searches <b>resource</b> titles and subtitles</code><br>
									</td>
								</tr>
								<tr id="summary">
									<td class="text-info">summary</td>
									<td>string</td>
									<td>comma separated values</td>
									<td>limit of 5<br>
										partial string match<br>
										<code>/resources?summary=value1,value2</code> searches against values found in the <b>resource</b> abstract or short abstract</td>
								</tr>
								<tr id="authors">
									<td class="text-info">authors</td>
									<td>string</td>
									<td>comma separated values</td>
									<td>limit of 5<br>
										partial string match<br>
										<code>/resources?authors=alexandra,patrick</code> searches for <b>resource</b> authors</td> 
								</tr>								
								<tr id="date">
									<td class="text-info">date</td>
									<td>string</td>
									<td>comma separated values</td>
									<td>limit of 5<br>
										partial string match<br>
										<code>/resources?date=01/01/2015</code> searches for <b>resourcee</b> publication dates using the format DD/MM/YYYY</code></td> 
								</tr>								
								<tr id="discipline">
									<td class="text-info">discipline</td>
									<td>string</td>
									<td>comma separated values</td>
									<td>limit of 5<br>
									partial string match<br>
									<code>/resources?discipline=value1,value2</code> searches against values found in the <b>resource</b> discipline</td>
								</tr>								
								<tr id="language">
									<td class="text-info">language</td>
									<td>string</td>
									<td>comma separated values</td>
									<td>limit of 5<br>
									partial string match<br>
									<code>/resources?language=en</code> searches against the <b>resource</b> language</td>
								</tr>								
								<tr id="module">
									<td class="text-info">module</td>
									<td>string</td>
									<td>comma separated values</td>
									<td>limit of 5<br>
									partial string match<br>
									<code>/resources?module=value1,value2</code> searches against values found in the <b>resource</b> module</td>
								</tr>								
								<tr id="region">
									<td class="text-info">region</td>
									<td>string</td>
									<td>comma separated values</td>
									<td>limit of 5<br>
									partial string match<br>
									<code>/resources?region=value1,value2</code> searches against values found in the <b>resource</b> region</td>
								</tr>								
								<tr id="skill">
									<td class="text-info">skill</td>
									<td>string</td>
									<td>comma separated values</td>
									<td>limit of 5<br>
									partial string match<br>
									<code>/resources?skill=value1,value2</code> searches against values found in the <b>resource</b> skill</td>
								</tr>								
								<tr id="topic">
									<td class="text-info">topic</td>
									<td>string</td>
									<td>comma separated values</td>
									<td>limit of 5<br>
									partial string match<br>
									<code>/resources?topic=value1,value2</code> searches against values found in the <b>resource</b> topic</td>
								</tr>								
								<tr id="type">
									<td class="text-info">type</td>
									<td>string</td>
									<td>comma separated values</td>
									<td>limit of 5<br>
									partial string match<br>
									<code>/resources?type=value1,value2</code> searches against values found in the <b>resource</b> type</td>
								</tr>								
								<tr id="limit">
									<td class="text-info">limit</td>
									<td>integer</td>
									<td>positive or negative integers</td>
									<td>0 = unlimited results<br>
										positive integer returns results starting from the beginning<br>
									negative integer returns results starting from the end</td>
								</tr>								
								<tr id="offset">
									<td class="text-info">offset</td>
									<td>integer</td>
									<td>positive or negative integer</td>
									<td>positive integer returns results, offset from the beginning<br>
									negative integer returns results, offset from the end</td>
								</tr>
								<tr id="json">
									<td class="text-info">json</td>
									<td>integer</td>
									<td>1</td>
									<td>json response is returned whether this parameter is specified, or not<br>
									<code>?json=1</code> returns a json response</td>
								</tr>
								<tr id="xml">
									<td class="text-info">xml</td>
									<td>integer</td>
									<td>1</td>
									<td><code>?xml=1</code> returns an xml response</td>
								</tr>
							</tbody>
						</table>
					</div>
					<h2 id="examples">Examples</h2>
					<ul>
						<li><code>http://globalengineeringinitiative.com/api/v1/resources?discipline=mechanical,transportation&language=en</code><br>
							returns all <b>resources</b> with either discipline 'mechanical' <b>OR</b> 'transportation' <b>AND</b> the language 'en'.</li>
						<li><code>http://globalengineeringinitiative.com/api/v1/resources?title=development&summary=development&offset=-1</code><br>
							returns all <b>resources</b> with either whose title contains the substring 'development' <b>AND</b> whose summary contains the substring 'development', offset from the end (return everything but the last result).</li>
					</ul>
					<h2 id="errors">Error Messages</h2>
					<p>All error messages are returned in json format and refer back to this documentation. Errors will  return <code>success:false</code>. For example: <code><pre>{
"success":false,
"data":{
	"messages":"There are no records that can be returned with the request that was made",
	"documentation":"\/api\/v1\/docs"
	}
}</pre></code></p>
					
					
				</div>
			</div>
		</div>
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script>
		$(document).ready(function () {
			$('.nav-sidebar li a').click(function(e) {
				$('.nav-sidebar li').removeClass('active');

				var $parent = $(this).parent();

				if (!$parent.hasClass('active')) {
					$parent.addClass('active');
				}

			});
		});
		</script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	</body>
</html>
