let online_player = -1;
let output = ``;
let playerCounterNode = document.querySelector(`#onlinetxt`);
get_server_status();
        async function get_server_status() {
            $('#statue').html("");
            $('#favicon').attr('src', "pack.png");

            let server_url = `mc.helicraft.ru`;
            let server_port = `25565`;
            let server_url_full = `https://api.minetools.eu/ping/${server_url}/${server_port}`;

            await $.getJSON(server_url_full, function(api) {
		        online_player = api.players.online;
		        console.log(online_player);
                if (api.error) {
                    $('#statue').html('Server close or not found.');
                    return false;
		
                }

                
                console.log(online_player);
                console.log(api.players.online);
                if (online_player === 0){
                    output = `На сервере никого нет!`;
                } else if(online_player === -1){
                    output = `Ошибка получения данных!`;
                } else if(online_player > 1 && online_player < 5){
                    output = `На сервере ${online_player} игрока`;
                } else {
                    output = `На сервере ${online_player} игроков`
                }
                playerCounterNode.innerHTML = output;
               
            });
            console.log(online_player);
            $("#server_url_title").html(server_url);
        }
        console.log(online_player);
