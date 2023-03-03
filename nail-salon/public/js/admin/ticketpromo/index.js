$(document).ready(function () {
    let dataIndex = 0;
    $(".checkbox:not(:first)").attr("disabled", true);
    $(".checkbox").on("click", function (ev) {
        ev.preventDefault();
        dataIndex = $(ev.currentTarget).attr("data-index");
    });

    $(".submit").on("click", function (ev) {
        $("#varyingcontentModal").modal("hide");
        $(".modal-backdrop").remove();
        $("body").removeClass("modal-open");
        const valDate = $("#checked_date");
        if (valDate.val() != "") {
            const checked = $(`#inlineCheckbox${dataIndex}`);
            checked.prop("checked", true);
            checked.next().val(valDate.val());
            checked.closest('.form-check').attr('title', valDate.val());
            valDate.val("");
            $(".checkbox:not(:checked)").attr("disabled", false);
            $(".checkbox:not(:checked):not(:first)").attr("disabled", true);
        }
    });
});
