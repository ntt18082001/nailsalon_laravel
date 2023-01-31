document
    .querySelector(".btn-choose-file")
    .addEventListener("click", function (ev) {
        document.querySelector("#img_path").click();
    });

document.querySelector("#img_path").addEventListener("change", function (ev) {
    const [file] = ev.target.files;
    if (file) {
        document.querySelector(".image-review").src = URL.createObjectURL(file);
    }
});
