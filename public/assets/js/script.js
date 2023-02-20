$('#navBtn').click(function() {
    $('#mobileNavbar').toggleClass('d-flex');
});

function scrollFunction(){
    var element = document.querySelector('#myNav');
    element.classList.add('fixed-top');
}
