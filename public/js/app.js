$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.filter').on('keyup', function(){
        var filter, tr, td, i;
        filter = $(this).val().toUpperCase();
        tr = $("#table tbody tr");

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByClassName($(this).data('column'));
            if (td[0]) {
                if (td[0].innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    });

    $('.sort').on('click', function () {
        var rows, switching, i, x, y, current, next, shouldSwitch, dir, switchcount = 0;
        switching = true;
        dir = "asc";

        while (switching) {
            switching = false;
            rows = $('#table tbody tr');
            for (i = 0; i < (rows.length - 1); i++) {
                shouldSwitch = false;

                x = rows[i].getElementsByClassName($(this).data('column'));
                y = rows[i + 1].getElementsByClassName($(this).data('column'));

                current = isInt(x[0].innerHTML) ? parseInt(x[0].innerHTML) : x[0].innerHTML;
                next = isInt(y[0].innerHTML) ? parseInt(y[0].innerHTML) : y[0].innerHTML;

                if (dir == "asc") {
                    if (current > next) {
                        shouldSwitch= true;
                        break;
                    }
                } else if (dir == "desc") {
                    if (current < next) {
                        shouldSwitch= true;
                        break;
                    }
                }
            }
            if (shouldSwitch) {

                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                switchcount ++;
            } else {

                if (switchcount == 0 && dir == "asc") {
                    dir = "desc";
                    switching = true;
                }
            }
        }
    });

    function isInt(value) {
        return !isNaN(value) && (function(x) { return (x | 0) === x; })(parseFloat(value))
    }

    $('#add-new-domain').on('click', function (e) {
        e.preventDefault();
        var name = $('#new-domain').val();
        $.ajax({
            type: "POST",
            url: "/add-bad-domain",
            data: {
                name: name
            },
            success: function(data){
                if(data != 'error'){
                    var row = '<tr data-id="' + data.id + '"><td>' + data.id + '</td><td>' + data.name + '</td><td><button type="button" class="btn btn-danger delete-domain">Delete</button></td></tr>';
                    $('#domains tbody').append(row);
                }
            }
        });
    });

    $('body').delegate('.delete-domain', 'click', function (e) {
        e.preventDefault();
        var id = $(this).parents('tr').data('id');
        var _this = $(this);
        $.ajax({
            type: "DELETE",
            url: "/remove-bad-domain/" + id,
            data: {
                name: name
            },
            success: function(data){
                if(data != 'error'){
                    _this.parents('tr').remove();
                }
            }
        });
    })
});

