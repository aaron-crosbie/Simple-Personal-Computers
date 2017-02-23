window.onload = initAll;
var xhr = false;
var statesArray = new Array();

function initAll() {
// We want to take what user enters into searchField so when user leaves field, ie onkeyup call
// function searchSuggest
    document.getElementById("searchField").onkeyup = searchSuggest;

    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    }
    else {
        if (window.ActiveXObject) {
            try {
                xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch (e) { }
        }
    }

    if (xhr) {

        // when the browser changes state call function setStatesArray
        xhr.onreadystatechange = setStatesArray;
        // Get the us-states.xml file async
        xhr.open("GET", "us-states.xml", true);
        // send the request to the server
        xhr.send(null);
    }
    else {
        alert("Sorry, but I couldn't create an XMLHttpRequest");
    }
}

function setStatesArray() {
    if (xhr.readyState == 4) {
        if (xhr.status == 200) {
            // if got xml details file

            if (xhr.responseXML) {
                // get tags with item as tag name and store in allStates array
                var allStates = xhr.responseXML.getElementsByTagName("item");
                for (var i=0; i<allStates.length; i++) {
                    // store the text value of the label tags in the statesArray, ie the state name
                    statesArray[i] = allStates[i].getElementsByTagName("label")[0].firstChild;
                }
            }
        }
        else {
            alert("There was a problem with the request " + xhr.status);
        }
    }
}

function searchSuggest() {
    // Any time the user enters a value it's stored in str
    var str = document.getElementById("searchField").value;
    // set className to blank and will set it to error later on if there is an error
    document.getElementById("searchField").className = "";

    if (str != "") {
        // set popups to be blank
        document.getElementById("popups").innerHTML = "";

        for (var i=0; i<statesArray.length; i++) {
            // store the state that is saved in the ith position in the statesArray
            var thisState = statesArray[i].nodeValue;
            // str is what user entered and if equal to value in thisState array
            // ie if type in 'new' then will be true for values = 'new york'

            if (thisState.toLowerCase().indexOf(str.toLowerCase()) == 0) {
                var tempDiv = document.createElement("div");
                // what was grabbed out of statesArray
                tempDiv.innerHTML = thisState;
                // if user scroll overs it and clicks it call function makeChoice
                tempDiv.onclick = makeChoice;
                tempDiv.className = "suggestions";
                // append a child to the popups with the tempDiv details, ie the state
                document.getElementById("popups").appendChild(tempDiv);
            }
        }
        // store how many states were found
        var foundCt = document.getElementById("popups").childNodes.length;
        // if havent found any searchfield turns yellow, initialised in css file
        if (foundCt == 0) {
            document.getElementById("searchField").className = "error";
        }
        // if only found 1 state set searchField value to value of state
        if (foundCt == 1) {
            document.getElementById("searchField").value = document.getElementById("popups").firstChild.innerHTML;
            // blank out popup as no point having a pop-up once you have filled out that field
            document.getElementById("popups").innerHTML = "";
        }
    }
}

function makeChoice(evt) {
// if evt exists set to evt.target, which is the name of the state
    var thisDiv = (evt) ? evt.target : window.event.srcElement;
    // set the searchField to the name of the selected state
    document.getElementById("searchField").value = thisDiv.innerHTML;
    document.getElementById("popups").innerHTML = "";
}
