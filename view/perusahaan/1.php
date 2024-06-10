
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Internship</title>
    </head>
    <body>
        <div class="modal">
            <div class="modal__header">
                <span class="modal__title">Edit Internship</span><button class="button button--icon"><svg width="24" viewBox="0 0 24 24" height="24" xmlns="http://www.w3.org/2000/svg">
                        <path fill="none" d="M0 0h24v24H0V0z"></path>
                        <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z">
                        </path>
                    </svg></button>
            </div>
            <form action="process.php" method="POST" enctype="multipart/form-data">
                <div class="modal__body">
                    <div class="input">
                        <label class="input__label">Judul Internship</label>
                        <input class="input__field" type="text" name="judul_internship" value="<?php echo $judul_berita; ?>">
                        <p class="input__description">The title must contain a maximum of 32 characters</p>
                    </div>
                    <!-- Tambahkan elemen input lainnya dengan nilai-nilai yang sesuai -->
                    <div class="input">
                        <label class="input__label">Nama Internship</label>
                        <input class="input__field" type="text" name="nama_internship" value="<?php echo $nama_internship; ?>">
                        <p class="input__description">The title must contain a maximum of 32 characters</p>
                    </div>
                    <div class="input">
                        <label class="input__label">Deskripsi Lowongan</label>
                        <textarea class="input__field input__field--textarea" name="deskripsi_lowongan"><?php echo $deskripsi_berita; ?></textarea>
                        <p class="input__description">Give your vacancy a good description so everyone know what's it for</p>
                    </div>
                    <div class="input">
                        <label class="input__label">Tanggal Awal</label>
                        <input class="input_field input__field input__field--textarea" type='date' name="tanggal_awal" value="<?php echo $tanggal_awal; ?>">
                    </div>
                    <div class="input">
                        <label class="input__label">Tanggal Akhir</label>
                        <input class="input_field input__field input__field--textarea" type='date' name="tanggal_akhir" value="<?php echo $tanggal_akhir; ?>">
                    </div>
                    <div class="input">
                        <label class="input__label">Gambar Internship</label>
                        <input type="file" name="gambar_internship" accept="image/*" >
                        <p class="input__description">Drop a Job Image that matches the description</p>
                    </div>
                </div>
                <div class="modal__footer">
                    <button class="button button--primary" type="submit" name="submit">Change project</button>
                </div>
            </form>
        </div>
    </body>
    </html>
    
