function _calculateAge(birthday) {
    // birthday is a date
    var ageDifMs = Date.now() - birthday.getTime();
    var ageDate = new Date(ageDifMs); // miliseconds from epoch
    return Math.abs(ageDate.getUTCFullYear() - 1970);
}

function formatDate(date) {
    const now = new Date();
    var d = new Date(date),
        month = "" + (d.getMonth() + 1),
        day = "" + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) month = "0" + month;
    if (day.length < 2) day = "0" + day;

    return [now.getFullYear(), month, day].join("-");
}

const renderColumnMobile = (phone, sms) => {
    if (window.innerWidth <= 1400) {
        return `<td class="fit">
        <a href="sms:${phone}${charUserAgent()}body=${sms}"
            class="btn btn-secondary sms">
            <i class="mdi mdi-email"></i>
        </a>
      </td>`;
    }
    return '';
};

const charUserAgent = () => {
    if(navigator.userAgent.includes('iPad') || navigator.userAgent.includes('iPhone')) {
        return '&';
    }
    return '?';
}

axios.get("/admin/customer/get-birthday-customers").then((res) => {
    console.log(res.data.customers);
    const arrDob = res.data.customers.map((item) => {
        const dob = formatDate(item);
        return dob;
    });

    const options = {
        settings: {
            visibility: {
                weekend: false,
                today: false,
                theme: "light",
            },
            selected: {
                holidays: arrDob,
            },
        },
        actions: {
            clickDay(event, dates) {
                axios
                    .get(`/admin/customer/get-cus-by-birthday/${dates[0]}`)
                    .then((response) => {
                        const customers = response.data.customers;
                        const smsContent = response.data.sms_content;
                        const tbody = document.querySelector(".tbody-table");
                        const tbl = document.querySelector(".table-responsive");
                        const mBody = document.querySelector(".modal-body");
                        const txtEmpty =
                            document.querySelector(".modal-body .t");

                        tbl.classList.remove("d-none");
                        tbody.innerHTML = "";
                        if (txtEmpty != null) {
                            txtEmpty.remove();
                        }
                        if (customers.length > 0) {
                            customers.forEach((item, index) => {
                                const smsCus = smsContent
                                    .replace("{{name}}", item.name)
                                    .replace(
                                        "{{age}}",
                                        _calculateAge(
                                            new Date(item.date_of_birth)
                                        )
                                    )
                                    .replace("{{discount}}", 30);
                                const dob = new Date(item.date_of_birth);
                                const li = `<tr>
                                              <td>
                                                <p class="mb-0">${item.name}</p>
                                                <span class="badge text-bg-primary">${
                                                    item.phone_number
                                                }</span>
                                              </td>
                                              <td class="fit">${dob.toLocaleDateString()}</td>
                                              ${renderColumnMobile(item.phone_number, smsCus)}
                                          </tr>`;
                                tbody.insertAdjacentHTML("beforeend", li);
                            });
                        } else {
                            const text = `<span class='t'>Không có khách hàng sinh ngày này!</span>`;
                            tbl.classList.add("d-none");
                            mBody.insertAdjacentHTML("beforeend", text);
                        }
                        var myModal = new bootstrap.Modal(
                            document.getElementById("birthday-modal"),
                            {}
                        );
                        myModal.show();
                    });
            },
        },
    };
    const calendar = new VanillaCalendar("#calendar", options);
    calendar.init();
});
