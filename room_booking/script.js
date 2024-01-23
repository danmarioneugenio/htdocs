$(document).ready(function () {
    loadRooms();

    // Function to load rooms from the server
    function loadRooms() {
        $.ajax({
            url: 'load_rooms.php',
            type: 'GET',
            success: function (response) {
                $('#rooms').html(response);
            }
        });
    }

    // Click event for room booking
    $(document).on('click', '.room', function () {
        var roomId = $(this).data('id');
        $.ajax({
            url: 'book_room.php',
            type: 'POST',
            data: {id: roomId},
            success: function (response) {
                $('#message').html(response);
                loadRooms();
            }
        });
    });
});
