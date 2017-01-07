/*********************
*                    *
*    File: irc.js    *
*                    *
*********************/

function info_tchat(msg) {
	var entry = document.getElementById('text_input');
	
	if(msg == 'Ecrivez votre message...') {
		entry.value = '';
	}
	else if(msg == '') {
		entry.value = 'Ecrivez votre message...';
	}
}

/******
* END *
******/

