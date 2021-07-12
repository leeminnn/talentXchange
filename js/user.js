const YOUTUBE_API_KEY = "";

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
    
    var url = "../app/api/talent/readOne.php?username=" + username;

    request.open("GET", url, true);
    request.send();
}

function display_details(xml){
    var response_json = JSON.parse(xml.responseText);
    // var records = output.records;

    var userInfo = `
    <div class="details__cover">
        <img src="img/cards/${response_json.bio.img}" alt="">
    </div>

    <div class="details__wrap">
        <h1 class="details__title">${response_json.username.toUpperCase()}</h1>

        <ul class="details__list">
            <li><span>Gender:</span> ${response_json.bio.gender.toUpperCase()}</li>
            <li><span>Age:</span> ${response_json.bio.age}</li>
            <li><span>Category:</span>${response_json.talent.talent_cat.toUpperCase()}</li>
            <li><span>Skill:</span> ${response_json.talent.skill}</li>
            <li><span>Year of experience:</span> ${response_json.talent.yr_exp}</li>
        </ul>
    </div>    
    `;
    showComments(response_json.username);
    call_youtube_api(response_json.username,response_json.talent.skill);
    var youtube =
    `<!-- YouTube Model -->
    <div class="container">
        <iframe id="iframe_${response_json.username}" width="560" height="315" src="" frameborder="0" 
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>

    <!-- YouTube Modal Ends Here -->`;
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
        var url = '../app/api/talent/readRating.php?username=' + username;
        request.open("GET", url, true);
        
        // Step 4
        request.send();
}


function get_user_details() {
    var username = document.getElementById("username").innerText;
    console.log(username);
    var request = new XMLHttpRequest();
    request.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            display_user_details(this);
        }
    }
    
    var url = "../app/api/talent/readOne.php?username=" + username;

    request.open("GET", url, true);
    request.send();
}

function display_user_details(xml){
    var response_json = JSON.parse(xml.responseText);
    // var records = output.records;

    var image = `<img src="img/cards/${response_json.bio.img}" alt="" 
                style="width: 30px;
                height: 30px;
                border-radius: 50%;
                margin-right: 10px;
                border: 1px solid #795ab0;">
                
                <span>${response_json.username}</span>`;
    var img = `<img src="img/cards/${response_json.bio.img}" alt="" style="margin-top:60px;">`;
    var firstname = `${response_json.bio.firstname}`;
    var lastname = `${response_json.bio.lastname}`;
    var email = `${response_json.bio.email}`;
    var bio = `${response_json.bio.bio}`;
    var age = `${response_json.bio.age}`;
    var occupation = `${response_json.bio.occupation}`;
    var prevschool = `${response_json.bio.prevschool}`;
    var addr = `${response_json.address.addr}`;
    var region = `${response_json.address.region}`;
    var country = `${response_json.address.country}`;
    var postal = `${response_json.address.postal}`;
    var the_skill = `${response_json.talent.skill}`;
    var skill = `${the_skill[0].toUpperCase() + the_skill.slice(1)}`;

    document.getElementById("username_and_img").innerHTML= image;
    document.getElementById("img").innerHTML= img;
    document.getElementById("age").innerHTML= age;
    document.getElementById("occupation").value= occupation;
    document.getElementById("prevschool").value= prevschool;
    document.getElementById("email").value = email;
    document.getElementById("region").value = region;
    document.getElementById("country").value = country;
    document.getElementById("occ").innerHTML = occupation;
    document.getElementById("prevsch").innerHTML = prevschool;
    document.getElementById("reg").innerHTML = region;
    document.getElementById("cty").innerHTML = country;
    document.getElementById("firstname").value = firstname;
    document.getElementById("lastname").value = lastname;
    document.getElementById("bio").value = bio;
    document.getElementById("addr").value = addr;
    document.getElementById("postal").value = postal;
    document.getElementById("skill").value = skill;


}