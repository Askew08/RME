document.addEventListener("DOMContentLoaded", function () {
    const select = document.querySelector("select[name=rawat_jalan_nomorregistrasi]");
    const preview = document.getElementById("preview-dokter");

    console.log(select);

    if (!select || !preview) return;

    select.addEventListener("change", function () {
        const nomor = this.value;
        if (!nomor) {
            preview.innerHTML = '';
            return;
        }

        fetch("/admin/api/dokter-info/" + nomor)
            .then(response => response.json())
            .then(data => {
                if (data.exists) {
                    preview.innerHTML = `
                        <strong>Anamnesis :</strong> ${data.anamnesis}<br>
                        <strong>Tindakan :</strong> ${data.tindakan}<br>
                        <strong>Catatan Dokter :</strong> ${data.catatan_dokter}
                    `;
                } else {
                    preview.innerHTML = "<em>Tidak ada pemeriksaan dokter untuk nomor ini.</em>";
                }
            });
    });
});
