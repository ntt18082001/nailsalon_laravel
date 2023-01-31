document
    .querySelector(".btn-choose-file")
    .addEventListener("click", function (ev) {
        document.querySelector("#about_img").click();
    });

document.querySelector("#about_img").addEventListener("change", function (ev) {
    const [file] = ev.target.files;
    if (file) {
        document.querySelector(".image-review").src = URL.createObjectURL(file);
    }
});
