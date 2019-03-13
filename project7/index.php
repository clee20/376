<!DOCTYPE html>
<html>
    <head>
        <title>Side Step</title>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="scripts.js?<?php echo rand(); ?>"></script>
        
        <link rel="stylesheet" type="text/css" href="styles.css?<?php echo rand(); ?>" />
    </head>
    
    <body>
        <svg width="800" height="700">
        <!--board-->
            
            <g id="box">
                <rect x="300" y="50" width="25" height="50"/>
                
            </g>

            <g id="box2">
                <rect x="400" y="50" width="25" height="50"/>
            </g>
            
            <g>
                <rect id="leftButton" onclick="moveLeft()" x="600" y="610" width="50" height="50"/>
                <rect id="rightButton" onclick="moveRight()" x="700" y="610" width="50" height="50"/>
            <g>
            
            <text id="text" x="675" y="270">BOX CATCH</text>
            
        <div id="controls">
            <button onclick="moveBall()">Click to Start!</button>            
        </div>
        
        <div id ="animate"></div>

            

        
    </body>
    
</html>
