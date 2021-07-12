function display_favorite() {

    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        
        // Step 5 - Check if response is ready!
        if( this.readyState == 4 && this.status == 200 ) {
            var response_json = JSON.parse(this.responseText);
            var talents = response_json.records;

            var coach = '';
            var counter = 0;
            for (var talent of talents){
                counter += 1;
                coach += `
                <div class="col-12 col-sm-6 col-xl-4">
                    <div class="card">
                        <a href="detailstesting.php?username=${talent.username}" class="card__cover">
                            <img style="background-image:url(img/cards/${talent.bio.img})" alt="">
                            <span class="card__rate"><svg xmlns='http://www.w3.org/2000/svg' width='512' height='512' viewBox='0 0 512 512'><path d='M394,480a16,16,0,0,1-9.39-3L256,383.76,127.39,477a16,16,0,0,1-24.55-18.08L153,310.35,23,221.2A16,16,0,0,1,32,192H192.38l48.4-148.95a16,16,0,0,1,30.44,0l48.4,149H480a16,16,0,0,1,9.05,29.2L359,310.35l50.13,148.53A16,16,0,0,1,394,480Z'/></svg> 4.8</span>
                        </a>

                        <div class="card__title">
                            <h3><a href="detailstesting.php?username=${talent.username}" id="user${counter}" name="${talent.username}">${talent.username.toUpperCase()}</a></h3>
                            <h5>${talent.talent.skill.toUpperCase()} - ${talent.talent.yr_exp} Years Experience</h5>
                            <span>${talent.bio.bio}</span>
                        </div>

                        <div class="card__actions">
                            <button class="card__buy" type="button">
                                <a href="detailstesting.php?username=${talent.username}"> More details</a>
                            </button>
                            <button id="like${counter}" value="2" class="card__favorite" type="button" onclick="fav(${counter})">
                                <svg xmlns='http://www.w3.org/2000/svg' id='path1' width='512' height='512' viewBox='0 0 512 512'><path d='M352.92,80C288,80,256,144,256,144s-32-64-96.92-64C106.32,80,64.54,124.14,64,176.81c-1.1,109.33,86.73,187.08,183,252.42a16,16,0,0,0,18,0c96.26-65.34,184.09-143.09,183-252.42C447.46,124.14,405.68,80,352.92,80Z' style='fill:red;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/></svg>
                            </button>
                            
                        </div>
                    </div>
                </div>
                        
                        
                `;


            }
            document.getElementById("coach").innerHTML = coach;
            
        }
        
    }
    
        // Step 3        
        var url = '../app/api/talent/readFavUser.php?username=YiMeng';
        request.open("GET", url, true);
        
        // Step 4
        request.send();
}

function fav(counter){
    var id = "like"+counter;
    var v = document.getElementById(id).value;
    console.log(v);
    var userid = "user"+counter;
    var favuser = document.getElementById(userid).innerText;
    console.log(favuser);
    if (v == 1){
        document.getElementById(id).innerHTML = "<svg xmlns='http://www.w3.org/2000/svg' id='path1' width='512' height='512' viewBox='0 0 512 512'><path d='M352.92,80C288,80,256,144,256,144s-32-64-96.92-64C106.32,80,64.54,124.14,64,176.81c-1.1,109.33,86.73,187.08,183,252.42a16,16,0,0,0,18,0c96.26-65.34,184.09-143.09,183-252.42C447.46,124.14,405.68,80,352.92,80Z' style='fill:red;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/></svg>";
        document.getElementById(id).value = 2;      

    }else if (v == 2){
        document.getElementById(id).innerHTML = "<svg xmlns='http://www.w3.org/2000/svg' id='path1' width='512' height='512' viewBox='0 0 512 512'><path d='M352.92,80C288,80,256,144,256,144s-32-64-96.92-64C106.32,80,64.54,124.14,64,176.81c-1.1,109.33,86.73,187.08,183,252.42a16,16,0,0,0,18,0c96.26-65.34,184.09-143.09,183-252.42C447.46,124.14,405.68,80,352.92,80Z' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/></svg>";
        document.getElementById(id).value = 1;
    }

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
        }
    };
    var url = `process_favorites.php?username=YiMeng&favuser=${favuser}&v=`+v;
    // console.log(url); return;
    xmlhttp.open("GET", url , true);
    xmlhttp.send();

}

