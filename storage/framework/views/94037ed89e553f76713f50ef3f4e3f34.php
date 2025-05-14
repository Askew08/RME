<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekam Medis Pasien</title>
    <style>
        :root {
            --primary-color: #2c75b3;
            --secondary-color: #f8f9fa;
            --accent-color: #1a5eb1;
            --border-color: #dee2e6;
            --text-dark: #343a40;
            --text-muted: #6c757d;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 0;
            margin: 0;
            color: var(--text-dark);
            background-color: #f5f7fa;
            line-height: 1.6;
        }
        
        .container {
            max-width: 21cm;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            min-height: 29.7cm;
        }
        
        .header {
            text-align: center; 
            padding: 15px 0;
            border-bottom: 2px solid var(--primary-color);
            margin-bottom: 25px;
            position: relative;
        }
        
        .logo {
            height: 50px;
            position: absolute;
            left: 0;
            top: center;
        }
        
        .hospital-info {
            text-align: center;
        }
        
        .hospital-name {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            color: var(--primary-color);
            margin: 0;
        }
        
        .hospital-address {
            text-align: center;
            font-size: 14px;
            color: var(--text-muted);
            margin: 0;
        }
        
        h1 {
            text-align: center;
            color: var(--primary-color);
            font-size: 22px;
            margin: 20px 0;
            padding-bottom: 10px;
        }
        
        h2 {
            text-align: center;
            font-size: 18px;
            margin: 15px 0;
        }
        
        .patient-info {
            background-color: var(--secondary-color);
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            border-left: 4px solid var(--primary-color);
        }
        
        .patient-info-item {
            flex: 1 1 calc(33.333% - 15px);
            min-width: 200px;
        }
        
        .section {
            margin-bottom: 25px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            overflow: hidden;
        }
        
        .section-header {
            background-color: var(--primary-color);
            color: white;
            padding: 10px 15px;
            font-weight: bold;
            font-size: 16px;
        }
        
        .section-content {
            padding: 15px;
        }
        
        .field {
            margin-bottom: 12px;
        }
        
        .label {
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 5px;
            display: block;
        }
        
        .value {
            padding: 8px 12px;
            background-color: var(--secondary-color);
            border-radius: 4px;
            min-height: 20px;
            border-left: 3px solid #ddd;
        }
        
        .medication-list {
            margin-left: 0;
            padding-left: 0;
            list-style-type: none;
        }
        
        .medication-item {
            background-color: var(--secondary-color);
            padding: 10px;
            margin-bottom: 8px;
            border-radius: 4px;
            border-left: 3px solid var(--primary-color);
        }
        
        .signature-area {
            text-align: right;
            margin-top: 40px;
            margin-right: 40px;
        }
        
        .signature-line {
            border-bottom: 1px solid var(--text-dark);
            width: 200px;
            margin-left: auto;
            margin-top: 60px;
            margin-bottom: 10px;
        }
        
        .doctor-name {
            font-weight: bold;
        }
        
        .stamp-area {
            width: 150px;
            height: 80px;
            margin-left: auto;
            margin-top: 10px;
            border: 1px dashed var(--text-muted);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-muted);
            font-size: 12px;
        }
        
        .buttons {
            text-align: center;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid var(--border-color);
        }
        
        button {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            margin: 0 10px;
            transition: background-color 0.3s;
            display: inline-flex;
            align-items: center;
        }
        
        button:hover {
            background-color: var(--accent-color);
        }
        
        button i {
            margin-right: 8px;
        }
        
        .footer {
            text-align: center;
            margin-top: 40px;
            padding-top: 15px;
            border-top: 1px solid var(--border-color);
            color: var(--text-muted);
            font-size: 12px;
        }
        
        @media print {
            body {
                background-color: white;
            }
            
            .container {
                box-shadow: none;
                padding: 0;
                margin: 0;
                width: 100%;
                max-width: none;
            }
            
            .noprint {
                display: none;
            }
            
            button {
                display: none;
            }
            
            .footer {
                position: fixed;
                bottom: 0;
                width: 100%;
            }
        }

        @media print {
            .container::before {
                content: "REKAM MEDIS";
                position: fixed;
                top: 50%;
                left: 0;
                right: 0;
                z-index: -1;
                font-size: 100px;
                transform: rotate(-45deg);
                color: rgba(200, 200, 200, 0.2);
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="/images/logoRS.png" alt="Logo" class="logo">
            <div class="hospital-info">
                <h1 class="hospital-name">RUMAH SAKIT SEJAHTERA</h1>
                <p class="hospital-address">Jalan Srijaya Negara, Bukit Lama, Ilir Barat I, Kota Palembang, Sumatera Selatan</p>
                <p class="hospital-address">TIBIL A | KELOMPOK3</p>
            </div>
        </div>
        
        <h1>REKAM MEDIS PASIEN</h1>
        
        <div class="patient-info">
            <div class="patient-info-item">
                <div class="field">
                    <div class="label">Nama Lengkap:</div>
                    <div class="value"><?php echo e($pasien->nama); ?></div>
                </div>
            </div>
            <div class="patient-info-item">
                <div class="field">
                    <div class="label">Nomor Rekam Medis:</div>
                    <div class="value"><?php echo e($pasien->no_rekam_medis ?? 'RM-' . str_pad(rand(1, 999999), 6, '0', STR_PAD_LEFT)); ?></div>
                </div>
            </div>
            <div class="patient-info-item">
                <div class="field">
                    <div class="label">Tanggal Lahir:</div>
                    <div class="value"><?php echo e($pasien->tanggal_lahir ?? '-'); ?></div>
                </div>
            </div>
            <div class="patient-info-item">
                <div class="field">
                    <div class="label">Jenis Kelamin:</div>
                    <div class="value"><?php echo e($pasien->jenis_kelamin ?? '-'); ?></div>
                </div>
            </div>
            <div class="patient-info-item">
                <div class="field">
                    <div class="label">Nomor Telepon:</div>
                    <div class="value"><?php echo e($pasien->nomor_telepon ?? '-'); ?></div>
                </div>
            </div>
            <div class="patient-info-item">
                <div class="field">
                    <div class="label">Alamat:</div>
                    <div class="value"><?php echo e($pasien->alamat ?? '-'); ?></div>
                </div>
            </div>
        </div>
        
        <div class="section">
            <div class="section-header">Informasi Kunjungan</div>
            <div class="section-content">
                <div class="field">
                    <div class="label">Nomor Registrasi:</div>
                    <div class="value"><?php echo e($rekam->rawat_jalan_nomorregistrasi); ?></div>
                </div>
                <div class="field">
                    <div class="label">Jenis Pasien:</div>
                    <div class="value"><?php echo e($rawatJalan->jenis_pasien); ?></div>
                </div>
                <div class="field">
                    <div class="label">Tanggal Pemeriksaan:</div>
                    <div class="value"><?php echo e(\Carbon\Carbon::parse($rekam->tanggal_pemeriksaan)->translatedFormat('d F Y')); ?></div>
                </div>
                <div class="field">
                    <div class="label">Dokter:</div>
                    <div class="value"><?php echo e($dokter->nama ?? '-'); ?></div>
                </div>
                <div class="field">
                    <div class="label">Poliklinik:</div>
                    <div class="value"><?php echo e($rekam->poliklinik ?? 'Poli Umum'); ?></div>
                </div>
            </div>
        </div>
        
        <div class="section">
            <div class="section-header">Pemeriksaan</div>
            <div class="section-content">
                <div class="field">
                    <div class="label">Keluhan:</div>
                    <div class="value"><?php echo e($rekam->keluhan); ?></div>
                </div>
                <div class="field">
                    <div class="label">Hasil Pemeriksaan Perawat:</div>
                    <div class="value"><?php echo e($rekam->pemeriksaanPerawat->catatan_perawatan); ?></div>
                </div>
                <div class="field">
                    <div class="label">Hasil Pemeriksaan Lab:</div>
                    <div class="value"><?php echo e($rekam->hasil_asesmen_lab); ?></div>
                </div>
                <div class="field">
                    <div class="label">Hasil Pemeriksaan Dokter:</div>
                    <div class="value"><?php echo e($rekam->hasil_asesmen_dokter); ?></div>
                </div>
                <div class="field">
                    <div class="label">Diagnosa:</div>
                    <div class="value"><?php echo e($rekam->diagnosa_dokter); ?></div>
                </div>
            </div>
        </div>
        
        <div class="section">
            <div class="section-header">Tanda Vital</div>
            <div class="section-content">
                <div style="display: flex; flex-wrap: wrap; gap: 15px;">
                    <div class="field" style="flex: 1; min-width: 150px;">
                        <div class="label">Berat Badan:</div>
                        <div class="value"><?php echo e($rekam->pemeriksaanPerawat->berat_badan ?? '-'); ?> KG</div>
                    </div>
                    <div class="field" style="flex: 1; min-width: 150px;">
                        <div class="label">Suhu:</div>
                        <div class="value"><?php echo e($rekam->pemeriksaanPerawat->suhu ?? '-'); ?> °C</div>
                    </div>   
                    <div class="field" style="flex: 1; min-width: 150px;">
                        <div class="label">Tekanan Darah:</div>
                        <div class="value"><?php echo e($rekam->pemeriksaanPerawat->tekanan_darah ?? '-'); ?> mmHg</div>
                    </div>
                    <div class="field" style="flex: 1; min-width: 150px;">
                        <div class="label">Nadi:</div>
                        <div class="value"><?php echo e($rekam->pemeriksaanPerawat->respirasi ?? '-'); ?> Bpm</div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="section">
            <div class="section-header">Pengobatan</div>
            <div class="section-content">
                <div class="field">
                    <div class="label">Anjuran Obat:</div>
                    <div class="value" style="white-space: pre-line;">
                        <ul class="medication-list">
                            <?php $__currentLoopData = explode("\n", $rekam->obat); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $obat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(trim($obat) !== ''): ?>
                                    <li class="medication-item"><?php echo e($obat); ?></li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
                <div class="field">
                    <div class="label">Catatan Dokter:</div>
                    <div class="value"><?php echo $pemeriksaanDokter->catatan_dokter ?? 'Minum obat sesuai anjuran dokter.<br>Jika ada keluhan atau kondisi tidak membaik, segera hubungi dokter.'; ?></div>

                </div>
            </div>
        </div>
        
        <div class="signature-area">
            <p><?php echo e(\Carbon\Carbon::parse($rekam->tanggal_pemeriksaan)->translatedFormat('d F Y')); ?></p>
            <p>Dokter Pemeriksa,</p>
            <div class="signature-line"></div>
            <p class="doctor-name"><?php echo e($dokter->nama ?? '..................................'); ?></p>
            <div class="stamp-area">Stempel Rumah Sakit</div>
        </div>
        
        <div class="noprint buttons">
            <button onclick="window.print()">
                🖨 Cetak Rekam Medis
            </button>
            <button onclick="window.close()">
                X Tutup
            </button>
        </div>
        
        <div class="footer noprint">
            <p>Dokumen ini bersifat rahasia dan hanya digunakan untuk kepentingan medis.</p>
            <p>© <?php echo e(date('Y')); ?> Rumah Sakit US. Hak Cipta Dilindungi.</p>
        </div>
    </div>
    
    <script>
        function exportToPDF() {
            alert('Fitur ekspor ke PDF akan segera tersedia.');
            // Implementasi export to PDF dapat ditambahkan di sini
        }
        
        // Kode untuk parsing obat dari format teks menjadi item-item terpisah
        document.addEventListener('DOMContentLoaded', function() {
            const obatValue = document.querySelector('.medication-list');
            if (obatValue) {
                const obatText = obatValue.innerText.trim();
                if (obatText) {
                    obatValue.innerHTML = '';
                    const obatItems = obatText.split('\n');
                    obatItems.forEach(item => {
                        if (item.trim() !== '') {
                            const li = document.createElement('li');
                            li.className = 'medication-item';
                            li.textContent = item.trim();
                            obatValue.appendChild(li);
                        }
                    });
                }
            }
        });
    </script>
</body>
</html><?php /**PATH D:\Dzaky\Kuliah\Semester6\SIRS\SIMRS\resources\views/admin/print/rekam-medis.blade.php ENDPATH**/ ?>