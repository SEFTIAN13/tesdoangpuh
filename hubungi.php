<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
    <title>Hubungi XII TKJ 3</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Background PUTIH KEBIRUAN */
        body {
            background-color: #e6f0fa;
            margin: 0;
            padding: 0;
            width: 100%;
            overflow-x: hidden;
        }
        .card {
            background-color: transparent;
            width: 100%;
            max-width: 100%;
            overflow-x: hidden;
        }
        .content {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px 15px;
            min-height: 70vh;
            width: 100%;
            max-width: 100%;
            box-sizing: border-box;
        }
        .main-container {
            background: #ffffff;
            border-radius: 30px;
            padding: 30px 25px;
            max-width: 1000px;
            width: 100%;
            box-shadow: 0 15px 30px rgba(0,40,80,0.15);
            color: #333333;
            box-sizing: border-box;
        }
        .main-container h2 {
            text-align: center;
            font-size: 28px;
            margin-bottom: 10px;
            color: #0a2a44;
            font-weight: 700;
        }
        .main-container .description {
            text-align: center;
            color: #4a5568;
            margin-bottom: 20px;
            font-size: 15px;
        }
        .main-container hr {
            border: none;
            border-top: 2px solid #d0e0f0;
            width: 100%;
            margin: 20px 0;
        }
        .contact-grid {
            display: flex;
            justify-content: center;
            gap: 40px;
            margin: 25px 0;
            flex-wrap: wrap;
        }
        .contact-item {
            text-align: center;
            flex: 0 1 250px;
            padding: 20px 15px;
            border-radius: 20px;
            transition: transform 0.3s;
        }
        .contact-item:hover {
            transform: translateY(-5px);
        }
        .instagram-item {
            background: linear-gradient(135deg, #f09433 0%, #d62976 100%);
            box-shadow: 0 10px 20px rgba(214, 41, 118, 0.3);
        }
        .tiktok-item {
            background: linear-gradient(135deg, #000000 0%, #1a1a1a 100%);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }
        .contact-item i {
            font-size: 48px;
            margin-bottom: 15px;
            color: white;
        }
        .contact-item h3 {
            font-size: 20px;
            margin-bottom: 10px;
            color: white;
            font-weight: 600;
        }
        .contact-item .username {
            font-size: 16px;
            color: white;
            margin-bottom: 15px;
            opacity: 0.9;
        }
        .follow-btn {
            display: inline-block;
            background: rgba(255,255,255,0.2);
            color: white;
            padding: 8px 30px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 500;
            border: 2px solid white;
            transition: all 0.3s;
        }
        .follow-btn:hover {
            background: white;
            color: #333;
            transform: scale(1.05);
        }
        .location-section {
            margin-top: 20px;
        }
        .location-section h3 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #0a2a44;
            text-align: center;
        }
        .location-section h3:after {
            content: '';
            display: block;
            width: 50px;
            height: 3px;
            background: #0a2a44;
            margin: 10px auto 0;
            border-radius: 3px;
        }
        .location-card {
            background: #f8fafc;
            border-radius: 25px;
            padding: 25px;
            border: 1px solid #d0e0f0;
            margin-bottom: 25px;
        }
        .school-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }
        .school-icon {
            width: 60px;
            height: 60px;
            background: #e6f0fa;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            color: #0a2a44;
        }
        .school-title h4 {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 5px;
            color: #0a2a44;
        }
        .school-title p {
            color: #4a5568;
            font-size: 14px;
        }
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin: 20px 0;
        }
        .info-box {
            display: flex;
            align-items: center;
            gap: 12px;
            background: white;
            padding: 12px 15px;
            border-radius: 15px;
            border: 1px solid #d0e0f0;
        }
        .info-box i {
            font-size: 20px;
            width: 30px;
            color: #0a2a44;
        }
        .info-box .label {
            font-size: 12px;
            color: #718096;
            margin-bottom: 3px;
        }
        .info-box .value {
            font-size: 14px;
            font-weight: 600;
            color: #2d3748;
        }
        .address-box {
            background: #e6f0fa;
            padding: 18px;
            border-radius: 15px;
            margin: 20px 0;
            border-left: 4px solid #0a2a44;
        }
        .address-box i {
            color: #0a2a44;
            margin-right: 10px;
        }
        .address-box p {
            line-height: 1.6;
            color: #2d3748;
            margin: 0;
        }
        .map-container {
            border-radius: 20px;
            overflow: hidden;
            margin: 20px 0;
            border: 2px solid #d0e0f0;
        }
        .map-container iframe {
            width: 100%;
            height: 250px;
            border: none;
            display: block;
        }
        .footer {
            margin-top: 25px;
            color: #718096;
            text-align: center;
            font-size: 13px;
        }
        @media (max-width: 768px) {
            .main-container { padding: 25px 20px; }
            .contact-grid { gap: 20px; }
            .contact-item { flex: 0 1 220px; padding: 15px 12px; }
            .school-header { flex-direction: column; text-align: center; }
            .info-grid { grid-template-columns: 1fr; }
        }
        @media (max-width: 480px) {
            .main-container { padding: 20px 15px; }
            .main-container h2 { font-size: 24px; }
            .contact-item { flex: 0 1 100%; max-width: 280px; }
            .contact-item i { font-size: 40px; }
            .contact-item h3 { font-size: 18px; }
            .location-section h3 { font-size: 22px; }
            .school-title h4 { font-size: 20px; }
            .map-container iframe { height: 200px; }
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="header-wrapper">
            <div class="header">
                <div class="brand">
                    <img src="logo.png" alt="logo" class="logo">
                    <span>TEKNIK KOMPUTER DAN JARINGAN</span>
                </div>
                <nav class="navbar">
                    <a href="index.php">HOME</a>
                    <a href="profil.php">Profil Kelas</a>
                    <a href="galery.php">Galeri</a>
                    <a href="hubungi.php">Hubungi kami</a>
                </nav>
            </div>
        </div>

        <div class="content">
            <div class="main-container">
                <h2>HUBUNGI KAMI</h2>
                <div class="description">
                    Ini halaman kontak resmi XII TKJ 3 — siap melayani pertanyaan dan kolaborasi.
                </div>
                
                <hr>
                
                <div class="contact-grid">
                    <div class="contact-item instagram-item">
                        <i class="fab fa-instagram"></i>
                        <h3>Instagram</h3>
                        <div class="username">@ofcns.tkjthree_</div>
                        <a href="https://www.instagram.com/ofcns.tkjthree_" target="_blank" class="follow-btn">Follow</a>
                    </div>
                    
                    <div class="contact-item tiktok-item">
                        <i class="fab fa-tiktok"></i>
                        <h3>TikTok</h3>
                        <div class="username">@xii_tkj3.account</div>
                        <a href="https://www.tiktok.com/@xii_tkj3.account" target="_blank" class="follow-btn">Follow</a>
                    </div>
                </div>
                
                <hr>
                
                <div class="location-section">
                    <h3>Lokasi Sekolah</h3>
                    
                    <div class="location-card">
                        <div class="school-header">
                            <div class="school-icon">
                                <i class="fas fa-school"></i>
                            </div>
                            <div class="school-title">
                                <h4>SMKN 1 RANCAEKEK</h4>
                                <p><i class="fas fa-star" style="color: #fbbf24;"></i> 4.5 ★ (122 ulasan)</p>
                            </div>
                        </div>
                        
                        <div class="info-grid">
                            <div class="info-box">
                                <i class="fas fa-map-marker-alt"></i>
                                <div><div class="label">Kecamatan</div><div class="value">Rancaekek</div></div>
                            </div>
                            <div class="info-box">
                                <i class="fas fa-city"></i>
                                <div><div class="label">Kabupaten</div><div class="value">Bandung</div></div>
                            </div>
                            <div class="info-box">
                                <i class="fas fa-code-branch"></i>
                                <div><div class="label">Kode Pos</div><div class="value">40394</div></div>
                            </div>
                            <div class="info-box">
                                <i class="fas fa-phone"></i>
                                <div><div class="label">Telepon</div><div class="value">+62 878-9019-8284</div></div>
                            </div>
                            <div class="info-box">
                                <i class="fas fa-envelope"></i>
                                <div><div class="label">Email</div><div class="value">smkn1rancaekek@example.com</div></div>
                            </div>
                            <div class="info-box">
                                <i class="fas fa-globe"></i>
                                <div><div class="label">Website</div><div class="value">www.smkn1rancaekek.sch.id</div></div>
                            </div>
                        </div>
                        
                        <div class="address-box">
                            <p>
                                <i class="fas fa-location-dot"></i> 
                                <strong>Alamat Lengkap:</strong><br>
                                Jl. Jendral Sudirman No. 123, Rancaekek, Kec. Rancaekek,<br>
                                Kabupaten Bandung, Jawa Barat 40394, Indonesia
                            </p>
                        </div>
                        
                        <div class="map-container">
                            <iframe 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.123456789!2d107.806281!3d-6.988362!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68b8a123456789%3A0x123456789abcdef!2sSMKN%201%20Rancaekek!5e0!3m2!1sid!2sid!4v1234567890" 
                                allowfullscreen="" 
                                loading="lazy">
                            </iframe>
                        </div>
                    </div>
                </div>
                
                <div class="footer">
                    <span>© 2026 - XII TKJ 3 SMKN 1 RANCAEKEK</span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>