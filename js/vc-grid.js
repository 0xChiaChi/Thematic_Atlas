// ------------------ visual-cryptography-grid-system ------------------ //

var cv = window.cv;
let imgElement = document.getElementById("imageSrc");
let inputElement = document.getElementById("fileInput");

// -------------------------------------------------------------------- //

inputElement.addEventListener(
  "change",
  (e) => {
    imgElement.src = URL.createObjectURL(e.target.files[0]);
  },
  false
);

imgElement.onload = function () {
  main();
};

// -------------------------------------------------------------------- //

function buildNoiseLayer(size) {
  var canvas = document.createElement("canvas");
  var context = canvas.getContext("2d");
  var w = (canvas.width = size["width"]);
  var h = (canvas.height = size["height"]);
  for (i = 0; i < w; i++) {
    for (j = 0; j < h; j++) {
      var num = Math.floor(Math.random() * 255);
      num = num < 127 ? 0 : 255;
      context.fillStyle = "rgb(" + num + "," + num + "," + num + ")";
      context.fillRect(i, j, 1, 1);
    }
  }
  return cv.imread(canvas);
}

function main() {
  let src = cv.imread(imgElement);
  for (var i =0 ;i <src.rows; i++) {
    for (var j = 0; j < src.cols; j++) {
      if(src.ucharPtr(i, j)[3]==0){
        for (var z = 0; z < 3; z++) {
          src.ucharPtr(i, j)[z]=255;
        }
        src.ucharPtr(i, j)[3]=1;
      }
    }
  }
  var noise = buildNoiseLayer(src.size());
  var src_not = new cv.Mat();
  var noise_not = new cv.Mat();

  cv.cvtColor(src, src, cv.COLOR_RGBA2GRAY);
  cv.cvtColor(noise, noise, cv.COLOR_RGBA2GRAY);
  cv.threshold(src, src, 0, 255, cv.THRESH_OTSU);

  cv.bitwise_not(src, src_not);
  cv.bitwise_not(noise, noise_not);

  var dst1 = new cv.Mat();
  var dst2 = new cv.Mat();
  var dst3 = new cv.Mat();

  cv.bitwise_and(src, noise, dst1);
  cv.bitwise_and(src_not, noise_not, dst2);
  cv.bitwise_or(dst1, dst2, dst3);

  var verific = new cv.Mat();
  cv.bitwise_or(dst3, noise, verific);
  cv.bitwise_not(verific, verific);

  cv.imshow("BlackWhiteLayer", src);
  cv.imshow("dst1Layer", dst1);
  cv.imshow("dst2Layer", dst2);
  cv.imshow("Share1Layer", dst3);
  cv.imshow("Share2Layer", noise);
  cv.imshow("verificLayer", verific);

  src.delete();
  noise.delete();
  src_not.delete();
  noise_not.delete();
  dst1.delete();
  dst2.delete();
  dst3.delete();
}

// ---------------------------- Reference ---------------------------- //
// - https://docs.opencv.org/3.4.3/de/d06/tutorial_js_basic_ops.html
// - https://docs.opencv.org/3.3.1/dd/d4d/tutorial_js_image_arithmetics.html
// - https://www.cnblogs.com/bjxqmy/p/12766075.html
