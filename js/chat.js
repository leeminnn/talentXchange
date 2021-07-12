

function sendChat() {
    var reply = document.getElementById("chat").value;

    if (reply=="Hi! I saw your profile as one of top rated coaches of the month!") {
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

    else if (reply=="I am interested to learn about programming to improve my skills! Would you be interested in learning how to bake?") {
        var message = `
        <div class="chat" style="background-color: rgb(225, 239, 245);">
            <p><b>Yimeng:</b></p>
            <p>${reply}</p>
            <span class="time-right">11:00</span>
        </div>

        <div class="chat" >
            <p><b>Selena:</b></p>
            <p>Hi Yi Meng, yea sure I could use this time to learn baking from you!</p>
            <span class="time-right">11:01</span>
        </div>
        `;

        document.getElementById('addOn').innerHTML += message;
        document.getElementById("chat").value = "";
    }

    else if (reply == "Great! So how do I get the lessons started?") {
        var message = `
        <div class="chat" style="background-color: rgb(225, 239, 245);">
            <p><b>Yimeng:</b></p>
            <p>${reply}</p>
            <span class="time-right">11:03</span>
        </div>

        <div class="chat" style="background-color: pink;">
            <p><b>TalentXchange</b></p>
            <p>Selena would like to match with you</p>
            <button type="button" class="btn btn-warning" onClick="accept()">Click here to confirm</button>
            <span class="time-right">11:08</span>
        </div>
        `;

        document.getElementById('addOn').innerHTML += message;
        document.getElementById("chat").value = "";
    }

    else if (reply == "Okay will do so!") {
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
        <p><b>You are now matched with Selena</b></p>
        <span class="time-right">11:14</span>
    </div>
    `;

    document.getElementById('addOn').innerHTML += message;
    document.getElementById("chat").value = "";
}
