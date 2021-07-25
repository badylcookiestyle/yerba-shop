$('#filters').hide()
$( "#expander" ).on( "click", function() {
    $("#expander").slideToggle( "slow", function() {

    });
    $("#filters").slideToggle( "slow", function() {

    });
});
