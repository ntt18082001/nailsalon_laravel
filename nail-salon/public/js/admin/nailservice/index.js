document
    .querySelector(".btn-choose-file")
    .addEventListener("click", function (ev) {
        document.querySelector("#cover_path").click();
    });

document.querySelector("#cover_path").addEventListener("change", function (ev) {
    const [file] = ev.target.files;
    if (file) {
        document.querySelector('.image-review').src = URL.createObjectURL(file);
    }
});
