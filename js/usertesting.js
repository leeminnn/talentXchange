const YOUTUBE_API_KEY = "AIzaSyAJvrOHonEGRcLLSLkeFjPFrdxs9jeVTwk";

function call_youtube_api(username,skill){
    var getSearchTerm = encodeURI(username + skill);
    var url = `https://www.googleapis.com/youtube/v3/search?part=snippet&maxResults=1&q=${getSearchTerm}&key=${YOUTUBE_API_KEY}`;

    fetch(url)
    .then(response => response.json())
    .then(data => {
        //console.log(data.items[0].id.videoId);
        //console.log above is to help access proper data in the JSON
        //object
        //set iframe source to proper URL (notice same dynamic strings 
        //used above)
        document.getElementById("iframe_" + username).setAttribute("src", `https://www.youtube.com/embed/${data.items[0].id.videoId}`);
    });
}

function call_user_api(){
    var username = document.getElementById("username").innerText;
    console.log(username);
    var request = new XMLHttpRequest();
    request.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            display_details(this);
        }
    }
    
    var url = "../talent/api/talent/readOne.php?username=" + username;

    request.open("GET", url, true);
    request.send();
}

function display_details(xml){
    var response_json = JSON.parse(xml.responseText);
    // var records = output.records;
    
    var userInfo = `
    <div class="row">
        <div class="col-md-5">
            <div class="container">
                <img src="img/cards/${response_json.bio.img}" style="width:100%">
            </div>
        </div>
        <div class="col-md-7">
            <div class="container">
                    <p class="text-muted" style="text-align:left;">
                        <span class="h2">${response_json.username.toUpperCase()}</span>
                     </p>
                <dl class="row">
                    <dt class="col-xl-5 col-sm-3">Gender</dt>
                    <dd class="col-xl-7 col-sm-9">${response_json.bio.gender.toUpperCase()}</dd>

                    <dt class="col-xl-5 col-sm-3">Age</dt>
                    <dd class="col-xl-7 col-sm-9">${response_json.bio.age}</dd>

                    <dt class="col-xl-5 col-sm-3">Category</dt>
                    <dd class="col-xl-7 col-sm-9">${response_json.talent.talent_cat.toUpperCase()}</dd>

                    <dt class="col-xl-5 col-sm-3">Skill</dt>
                    <dd class="col-xl-7 col-sm-9">${response_json.talent.skill.toUpperCase()}</dd>

                    <dt class="col-xl-5 col-sm-3">Year of experience</dt>
                    <dd class="col-xl-7 col-sm-9">${response_json.talent.yr_exp}</dd>

                    <dt class="col-xl-5 col-sm-3">Country/Region</dt>
                    <dd class="col-xl-7 col-sm-9">${response_json.address.country} / ${response_json.address.region}</dd>

                    <dt class="col-xl-5 col-sm-3">Meeting Location</dt>
                    <dd class="col-xl-7 col-sm-9">${response_json.address.addr}, <span id="postal">${response_json.address.postal}</span></dd>

                </dl>
            </div>
        </div> 
    </div>
    `;
    showComments(response_json.username);
    call_youtube_api(response_json.username,response_json.talent.skill);
    var youtube =`
    <div class="container">
        <iframe id="iframe_${response_json.username}" width="560" height="315" src="" frameborder="0" 
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    `;
    document.getElementById("userInfo").innerHTML = userInfo;
    document.getElementById("youtube").innerHTML = youtube;
}

function showComments(username){
    // var username = document.getElementById("username").value;
    
    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        
        // Step 5 - Check if response is ready!
        if( this.readyState == 4 && this.status == 200 ) {
            var response_json = JSON.parse(this.responseText);            
            var comments = response_json.records;
            
            var details = '';
            for(var comment of comments){
                details += `
                <li class="comments__item">
                    <div class="comments__autor">
                        <img class="comments__avatar" src="img/user.svg" alt="">
                        <span class="comments__name">${comment.commenter.toUpperCase()}</span>
                        <span class="badge badge-warning" style="float:right;font-size:1em;">${comment.rating}/5</span>
                        <span class="comments__time">${comment.postDate}</span>
                    </div>
                    <p class="comments__text">${comment.description}</p>
                </li>
                
                
                
                `;
            }
                
            document.getElementById("comment_no").innerText = comments.length;    
            document.getElementById("comments").innerHTML = details;
            
        }
        
    }
    
        // Step 3        
        var url = '../talent/api/talent/readRating.php?username=' + username;
        request.open("GET", url, true);
        
        // Step 4
        request.send();
}


