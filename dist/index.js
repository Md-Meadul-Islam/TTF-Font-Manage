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
                    const styleTag = document.querySelector('style');
                    styleTag.innerHTML += `
                        @font-face {
                            font-family: '${font.split('.')[0]}';
                            src: url('./files/${font}') format('truetype');
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

const dragDropArea = document.getElementById('dragDropArea');
const fileInput = document.getElementById('choosefont');

dragDropArea.addEventListener('dragover', (e) => {
    e.preventDefault();
    dragDropArea.style.borderColor = '#aaa';
});

dragDropArea.addEventListener('dragleave', (e) => {
    dragDropArea.style.borderColor = '#ccc';
});

dragDropArea.addEventListener('drop', (e) => {
    e.preventDefault();
    dragDropArea.style.borderColor = '#ccc';
    const file = e.dataTransfer.files[0];
    handleFile(file);
});

// Handle click to select file
dragDropArea.addEventListener('click', () => {
    fileInput.click();
});

fileInput.addEventListener('change', (e) => {
    const file = e.target.files[0];
    handleFile(file);
});
loadFont();