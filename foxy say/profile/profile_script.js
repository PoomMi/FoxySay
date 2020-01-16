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
    
    $("#friend").click(function(){
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
            $('#search-content').css( 'cursor', '' );
            $('#search_found').show();
            var n_s = $('#box-name').text(); //name that is searched
            var user = $('#username').text(); // get username
            $('.search_found-content').load('includes/get_info-search.php', {name_result: n_s, username: user});
        }
    });

    $('.chat-list').click(function(){
        var username = $('#username').text(); // get username
        var target_name = $(this).text(); // get receiver name
        $('.msg-name').html(target_name);
        $('.msg-box').load('includes/get_chat.php', {sender: username, receiver: target_name}); //load chat
    });

    $('#btnSay').click(function(){
        var username = $('#username').text(); // get username
        var receiver = $('.msg-name').text(); // get receiver name
        var text = $('.msg-input').val(); //get message
        $.post( "includes/send_msg.php", {user: username, target: receiver, msg: text} );
        $('.msg-box').load('includes/get_chat.php', {sender: username, receiver: receiver}); //load chat 
        $('.msg-input').val(""); //set msg-input to empty
    });

    $('#btnChangePicture').click(function(){
        $("#profilePicture").click();
    });
});

document.onkeydown = function(evt) {
    if (evt.keyCode == 27) {
        $('.msg-name').html("");
        $('.msg-box').html("");
        $('.msg-input').val("");
    }
};