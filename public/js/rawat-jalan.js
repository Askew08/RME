document.addEventListener("DOMContentLoaded", function () {
    const select = document.querySelector("select[name=rawat_jalan_nomorregistrasi]");
    const preview = document.getElementById("preview-info");

    if (!select) return;

    select.addEventListener("change", function () {
        const nomor = this.value;
        if (!nomor) {
            if (preview) preview.innerHTML = '';
            return;
        }

        fetch("/admin/api/rawat-jalan-info/" + nomor)
            .then(response => response.json())
            .then(data => {
                console.log(data);
                const pasienInput = document.querySelector('input[name="pasien_id"]');
                const dokterInput = document.querySelector('input[name="dokter_id"]');
                const keluhanInput = document.querySelector('textarea[name="keluhan"]');

                if (data.pasien_id && pasienInput) pasienInput.value = data.pasien_id;
                if (data.dokter_id && dokterInput) dokterInput.value = data.dokter_id;
                if (data.keluhan && keluhanInput) keluhanInput.value = data.keluhan;

                // Opsional preview
                if (preview) {
                    preview.innerHTML = ` 
                        <strong>Info Ditemukan</strong><br>
                        <strong>ID Pasien:</strong> ${data.pasien_id ?? '-'}<br>
                        <strong>ID Dokter:</strong> ${data.dokter_id ?? '-'}<br>
                        <strong>Keluhan:</strong> ${data.keluhan ?? '-'}
                    `;
                }
            });
    });
});
