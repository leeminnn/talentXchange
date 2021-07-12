

function sendChat() {
    var reply = document.getElementById("chat").value;

    if (reply=="Hi YiMeng, yea sure I could use this time to learn baking from you!") {
        var message = `
        <div class="chat">
            <p><b>Supreme Leader:</b></p>
            <p>${reply}</p>
            <span class="time-right">11:01</span>
        </div>

        <div class="chat" style="background-color: rgb(225, 239, 245);">
            <p><b>Yi Meng:</b></p>
            <p>Great! So how do I get the lessons started?</p>
            <span class="time-right">11:03</span>
        </div>

        <div class="chat" style="background-color: pink;">
            <p><b>TalentXchange</b></p>
            <p>Supreme Leader would like to match with you</p>
            <button type="button" class="btn btn-warning" onClick="accept()">Click here to confirm</button>
            <span class="time-right">11:08</span>
        </div>
        `;

        document.getElementById('addOn').innerHTML += message;
        document.getElementById("chat").value = "";
    }

    else if (reply!="") {
        var message = `
        <div class="chat" style="background-color: rgb(225, 239, 245);">
            <p><b>Yimeng:</b></p>
            <p>${reply}</p>
            <span class="time-right">11:00</span>
        </div>
        `;

        document.getElementById('addOn').innerHTML += message;
        document.getElementById("chat").value = "";
    }
    
}

function open_chat_window(){
    if (document.getElementById('chat_window').style.display == "none") {
        document.getElementById('chat_window').style.display = "block";
    }
    else {
        document.getElementById('chat_window').style.display = 'none';
    }
}


function accept() {
    var message = `
    <div class="chat" style="background-color: pink;">
        <p><b>TalentXchange</b></p>
        <p><b>You are now matched with Supreme Leader</b></p>
        <span class="time-right">11:14</span>
    </div>
    `;

    document.getElementById('addOn').innerHTML += message;
    document.getElementById("chat").value = "";
}
