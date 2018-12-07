function getValue(id) {
    return parseFloat(document.getElementById(id).value);
}

function writeResult(result, elementId) {
    document.getElementById(elementId).innerHTML = result;
}

function pythagTheorm() {
    var value1 = getValue("a");
    var value2 = getValue("b");
        
    var aB = value1 * value1 + value2 * value2;
    var final = Math.sqrt(aB);
    
    writeResult(final, "resultPT");
}

function areaOfTri() {
    var value1 = getValue("base");
    var value2 = getValue("height");
    
    var base = value1 * .5;
    
    writeResult(base * value2, "resultT");
}

function lastAngleMeasure() {
    var value1 = getValue("angle1");
    var value2 = getValue("angle2");
    
    if (value1 + value2 < 180) {
        writeResult(180 - (value1 + value2), "resultA");
    } else {
        writeResult("Angles can not be greater than 180", "resultA");
    }
    
    
}