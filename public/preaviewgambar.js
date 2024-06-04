// photorofile, tentang kamio dan beranda
function readURL(input) {
    const file = input.files[0];
    const preview = document.getElementById('preaview');
    const error = document.getElementById('fileError');
    const fileTypes = ['image/jpeg', 'image/jpg', 'image/png'];

    if (file) {
        if (file.size > 2 * 1024 * 1024) {
            error.textContent = 'Ukuran file maksimum adalah 2MB';
            input.value = '';
            preview.src = '';
        } else if (!fileTypes.includes(file.type)) {
            error.textContent = 'Format file tidak valid. Harus .jpeg, .jpg, atau .png';
            input.value = '';
            preview.src = '';
        } else {
            error.textContent = '';
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    } else {
        preview.src = '';
        error.textContent = '';
    }
}
////
function validateAndPreviewGambar1(input) {
    const maxFileSize = 2 * 1024 * 1024; // 2MB in bytes
    const validFileExtensions = ['image/jpeg', 'image/jpg', 'image/png'];
    const file = input.files[0];
    const errorElement = document.getElementById('fileErrorGambar1');

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
            document.getElementById('previewGambar1').src = e.target.result;
        }
        reader.readAsDataURL(file);
    }
}

function validateAndPreviewGambar2(input) {
    const maxFileSize = 2 * 1024 * 1024; // 2MB in bytes
    const validFileExtensions = ['image/jpeg', 'image/jpg', 'image/png'];
    const file = input.files[0];
    const errorElement = document.getElementById('fileErrorGambar2');

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
            document.getElementById('previewGambar2').src = e.target.result;
        }
        reader.readAsDataURL(file);
    }
}

// function readURL1(input) {
//     if (input.files && input.files[0]) {
//         var reader = new FileReader();

//         reader.onload = function (e) {
//             document.getElementById('preaview2').src = e.target.result;
//         }

//         reader.readAsDataURL(input.files[0]);
//     }
// }

// function readURL2(input) {
//     if (input.files && input.files[0]) {
//         var reader = new FileReader();

//         reader.onload = function (e) {
//             document.getElementById('preaview3').src = e.target.result;
//         }

//         reader.readAsDataURL(input.files[0]);
//     }
// }

function validateAndPreviewTambah(input) {
    const maxFileSize = 2 * 1024 * 1024; // 2MB in bytes
    const validFileExtensions = ['image/jpeg', 'image/jpg', 'image/png'];
    const file = input.files[0];
    const errorElement = document.getElementById('fileErrorTambah');

    if (file) {
        // Check file size
        if (file.size > maxFileSize) {
            errorElement.textContent = 'Ukuran file maksimum 2MB';
            input.value = ''; // Clear the input
            return;
        }

        // Check file type
        if (!validFileExtensions.includes(file.type)) {
            errorElement.textContent = 'Format file tidak valid. Harus .jpeg, .jpg, atau .png';
            input.value = ''; // Clear the input
            return;
        }

        errorElement.textContent = ''; // Clear any previous errors

        var reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('previewTambah').src = e.target.result;
        }
        reader.readAsDataURL(file);
    }
}


