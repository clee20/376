var POS_X = 0;
var POS_Y = 100;
var SLIDE = 1;
var NUM = Math.floor((Math.random() * 2) + 1);
var LEFT = 0;
var RIGHT = 0;

function moveLeft() {
    $("#box2").css("visibility", "hidden");
    $("#box").css("visibility", "visible");
    console.log("hi");
    console.log("click left");
    LEFT = 1;
    RIGHT = 0;
}

function moveRight() {
    $("#box").css("visibility", "hidden");
    $("#box2").css("visibility", "visible");
    console.log("hi");
    console.log("click right");
    LEFT = 0;
    RIGHT = 1;
}

function moveBall() {
    var elem = document.getElementById("animate");   
    var id = setInterval(frame, 5);
    
    function frame() {
        if (SLIDE == 1) {
            POS_X++;
            elem.style.left = POS_X + "px";
        }        
        if (NUM == 1 && POS_X == 305) {
            SLIDE = 0;
            POS_X = 305;
            POS_Y++;
            elem.style.bottom = POS_Y + "px";
        }     
        if (NUM == 2 && POS_X == 405) {
            SLIDE = 0;
            POS_X = 405;
            POS_Y++;
            elem.style.bottom = POS_Y + "px";
        }
        
    checkWin();
    
    }
}

function checkWin () {
    if (NUM == 1 && POS_Y == 700 && LEFT == 1) {
        $("#text").text("YOU WIN!");
    } else if (NUM == 2 && POS_Y == 700 && RIGHT == 1) {
        $("#text").text("YOU WIN!");
    } 
}
