
var canvas,board,color_pen;
canvas = document.getElementById('imageSrc');
Bounding = document.querySelector("#imageSrc").getBoundingClientRect();
Bounding.top
canvas.width=canvas.clientWidth
canvas.height=canvas.clientHeight
board = canvas.getContext('2d');

var mousePress = false;
var last = null;
//開始繪制
function beginDraw(){
    mousePress = true;
}
//繪制
function drawing(event){
    event.preventDefault();
    if(!mousePress)return;
    var xy = pos(event);
    if(last!=null){
        board.beginPath();
        board.moveTo(last.x,last.y);
        board.lineTo(xy.x,xy.y);
        board.stroke();
    }
    last = xy;
}
//結束繪制
function endDraw(event){
    mousePress = false;
    event.preventDefault();
    last = null;
}
//獲取位置
function pos(event){
    var x,y;
    if(isTouch(event)){
        console.log(event.touches[0]);
        console.log(event.touches[0].pageX);
        console.log(event.touches[0].pageY);
        console.log(Bounding.left);
        console.log(Bounding.top);
        x = event.touches[0].pageX-Bounding.left;
        y = event.touches[0].pageY-Bounding.top;
    }else{
        x = event.offsetX;
        y = event.offsetY;
    }
     return {x:x,y:y};
}

//檢測是touch還是mouse事件
function isTouch(event){
    var type = event.type;
    if(type.indexOf('touch')>=0){
        return true;
    }else{
        return false;
    }
}

//清除軌跡  
clear.addEventListener('click',function(){
    board.clearRect(0, 0, board.canvas.width, board.canvas.height);
});
// //轉換成圖片顯示
function convertCanvasToImage() {
    var image = canvas.toDataURL("image/png"); 
    $('#image').html("<img src='"+image+"' alt='from canvas'/>");
}

//生成圖片並上傳到服務器
function UploadPic() {       
    var Pic = canvas.toDataURL("image/png");
    Pic = Pic.replace(/^data:image\/(png|jpg);base64,/, "")
 
    $.ajax({
        type: 'POST',
        url: 'url',
        data: '{ "imageData" : "' + Pic + '" }',
        contentType: 'application/json; charset=utf-8',
        dataType: 'json',
        success: function (msg) {
            console.log("圖片上傳成功");
        },
        error: function(msg) {
            alert("需要服務器資源");
        }
    });
}        
tooltip.onchange= function (event){
    color_pen=event.target.value;
    board.strokeStyle=color_pen;
 }
 pansize.onchange= function (event){
    pansize=event.target.value;
    board.lineWidth=pansize;
 }
board.lineJoin = "round";
canvas.onmousedown = beginDraw;
canvas.onmousemove = drawing;
canvas.onmouseup = endDraw;
canvas.addEventListener('touchstart',beginDraw,false);
canvas.addEventListener('touchmove',drawing,false);
canvas.addEventListener('touchend',endDraw,false);