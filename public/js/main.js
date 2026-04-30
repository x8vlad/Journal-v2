console.log("All works");

function showAuthBlocks(){
    document.getElementById('signInLink').addEventListener("click", function (){
        document.getElementById('headerRegister').style.display = "none";
        document.getElementById('headerLogin').style.display = "block";
        document.getElementById('registerBlock').style.display = "none";
        document.getElementById('loginBlock').style.display = "block";
    });

    document.getElementById('registerInLink').addEventListener("click", function (){
        document.getElementById('headerRegister').style.display = "block";
        document.getElementById('headerLogin').style.display = "none";
        document.getElementById('loginBlock').style.display = "none";
        document.getElementById('registerBlock').style.display = "block";
    });
}



showAuthBlocks();

