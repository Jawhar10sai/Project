<?php
if (isset($_POST['button'])) {
  var_dump($_POST);
  foreach ($_POST as $key => $value) {
    echo $key.'<br>';
  }
  exit;
  echo $_POST['reponse'];
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

<div id="app">
  <button @click="tableToExcel('table', 'Lorem Table')">export </button>
  <table ref="table" id="loremTable" summary="lorem ipsum sit amet" rules="groups" frame="hsides" border="2">
    <caption>lorem ipsum</caption>
    <colgroup align="center"></colgroup>
    <colgroup align="left"></colgroup>
    <colgroup span="2" align="center"></colgroup>
    <colgroup span="3" align="center"></colgroup>
    <thead valign="top">
      <tr>
        <th>id</th>
        <th>Name</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>lorem ipsum</td>
        <td>sit amet</td>
      </tr>
    </tbody>
  </table>
</div>

<div id="result">
  {{ result + " developed by "+ name }}
  <p v-if="name">Welcome {{ name }}</p>
  <p v-else>Set a name please</p>
<form class="" action="index.php" method="post">
  <input type="checkbox" value="test" v-model="messages">test
  <input type="checkbox" value="test2" v-model="messages">test2
  <input type="checkbox" value="test3" v-model="messages">test3
  <input type="hidden" name="reponse-question" v-model="messages">
  <button type="submit" name="button">valider</button>
</form>
  <p v-for="message in messages">{{ message }}</p>
  <input type="checkbox"  id="nom" value=""><label for=""></label>
  <p>{{ nom }}</p>
  <button @click="name='Jawhar'">Jawhar</button>
  <button @click="name=''">Say Hi</button>


</div>
<script type="text/javascript" src="js/vue.js"></script>
<script type="text/javascript">

  var vjs = new Vue({
    el:"#result",
    data:{
      result:"My first app",
      name:"Jawhar",
      nom:"",
      messages:[]
    },
    methods:{
    }
  })
/*
new Vue({
  data(){
    return{
      uri :'data:application/vnd.ms-excel;base64,',
      template:'<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>',
      base64: function(s){ return window.btoa(unescape(encodeURIComponent(s))) },
      format: function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
    }
  },
  methods:{
    tableToExcel(table, name){

      if (!table.nodeType) table = this.$refs.table
      var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
      window.location.href = this.uri + this.base64(this.format(this.template, ctx))
    }
  }
}).$mount('#app')*/
</script>
  </body>
</html>
