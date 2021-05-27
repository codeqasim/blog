<h2 class="content_head" style="height:50px"><?=$title?></h2>
<?php echo $xcrud->render(); ?>

<script>
ClassicEditor.create(document.querySelector(".editor"), {
toolbar: {
    items: [
        "heading",
        "|",
        "bold",
        "italic",
        "link",
        "bulletedList",
        "numberedList",
        "|",
        "indent",
        "outdent",
        "|",
        "imageUpload",
        "blockQuote",
        "mediaEmbed",
        "undo",
        "redo",
    ],
},
language: "en",
image: {
    toolbar: ["imageTextAlternative", "imageStyle:full", "imageStyle:side"],
},
licenseKey: "",
})
.then((editor) => {
    window.editor = editor;
})
.catch((error) => {
    console.error("Oops, something went wrong!");
    console.error(
        "Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:"
    );
    console.warn("Build id: ref2goguw78q-8ghiwfe1qu83");
    console.error(error);
});
</script>