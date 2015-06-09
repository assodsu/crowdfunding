$(document).ready(function(){

/**** NAVIGATION ****/
    var navListItems = $('.step a'), allWells = $('.row.step-content');

    allWells.hide();
    $('#step-1').show();
    changeActuelStep();

    function changeActuelStep() {
        for (var i = 1; i <= 5; i++)
            if ($('#step-'+ i).is(':visible'))
                $('a.step-'+i+' .step-active').css('background-color', '#449d44').css('color', 'white');
            else
                $('a.step-'+i+' .step-active').css('background-color', 'white');
    }

    navListItems.click(function(e)
    {
        e.preventDefault();
        var target = $($(this).attr('href'));
        var numberStep = '1';
        console.log(target);

        if ($(this).hasClass('step-1')) {
            numberStep = '1';
        } else if ($(this).hasClass('step-2')) {
            numberStep = '2';
        } else if ($(this).hasClass('step-3')) {
            numberStep = '3';
        } else if ($(this).hasClass('step-4')) {
            numberStep = '4';
        } else {
            numberStep = '5';
        }

        $('.step-' + numberStep).html('<div class="step-active">'+numberStep+'</div>');
        
        allWells.hide();
        target.show();

        changeActuelStep();
    });

    $('.step-last a').click(function(e)
    {
        e.preventDefault();
        var target = $($(this).attr('href'));
        var numberStep = '5';

        $('.step-' + numberStep).html('<div class="step-active">'+numberStep+'</div>');
        
        allWells.hide();
        target.show();

        changeActuelStep();
    });

    $('#activate-step-2').on('click', function(e) {
        $('a.step-2').trigger('click');
    });

    $('#activate-step-3').on('click', function(e) {
        $('a.step-3').trigger('click');
    });

    $('#activate-step-4').on('click', function(e) {
        $('a.step-4').trigger('click');
    });

    $('#activate-step-5').on('click', function(e) {
        $('a.step-5').trigger('click');   
    });    
});