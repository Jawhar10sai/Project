<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>
    /*  
    axios.get('test.php', {
            params: {
                id: 1
            }
        }, {
            headers: {
                'Conent-type': 'application/json'
            }
        })
        .then((response) => {

            console.log(response.data);
        }).catch(err => {
            console.log(err);
        });*/
</script>
<script>
    fetch('http://api.relaisexpress.ma/v1/getconsigne', {
    method: 'GET',
    headers: new Headers({
        'Authorization': 'Basic ' + Buffer.from("lve:kC525bmT").toString('base64'),
        'Content-Type': 'application/json'
    }),
    })


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
                    
                }*/
    )
    .then((response) => {
        console.log(response);
    });

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