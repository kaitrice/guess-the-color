var heading = document.querySelector("h1");
var displayColor = document.getElementById("colorDisplay");
var displayScore = document.getElementById("score");
var selected = document.getElementsByClassName("selected");

var levels = document.querySelectorAll(".difficulty");
var easy = document.getElementById("easy");
var med = document.getElementById("medium");
var hard = document.getElementById("hard");
levels[0].classList.add("selected");


var mode = document.querySelectorAll(".game");
var rgbBtn = document.getElementById("rgb");
var hexBtn = document.getElementById("hex");
var gameMode = "RGB";
mode[0].classList.add("selected");

var reset = document.querySelector("#reset");

var numSqrs = 3;
var sqrs = document.querySelectorAll(".square");

var colors = [];
var winColor;
var userColor;

var pts = 3;
var score = 0;

/*
Funciton: getRBG()
Parameters: 
    null
Returns: randomized rgb value
*/
function getRGB() {
    var r = Math.floor(Math.random() * 256);
    var g = Math.floor(Math.random() * 256);
    var b = Math.floor(Math.random() * 256);

    return "rgb(" + r + ", " + g + ", " + b + ")";
}

/*
Funciton: getHEX()
Parameters: 
    null
Returns: randomized hex value
*/
function getHEX(){
    
    var digits = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, "a", "b", "c", "d", "e", "f"];
    var hexidecimal = "#";

    while (hexidecimal.length < 7){
        hexidecimal += digits[Math.floor(Math.random() * digits.length)];
    }

    return hexidecimal;
} 

/*
Funciton: rgb2hex()
Parameters: 
    rgb
Returns: converted rgb to hex value
*/
function rgb2hex(rgb) {
    if (rgb.search("rgb") == -1) {
        return rgb;
    } else {
        var sep;
        if (rgb.indexOf(",") > -1) {
            sep = ",";
        } else {
            sep = " ";
        }
        rgb = rgb.substr(4).split(")")[0].split(sep);
        
        var r = (+rgb[0]).toString(16);
        var g = (+rgb[1]).toString(16);
        var b = (+rgb[2]).toString(16);
  
        if (r.length == 1) {
            r = "0" + r;
        }
        if (g.length == 1) {
            g = "0" + g;
        }   
        if (b.length == 1) {
            b = "0" + b;
        } 
  
        return "#" + r + g + b;
    } 
  }

/*
Funciton: setColors()
Parameters: 
    numSqr, number of squares
Returns: array of color values
*/
function setColors(numSqr){
    if (gameMode == "RGB"){
        for (var i = 0; i < numSqrs; i++){
            colors[i] = getRGB();
        }
    } else {
        for (var i = 0; i < numSqrs; i++){
            colors[i] = getHEX();
        }
    }
    return colors;
}

/*
Function: pickColor
Parameters: 
    null
Returns: value of color array at a random index
        * Note: initialize winningColor 
*/
function pickColor(){
    var index = Math.floor(Math.random() * colors.length);
    return colors[index];
}

/*
Function: changeColor 
Parameters:
    clr, color value
Returns: null
    sets all color to clr
*/
function changeColor(clr){
    heading.style.background = clr;
    displayScore.style.color = clr;
    reset.style.color = clr;

    for (var i = 0; i < levels.length; i++){
        levels[i].style.color = clr;
    }
    for (var i = 0; i < mode.length; i++){
        mode[i].style.color = clr;
    }
    for (var i = 0; i < sqrs.length; i++){
        sqrs[i].innerHTML = " ";
    }
    selected[0].style.background = clr;
    selected[0].style.color = "#fff";
    selected[1].style.background = clr;
    selected[1].style.color = "#fff";
}

