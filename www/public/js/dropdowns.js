$(document).ready(function() {
    $("#dropdownProducts").on("click", function () {
        startDropdown(this);
    });

    $("#dropdownSettings").on("click", function () {
        startDropdown(this);
    });

    $("#hamburger").on("click", function () {
        navbar();
    });
});


function startDropdown(dropDown){
    dropDown.classList.toggle("active");
    var dropdownContent = dropDown.nextElementSibling;
    if (dropdownContent.style.display === "flex") {
        dropdownContent.style.display = "none";
    } else {
        dropdownContent.style.display = "flex";
    }
}

function navbar(){
    if ($("#sidenav").css("left") !== "0px"){
        $('#sidenav').animate({
            left: 0
        });
    }else{
        $('#sidenav').animate({
            left: "-100%"
        });
    }
}
