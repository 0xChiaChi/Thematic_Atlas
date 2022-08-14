// 下載按鈕
var downloadbutton = document.getElementById("downloadbutton");

downloadbutton.addEventListener("click", function(){
    if(checkEmpty(1)!=true){
    var canvas = document.getElementById('imageSrc');
    var anchor = document.createElement('a');
    anchor.href = canvas.toDataURL("image/png");
    anchor.download = "imageSrc.png";
    anchor.click();
    }
})

//驗證canvas畫布是否為空函數
function isCanvasBlank(checkcanvas) {
    var blank = document.createElement('canvas');//系統獲取一個空canvas對象
    blank.width = checkcanvas.width;
    blank.height = checkcanvas.height;
    return checkcanvas.toDataURL() == blank.toDataURL();//比較值相等則為空
}
//調用
//表單非空驗證
function checkEmpty() {
    var check=document.getElementById("imageSrc"); // 獲取html的canvas對象，我這個id="imageSrc"
    if(isCanvasBlank(check)){
        return true;
    }
}