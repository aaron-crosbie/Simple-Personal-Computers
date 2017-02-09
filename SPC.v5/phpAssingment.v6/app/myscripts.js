function selectedBuild(value){
    if(value === 'office'){
        document.getElementById('office').style.display = 'block';
        document.getElementById('video').style.display = 'none';
        document.getElementById('gaming').style.display = 'none';
    }
    else if(value === 'video'){
        document.getElementById('video').style.display = 'block';
        document.getElementById('gaming').style.display = 'none';
        document.getElementById('office').style.display = 'none';
    }
    else{
        document.getElementById('gaming').style.display = 'block';
        document.getElementById('video').style.display = 'none';
        document.getElementById('office').style.display = 'none';
    }
}
