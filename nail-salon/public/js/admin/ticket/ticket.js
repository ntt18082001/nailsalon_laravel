$(document).ready(function () {
	const orderStatus = {
		1: "border border-dark text-dark",
		2: "bg-success",
		3: "bg-dark",
		4: "bg-dark"
	}
	let orderIdGlobal = 0;
	$(".btn-update-status").on("click", function (ev) {
		const orderId = $(this).attr("data-order-id");
		const statusId = $(this).attr('data-status-id');
		orderIdGlobal = orderId;
        $("#service_cate_id").val(statusId);
	});
	const noti = new AWN();
	$("#exampleModalgrid .btn-submit-status").on("click", function (ev) {
		const statusSelect = $("#exampleModalgrid #service_cate_id");
		const statusId = statusSelect.val();
		const statusText = statusSelect.children("option").filter(":selected").text();
		$.get(`/admin/ticket/update-status/${orderIdGlobal}-${statusId}`, function(res) {
			$("#exampleModalgrid").modal("hide");
			$('.modal-backdrop').remove();
			$('body').removeClass("modal-open");
			if(res.message) {
				noti.success(`Update status of ticket #${orderIdGlobal} successfully!`);
				$(`.btn-status-${orderIdGlobal}`).attr('data-status-id', statusId);
				$(`.status-${orderIdGlobal}`)
					.text(statusText)
					.removeClass(`${orderStatus[1]} ${orderStatus[2]} ${orderStatus[3]} ${orderStatus[4]} text-dark`)
					.addClass(orderStatus[statusId]);
				if (statusId == 2 ||statusId == 3 || statusId == 4) {
					$(`.btn-update-status[data-order-id=${orderIdGlobal}]`).addClass('invisible');
				}
			}
		});
	});
});
