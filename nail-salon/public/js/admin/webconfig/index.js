document.querySelector(".btn-choose-file").addEventListener("click", function(ev) {
    document.querySelector("#logo").click();
});

document.querySelector("#logo").addEventListener("change", function(ev) {
    var fileName = ev.target.files[0].name;
    document.querySelector(".input-value-logo").value = fileName;
});