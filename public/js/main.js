//myvars
const storeForm = document.getElementById("storeForm");
const updateForm = document.getElementById("updateForm");
let updateID = -1;
//for listing
let students = [];
function list() {
    $.ajax({
        type: "get",
        url: "/api/students",
        dataType: "json",
        encode: true,
    }).done(function (data) {
        students = data.data;
        listStudents(students);
    });
}
list()





//for create
storeForm.addEventListener("submit", function (event) {
    var formData = {
        name: document.getElementById("name").value,
        phone: document.getElementById("phone").value
    }

    $.ajax({
        type: "POST",
        url: "/api/students",
        data: formData,
        dataType: "json",
        encode: true,
    }).done(function (data) {
        if (data.success) {
            alert('new student added');
            list();// list from server ... bad but comon :)
        } else {
            alert('something wrong');
        }
    });
    event.preventDefault();
});


//for edit
$("#table tbody ").click(function (event) {
    const isButton = event.target.nodeName === 'BUTTON';

    if (!isButton) {
        return;
    }
    if ($(event.target).hasClass('delete')) {
        deleteStudent(event.target.id);
        return;
    }
    updateID = event.target.id;

    //show
    var formData = {}
    $.ajax({
        type: "GET",
        url: `/api/students/${updateID}`,
        data: formData,
        dataType: "json",
        encode: true,
    }).done(function (data) {
        if (data.success) {
            $('#updateForm #name').val(data.data.name);
            $('#updateForm #phone').val(data.data.phone);
        } else {
            alert('something wrong');
        }
    });


});


//for show
function showStudent(id) {
    var formData = {}
    $.ajax({
        type: "GET",
        url: `/api/students/${id}`,
        data: formData,
        dataType: "json",
        encode: true,
    }).done(function (data) {
        if (data.success) {
            return data.data;
        } else {
            alert('something wrong');
        }
    });
}


//for update
updateForm.addEventListener("submit", function (event) {
    var formData = {
        name: $("#updateForm #name").val(),
        phone: $("#updateForm #phone").val(),
        _method: "PUT"
    }

    $.ajax({
        type: "POST",
        url: `/api/students/${updateID}`,
        data: formData,
        dataType: "json",
        encode: true,
    }).done(function (data) {
        if (data.success) {
            alert('new student updated');
            list();// list from server ... bad but comon :)
        } else {
            alert('something wrong');
        }
    });
    event.preventDefault();
});


//for delete
function deleteStudent(id) {
    var formData = {
        _method: "DELETE"
    }
    $.ajax({
        type: "POST",
        url: `/api/students/${id}`,
        data: formData,
        dataType: "json",
        encode: true,
    }).done(function (data) {
        if (data.success) {
            alert('student deleted');
            list();// list from server ... bad but comon :)
        } else {
            alert('something wrong');
        }
    });
}



function listStudents(students) {
    $('#table tbody tr').empty();
    var body = $('#table tbody');
    // Body
    for (var d in students) {
        $('#table tbody').append($('<tr>')
            .append($('<td>', { text: students[d].id }))
            .append($('<td>', { text: students[d].name }))
            .append($('<td>', { text: students[d].phone }))
            .append($('<td>')
                .append($('<button>', { text: "edit", class: "btn btn-primary edit", id: `${students[d].id}` }))
                .append($('<button>', { text: "delete", class: "btn btn-danger delete", id: `${students[d].id}` }))
            )
        )
    }
}