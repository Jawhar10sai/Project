<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="VUEJS/vue.js"></script>
<table border="1" id="crudApp">
    <thead>
        <tr>
            <th>Numero</th>
            <th>Date</th>
            <th>Poids</th>
        </tr>
    </thead>
    <tbody>
        <tr v-for="declaration in allData">
            <th>{{declaration.numero}}</th>
            <th>{{declaration.date}}</th>
            <th>{{declaration.poids}}</th>
        </tr>
    </tbody>
</table>
<script>
    var application = new Vue({
        el: '#crudApp',
        data: {
            allData: '',
            myModel: false,
            actionButton: 'Insert',
            dynamicTitle: 'Add Data',
        },
        methods: {
            fetchAllData: function() {
                axios.post('test.php', {
                    id: '1',
                    action: 'insert'
                }).then(function(response) {
                    application.allData = response.data;
                });
            },
            openModel: function() {
                application.first_name = '';
                application.last_name = '';
                application.actionButton = "Insert";
                application.dynamicTitle = "Add Data";
                application.myModel = true;
            },
            submitData: function() {
                if (application.first_name != '' && application.last_name != '') {
                    if (application.actionButton == 'Insert') {
                        axios.post('action.php', {
                            action: 'insert',
                            firstName: application.first_name,
                            lastName: application.last_name
                        }).then(function(response) {
                            application.myModel = false;
                            application.fetchAllData();
                            application.first_name = '';
                            application.last_name = '';
                            alert(response.data.message);
                        });
                    }
                    if (application.actionButton == 'Update') {
                        axios.post('action.php', {
                            action: 'update',
                            firstName: application.first_name,
                            lastName: application.last_name,
                            hiddenId: application.hiddenId
                        }).then(function(response) {
                            application.myModel = false;
                            application.fetchAllData();
                            application.first_name = '';
                            application.last_name = '';
                            application.hiddenId = '';
                            alert(response.data.message);
                        });
                    }
                } else {
                    alert("Fill All Field");
                }
            },
            fetchData: function(id) {
                axios.post('action.php', {
                    action: 'fetchSingle',
                    id: id
                }).then(function(response) {
                    application.first_name = response.data.first_name;
                    application.last_name = response.data.last_name;
                    application.hiddenId = response.data.id;
                    application.myModel = true;
                    application.actionButton = 'Update';
                    application.dynamicTitle = 'Edit Data';
                });
            },
            deleteData: function(id) {
                if (confirm("Are you sure you want to remove this data?")) {
                    axios.post('action.php', {
                        action: 'delete',
                        id: id
                    }).then(function(response) {
                        application.fetchAllData();
                        alert(response.data.message);
                    });
                }
            }
        },
        created: function() {
            this.fetchAllData();
        }
    });
</script>

<script>
    /*axios.post('test.php', {
            id: 1
        }, {
            headers: {
                'Conent-type': 'application/json'
            }
        })
        .then((response) => {
            $.each(response.data, function(index, declaration) {
                console.log(declaration.poids);
            });
        }).catch(err => {
            console.log(err);
        });*/

    /* axios.get('test2.php', {
             params: {
                 id: 1
             }
         }, {
             headers: {
                 'Conent-type': 'application/json'
             }
         })
         .then((response) => {
             $.each(response.data, function(index, declaration) {
                 $('tbody').append('<tr><td>' + declaration.numero + '</td><td>' + declaration.date + '</td><td>' + declaration.poids + '</td>');
                 // console.log(declaration.poids);
             });
         }).catch(err => {
             console.log(err);
         });*/
</script>
<script>
    /*
    fetch('http://api.relaisexpress.ma/v1/getconsigne', {
    method: 'GET',
    headers: new Headers({
        'Authorization': 'Basic ' + Buffer.from("lve:kC525bmT").toString('base64'),
        'Content-Type': 'application/json'
    }),
    })*/
    /* fetch('http://api.relaisexpress.ma/v1/getconsigne', {
             method: 'GET',
             headers: new Headers({
                 'Authorization': 'Basic ' + Buffer.from("lve:kC525bmT").toString('base64'),
                 'Content-Type': 'application/json'
             }),
             data: {
                 "id-gc": 34004,
                 "statut": 0
             }
         })
         .then(response => {
             console.log(response.json());
         })*/
    /*        .then(data => {
                console.log(data);
            });*/
    /*
    axios.get('https://cors-anywhere.herokuapp.com/http://api.relaisexpress.ma/v1/getconsigne', {
                params: {
                    "id-gc": 1,
                    "statut": 0,
                    //"format": "json"
                }
            }, {
                auth: {
                    username: 'lve',
                    password: 'kC525bmT'
                }
            }*/
    /*, {
                    headers: {
                        "Access-Control-Allow-Origin": "*",
                        "Access-Control-Allow-Headers": "Origin, X-Requested-With, Content-Type, Accept",
                        //"Authorization": "Basic " + btoa("lve:kC525bmT")
                    },
                    auth: {
                        username: 'lve',
                        password: 'kC525bmT'
                    }
                }*/
    /*, {
                    
                }
    )
    .then((response) => {
        console.log(response);
    });
*/
    /* $.ajax({
        type: "GET",
        url: "http://api.relaisexpress.ma/v1/getconsigne",
        dataType: 'json',
        headers: {
            "Access-Control-Allow-Origin": "*",
            "Access-Control-Allow-Methods": "GET, POST, PUT, DELETE",
            "Access-Control-Allow-Headers": "Authorization",
            "Authorization": "Basic " + btoa("lve:kC525bmT")
        },
        data: {
            "id-gc": 34004,
            "statut": 0,
            format: "json"
        },
        success: function(res) {
            console.log(res);
            //alert('Thanks for your comment!'); 
        }
    });*/
</script>