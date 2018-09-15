var parentSelect = $('#category_of_product');

$.ajax({
    url: '/getchildren/' + parentSelect.val(),
    success: function (res) {
        appendCategories($(res.children));
    },
    error: function (res) {
        console.log('error');
    }
});

parentSelect.change(function (e) {
    $.ajax({
        url: '/getchildren/' + $(this).val(),
        success: function (res) {
            appendCategories($(res.children));
        },
        error: function (res) {
            console.log('error');
        }
    });
});

function appendCategories(cats) {
    var hiddenSelect = $('#hidden-select');
    var childSelect = $('#child-category');

    if(cats.length !== 0) {
        parentSelect.removeAttr('name');
        childSelect.attr('name', 'category_id');
        hiddenSelect.removeClass('d-none');

        childSelect.empty();
        for (var i = 0; i < cats.length; i++) {
            childSelect.append(
                '<option name="child-category" class="form-control" value="' + cats[i].id + '">' +
                cats[i].name +
                '</option>'
            )
        }
    } else {
        hiddenSelect.addClass('d-none');
        childSelect.removeAttr('name');
        parentSelect.attr('name', 'category_id');
    }
}