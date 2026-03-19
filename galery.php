<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri XII TKJ 3</title>
    <link rel="stylesheet" href="style.css">
    <!-- Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Background putih kebiruan */
        body {
            background-color: #e6f0fa;
            margin: 0;
            padding: 0;
        }
        
        .card {
            background-color: transparent;
        }
        
        .content {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 40px 20px;
            min-height: 70vh;
        }
        
        .main-container {
            background: #ffffff;
            border-radius: 30px;
            padding: 30px 30px;
            max-width: 1000px;
            width: 100%;
            box-shadow: 0 10px 25px rgba(0,40,80,0.1);
        }
        
        /* Header dengan judul di tengah dan button di pojok */
        .gallery-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }
        
        .gallery-header h2 {
            font-size: 32px;
            color: #0a2a44;
            font-weight: 700;
            margin: 0 auto;
            text-align: center;
        }
        
        hr {
            border: none;
            border-top: 2px solid #d0e0f0;
            width: 100%;
            margin: 15px 0 25px 0;
        }
        
<<<<<<< HEAD:galery.php
        /* Add button */
=======
        /* ===== ADD FOTO BUTTON ===== */
>>>>>>> b4c4b07 (apa saja):galery.html
        .add-button {
            display: flex;
            align-items: center;
            gap: 8px;
            background: #0a2a44;
            color: white;
            padding: 10px 20px;
            border-radius: 40px;
            cursor: pointer;
            font-size: 15px;
            font-weight: 500;
            transition: all 0.3s;
            border: none;
            box-shadow: 0 3px 10px rgba(10,42,68,0.2);
            white-space: nowrap;
        }
        
        .add-button:hover {
            background: #123456;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(10,42,68,0.3);
        }
        
        .add-button i {
            font-size: 16px;
        }
        
        input[type="file"] {
            display: none;
        }
        
        /* Gallery grid */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 15px;
            margin-top: 20px;
        }
        
        .gallery-item {
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            aspect-ratio: 1/1;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            border: 2px solid white;
            transition: transform 0.2s;
            cursor: pointer;
        }
        
        .gallery-item:hover {
            transform: scale(1.02);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }
        
        .gallery-item:hover::after {
            content: '\f00e'; /* Font awesome zoom icon */
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            position: absolute;
            top: 10px;
            right: 10px;
            background: rgba(0,0,0,0.5);
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
        }
        
        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }
        
        .empty-gallery {
            grid-column: 1 / -1;
            text-align: center;
            padding: 60px 20px;
            background: #f8fafc;
            border-radius: 16px;
            color: #718096;
        }
        
        .empty-gallery i {
            font-size: 48px;
            color: #d0e0f0;
            margin-bottom: 15px;
        }
        
        /* ===== MODAL LIGHTBOX ===== */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.9);
            overflow: auto;
        }
        
        .modal-content {
            margin: auto;
            display: block;
            max-width: 90%;
            max-height: 80vh;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 10px;
            box-shadow: 0 0 30px rgba(255,255,255,0.2);
        }
        
        .close-modal {
            position: absolute;
            top: 20px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
            z-index: 1001;
        }
        
        .close-modal:hover {
            color: #ffd700;
        }
        
        .modal-controls {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 20px;
            z-index: 1001;
        }
        
        .modal-btn {
            background: rgba(255,255,255,0.2);
            color: white;
            border: 2px solid white;
            padding: 12px 25px;
            border-radius: 50px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s;
            backdrop-filter: blur(5px);
        }
        
        .modal-btn:hover {
            background: white;
            color: #0a2a44;
            transform: scale(1.05);
        }
        
        .modal-btn i {
            font-size: 18px;
        }
        
        .modal-caption {
            position: absolute;
            bottom: 100px;
            left: 0;
            right: 0;
            text-align: center;
            color: white;
            font-size: 16px;
            background: rgba(0,0,0,0.5);
            padding: 8px;
            backdrop-filter: blur(5px);
        }
        
        .footer {
            margin-top: 30px;
            text-align: center;
            color: #718096;
            font-size: 14px;
            border-top: 1px solid #d0e0f0;
            padding-top: 20px;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .gallery-header {
                flex-direction: column;
                gap: 15px;
            }
<<<<<<< HEAD:galery.php
=======
            
            .gallery-header h2 {
                font-size: 28px;
            }
            
>>>>>>> b4c4b07 (apa saja):galery.html
            .add-button {
                align-self: flex-end;
            }
            
            .modal-content {
                max-width: 95%;
            }
            
            .modal-btn {
                padding: 8px 16px;
                font-size: 14px;
            }
        }
        
        @media (max-width: 480px) {
            .gallery-header h2 {
                font-size: 24px;
            }
            
            .add-button {
                padding: 8px 16px;
                font-size: 14px;
            }
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
<<<<<<< HEAD:galery.php
                    <a href="index.php">HOME</a>
                    <a href="profil.php">Profil Kelas</a>
                    <a href="galery.php">Galeri</a>
                    <a href="hubungi.php">Hubungi kami</a>
=======
                    <a href="index.html">HOME</a>
                    <a href="profil.html">Profil Kelas</a>
                    <a href="galery.html">Galeri</a>
                    <a href="hubungi.html">Hubungi kami</a>
>>>>>>> b4c4b07 (apa saja):galery.html
                </nav>
            </div>
        </div>

        <div class="content">
            <div class="main-container">
<<<<<<< HEAD:galery.php
                <div class="header-section">
                    <div>
                        <h2>GALERI KELAS</h2>
                        <div class="description">
                            Mengabadikan momen kegiatan kelas XII TKJ 3
                        </div>
                    </div>
=======
                <!-- Header dengan judul di tengah dan button di pojok -->
                <div class="gallery-header">
                    <h2>GALERI KELAS</h2>
>>>>>>> b4c4b07 (apa saja):galery.html
                    
                    <label for="uploadPhotos" class="add-button">
                        <i class="fas fa-plus"></i> Tambah Foto
                    </label>
                    <input type="file" id="uploadPhotos" accept="image/*" multiple>
                </div>
                
                <hr>
                
                <div class="gallery-grid" id="galleryGrid">
                    <!-- Akan diisi JavaScript -->
                </div>
                
                <div class="footer">
                    <span>© 2026 - XII TKJ 3 SMKN 1 RANCAEKEK</span>
                </div>
            </div>
        </div>
    </div>
    
    <!-- MODAL LIGHTBOX -->
    <div id="imageModal" class="modal">
        <span class="close-modal">&times;</span>
        <img class="modal-content" id="modalImage">
        <div class="modal-caption" id="modalCaption"></div>
        <div class="modal-controls">
            <button class="modal-btn" id="downloadBtn">
                <i class="fas fa-download"></i> Download
            </button>
        </div>
    </div>
    
    <script>
        const uploadInput = document.getElementById('uploadPhotos');
        const galleryGrid = document.getElementById('galleryGrid');
        
        // Modal elements
        const modal = document.getElementById('imageModal');
        const modalImg = document.getElementById('modalImage');
        const modalCaption = document.getElementById('modalCaption');
        const closeBtn = document.querySelector('.close-modal');
        const downloadBtn = document.getElementById('downloadBtn');
        
        let currentImageSrc = '';

        function loadGallery() {
            const savedImages = JSON.parse(localStorage.getItem('galleryImages') || '[]');
            
            if (savedImages.length === 0) {
                galleryGrid.innerHTML = `
                    <div class="empty-gallery">
                        <i class="fas fa-images"></i>
                        <p>Belum ada foto. Klik "Tambah Foto" untuk memulai.</p>
                    </div>
                `;
                return;
            }
            
            galleryGrid.innerHTML = '';
            savedImages.forEach((imgData, index) => {
                const item = document.createElement('div');
                item.className = 'gallery-item';
<<<<<<< HEAD:galery.php
                const img = document.createElement('img');
                img.src = imgData;
                img.alt = 'Gallery image';
=======
                item.setAttribute('data-index', index);
                
                const img = document.createElement('img');
                img.src = imgData;
                img.alt = `Foto ${index + 1}`;
                
>>>>>>> b4c4b07 (apa saja):galery.html
                item.appendChild(img);
                
                // Klik untuk buka modal
                item.addEventListener('click', function() {
                    openModal(imgData, `Foto ${index + 1}`);
                });
                
                galleryGrid.appendChild(item);
            });
<<<<<<< HEAD:galery.php
            
            fileName.textContent = `${savedImages.length} foto tersimpan`;
        }

=======
        }

        // Open modal with image
        function openModal(imgSrc, caption) {
            modal.style.display = 'block';
            modalImg.src = imgSrc;
            modalCaption.textContent = caption;
            currentImageSrc = imgSrc;
            
            // Prevent body scrolling
            document.body.style.overflow = 'hidden';
        }

        // Close modal
        function closeModal() {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        // Download image
        function downloadImage() {
            if (!currentImageSrc) return;
            
            // Create a temporary link
            const link = document.createElement('a');
            link.href = currentImageSrc;
            link.download = 'galeri-tkj3-' + new Date().getTime() + '.jpg';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }

        // Event listeners for modal
        closeBtn.addEventListener('click', closeModal);
        
        downloadBtn.addEventListener('click', downloadImage);
        
        // Click outside modal to close
        window.addEventListener('click', (e) => {
            if (e.target === modal) {
                closeModal();
            }
        });

        // Escape key to close
        window.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && modal.style.display === 'block') {
                closeModal();
            }
        });

        // Save images to localStorage
