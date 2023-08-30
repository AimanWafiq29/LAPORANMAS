
let semuaTombol = document.querySelectorAll(".btn-hapus");
semuaTombol.forEach(function (item) {
    item.addEventListener("click", konfirmasi);
});

function konfirmasi(event) {
    // Buat pesan error untuk setiap tipe tabel
    let tombol = event.currentTarget;
    let judulAlert;
    let teksAlert;

    event.preventDefault();
    Swal.fire({
        title: judulAlert,
        html: "Hapus data <b>" + tombol.getAttribute("data-name") + "</b>",
        icon: "warning",
        showCancelButton: true,
        cancelButtonColor: "#6c757d",
        confirmButtonColor: "#dc3545",
        cancelButtonText: "Tidak jadi",
        confirmButtonText: "Ya, hapus!",
        reverseButtons: true,
    }).then((result) => {
        if (result.value) {
            tombol.parentElement.submit();
        }
    });
}
