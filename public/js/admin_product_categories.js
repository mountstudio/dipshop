var parentSelect = $('#category_of_product');
var childSelect = $('#child-category');

$.ajax({
    url: '/getchildren/' + parentSelect.val(),
    success: function (res) {
        appendCategories($(res.children));
    },
    error: function (res) {
        console.log('error');
    }
});

function ajaxForProps(item, type)
{
    $.ajax({
        url: '/getproperties/' + item.val(),
        success: function (res) {
            appendProperties($(res.properties), type);
        },
        error: function () {
            console.log('error');
        }
    });
}

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
    ajaxForProps($(this), 'parent');
});

childSelect.change(function (e) {
    ajaxForProps($(this), 'child');
});

function selectedOption(id, product_id) {
    return parseInt(product_id) === parseInt(id) ? 'selected' : '';
}

function appendCategories(cats) {
    let hiddenSelect = $('#hidden-select');

    if(cats.length !== 0) {
        let id = $('form#edit-product').data('id');

        parentSelect.removeAttr('name');
        childSelect.attr('name', 'category_id');
        hiddenSelect.removeClass('d-none');

        childSelect.empty();
        for (let i = 0; i < cats.length; i++) {
            console.log(id);
            childSelect.append(
                '<option name="child-category" class="form-control" value="' + cats[i].id + '" ' + selectedOption(cats[i].id, id) + '>' +
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

function appendProperties(props, type) {
    var formGroup = $('<div class="form-group"></div>');

    var typeProperty = $('#' + type + 'Properties');

    typeProperty.empty();

    for (var i = 0; i < props.length; i++) {
        formGroup.append(
            '<label for="' + props[i].id + '">' + props[i].name + '</label>' +
            '<input type="hidden" value="' + props[i].id + '" name="propertyIds[]">' +
            '<input type="text" id="' + props[i].id + '" class="col-6 form-control" name="properties[]">'
        );
    }

    typeProperty.append(formGroup);
}