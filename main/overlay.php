<div id="overlay" style=" position: fixed; 
display: none; 
width: 100%; 
height: 100%; 
top: 0;
left: 0;
right: 0;
bottom: 0
background-color: rgba(0,0,0,0.5); 
z-index: 2; 
cursor: pointer; " onclick="off()"></div>
<script>
    function on() {
        document.getElementById("overlay").style.display = "block";
    }

    function off() {
        document.getElementById("overlay").style.display = "none";
    }
</script>


<div id="overlay2" style=" position: fixed; 
display: none; 
width: 100%; 
height: 100%; 
top: 0;
left: 0;
right: 0;
bottom: 0;
background-color: rgba(0,0,0); 
z-index: 1000; 
cursor: pointer; " onclick="off2()"></div>
<script>
    function on1() {
        document.getElementById("overlay2").style.display = "block";
    }

    function off2() {
        document.getElementById("overlay2").style.display = "none";
    }
</script>