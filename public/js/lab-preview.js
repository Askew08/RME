document.addEventListener("DOMContentLoaded", function () {
    const select = document.querySelector("select[name=rawat_jalan_nomorregistrasi]");
    const preview = document.getElementById("preview-lab");

    console.log(select);

    if (!select || !preview) return;

    select.addEventListener("change", function () {
        const nomor = this.value;
        if (!nomor) {
            preview.innerHTML = '';
            return;
        }

        fetch("/admin/api/lab-info/" + nomor)
            .then(response => response.json())
            .then(data => {
                if (data.exists) {
                    preview.innerHTML = `
                        <strong>Hemoglobin :</strong> ${data.hemoglobin}<br>
                        <strong>Leukosit :</strong> ${data.leukosit}<br>
                        <strong>Trombosit :</strong> ${data.trombosit}
                    `;
                } else {
                    preview.innerHTML = "<em>Tidak ada pemeriksaan dokter untuk nomor ini.</em>";
                }
            });
    });
});