>>>>>>> b4c4b07 (apa saja):galery.html
        function saveToLocalStorage(images) {
            localStorage.setItem('galleryImages', JSON.stringify(images));
        }

        uploadInput.addEventListener('change', (event) => {
            const files = event.target.files;
            if (files.length === 0) return;
            
            const savedImages = JSON.parse(localStorage.getItem('galleryImages') || '[]');
            const readers = [];

            Array.from(files).forEach(file => {
                if (!file.type.startsWith('image/')) {
                    alert('File ' + file.name + ' bukan gambar. Lewati.');
                    return;
                }
                
                const reader = new FileReader();
                readers.push(new Promise((resolve) => {
                    reader.onload = function(e) {
                        savedImages.push(e.target.result);
                        resolve();
                    };
                    reader.readAsDataURL(file);
                }));
            });

            Promise.all(readers).then(() => {
                saveToLocalStorage(savedImages);
                loadGallery();
<<<<<<< HEAD:galery.php
                fileName.textContent = `${addedCount} foto ditambahkan`;
                setTimeout(() => {
                    const total = savedImages.length;
                    fileName.textContent = `${total} foto tersimpan`;
                }, 3000);
=======
>>>>>>> b4c4b07 (apa saja):galery.html
            });
        });

        loadGallery();
    </script>
</body>
</html>