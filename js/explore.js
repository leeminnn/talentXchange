function start(){
    display_default()
    showTop3()  
    get_user_details()  
}

function display_default() {

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

                            <button id="like${counter}" value="1" class="card__favorite" type="button" onclick="fav(${counter})">
                                <svg xmlns='http://www.w3.org/2000/svg' id='path1' width='512' height='512' viewBox='0 0 512 512'><path d='M352.92,80C288,80,256,144,256,144s-32-64-96.92-64C106.32,80,64.54,124.14,64,176.81c-1.1,109.33,86.73,187.08,183,252.42a16,16,0,0,0,18,0c96.26-65.34,184.09-143.09,183-252.42C447.46,124.14,405.68,80,352.92,80Z' style='fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/></svg>
                            </button>                            
                        </div>
                    </div>
                </div>`;
                            
                            
                
            }
            document.getElementById("coach").innerHTML = coach;
            
        }
        
    }
    
        // Step 3        
        var url = '../app/api/talent/read.php';
        request.open("GET", url, true);
        
        // Step 4
        request.send();
}


function showTop3(){
    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
     // Step 5 - Check if response is ready!
     if( this.readyState == 4 && this.status == 200 ) {
        var response_json = JSON.parse(this.responseText);
        var ratings = response_json.records;
        // console.log(ratings)

        var dict = {};
       // to store the coach as a key and calculate their rating value in later part
        for (var a of ratings){
           dict[a.username] = 0.0;
        }
        // console.log(dict);
        // loop through the ratings and calculate the avg ratings and store into dict
        for (const [key, value] of Object.entries(dict)) {
           var count = 0;
           var totalAMt = 0.0;
           for(var object of ratings){
               if(key == object.username){
                   count +=1;
                   totalAMt += parseFloat(object.rating);
               }
           }
           avg = totalAMt/count;
        //    console.log(avg);
           dict[key] = avg.toFixed(2);

        }
        // console.log(dict);   

        // use the dictionary sort function to sort the ratings from high to low
        top_dict = sort_object(dict);
        // console.log(top3_dict)

    
        top_rated_dict = {}
        for (var key in top_dict) {
            // check if the property/key is defined in the object itself, not in parent
            if (top_dict.hasOwnProperty(key)) {  
                if(top_dict[key] >=4.50) 
                top_rated_dict[key] = top_dict[key]      
          
            }
        }


        top_rated_photo_dict = {}
        for( var a of ratings){
            for(var key in top_rated_dict){
                if (a.username == key){
                    top_rated_photo_dict[key] = [top_rated_dict[key],(a.bio.img)]
                }
            }
        }
        console.log(top_rated_photo_dict)
        // get the top3 dictionary key and value

        // console.log(Object.keys(top_rated_photo_dict)[0],Object.values(top_rated_photo_dict)[0][0],Object.values(top_rated_photo_dict)[0][1]);
        // console.log(Object.keys(top_rated_photo_dict)[1],Object.values(top_rated_photo_dict)[1][0],Object.values(top_rated_photo_dict)[1][1]);

        


        all_top = "";
        var top1 = `                 
                   <div class="carousel-item active">
                        <p><a href="../app/detailstesting.php?username=${Object.keys(top_rated_photo_dict)[0]}">
                       <img src="img/cards/${Object.values(top_rated_photo_dict)[0][1]}" class="d-block w-100" alt="...">
                       
                       <div class="carousel-caption ">
                           <h3><b>${Object.keys(top_rated_photo_dict)[0]}</b></h3>
                           <h4>Overall Rating: ${Object.values(top_rated_photo_dict)[0][0]}/5</h4>
                       </div>
                    </div>`;

        var top = '';
        for (var i = 1; i <(Object.keys(top_rated_photo_dict).length-1); i++){
            top += `                  
                <div class="carousel-item">
                <p><a href="../app/detailstesting.php?username=${Object.keys(top_rated_photo_dict)[i]}">
                <img src="img/cards/${Object.values(top_rated_photo_dict)[i][1]}" class="d-block w-100" alt="...">
                </a></p>
                <div class="carousel-caption">
                    <h3><b>${Object.keys(top_rated_photo_dict)[i]}</b></h3>
                    <h4>Overall Rating: ${Object.values(top_rated_photo_dict)[i][0]}/5</h4>
                </div>
            </div>`;
        
        }
        all_top = top1+top;
        document.getElementById("top3coaches").innerHTML = all_top;      
        } 
    }
        // Step 3 
        var url = '../app/api/talent/readAllRatings.php';       
        request.open("GET", url, true);

        // Step 4
        request.send();
} 

function sort_object(obj) {
    items = Object.keys(obj).map(function(key) {
        return [key, obj[key]];
    });
    items.sort(function(first, second) {
        return second[1] - first[1];
    });
    sorted_obj={}
    $.each(items, function(k, v) {
        use_key = v[0]
        use_value = v[1]
        sorted_obj[use_key] = use_value
    })
    return(sorted_obj)
}  

// function sortobj(obj)
// {
//     var keys=Object.keys(obj);
//     var kva= keys.map(function(k,i)
//     {
//         return [k,obj[k]];
//     });
//     kva.sort(function(a,b){
//         if(a[1]>b[1]) return -1;if(a[1]<b[1]) return 1;
//         return 0
//     });
//     var o={}
//     kva.forEach(function(a){ o[a[0]]=a[1]})
//     return o;
// }


function fav(username){
    var id = "like"+username;
    var v = document.getElementById(id).value;
    //console.log(v);
    var userid = "user"+username;
    var favuser = document.getElementById(userid).innerText;
    //console.log(favuser);
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
    document.getElementById("username_and_img").innerHTML= image;

}

// function getFavuser(username){
//     var id = "like"+username;
//     // var v = document.getElementById(id).value;
//     //console.log(v);
//     // var userid = username;
    
//     //console.log(favuser);
//     var xmlhttp = new XMLHttpRequest();
//     xmlhttp.onreadystatechange = function() {
//         if (this.readyState == 4 && this.status == 200) {
//             var user = JSON.parse(this.responseText);
      
//         }
//     };
//     var url = `../app/api/talent/readFavUsername.php?username=Supreme Leader`;
//     // console.log(url); return;
//     xmlhttp.open("GET", url , true);
//     xmlhttp.send();

// }