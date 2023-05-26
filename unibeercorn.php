<?php
require 'includes/dbh.inc.php';
?>
<!DOCTYPE html> 
<html> 
<head> 
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Concert+One&display=swap" rel="stylesheet">
    <title>UniBeerCorn</title>

    <!-- AUDIO -->
<!-- <script>
window.onload = function() {
    var context = new AudioContext();
}
</script> -->
    
</head> 
<body onload="backgroundLoadImg()" style="background-color: black;"> 
    <div>
    
    <canvas id="canvas1" height="900px" width="450px" style="border: 1px solid black;"></canvas>
    <canvas id="canvas2" height="900px" width="450px"></canvas>
    <canvas id="canvas3" height="900px" width="450px"></canvas>
    <!-- <canvas id="canvas4" height="900px" width="450px"></canvas> -->
    <canvas id="canvas5" height="900px" width="450px"></canvas>  
    <canvas id="beercanvas" class="beerlevel" height="250px" width="50px"></canvas>
    <canvas id="ultcanvas" height="900px" width="450px"></canvas> 
     
    </div>
    <h2 class="chooseChar">Choose your character</h2>
    <button id="alienID" class="alien-but" onclick="changeChar()"></button>
    <button id="unicornID" class="unicorn-but" onclick="changeToUni()"></button>
<!-- AUDIO -->
<!-- <audio autoplay>
    <source src="audio/rushardbass.mp3">
</audio> -->
<div class="level">
    <h1>Score: <input type="text" id="currentscore" value="" readonly/></h1>
    <div id="life1"><img id="unichar" src="unicornchar.png" alt=""></div>
    <div id="life2"><img id="unichar" src="unicornchar.png" alt=""></div> 
    <div id="life3"><img id="unichar" src="unicornchar.png" alt=""></div>
    <div id="alienlife1"><img src="alienchar.png" alt=""></div>
    <div id="alienlife2"><img src="alienchar.png" alt=""></div> 
    <div id="alienlife3"><img src="alienchar.png" alt=""></div>    
</div>

<div id="fullbeer">

</div>
<div class="wrapperBegin">
    <div class="beginGame">
        <button id="gameStartButton" onclick="onclickBegin(); disappear();">Begin Game</button>
    </div>
    <form id="submitForm" class="totheright" action="includes/highscore.inc.php" method="POST">
        <h1>Game Over</h1>
        <input type="text" name="username" placeholder="Name">
        <input id="scoreAmount" type="hidden" name="score" value="">
        <button type="submit" name="hsSub">submit score</button>
    </form>
    <div class="replayWrap">
        <form action="randomtry.php">
            <button id="replayId" class="totheright2">Replay</button>
        </form>
    </div>
</div>


<div class="white-text">
    <h2>Controls</h2>
    <p>Move left: Left arrow key</p>
    <p>Move right: Right arrow key</p>
    <p>Special meter: Space bar</p>
</div>
<?php

//get the highscores from the database
getHighscore($conn);
function getHighscore($conn){
    $sql ="SELECT * FROM highscore ORDER BY highScoreVAL DESC LIMIT 10";
    $result = $conn->query($sql);
    echo "<div class='showscore-div'><h1>";
    echo "Top 10 Highscores";
    echo "</h1>";
    while ($row = $result->fetch_assoc()){
        $username = $row['userName'];
        $scoreVal = $row['highScoreVAL'];
        echo "<div class='showscore-rows'><p>";
        echo $row['userName']." ";
        echo "</p><p class='float-right push-up'>";
        echo $row['highScoreVAL']."<br>";
        echo "</p></div>";
    }
}
    


?>


</body> 
</html> 
  
<script src="main_javascript.js"></script>
<script src="secondjs.js"></script>  