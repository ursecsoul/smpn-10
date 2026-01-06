<!DOCTYPE html>
<html>
<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .custom-btn {
            background-color: orange;
            border-color: orange;
            color: white;
        }
        
        .custom-btn:hover {
            background-color: #e67e00;
            border-color: #e67e00;
            color: white;
        }

        .modal-header {
            background-color: #00712D;
            color: white;
        }

        .form-label {
            font-weight: 500;
        }

        .btn-close {
            background-color: white;
        }

        .required::after {
            content: " *";
            color: red;
        }
    </style>
</head>
<body>
    <!-- Update the original button to include data-bs-toggle -->
    <button class="btn btn-primary px-4 py-3 mt-3 fs-5 fw-medium custom-btn" 
            type="button"
            data-bs-toggle="modal"
            data-bs-target="#contactModal">
        Kontak Kami
    </button>

    <!-- Modal -->
    <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contactModalLabel">Formulir Kritik dan Saran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="contactForm">
                        <div class="mb-3">
                            <label for="nama" class="form-label required">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label required">Email</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="telepon" class="form-label">Nomor Telepon</label>
                            <input type="tel" class="form-control" id="telepon">
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="form-label required">Kategori</label>
                            <select class="form-select" id="kategori" required>
                                <option value="">Pilih Kategori</option>
                                <option value="kritik">Kritik</option>
                                <option value="saran">Saran</option>
                                <option value="pertanyaan">Pertanyaan</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="pesan" class="form-label required">Pesan</label>
                            <textarea class="form-control" id="pesan" rows="5" required></textarea>
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn custom-btn">Kirim Pesan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Terima kasih! Pesan Anda telah terkirim.');
            var modal = bootstrap.Modal.getInstance(document.getElementById('contactModal'));
            modal.hide();
            this.reset();
        });
    </script>
</body>
</html>