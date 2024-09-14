<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Full Stack Developer Assignment</title>
        <link rel="stylesheet" href="./dist/bootstrap.css">
        <link rel="stylesheet" href="./dist/style.css">
        <style>
        </style>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top shadow"
            style="max-width:1440px; margin-left:auto; margin-right:auto;">
            <div class="d-flex w-100 justify-content-between mx-lg-3 mx-md-1 mx-0">
                <div class="mx-auto d-flex align-items-center">
                    <a href="/" class="navbar-brand">TTF Font Upload</a>
                </div>
            </div>
        </nav>
        <div class="file-upload pt-5">
            <div class="row g-0 d-flex align-items-center justify-content-center pt-5">
                <div class="col-8 py-2">
                    <div class="drag-drop-area" id="dragDropArea">
                        <div>
                            <p class="label">Choose Image or Drag & Drop</p>
                            <input type="file" name="font" id="choosefont" accept=".ttf" hidden>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-3">
            <div class="row g-0 d-flex align-items-center justify-content-center">
                <div class="col-8 text-secondary">
                    <h3 class="mb-0 fw-bold">Our Fonts</h3>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th class="text-secondary">FONT NAME</th>
                            <th class="text-secondary">PREVIEW</th>
                            <th class="text-secondary">ACTION</th>
                        </thead>
                        <tbody class="all-fonts">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script src="./dist/jquery.min.js"></script>
        <script src="./dist/index.js"></script>
    </body>

</html>