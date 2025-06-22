//function to display error 
function displayError (msg) {
    $(".sys-msg").html(msg);
    $(".sys-msg").addClass('error');
}

//function to get header with page name
function getHeader (location) {
    $.post("./php/header.php", {location: location}, function (data) {
        $("header").html(data);
    });
}

//function to toggle the menu
function Toggle(item) {
    $(item).slideToggle();
}
