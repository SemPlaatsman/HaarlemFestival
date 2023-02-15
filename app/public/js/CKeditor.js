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

// Retrieve the content from the database and populate the editor with it
var xhr = new XMLHttpRequest();
xhr.open("GET", "get_content.php", true);
xhr.onload = function () {
if (xhr.status === 200) {
    CKEDITOR.instances.content.setData(xhr.responseText);
    } else {
        console.log("Request failed.  Returned status of " + xhr.status);
        }
    };
xhr.send();