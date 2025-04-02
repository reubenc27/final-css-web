count = 1;

var img = document.getElementById('images');


function nextSlide() {
    count += 1; 
    
    if (count === 4) { 
        count = 1;
    }

    var imgPath = "./img/img-" + count + ".jpg"; 
    img.src = imgPath;  
    img.alt = "Image " + count; 
}

function prevSlide() {
    count -= 1;

    if (count === 0) {
        count = 3;
    }
    imgPath = "./img/img-" + count + ".jpg"; 
    img.src = "./img/img-" + count + ".jpg";  
    img.alt = "Image " + count;
}

