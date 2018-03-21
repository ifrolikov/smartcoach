$(document).ready(function(){
    $('.body > .part').click(function(e) {
        $(this).find('._popup-link').click();
    });
    $('._popup-link').click(function (e) {
        e.preventDefault();
        var $object = $('#'+$(this).data('popup'));

        $object.popup({
            scrolllock: true,
            closeelement: '#'+$(this).data('popup')+' > .close',
            detach: true
        });
        $object.popup('show');
    });
    $('.close').click(function(e){
        e.preventDefault();
    });
});