/*
Function: setupLevels
Parameters:
    null
Returns: null
    set numSqrs according to level chosen
*/
function setupLevels(){
    easy.addEventListener("click", function(){
        numSqrs = 3;
        
        med.style.background = "none";
        med.style.color = "#09cb30";
        hard.style.background = "none";
        hard.style.color = "#09cb30";

        easy.classList.remove("selected");
        med.classList.remove("selected");
        hard.classList.remove("selected");

        this.classList.add("selected");

        score = 0;
        displayScore.textContent = score;
        
        gameReset();
    });
    
    med.addEventListener("click", function(){
        numSqrs = 6;
        
        easy.style.background = "none";
        easy.style.color = "#09cb30";
        hard.style.background = "none";
        hard.style.color = "#09cb30";

        easy.classList.remove("selected");
        med.classList.remove("selected");
        hard.classList.remove("selected");

        this.classList.add("selected");

        score = 0;
        displayScore.textContent = score;
    
        gameReset();
    });
    
    hard.addEventListener("click", function(){
        numSqrs = 9;
        
        easy.style.background = "none";
        easy.style.color = "#09cb30";
        med.style.background = "none";
        med.style.color = "#09cb30";

        easy.classList.remove("selected");
        med.classList.remove("selected");
        hard.classList.remove("selected");

        this.classList.add("selected");

        score = 0;
        displayScore.textContent = score;
        
        gameReset();
    });
}

/*
Function: setupMode
Parameters:
    null
Returns: null
    set gameMode to either rgb or hex
*/
function setupMode() {
    for (var i = 0; i < mode.length; i++){
        mode[i].addEventListener("click", function(){
            score = 0;

            for (var i = 0; i < mode.length; i++) {
                mode[i].style.background = "none";
                mode[i].style.color = "#09cb30";

                mode[i].classList.remove("selected");
            }

            this.classList.add("selected");
            
            if (this.textContent == "RGB"){
                gameMode = "RGB";
            } else {
                gameMode = "HEX";
            }

            gameReset();
        });
    }
}

/*
Function: setupSqrs
Parameters:
    null
Returns: null
    set square gameplay
*/
function setupSqrs(){
    for (var i = 0; i < sqrs.length; i++){
        sqrs[i].addEventListener("click", function(){
            userColor = this.style.background;

            if (gameMode == "HEX") {
                userColor = rgb2hex(userColor);
            }

            if(userColor == winColor){
                winReset();
            } else {
                pts--;
                this.style.color = this.style.background;
                this.textContent = userColor;
                this.style.background = "#2d2d2d";
            }
        });
        displayScore.textContent = "Score: " + score;
    }
}

/*
Function: gameReset
Parameters:
    null
Returns: null
    resets gameplay
*/
function gameReset(){
    colors = [];
    displayScore.textContent = "Score: " + score;
    reset.textContent = "New Colors";

    colors = setColors(numSqrs);
    winColor = pickColor();
    displayColor.textContent = winColor;
    changeColor("#09cb30");


    switch(numSqrs){
        case 3:
            pts = 3;
            break;
        case 6: 
            pts = 6;
            break;
        case 9: 
            pts = 9;
            break;
        default:
            pts = 3;
    }

    for (var i = 0; i < sqrs.length; i++){
        sqrs[i].innerHTML = " ";
        if (colors[i]){
            sqrs[i].style.display = "block";
            sqrs[i].style.background = colors[i];
        } else {
            sqrs[i].style.display = "none";
        }
    }
}

/*
Function: winReset
Parameters:
    null
Returns: null
    user choice, resets game board or show winning board
*/
function winReset(){
    score += pts;
    displayScore.textContent = "Score: " + score;
    if (confirm("You Won! Play again?")){
        gameReset();
    } else {
        pts = 0;
        reset.textContent = "Play Again?";
        for (var i = 0; i < numSqrs; i++){
            sqrs[i].style.background = winColor;
            sqrs[i].innerHTML = " ";
        }
        changeColor(winColor);
    }
}

// set click for reset button
reset.addEventListener("click", function(){
    gameReset();
});

/*
Function: initialize
Parameters:
    null
Returns: null
    start gameplay
*/
function initialize(){
    setupLevels();
    setupMode();
    setupSqrs();
    
    gameReset();
}

initialize();