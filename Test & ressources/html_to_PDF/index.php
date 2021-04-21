<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <!-- jQuery library -->
<script src="jquery.min.js"></script>

<!-- jsPDF library -->
<script src="jspdf.min.js"></script>

<button type="button" onclick="downloadPDF()" name="button">PDF</button>
<script type="text/javascript">
  function downloadPDF(){
    var doc = new jsPDF();
    doc.text(20, 20, 'Hello world!');
    doc.text(20, 30, 'This is client-side Javascript to generate a PDF.');

    // Add new page
    doc.addPage();
    doc.text(20, 20, 'Visit CodexWorld.com');

    // Save the PDF
    doc.save('document.pdf');
  }
</script>
  </body>
</html>
