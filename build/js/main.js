$(document).ready(function(){
    $(".header-hover").click(function(){
        $(".header_menu").toggle();
    });
    $(".all-rank-left").click(function(e){
        e.preventDefault();
        $(".all-rank-category").toggle();
    });
    $(".all-rank-right").click(function(e){
        e.preventDefault();
        $(".all-rank-active").toggle();
    });
    $(".headerdt-center_menu-adds").click(function(e){
        e.preventDefault();
        $(".headerdt-center_menu-add").toggle();
    });
    $(".headerdt-center_menu-setups").click(function(e){
        e.preventDefault();
        $(".headerdt-center_menu-setup").toggle();
    });
    $(".shopping-center_menu-sort").click(function(e){
        e.preventDefault();
        $(".shopping-center_menu-select").toggle();
    });
    $(".abc").click(function(){
        $(".overlay").toggle();
        $('.nav-mobile').toggleClass('nav-mobile_active');
    });
    $(".overlay").click(function(){
        $(".overlay").hide();
        $('.nav-mobile').toggleClass('nav-mobile_active');
    });


});



