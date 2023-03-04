$(document).ready(function () {
	let checkIdGlobal = 0;
    $(".btn-add-check").on("click", function (ev) {
		const orderId = $(this).attr("data-check-id");
		checkIdGlobal = orderId;
	});
    
	const noti = new AWN();
    $(".btn-submit").on("click", function (ev) {
        const valDate = $("#checked_date");
        if (valDate.val() != "") {
            $("#exampleModalgrid").modal("hide");
            $(".modal-backdrop").remove();
            $("body").removeClass("modal-open");
            $.get(`/admin/ticket-promo/add-checked`, {id: checkIdGlobal, date: valDate.val()}, function(res) {
                if(res) {
                    const date = new Date(valDate.val());
                    noti.success(`Add checked #${checkIdGlobal} successfully!`);
                    let newLi = `<li>
                                    <input class="form-check-input checkbox"
                                    onclick="return false;" type="checkbox" checked>
                                    <span
                                    class="badge text-bg-dark">${format(date)}</span>
                                </li>`;
                                $(`.js-parent-${checkIdGlobal} .list-check`).append($(newLi));
                    valDate.val("");
                    if($(`.js-parent-${checkIdGlobal} .list-check li`).length == 10) {
                        $(".btn-add-check").addClass('invisible');
                    }
                }
            });
        } else {
            alert('Data is null');
        }
    });
    function format(inputDate) {
        let date, month, year;
      
        date = inputDate.getDate();
        month = inputDate.getMonth() + 1;
        year = inputDate.getFullYear();
      
          date = date
              .toString()
              .padStart(2, '0');
      
          month = month
              .toString()
              .padStart(2, '0');
      
        return `${date}-${month}-${year}`;
      }
});
