login = function() {

    console.log("Start search user\n");
    $.post("account.php?", {
            account: $("#account").val(),
            _password: $("#password").val()
        },
        function(data) {
            try {
                var json = JSON.parse(data);
                if (json.length != 0) {

                    loadUserTable(json, "#accountTable");
                } else {
                    alert("Query fail");
                }

            } catch (e) {
                alert("Query fail");
            }
        });


    return false;
}
loadUserTable = function(myData, tableId) {
    console.log(myData);
    $(tableId).bootstrapTable("destroy");
    $(tableId).bootstrapTable({
        columns: [{
            field: 'name',
            title: 'name'
        }, {
            field: 'account',
            title: 'account'
        }, {
            field: 'isAdministrator',
            title: 'isAdministrator'
        }, {
            field: 'birthday',
            title: 'birthday'
        }, {
            field: 'email',
            title: 'email'
        }],
        data: myData
    });
}
$(document).ready(function() {

    $("#btnUser").click(
            function() {
                $("#userPanel").toggle();
            }
        ),
        $("#btnBook").click(
            function() {
                $("#bookPanel").toggle();
            }
        ),
        $("#btnAuthor").click(
            function() {
                $("#authorPanel").toggle();
            }
        ),
        $("#btnPublisher").click(
            function() {
                $("#publisherPanel").toggle();
            }
        ),
        $("#btnPhysicalBook").click(
            function() {
                $("#physicalBookPanel").toggle();
            }
        )
});
addAuthor = function() {
    console.log("Start add Author\n");
    $.post("addAuthor.php?", {
            account: $("#account").val(),
            password: $("#password").val(),
            AuthorName: $("#AuthorName").val(),
            AuthorEmail: $("#AuthorEmail").val(),
            AuthorPhoneNumber: $("#AuthorPhoneNumber").val()
        },
        function(data) {
            alert(data);
        }
    );
    return false;
}
deleteAuthor = function() {
    console.log("Start Delete Author\n");
    $.post("deleteAuthor.php?", {
            account: $("#account").val(),
            password: $("#password").val(),
            AuthorID: $("#AuthorID").val()
        },
        function(data) {
            alert(data);
        }
    );
    return false;
}
addUser = function() {
    console.log("Start add user\n");
    $.post("addUser.php?", {
            account: $("#account").val(),
            password: $("#password").val(),
            Name: $("#Name").val(),
            Account: $("#Account").val(),
            Password: $("#Password").val(),
            Birthday: $("#Birthday").val(),
            Email: $("#Email").val(),
            IsAdministrator: $("#IsAdministrator").val()
        },
        function(data) {
            alert(data);
        }
    );

    return false;
}
deletePublisher = function() {
    console.log("Start Delete Publisher\n");
    $.post("deletePublisher.php?", {
            account: $("#account").val(),
            password: $("#password").val(),
            PublisherID: $("#PublisherID").val()
        },
        function(data) {
            alert(data);
        }
    );
    return false;
}
addPublisher = function() {
    console.log("Start add Publisher\n");
    $.post("addPublisher.php?", {
            account: $("#account").val(),
            password: $("#password").val(),
            PublisherName: $("#PublisherName").val(),
            PublisherAddress: $("#PublisherAddress").val(),
            PublisherPhoneNumber: $("#PublisherPhoneNumber").val()
        },
        function(data) {
            alert(data);
        }
    );

    return false;
}
deleteUser = function() {
    console.log("Start Delete User\n");
    $.post("deleteUser.php?", {
            account: $("#account").val(),
            password: $("#password").val(),
            UserID: $("#UserID").val()
        },
        function(data) {
            alert(data);
        }
    );
    return false;
}
addUser = function() {
    console.log("Start add User\n");
    $.post("addUser.php?", {
            account: $("#account").val(),
            password: $("#password").val(),
            UserName: $("#UserName").val(),
            Account: $("#Account").val(),
            UserPassword: $("#UserPassword").val(),
            Birthday: $("#Birthday").val(),
            UserEmail: $("#UserEmail").val(),
            IsAdministrator: $('#IsAdministrator').is(':checked')
        },
        function(data) {
            alert(data);
        }
    );

    return false;
}