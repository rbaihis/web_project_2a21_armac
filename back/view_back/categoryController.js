function addCategory(info) {
    let title = info.title;
    $.ajax({
        type: "POST",
        url: "../controller_back/categoryController.php",
        data: {
            add: true,
            title: title
        },
        success: function (result) {
            console.log(result);
            if(result=='exists')    
                alert('Veuillez remplir une nouvelle categorie');
            else
                location.reload();
        }
    });
}



function editCategory(id, info) {
    let title = info.title;
    $.ajax({
        type: "POST",
        url: "../controller_back/categoryController.php",
        data: {
            edit: true,
            id: id,
            title: title
        },
        success: function (result) {
            console.log(result);
            location.reload();
        }
    });
}

function deleteCategory(id) {
    $.ajax({
        type: "POST",
        url: "../controller_back/categoryController.php",
        data: {
            delete: true,
            id: id
        },
        success: function (result) {
            console.log(result);
            location.reload();
        }
    });
}


$('#addCat').click(function (e) {
    let info = getInfo('add');
    if (validateInfo(info))
        addCategory(info);
    else
        console.log('Informations invalides');
})


function setEdit(id) {
    $('#saveEdit').click(function (e) {
        e.preventDefault();
        let info = getInfo('edit');
        if (validateInfo(info))
            editCategory(id, info);
        else
            console.log('Informations invalides');
    })
}


function getInfo(string) {
    let info = {};

    if (string == "edit") {
        info.title = $('#edit_title').val();

        return info;
    }
    if (string == "add") {
        info.title = $('#add_title').val();
        return info;
    }
}

function validateInfo(info) {
    if (info.title == "")
        return false;
    else
        return true;
}


$('#searchbar').keyup(function () {
    let categories = $('.cat'); 
    let keyword = $(this).val().toLowerCase(); 
    if (keyword == "") 
        categories.show();
    else {
        categories.each(function () {
            let title = $(this).find('.cat-title').text().toLowerCase();
            let id = $(this).find('.cat-id').text().toLowerCase();
            (title.indexOf(keyword) >= 0 || id == keyword) ? $(this).show() : $(this).hide();
        });
    }
});


$('#sort').change(function () {
    let categories_content = $('.categories-content');
    let categories = $('.category');
    let sort = $(this).val();

    if (sort == "Id décroissant") {
        categories.sort(function (a, b) {
            let id_a = $(a).find('.cat-id').text();
            let id_b = $(b).find('.cat-id').text();
            return id_b - id_a;
        })
        categories.appendTo(categories_content);
    }

    else if (sort == "Id croissant") {
        categories.sort(function (a, b) {
            let id_a = $(a).find('.cat-id').text();
            let id_b = $(b).find('.cat-id').text();
            return id_a - id_b;
        })
        categories.appendTo(categories_content);

    }
    else if (sort == "Titre A->Z") {
        categories.sort(function (a, b) {
            let title_a = $(a).find('.cat-title').text();
            let title_b = $(b).find('.cat-title').text();
            return title_a.localeCompare(title_b);
        })
        categories.appendTo(categories_content);
    }
    else if (sort == "Titre Z->A") {
        categories.sort(function (a, b) {
            let title_a = $(a).find('.cat-title').text();
            let title_b = $(b).find('.cat-title').text();
            return title_b.localeCompare(title_a);
        })
        categories.appendTo(categories_content);
    }

})

$('#table').DataTable({
    "searching": false,
    "paging": false,
    "ordering": false,
    "info": false
});

