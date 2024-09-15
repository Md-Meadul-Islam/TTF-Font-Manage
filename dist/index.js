let fontNameArr = [];
function handleFile(font) {
    const fontExtension = font.name.split('.').pop().toLowerCase();
    if (font && fontExtension == 'ttf') {
        const reader = new FileReader();
        reader.readAsDataURL(font);
        uploadFont(font);
    } else {
        alert('Please upload a TTF font file.');
        fileInput.value = '';
    }
}
function uploadFont(font) {
    let formData = new FormData();
    formData.append('font', font);
    fetch('uploadfont.php', {
        method: 'POST',
        body: formData
    }).then(response => response.json())
        .then((data) => {
            if (data.success) {
                fontNameArr.append(data.fontName);
                const tableBody = document.querySelector('.all-fonts');
                const styleTag = document.querySelector('style');
                styleTag.innerHTML += `
                    @font-face {
                        font-family: '${data.fontName}';
                        src: url('${data.fontPath}') format('truetype');
                    }
                `;
                const row = document.createElement('tr');
                row.innerHTML = `
                        <td class="text-secondary">${data.fontName}</td>
                        <td class="text-secondary" style="font-family: '${data.fontName}';">Sample Preview</td>
                        <td><a href="#" class="text-underline-hover text-danger delete-font">Delete</a></td>
                    `;
                tableBody.prepend(row);
            }
            console.log(data.message);
        })
        .catch(err => console.error('Error:', err));
}
function loadFont() {
    fetch('loadfonts.php', {
        method: 'GET'
    }).then(response => response.json())
        .then((data) => {
            if (data.success) {
                const fonts = data.fonts;
                const tableBody = document.querySelector('.all-fonts');
                fonts.forEach((font, i) => {
                    fontNameArr.push(font.split('.')[0]);
                    const styleTag = document.querySelector('style');
                    styleTag.innerHTML += `
                        @font-face {
                            font-family: '${font.split('.')[0]}';
                            src: url('./fonts/${font}') format('truetype');
                        }
                    `;
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td class="text-secondary">${font.split('.')[0]}</td>
                        <td class="text-secondary" style="font-family: '${font.split('.')[0]}';">Sample Preview</td>
                        <td><a href="#" class="text-underline-hover text-danger delete-font">Delete</a></td>
                    `;
                    tableBody.appendChild(row);
                });
            }
        })
}
function checkDuplicate(selectedFont, currentIndex) {
    let isDuplicate = false;
    $('.fontname').each(function (index, fontname) {
        if (index !== currentIndex && $(fontname).val() === selectedFont) {
            isDuplicate = true;
        }
    });
    if (isDuplicate) {
        $('.fontname').eq(currentIndex).val('');
        $('.message').html('<p class="text-danger">Please choose a different font.</p>');
    } else {
        $('.message').html('');
    }
}

function populateFontOptions() {
    const fontSelect = document.querySelectorAll('.allfonts');

    fontSelect.forEach(function (select, index) {
        select.innerHTML = '<option value="">Select Font</option>';
        fontNameArr.forEach(function (font) {
            const option = document.createElement('option');
            option.value = font;
            option.textContent = font;
            select.appendChild(option);
        });
        select.addEventListener('change', (e) => {
            const selectedFont = e.target.value;
            const fontnameInput = document.querySelectorAll('.fontname')[index];
            fontnameInput.value = selectedFont;
            checkDuplicate(selectedFont, index);
        });
    });
}

function loadFontGroup() {

}
$(window).on('load', function () {
    const dragDropArea = $('#dragDropArea');
    const fileInput = $('#choosefont');

    dragDropArea.on('dragover', function (e) {
        e.preventDefault();
        dragDropArea.css('border-color', '#aaa');
    });

    dragDropArea.on('dragleave', function () {
        dragDropArea.css('border-color', '#ccc');
    });

    dragDropArea.on('drop', function (e) {
        e.preventDefault();
        dragDropArea.css('border-color', '#ccc');
        const file = e.originalEvent.dataTransfer.files[0];
        handleFile(file);
    });

    // Handle click to select file
    dragDropArea.on('click', function () {
        fileInput.click();
    });

    fileInput.on('change', function (e) {
        const file = e.target.files[0];
        handleFile(file);
    });

    loadFont();
    setTimeout(populateFontOptions, 1000);

    $(document).on('click', function (e) {
        if ($(e.target).closest('.crossBtn').length) {
            let $this = $(e.target);
            if ($('.card').length > 2) {
                $this.closest('.card').remove();
                $('.message').html('');
                populateFontOptions();
            } else {
                $('.message').html('<p class="text-danger">At least two cards must remain !</p>');
            }
        }
        if ($(e.target).closest('.addRow').length) {
            let newRow = `<div class="card p-1 my-2">
                                <div class="row g-0 d-flex align-items-center">
                                    <div class="col-6 p-1">
                                        <input type="text" name="fontname" class="fontname form-control"
                                            placeholder="Font Name" disabled>
                                    </div>
                                    <div class="col-5 p-1">
                                        <select name="allfonts" class="allfonts form-select">
                                        <option value="">Select Font</option> </select>
                                    </div>
                                    <div class="col-1 p-1 d-flex align-items-center justify-content-center">
                                        <a
                                            class="crossBtn text-danger cursor-pointer border border-1 rounded-circle p-1">✖</a>
                                    </div>
                                </div>
                            </div>`;
            $('.fontChooseRow').append(newRow);
            populateFontOptions();
        }
        if ($(e.target).closest('.createGroup').length) {
            const groupName = $('#groupname').val();
            const allRow = $('.fontChooseRow').children();
            let fontName = [];
            if (allRow.length >= 2) {
                for (let i = 0; i < allRow.length; i++) {
                    fontName.push($(allRow[i]).find('.fontname').val());
                }
                $('.message').html('');
            } else {
                $('.message').html('<p class="text-danger">Select at Least two font !</p>');
            }

            if (!groupName) {
                $('.message').html('<p class="text-danger">Group Name Required !</p>');
            }
        }
    })
})
