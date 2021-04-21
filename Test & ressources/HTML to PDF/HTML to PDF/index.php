<!DOCTYPE html>
<html>
<head>
	<title>HTML to PDF</title>
</head>
<body>
	<!--
	content of this area will be the content of your PDF file
	-->
	<div id="HTMLtoPDF">

	<h2>HTML to PDF</h2>

<table border="1">
	<tr>
		<td>test</td>
		<td>test</td>
		<td>téést</td>
	</tr>
	<tr>
		<td>test</td>
		<td>test</td>
		<td>téést</td>
	</tr>
</table>

	</div>

	<!-- here we call the function that makes PDF -->
	<a href="#" onclick="HTMLtoPDF()">Download PDF</a>

	<!-- these js files are used for making PDF -->
	<script src="js/jspdf.js"></script>
	<script src="js/jquery-2.1.3.js"></script>
	<script src="js/pdfFromHTML.js"></script>
</body>
</html>
