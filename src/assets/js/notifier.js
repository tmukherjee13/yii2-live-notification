  var conn = new ab.Session('ws://localhost:8080',
        function() {
            conn.subscribe('kittensCategory1', function(topic, data) {
                // This is where you would add the new article to the DOM (beyond the scope of this tutorial)
                console.log('New article published to category "' + topic + '" : ' + data.title);
                console.log(data);
                document.getElementById(data.update).innerHTML = 15;
            });
        },
        function() {
            console.warn('WebSocket connection closed');
        },
        {'skipSubprotocolCheck': true}
    );

