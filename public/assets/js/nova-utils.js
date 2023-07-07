$(document).ready(function () {
    $(".novaTable").DataTable();
});

function setupModels(brand, models_select_box , token) {
    $.post("/dashboard/models/get_data", {
        _token: token,
        brand: brand,
    }).done(function (data) {
        //setup models select-box
        var models = data.models;

        //setup vehicle models
        var select = document.getElementById(models_select_box);
        select.innerHTML = "";
        for (i = 0; i <= models.length - 1; i++) {
            var option = document.createElement("option");

            option.innerHTML = models[i].model;
            option.setAttribute("value", models[i].model);
            select.appendChild(option);
        }
    });
}
