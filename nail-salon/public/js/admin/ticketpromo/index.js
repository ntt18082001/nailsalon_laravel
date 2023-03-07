$(document).ready(function () {
    let dataIndex = 0;
    $(".checkbox:not(:first)").attr("disabled", true);
    $(".checkbox").on("click", function (ev) {
        ev.preventDefault();
        dataIndex = $(ev.currentTarget).attr("data-index");
    });

    $(".submit").on("click", function (ev) {
        const valDate = $("#checked_date");
        if (valDate.val() != "") {
            $("#varyingcontentModal").modal("hide");
            $(".modal-backdrop").remove();
            $("body").removeClass("modal-open");
            const checked = $(`#inlineCheckbox${dataIndex}`);
            checked.prop("checked", true);
            checked.next().val(valDate.val());
            checked.closest('.form-check').find('label span').text(": " + valDate.val());
            valDate.val(new Date().toISOString().slice(0, 10));
            $(".checkbox:not(:checked)").attr("disabled", false);
            $(".checkbox:not(:checked):not(:first)").attr("disabled", true);
        } else {
            alert("Date is null");
        }
    });
});
