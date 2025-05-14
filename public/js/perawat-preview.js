document.addEventListener("DOMContentLoaded", function () {
    const select = document.querySelector("select[name=rawat_jalan_nomorregistrasi]");
    const preview = document.getElementById("preview-perawat");

    if (!select || !preview) return;

    select.addEventListener("change", function () {
        const nomor = this.value;
        if (!nomor) {
            preview.innerHTML = '';
            return;
        }

        fetch("/admin/api/perawat-info/" + nomor)
            .then(response => response.json())
            .then(data => {
                if (data.exists) {
                    preview.innerHTML = `
                        <strong>Suhu :</strong> ${data.keluhan}<br>                        
                        <strong>Suhu :</strong> ${data.suhu} °C<br>
                        <strong>Berat Badan :</strong> ${data.berat_badan} kg<br>
                        <strong>Tekanan Darah :</strong> ${data.tekanan_darah} mmHg<br>
                        <strong>Keluhan Awal :</strong> ${data.keluhan}<br>
                        <strong>Catatan Perawat:</strong> ${data.catatan_perawatan}
                    `;
                } else {
                    preview.innerHTML = "<em>Tidak ada pemeriksaan perawat untuk nomor ini.</em>";
                }
            });
    });
});
