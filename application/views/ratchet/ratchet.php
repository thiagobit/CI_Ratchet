<html>
    <head>
        <script src="/assets/plugins/jquery/jquery-3.2.1.min.js"></script>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

        <script>
            var websocket;
            var messages;

            $(function() {
                messages = $('#messages');

                websocket = new WebSocket("ws://<?= $domain; ?>:<?= WS_PORT;?>");

                websocket.onmessage = function(ev) {
                    var data = JSON.parse(ev.data);

                    messages.append("<p>[" + data.nickname + "] " + data.message + "</p>");
                };

                function sendMessage(ev) {
                    var nickname = $('#fld-nickname').val();
                    var message  = $('#fld-message').val();

                    websocket.send(JSON.stringify({
                        nickname: nickname,
                        message:  message
                    }));

                    ev.preventDefault();

                    return false;
                }

                $('#frm-send').on('submit', sendMessage);
            });
        </script>
    </head>

    <body>
        <div class="container">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Chat
                    </div>

                    <form class="panel-footer" method="post" id="frm-send">
                        <div class="row">
                            <div class="col-md-4">
                                Nickname: <input type="text" id="fld-nickname">
                            </div>

                            <div class="col-md-4">
                                Message: <input type="text" id="fld-message">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary" id="btn-send">Enviar</button>
                            </div>
                        </div>
                    </form>

                    <div class="panel-body" id="messages">

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>