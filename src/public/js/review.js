//テキストエリアの文字数表示
const textarea = document.getElementById("textarea")
const maxLength = textarea.getAttribute("maxlength")
const commentCounter = document.getElementById("comment__counter")
textarea.addEventListener("input", () => {
    const currentLength = textarea.value.length;
    commentCounter.textContent = `${currentLength} / ${maxLength}（最高文字数）`
    if (currentLength > maxLength) {
        commentCounter.style.color = "red"
    } else {
        commentCounter.style.removeProperty("color")
    }
})

//画像追加ボタン
document.querySelector(".review__image-button").addEventListener("click", () => {
    document.querySelector(".review__image-upload").click()
})

//画像のプレビュー表示
const fileInput = document.querySelector("input[type=file]")
fileInput.addEventListener("change", function(e) {
    const reader = new FileReader()
    reader.onload = function(e) {
        $('#preview').attr('src', e.target.result)
    }
    reader.readAsDataURL(e.target.files[0])
})

//ドラッグアンドドロップ
var $dropArea = $('.drop-area');

$dropArea.on('dragover', function(e) {
    e.stopPropagation();
    e.preventDefault();
    $(this).css('border', '3px #ccc dashed')
});
$dropArea.on('dragleave', function(e) {
    e.stopPropagation();
    e.preventDefault();
    $(this).css('border', 'none');
});
$dropArea.on('drop', function(e) {
    $(this).css('border', 'none');
    e.preventDefault();
    const files = e.originalEvent.dataTransfer.files;
    fileInput.files = e.originalEvent.dataTransfer.files;
    const reader = new FileReader();
    reader.onload = function(e) {
        console.log('true');
        $('#preview').attr('src', e.target.result);
    }
    reader.readAsDataURL(files[0]);
});
