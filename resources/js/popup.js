$('.open-popup-members').click(function(e) {
    e.preventDefault();
    $('.popup-bg').fadeIn(200);
    $('html').addClass('no-scroll');
});

$('.close-popup-members').click(function() {
    $('.popup-bg').fadeOut(100);
    $('html').removeClass('no-scroll');
});



$('.open-popup').click(function(e) {
    e.preventDefault();
    var eventId = $(this).data('event-id');
    var eventParticipants = participants[eventId];
    
    // Очистить предыдущие данные
    $('.event-participants-list').empty();

    // Скрыть надпись "Участников нет"
    $('.no-participants').hide();

    if (eventParticipants.length > 0) {
        // Добавить новых участников в список
        $.each(eventParticipants, function(index, participant) {
            var avatarPath = document.getElementById('avatarPath').value;
            var listItem = '<li><img src="' + avatarPath + '/' + participant.avatar + '" alt="">' + participant.name + ' ' + participant.second_name + '</li>';
            $('.event-participants-list').append(listItem);
        });
    } else {
        // Если участников нет, отобразить соответствующее сообщение
        $('.no-participants').show();
    }

    $('.popup-bg').fadeIn(200);
    $('html').addClass('no-scroll');

    $('.close-popup').click(function() {
        $('.popup-bg').fadeOut(100);
        $('html').removeClass('no-scroll');
    });
});









$('.delete-event').click(function(e) {
    e.preventDefault();
    var eventId = $(this).data('event-id');
    // Установка значения event-id для формы удаления
    $('#deleteEventForm').attr('action', '/admin/event/delete/' + eventId);
    $('.popup-bg-delete').fadeIn(200);
    $('html').addClass('no-scroll');
});


$('.close-popup-delete, .cancel-delete').click(function() {
    $('.popup-bg-delete').fadeOut(100);
    $('html').removeClass('no-scroll');
});


