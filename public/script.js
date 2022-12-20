// var video = document.querySelector("#video-webcam");

// navigator.getUserMedia =
//     navigator.getUserMedia ||
//     navigator.webkitUserMedia ||
//     navigator.mozGetUserMEdia ||
//     navigator.msGetUserMEdia ||
//     navigator.oGetUserMedia;

// if (navigator.getUserMedia) {
//     navigator.getUserMEdia({ video: true }, handleVideo, videoError);
// }

// function handleVideo(stream) {
//     video.srcObject = stream;
// }

// function videoError(e) {
//     alert("Izinkan Menggunakan webcam!");
// }

// function takeSnapshot() {
//     var img = document.createElement("img");
//     var context;

//     var widht = video.offsetWidht,
//         height = video.offseHeight;

//     canvas = document.createElement("canvas");
//     canvas.widht = widht;
//     canvas.height = height;

//     context = canvas.getContext("2d");
//     context.drawImage(video, 0, 0, widht, height);

//     img.src = canvas.toDataURL("image/png");
//     document.body.appendChild(img);
// }

let camera_button = document.querySelector("#start-camera");
let video = document.querySelector("#video");
let click_button = document.querySelector("#click-photo");
let canvas = document.querySelector("#canvas");

camera_button.addEventListener("click", async function () {
    let stream = await navigator.mediaDevices.getUserMedia({
        video: true,
        audio: false,
    });
    video.srcObject = stream;
});

click_button.addEventListener("click", function () {
    canvas.getContext("2d").drawImage(video, 0, 0, canvas.width, canvas.height);
    let image_data_url = canvas.toDataURL("image/jpeg");

    // data url of the image
    console.log(image_data_url);
});
