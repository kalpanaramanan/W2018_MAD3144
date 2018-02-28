// We use an "Immediate Function" to initialize the application to avoid leaving anything behind in the global scope
(function () {

    /* ---------------------------------- Local Variables ---------------------------------- */
    var service = new EmployeeService();
    service.initialize().done(function () {
        console.log("Service initialized");
    });

    /* --------------------------------- Event Registration -------------------------------- */
    $('.search-key').on('keyup', findByName);
    $('.help-btn').on('click', function() {
        alert("Employee Directory v3.4");
    });

    /* ---------------------------------- Local Functions ---------------------------------- */
    function findByName() {
        service.findByName($('.search-key').val()).done(function (employees) {
            var l = employees.length;
            var e;
            $('.employee-list').empty();
            for (var i = 0; i < l; i++) {
                e = employees[i];

                var html = "<li class='table-view-cell media'>"+
                  "<a class='navigate-right' data-ignore='push' href='two.html?id="+e.id +"'>"+
                    "<img class='media-object pull-left' src='assets/pics/"+ e.pic +"'>"+
                    "<div class='media-body'>"+
                      e.firstName +" " +e.lastName +
                      "<p>Lorem ipsum dolor sit amet.</p>"+
                    "</div>"+
                "</a>"+
                "</li>";

                //$('.employee-list').append('<li><a href="#employees/' + e.id + '">' + e.firstName + ' ' + e.lastName + '</a></li>');
                $('.employee-list').append(html);
              }
        });
    }

}());
