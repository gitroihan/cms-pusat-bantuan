function readURL1(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            document.getElementById('preaview2').src = e.target.result;
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function readURL2(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            document.getElementById('preaview3').src = e.target.result;
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function readURLArtikel(input) {
    const maxFileSize = 2 * 1024 * 1024; // 2MB in bytes
    const validFileExtensions = ['image/jpeg','image/jpg', 'image/png'];

    const file = input.files[0];
    const errorElement = document.getElementById('fileError');

    if (file) {
        // Check file size
        if (file.size > maxFileSize) {
            errorElement.textContent = 'Ukuran file maksimum 2MB';
            input.value = ''; // Clear the input
            return;
        }

        // Check file type
        if (!validFileExtensions.includes(file.type)) {
            errorElement.textContent = 'Ekstensi file harus .jpg atau .png';
            input.value = ''; // Clear the input
            return;
        }

        errorElement.textContent = ''; // Clear any previous errors

        var reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('preaview').src = e.target.result;
        }
        reader.readAsDataURL(file);
    }
}