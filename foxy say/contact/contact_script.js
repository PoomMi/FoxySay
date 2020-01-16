$(document).ready(function(){
    $(".username").click(function(){
        $("#menu").slideToggle();
    });

    $("#profile").click(function(){
        $(".profile").show();
    });

    $("#edit").click(function(){
        $(".edit").show();
    });

    $('#logo-title').click(function(){
        $(location).attr('href', 'profile.php');
    });

    $("#home").click(function(){
        $(location).attr('href', 'profile.php');
    });

    $("#logout").click(function(){
        $(location).attr('href', 'login/includes/logout.php');
    });
    
    $("#contact").click(function(){
        $(location).attr('href', 'contact.php');
    });

    $('.body').click(function(){
        if($('#menu').css('display') == 'block'){
            $("#menu").slideToggle();
        }

        if($('#search-content').css('display') == 'block'){
            $('#search-content').hide();
            $('#search').val("");
        }
    });

    $('#btnSearch').click(function(){
        $('#search-content').show();      
        $('#search-content').load('includes/search.php', {name_search: $('#search').val()});
    });

    $('#search-content').click(function(){
        if($('#box-name').text() != "Not Found"){
            $('#search_found').show();
        }
    });
});