console.log("Está funcionando!");


var verificador = 1;

$("#adcionar").click(function() {
    $("#exercicios").append(
        "<tr id='x" + verificador + "'>" +
        "<th scope='col'><button type='button' id='x" + verificador + "' class='botao btn-success'>X</button></th>" +
        "<td><input type='text' class='form-control' name='exenome[]'></td>" +
        "<td><input type='number' class='form-control' name='exenum_serie[]'></td>" +
        "<td><input type='number' class='form-control' name='exenum_repeticao[]'></td>" +
        "</tr>");
    verificador++;
});



$("#exercicios").on('click', '.botao', function() {

    $(this).parent().parent().remove();
});

// Get the modal
var modal1 = document.getElementById("myModal");

// Get the button that opens the modal
var btn1 = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span1 = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn1.onclick = function() {
    modal1.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span1.onclick = function() {
    modal1.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal1) {
        modal1.style.display = "none";
    }
}

// Get the modal
var modal = document.getElementById("myModal1");
// Get the button that opens the modal
var btn = document.getElementById("myBtn1");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close1")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}