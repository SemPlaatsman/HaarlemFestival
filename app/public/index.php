<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <title>Document</title>
</head>

<body>
    <textarea name="content" id="content"></textarea>
</body>
<script>
    CKEDITOR.replace("content", {
        toolbar: [
            {
                name: "document",
                items: ["Source", "-", "NewPage", "Preview", "-", "Templates"],
            },
            [
                "Cut",
                "Copy",
                "Paste",
                "PasteText",
                "PasteFromWord",
                "-",
                "Undo",
                "Redo",
            ],
            "/",
            { name: "basicstyles", items: ["Bold", "Italic"] },
        ],
    });
</script>

</html>