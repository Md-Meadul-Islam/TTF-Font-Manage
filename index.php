<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TTF Font Upload | Full Stack Developer Assignment</title>
        <link rel="stylesheet" href="./dist/bootstrap.css">
        <link rel="stylesheet" href="./dist/style.css">
        <style>
        </style>
    </head>

    <body class="text-secondary">
        <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top shadow"
            style="max-width:1440px; margin-left:auto; margin-right:auto;">
            <div class="d-flex w-100 justify-content-between mx-lg-3 mx-md-1 mx-0">
                <div class="mx-auto d-flex align-items-center">
                    <a href="/" class="navbar-brand">TTF Font Upload</a>
                </div>
                <div class="message ms-auto">
                </div>
            </div>
        </nav>
        <section class="file-upload pt-5">
            <div class="row g-0 d-flex align-items-center justify-content-center pt-5">
                <div class="col-4 py-2">
                    <div class="drag-drop-area" id="dragDropArea">
                        <div>
                            <p class="label"><span class="text-underline-hover">Choose Font</span> or Drag & Drop</p>
                            <input type="file" name="font" id="choosefont" accept=".ttf" hidden>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="pt-5">
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
        </section>
        <section class="pt-5">
            <div class="row g-0 d-flex align-items-center justify-content-center">
                <div class="col-8">
                    <h3 class="fw-bold mb-0">Create font Group</h3>
                    <p>You have to select at least two fonts</p>
                    <div>
                        <div>
                            <input type="text" name="groupname" id="groupname" class="form-control"
                                placeholder="Group Title">
                        </div>
                        <div class="py-2">
                            <div class="card p-1 my-2">
                                <div class="row g-0 d-flex align-items-center">
                                    <div class="col-6 p-1">
                                        <input type="text" name="fontname" class="fontname form-control"
                                            placeholder="Font Name" disabled>
                                    </div>
                                    <div class="col-5 p-1">
                                        <select name="allfonts" class="allfonts form-select">
                                            <option value="">Select Font</option>
                                        </select>
                                    </div>
                                    <div class="col-1 p-1 d-flex align-items-center justify-content-center">
                                        <a class="text-danger cursor-pointer">✖</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card p-1 my-2">
                                <div class="row g-0 d-flex align-items-center">
                                    <div class="col-6 p-1">
                                        <input type="text" name="fontname" class="fontname form-control"
                                            placeholder="Font Name" disabled>
                                    </div>
                                    <div class="col-5 p-1">
                                        <select name="allfonts" class="allfonts form-select">
                                            <option value="">Select Font</option>
                                        </select>
                                    </div>
                                    <div class="col-1 p-1 d-flex align-items-center justify-content-center">
                                        <a class="text-danger cursor-pointer">✖</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <a class="btn btn-sm btn-outline-success px-4"> ➕ Add Row</a>
                            <a class="btn btn-success btn-sm px-4">Create</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-5">
            <div class="row g-0 d-flex align-items-center justify-content-center">
                <div class="col-8">
                    <div class="border border-1 border-secondary-subtle">
                        <div class="p-2">
                            <h3 class="fw-bold mb-0">Our Font Groups</h3>
                            <p>List of all available font groups</p>
                        </div>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <th class="text-secondary bg-warning-subtle">NAME</th>
                                <th class="text-secondary bg-warning-subtle">FONTS</th>
                                <th class="text-secondary bg-warning-subtle">COUNT</th>
                                <th class="text-secondary bg-warning-subtle">ACTION</th>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <script src="./dist/jquery.min.js"></script>
        <script src="./dist/index.js"></script>
    </body>

</html>